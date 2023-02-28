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
<body class="bg-light custom-margin">
    <header>
    <?php
    include_once("header.php");
    include_once("Carrusel.php");
    ?>
    
    </header>
    <?php
     include_once("Carrusel.php");
    ?>

   <main>
        <?php
        include_once("main.php")
        ?>
    </main>
<footer>
    <?php
    include_once("footer.php")
    ?>
</footer>

</body>
</html>