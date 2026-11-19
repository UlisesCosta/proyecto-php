<?php
$ejemplosTipos = [
    'Entero (int)' => 25,
    'Decimal (float)' => 3.14,
    'Cadena (string)' => 'Hola, PHP',
    'Booleano (bool)' => true,
    'Arreglo (array)' => ['rojo', 'verde', 'azul'],
    'Objeto (object)' => (object) ['nombre' => 'Ana', 'edad' => 20],
    'Nulo (NULL)' => null,
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de datos | PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php require_once __DIR__ . '/includes/header.php'; ?>

    <?php require_once __DIR__ . '/includes/menu.php'; ?>

    <main class="container">
        <section class="welcome">
            <h2>Tipos de datos y variables en PHP</h2>
            <p>
                Una variable guarda un valor y se crea con el signo <code>$</code>,
                seguido de un nombre. PHP determina automáticamente el tipo según
                el valor asignado; por eso es un lenguaje de tipado dinámico.
            </p>
            <pre><code>$nombre = "Lucía";
$edad = 20;</code></pre>
        </section>

        <section class="welcome">
            <h2>Tipos de datos principales</h2>
            <div class="data-types-grid">
                <article class="data-type">
                    <h3>Entero (int)</h3>
                    <p>Números sin parte decimal, positivos o negativos.</p>
                    <pre><code>$edad = 20;
$temperatura = -5;</code></pre>
                </article>

                <article class="data-type">
                    <h3>Decimal (float)</h3>
                    <p>Números con punto decimal o en notación científica.</p>
                    <pre><code>$precio = 19.99;
$distancia = 1.5e3;</code></pre>
                </article>

                <article class="data-type">
                    <h3>Cadena (string)</h3>
                    <p>Texto delimitado por comillas simples o dobles.</p>
                    <pre><code>$saludo = "Hola";
$ciudad = 'Bogotá';</code></pre>
                </article>

                <article class="data-type">
                    <h3>Booleano (bool)</h3>
                    <p>Representa un valor verdadero o falso: <code>true</code> o <code>false</code>.</p>
                    <pre><code>$esActivo = true;
$esMayor = false;</code></pre>
                </article>

                <article class="data-type">
                    <h3>Arreglo (array)</h3>
                    <p>Agrupa varios valores en una sola variable, con índices o claves.</p>
                    <pre><code>$colores = ["rojo", "verde"];
$persona = ["nombre" =&gt; "Ana", "edad" =&gt; 20];</code></pre>
                </article>

                <article class="data-type">
                    <h3>Objeto (object)</h3>
                    <p>Es una instancia de una clase que puede reunir propiedades y métodos.</p>
                    <pre><code>class Persona {}
$persona = new Persona();</code></pre>
                </article>

                <article class="data-type">
                    <h3>Nulo (NULL)</h3>
                    <p>Indica que una variable no tiene valor asignado.</p>
                    <pre><code>$resultado = null;</code></pre>
                </article>

                <article class="data-type">
                    <h3>Recurso (resource)</h3>
                    <p>
                        Es una referencia a un recurso externo, como un archivo abierto.
                        Algunas funciones como <code>fopen()</code> pueden devolver uno.
                    </p>
                    <pre><code>$archivo = fopen("datos.txt", "r");</code></pre>
                </article>
            </div>
        </section>

        <section class="welcome">
            <h2>Comprobación de tipos en PHP</h2>
            <p>
                Estas variables se crean y evalúan con PHP. <code>gettype()</code>
                devuelve el tipo general de cada valor y <code>var_export()</code>
                muestra una representación legible.
            </p>
            <div class="type-demo">
                <table>
                    <thead>
                        <tr>
                            <th>Ejemplo</th>
                            <th>Valor</th>
                            <th>Tipo detectado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ejemplosTipos as $nombre => $valor): ?>
                            <tr>
                                <td><?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?></td>
                                <td><code><?= htmlspecialchars(var_export($valor, true), ENT_QUOTES, 'UTF-8') ?></code></td>
                                <td><code><?= htmlspecialchars(gettype($valor), ENT_QUOTES, 'UTF-8') ?></code></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="welcome">
            <h2>Funciones y conversiones útiles</h2>
            <ul class="type-functions">
                <li><code>gettype($valor)</code> obtiene el nombre general del tipo.</li>
                <li><code>var_dump($valor)</code> muestra el tipo y el valor; es útil para depurar.</li>
                <li><code>is_int()</code>, <code>is_float()</code>, <code>is_string()</code>, <code>is_bool()</code>, <code>is_array()</code>, <code>is_object()</code> e <code>is_null()</code> comprueban tipos concretos y devuelven un booleano.</li>
                <li><code>settype($variable, "integer")</code> cambia el tipo de la variable original.</li>
                <li><code>(int)</code>, <code>(float)</code>, <code>(string)</code> y <code>(bool)</code> convierten un valor mediante casting, sin cambiar la variable original.</li>
                <li><code>intval()</code>, <code>floatval()</code>, <code>strval()</code> y <code>boolval()</code> también devuelven valores convertidos.</li>
            </ul>
            <pre><code>$cantidad = "12";
$numero = (int) $cantidad; // 12
$esNumero = is_int($numero); // true</code></pre>
            <p>
                PHP también permite declarar tipos para parámetros y valores de retorno,
                por ejemplo: <code>function duplicar(int $numero): int</code>.
            </p>
        </section>
    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>