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
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/handlebars.js"></script>
  <script src="../js/index.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Login</a>
      </div>
    </div>
  </nav>
    
  <div class="container">
    <p id="errorMsg" class="hide"></p>
    <form>
		Username : <input type="text" name="username" id="username" />
		Password : <input type="password" name="password" id="password" />
		<input type="button" value="login" onClick="index.login();" />
	</form>

  </div>

</body>
</html>
