<?php

declare(strict_types = 1);

namespace MODEL;

use JsonSerializable;


class Filter implements JsonSerializable 
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
    private string $str2search;
    private string $cem_name;
    private string $cem_city;
    private string $country;
  private string $cem_comments;


  public function getStrSearch() : string
  {
      return $this->str2search;
  }

  public function setStrSearch(string $str2search) 
  {
      $this->str2search = $str2search;
  }
    public function getCemComments() : string
    {
        return $this->cem_comments;
    }

    public function setCemComments(string $cem_comments) 
    {
        $this->cem_comments = $cem_comments;
    }
    public function getCemName() : string
    {
        return $this->cem_city;
    }

    public function setCemName(string $cem_name) 
    {
        $this->cem_name = $cem_name;
    }
    
    
    public function getCemCity() : string
    {
        return $this->cem_city;
    }

    public function setCemCity(string $cem_city) 
    {
        $this->cem_city = $cem_city;
    }


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

    public function getStr2Search() : string
    {
        return $this->str_to_search;
    }

    public function setStr2Search(string $str_2_search)
    {
        $this->str_to_search = $str_2_search;
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