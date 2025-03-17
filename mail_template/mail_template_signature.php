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
        <?php require "partials/header.php" ?>
    </div>
    <div class="content">
        <ul>
            <li>Ime i prezime: <strong><?php echo $fullName; ?></strong></li>
            <li>E-mail: <strong><?php echo $email; ?></strong></li>
        </ul>
        <h3><?php echo $subject; ?></h3>
        <p><?php echo $message; ?></p>
        <p>Srdačno,<br>
            <strong>Fakultet za inženjerski menadžment</strong></p>
    </div>
    <?php require "partials/footer.php" ?>
</div>
</body>
</html>