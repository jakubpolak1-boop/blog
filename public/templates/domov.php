<?php require_once KOREN . '/public/templates/partials/hlavicka.php'; ?>

<div class="uvodny-banner">
    <img src="<?= WEB ?>/public/assets/img/banner.png" alt="Banner blogu">
</div>

<div class="karta">
    <h2>Vitaj na mojom primitivnom blogu</h2>
    <p>Toto je taky moj prvy prototyp blogu ktory taha clanky z databazy.</p>
</div>

<?php if (empty($clanky)): ?>
    <div class="karta">
        <h3>Zatial tu nie su ziadne clanky</h3>
    </div>
<?php else: ?>
    <?php foreach ($clanky as $jeden_clanok): ?>
        <div class="karta">
            <h3><?= htmlspecialchars($jeden_clanok['nazov']) ?></h3>

            <p class="meta">
                Autor: <?= htmlspecialchars($jeden_clanok['autor']) ?> |
                Datum: <?= date('d.m.Y', strtotime($jeden_clanok['vytvorene'])) ?>
            </p>

            <?php if (!empty($jeden_clanok['obrazok'])): ?>
                <img src="<?= WEB ?>/public/assets/img/<?= htmlspecialchars($jeden_clanok['obrazok']) ?>" alt="Obrazok clanku" class="obrazok-clanku">
            <?php endif; ?>

            <p><?= htmlspecialchars($jeden_clanok['perex']) ?></p>

            <a class="tlacidlo" href="<?= WEB ?>/clanok.php?id=<?= $jeden_clanok['id'] ?>">
                Otvorit clanok
            </a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php require_once KOREN . '/public/templates/partials/paticka.php'; ?>