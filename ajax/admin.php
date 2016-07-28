<?php
session_start();

require_once('../model/admin.php');
$config = include('../includes/config.php');

if(isset($_GET['action']) && $_GET['action'] === 'userLogin') {

	try {

		if( ! $_POST['username'])
			throw new Exception("Enter username");

		if( ! $_POST['password'])
			throw new Exception("Enter password");
			
		if($_POST['username'] !== $config['login_username'])
			throw new Exception("Invalid username");

		if($_POST['password'] !== $config['login_password'])
			throw new Exception("Invalid password");

		$_SESSION['isLoggedIn'] = true;

		$result = ['error' => 0];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'getList') {

	try {

		if( ! ctype_digit($_POST['type']))
			throw new Exception("Invalid item type");
			
		$items = Model_Admin::getList($_POST['type']);

		if(empty($items))
			throw new Exception("No records found");

		$result = ['error' => 0, 'items' => json_encode($items)];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'uploadImage') {
	try 
	{
		$expensions = ['jpeg', 'jpg', 'png'];

		if( ! isset($_FILES['item_image']) || ! is_uploaded_file($_FILES['item_image']['tmp_name']))
			throw new Exception('Image file is Missing');

		$file_ext = strtolower(end(explode('.',$_FILES['item_image']['name'])));

		if(in_array($file_ext, $expensions)=== false)
        	throw new Exception('extension not allowed, please choose a JPEG or PNG file.');

		if($_FILES['item_image']['size'] > 2097152)
        	throw new Exception('File size must be excately 2 MB');	

	    $upload_image = $_FILES['item_image'];  
	    $unique_id  = uniqid();

	    if ( ! file_exists('../img/tmp')) {
		    mkdir('../img/tmp', 0777, true);
		}

	    move_uploaded_file($_FILES['item_image']['tmp_name'], '../img/tmp/'.$unique_id.'.jpg');

		$result = ['error' => 0, 'img_name' => $unique_id.'.jpg'];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'saveItem') {
	try {

		if( ! $_POST['item_name'])
			throw new Exception("Enter Item Name");

		if( ! ctype_digit($_POST['item_type']))
			throw new Exception("Invalid item type");

		if( ! ctype_digit($_POST['item_quantity']))
			throw new Exception("Enter Quantity in Kgs");

		if( ! ctype_digit($_POST['item_price']))
			throw new Exception("Enter Price");

		$data = [
			'item_name' => $_POST['item_name'],
			'item_type' => $_POST['item_type'],
			'item_quantity' => $_POST['item_quantity'],
			'item_price' => $_POST['item_price']
		];

		if( ! ctype_digit($_POST['item_id'])) {
			$id_item = Model_Admin::saveItem($data);
		} else {
			$id_item = $_POST['item_id'];
			Model_Admin::editItem($data, $_POST['item_id']);
		}

		if (copy('../img/tmp/'.$_POST['item_image'], '../img/'.$id_item.'.jpg')) {
			unlink('../img/tmp/'.$_POST['item_image']);
		}

		$result = ['error' => 0];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'getItem') {
	try {

		if( ! ctype_digit($_POST['item_id']))
			throw new Exception("Invalid item");
			
		$item = Model_Admin::getItem($_POST['item_id']);

		if(empty($item))
			throw new Exception("No record found");

		$result = ['error' => 0, 'item' => json_encode($item)];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'deleteItem') {
	try {

		if( ! ctype_digit($_POST['item_id']))
			throw new Exception("Invalid item");

		$resp = Model_Admin::deleteItem($_POST['item_id']);

		if( ! empty($resp))
			throw new Exception("Some error occured");

		$result = ['error' => 0, 'msg' => 'Successfully deleted'];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

?>