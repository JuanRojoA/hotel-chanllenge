<?php
require '../config/database.php';
$db = new Database();
$con = $db->connection();

session_start();

$documentNumber = $_POST['document-number'];
$email = $_POST['email'];
$password = $_POST['password'];

try {
  $query = $con->prepare("SELECT password_hash, super, num_doc FROM usuarios WHERE email=? AND num_doc=?");
  $query->execute([$email, $documentNumber]);
  $item = $query->fetch(PDO::FETCH_ASSOC);
  if (!$item) {
    header("Location: /hotel/login.php?err=1");
  } else {
    if (password_verify($password, $item['password_hash'])) {
      $_SESSION['admin'] = $item['super'];
      $_SERVER['id'] = $item['num_doc'];
      header("Location: /hotel/index.php");
    } else {
      header("Location: /hotel/login.php?err=2");
    }
  }
} catch (PDOException $e) {
  header("Location: /hotel/login.php?err=3");
}
