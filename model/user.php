<?php

require_once('../includes/db.php');

class Model_User extends DBConnection {
	
	public static function register($data) {
		$DBH = new DBConnection();

		$sql = "INSERT INTO users(name, email, password, mobile, address) VALUES (
            :name, :email, :password, :mobile, :address)";

		$stmt = $DBH->prepare($sql);

		$stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);    
		$stmt->bindParam(':email', $data['email'], PDO::PARAM_STR); 
		$stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
		$stmt->bindParam(':mobile', $data['mobile'], PDO::PARAM_STR);
		$stmt->bindParam(':address', $data['address'], PDO::PARAM_STR);

		$stmt->execute();

		return $DBH->lastInsertId();
	}

	public static function userLogin($data) {
		$DBH = new DBConnection();

		$sql = "SELECT user_id FROM users WHERE email = :email and password = :password";

		$stmt = $DBH->prepare($sql);
		
		$stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);       
		$stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
		$stmt->execute();

		$row = $stmt->fetchObject();

		return empty($row) ? [] : $row;
	}

	public static function getItems() {
		$DBH = new DBConnection();

		$sql = "SELECT * FROM items";

		$stmt = $DBH->prepare($sql);
		$stmt->execute();

		$row = $stmt->fetchAll(PDO::FETCH_OBJ);

		return empty($row) ? [] : $row;
	}

	public static function getItem($item_id) {
		$DBH = new DBConnection();

		$sql = "SELECT * FROM items WHERE item_id = ".$item_id;

		$stmt = $DBH->prepare($sql);
		$stmt->execute();

		$row = $stmt->fetchObject();

		return empty($row) ? [] : $row;
	}

	public static function saveOrder($data) {
		$DBH = new DBConnection();

		$sql = "INSERT INTO orders(item_id, user_id, date_ordered) VALUES (:item_id, :user_id, :date_ordered)";

		$stmt = $DBH->prepare($sql);

		$stmt->bindParam(':item_id', $data['item_id'], PDO::PARAM_INT);       
		$stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT); 
		$stmt->bindParam(':date_ordered', $data['date_ordered'], PDO::PARAM_STR); 

		$stmt->execute();

		return $DBH->lastInsertId();
	}
}

?>