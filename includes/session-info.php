
<?php
$horaInicio = date('H:i:s', $_SESSION['inicio']);
$horaActual = date('H:i:s');

$tiempoActivo = time() - $_SESSION['inicio'];

$minutos = floor($tiempoActivo / 60);
$segundos = $tiempoActivo % 60;
?>

<section class="session-info">
    <h2>Información de la sesión</h2>

    <p>
        <strong>Hora de inicio:</strong>
        <?= htmlspecialchars($horaInicio) ?>
    </p>

    <p>
        <strong>Hora actual:</strong>
        <?= htmlspecialchars($horaActual) ?>
    </p>

    <p>
        <strong>Tiempo activo:</strong>
        <?= $minutos ?> minutos y <?= $segundos ?> segundos
    </p>
</section>
