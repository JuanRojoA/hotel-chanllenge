<?php

require '../config/database.php';
$db = new Database();
$con = $db->connection();

$action = $_GET['state'];
$id = $_GET['id'];

if ($action == 1) {
  $query = $con->prepare("UPDATE reservaciones SET estado=1 WHERE id_reservacion=?");
} elseif ($action == 2) {
  $query = $con->prepare("UPDATE reservaciones SET estado=2 WHERE id_reservacion=?");
}


$query->execute([$id]);
$items = $query->fetch(PDO::FETCH_ASSOC);

header('Location: /hotel/dashboard.php');
