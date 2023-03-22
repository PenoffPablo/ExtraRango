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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>


<body>
    <header>
        <?php 
        include_once("../Main/header.php")
        ?>
        </header
    <div class="container-fluid mt-4">
        <div class="row mx-auto">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Imagen de perfil" class="img-fluid rounded-circle mb-2">
                        <h5 class="card-title">Nombre de usuario</h5>
                        <p class="card-text">Correo electrónico: usuario@correo.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-3 w-80">
                    <div class="card-body">
                        <h5 class="card-title">Información personal</h5>
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" value="Nombre de usuario">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" value="Apellido de usuario">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" value="555-5555">
                                </div>
                                <br>
                                <a href="#"><h5>¿Desea cambiar su contraseña?</h5></a><br>
                                <a href="#"><h5>¿Desea cambiar su correo electrónico?</h5></a><br>
                                <a href="#"><h5>Preguntas frecuentes</h5></a><br>
                               <a href="#"><h5>Cerrar Sesión</h5><br></a>
                            </div>
                        </div>
                    </div>
</body>
</html>