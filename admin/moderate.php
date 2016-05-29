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
  <script src="../js/moderate.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Add/ Edit Item</a>
      </div>
    </div>
  </nav>
    
  <div class="container">
    <p id="errorMsg" class="hide"></p>
    <form id="imageUploadForm" method="post" enctype="multipart/form-data">
      Name* :  <input type="text" name="item_name" id="item_name" placeholder="Enter Item Name" value="" />
        Image upload : 
        <input type="file" name="item_image" id="item_image"/>
      Type* :  <input type="radio" name="item_type" id="item_type1" value="1" /> Fish 
              <input type="radio" name="item_type" id="item_type2" value="2" /> Shellfish
              <input type="radio" name="item_type" id="item_type3" value="3" /> Dry Fish
      Quatity* : <input type="text" name="item_quantity" id="item_quantity" placeholder="Enter Quantity in Kgs"  value=""/>
      Price* : <input type="text" name="item_price" id="item_price" placeholder="Enter Price"  value=""/>
      <input type="button" name="submit" value="submit" onClick="moderate.saveItem();" />
      </form>
  </div>

</body>
</html>
