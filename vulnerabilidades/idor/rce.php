<?php
$output = "";
if (isset($_POST['cmd'])) {
    $cmd = $_POST['cmd'];
    // ⚠️ VULNERABILIDAD RCE: Ejecución directa de comandos del sistema operativo
    $output = shell_exec($cmd);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - Remote Code Execution</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #c9d1d9; padding: 20px; }
        h2 { color: #58a6ff; }
        input { background: #161b22; border: 1px solid #30363d; color: #c9d1d9; padding: 8px; width: 300px; }
        button { background: #238636; color: #fff; border: none; padding: 8px 15px; cursor: pointer; }
        pre { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 15px; }
        a { color: #58a6ff; }
    </style>
</head>
<body>
    <h2>Laboratorio: Remote Code Execution (RCE)</h2>
    <form method="POST">
        <input type="text" name="cmd" placeholder="Ej. whoami o id">
        <button type="submit">Ejecutar</button>
    </form>

    <?php if ($output !== ""): ?>
        <pre><?php echo htmlspecialchars($output); ?></pre>
    <?php endif; ?>

    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
