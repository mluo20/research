<?php

session_start();

$correctpassword = "geneticsrocks2018";

if (isset($_SESSION['access']) && $_SESSION['access']) {
	header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	extract($_POST);

	if ($password == $correctpassword) {
		$_SESSION['access'] = true;
		header("Location: index.php");
	}
	else {
		$incorrect = "<div class='alert alert-danger' role='alert'>Incorrect password</div>";
	}

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Enter password</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

   	<style type="text/css">
   		html, body {
		  height: 100%;
		}

		body {
		  display: -ms-flexbox;
		  display: -webkit-box;
		  display: flex;
		  -ms-flex-align: center;
		  -ms-flex-pack: center;
		  -webkit-box-align: center;
		  align-items: center;
		  -webkit-box-pack: center;
		  justify-content: center;
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #f5f5f5;
		}

		.form-signin {
		  width: 100%;
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}

		.form-signin .form-control {
		  position: relative;
		  box-sizing: border-box;
		  height: auto;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		input {
			margin-bottom: 20px;
		}

   	</style>
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php
  		if (isset($incorrect)) {
  			echo $incorrect;
  		}
  	?>
      <h1 class="h3 mb-3 font-weight-normal">Please enter the password:</h1>
      <label for="inputPassword" class="sr-only">Password: </label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Enter</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y") ?> &middot; Miranda L &amp; Ria S</p>
    </form>
  </body>
</html>