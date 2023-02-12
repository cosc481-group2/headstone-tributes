<?php

namespace SERVICE;

require_once '../repository/CemRepo.php';

use REPOSITORY\CemRepo;
use MODEL\Cemeteries;

class CemService
{
    private $cemRepo;

    public function __construct()
    {
        $this->cemRepo = new CemRepo();
    }

    public function getCemeteries()
    {
        return $this->cemRepo->getAll();
    }

    public function getCemetery(int $id) 
    {
        return $this->cemRepo->getById($id);       
    }

    public function addCemetery(Cemeteries $cemetery)
    {
        $this->cemRepo->add($cemetery);
    }

    public function deleteCemetery(int $id)
    {
        $this->cemRepo->deleteById($id);
    }

    public function updateCemetery(Cemeteries $cemetery)
    {
        $this->cemRepo->updateById($cemetery);
    }
}


