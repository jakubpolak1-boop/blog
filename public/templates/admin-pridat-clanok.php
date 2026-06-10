<?php require_once KOREN . '/public/templates/partials/admin_hlavicka.php'; ?>

<div class="karta">
    <h2>Pridat clanok</h2>

    <?php if (!empty($chyba)): ?>
        <p class="chyba"><?= htmlspecialchars($chyba) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nazov">Nazov</label>
        <input type="text" name="nazov" id="nazov" required>

        <label for="perex">Perex</label>
        <textarea name="perex" id="perex" rows="4"></textarea>

        <label for="obsah">Obsah</label>
        <textarea name="obsah" id="obsah" rows="10" required></textarea>

        <label for="obrazok">Nazov obrazka</label>
        <input type="text" name="obrazok" id="obrazok" placeholder="obrazok">

        <label class="checkbox_riadok">
            <input type="checkbox" name="publikovany" value="1" checked>
            Publikovat clanok
        </label>

        <button type="submit">Ulozit clanok</button>
    </form>
</div>

<?php require_once KOREN . '/public/templates/partials/admin_paticka.php'; ?>