<?php require_once KOREN . '/public/templates/partials/hlavicka.php'; ?>

<?php if (!$clanok): ?>
    <div class="karta">
        <h2>Clanok sa nenasiel</h2>
        <p>Takyto clanok v databaze nie je.</p>
        <a class="tlacidlo" href="<?= WEB ?>/index.php">Spat na domov</a>
    </div>
<?php else: ?>
    <div class="karta">
        <h2><?= htmlspecialchars($clanok['nazov']) ?></h2>

        <p class="meta">
            Autor: <?= htmlspecialchars($clanok['autor']) ?> |
            Datum: <?= date('d.m.Y', strtotime($clanok['vytvorene'])) ?>
        </p>

        <?php if (!empty($clanok['obrazok'])): ?>
            <img src="<?= WEB ?>/public/assets/img/<?= htmlspecialchars($clanok['obrazok']) ?>" alt="Obrazok clanku" class="obrazok-clanku">
        <?php endif; ?>

        <?php if (!empty($clanok['perex'])): ?>
            <p><strong><?= htmlspecialchars($clanok['perex']) ?></strong></p>
        <?php endif; ?>

        <p><?= nl2br(htmlspecialchars($clanok['obsah'])) ?></p>

        <a class="tlacidlo" href="<?= WEB ?>/index.php">Spat na domov</a>
    </div>
<?php endif; ?>

<?php require_once KOREN . '/public/templates/partials/paticka.php'; ?>