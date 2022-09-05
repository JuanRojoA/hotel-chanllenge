<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once './includes/styles.php' ?>
  <title>Contactanos</title>
</head>

<body>
  <?php include_once './includes/header.php' ?>

  <main class="contact-container">
    <h1 class="contact-title">Contactanos</h1>
    <p class="contact-desc">Si tienes alguna duda, queja o reclamo por favor llena el siguiente formulario con tus datos personales y una breve pero detallada descripción de tu problema. Nosotros nos aseguraremos de contactarte en el tiempo de oficina más breve posible para ayudarte.
      <br>
      O tambien puedes contactarnos a nuestro servicio de servicio al cliente por telefono +57 320 45679823 o a nuestra linea de <a href="http://wa.me/573235220204" target="_blank" rel="noopener noreferrer">WhatsApp</a>
    </p>

    <form action="contact.php" method="POST" id="contact-form" class="form">
      <div class="input-container">
        <label for="email-input">Correo Electronico</label>
        <input type="email" name="email" id="email-input">
      </div>
      <div class="input-container">
        <label for="name-input">Nombre Completo</label>
        <input type="text" name="name" id="name-input">
      </div>
      <div class="input-container select-container">
        <label for="pqr-type">Tipo de problema</label>
        <select name="pqr-type" id="pqr-type">
          <option value="0" selected disabled></option>
          <option value="1">Pregunta acerca de nuestros servicios</option>
          <option value="2">Queja sobre nuestros servicios</option>
          <option value="3">Otros reclamos</option>
        </select>
      </div>
      <div class="input-container">
        <label for="desc-input">Descripción de su problema</label>
        <textarea name="desc" id="desc-input" placeholder="Por favor describa su pregunta, queja o reclamo de forma breve pero detallada."></textarea>
      </div>
      <div class="submit-container">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </main>

  <script>
    const active = document.getElementById("link-contact");
    active.classList.add("current");
  </script>
</body>

</html>