<?php

namespace SERVICE;

require_once '../repository/CountryRepo.php';

use REPOSITORY\CountryRepo;
use MODEL\Country;

class UserService
{
    private $countryRepo;

    public function __construct()
    {
        $this->userRepo = new CountryRepo();
    }

    public function getCountry(int $id) 
    {
        return $this->countryRepo->getById($id);       
    }

    public function addCountry(Country $country)
    {
        $this->countryRepo->add($country);
    }

    public function deleteCountry(int $id)
    {
        $this->countryRepo->deleteById($id);
    }

    public function updateCountry(Country $country)
    {
        $this->countryRepo->updateById($country);
    }
}