<?php
$url = $_GET['url'] ?? '';

if ($url !== '') {
    header("Location: " . $url);
    exit;
}

echo '<h1>Open Redirect Lab</h1>';
echo '<p>Usa ?url= para indicar el destino.</p>';
?>
