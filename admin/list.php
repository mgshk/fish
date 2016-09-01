<?php

  session_start();

  if (!isset($_SESSION['isLoggedIn'])) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin-Moderate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/lib/jquery.min.js"></script>
  <script src="../js/lib/bootstrap.min.js"></script>
  <script src="../js/lib/handlebars.js"></script>
  <script src="../js/list.js"></script>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link href="../css/responsive.css" type="text/css" rel="stylesheet" />
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="moderate.php">Add Items</a>
      </div>
      <ul class="nav navbar-nav fsh">
        <li class="active"><a class="menuList" data-type="1">Fishes</a></li>
        <li><a data-type="2" class="menuList">Shellfish Types</a></li>
        <li><a data-type="3" class="menuList">Dry Fishes</a></li>
      </ul>
      <a href="logout.php" aling="right" class="btn btn-success lgout">Logout</a>
    </div>
  </nav>
    
  <div class="container">
    <p id="resultMsg" class="hide"></p>
    <div>
    <a href="moderate.php" class="btn btn-info">Add New Item</a>
  </div>
    <div id="tabItems"></div>

    <script id="itemList" type="text/x-handlebars-template">
    <div class="table-responsive">
      <table width="100%" class="table table-bordered table-inverse">
        <tr class="success">
          <th>Name</th>
          <th>Available stock Kgs</th>
          <th>Price</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>

        {{#each items}}
        <tr class="danger">
          <td>{{item_name}}</td>
          <td>{{item_quantity}}</td>
          <td>{{item_price}}</td>
          <td><a href="moderate.php?item_id={{item_id}}" class="btn btn-primary">Edit</a></td>
          <td><a onClick="list.deleteItem({{item_id}});" class="btn btn-primary">Delete</a></td>
        </tr>
        {{/each}}

      </table>
      </div>
    </script>

    <script id="errorResult" type="text/x-handlebars-template">
      <h4>{{{msg}}}</h4>
    </script>

  </div>

</body>
</html>
