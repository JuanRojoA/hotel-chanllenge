<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../config/database.php';
$db = new Database();
$con = $db->connection();

$action = $_GET['state'];
$id = $_GET['id'];
$num_doc = $_GET['id_user'];

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

$query = $con->prepare("SELECT email, nombre FROM usuarios WHERE num_doc=?");
$query->execute([$num_doc]);
$item = $query->fetch(PDO::FETCH_ASSOC);

$query = $con->prepare("SELECT * FROM reservaciones WHERE num_doc=? AND id_reservacion=?");
$query->execute([$num_doc, $id]);
$item2 = $query->fetch(PDO::FETCH_ASSOC);

if ($action == 1) {
  $query = $con->prepare("UPDATE reservaciones SET estado=1 WHERE id_reservacion=?");
  $query->execute([$id]);
  try {
    $mail->addAddress($item['email']);

    $mail->isHTML(true);
    $mail->Subject = "Aceptamos tu solicitud de reservación en Hotel Tokyo";
    $mail->Body = 'Hola, ' . $item['nombre'] . ', <br> Uno de nuestros agentes encargados acaba de aceptar tu reservación, no tienes que realizar ninguna acción adicional, solo presentarte en las fechas que escogiste en tu reservación y disfrutar de nuestros increibles servicios. <br> La información de tu reserva es: <br> Cantidad de personas: ' . $item2['personas'] . '<br> En el rango de fechas: ' . $item2['fec_entrada'] . ' - ' .  $item2['fec_salida'] . ' <br> Con un precio total de: ' . $item2['total'] . '<br><br> Hotel Tokyo, un hotel de ensueño.';

    $mail->send();
  } catch (Exception $e) {
    echo "errror";
  }
} elseif ($action == 2) {
  $query = $con->prepare("UPDATE reservaciones SET estado=2 WHERE id_reservacion=?");
  $query->execute([$id]);
  try {
    $mail->addAddress($item['email']);

    $mail->isHTML(true);
    $mail->Subject = "Rechazamos tu solicitud de reservación en Hotel Tokyo";
    $mail->Body = 'Hola, ' . $item['nombre'] . ', <br> Lamentamos contarte que uno de nuestros agentes encargados acaba de rechazar tu reservación. <br> La información de tu reserva es: <br> Cantidad de personas: ' . $item2['personas'] . '<br> En el rango de fechas: ' . $item2['fec_entrada'] . ' - ' .  $item2['fec_salida'] . ' <br> Con un precio total de: ' . $item2['total'] . '<br><br> Hotel Tokyo, un hotel de ensueño.';

    $mail->send();
  } catch (Exception $e) {
    echo "errror";
  }
}



header('Location: /hotel/dashboard.php');
