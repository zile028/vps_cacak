<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
<section class="schedule single container py">
    <article>
        <?php foreach ($rasporedi as $nivo => $raspored) : ?>
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $nivo; ?></h4>
                </div>
                <div class="card-body">
                    <ul>
                        <?php foreach ($raspored as $sp) : ?>
                            <li><i class="fa-regular fa-folder-open"></i><a
                                        href="<?php uploadPath($sp->storeName); ?>"
                                        target="_blank">
                                    <?php echo
                                        $sp->naziv . ($sp->modul ? " - " . $sp->modul : "");
                                    ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </article>
    <aside>
        <?php require_once "partials/last_news.php" ?>
    </aside>
</section>
<?php require_once "partials/bottom.php" ?>
