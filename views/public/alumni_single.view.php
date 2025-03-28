<?php require_once __DIR__ . "/partials/top.php" ?>
<?php require_once __DIR__ . "/partials/hero_pages.php" ?>
    <section class="alumni single container py">
        <article class="courses">
            <h2><?php echo "$clan->firstName $clan->lastName"; ?></h2>
            <cite><?php echo $clan->zvanje; ?></cite>
            <h6>Ниво студија:</h6>
            <p><?php echo $clan->nivo; ?></p>
            <h6>Студијски програм:</h6>
            <p><?php echo $clan->spNaziv; ?></p>
            <?php if ($clan->spModul): ?>
                <h6>Модул:</h6>
                <p><?php echo $clan->spModul; ?></p>
            <?php endif; ?>
            <h6>Дипломирао:</h6>
            <p><?php echo $clan->diplomirao; ?></p>
            <h6>Тема:</h6>
            <p><?php echo $clan->tema; ?></p>
            <h6>Послодавац:</h6>
            <p><?php echo $clan->poslodavac; ?></p>
            <h6>Посао:</h6>
            <p><?php echo $clan->posao; ?></p>
        </article>
        <aside class="teacher">
            <div class="card">
                <img src="<?php is_null($clan->storeName) ? uploadPath("avatar.png") : uploadPath($clan->storeName); ?>"
                     alt="<?php echo "$clan->firstName $clan->lastName"; ?>">
                <?php if ($clan->social): ?>
                    <div class="card-body">
                        <a href="<?php echo $clan->social; ?>" target="_blank"><i
                                    class="fa fa-globe"></i> Повежимо
                            се</a>
                    </div>
                <?php endif; ?>
            </div>
        </aside>
    </section>
<?php require_once __DIR__ . "/partials/bottom.php" ?>