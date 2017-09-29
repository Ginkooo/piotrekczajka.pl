<?php

require_once __DIR__ . '/DatabaseHandler.php';

class Auth
{
    public static function login($username, $password)
    {
        $pdo = DatabaseHandler::getPDO();

        $sql = "SELECT * FROM users where username = ?";

        $query = $pdo->prepare($sql);

        if (!$query) {
            die('Bad sql');
        }

        $query->execute([$username]);
        $results = $query->fetchObject();

        return password_verify($password, $results->pwhash);
    }
}
