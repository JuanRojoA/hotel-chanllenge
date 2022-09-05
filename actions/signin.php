<?php
require '../config/database.php';

$db = new Database();
$con = $db->connection();

$documentType = $_POST['document-type'];
$documentNumber = $_POST['document-number'];
$nationality = $_POST['nationality'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if ($password == $repassword) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $query = $con->prepare("INSERT INTO usuarios (tipo_doc, num_doc, nacionalidad, nombre, num_cel, email, password_hash, super) VALUES (?,?,?,?,?,?,?,?)");

  try {
    $result = $query->execute([$documentType, $documentNumber, $nationality, $name, $phone, $email, $password, 0]);
    header("Location: /hotel/login.php?email=$email");
  } catch (PDOException $e) {
    header("Location: /hotel/signin.php?err=1");
  }
} else {
  header("Location: /hotel/signin.php?err=2");
}
