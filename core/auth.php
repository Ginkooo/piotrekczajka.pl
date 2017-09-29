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

        if (isset($_SESSION['logged'])) {
            return true;
        }

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

    /**
     * Logs out user, by unsetting session key
     *
     * @return void
     */
    public static function logout()
    {
        unset($_SESSION['logged']);
    }
}
