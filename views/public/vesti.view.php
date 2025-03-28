<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <!-------- NEWS -------->

    <section class="single container py">
        <article class="news">
            <?php foreach ($vesti as $vest) : ?>
                <div class="card">
                    <img src="<?php empty($vest->storeName) ? uploadPath("vest_avatar.png") :
                        uploadPath($vest->storeName); ?>" alt="<?php echo $vest->naslov; ?>">
                    <div class="card-body">
                        <h4><?php echo $vest->naslov; ?></h4>
                        <span><?php dateDDMMYYY($vest->createdAt); ?> </span>
                        <div>
                            <?php echo getExcerpt($vest->description); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="vesti/<?php echo $vest->id; ?>" class="btn btn-sm">Више</a>

                    </div>
                </div>
            <?php endforeach; ?>

        </article>

        <?php include "partials/last_news.php" ?>

    </section>
<?php require_once "partials/bottom.php" ?>