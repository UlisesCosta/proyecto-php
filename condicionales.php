<?php
$resultadoEdad = null;
$errorEdad = null;
$resultadoDia = null;
$errorDia = null;
$edadIngresada = '';
$diaIngresado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ejemplo = $_POST['ejemplo'] ?? '';

    if (!is_string($ejemplo)) {
        $ejemplo = '';
    }

    if ($ejemplo === 'edad') {
        $entrada = $_POST['edad'] ?? '';
        $edadIngresada = is_string($entrada) ? $entrada : '';
        $edad = filter_var($edadIngresada, FILTER_VALIDATE_INT);

        if ($edad === false || $edad < 0 || $edad > 120) {
            $errorEdad = 'Ingresa una edad entera entre 0 y 120.';
        } elseif ($edad < 13) {
            $resultadoEdad = 'Tienes ' . $edad . ' años: estás en la niñez.';
        } elseif ($edad < 18) {
            $resultadoEdad = 'Tienes ' . $edad . ' años: estás en la adolescencia.';
        } else {
            $resultadoEdad = 'Tienes ' . $edad . ' años: eres mayor de edad.';
        }
    } elseif ($ejemplo === 'dia') {
        $entrada = $_POST['dia'] ?? '';
        $diaIngresado = is_string($entrada) ? $entrada : '';
        $dia = filter_var($diaIngresado, FILTER_VALIDATE_INT);

        if ($dia === false || $dia < 1 || $dia > 7) {
            $errorDia = 'Selecciona un día válido.';
        } else {
            switch ($dia) {
                case 1:
                    $resultadoDia = 'Lunes: es un día laboral.';
                    break;
                case 2:
                    $resultadoDia = 'Martes: es un día laboral.';
                    break;
                case 3:
                    $resultadoDia = 'Miércoles: es un día laboral.';
                    break;
                case 4:
                    $resultadoDia = 'Jueves: es un día laboral.';
                    break;
                case 5:
                    $resultadoDia = 'Viernes: es un día laboral.';
                    break;
                case 6:
                case 7:
                    $resultadoDia = 'Es fin de semana.';
                    break;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionales | PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once __DIR__ . '/includes/header.php'; ?>

    <?php require_once __DIR__ . '/includes/menu.php'; ?>

    <main class="container">
        <section class="welcome">
            <h2>Condicionales en PHP</h2>
            <p>
                Las condicionales permiten que un programa tome decisiones. PHP evalúa
                una expresión y ejecuta el bloque que corresponde según sea verdadera
                o falsa. Las expresiones suelen comparar valores, por ejemplo con
                <code>===</code>, <code>!==</code>, <code>&gt;</code> o <code>&lt;=</code>;
                también se pueden combinar con <code>&amp;&amp;</code> (y),
                <code>||</code> (o) y <code>!</code> (no).
            </p>
        </section>

        <section class="welcome">
            <h2>Estructuras condicionales</h2>
            <div class="data-types-grid">
                <article class="data-type">
                    <h3>if</h3>
                    <p>Ejecuta un bloque únicamente cuando la condición se cumple.</p>
                    <pre><code>$llueve = true;

if ($llueve) {
    echo "Lleva un paraguas.";
}</code></pre>
                </article>

                <article class="data-type">
                    <h3>if / else</h3>
                    <p>Elige entre dos caminos: uno si la condición es verdadera y otro si es falsa.</p>
                    <pre><code>if ($temperatura &gt; 25) {
    echo "Hace calor.";
} else {
    echo "No hace calor.";
}</code></pre>
                </article>

                <article class="data-type">
                    <h3>if / elseif / else</h3>
                    <p>Evalúa varias condiciones en orden; se ejecuta la primera que resulte verdadera.</p>
                    <pre><code>if ($edad &lt; 13) {
    echo "Niñez";
} elseif ($edad &lt; 18) {
    echo "Adolescencia";
} else {
    echo "Mayor de edad";
}</code></pre>
                </article>

                <article class="data-type">
                    <h3>switch</h3>
                    <p>Compara una expresión con varios valores posibles. <code>break</code> evita continuar con el siguiente caso.</p>
                    <pre><code>switch ($dia) {
    case 6:
    case 7:
        echo "Fin de semana";
        break;
    default:
        echo "Día laboral";
}</code></pre>
                </article>
            </div>
        </section>

        <section class="welcome">
            <h2>Ejemplo dinámico: if, elseif y else</h2>
            <p>
                Escribe una edad para que PHP la evalúe y clasifique el resultado.
                Cambia la edad para probar las distintas ramas de la condicional.
            </p>
            <form class="decision-form" method="post" action="condicionales.php">
                <input type="hidden" name="ejemplo" value="edad">
                <label for="edad">Edad (0 a 120 años)</label>
                <input
                    type="number"
                    id="edad"
                    name="edad"
                    min="0"
                    max="120"
                    step="1"
                    value="<?= htmlspecialchars($edadIngresada, ENT_QUOTES, 'UTF-8') ?>"
                    required
                >
                <button type="submit">Evaluar edad</button>
            </form>

            <?php if ($resultadoEdad !== null): ?>
                <p class="decision-result" role="status"><?= htmlspecialchars($resultadoEdad, ENT_QUOTES, 'UTF-8') ?></p>
            <?php elseif ($errorEdad !== null): ?>
                <p class="decision-result decision-error" role="alert"><?= htmlspecialchars($errorEdad, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </section>

        <section class="welcome">
            <h2>Ejemplo dinámico: switch</h2>
            <p>
                Selecciona un día. La estructura <code>switch</code> identifica el caso
                y muestra si es un día laboral o fin de semana.
            </p>
            <form class="decision-form" method="post" action="condicionales.php">
                <input type="hidden" name="ejemplo" value="dia">
                <label for="dia">Día de la semana</label>
                <select id="dia" name="dia" required>
                    <option value="">Selecciona un día</option>
                    <option value="1" <?= $diaIngresado === '1' ? 'selected' : '' ?>>Lunes</option>
                    <option value="2" <?= $diaIngresado === '2' ? 'selected' : '' ?>>Martes</option>
                    <option value="3" <?= $diaIngresado === '3' ? 'selected' : '' ?>>Miércoles</option>
                    <option value="4" <?= $diaIngresado === '4' ? 'selected' : '' ?>>Jueves</option>
                    <option value="5" <?= $diaIngresado === '5' ? 'selected' : '' ?>>Viernes</option>
                    <option value="6" <?= $diaIngresado === '6' ? 'selected' : '' ?>>Sábado</option>
                    <option value="7" <?= $diaIngresado === '7' ? 'selected' : '' ?>>Domingo</option>
                </select>
                <button type="submit">Evaluar día</button>
            </form>

            <?php if ($resultadoDia !== null): ?>
                <p class="decision-result" role="status"><?= htmlspecialchars($resultadoDia, ENT_QUOTES, 'UTF-8') ?></p>
            <?php elseif ($errorDia !== null): ?>
                <p class="decision-result decision-error" role="alert"><?= htmlspecialchars($errorDia, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </section>
    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>