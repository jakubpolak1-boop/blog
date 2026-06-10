<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nadpis_stranky ?? NAZOV_WEBU ?></title>
    <link rel="stylesheet" href="<?= WEB ?>/public/assets/css/style.css">
</head>
<body>

<header class="horna_cast">
    <div class="obal horna_cast_vnutro">
        <div class="logo_cast">
            <a href="<?= WEB ?>/index.php" class="logo_link">
                <img src="<?= WEB ?>/public/assets/img/logo.png" alt="Logo webu" class="logo_img">
                <span class="logo_text"><?= NAZOV_WEBU ?></span>
            </a>
        </div>

        <nav class="menu">
            <a href="<?= WEB ?>/index.php">Domov</a>
            <a href="<?= WEB ?>/admin/login.php">Admin</a>
        </nav>
    </div>
</header>

<main class="obal hlavny_obsah">