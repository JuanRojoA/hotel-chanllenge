<?php
require './config/database.php';
$db = new Database();
$con = $db->connection();

$query = $con->prepare("SELECT * FROM hoteles");
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <?php include './includes/styles.php' ?>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main class="home-container">
    <section id="home-title-container">
      <h1>¿Qué esperas para disfrutar de tu proxima aventura?</h1>
      <p>Explora nuestras decenas de opciones de hospedaje y ven a probrar nuestros toures guiados, nuestros platillos de los chef más famosos del país y nuestras increibles vistas no importa donde estés.</p>
      <a href="#hospedaje-section" id="arrow-down">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-down" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <line x1="12" y1="5" x2="12" y2="19" />
          <line x1="18" y1="13" x2="12" y2="19" />
          <line x1="6" y1="13" x2="12" y2="19" />
        </svg>
      </a>
    </section>

    <section id="mini-services-container">
      <h2>Nuestros Servicios</h2>
      <div id="even-min-cards">
        <div class="mini-service-card">
          <img src="https://picsum.photos/1000" alt="">
          <a href="#hospedaje-section">Hospedaje</a>
        </div>
        <div class="mini-service-card">
          <img src="https://picsum.photos/1000" alt="">
          <a href="#food-section">Alimentación</a>
        </div>
      </div>
      <div id="odd-mini-cards">
        <div class="mini-service-card">
          <img src="https://picsum.photos/1000" alt="">
          <a href="#guides-section">Toures Guiados</a>
        </div>
        <div class="mini-service-card">
          <img src="https://picsum.photos/1000" alt="">
          <a href="#transport-section">Transportación</a>
        </div>
      </div>
    </section>

    <section id="hospedaje-section">
      <h2>Hospedaje</h2>
      <p>Conoce nuestros hoteles, sus servicios y precios.</p>
      <div id="hospedaje-cards-container">
        <?php foreach ($items as $hotel) : ?>
          <div class="hospedaje-card">
            <img src="<?php echo $hotel['img'] ?>" alt="">
            <p> <b><?php echo $hotel['nom_hotel'] ?></b> <br> <i><?php echo $hotel['direccion'] ?></i> <br> <?php echo $hotel['descrip'] ?></p>
            <div class="hotel-link-container">
              <a href="hotel.php?hotel=<?php echo $hotel['id_hotel'] ?>">Reservar</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="guides-section">
      <h2>Toures Guidados</h2>
      <p>Como parte de tu reservación te llevamos a conocer las mejores partes de la ciudad en la que reserves tu hospedaje con el 70% de descuento.</p>
      <div id="guides-collage">
        <img src="https://picsum.photos/1000" alt="">
        <img src="https://picsum.photos/1000" alt="">
        <img src="https://picsum.photos/1000" alt="">
        <img src="https://picsum.photos/1000" alt="">
        <img src="https://picsum.photos/1000" alt="">
        <img src="https://picsum.photos/1000" alt="">
        <div id="tour-overlay"><a href="#">Reservar un tour guiado</a></div>
      </div>
    </section>

    <section id="food-section">
      <h2>Alimentación</h2>
      <p>Prueba nuevos platillos o viejos favoritos que harán derretir tu paladar cocinados por excelentes chefs nacionales</p>
      <div id="food-cards-container">
        <div class="food-card">
          <img src="https://picsum.photos/1000" alt="">
          <div class="food-overlay">
            <p>Food name</p>
          </div>
        </div>
        <div class="food-card">
          <img src="https://picsum.photos/1000" alt="">
          <div class="food-overlay">
            <p>Food name</p>
          </div>
        </div>
        <div class="food-card">
          <img src="https://picsum.photos/1000" alt="">
          <div class="food-overlay">
            <p>Food name</p>
          </div>
        </div>
        <div class="food-card">
          <img src="https://picsum.photos/1000" alt="">
          <div class="food-overlay">
            <p>Food name</p>
          </div>
        </div>
      </div>
    </section>

    <section id="transport-section">
      <h2>Transportación</h2>
      <p>Como parte de tu paquete de hospedaje incluimos transportación desde tu lugar de llegada a nuestros hoteles.*</p>
      <div id="transport-desc-container">
        <img src="https://picsum.photos/1000" alt="">
        <p><span>¿Preocuparse por el transporte?</span> Con Hotel Kyoto eso es cosa del pasado.</p>
      </div>
      <p class="small-text">*Aplican terminos y condiciones. Disponible en paquetes con un valor total previo a descuentos e impuestos de más de $1000000 (un millón) de pesos.</p>
    </section>
  </main>

  <script>
    const active = document.getElementById("link-home");
    active.classList.add("current");
  </script>
</body>

</html>