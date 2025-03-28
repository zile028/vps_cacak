<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <!-------- TEACHER -------->

    <section class="teacher container py">
        <article class="title-section">
            <h2>Предавачи струковних студија</h2>
        </article>
        <article class="row">
            <?php foreach ($osoblje as $nastavnik) : ?>
                <div class="card">
                    <img src="<?php uploadPath($nastavnik["image"]); ?>" alt="">
                    <div class="card-body">
                        <h4><?php echo $nastavnik["firstName"]; ?>
                            <br><?php echo $nastavnik["lastName"]; ?></h4>
                        <p><?php echo $nastavnik["rank"]; ?></p>

                        <a class="email" href="mailto:<?php echo $nastavnik["email"];
                        ?>"><?php echo $nastavnik["email"]; ?></a>

                        <a href="nastavno_osoblje/<?php echo $nastavnik["id"]; ?>" class="btn
                        btn-sm">View
                            profile</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </article>
    </section>

<?php require_once "partials/bottom.php" ?>