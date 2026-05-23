<?php require_once KOREN . '/public/templates/partials/admin_hlavicka.php'; ?>

<div class="karta">
    <h2>Upravit clanok</h2>

    <?php if (!empty($chyba)): ?>
        <p class="chyba"><?= htmlspecialchars($chyba) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nazov">Nazov</label>
        <input type="text" name="nazov" id="nazov" value="<?= htmlspecialchars($clanok['nazov']) ?>" required>

        <label for="perex">Perex</label>
        <textarea name="perex" id="perex" rows="4"><?= htmlspecialchars($clanok['perex']) ?></textarea>

        <label for="obsah">Obsah</label>
        <textarea name="obsah" id="obsah" rows="10" required><?= htmlspecialchars($clanok['obsah']) ?></textarea>

        <label class="checkbox_riadok">
            <input type="checkbox" name="publikovany" value="1" <?= $clanok['publikovany'] ? 'checked' : '' ?>>
            Publikovat clanok
        </label>

        <button type="submit">Ulozit zmeny</button>
    </form>
</div>

<?php require_once KOREN . '/public/templates/partials/admin_paticka.php'; ?>