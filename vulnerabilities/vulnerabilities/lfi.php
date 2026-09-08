<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs - Laboratorio LFI</title>
</head>
<body>
    <h1>Laboratorio de Local File Inclusion (LFI)</h1>
    <p>Selecciona una página para cargar:</p>

    <ul>
        <li><a href="lfi.php?page=inicio.php">Inicio</a></li>
        <li><a href="lfi.php?page=contacto.php">Contacto</a></li>
    </ul>

    <hr>

    <div style="background: #f0f0f0; padding: 10px;">
        <?php
        // ⚠️ VULNERABLE: Se incluye directamente el parámetro GET sin filtrar
        if (isset($_GET['page'])) {
            $archivo = $_GET['page'];
            @include($archivo);
        } else {
            echo "<p>Bienvenido a la sección principal.</p>";
        }
        ?>
    </div>

    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
