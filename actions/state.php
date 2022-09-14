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

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';

// $main = new PHPMailer(true);

// try {
//   $main->SMTPDebug = SMTP::DEBUG_SERVER;
//   $main->isSMTP();
//   $main->Host = "";
//   $main->SMTPAuth = true;
//   $main->Username = "";
//   $main->Password = "";
//   $main->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//   $main->Port = 45;

//   $main->setFrom("", "");
//   $main->addAddress("", "");
//   $main->isHTML = true;
//   $main->Subject = "Titulo";
//   $main->Body = "Esta es una prueba de correo";
//   $main->send();
// } catch (Exception $e) {
//   echo "Mensaje " . $main->ErrorInfo;
// }

header('Location: /hotel/dashboard.php');
