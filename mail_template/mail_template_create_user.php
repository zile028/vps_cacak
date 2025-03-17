<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h3 {
            font-size: 16px;
            fonweight: 700;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .content {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="content">
        <style>
            .header {
                text-align: center;
                padding-bottom: 20px;
            }

            .header img {
                max-width: 150px;
            }
        </style>

        <div class="header">
            <img style="
    margin: 0 auto;
    display: block;
    height: 100px;"
                 src="cid:company_logo" alt="Logo firme">
        </div>
    </div>
    <div class="content">

        <h3>Poštovani</h3>
        <p>Kreiran vam je nalog u admin panelu sajta www.fim.edu.rs</p>
        <p>Admin panelu možete pristupiti putem linka <a href="<?php echo BE_PRODUCTION_URI; ?>">Login</a></p>
        <p>Vaši pristupni parametri su:</p>
        <ul>
            <li>Username: <?php echo $email ?></li>
            <li>Password: <?php echo $password; ?></li>
        </ul>

        <p>Srdačno,<br>
            <strong>Fakultet za inženjerski menadžment</strong>
        </p>
    </div>
    <?php require "partials/footer.php" ?>
</div>
</body>
</html>
