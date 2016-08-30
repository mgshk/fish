<?php
session_start();

require_once('../model/user.php');
$config = include('../includes/config.php');

if(isset($_GET['action']) && $_GET['action'] === 'register') {

	try {

		if( ! $_POST['name'])
			throw new Exception("Enter name");

		if( ! $_POST['email'])
			throw new Exception("Enter email");

		if( ! $_POST['password'])
			throw new Exception("Enter password");

		if( ! $_POST['confirm_password'])
			throw new Exception("Enter confirm password");

		if ($_POST['password'] !== $_POST['confirm_password'])
			throw new Exception("Confirm password does not match");

		if( ! $_POST['mobile'])
			throw new Exception("Enter mobile number");

		if( ! $_POST['address'])
			throw new Exception("Enter address");

		$data = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'password' => md5($_POST['password']),
			'mobile' => $_POST['mobile'],
			'address' => $_POST['address']
		];
		
		$id_user = Model_User::register($data);

		if (! $id_user)
			throw new Exception("Error while registering the user");

		$_SESSION['user_id'] = $id_user;

		$result = ['error' => 0, 'msg' => 'Successfully registered'];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'userLogin') {

	try {

		if( ! $_POST['email'])
			throw new Exception("Enter email");

		if( ! $_POST['password'])
			throw new Exception("Enter password");

		$data = [
			'email' => $_POST['email'],
			'password' => md5($_POST['password'])
		];
		
		$id_user = Model_User::userLogin($data);

		if( ! $id_user)
			throw new Exception("Invalid user credentials");

		$_SESSION['user_id'] = $id_user;

		$result = ['error' => 0, 'id_user' => $id_user];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'sendFeedback') {

	try {

		if( ! $_POST['name'])
			throw new Exception("Enter name");

		if( ! $_POST['email'])
			throw new Exception("Enter email");

		if( ! $_POST['phone'])
			throw new Exception("Enter phone");

		if( ! $_POST['comment'])
			throw new Exception("Enter comment");

		$comment = '<table>
		<tr>
			<td><strong>Name :</strong></td>
			<td>'.$_POST["name"].'</td>
		</tr>
		<tr>
			<td><strong>Email :</strong></td>
			<td>'.$_POST["email"].'</td>
		</tr>
		<tr>
			<td><strong>Phone :</strong></td>
			<td>'.$_POST["phone"].'</td>
		</tr>
		<tr>
			<td><strong>Comment :</strong></td>
			<td>'.$_POST["comment"].'</td>
		</tr>
		</table>';

		mail($config['mail_to'], $config['feedback_subject'], $comment);	

		$result = ['error' => 0, 'msg' => 'Thank you for valuable feedback'];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'getItems') {

	try {

		$items = Model_User::getItems();

		if(empty($items))
			throw new Exception("No records found");

		$result = ['error' => 0, 'items' => json_encode($items)];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'checkUser') {

	try {
		
		if( ! $_SESSION['user_id'])
			throw new Exception();

		$result = ['error' => 0];

	} catch (Exception $e) {
		$result = ['error' => 1];
	}

	echo json_encode($result);
	exit;
}
?>
