<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <?php include './includes/styles.php' ?>
</head>

<body>
  <?php include './includes/header.php' ?>

  <div id="snackbar"></div>

  <main class="form-main-container">
    <div class="form-img-container">
      <div class="img-container">
        <img src="https://picsum.photos/2000" alt="" class="form-img">
      </div>
    </div>
    <div class="form-container">
      <form action="./actions/login.php" method="POST" id="login-form" class="form">
        <h1 class="form-title">Iniciar Sesión</h1>
        <div class="input-container">
          <label for="document-number">Número de documento</label>
          <input type="number" name="document-number" id="document-number">
        </div>
        <div class="input-container">
          <label for="email">Correo Electronico</label>
          <input type="email" name="email" id="email-input" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ?>">
        </div>
        <div class="input-container">
          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password-input">
        </div>
        <div class="submit-container">
          <input type="submit" value="Iniciar Sesión">
        </div>
      </form>
    </div>
  </main>

  <script>
    const active = document.getElementById("link-login");
    active.classList.add("current");
  </script>

  <script>
    let err = '<?php echo $_GET['err']; ?>';
    if (err) {
      let x = document.getElementById("snackbar");
      switch (err) {
        case '1':
          x.innerHTML = "Error al iniciar sesión. Número de documento o correo electronico incorrectos.";
          break;
        case '2':
          x.innerHTML = "Error al iniciar sesión. Contraseña incorrecta.";
          break;
        case '3':
          x.innerHTML = "Error al iniciar sesión. Query fallido.";
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