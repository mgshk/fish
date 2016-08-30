<?php

	session_start();

	if (isset($_SESSION['isLoggedIn'])) {
		header('Location: list.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin-Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/lib/jquery.min.js"></script>
  <script src="../js/lib/bootstrap.min.js"></script>
  <script src="../js/lib/handlebars.js"></script>
  <script src="../js/index.js"></script>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link href="../css/responsive.css" type="text/css" rel="stylesheet" />
</head>
<body>

  <nav class="navbar navbar-default">
      <h3 class="text-center margin_bottom_20">
        Admin sign in
      </h3>
  </nav>
    
  <div class="container">

      <div class="row">
      <div class="col-md-4 col-md-offset-4">
      <p id="errorMsg" class="hide"></p>

      <form class="form-signin">
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" onClick="index.login();">Sign in</button>
      </form>
    </div>
    </div>
  </div>

</body>
</html>
