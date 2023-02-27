<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\Login;
use PDO;

class LoginRepo
{
    private string $table = "login";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }

    public function add(Login $login)
    {
        $query = "INSERT into {$this->table} VALUES (?,?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $login->getUserId(),
            $login->getPassword(),
            $login->getComments()
        ]);
    }

    public function getByIdPw(int $id, string $pw)
    {
        $query = "SELECT user_id FROM {$this->table} WHERE USER_ID = ? AND PW = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Login');
        $stmt->execute([$id, $pw]);
        return $stmt->fetch();
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE USER_ID = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Login');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateById(Login $login)
    {
        $query = "UPDATE {$this->table} SET "
                        . "pw = ?, "
                        . "comments = ? "
                        . "where user_id = ?";

        $stmt = $this->pdo->prepare($query)->execute([
            $login->getPassword(),
            $login->getComments(),
            $login->getUserId()
        ]);
    }

    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where USER_ID = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }
}