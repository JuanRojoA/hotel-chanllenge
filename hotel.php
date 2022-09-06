<?php
require './config/database.php';
$db = new Database();
$con = $db->connection();

session_start();

$id = $_SESSION['id'];
$hotel_id = $_GET['hotel'];

$query = $con->prepare("SELECT * FROM hoteles WHERE id_hotel=?");
$query->execute([$hotel_id]);
$item = $query->fetch(PDO::FETCH_ASSOC);

$reservation_id = uniqid();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include './includes/styles.php' ?>
  <title>Hotel</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <div id="snackbar"></div>

  <main id="hotel-details-container">
    <div id="hotel-main-details-container">
      <h1><?php echo $item['nom_hotel'] ?></h1>
      <p><?php echo $item['direccion'] ?></p>
      <div>
        <img src="<?php echo $item['img'] ?>" alt="">
      </div>
    </div>
    <div id="hotel-side-details-container">
      <div>
        <h2>Descripción del hotel</h2>
        <p><?php echo $item['descrip'] ?></p>
      </div>
      <div>
        <h2>Servicios que ofrecemos en esta locación</h2>
        <p><?php echo $item['servicios'] ?></p>
      </div>
    </div>
  </main>

  <section id="reservation-form-container">
    <form action="./actions/make_reservation.php" method="POST" id="reservation-form" class="form">
      <h3 class="form-title">Hacer Reserva</h3>

      <div class="input-container">
        <label for="document-number">Número de documento</label>
        <input type="number" name="document-number" id="document-number" value="<?php echo $id ?>" placeholder="<?php echo $id ?>" readonly>
      </div>
      <div class="input-container">
        <label for="people-input">Número de adultos</label>
        <input type="number" name="people" id="people-input" value="0">
      </div>
      <div class="input-container">
        <label for="children-input">Número de niños</label>
        <input type="number" name="children" id="children-input" value="0">
      </div>
      <div class="input-container">
        <label for="minors-input">Número de niños menores de 5 años</label>
        <input type="number" name="minors" id="minors-input" min="0" value="0">
      </div>
      <div class="input-container">
        <label for="fec-start-input">Fecha de entrada</label>
        <input type="date" name="fec-start" id="fec-start-input">
      </div>
      <div class="input-container">
        <label for="fec-end-input">Fecha de salida</label>
        <input type="date" name="fec-end" id="fec-end-input">
      </div>
      <div class="input-container select-container">
        <label for="tour-type">Tour turistisco guiado</label>
        <select name="tour-type" id="tour-type">
          <option value="0" selected></option>
          <option value="1">Tour 1</option>
          <option value="2">Tour 2</option>
          <option value="3">Tour 3</option>
        </select>
      </div>
      <div class="input-container">
        <label for="price-input">Precio por persona</label>
        <input type="number" name="price" id="price-input" value="<?php echo $item['precio'] ?>" placeholder="<?php echo $item['precio'] ?>" readonly>
      </div>
      <div class="input-container">
        <label for="total-input">Precio total</label>
        <input type="number" name="total-price" id="total-input" value="0" readonly>
      </div>
      <div>
        <input type="text" name="reservation-id" id="reservation-id" value="<?php echo $reservation_id ?>" hidden>
      </div>
      <div>
        <input type="text" name="hotel-id" id="hotel-id" value="<?php echo $hotel_id ?>" hidden>
      </div>
      <div class="submit-container">
        <input type="submit" value="Reservar">
      </div>
    </form>
  </section>

  <script>
    let totalPriceEl = document.getElementById('total-input');
    let people = document.getElementById('people-input');
    let children = document.getElementById('children-input');
    let minors = document.getElementById('minors-input');
    let price = document.getElementById('price-input').value;

    people.addEventListener('change', changePrice);
    children.addEventListener('change', changePrice);
    minors.addEventListener('change', changePrice);


    function changePrice() {
      minors.max = children.value;
      let totalPrice = (price * (people.value + children.value - minors.value)) + (price * minors.value * 0.2);

      totalPriceEl.value = totalPrice;
      totalPriceEl.placeholder = totalPrice;
    }
  </script>

  <script>
    let state = '<?php echo $_GET['state']; ?>';
    if (state) {
      let x = document.getElementById("snackbar");
      switch (state) {
        case '0':
          x.innerHTML = "Error al hacer reserva. Por favor vuelvalo a intentar.";
          break;
        case '1':
          x.style.backgroundColor = "green";
          x.innerHTML = "Reserva realizada correctamente. Para admnistrarla dirijase a la pagina de administración de reservaciones.";
          break;
        default:
          alert("DEFAULTTTTT");
      }
      x.className = "show";
      setTimeout(function() {
        x.className = x.className.replace("show", "");
      }, 3000);
    }
  </script>
</body>

</html>