<?php

require './config/database.php';
$db = new Database();
$con = $db->connection();

session_start();

if ($_SESSION['admin'] == 0) {
  header('Location: /hotel/index.php');
} else {
  $query = $con->prepare("SELECT * FROM reservaciones");
  $query->execute();
  $items = $query->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <?php include './includes/styles.php' ?>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main id="dashboard-container">
    <h1>Dashboard Administración de reservaciones</h1>
    <div class="table">

      <div class="row header">
        <div class="cell">ID</div>
        <div class="cell">Hotel</div>
        <div class="cell">Nombre Usuario</div>
        <div class="cell">Personas</div>
        <div class="cell">Niños</div>
        <div class="cell">Niños < 5</div>
            <div class="cell">Fecha Entrada</div>
            <div class="cell">Fecha Salida</div>
            <div class="cell">Plan turistico</div>
            <div class="cell">Precio C/U</div>
            <div class="cell">Total</div>
            <div class="cell">Estado</div>
            <div class="cell">Acciones</div>
        </div>

        <?php foreach ($items as $item) : ?>
          <div class="row">
            <div class="cell" data-title="Name"><?php echo $item['id_reservacion']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['id_hotel']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['num_doc']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['personas']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['ninos']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['menores']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['fec_entrada']; ?></div>
            <div class="cell" data-title="Name"> <?php echo $item['fec_salida']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['menores']; ?></div>
            <div class="cell" data-title="Name"> <?php echo $item['precio']; ?></div>
            <div class="cell" data-title="Name"><?php echo $item['total']; ?></div>
            <div class="cell" data-title="Name">
              <?php
              if ($item['estado'] == 0) {
                echo "Por Confirmar";
              } elseif ($item['estado'] == 1) {
                echo "Aceptado";
              } elseif ($item['estado'] == 2) {
                echo "Rechazado";
              }
              ?>
            </div>
            <div class="cell" data-title="Name">
              <?php if ($item['estado'] == 0) : ?>
                <a href="./actions/state.php?id=<?php echo $item['id_reservacion']; ?>&state=1" class="table-btn">Aceptar</a>
                <a href="./actions/state.php?id=<?php echo $item['id_reservacion']; ?>&state=2" class="table-btn">Rechazar</a>
              <?php endif; ?>
              <?php if (!$item['estado'] == 0) : ?>
                <p>No hay acciones a realizar</p>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
  </main>

  <script>
    const active = document.getElementById("link-dashboard");
    active.classList.add("current");
  </script>
</body>

</html>