<?php

use Core\Mailer;
use Core\Response;


$mailer = new Mailer();
$email = $_POST["email"] ?? null;
$fullName = $_POST["fullName"] ?? null;
$message = $_POST["message"] ?? null;
$subject = $_POST["subject"] ?? null;
$recipient = $_POST["recipient"] ?? null;
ob_start();
require $mailer::MAIL_TEMPLATE_PATH . "/mail_template_signature.php";
$html = ob_get_clean();
try {
    $status = $mailer->sendMail($email, $subject, $html, null, $recipient);
    Response::send($status);
} catch (\Exception $e) {
    Response::throwError(400, $e->getMessage());
    exit();
}


