<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <section class="schedule single container py">
        <article class="documents">
            <?php if (count($dokumenta) > 0): ?>
                <?php foreach ($dokumenta as $kategorije => $kategorija) : ?>
                    <div class="card">
                        <?php if (!empty($kategorije)): ?>
                            <div class="card-header"><h5><?php echo $kategorije; ?></h5></div>
                        <?php endif; ?>
                        <div class="card-body">
                            <ul>
                                <?php foreach ($kategorija as $index => $dokument): ?>
                                    <li>
                        <span>
                            <?php echo $index + 1 ?>
                        </span>
                                        <span><?php echo $dokument->fileName; ?></span>
                                        <a href="<?php uploadPath($dokument->storeName); ?>"
                                           target="_blank">
                                            <i class="fa-solid fa-download"></i></a>
                                    </li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Нема тренутно докумената.</p>
            <?php endif; ?>
        </article>
        <?php require_once __DIR__ . "/partials/last_news.php" ?>
    </section>
<?php require_once "partials/bottom.php" ?>