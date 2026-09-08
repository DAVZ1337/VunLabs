<?php
$archivo_comentarios = "comentarios.txt";

// Si se envía un comentario, lo guardamos sin filtrar
if (isset($_POST['usuario']) && isset($_POST['comentario'])) {
    $usuario = $_POST['usuario'];
    $comentario = $_POST['comentario']; // ⚠️ VULNERABLE: No se escanea ni se limpia
    
    $linea = "<div style='border-left: 3px solid #0f0; padding-left: 10px; margin-bottom: 10px;'><strong>" . $usuario . "</strong>: " . $comentario . "</div>\n";
    
    file_put_contents($archivo_comentarios, $linea, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs // Terminal Board - Stored XSS</title>
    <style>
        body { background-color: #0d1117; color: #c9d1d9; font-family: monospace; padding: 20px; }
        h1 { color: #58a6ff; }
        input, textarea { background: #161b22; border: 1px solid #30363d; color: #c9d1d9; padding: 8px; width: 100%; margin-bottom: 10px; }
        button { background: #238636; color: #fff; border: none; padding: 10px 20px; cursor: pointer; font-family: monospace; }
        button:hover { background: #2ea043; }
        .chat-box { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>[BULLABS // SECURE_COMMS_FORUM]</h1>
    <p>Canal de transmisiones públicas interceptadas. Deja tu payload:</p>

    <form method="POST">
        <label>Alias de Hacker:</label>
        <input type="text" name="usuario" placeholder="Ej. Anonymous" required>
        
        <label>Mensaje / Payload:</label>
        <textarea name="comentario" rows="3" placeholder="Escribe tu mensaje o script..." required></textarea>
        
        <button type="submit">Transmitir al servidor</button>
    </form>

    <div class="chat-box">
        <h3>Historial de Transmisiones:</h3>
        <?php
        // Mostramos los comentarios guardados
        if (file_exists($archivo_comentarios)) {
            echo file_get_contents($archivo_comentarios);
        } else {
            echo "<p style='color: #8b949e;'>No hay transmisiones registradas.</p>";
        }
        ?>
    </div>

    <br>
    <a href="../index.php" style="color: #58a6ff;">&lt;&lt; Volver al inicio</a>
</body>
</html>
