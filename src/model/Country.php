<?php

declare(strict_types = 1);

namespace MODEL;

use JsonSerializable;

class Country implements JsonSerializable {

    private string $con_id;
    private string $country;

    public function setConID (string $con_id) {
        $this->con_id = $con_id;
    }

    public function getConID () : string {
        return $this->con_id;
    }

    public function setCountry (string $country) {
        $this->country = $country;
    }

    public function getCountry () : string {
        return $this->country;
    }

    public function jsonSerialize() : mixed
    {
        return get_object_vars($this);
    }
}
?>
