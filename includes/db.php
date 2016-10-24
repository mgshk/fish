<?php
  class DBConnection extends PDO 
  {
    public function __construct() {
      $username = 'designr1';
      $password = 'grafik123#';
      // $username = 'root';
      // $password = '';

      parent::__construct('mysql:host=localhost:3306; dbname=designr1_octosea', $username, $password);
    }
  }
?>