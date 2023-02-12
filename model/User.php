<?php

declare(strict_types = 1);

namespace MODEL;

class User implements AppModel {

    private int $user_id;
    private string $first_name;
    private string $last_name;

    public function getUserId() : int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id) 
    {
        $this->user_id = $user_id;
    }

    public function getFirstname() : string
    {
        return $this->first_name;
    }

    public function setFirstname(string $first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastname() : string
    {
        return $this->last_name;
    }

    public function setLastname(string $last_name)
    {
        $this->last_name = $last_name;
    }

}