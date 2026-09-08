<?php
$output = "";

if (isset($_POST['ip'])) {
    $ip = $_POST['ip'];
    
    // ⚠️ VULNERABLE: Se pasa el input del usuario directamente al sistema operativo
    // En Linux se pueden concatenar comandos usando operadores como ';', '&&' o '|'
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        // Entorno Windows
        $output = shell_exec("ping " . $ip);
    } else {
        // Entorno Linux / Termux
        $output = shell_exec("ping -c 3 " . $ip);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs - Inyección de Comandos</title>
</head>
<body>
    <h1>Laboratorio de Inyección de Comandos</h1>
    <p>Introduce una dirección IP para comprobar la conectividad (Ping):</p>

    <form method="POST">
        <input type="text" name="ip" placeholder="Ej. 127.0.0.1">
        <button type="submit">Comprobar</button>
    </form>

    <h3>Resultado:</h3>
    <pre style="background: #000; color: #0f0; padding: 10px;"><?php echo htmlspecialchars($output); ?></pre>

    <hr>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
