<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\User;
use PDO;

class CemRepo 
{
    private string $table = "cemeteries";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }

    // Add cemetery to the database
    public function add(Cemeteries $cemetery)
    {
        $query = "INSERT into {$this->table} VALUES (?,?,?,?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $cemetery->getCemId(),
            $cemetery->getConId(),
            $cemetery->getCemName(),
            $cemetery->getCemCity(),
            $cemetery->getCemComments()
         ]);
    }

    // Get all rows from the database table
    public function getAll() : Array
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Model\User");
    }

    // Get Cemetery object based on Primary Key
    public function getById(int $id) : Cemeteries
    {
        $query = "SELECT * FROM {$this->table} WHERE CEM_ID = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\User');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateById(Cemeteries $cemetery)
    {
        $query = "UPDATE {$this->table} SET "
                        . "CEM_NAME = ?, "
                        . "CON_ID = ?, "
                        . "CEM_CITY = ?, "
                        . "CEM_COMMENTS = ? "
                        . "where CEM_ID = ?";

        $stmt = $this->pdo->prepare($query)->execute([
            $cemetery->getCemName(), 
            $cemetery->getConId(),
            $cemetery->getCemCity(),
            $cemetery->getCemComments(),
            $cemetery->getCemId()
        ]);
    }

    // delete cemetery by id
    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where USER_ID = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }

}