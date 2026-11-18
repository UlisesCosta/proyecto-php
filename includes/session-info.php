<?php

$horaInicio = $_SESSION['inicio'];
$horaActual = time();

$tiempoActivo = $horaActual - $horaInicio;

$minutos = floor($tiempoActivo / 60);
$segundos = $tiempoActivo % 60;
?>

<section class="session-info">
    <h2>Información de la sesión</h2>

    <p>
        <strong>Hora de inicio:</strong>
        <?= date('H:i:s', $horaInicio) ?>
    </p>

    <p>
        <strong>Hora actual:</strong>
        <?= date('H:i:s', $horaActual) ?>
    </p>

    <p>
        <strong>Tiempo activo:</strong>
        <?= $minutos ?> minutos y <?= $segundos ?> segundos
    </p>
</section>