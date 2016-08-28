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
  <script src="../js/jquery.form.min.js"></script>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link href="../css/responsive.css" type="text/css" rel="stylesheet" />
</head>
<body>

  <nav class="navbar navbar-default">
    <h3 class="text-center margin_bottom_20">
        Add/ Edit Item
        <a href="logout.php" aling="right">Logout</a>
    </h3>
  </nav>
    
  <div class="container">
    <p id="errorMsg" class="hide"></p>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">

        <form id="file_upload_form" action="../ajax/admin.php?action=uploadImage" method="post" enctype="multipart/form-data">
      <b>Fish Name* : </b> <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Enter Item Name" value="" required/>
      <br>
      <b>Fish Image upload : </b>
        <input type="file" name="item_image" id="file_upload"/>
        <br>
      <b>Fish Type* : </b><br> <label><input type="radio" name="item_type" id="item_type1" value="1" /> Fish </label>
              <label><input type="radio" name="item_type" id="item_type2" value="2" /> Shellfish</label>
              <label><input type="radio" name="item_type" id="item_type3" value="3" /> Dry Fish</label>
              <br><br>
      <b>Fish Quantity* :</b> <input type="text" name="item_quantity" id="item_quantity" class="form-control" placeholder="Enter Quantity in Kgs" required value=""/>
      <br>
      <b>Fish Price* :</b> <input type="text" name="item_price" class="form-control" id="item_price" placeholder="Enter Price"  value="" required/>
      <br>
      <input type="button" name="submit" value="Submit"class="btn btn-lg btn-primary btn-block" onClick="moderate.saveItem();" />
    </form>

      </div>
    </div>

    
  </div>

</body>
</html>
