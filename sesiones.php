<?php
require_once __DIR__ . '/includes/session.php';

if (isset($_GET['reiniciar'])) {
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <?php require_once __DIR__ . '/includes/menu.php'; ?>

    <main class="container">

        <section class="welcome">
            <h2>Manejo de sesiones en PHP</h2>

            <p>
                Las sesiones permiten almacenar información temporal
                de un usuario en el servidor y mantenerla disponible
                mientras navega entre diferentes páginas.
            </p>
        </section>

        <?php require_once __DIR__ . '/includes/session-info.php'; ?>

        <section class="session-info">
            <h2>Datos almacenados en la sesión</h2>

            <p>
                <strong>Variable utilizada:</strong>
                $_SESSION['inicio']
            </p>

            <p>
                <strong>Valor almacenado:</strong>
                <?= $_SESSION['inicio'] ?>
            </p>

            <p>
                <strong>Tipo de dato:</strong>
                <?= gettype($_SESSION['inicio']) ?>
            </p>

            <p>
                <strong>Marca de tiempo:</strong>
                <?= date('d/m/Y H:i:s', $_SESSION['inicio']) ?>
            </p>
        </section>

        <section class="session-info">
            <h2>Reiniciar sesión</h2>

            <p>
                Esta acción destruye la sesión actual y crea una nueva,
                registrando una nueva hora de inicio.
            </p>

            <a href="index.php?reiniciar=1">
                Reiniciar sesión
            </a>
        </section>

    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
