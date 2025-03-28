<!-------- HEADER -------->

<header class="header">
    <img src="<?php echo uploadPath($heroImage) ?>" alt="">
    <article>
        <h1><?php echo $heroTitle; ?></h1>
        <?php echo isset($heroSubtitle) ? "<h3>$heroSubtitle</h3>" : "" ?>
    </article>
</header>
