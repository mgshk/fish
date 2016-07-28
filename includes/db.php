<?php
  class DBConnection extends PDO 
  {
    public function __construct() {
      $username = 'admin';
      $password = 'admin';

      parent::__construct('mysql:host=localhost; dbname=fish', $username, $password);
    }
  }
?>