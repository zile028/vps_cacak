<?php

namespace Core;

use JsonException;

class Response
{
    const FORBIDDEN = 403;
    const NO_CONTENT = 204;
    const NOT_FOUND = 404;
    const SERVER_ERROR = 500;
    const UNDER_CONSTRUCTION = 503;

    protected static int $statusCode = 200;

    public static function send($data): void
    {
        try {
            http_response_code(self::$statusCode);
            header('Content-Type: application/json');
            echo json_encode($data, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            self::status(static::SERVER_ERROR);
            http_response_code(self::$statusCode);
//            echo json_encode(["error" => "Internal Server Error"], JSON_THROW_ON_ERROR);
//            echo "GRESKA";
            try {
                echo json_encode(["error" => "Internal Server Error"], JSON_THROW_ON_ERROR);
            } catch (JsonException $innerException) {
                echo '{"error": "Internal Server Error"}';
            }
        }
        exit();
    }

    public static function throwError($code, $message)
    {
        http_response_code($code);
        echo $message;
        exit();
    }

    public static function status($code): Response
    {
//        header($_SERVER['SERVER_PROTOCOL'] . ' 415 No content');
//        echo http_response_code($code);
        self::$statusCode = $code;
        return new self;
    }
}