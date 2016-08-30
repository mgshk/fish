<?php
session_start();

require_once('../model/user.php');
$config = include('../includes/config.php');

if(isset($_GET['action']) && $_GET['action'] === 'saveUser') {

	try {

		if( ! $_POST['first_name'])
			throw new Exception("Enter name");

		if( ! $_POST['username'])
			throw new Exception("Enter username");

		if( ! $_POST['password'])
			throw new Exception("Enter password");

		if( ! $_POST['mobile'])
			throw new Exception("Enter mobile number");

		if( ! $_POST['address'])
			throw new Exception("Enter address");

		$data = [
			'first_name' => $_POST['first_name'],
			'username' => $_POST['username'],
			'password' => md5($_POST['password']),
			'mobile' => $_POST['mobile'],
			'address' => $_POST['address']
		];
		
		$id_user = Model_User::saveUser($data);	

		$result = ['error' => 0, 'id_user' => $id_user];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

if(isset($_GET['action']) && $_GET['action'] === 'userLogin') {

	try {

		if( ! $_POST['username'])
			throw new Exception("Enter username");

		if( ! $_POST['password'])
			throw new Exception("Enter password");

		$data = [
			'username' => $_POST['username'],
			'password' => md5($_POST['password'])
		];
		
		$id_user = Model_User::userLogin($data);

		if(empty($id_user))
			throw new Exception("Invalid user credentials");

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

		if( ! $_POST['comment'])
			throw new Exception("Enter comment");

		$comment = '<table>
		<tr>
			<td><strong>Name :</strong></td>
			<td>'.$_POST["name"].'</td>
		</tr>
		<tr>
			<td><strong>Comment :</strong></td>
			<td>'.$_POST["comment"].'</td>
		</tr>
		</table>';

		mail($config['mail_to'], $config['mail_subject'], $comment);	

		$result = ['error' => 0];

	} catch (Exception $e) {
		$result = ['error' => 1, 'msg' => $e->getMessage()];
	}

	echo json_encode($result);
	exit;
}

?>
