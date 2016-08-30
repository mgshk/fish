<?php
session_start();

require_once('../model/user.php');

if(isset($_GET['action']) && $_GET['action'] === 'getItem') {

	try {

		if( ! ctype_digit($_POST['item']))
			throw new Exception("Invalid item");

		$item = Model_User::getItem($_POST['item']);

		if(empty($item))
			throw new Exception("Invalid item");

		$result = ['error' => 0, 'item' => json_encode($item)];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'orderNow') {

	try {

		if( ! ctype_digit($_POST['item_id']))
			throw new Exception("Invalid item");

		$item = Model_User::getItem($_POST['item_id']);

		if(empty($item))
			throw new Exception("Invalid item");

		$data = [
			'item_id' => $_POST['item_id'],
			'user_id' => $_SESSION['user_id'],
			'date_ordered' => date('Y-m-d')
		];

		if (! Model_User::saveOrder($data))
			throw new Exception("DB Error while ordering the item");

		$result = ['error' => 0, 'msg' => 'Order is confirmed. Will reach you shortly.'];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

?>