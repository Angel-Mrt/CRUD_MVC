<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud MVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/app.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>
<header class="header">
    <div class="contenedor contenido-header">
        <div class="titulo">
            <h1>CRUD MVC</h1>
        </div>
        <div class="barra">
            <img src="../build/img/dark-mode.svg" class="dark-mode-boton" alt="Boton Modo Oscuro">
        </div> <!--Barra-->
    </div><!---->
</header>


<body>
    <main class="contenedor seccion">
        <?php echo $contenido; ?>

    </main>
    <footer class="footer seccion">
        <p class="copyright"> Todos los derechos Resevados <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="../build/js/app.js"></script>
    <?php include_once __DIR__ . "/templates/scripts.php"; ?>
</body>

</html>