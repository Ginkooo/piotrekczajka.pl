<?php

require_once __DIR__ . '/../config.php';

final class DatabaseHandler
{
    public static function getPDO()
    {
        return new PDO(Config::CONNECTION_STRING);
    }
}
