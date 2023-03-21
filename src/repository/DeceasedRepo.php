<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\Deceased;
use PDO;

class DeceasedRepo
{
    private string $table = "deceased";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }

    public function getAll() : Array
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Model\Deceased");
    }

    public function getAllByUserId(int $user_id) : Array
    {
        $query = "SELECT * FROM {$this->table} WHERE USER_ID = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Deceased');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function add(Deceased $deceased)
    {
        $query = "INSERT into {$this->table} VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $deceased->getDecId(),
            $deceased->getUserId(),
            $deceased->getCemId(),
            $deceased->getLastname(),
            $deceased->getFirstname(),
            $deceased->getMidInit(),
            $deceased->getDtBorn(),
            $deceased->getDtPassed(),
            $deceased->getObit(),
            $deceased->getComments()
        ]);
    }

    public function addGetId(Deceased $deceased)
    {
        $query = "INSERT into {$this->table} (user_id,cem_id,d_last_name,d_first_name,d_mi,dt_born,dt_passed,obit,comments) VALUES (?,?,?,?,?,?,?,?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $deceased->getUserId(),
            $deceased->getCemId(),
            $deceased->getLastname(),
            $deceased->getFirstname(),
            $deceased->getMidInit(),
            $deceased->getDtBorn(),
            $deceased->getDtPassed(),
            $deceased->getObit(),
            $deceased->getComments()
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE DEC_ID = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Deceased');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateById(Deceased $deceased)
    {
        $query = "UPDATE {$this->table} SET "
          . "user_id = ?, "
          . "cem_id = ?, "
          . "d_last_name = ?, "
          . "d_first_name = ?, "
          . "d_mi = ?, "
          . "dt_born = ?, "
          . "dt_passed = ?, "
          . "obit = ?, "
          . "comments = ? "
          . "WHERE dec_id = ?";

        $stmt = $this->pdo->prepare($query)->execute([
          $deceased->getUserId(),
          $deceased->getCemId(),
          $deceased->getLastname(),
          $deceased->getFirstname(),
          $deceased->getMidInit(),
          $deceased->getDtBorn(),
          $deceased->getDtPassed(),
          $deceased->getObit(),
          $deceased->getComments(),
          $deceased->getDecId()
      ]);
    }

    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where DEC_ID = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }
}
