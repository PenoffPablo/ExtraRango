<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtraRango</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="bg-light">
  <div>
  
  </div>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    
    <div class="card p-3 form-register">
      <div class="text-center img-form mx-auto">
    <img src="../imagenes/Logo_ExtraRango.png" height= 75px width=250px alt="logo" class="">
    </div>  
    <h1 class="text-center">Iniciar Sesión</h1>

      <form action="../BBDD/base_de_datos.php" METHOD="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" name="name" id="name" class="form-control" pattern="[a-zA-Z]{3,12}" required>
             <ul><li>Debe contener letras de la A a la Z, y debe tener entre 3 y 12 caracteres</li></ul>
        </div>
     
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" name="lastName" id="lastName" class="form-control" pattern="[a-zA-Z]{3,16}" required>
          <ul><li>Debe contener letras de la A a la Z, y debe tener entre 3 y 15 caracteres</li></ul>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Teléfono</label>
          <input type="tel" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" name="pass" id="pass" class="form-control" required>
          <ul><li>Debe contener letras de la A a la Z y algún numero del 0 al 9</li>
              <li>Debe contener de 8 a 16 caracteres </li>
        </ul>
        </div>

        <div class="mb-3">
        <label for="imagen">Selecciona una imagen de perfil:</label>
    <input type="file" id="imagen" name="imagen" required><br>

        </div>
        <ul><li>Formatos permitidos: PNG/JPG</li></ul>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>

        <div class="errores">
          
        /div>
      </form>
    </div>
  </div>
</body>
</html>