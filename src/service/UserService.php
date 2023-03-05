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

    public function getNextId() {
        return $this->loginRepo->getNextId();
    }
    public function getIDbyUN(string $user_name) { // added by AB on 2/27/23
        return $this->userRepo->getIdByUN($user_name);
    }

    public function getLoginByIdPw(int $user_id, string $pw) { // added by AB on 2/27/23
        return $this->loginRepo->getByIdPw($user_id, $pw);
    }

    public function getLoginByIdPw_2(string $user_name, string $pw) { // added by AB on 2/28/23
        return $this->loginRepo->getByIdPw_2($user_name, $pw);
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
    public function updatePw(int $user_id, string $pw)
    {
        $this->loginRepo->updatePw($user_id, $pw);
    }


}


