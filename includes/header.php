<header id="header">
  <div id="trademark">
    <span id="trademark-text"><span>Hotel</span> Kyoto</span>
    <!-- <img src="" alt="logo trademark"> -->
  </div>
  <nav id="navbar">
    <div id="links-container">
      <?php
      if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }

      if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] == 1) {
          echo '<a href="dashboard.php" class="nav-link" id="link-dashboard">Dashboard</a>';
          echo '<a href="./actions/signout.php" class="nav-link" id="link-signout">Cerrar Sesión</a>';
        } elseif ($_SESSION['admin'] == 0) {
          echo '<a href="index.php" class="nav-link" id="link-home">Inicio</a>';
          echo '<a href="about.php" class="nav-link" id="link-about">Acerca de nosotros</a>';
          echo '<a href="contact.php" class="nav-link" id="link-contact">Contacto</a>';
          echo '<a href="reservations.php" class="nav-link" id="link-user">Ver Reservaciones</a>';
          echo '<a href="./actions/signout.php" class="nav-link" id="link-signout">Cerrar Sesión</a>';
        }
      } else {
        echo '<a href="index.php" class="nav-link" id="link-home">Inicio</a>';
        echo '<a href="about.php" class="nav-link" id="link-about">Acerca de nosotros</a>';
        echo '<a href="contact.php" class="nav-link" id="link-contact">Contacto</a>';
        echo '<a href="signin.php" class="nav-link" id="link-signin">Registrarse</a>';
        echo '<a href="login.php" class="nav-link" id="link-login">Iniciar Sesión</a>';
      }
      ?>
    </div>
  </nav>
  <div id="burger">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
</header>

<script src="./javascript/menu.js"></script>