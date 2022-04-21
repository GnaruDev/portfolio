<?php include '../php/action.php';?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>GB | Contact</title>
		<script src="https://www.hCaptcha.com/1/api.js" async defer></script>
		<meta name ="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../styles/stylesheetaltpages.css">
		<link rel="stylesheet" href="../styles/stylesheetnav.css">

		<style>
			@import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Work+Sans:wght@300&display=swap');
		</style>
	</head>

  	<body>
		<main>
			<div class = "topfixed">
				<header>
					<nav>
						<ul class="nav-list">
								<li class="nav-item"><a href="../index.php">Home</a></li>
								<li class="nav-item"><a href="aboutme.php">About</a></li>
								<li class="nav-item"><a href="mywork.php">My&nbsp;Work</a></li>
                                <li class="nav-item"><a href="contact.php">Contact</a></li>
						</ul>
					</nav>
				</header>
			 </div>
			<p><br /><br /><br /><br /></p>

			
			<h1 class = "altpgtitle">Contact Me</h1>
			<p class = "alt-text">If you would like to work together, connect, or discuss a new project please fill out the form below. All fields are required!</p>
			<div class = "form-container">
				<form action="contact.php" method="POST" autocomplete="on">
					<div class= "form-row">
						<div class ="col-25">
							<label for="fname">First Name:&nbsp;&nbsp;</label>
						</div>
						<div class ="col-75">
							<input type ="text" id="fname" name="fname" size="65" maxlength="40" required>
						</div>
					</div>

					<div class= "form-row">
						<div class ="col-25">
							<label for="lname">Last Name:&nbsp;&nbsp;</label>
						</div>

						<div class="col-75">
							<input type ="text" id="lname" name="lname" size="65" maxlength="40" required>
						</div>
					</div>

					<div class= "form-row">
						<div class ="col-25">
							<label for="email">Email: &nbsp;&nbsp;</label>
						</div>
						<div class ="col-75">
							<input type ="text" id="email" name="email" size="65" maxlength="40" required>
						</div>
					</div>

					<div class= "form-row">
						<div class ="col-25">
							<label for="subject">Message:</label>
						</div>

						<div class="col-75">
							<textarea id="subject" name="subject" rows="10" cols="100" required></textarea>
						</div>
					</div>
					<p class="success"> <?php echo $success;  ?></p>
         			<p class="failed"> <?php echo $failed;  ?></p>
				<p>&nbsp;&nbsp;</p>
				<div class="h-captcha" data-sitekey="620a9341-ff21-4314-8935-59be582ae519"></div>
				<p><input type="submit" name="submit" value="Send"  />&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Form" /></p>
				<p>&nbsp;&nbsp;</p>
				</div>
			</form>
		</div>
		</main>

	    <div class = "footercontainer">
			<footer>
			© Gina Blake 2022
			</footer>
		</div>
  </body>
</html>
