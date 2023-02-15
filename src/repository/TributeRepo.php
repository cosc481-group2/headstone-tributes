<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\Tributes;
use PDO;

class TributeRepo
{
    private string $table = "tributes";
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
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Model\Tributes"); // fetchAll... NOT fetch
    }

    public function getAllByUser($user_id) : Array
    {
        $query = "SELECT * FROM {$this->table} WHERE USER_ID = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Tributes');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();

    }



    public function add(Tributes $tributes)
    {
        $query = "INSERT into {$this->table} (dec_id, user_id, tribute, id) VALUES (?,?,?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $tributes->getDecId(),
            $tributes->getUserId(),
            $tributes->getTribute(),
            $tributes->getId()
        ]);
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE ID = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Tributes');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateById(int $id, string $tribute) // updates existing tribute
    {
        $query = "UPDATE {$this->table} SET "
          . "tribute = ?, "
          . "dt_post = ? "
          . "WHERE id = " . $id;

        $stmt = $this->pdo->prepare($query)->execute([
          htmlentities($tribute),
          date("Y-m-d") // defaults to current date
      ]);
    }

    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where ID = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }
}