<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\User;
use PDO;

class UserRepo 
{
    private string $table = "users";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }

    // Add user to the database
    public function add(User $user)
    {
        $query = "INSERT into {$this->table} VALUES (?,?,?,?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $user->getUserId(),
            $user->getUsername(),
            $user->getLastname(),
            $user->getFirstname(),
            $user->getEmail()
         ]);
    }

    // Get all rows from the database table
    public function getAll() : Array
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Model\User");
    }

    // Get User object based on Primary Key
    public function getById(int $id) : User
    {
        $query = "SELECT * FROM {$this->table} WHERE USER_ID = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\User');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateById(User $user)
    {
        $query = "UPDATE {$this->table} SET "
                        . "FIRST_NAME = ?, "
                        . "LAST_NAME = ?, "
                        . "EMAIL = ? "
                        . "where USER_ID = ?";

        $stmt = $this->pdo->prepare($query)->execute([
            $user->getFirstname(), 
            $user->getLastname(),
            $user->getEmail(),
            $user->getUserId()
        ]);
    }

    // delete user by id
    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where USER_ID = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }

}