<?php
require_once __DIR__ . '/includes/session.php';

/* 1) Arreglo INDEXADO: se accede por posición numérica */
$frutas = ['Manzana', 'Plátano', 'Mango', 'Uva', 'Piña', 'Papaya'];

/* 2) Arreglo ASOCIATIVO: se accede por clave */
$alumno = [
    'nombre'   => 'Ana López',
    'carrera'  => 'Ingeniería en Sistemas',
    'ciudad'   => 'Tuxtla Gutiérrez',
    'semestre' => 6,
    'promedio' => 9.2,
    'becado'   => true,
];

/* 3) Arreglo MULTIDIMENSIONAL: arreglo de arreglos */
$productos = [
    ['nombre' => 'Laptop',  'categoria' => 'Cómputo',     'precio' => 15500.00, 'stock' => 8],
    ['nombre' => 'Mouse',   'categoria' => 'Accesorios',  'precio' => 250.50,   'stock' => 0],
    ['nombre' => 'Teclado', 'categoria' => 'Accesorios',  'precio' => 480.00,   'stock' => 3],
    ['nombre' => 'Monitor', 'categoria' => 'Cómputo',     'precio' => 3200.00,  'stock' => 12],
    ['nombre' => 'Webcam',  'categoria' => 'Accesorios',  'precio' => 890.00,   'stock' => 0],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arreglos en PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <?php require_once __DIR__ . '/includes/menu.php'; ?>

    <main class="container">

        <section class="welcome">
            <h2>Arreglos en PHP</h2>
            <p>
                Un arreglo almacena varios valores en una sola variable.
                Aquí se muestran los tres tipos principales, recorridos con
                <strong>foreach</strong> y con condicionales dentro del recorrido.
            </p>
        </section>

        <!-- ================= INDEXADO ================= -->
        <section class="session-info">
            <h2>1. Arreglo indexado</h2>
            <p>Cada elemento tiene una posición numérica que inicia en 0.</p>

            <pre class="codigo">$frutas = ['Manzana', 'Plátano', 'Mango', 'Uva', 'Piña', 'Papaya'];</pre>

            <p><strong>Elementos:</strong> <?= count($frutas) ?></p>
            <p><strong>Acceso directo:</strong> $frutas[2] = <?= $frutas[2] ?></p>

            <ul>
                <?php foreach ($frutas as $posicion => $fruta): ?>
                    <li>
                        [<?= $posicion ?>] <?= htmlspecialchars($fruta) ?>

                        <?php if ($posicion === 0): ?>
                            <span class="ok">→ primer elemento</span>
                        <?php elseif ($posicion === count($frutas) - 1): ?>
                            <span class="ok">→ último elemento</span>
                        <?php elseif (strlen($fruta) > 5): ?>
                            <span class="aviso">→ nombre largo</span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- ================= ASOCIATIVO ================= -->
        <section class="session-info">
            <h2>2. Arreglo asociativo</h2>
            <p>Cada elemento se identifica con una clave (texto) en lugar de un número.</p>

            <pre class="codigo">$alumno = ['nombre' => 'Ana López', 'promedio' => 9.2, ...];</pre>

            <p><strong>Acceso directo:</strong> $alumno['nombre'] = <?= htmlspecialchars($alumno['nombre']) ?></p>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumno as $clave => $valor): ?>
                        <tr>
                            <td><?= htmlspecialchars($clave) ?></td>
                            <td>
                                <?php
                                if (is_bool($valor)) {
                                    echo $valor ? 'Sí' : 'No';
                                } else {
                                    echo htmlspecialchars((string) $valor);
                                }
                                ?>
                            </td>
                            <td><?= gettype($valor) ?></td>
                            <td>
                                <?php if ($clave === 'promedio' && $valor >= 9): ?>
                                    <span class="ok">Excelente promedio</span>
                                <?php elseif ($clave === 'semestre' && $valor > 5): ?>
                                    <span class="aviso">Segunda mitad de la carrera</span>
                                <?php elseif ($clave === 'becado' && $valor === true): ?>
                                    <span class="ok">Cuenta con beca</span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- ================= MULTIDIMENSIONAL ================= -->
        <section class="session-info">
            <h2>3. Arreglo multidimensional</h2>
            <p>Es un arreglo cuyos elementos son otros arreglos (aquí, una lista de productos).</p>

            <pre class="codigo">$productos = [
    ['nombre' => 'Laptop', 'precio' => 15500.00, 'stock' => 8],
    ['nombre' => 'Mouse',  'precio' => 250.50,   'stock' => 0],
    ...
];</pre>

            <p>
                <strong>Acceso directo:</strong>
                $productos[3]['nombre'] = <?= htmlspecialchars($productos[3]['nombre']) ?>
            </p>

            <?php
            $totalInventario = 0;
            $agotados = 0;
            ?>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $indice => $producto): ?>
                        <?php
                        $totalInventario += $producto['precio'] * $producto['stock'];
                        if ($producto['stock'] === 0) {
                            $agotados++;
                        }
                        ?>
                        <tr>
                            <td><?= $indice + 1 ?></td>
                            <td><?= htmlspecialchars($producto['nombre']) ?></td>
                            <td><?= htmlspecialchars($producto['categoria']) ?></td>
                            <td>$<?= number_format($producto['precio'], 2) ?></td>
                            <td><?= $producto['stock'] ?></td>
                            <td>
                                <?php if ($producto['stock'] === 0): ?>
                                    <span class="alerta">Agotado</span>
                                <?php elseif ($producto['stock'] <= 5): ?>
                                    <span class="aviso">Pocas unidades</span>
                                <?php else: ?>
                                    <span class="ok">Disponible</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <strong>Productos agotados:</strong> <?= $agotados ?><br>
                <strong>Valor total del inventario:</strong> $<?= number_format($totalInventario, 2) ?>
            </p>

            <h3>Foreach anidado: productos agrupados por categoría</h3>
            <?php
            $porCategoria = [];
            foreach ($productos as $producto) {
                $porCategoria[$producto['categoria']][] = $producto;
            }
            ?>

            <?php foreach ($porCategoria as $categoria => $lista): ?>
                <p><strong><?= htmlspecialchars($categoria) ?></strong> (<?= count($lista) ?> productos)</p>
                <ul>
                    <?php foreach ($lista as $item): ?>
                        <li>
                            <?= htmlspecialchars($item['nombre']) ?>
                            <?php if ($item['precio'] > 1000): ?>
                                <span class="aviso">(costoso)</span>
                            <?php else: ?>
                                <span class="ok">(económico)</span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </section>

    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>