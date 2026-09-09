<?php
$input = "";
if (isset($_GET['search'])) {
    $input = $_GET['search']; // ⚠️ VULNERABILIDAD: No se sanitiza ni escapa la entrada del usuario
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VunLabs - XSS Reflejado</title>
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
    <h2>Laboratorio: XSS Reflejado</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Busca algo...">
        <button type="submit">Buscar</button>
    </form>

    <?php if ($input !== ""): ?>
        <div class="box">
            <p>Resultados para la búsqueda: <strong><?php echo $input; ?></strong></p>
        </div>
    <?php endif; ?>

    <br><hr>
    <a href="../index.php">&lt;&lt; Volver al inicio</a>
</body>
</html>
