<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
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
          <label for="nationality-select">Nacionalidad</label>
          <select name="nationality" id="nationality-select">
            <option value="0" selected disabled></option>
            <?php
            include './includes/paises.php';
            foreach ($paises as $key => $pais) :
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

  <script>
    let err = '<?php echo $_GET['err']; ?>';
    if (err) {
      let x = document.getElementById("snackbar");
      switch (err) {
        case '1':
          x.innerHTML = "Ocurrio un error al registrarse. Por favor revisa los datos ingresados e intentalo de nuevo.";
          break;
        case '2':
          x.innerHTML = "Las contraseñas no coinciden. Por favor vuelva a intentarlo.";
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