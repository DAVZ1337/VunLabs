<?php
$mensaje = "";

if (isset($_POST['subir'])) {
    // Comprobamos si se ha seleccionado un archivo
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['archivo']['name'];
        $ruta_temporal = $_FILES['archivo']['tmp_name'];
        
        // Carpeta donde se guardarán los archivos subidos
        $carpeta_destino = "uploads/";
        
        // Creamos la carpeta si no existe
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }
        
        $ruta_final = $carpeta_destino . basename($nombre_archivo);

        // ⚠️ VULNERABLE: No se valida la extensión ni el contenido del archivo.
        // Cualquiera puede subir un archivo .php malicioso.
        if (move_uploaded_file($ruta_temporal, $ruta_final)) {
            $mensaje = "¡Archivo subido con éxito! Puedes acceder a él aquí: <a href='$ruta_final' target='_blank'>$nombre_archivo</a>";
        } else {
            $mensaje = "Error al mover el archivo al servidor.";
        }
    } else {
        $mensaje = "Por favor, selecciona un archivo válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs - Subida de Ficheros Insegura</title>
</head>
<body>
    <h1>Laboratorio de Subida de Ficheros (File Upload)</h1>
    <p>Sube tu imagen de perfil:</p>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <button type="submit" name="subir">Subir archivo</button>
    </form>

    <div>
        <p style="color: green;"><?php echo $mensaje; ?></p>
    </div>

    <hr>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
