<?php

declare(strict_types = 1);

namespace MODEL;

use JsonSerializable;


class Tributes implements JsonSerializable 
{
    private int $dec_id;
    private int $user_id;
    private string $tribute;
    private ?string $dt_post;
    private int $id;
    


    public function getDecId() : int
    {
        return $this->dec_id;
    }

    public function setDecId(int $user_id) 
    {
        $this->dec_id = $user_id;
    }
    
    public function getUserId() : int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id) 
    {
        $this->user_id = $user_id;
    }

    public function getTribute() : string
    {
        return $this->tribute;
    }

    public function setTribute(string $tribute)
    {
        $this->tribute = $tribute;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getDtPosted() : ?string
    {
        return $this->dt_post;
    }

    public function setDtPosted(?string $date)
    {
        $this->dt_post = $date;
    }

    public function jsonSerialize() : mixed
    {
        return get_object_vars($this);
    }
}