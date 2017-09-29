<?php

require_once __DIR__ . '/../config.php';

/**
 * Class: DatabaseHandler
 * Handles database connections
 *
 * @final
 */
final class DatabaseHandler
{
    /**
     * Gets plan PDO object using configuration file
     *
     * @return PDO
     */
    public static function getPDO()
    {
        return new PDO(Config::CONNECTION_STRING);
    }
}
