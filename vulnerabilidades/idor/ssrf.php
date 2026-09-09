<?php
$result = "";
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    // ⚠️ VULNERABILIDAD SSRF: No se valida ni restringe la URL que el servidor va a consultar
    $result = @file_get_contents($url);
    if ($result === false) {
        $result = "Error al conectar con la URL o recurso no disponible.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - SSRF</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #c9d1d9; padding: 20px; }
        h2 { color: #58a6ff; }
        input { background: #161b22; border: 1px solid #30363d; color: #c9d1d9; padding: 8px; width: 350px; }
        button { background: #238636; color: #fff; border: none; padding: 8px 15px; cursor: pointer; }
        pre { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 15px; max-height: 300px; overflow-y: auto; }
        a { color: #58a6ff; }
    </style>
</head>
<body>
    <h2>Laboratorio: Server-Side Request Forgery (SSRF)</h2>
    <form method="GET">
        <input type="text" name="url" placeholder="http://example.com" value="<?php echo isset($_GET['url']) ? htmlspecialchars($_GET['url']) : ''; ?>">
        <button type="submit">Consultar</button>
    </form>

    <?php if ($result !== ""): ?>
        <pre><?php echo htmlspecialchars($result); ?></pre>
    <?php endif; ?>

    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
