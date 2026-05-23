<?php

require_once __DIR__ . '/../config.php';
require_once KOREN . '/app/modely/Clanok.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . WEB . '/admin/login.php');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    $model_clanku = new Clanok();
    $model_clanku->zmaz($id);
    $_SESSION['sprava'] = 'Clanok bol zmazany.';
}

header('Location: ' . WEB . '/admin/index.php');
exit;