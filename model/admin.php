<?php

class Model_Admin extends PDO {
	
	public static function getList($type) {
		$DBH = new PDO('mysql:host=localhost; dbname=fish', 'admin', 'admin');

		$sql = 'SELECT * FROM f_items WHERE item_type = '.$type;
		$stmt = $DBH->query($sql);

		$row = $stmt->fetchAll();

		return empty($row) ? [] : $row;
	}

	public static function getItem($item_id) {
		$DBH = new PDO('mysql:host=localhost; dbname=fish', 'admin', 'admin');

		$sql = 'SELECT * FROM f_items WHERE item_id = '.$item_id;
		$stmt = $DBH->query($sql);

		$row = $stmt->fetchObject();

		return empty($row) ? [] : $row;
	}

	public static function saveItem($data) {
		$DBH = new PDO('mysql:host=localhost; dbname=fish', 'admin', 'admin');

		$sql = "INSERT INTO f_items(item_type, item_name, item_quantity, item_price) VALUES (
            :item_type, :item_name, :item_quantity, :item_price)";

		$stmt = $DBH->prepare($sql);

		$stmt->bindParam(':item_type', $data['item_type'], PDO::PARAM_INT);       
		$stmt->bindParam(':item_name', $data['item_name'], PDO::PARAM_STR); 
		$stmt->bindParam(':item_quantity', $data['item_quantity'], PDO::PARAM_INT);
		$stmt->bindParam(':item_price', $data['item_price'], PDO::PARAM_INT);   

		$stmt->execute();
	}

	public static function editItem($data, $item_id) {
		$DBH = new PDO('mysql:host=localhost; dbname=fish', 'admin', 'admin');

		$sql = "UPDATE f_items SET item_type = :item_type, item_name = :item_name, 
            item_quantity = :item_quantity, item_price = :item_price WHERE item_id = :item_id";

		$stmt = $DBH->prepare($sql);

		$stmt->bindParam(':item_type', $data['item_type'], PDO::PARAM_INT);       
		$stmt->bindParam(':item_name', $data['item_name'], PDO::PARAM_STR); 
		$stmt->bindParam(':item_quantity', $data['item_quantity'], PDO::PARAM_INT);
		$stmt->bindParam(':item_price', $data['item_price'], PDO::PARAM_INT);
		$stmt->bindParam(':item_id', $data['item_id'], PDO::PARAM_INT); 

		$stmt->execute();
	}

	public static function deleteItem($item_id) {
		$DBH = new PDO('mysql:host=localhost; dbname=fish', 'admin', 'admin');

		$sql = "DELETE FROM f_items WHERE item_id = :item_id";
		$stmt = $DBH->prepare($sql);

		$stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);

		$stmt->execute();
	}
}

?>