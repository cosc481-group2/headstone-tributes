<?php

declare(strict_types = 1);

namespace Core;

use PDO;

class DB
{
    private PDO $pdo;

    public function __construct()
    {
        $username = "will"; 
        $password = "pw";
        $dbName = "testdb1"; 
        $instanceHost = "34.162.157.82";
        $instanceUnixSocket = '/cloudsql/proj-481:us-east5:w481';
        $environemt = getenv("APPENV");

        $pdoOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $instanceHost);

        // Connect using UNIX sockets
        if($environemt == 'prod')
        {
            $dsn = sprintf('mysql:dbname=%s;unix_socket=%s',$dbName,$instanceUnixSocket);
        }

        try {
            $this->pdo = new PDO($dsn,$username,$password,$pdoOptions);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPDO() : PDO
    {
        return $this->pdo;
    }
}