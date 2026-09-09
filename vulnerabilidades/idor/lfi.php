<?php
$file = "";
$content = "";
if (isset($_GET['page'])) {
    $file = $_GET['page'];
    // ⚠️ VULNERABILIDAD LFI: Inclusión directa sin sanitización ni restricciones de directorio
    if (file_exists($file)) {
        $content = file_get_contents($file);
    } else {
        $content = "Archivo no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - Local File Inclusion</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #c9d1d9; padding: 20px; }
        h2 { color: #58a6ff; }
        select, button { background: #161b22; border: 1px solid #30363d; color: #c9d1d9; padding: 8px; }
        button { background: #238636; cursor: pointer; }
        pre { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 15px; }
        a { color: #58a6ff; }
    </style>
</head>
<body>
    <h2>Laboratorio: Local File Inclusion (LFI)</h2>
    <form method="GET">
        <select name="page">
            <option value="about.php">Sobre nosotros</option>
            <option value="contacto.php">Contacto</option>
        </select>
        <button type="submit">Cargar</button>
    </form>

    <?php if ($file !== ""): ?>
        <pre><?php echo htmlspecialchars($content); ?></pre>
    <?php endif; ?>

    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
