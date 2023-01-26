<?php

declare(strict_types = 1);

namespace REPOSITORY;

use Config\DB;
use MODEL\User;
use PDO;

class userRepo 
{
    private string $table = "users";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }

    public function save(User $user) : int
    {
        $query = "INSERT into {$this->table} VALUES (:USER_ID, :FIRST_NAME, :LAST_NAME)";

        //$stmt = $conn->prepare

        return 0;
    }

    public function getAll() : Array
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    // Get User object based on Primary Key
    public function getById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE USER_ID = ?";
        
        $stmt = $this->pdo->prepare($query)->execute([$id]);

        //$user = $stmt->fetch();
    }

    public function updateById(User $user)
    {
        $query = "UPDATE {$this->table} SET "
                        . "FIRST_NAME = ?,"
                        . "LAST_NAME = ?, "
                        . "EMAIL = ?,"
                        . "WHERE USER_ID = ?";

        $stmt = $this->pdo->prepare($query)->execute([
            $user->getFirstname(), 
            $user->getLastname(),
            $user->getEmail(),
            $user->getUserId()
        ]);
    }

    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where USER_ID = ?";

        $stmt = $this->pdo->prepare($query)->execute([$id]);
    }

}