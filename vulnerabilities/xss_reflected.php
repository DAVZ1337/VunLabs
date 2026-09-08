<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs - Laboratorio XSS Reflejado</title>
</head>
<body>
    <h1>Laboratorio de XSS Reflejado</h1>
    <p>Introduce tu nombre para saludarte:</p>

    <form method="GET" action="">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <button type="submit">Enviar</button>
    </form>

    <hr>

    <div>
        <?php
        // ⚠️ VULNERABLE: Se imprime directamente el parámetro GET sin escapar ni sanitizar
        if (isset($_GET['nombre'])) {
            echo "<h3>Hola, " . $_GET['nombre'] . "</h3>";
        }
        ?>
    </div>

    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
