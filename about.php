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
      <div class="map-container">
        <div id="map"></div>
      </div>
    </section>

    <section class="social-container">
      <h2>Nuestras redes sociales</h2>
      <div class="icons-container">
        <div class="social-icon-container">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
            <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
          </svg>
        </div>
        <div class="social-icon-container">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="4" y="4" width="16" height="16" rx="4" />
            <circle cx="12" cy="12" r="3" />
            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
          </svg>
        </div>
        <div class="social-icon-container">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
          </svg>
        </div>
        <div class="social-icon-container">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="3" y="5" width="18" height="14" rx="4" />
            <path d="M10 9l5 3l-5 3z" />
          </svg>
        </div>
      </div>
    </section>
  </main>

  <script>
    const active = document.getElementById("link-about");
    active.classList.add("current");
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUzM90ox9pE1vZgVSGW4CqcIYujK9GImg&callback=initMap" async defer></script>

  <script>
    var map;

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: 6.1428372,
          lng: -75.6258621
        },
        zoom: 13,
      });

      var marker = new google.maps.Marker({
        position: {
          lat: 6.1484588,
          lng: -75.6158957
        },
        map: map,
        title: 'UNISABANETA'
      });
    }
  </script>

</body>

</html>