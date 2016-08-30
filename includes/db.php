<?php
  class DBConnection extends PDO 
  {
    public function __construct() {
      $username = 'root';
      $password = '';

      parent::__construct('mysql:host=localhost; dbname=octosea', $username, $password);
    }
  }
?>