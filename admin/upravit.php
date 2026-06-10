<?php

require_once __DIR__ . '/../config.php';
require_once KOREN . '/app/modely/Clanok.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . WEB . '/admin/login.php');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$model_clanku = new Clanok();
$clanok = $model_clanku->dajJedenAdmin($id);

if (!$clanok) {
    header('Location: ' . WEB . '/admin/index.php');
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
        $ok = $model_clanku->uprav($id, [
            'nazov' => $nazov,
            'perex' => $perex,
            'obsah' => $obsah,
            'obrazok' => $obrazok,
            'publikovany' => $publikovany
        ]);

        if ($ok) {
            $_SESSION['sprava'] = 'Clanok bol upraveny.';
            header('Location: ' . WEB . '/admin/index.php');
            exit;
        } else {
            $chyba = 'Clanok sa nepodarilo upravit.';
        }
    }

    $clanok = $model_clanku->dajJedenAdmin($id);
}

$nadpis_stranky = 'Upravit clanok';
require_once KOREN . '/public/templates/admin-upravit-clanok.php';