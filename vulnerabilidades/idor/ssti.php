<?php
$template = $_GET['name'] ?? 'World';

// Vulnerable: la entrada del usuario se trata como una plantilla.
$output = str_replace(
    ['{{name}}', '{{7*7}}'],
    [$template, '49'],
    $template
);

echo "<h1>SSTI Lab</h1>";
echo "<p>Resultado:</p>";
echo "<pre>" . htmlspecialchars($output) . "</pre>";
?>
