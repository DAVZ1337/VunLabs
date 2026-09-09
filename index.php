<?php
$labs = [
    [
        "name" => "SQL Injection",
        "description" => "Laboratorio para estudiar vulnerabilidades de inyección SQL.",
        "file" => "vulnerabilities/sqli.php",
        "tag" => "SQLi",
        "level" => "Medium"
    ],
    [
        "name" => "Reflected XSS",
        "description" => "Laboratorio para comprender Cross-Site Scripting reflejado.",
        "file" => "vulnerabilities/xss_reflected.php",
        "tag" => "XSS",
        "level" => "Easy"
    ],
    [
        "name" => "Command Injection",
        "description" => "Laboratorio educativo sobre ejecución de comandos mediante entradas no validadas.",
        "file" => "vulnerabilities/command_injection.php",
        "tag" => "CMD",
        "level" => "Medium"
    ],
    [
        "name" => "File Upload",
        "description" => "Laboratorio sobre problemas de seguridad relacionados con subida de archivos.",
        "file" => "vulnerabilities/upload.php",
        "tag" => "Upload",
        "level" => "Medium"
    ],
    [
        "name" => "IDOR",
        "description" => "Laboratorio para estudiar controles de acceso y referencias directas inseguras.",
        "file" => "vulnerabilities/idor.php",
        "tag" => "IDOR",
        "level" => "Medium"
    ],
    [
        "name" => "Local File Inclusion",
        "description" => "Laboratorio educativo sobre inclusión insegura de archivos locales.",
        "file" => "vulnerabilities/lfi.php",
        "tag" => "LFI",
        "level" => "Hard"
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VunLabs | Vulnerability Laboratory</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #080b10;
            color: #f1f5f9;
            min-height: 100vh;
        }

        header {
            border-bottom: 1px solid #202733;
            background: #0b0f15;
            padding: 22px 7%;
        }

        .nav {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .logo span {
            color: #22c55e;
        }

        .status {
            color: #22c55e;
            font-size: 13px;
            border: 1px solid #14532d;
            padding: 7px 12px;
            border-radius: 20px;
            background: #052e16;
        }

        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 90px 7% 60px;
        }

        .badge {
            display: inline-block;
            color: #22c55e;
            border: 1px solid #166534;
            background: #052e16;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h1 {
            font-size: clamp(42px, 7vw, 76px);
            line-height: 1;
            margin-bottom: 22px;
        }

        h1 span {
            color: #22c55e;
        }

        .hero p {
            color: #94a3b8;
            max-width: 700px;
            line-height: 1.7;
            font-size: 17px;
        }

        .warning {
            margin-top: 30px;
            padding: 15px 18px;
            border-left: 3px solid #eab308;
            background: #171308;
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.6;
        }

        main {
            max-width: 1200px;
            margin: auto;
            padding: 0 7% 80px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title h2 {
            font-size: 26px;
        }

        .count {
            color: #64748b;
            font-size: 14px;
        }

        .labs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
        }

        .card {
            background: #0d121a;
            border: 1px solid #202733;
            border-radius: 12px;
            padding: 24px;
            transition: 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: #22c55e;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35);
        }

        .tag {
            display: inline-block;
            color: #22c55e;
            background: #052e16;
            border: 1px solid #14532d;
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card p {
            color: #94a3b8;
            line-height: 1.6;
            font-size: 14px;
            min-height: 68px;
        }

        .meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #202733;
        }

        .level {
            color: #64748b;
            font-size: 12px;
        }

        .open {
            color: #080b10;
            background: #22c55e;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
        }

        .open:hover {
            background: #4ade80;
        }

        footer {
            border-top: 1px solid #202733;
            padding: 25px 7%;
            color: #64748b;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .hero {
                padding-top: 55px;
            }

            .nav {
                gap: 15px;
            }

            .status {
                display: none;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="nav">
        <div class="logo">
            Vun<span>Labs</span>
        </div>

        <div class="status">
            ● LAB ONLINE
        </div>
    </div>
</header>

<section class="hero">

    <div class="badge">
        SECURITY TRAINING LAB
    </div>

    <h1>
        Learn by<br>
        <span>breaking things.</span>
    </h1>

    <p>
        VunLabs es un laboratorio educativo para aprender a identificar,
        comprender y analizar vulnerabilidades de aplicaciones web
        dentro de un entorno controlado.
    </p>

    <div class="warning">
        ⚠ Este proyecto contiene vulnerabilidades intencionadas.
        Utilízalo únicamente en entornos propios o autorizados.
    </div>

</section>

<main>

    <div class="section-title">
        <h2>Vulnerability Labs</h2>

        <div class="count">
            <?= count($labs) ?> laboratories
        </div>
    </div>

    <div class="labs">

        <?php foreach ($labs as $lab): ?>

            <div class="card">

                <div class="tag">
                    <?= htmlspecialchars($lab["tag"]) ?>
                </div>

                <h3>
                    <?= htmlspecialchars($lab["name"]) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($lab["description"]) ?>
                </p>

                <div class="meta">

                    <span class="level">
                        Difficulty:
                        <?= htmlspecialchars($lab["level"]) ?>
                    </span>

                    <a class="open"
                       href="<?= htmlspecialchars($lab["file"]) ?>">
                        Open Lab →
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</main>

<footer>
    VunLabs · Educational Security Laboratory
</footer>

</body>
</html>
