<?php

namespace SERVICE;

require_once '../config/db.php';
require_once '../model/User.php';
require_once '../repository/userRepo.php';

use REPOSITORY\userRepo;

class userService
{
    
    public function __construct()
    {
        //$this->getUsers();
    }

    public function getUsers()
    {
        $userrepo = new userRepo();
        $users = $userrepo->getAll();

        echo '<pre>';
        var_dump($users);
        echo '</pre>';
    }
}

$service = new userService();

$service->getUsers();