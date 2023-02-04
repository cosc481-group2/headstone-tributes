<?php

declare(strict_types = 1);

namespace MODEL;

use DateTime;
use JsonSerializable;


class Deceased implements JsonSerializable 
{
    private int $dec_id;
    private int $user_id;
    private ?int $cem_id;
    private string $d_last_name;
    private string $d_first_name;
    private string $d_mi;
    private ?string $dt_born;
    private ?string $dt_passed;
    private string $obit;
    private string $comments;



    public function getDecId() : int
    {
        return $this->dec_id;
    }

    public function setDecId(int $user_id) 
    {
        $this->dec_id = $user_id;
    }
    
    public function getCemId() : int
    {
        return $this->cem_id;
    }

    public function setCemId(int $cem_id) 
    {
        $this->cem_id = $cem_id;
    }
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
        return $this->d_first_name;
    }

    public function setFirstname(string $first_name)
    {
        $this->d_first_name = $first_name;
    }

    public function getLastname() : string
    {
        return $this->d_last_name;
    }

    public function setLastname(string $last_name)
    {
        $this->d_last_name = $last_name;
    }

    public function getMidInit() : string
    {
        return $this->d_mi;
    }

    public function setMidInit(string $midInit)
    {
        $this->d_mi = $midInit;
    }

    public function getDtBorn() : ?string
    {
        return $this->dt_born;
    }

    public function setDtBorn(?string $dtBorn)
    {
        $this->dt_born = $dtBorn;
    }

    public function getDtPassed() : ?string
    {
        return $this->dt_passed;
    }
    public function setDtPassed(?string $dtPassed)
    {
        $this->dt_passed = $dtPassed;
    }


    public function getObit() : string
    {
        return $this->obit ;
    }

    public function setObit(string $obit)
    {
        $this->obit = $obit;
    }

    public function getComments() : string
    {
        return $this->comments ;
    }

    public function setComments(string $comments)
    {
        $this->comments = $comments;
    }

    public function jsonSerialize() : mixed
    {
        return get_object_vars($this);
    }

}