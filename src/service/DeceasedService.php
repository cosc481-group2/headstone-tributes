<?php

namespace SERVICE;

require_once '../repository/DeceasedRepo.php';

use REPOSITORY\DeceasedRepo;
use MODEL\Deceased;


class DeceasedService
{
    private $deceasedRepo;

    public function __construct()
    {
        $this->deceasedRepo = new DeceasedRepo();
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

    public function deleteDeceased(int $id)
    {
        $this->deceasedRepo->deleteById($id);
    }

    public function updateDeceased(Deceased $deceased)
    {
        $this->deceasedRepo->updateById($deceased);
    }
}


