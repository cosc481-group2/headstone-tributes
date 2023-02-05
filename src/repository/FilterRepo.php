<?php

declare(strict_types = 1);

namespace REPOSITORY;

require_once '../core/DB.php';

use Core\DB;
use MODEL\Filter;
use PDO;



class FilterRepo
{
    private string $table = "filt_dec";
    private PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->getPDO();
    }


    public function getFiltered(string $filt_str)
    {
        $query = "SELECT * FROM {$this->table} WHERE str2search LIKE ? "; 
        
        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model\Filter');
        
        $stmt->execute(['%' . strtolower($filt_str) . '%']);
        return $stmt->fetchAll();
    }
   
}