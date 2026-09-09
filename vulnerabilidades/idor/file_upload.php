<?php
$mensaje = "";
if (isset($_FILES['archivo'])) {
    $nombre_archivo = $_FILES['archivo']['name'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    $destino = "uploads/" . basename($nombre_archivo);

    // Crear la carpeta uploads si no existe
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // ⚠️ VULNERABILIDAD FILE UPLOAD: No se valida la extensión, tipo MIME ni tamaño del archivo
    if (move_uploaded_file($ruta_temporal, $destino)) {
        $mensaje = "¡Archivo subido con éxito! <a href='$destino' target='_blank'>Ver archivo</a>";
    } else {
        $mensaje = "Error al subir el archivo.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - File Upload</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #c9d1d9; padding: 20px; }
        h2 { color: #58a6ff; }
        input, button { background: #161b22; border: 1px solid #30363d; color: #c9d1d9; padding: 8px; }
        button { background: #238636; cursor: pointer; }
        .box { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 15px; }
        a { color: #58a6ff; }
    </style>
</head>
<body>
    <h2>Laboratorio: Unrestricted File Upload</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <button type="submit">Subir archivo</button>
    </form>

    <?php if ($mensaje !== ""): ?>
        <div class="box">
            <p><?php echo $mensaje; ?></p>
        </div>
    <?php endif; ?>

    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
