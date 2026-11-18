
<?php
require_once __DIR__ . '/includes/session.php';

// Reiniciar la sesión únicamente cuando se solicite.
if (isset($_GET['reiniciar'])) {
    $_SESSION = [];

    session_destroy();

    header('Location: index.php');
    exit;
}

$horaInicio = date('H:i:s', $_SESSION['inicio']);
$horaActual = date('H:i:s');
$tiempoActivo = time() - $_SESSION['inicio'];

$minutos = floor($tiempoActivo / 60);
$segundos = $tiempoActivo % 60;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto PHP | Inicio</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once __DIR__ . '/includes/header.php'; ?>

    <?php require_once __DIR__ . '/includes/menu.php'; ?>

    <main class="container">
        <section class="welcome">
            <h2>Bienvenido al proyecto de PHP</h2>

            <p>
                Este sitio demuestra el uso de variables,
                estructuras de control, arreglos y sesiones
                mediante ejemplos ejecutados con PHP.
            </p>
        </section>

       <?php require_once __DIR__ . '/includes/session-info.php'; ?>
        <a href="index.php?reiniciar=1" class="btn-reiniciar">
             Reiniciar sesión
        </a>
    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
