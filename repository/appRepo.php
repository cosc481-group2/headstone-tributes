<?php

declare(strict_types = 1);

namespace REPOSITORY;

use MODEL\AppModel;

abstract class appRepo {

    //abstract function __construct()

    abstract protected function save(AppModel $appModel);
    abstract protected function getAll();
    abstract protected function getById(int $id);
    abstract protected function UpdateById($appModel);
    abstract protected function deleteById(int $id);

}