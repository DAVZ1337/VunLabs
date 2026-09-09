<?php
session_start();
// Simulamos un usuario logueado
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = "usuario@vunlabs.local";
}

$mensaje = "";
if (isset($_POST['nuevo_email'])) {
    // ⚠️ VULNERABILIDAD CSRF: No hay token anti-CSRF ni verificación de la petición previa
    $_SESSION['email'] = $_POST['nuevo_email'];
    $mensaje = "¡Email actualizado con éxito a: " . htmlspecialchars($_SESSION['email']) . "!";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - CSRF</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #c9d1d9; padding: 20px; }
        h2 { color: #58a6ff; }
        input { background: #161b22; border: 1px solid #30363d; color: #c9d1d9; padding: 8px; }
        button { background: #238636; color: #fff; border: none; padding: 8px 15px; cursor: pointer; }
        .box { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 15px; }
        a { color: #58a6ff; }
    </style>
</head>
<body>
    <h2>Laboratorio: Cross-Site Request Forgery (CSRF)</h2>
    <p>Email actual en tu sesión: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>

    <form method="POST">
        <input type="email" name="nuevo_email" placeholder="nuevo@correo.com" required>
        <button type="submit">Cambiar Email</button>
    </form>

    <?php if ($mensaje !== ""): ?>
        <div class="box">
            <p style="color: #3fb950;"><?php echo $mensaje; ?></p>
        </div>
    <?php endif; ?>

    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
