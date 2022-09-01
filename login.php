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
          <label for="email">Correo Electronico</label>
          <input type="email" name="email" id="email-input">
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
</body>

</html>