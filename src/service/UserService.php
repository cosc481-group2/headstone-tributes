<?php

namespace SERVICE;

require_once '../repository/UserRepo.php';
require_once '../repository/LoginRepo.php';

use REPOSITORY\UserRepo;
use REPOSITORY\LoginRepo;
use MODEL\User;
use MODEL\Login;

class UserService
{
    private $userRepo;
    private $loginRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepo();
        $this->loginRepo = new LoginRepo();
    }

    public function getUsers()
    {
        return $this->userRepo->getAll();
    }

    public function getUser(int $id) 
    {
        return $this->userRepo->getById($id);       
    }

    public function addUser(User $user,Login $login)
    {
        $this->loginRepo->add($login);
        $this->userRepo->add($user);
    }

    public function deleteUser(int $id)
    {
        $this->userRepo->deleteById($id);
        $this->loginRepo->deleteById($id);
    }

    public function updateUser(User $user)
    {
        $this->userRepo->updateById($user);
    }
}


