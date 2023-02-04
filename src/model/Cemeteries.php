<?php

declare(strict_types = 1);

namespace MODEL;

use JsonSerializable;

class Cemeteries implements JsonSerializable {

    private int $cem_id;
    private int $con_id;
    private string $cem_name;
    private string $cem_city;
    private string $cem_comments;

    public function setCemId(int $cem_id) {
        $this->cem_id = $cem_id;
    }

    public function getCemId() : int {
        return $this->cem_id;
    }

    public function setConId(int $con_id) {
        $this->con_id = $con_id;
    }

    public function getConId() : int {
        return $this->con_id;
    }

    public function setCemName(string $cem_name) {
        $this->cem_name = $cem_name;
    }

    public function getCemName() : string {
        return $this->cem_name;
    }

    public function setCemCity(string $cem_city) {
        $this->cem_city = $cem_city;
    }

    public function getCemCity() : string {
        return $this->cem_city;
    }

    public function setCemComments(string $cem_comments) {
        $this->cem_comments = $cem_comments;
    }

    public function getCemComments() : string {
        return $this->cem_comments;
    }

    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }
}
?>