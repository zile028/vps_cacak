<section class="features py">
    <article class="title-section container">
        <h2>СТУДИЈЕ</h2>
    </article>
    <article class="container col-3">
        <?php foreach ($studije as $sp): ?>
            <div class="wrapper">
                <div class="icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h6><?php echo mb_strtoupper($sp->nivo); ?></h6>
                <p><?php echo getExcerpt($sp->opis); ?></p>
            </div>
        <?php endforeach; ?>
    </article>
</section>