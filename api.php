<?php

	require_once('model/admin.php');

	if(isset($_GET['action']) && $_GET['action'] === 'getItems') {

		try {

			if( ! isset($_GET['item_type']))
				throw new Exception("Invalid Item Type");

			$items = Model_Admin::getList($_GET['item_type']);

			if(empty($items))
				throw new Exception("No records found");

			$result = ['error' => 0, 'items' => json_encode($items)];

		} catch (Exception $e) {
			$result = ['error' => 1, 'msg' => $e->getMessage()];
		}

		echo json_encode($result);
		exit;
	}
?>