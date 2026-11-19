<?php
require_once __DIR__ . '/includes/session.php';

/* Datos reales que se van a recorrer */
$lenguajes = ['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'Go'];

$tareas = [
    'Diseñar la base de datos',
    'Crear el formulario de registro',
    'Validar los datos recibidos',
    'Probar el inicio de sesión',
    'Publicar el proyecto',
];

$estudiantes = [
    ['nombre' => 'Ana López',    'materia' => 'Programación',    'calificacion' => 9.5],
    ['nombre' => 'Luis Pérez',   'materia' => 'Bases de datos',  'calificacion' => 6.8],
    ['nombre' => 'María Díaz',   'materia' => 'Redes',           'calificacion' => 8.4],
    ['nombre' => 'Carlos Ruiz',  'materia' => 'Programación',    'calificacion' => 5.9],
    ['nombre' => 'Sofía Gómez',  'materia' => 'Bases de datos',  'calificacion' => 10],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles en PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <?php require_once __DIR__ . '/includes/menu.php'; ?>

    <main class="container">

        <section class="welcome">
            <h2>Bucles obligatorios en PHP</h2>
            <p>
                Los bucles repiten un bloque de código. Aquí se usan
                <strong>for</strong>, <strong>while</strong> y
                <strong>foreach</strong> para recorrer listas, arreglos
                y una tabla generada dinámicamente.
            </p>
        </section>

        <!-- ================= FOR ================= -->
        <section class="session-info">
            <h2>1. Bucle for: recorrer una lista</h2>
            <p>
                Se usa cuando se conoce cuántas veces se repetirá el bloque.
                Recorre el arreglo <code>$lenguajes</code> (<?= count($lenguajes) ?> elementos).
            </p>

            <ol>
                <?php for ($i = 0; $i < count($lenguajes); $i++): ?>
                    <li>
                        <?= htmlspecialchars($lenguajes[$i]) ?>
                        <small>(índice <?= $i ?>)</small>
                    </li>
                <?php endfor; ?>
            </ol>
        </section>

        <!-- ================= WHILE ================= -->
        <section class="session-info">
            <h2>2. Bucle while: recorrer una lista de tareas</h2>
            <p>
                Se repite mientras la condición sea verdadera.
                Aquí avanza mientras queden tareas por mostrar.
            </p>

            <ul>
                <?php
                $posicion = 0;
                $totalTareas = count($tareas);

                while ($posicion < $totalTareas):
                ?>
                    <li>
                        Tarea <?= $posicion + 1 ?> de <?= $totalTareas ?>:
                        <?= htmlspecialchars($tareas[$posicion]) ?>
                    </li>
                <?php
                    $posicion++;
                endwhile;
                ?>
            </ul>
        </section>

        <!-- ================= FOREACH ================= -->
        <section class="session-info">
            <h2>3. Bucle foreach: tabla generada dinámicamente</h2>
            <p>
                Recorre cada elemento de un arreglo sin necesidad de contador.
                Cada estudiante genera una fila de la tabla.
            </p>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Calificación</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estudiantes as $indice => $estudiante): ?>
                        <tr>
                            <td><?= $indice + 1 ?></td>
                            <td><?= htmlspecialchars($estudiante['nombre']) ?></td>
                            <td><?= htmlspecialchars($estudiante['materia']) ?></td>
                            <td><?= $estudiante['calificacion'] ?></td>
                            <td>
                                <?php if ($estudiante['calificacion'] >= 9): ?>
                                    <span class="ok">Excelente</span>
                                <?php elseif ($estudiante['calificacion'] >= 7): ?>
                                    <span class="ok">Aprobado</span>
                                <?php else: ?>
                                    <span class="alerta">Reprobado</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>