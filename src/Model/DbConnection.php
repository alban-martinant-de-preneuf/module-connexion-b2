<?php

namespace App\Model;

class DbConnection
{
    /**
     * Database connection
     *
     * @var \PDO|null
     */
    private static ?\PDO $_db = null;

    /**
     * Get database connection
     *
     * @return \PDO
     */
    public static function getDb(): \PDO
    {
        if (!self::$_db) {
            try {
                // get database infos from ini file in config folder
                $db_config = parse_ini_file('config' . DIRECTORY_SEPARATOR . 'db.ini');
                // define PDO dsn with retrieved data
                self::$_db = new \PDO(
                    $db_config['type'] . ':dbname=' . $db_config['name']
                        . ';host=' . $db_config['host']
                        . ';charset=' . $db_config['charset'],
                    $db_config['user'],
                    $db_config['password']
                );
                // prevent emulation of prepared requests
                self::$_db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            } catch (\PDOException $e) {
                header("HTTP/1.1 403 Acces refused to the database");
                die();
            }
        }
        return self::$_db;
    }
}
