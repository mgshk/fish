<?php

require_once('../includes/db.php');

class Model_User extends DBConnection {
	
	public static function saveUser($data) {
		$DBH = new DBConnection();

		$sql = "INSERT INTO users(first_name, username, password, mobile, address) VALUES (
            :first_name, :username, :password, :mobile, :address)";

		$stmt = $DBH->prepare($sql);

		$stmt->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR;       
		$stmt->bindParam(':username', $data['username'], PDO::PARAM_STR); 
		$stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
		$stmt->bindParam(':mobile', $data['mobile'], PDO::PARAM_STR);
		$stmt->bindParam(':address', $data['address'], PDO::PARAM_STR);

		$stmt->execute();

		return $DBH->lastInsertId();
	}

	public static function userLogin($data) {
		$DBH = new DBConnection();

		$sql = "SELECT * FROM users WHERE username = :username and password = :password";

		$stmt->bindParam(':username', $data['username'], PDO::PARAM_STR;       
		$stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);

		$stmt = $DBH->prepare($sql);
		$stmt->execute();

		$row = $stmt->fetchObject();

		return empty($row) ? [] : $row;
	}
}

?>