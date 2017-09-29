<?php

require_once __DIR__ . '/DatabaseHandler.php';

class Auth
{
    /**
     * Check if provided credencials are correct
     *
     * @param String $username username of the user
     * @param String $password password of the user
     *
     * @return true if succeed, false otherwise
     */
    public static function login($username, $password)
    {
        $pdo = DatabaseHandler::getPDO();

        $sql = "SELECT * FROM users where username = ?";

        $query = $pdo->prepare($sql);

        if (!$query) {
            die('Bad sql');
        }

        $query->execute([mb_strtolower($username)]);
        $results = $query->fetchObject();

        $match = password_verify($password, $results->pwhash);

        if ($match) {
            $_SESSION['logged'] = mb_strtolower($username);
        }

        return $match;
    }
}
