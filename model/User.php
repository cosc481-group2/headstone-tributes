<?php

declare(strict_types = 1);

namespace MODEL;

class User {

    private int $user_id;
    private string $user_name;
    private string $first_name;
    private string $last_name;
    private string $email;

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

    public function getUsername() : string
    {
        return $this->user_name;
    }

    public function setUsername(string $user_name)
    {
        $this->user_name = $user_name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

}