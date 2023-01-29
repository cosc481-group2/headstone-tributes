<?php

declare(strict_types=1);

namespace MODEL;

use JsonSerializable;

class Login implements JsonSerializable
{
    private int $user_id;
    private string $pw;
    private string $comments;

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUserId() : int
    {
        return $this->user_id;
    }

    public function setPassword(string $pw)
    {
        $this->pw = $pw;
    }

    public function getPassword() : string
    {
        return $this->pw;
    }

    public function setComments(string $comments)
    { 
        $this->comments = $comments;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function jsonSerialize() : mixed
    {
        return get_object_vars($this);
    }
}
