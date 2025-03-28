<?php require_once __DIR__ . "/partials/top.php" ?>
<?php require_once __DIR__ . "/partials/hero_pages.php" ?>

<section class="error container py ignore">
    <article>
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>ERROR 503</h2>
        <h3>Page under construction</h3>
        <p> We’re sorry, the page you have looked is under construction!<br>
            Maybe visit soon or go to our home page?</p>
        <a class="btn" href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">HOME</a>
    </article>
</section>
<?php require_once __DIR__ . "/partials/bottom.php" ?>
