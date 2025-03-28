<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>

    <section class="teacher container py">
        <?php if (count($odbor) > 0): ?>
            <?php foreach ($odbor as $kategorija => $osoblje): ?>
                <h3><?php echo $kategorija; ?></h3>
                <article class="row">
                    <?php foreach ($osoblje as $nastavnik) : ?>
                        <?php require "partials/osoblje_card.php" ?>
                    <?php endforeach; ?>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Тренутно нема чланова!</p>
        <?php endif; ?>
    </section>

<?php require_once "partials/bottom.php" ?>