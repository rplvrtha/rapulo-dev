<?php

namespace Rapulo;


include __DIR__ . '/../config/main.php';

class Db
{
    protected static $connection;
    private $db = $config['db'];
    public function ___construct()
    {
        try {
            self::$connection = new \PDO(
            "{$this->db['driver']}:hostname={$this->db['hostname']};dbname={$this->db['dbname']}",
            $this->db['username'],
            $this->db['password'],
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
        } catch (\PDOException $e) {
            throw new \Exception('Database connection failed: '.$e->getMessage());
        }
    }

    public static function pdo()
    {
        return self::$connection;
    }
}
