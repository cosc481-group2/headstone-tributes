<?php

namespace SERVICE;

require_once '../repository/TributeRepo.php';

use REPOSITORY\TributeRepo;
use MODEL\Tributes;


class TributeService
{
    private $tributeRepo;

    public function __construct()
    {
        $this->tributeRepo = new TributeRepo();
    }

    public function getTributes()
    {
        return $this->tributeRepo->getAll();
    }

    public function getTributesByUser(int $user_id)
    {
        return $this->tributeRepo->getAllByUser($user_id);
    }

    public function getTributesByDeceased(int $dec_id)
    {
        return $this->tributeRepo->getAllByDeceased($dec_id);
    }


    public function getTribute(int $id) 
    {
        return $this->tributeRepo->getById($id);       
    }

    public function addTribute(Tributes $tributes)
    {
        $this->tributeRepo->add($tributes);
    }

    public function deleteTribute(int $id)
    {
        $this->tributeRepo->deleteById($id);
    }

    public function updateTribute(int $id, string $tribute)
    {
        $this->tributeRepo->updateById($id, $tribute);
    }
}


