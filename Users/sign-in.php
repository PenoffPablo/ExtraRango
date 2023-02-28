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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
  <div>
  
  </div>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    
    <div class="card p-3 w-50 form">
      <div class="text-center">
    <img src="../imagenes/Logo_ExtraRango.png" height= 75px width=250px alt="logo">
    </div>  
    <h1 class="text-center">Iniciar Sesión</h1>
      <form action="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" name="lastName" id="lastName" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Constraseña</label>
          <input type="text" name="lastName" id="lastName" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Confirmar Contraseña</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>