<?php

namespace SERVICE;

require_once '../repository/DeceasedRepo.php';
require_once '../repository/CemRepo.php';

use MODEL\Cemeteries;
use REPOSITORY\CemRepo;
use REPOSITORY\DeceasedRepo;
use MODEL\Deceased;


class DeceasedService
{
    private $deceasedRepo;
    private $cemRepo;

    public function __construct()
    {
        $this->deceasedRepo = new DeceasedRepo();
        $this->cemRepo = new CemRepo();
    }

    public function getDeceaseds()
    {
        return $this->deceasedRepo->getAll();
    }

    public function getDeceasedsByUser(int $user_id)
    {
        return $this->deceasedRepo->getAllByUserId($user_id);
    }

    public function getDeceased(int $id) 
    {
        return $this->deceasedRepo->getById($id);       
    }

    public function addDeceased(Deceased $deceased)
    {
        $this->deceasedRepo->add($deceased);
    }

    public function addDeceasedWithCemetery(Deceased $deceased,Cemeteries $cemetery)
    {
        $cemId = $this->cemRepo->addGetId($cemetery);
        $deceased->setCemId($cemId);

        $this->deceasedRepo->addGetId($deceased);
    }

    public function deleteDeceased(int $id)
    {
        $this->deceasedRepo->deleteById($id);
    }

    public function updateDeceased(Deceased $deceased)
    {
        $this->deceasedRepo->updateById($deceased);
    }

    public function updateDeceasedCem(Deceased $deceased, Cemeteries $cemetery)
    {   
        if($cemetery->getCemId() == 0) {
            $cemId = $this->cemRepo->addGetId($cemetery);
            $deceased->setCemId($cemId);
        } else {
            $this->cemRepo->updateById($cemetery);
        }

        $this->deceasedRepo->updateById($deceased);
    }
}


