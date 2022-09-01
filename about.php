<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acerca de nosotros</title>
  <?php include './includes/styles.php' ?>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main class="about-container">

    <div class="title-container">
      <h1>Acerca de nosotros</h1>
    </div>

    <section class="info-container">
      <h2>¿Quienes somos?</h2>
      <div class="info-img-container">
        <img src="https://picsum.photos/1000" alt="">
      </div>
      <div class="info-text-container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nobis voluptate blanditiis soluta assumenda veritatis unde magnam inventore odit exercitationem magni, reprehenderit ullam voluptatum mollitia impedit, officia explicabo recusandae tempore.
          Blanditiis, illum tempore vitae tempora ea eius distinctio repudiandae esse error nobis cum? Consectetur enim cupiditate repudiandae veritatis obcaecati incidunt praesentium dolores, architecto, similique, vitae neque blanditiis autem cumque quaerat.
          Vel dicta et possimus culpa repellendus fugit deserunt quo expedita quaerat! Quis, sunt! Necessitatibus assumenda neque sint commodi, sequi suscipit asperiores ea autem provident repellat! Blanditiis cum vero obcaecati officiis.</p>
      </div>
    </section>

    <section class="info-container">
      <h2>¿Que hacemos?</h2>
      <div class="info-text-container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nobis voluptate blanditiis soluta assumenda veritatis unde magnam inventore odit exercitationem magni, reprehenderit ullam voluptatum mollitia impedit, officia explicabo recusandae tempore.
          Blanditiis, illum tempore vitae tempora ea eius distinctio repudiandae esse error nobis cum? Consectetur enim cupiditate repudiandae veritatis obcaecati incidunt praesentium dolores, architecto, similique, vitae neque blanditiis autem cumque quaerat.
          Vel dicta et possimus culpa repellendus fugit deserunt quo expedita quaerat! Quis, sunt! Necessitatibus assumenda neque sint commodi, sequi suscipit asperiores ea autem provident repellat! Blanditiis cum vero obcaecati officiis.</p>
      </div>
      <div class="info-img-container">
        <img src="https://picsum.photos/1000" alt="">
      </div>
    </section>

    <section class="location-container">
      <h2>Ubicación</h2>
      <p></p>
    </section>

    <section class="social-container">
      <h2>Nuestras redes sociales</h2>
      <div></div>
      <div></div>
      <div></div>
    </section>
  </main>

  <script>
    const active = document.getElementById("link-about");
    active.classList.add("current");
  </script>
</body>

</html>