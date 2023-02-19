<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\Country;
use PDO;

class CountryRepo
{
    private string $table = "countries";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }

    public function add(Country $country)
    {
        $query = "INSERT into {$this->table} VALUES (?,?)";

        $stmt = $this->pdo->prepare($query)->execute([
            $country->getConID(),
            $country->getCountry()
        ]);
    }

    public function getAll() : Array
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Model\Country");
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE con_id = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Country');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateById(Country $country)
    {
        $query = "UPDATE {$this->table} SET "
                        . "country = ?"
                        . "where con_id = ?";

        $stmt = $this->pdo->prepare($query)->execute([
            $country->getConID(),
            $country->getCountry()
        ]);
    }

    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where con_id = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
    }
}