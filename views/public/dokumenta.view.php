<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <section class="documents container py">
        <?php if (count($dokumenta) > 0): ?>
            <ul>
                <?php foreach ($dokumenta as $index => $dokument): ?>
                    <li>
                        <span>
                            <?php echo $index + 1; ?>
                        </span>
                        <span><?php echo $dokument->title; ?></span>
                        <a href="<?php uploadPath($dokument->attachment); ?>" target="_blank">
                            <i class="fa-solid fa-download"></i></a>
                    </li>

                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Нема тренутно докумената.</p>
        <?php endif; ?>

    </section>
<?php require_once "partials/bottom.php" ?>