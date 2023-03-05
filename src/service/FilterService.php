<?php

namespace SERVICE;

require_once '../repository/FilterRepo.php';

use REPOSITORY\FilterRepo;
use MODEL\Filter;


class FilterService
{
    private $filterRepo;

    public function __construct()
    {
        $this->filterRepo = new FilterRepo();
    }

    public function getFilteredDecIds(string $filt_str)
    {
        return $this->filterRepo->getFiltered($filt_str);
    }

    public function getFilteredDeceasedById(int $id)
    {
        return $this->filterRepo->getById($id);
    }

}


