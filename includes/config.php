<?php
	
	$config = [];

	$config['admin_username'] = 'admin';
	$config['admin_password'] = 'admin';

	$config['headers'] =  'MIME-Version: 1.0' . "\r\n"; 
	$config['headers'] .= 'From: Octoseafoods <octoseafoods@gmail.com>' . "\r\n";
	$config['headers'] .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

	$config['mail_to'] = 'nagamuraliweb@gmail.com';
	//octoseafoods@gmail.com

	$config['feedback_subject'] = 'Customer Feedback';
	$config['order_subject'] = 'Octoseafoods - Order Received';
	$config['confirm_subject'] = 'Octoseafoods - Order Confirmed';

	return $config;
?>