<?php
// conexion.php (puedes integrarlo o ponerlo en archivoAparte)
$conexion = new mysqli("localhost", "root", "", "bullabs_db");

$resultado = "";
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];
    
    // ⚠️ VULNERABLE: Concatenación directa sin sanitizar ni usar prepared statements
    $query = "SELECT * FROM usuarios WHERE nombre = '$busqueda'";
    $resultado = $conexion->query($query);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bullabs - Lab SQLi</title>
</head>
<body>
    <h1>Laboratorio de Inyección SQL</h1>
    <form method="POST">
        <label>Buscar usuario:</label>
        <input type="text" name="busqueda">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <div>
        <?php
        if ($resultado && $resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                echo "<p>Usuario encontrado: " . $row['nombre'] . " - Email: " . $row['email'] . "</p>";
            }
        } elseif (isset($_POST['buscar'])) {
            echo "<p>No se encontraron resultados.</p>";
        }
        ?>
    </div>
</body>
</html>
