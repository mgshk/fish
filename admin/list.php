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
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/handlebars.js"></script>
  <script src="../js/list.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Add Items</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a data-type="1" onClick="list.getList(this.getAttribute('data-type'));">Fishes</a></li>
        <li><a data-type="2" onClick="list.getList(this.getAttribute('data-type'));">Shellfish Types</a></li>
        <li><a data-type="3" onClick="list.getList(this.getAttribute('data-type'));">Dry Fishes</a></li>
      </ul>
    </div>
  </nav>
    
  <div class="container">
    <p id="resultMsg" class="hide"></p>
    <a href="moderate.php">New Items</a>
    <div id="tabItems"></div>

    <script id="itemList" type="text/x-handlebars-template">
      <table width="100%">
        <tr>
          <td>Name</td>
          <td>Total Kgs</td>
          <td>Price</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>

        {{#each items}}
        <tr>
          <td>{{item_name}}</td>
          <td>{{item_quantity}}</td>
          <td>{{item_price}}</td>
          <td><a href="moderate.php?item_id={{item_id}}">Edit</a></td>
          <td><a onClick="list.deleteItem({{item_id}});">Delete</a></td>
        </tr>
        {{/each}}

      </table>
    </script>

    <script id="errorResult" type="text/x-handlebars-template">
      <h3>{{{msg}}}</h3>
    </script>

  </div>

</body>
</html>
