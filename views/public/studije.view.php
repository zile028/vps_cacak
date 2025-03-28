<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>

<!-------- COURSES -------->

<section class="courses container py">
    <article>
        <?php foreach ($studije as $sp => $moduli): $info = $moduli[0] ?>
            <div class="card row boxShadow" style="border-radius: 10px">
                <div style="padding: 10px" class="card-header">
                    <img style="height: 100%; width: 100%; object-fit: cover"
                         src="<?php uploadPath($info->espb . "_thumbnail.jpg"); ?>"
                         alt="<?php echo $sp; ?>">
                </div>
                <div class="card-body">
                    <h6><?php echo $info->nivo; ?></h6>
                    <h2><?php echo $sp; ?></h2>
                    <p>Трајање: <?php echo $info->trajanje; ?></p>
                    <p>Звање: <?php echo $info->zvanje; ?></p>
                    <p>Научно поље: <?php echo $info->polje; ?></p>
                    <p>Акредитовано: <?php echo $info->akreditovan; ?></p>
                    <h4><?php echo $info->espb; ?> ЕСПБ</h4>
                    <?php if (count($moduli) === 1): ?>
                        <a href="/studije/<?php echo $info->id; ?>" class="btn
                        btn-sm">Детаљније</a>
                    <?php else: ?>
                        <?php foreach ($moduli as $modul) : ?>
                            <a href="/studije/<?php echo $modul->id; ?>" class="btn btn-sm">
                                <?php echo $modul->modul; ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </article>

</section>


<?php require_once "partials/bottom.php" ?>
