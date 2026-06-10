<?php

require_once __DIR__ . '/../config.php';
require_once KOREN . '/app/modely/Clanok.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . WEB . '/admin/login.php');
    exit;
}

$chyba = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazov = trim($_POST['nazov'] ?? '');
    $perex = trim($_POST['perex'] ?? '');
    $obsah = trim($_POST['obsah'] ?? '');
    $obrazok = trim($_POST['obrazok'] ?? '');
    $publikovany = isset($_POST['publikovany']) ? 1 : 0;

    if ($nazov === '' || $obsah === '') {
        $chyba = 'Vypln nazov a obsah.';
    } else {
        $model_clanku = new Clanok();

        $ok = $model_clanku->pridaj([
            'pouzivatel_id' => $_SESSION['admin_id'],
            'nazov' => $nazov,
            'perex' => $perex,
            'obsah' => $obsah,
            'obrazok' => $obrazok,
            'publikovany' => $publikovany
        ]);

        if ($ok) {
            $_SESSION['sprava'] = 'Clanok bol pridany.';
            header('Location: ' . WEB . '/admin/index.php');
            exit;
        } else {
            $chyba = 'Clanok sa nepodarilo ulozit.';
        }
    }
}

$nadpis_stranky = 'Pridat clanok';
require_once KOREN . '/public/templates/admin-pridat-clanok.php';