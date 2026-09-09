<?php
$file = $_GET['file'] ?? 'welcome.txt';

$path = __DIR__ . '/files/' . $file;

if (file_exists($path)) {
    echo "<pre>";
    echo htmlspecialchars(file_get_contents($path));
    echo "</pre>";
} else {
    echo "Archivo no encontrado.";
}
?>
