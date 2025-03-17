<?php

namespace Core;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require_once __DIR__ . "/../vendor/phpmailer/phpmailer/src/Exception.php";
require_once __DIR__ . "/../vendor/phpmailer/phpmailer/src/PHPMailer.php";
require_once __DIR__ . "/../vendor/phpmailer/phpmailer/src/SMTP.php";

class Mailer extends PHPMailer
{
    const MAIL_TEMPLATE_PATH = BASE_PATH . "/mail_template/";
    const  CREATE_USER_TEMPLATE = self::MAIL_TEMPLATE_PATH . "mail_template_create_user.php";
    const  SEND_CONTACT_MAIL_TEMPLATE = BASE_PATH . "/mail_template/mail_template_signature.php";

    const LOGO_PATH = UPLOAD_DIR . "/logo.png";
    private const MAILBOX2 = '{' . MAIL_HOST . ':' . MAIL_IMAP_PORT . '/imap/ssl}INBOX';
    private const MAILBOX = "{fim.edu.rs:993/imap/ssl}INBOX";
    private $imapStream = null;
    private $errorMessages = [
        'SMTP_ERROR' => 'There was an issue with our email server. Please try again later.',
        'INVALID_ADDRESS' => 'The email address provided is invalid. Please check and try again.',
        'UNKNOWN_ERROR' => 'An unknown error occurred. Please try again.'];
    public $template = "";

    public function __construct()
    {
        parent::__construct(true);
    }

    private function setupSMTP(): bool|string
    {
        try {
            $this->SMTPDebug = SMTP::DEBUG_OFF;
            $this->isSMTP();
            $this->SMTPAuth = true;
            // FIM
            $this->Host = MAIL_HOST;
            $this->Username = MAIL_USERNAME;
            $this->Password = MAIL_PASSWORD;
            $this->SMTPSecure = MAIL_SECURE;
            $this->Port = MAIL_PORT;
            $this->setFrom($this->Username, "FIM - office");
            $this->isHTML(true);
            return true;
        } catch (Exception $e) {
            return 'SMTP setup failed: ' . $e->getMessage();
            die();
        }
    }

    public function setTemplate(string $template, $data)
    {
        extract($data);
        ob_start();
        require $template;
        $this->template = ob_get_clean();
    }

    // Add custom methods or override existing ones if needed
    public function sendMail($to, $subject, $html, $cc = null, $bcc = null)
    {
        try {
            $this->setupSMTP();
            $this->CharSet = "UTF-8";
            $this->addAddress($to);
            if ($bcc != null) {
                $this->addBCC($bcc);
            }
            if ($cc != null) {
                $this->addCC($cc);
            }
            $this->Subject = $subject;
            $this->Body = $html;
            $this->addEmbeddedImage(self::LOGO_PATH, "company_logo");
            // Send the email
            if (!$this->send()) {
                throw new \Exception($this->ErrorInfo);
            }
            return 'Message has been sent';
        } catch (Exception $e) {
            throw new Exception("Mail Error: " . $e->getMessage());
            exit();
            if (strpos($e->getMessage(), 'Invalid address') !== false) {
                throw new Exception("Mail Error: " . $this->errorMessages['INVALID_ADDRESS']);
            } elseif (strpos($e->getMessage(), 'SMTP Error') !== false) {
                throw new Exception("Mail Error: " . $this->errorMessages['SMTP_ERROR']);
            } else {
                throw new Exception("Mail Error: " . $this->errorMessages['UNKNOWN_ERROR']);
            }

        }
    }

    private function connectIMAPServer()
    {
        try {
            $imapStream = imap_open(self::MAILBOX, MAIL_USERNAME, MAIL_PASSWORD);
            if ($this->imapStream === false) {
                return 'Failed to connect to IMAP server: ' . imap_last_error();
//                dd('Nije moguće se povezati na IMAP server: ' . imap_last_error());
            }
            $this->imapStream = $imapStream;
        } catch (Exception $e) {
            throw new Exception('IMAP connection failed: ' . $e->getMessage());
        }
    }

    public function fetchMails()
    {
        try {
            $this->connectIMAPServer();
            $emails = imap_search($this->imapStream, "ALL");
            $emailsArray = [];
            if ($emails) {
                $this->getEmail(3);
//                foreach ($emails as $emailNumber) {
//                    $emailsArray[] = $this->getEmail($emailNumber);
//                }
                return $emailsArray;
            }
        } catch (Exception $e) {
            throw new Exception('Failed to fetch emails: ' . $e->getMessage());
        }
    }

    private function getEmail($msgNumber)
    {
        $structure = imap_fetchstructure($this->imapStream, $msgNumber);

        $mailInfo = [
            "structure" => imap_fetchstructure($this->imapStream, $msgNumber),
            "text" => imap_fetchtext($this->imapStream, $msgNumber, 0),
            "header" => imap_fetchheader($this->imapStream, $msgNumber),
            "body" => imap_fetchbody($this->imapStream, $msgNumber, 0),
            "overview" => imap_fetch_overview($this->imapStream, $msgNumber, 0)
        ];
        dd($mailInfo);
        $parts = $this->getStructureParts($structure, $msgNumber);
        return $parts;
    }

    private function getStructureParts($structure, $msgNumber, $partNumberPrefix = "")
    {
        $parts = [];
        if (isset($structure->parts) && count($structure->parts) > 0) {
            foreach ($structure->parts as $index => $subStructure) {
                $partNumber = ($partNumberPrefix ? $partNumberPrefix . "." : "") . ($index + 1);
//                $parts[] = [
//                    "part_no" => $partNumber,
//                    "content" => $this->getPart($msgNumber, $partNumber)
//                ];

                $parts = $this->classify($msgNumber, $structure, $partNumber);
                if (isset($subStructure->parts) && count($subStructure->parts) > 0) {
                    $parts = array_merge($parts,
                        $this->getStructureParts($subStructure, $msgNumber, $partNumber)
                    );
                }
            }
        } else {
//            $parts[] = [
//                "part_no" => $partNumberPrefix,
//                "content" => $this->getPart($msgNumber, $partNumberPrefix)];

//            $parts = $this->classify($msgNumber, $structure, $partNumber);
        }
//        vd($parts);
//        $this->printStructureParts($structure);
        return $parts;
    }


    private function decodePart($part, $structure)
    {
        return match ($structure->encoding) {
            0, 1 => $part,
            2 => imap_binary($part),
            3 => imap_base64($part),
            4 => imap_qprint($part),
            5 => $part,
            default => $part,
        };
    }

    private function getPart($msgNumber, $partNumber)
    {
        $part = imap_fetchbody($this->imapStream, $msgNumber, $partNumber);
        $structure = imap_bodystruct($this->imapStream, $msgNumber, $partNumber);
        $content = $this->decodePart($part, $structure);
        return $content;

    }

    // Funkcija za prelazak kroz sve delove email poruke i ispisivanje informacija o svakom delu
    private function printStructureParts($structure, $partNumberPrefix = "")
    {
        if (isset($structure->parts) && count($structure->parts) > 0) {
            foreach ($structure->parts as $index => $subStructure) {
                $partNumber = ($partNumberPrefix ? $partNumberPrefix . "." : "") . ($index + 1);

                echo "Part Number: " . $partNumber . "\n";
                echo "Type: " . $subStructure->type . "\n";
                echo "Subtype: " . $subStructure->subtype . "\n";
                echo "Encoding: " . $subStructure->encoding . "\n";
                echo "Parameters: " . json_encode($subStructure->parameters) . "\n";
                echo "-----------------------\n";
                // Rekurzivno prelaziti kroz poddelove
                if (isset($subStructure->parts) && count($subStructure->parts) > 0) {
                    $this->printStructureParts($subStructure, $partNumber);
                }
            }

        }
    }

    private function classify($message, $partStructure, $partNumber)
    {
        $content = imap_fetchbody($this->imapStream, $message, $partNumber);
        if ($partStructure->encoding == 3) {
            $content = imap_base64($content);
        } elseif ($partStructure->encoding == 4) {
            $content = imap_qprint($content);
        }
        $partInfo = ['part_no' => $partNumber, 'type' => $partStructure->type, 'subtype' => $partStructure->subtype, 'content' => $content,];
        return $partInfo;
    }
}