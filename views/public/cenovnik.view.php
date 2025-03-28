<?php require_once "partials/top.php" ?>
<?php require_once "partials/hero_pages.php" ?>
    <section class="documents container py">
        <?php if (count($cenovnik) > 0): ?>
            <ul>
                <?php foreach ($cenovnik as $index => $dokument): ?>
                    <li>
                        <span>
                            <?php echo $index + 1; ?>
                        </span>
                        <span><?php echo $dokument->title; ?></span>
                        <a href="<?php uploadPath($dokument->attachment); ?>" target="_blank">
                            <i class="fa-solid fa-download"></i></a>
                    </li>

                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Нема тренутно ценовника.</p>
        <?php endif; ?>

    </section>
<?php require_once "partials/bottom.php" ?>

<!--     <section class="container py">
        <?php if (count($cenovnik) > 0): ?>
            <table class="table table-document">
                <thead>
                <tr>
                    <th>Р.Б.</th>
                    <th>Услуга</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cenovnik as $index => $stavka): ?>
                    <tr>
                        <td>
                            <?php echo $index + 1; ?>
                        </td>
                        <td class=""><?php echo $stavka->service; ?></td>
                        <td class=""><?php echo $stavka->price; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Нема тренутно ценовника.</p>
        <?php endif; ?>

    </section> -->
<?php require_once "partials/bottom.php" ?>

