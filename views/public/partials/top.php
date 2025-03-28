<?php require_once "nav.php" ?>
<!DOCTYPE html>
<html lang="srb">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/upload/favicon.png">
    <title>ВПШ - Земун</title>
    <!-- Font Awesome 5 | visit: https://fontawesome.com/v5.15/icons?d=gallery&p=2 -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="/assets/public/css/style.css">
    <script type="text/javascript" src="/assets/public/js/cyr-lat/cyrlatconverter.min.js"></script>
</head>
<body>
<!-------- TOP BAR -------->
<section class="top-bar">
    <article class="container-fluid">
        <ul>
            <li><i class="fas fa-phone"></i><?php echo TELEFON; ?></li>
            <li class="hide"><i class="fas fa-map-marker-alt"></i><?php echo ADRESA; ?></li>
            <li class="hide"><i class="fas fa-clock"></i><?php echo RADNO_VREME; ?></li>
        </ul>
        <ul>
            <li>
                <button class="ignore" id="cirilica">Ћир</button>
            </li>
            <li>
                <button class="ignore" id="latinica">Lat</button>
            </li>
        </ul>
    </article>
</section>
<!-------- NAV -------->
<nav>
    <article class="container-fluid">
        <div class="logo">
            <a href="/">
                <img src="<?php echo uploadPath("logo-blue.png"); ?>" alt="logo">
                <span>Висока пословна школа<br>струковних студија Чачак</span>
            </a>
        </div>
        <div class="nav-btn">
            <button id="menu-btn"><i class="fas fa-bars"></i></button>
        </div>
        <div class="navbar" id="menu-box">
            <ul>
                <?php foreach ($menu as $main): ?>
                    <?php if ($main["drop"]): ?>
                        <li class="drop">
                            <span><?php echo $main["caption"]; ?></span>
                            <ul>
                                <?php foreach ($main["submenu"] as $submenu): ?>
                                    <li><a href="<?php echo $submenu["to"]; ?>">
                                            <?php echo $submenu["caption"]; ?>
                                        </a></li>
                                <?php endforeach; ?>
                            </ul>

                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo $main["to"] ?>"><?php echo $main["caption"]; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </article>
</nav>