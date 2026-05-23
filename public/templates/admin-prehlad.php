<?php require_once KOREN . '/public/templates/partials/admin_hlavicka.php'; ?>

<div class="karta">
    <h2>Admin rozhranie</h2>
    <p>Prihlaseny pouzivatel: <strong><?= htmlspecialchars($_SESSION['admin_meno'] ?? '') ?></strong></p>
    <p><a class="tlacidlo" href="<?= WEB ?>/admin/pridat.php">Pridat clanok</a></p>
</div>

<?php if (!empty($_SESSION['sprava'])): ?>
    <div class="karta sprava_uspech">
        <?= htmlspecialchars($_SESSION['sprava']) ?>
    </div>
    <?php unset($_SESSION['sprava']); ?>
<?php endif; ?>

<div class="karta">
    <h3>Moje clanky</h3>

    <?php if (empty($clanky)): ?>
        <p>Zatial tu nie su ziadne clanky.</p>
    <?php else: ?>
        <table class="tabulka">
            <tr>
                <th>ID</th>
                <th>Nazov</th>
                <th>Autor</th>
                <th>Stav</th>
                <th>Akcie</th>
            </tr>

            <?php foreach ($clanky as $jeden_clanok): ?>
                <tr>
                    <td><?= $jeden_clanok['id'] ?></td>
                    <td><?= htmlspecialchars($jeden_clanok['nazov']) ?></td>
                    <td><?= htmlspecialchars($jeden_clanok['autor']) ?></td>
                    <td><?= $jeden_clanok['publikovany'] ? 'Publikovany' : 'Skryty' ?></td>
                    <td>
                        <a href="<?= WEB ?>/admin/upravit.php?id=<?= $jeden_clanok['id'] ?>">Upravit</a> |
                        <a href="<?= WEB ?>/admin/zmazat.php?id=<?= $jeden_clanok['id'] ?>" onclick="return confirm('Naozaj zmazat clanok?')">Zmazat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php require_once KOREN . '/public/templates/partials/admin_paticka.php'; ?>