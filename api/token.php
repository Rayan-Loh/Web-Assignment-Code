<?php
class Token {
    private static $secretKey = 'your_secret_key';

    public static function generate() {
        return hash_hmac('sha256', uniqid(mt_rand(), true), self::$secretKey);
    }

    public static function validate($token) {
        // Here you can add more sophisticated validation logic, such as checking the token in a database
        return !empty($token);
    }
}
