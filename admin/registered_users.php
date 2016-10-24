<?php

  session_start();

  if (!isset($_SESSION['isLoggedIn'])) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registered Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/lib/jquery.min.js"></script>
  <script src="../js/lib/bootstrap.min.js"></script>
  <script src="../js/lib/handlebars.js"></script>
  <script src="../js/registered_users.js"></script>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link href="../css/responsive.css" type="text/css" rel="stylesheet" />
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="list.php">List of Fish</a>
        <a class="navbar-brand" href="#">Registered Users in Octoseafoods</a>
      </div>

      <a href="logout.php" aling="right" class="btn btn-success lgout">Logout</a>
    </div>
  </nav>
    
  <div class="container">
    
    <div id="tabUsers"></div>

    <script id="userList" type="text/x-handlebars-template">
    <div class="table-responsive">
      <table width="100%" class="table table-bordered table-inverse">
        <tr class="success">
          <th>User Name</th>
          <th>User Email</th>
          <th>User Mobile No</th>
          <th>User Address</th>
        </tr>

        {{#each users}}
        <tr class="danger">
          <td>{{name}}</td>
          <td>{{email}}</td>
          <td>{{mobile}}</td>
          <td>{{address}}</td>
        </tr>
        {{/each}}

      </table>
      </div>
    </script>

    <script id="errorResult" type="text/x-handlebars-template">
      <h4>{{{msg}}}</h4>
    </script>

    <script id="errorResult" type="text/x-handlebars-template">
      <h4>{{{msg}}}</h4>
    </script>

  </div>

</body>
</html>
