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
      <form action="./actions/signin.php" method="POST" id="signin-form" class="form">
        <h1 class="form-title">Registrarse</h1>
        <div class="input-container select-container">
          <label for="document-type">Tipo de documento</label>
          <select name="document-type" id="document-type">
            <option value="0" selected disabled></option>
            <option value="1">Cedula de ciudadania</option>
            <option value="2">Pasaporte</option>
            <option value="3">Cedula de extranjeria</option>
          </select>
        </div>
        <div class="input-container">
          <label for="document-number">Número de documento</label>
          <input type="number" name="document-number" id="document-number">
        </div>
        <div class="input-container select-container">
          <label for="document-type">Nacionalidad</label>
          <select name="document-type" id="document-type" class="form-select">
            <option value="0" selected disabled></option>
            <?php
            include './includes/paises.php';
            foreach ($paises as $pais) :
            ?>
              <option value="<?php echo $pais; ?>"><?php echo $pais; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="input-container">
          <label for="name">Nombre completo</label>
          <input type="text" name="name" id="name-input">
        </div>
        <div class="input-container">
          <label for="phone">Número de celular</label>
          <input type="number" name="phone" id="phone-input">
        </div>
        <div class="input-container">
          <label for="email">Correo Electronico</label>
          <input type="email" name="email" id="email-input">
        </div>
        <div class="input-container">
          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password-input">
        </div>
        <div class="input-container">
          <label for="repassword">Confirmar contraseña</label>
          <input type="password" name="repassword" id="repassword-input">
        </div>
        <div class="submit-container">
          <input type="submit" value="Registrarse">
        </div>
      </form>
    </div>
  </main>


  <script>
    const active = document.getElementById("link-signin");
    active.classList.add("current");
  </script>
</body>

</html>