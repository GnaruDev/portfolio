<?php

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
$dotenv->required(['HCAPTCHA_KEY', 'MAILER_URL', 'MAILER_KEY']);

$success = '';
$failed = '';

if (isset($_POST['submit'])) {
    if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {
        // get verify response
        $data = array(
            'secret' => $_ENV['HCAPTCHA_KEY'],
            'response' => $_POST['h-captcha-response']
        );

        // captcha
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL,   "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $verifyResponse = curl_exec($verify);
        $responseData = json_decode($verifyResponse);

        // sanitize inputs
        $fname = filter_input(INPUT_POST, 'fname', FILTER_UNSAFE_RAW);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_UNSAFE_RAW);
        $name = join(" ", array($fname, $lname));
        $email = filter_var(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'subject', FILTER_UNSAFE_RAW);

        // ignore empty values
        $name = !empty($name) ? $name : '';
        $email = !empty($email) ? $email : '';
        $message = !empty($message) ? $message : '';

        // check captcha response
        if ($responseData->success) {
            //contact form submission code

            // form json
            $payload = json_encode(array("message" => $message, "name" => $name, "email" => $email));

            $curl = curl_init();
            
            $mailerUrl = $_ENV['MAILER_URL'];
            $mailerKey = $_ENV['MAILER_KEY'];
            curl_setopt_array($curl, array(
                CURLOPT_URL => $mailerUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $payload,
                CURLOPT_HTTPHEADER => array(
                    "x-api-key: $mailerKey",
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;

            $success = 'Your contact request has been submitted successfully.';
            $name = '';
            $email = '';
            $message = '';
        } else {
            $failed = 'hCaptcha verification failed. Please try again.';
        }
    } else {
        $failed = 'Please click on the hCaptcha button.';
    }
} else {
    $failed = '';
    $success = '';
    $name = '';
    $email = '';
    $message = '';
}
