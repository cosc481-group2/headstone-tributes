<?php

declare(strict_types = 1);

namespace REPOSITORY;

use MODEL\AppModel;
use REPOSITORY\appRepo;
use MODEL\User;

class userRepo extends appRepo {

    private $table = "users";


    public function save(AppModel $appModel) : int
    {
        $query = "INSERT into {$this->table} VALUES (:USER_ID, :FIRST_NAME, :LAST_NAME)";

        $user = (User)$appModel;

        //$stmt = $conn->prepare

        return 0;
    }

    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}";
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE USER_ID = :USER_ID";
    }

    public function updateById(User $user)
    {
        $query = "UPDATE {$this->table} SET "
                    + "FIRST_NAME = :FIRST_NAME"
                    + "LAST_NAME = :LAST_NAME";
    }

    public function deleteById(int $id)
    {
        $query = "DELETE from {$this->table} where USER_ID = :USER_ID";
    }

}

