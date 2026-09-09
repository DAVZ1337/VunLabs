<?php
// Simulación de base de datos de perfiles de usuario
$usuarios = [
    1 => ["nombre" => "Admin Root", "rol" => "Administrador", "secreto" => "FLAG{idor_master_1337}"],
    2 => ["nombre" => "Juan Pérez", "rol" => "Usuario", "secreto" => "Mi contraseña de correo es 12345"],
    3 => ["nombre" => "Laura Gómez", "rol" => "Usuario", "secreto" => "Borrador del post secreto del blog."]
];

// ID por defecto o el que pida el usuario por GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 2;

// ⚠️ VULNERABILIDAD IDOR: No se comprueba si el usuario logueado tiene permiso para ver este ID
$perfil = isset($usuarios[$id]) ? $usuarios[$id] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - IDOR</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #c9d1d9; padding: 20px; }
        h2 { color: #58a6ff; }
        .box { background: #161b22; border: 1px solid #30363d; padding: 15px; margin-top: 15px; }
        a { color: #58a6ff; }
    </style>
</head>
<body>
    <h2>Laboratorio: IDOR (Insecure Direct Object Reference)</h2>
    <p>Estás viendo el perfil de usuario:</p>

    <?php if ($perfil): ?>
        <div class="box">
            <p><strong>ID de Usuario:</strong> <?php echo $id; ?></p>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($perfil['nombre']); ?></p>
            <p><strong>Rol:</strong> <?php echo htmlspecialchars($perfil['rol']); ?></p>
            <p style="color: #ff7b72;"><strong>Información Privada:</strong> <?php echo htmlspecialchars($perfil['secreto']); ?></p>
        </div>
    <?php else: ?>
        <p style="color: red;">El usuario no existe.</p>
    <?php endif; ?>

    <p style="margin-top: 20px;">Prueba a cambiar el parámetro en la URL (ej. <code>?id=1</code>).</p>
    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
