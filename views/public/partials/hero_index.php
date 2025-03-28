<!-------- HEADER -------->

<header class="header">
    <img src="<?php echo uploadPath($heroImage); ?>" alt="">
    <article>
        <h1><?php echo $heroTitle; ?></h1>
        <?php if (isset($heroSubtitle)): ?>
            <p><?php echo $heroSubtitle; ?></p>
        <?php endif ?>
        <?php if (isset($heroAction)): ?>
            <div>
                <?php foreach ($heroAction as $action): ?>
                    <a href="<?php echo $action["link"] ?>" class="btn"><?php echo $action["caption"] ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    </article>
</header>
