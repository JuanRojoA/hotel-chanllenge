<?php
require '../config/database.php';

$db = new Database();
$con = $db->connection();

$documentNumber = $_POST['document-number'];
$people = $_POST['people'];
$children = $_POST['children'];
$minors = $_POST['minors'];
$fecStart = $_POST['fec-start'];
$fecEnd = $_POST['fec-end'];
$tourType = $_POST['tour-type'];
$price = $_POST['price'];
$totalPrice = $_POST['total-price'];
$reservationID = $_POST['reservation-id'];
$hotelID = $_POST['hotel-id'];

$query = $con->prepare("INSERT INTO reservaciones (id_reservacion, num_doc, id_hotel, personas, ninos, menores, fec_entrada, fec_salida, plan_turistico, precio, total, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");


try {
  $result = $query->execute([$reservationID, $documentNumber, $hotelID, $people, $children, $minors, $fecStart, $fecEnd, $tourType, $price, $totalPrice, 0]);
  header("Location: /hotel/hotel.php?state=1&hotel=$hotelID");
} catch (PDOException $e) {
  header("Location: /hotel/hotel.php?state=0&hotel=$hotelID");
}
