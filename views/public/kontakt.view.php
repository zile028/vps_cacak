<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <!-------- CONTACT -------->

    <section class="contact container py">
        <article>
            <h3>Контактирај нас</h3>
            <form action="/kontakt" method="post">
                <input type="text" name="fullName" placeholder="Име">
                <input type="email" name="email" placeholder="Email">
                <textarea name="message" placeholder="Порука" cols="30" rows="10"></textarea>
                <button class="btn" type="submit">Пошаљи</button>
            </form>
        </article>
        <article>
            <h3>Контакт информације</h3>
            <p><?php echo $contactInfo["content"] ?></p>
            <ul class="listGroup">
                <?php foreach ($contactInfo["usluge"] as $usluga): ?>
                    <li><?php echo $usluga; ?></li>
                <?php endforeach; ?>
            </ul>

        </article>
        <article>
            <ul class="contact-footer p-t-28">
                <li>
                    <i class="fas fa-home" aria-hidden="true"></i>
                    <?php echo ADRESA ?>
                </li>
                <li>
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <?php echo TELEFON ?>
                </li>
                <li>
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    <?php echo EMAIL ?>
                </li>
                <li>
                    <i class="fas fa-clock" aria-hidden="true"></i>
                    <?php echo RADNO_VREME ?>
                </li>
            </ul>
        </article>
    </section>
<?php require_once "partials/map.php" ?>
<?php require_once "partials/bottom.php" ?>