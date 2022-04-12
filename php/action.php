<?php

$success = '';
$failed = '';

if(isset($_POST['submit'])) {

    $mailto = "gmblake112@gmail.com"; //Email where I want to receive the form
    $fname = $_POST['fname']; //getting first name
    $lname = $_POST['lname']; //getting last name
    $fromEmail = $_POST['email']; //getting email
    $subject = $_POST ['subject']; //getting message
    $subject2 = "Confirmation: Message was submitted successfully";

    //Email Body I will receive
    $message = "Client Name" . $fname . $lname . "\n"
    . "Email: ". $email . "\n\n"
    . "Message: " . "\n" . $_POST['message'];

    //Message for client confirmation
    $message2 = "Dear" . $fname . "\n"
    . "Thank you for contacting me! I will get back to you shortly." . "\n\n"
    . "You Submitted the following message" . "\n" . $_POST['message'] . "\n\n"
    . "Regards," . "\n" . "- Gina Blake";

    //Email Headers
    $headers = "From: " . $fromEmail; // Users email address I will receive
    $header2 = "From: " . $mailto; // This will be received by user

    //PHP mailer function 
    $result1 = mail($mailto, $subject, $message, $headers);  // This will send to my email address
    $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client


    if ($result1 && $result2) {
        $success = "Your Message was sent Successfully!";
      } else {
        $failed = "Sorry! Message was not sent, Try again Later.";
      }

    }

?> 

