<?php
session_start();

require_once('../model/user.php');
$config = include('../includes/config.php');

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

		if( ! $_POST['item_quantity'])
			throw new Exception("Invalid item quantity");

		$item = Model_User::getItem($_POST['item_id']);

		if(empty($item))
			throw new Exception("Invalid item");

		if(! isset($_SESSION['user_id']))
			throw new Exception("Invalid user");

		$user_details = Model_User::getUserDetails($_SESSION['user_id']);

		if(empty($user_details))
			throw new Exception("Invalid user");

		$total = $_POST['item_quantity'] * $item->item_price;

		$data = [
			'item_id' => $_POST['item_id'],
			'user_id' => $_SESSION['user_id'],
			'item_price' => $total,
			'item_quantity' => $_POST['item_quantity'],
			'date_ordered' => date('Y-m-d')
		];

		$order_id = Model_User::saveOrder($data);

		if (empty($order_id))
			throw new Exception("DB Error while ordering the item");

		$order_template = "<table style='border:2px solid blue;'>
		<tr>
			<td>Order Id : </td>
			<td>".$order_id."</td>
		</tr>
		<tr>
			<td>Customer Name : </td>
			<td>".$user_details->name."</td>
		</tr>
		<tr>
			<td>Customer Email : </td>
			<td>".$user_details->email."</td>
		</tr>
		<tr>
			<td>Customer Mobile : </td>
			<td>".$user_details->mobile."</td>
		</tr>
		<tr>
			<td>Customer Address : </td>
			<td>".$user_details->address."</td>
		</tr>
		<tr>
			<td>Item Name : </td>
			<td>".$item->item_name."</td>
		</tr>
		<tr>
			<td>Item Quantity : </td>
			<td>".$item-> $_POST['item_quantity']."</td>
		</tr>
		<tr>
			<td>Total Price : </td>
			<td>".$item-> $_POST['item_quantity'] * $item->item_price."</td>
		</tr>
		</table>";

		mail($config['mail_to'], $config['order_subject'], $order_template, $config['headers']);

		$confirm_template = 'Thanking you for ordering in Octoseafoods. Will reach you shortly.';
		$confirm_template .= '<br><br>Thanks, <br> Octoseafoods';

		mail($user_details->email, $config['confirm_subject'], $confirm_template, $config['headers']);

		$result = ['error' => 0, 'msg' => 'Order is confirmed. Will reach you shortly.'];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

?>