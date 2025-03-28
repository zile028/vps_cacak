<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <!-- COURSE SINGLE -->
    <section class="single container py">
        <article class="courses">
            <h2><?php echo $vest->naslov; ?></h2>
            <cite><span><?php dateDDMMYYY
                    ($vest->createdAt);
                    ?></span></cite>
            <div>
                <?php echo $vest->description; ?>
            </div>
            <?php if (isset($media["document"])): ?>

                <ul>
                    <?php foreach ($media["document"] as $doc) : ?>
                        <li><a href="<?php uploadPath($doc->storeName); ?>"
                               target="_blank"><?php echo
                                $doc->fileName; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (isset($media["image"])): ?>
                <div class="gallery">
                    <?php foreach ($media["image"] as $image) : ?>
                        <div>
                            <img src="<?php uploadPath($image->storeName); ?>" alt="<?php echo
                            $image->fileName; ?>">
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </article>

        <?php include "partials/last_news.php" ?>

    </section>
<?php require_once "partials/bottom.php" ?>