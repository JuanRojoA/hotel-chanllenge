<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

session_start();

if (isset($_SESSION['id'])) {
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


    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "jjrojoa@gmail.com";
    $mail->Password = "gdpipvrgfztpunag";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom("jjrojoa@gmail.com", "Hotel Tokyo");

    try {
      $query = $con->prepare("SELECT email, nombre FROM usuarios WHERE num_doc=?");
      $query->execute([$documentNumber]);
      $item = $query->fetch(PDO::FETCH_ASSOC);

      $mail->addAddress($item['email']);

      $mail->isHTML(true);
      $mail->Subject = "Acabas de hacer una reservación en Hotel Tokyo";
      $mail->Body = 'Hola, ' . $item['nombre'] . ', <br> Acabas de hacer una reservación en uno de nuestros hoteles. <br> Cantidad de personas: ' . $people . '<br> En el rango de fechas: ' . $fecStart . ' - ' .  $fecEnd . ' <br> Con un precio total de: ' . $totalPrice . '<br><br> Uno de nuestros agentes revisara tu solicitud de reserva en los proximos 60 minutos y te informará a este mismo correo la aprobación o cancelación del servicio. <br> Hotel Tokyo, un hotel de ensueño.';

      $mail->send();
    } catch (Exception $e) {
      echo "errror";
    }
    header("Location: /hotel/hotel.php?state=1&hotel=$hotelID");
  } catch (PDOException $e) {
    header("Location: /hotel/hotel.php?state=0&hotel=$hotelID");
  }
} else {
  echo $_SESSION['id'];
}
