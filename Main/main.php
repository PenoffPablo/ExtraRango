<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtraRango</title>
</head>
<body class="container-fluid">
    <div class="row">

    <div class="col-3 navigation">
   <?php
   include_once("nav.php")
   ?> 
    </div>

    <div class="col-8 container">
    <?php
   include_once("productos.php")
   ?> 
    </div>
    </div>

    <script>

        document.querySelectorAll('a.refresh').forEach(enlace => {
            enlace.addEventListener('click', function(evento) {
                evento.preventDefault();
                let url = this.href;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', url);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        let contenido = document.querySelector('#contenido');
                        contenido.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            });
        });
    </script>
</body>
</html>