<?php
// Simulamos una base de datos de usuarios
$usuarios = [
    1 => ["nombre" => "Admin", "email" => "admin@bullabs.local", "secreto" => "FLAG{admin_secret_123}"],
    2 => ["nombre" => "Juan", "email" => "juan@bullabs.local", "secreto" => "Contraseña de Juan: 123456"],
    3 => ["nombre" => "Laura", "email" => "laura@bullabs.local", "secreto" => "Tarjeta de crédito secreta: 4000-1234-5678"]
];

$id_solicitado = isset($_GET['id']) ? intval($_GET['id']) : 2; // Por defecto muestra el ID 2 (Juan)
$datos_usuario = null;

// ⚠️ VULNERABLE: No se valida si el usuario actual tiene permiso para ver este ID. 
// Cualquiera puede cambiar el número en la URL y ver los datos de otros perfiles.
if (array_key_exists($id_solicitado, $usuarios)) {
    $datos_usuario = $usuarios[$id_solicitado];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs - Laboratorio IDOR</title>
</head>
<body>
    <h1>Laboratorio de IDOR (Control de Acceso Roto)</h1>
    <p>Estás viendo el perfil de usuario:</p>

    <?php if ($datos_usuario): ?>
        <div style="border: 1px solid #ccc; padding: 15px; width: 300px;">
            <p><strong>ID de Usuario:</strong> <?php echo $id_solicitado; ?></p>
            <p><strong>Nombre:</strong> <?php echo $datos_usuario['nombre']; ?></p>
            <p><strong>Email:</strong> <?php echo $datos_usuario['email']; ?></p>
            <p style="color: red;"><strong>Dato Confidencial:</strong> <?php echo $datos_usuario['secreto']; ?></p>
        </div>
    <?php else: ?>
        <p style="color: red;">El usuario no existe.</p>
    <?php endif; ?>

    <p style="marginTop: 20px;">Prueba a cambiar el número de ID en la barra de direcciones (por ejemplo, <code>?id=1</code> o <code>?id=3</code>).</p>

    <hr>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
