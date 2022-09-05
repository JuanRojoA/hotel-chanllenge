<?php

class Database
{
  private $hostname = 'localhost';
  private $dbname = 'hotelbd';
  private $username = 'root';
  private $password = '';
  private $charset = 'utf8';


  function connection()
  {
    try {
      $connection = "mysql:host=" . $this->hostname . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];
      $pdo = new PDO($connection, $this->username, $this->password, $options);

      return $pdo;
    } catch (PDOException $e) {
      echo 'Error en la conexión: ' . $e->getMessage();
      exit;
    }
  }
}
