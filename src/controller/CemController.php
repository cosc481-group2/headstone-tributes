<?php

require_once '../service/CemService.php';
require_once '../model/Cemeteries.php';

use SERVICE\CemService;
use MODEL\Cemeteries;


function getAllCemeteries()
{
    $service = new cemService();
    $cemeteries = $service->getCemeteries();
    echo json_encode($cemeteries, JSON_PRETTY_PRINT);
    return;
}

function getCemetery()
{
    $service = new cemService();
    $cemetery = $service->getCemetery($_GET["cem_id"]);
    echo json_encode($cemetery, JSON_PRETTY_PRINT);
    return;
}

function addCemetery()
{
    $cemetery = new Cemeteries();
    $cemetery->setCemId($_POST["cem_id"]);
    $cemetery->setConId($_POST["con_id"]);
    $cemetery->setCemName($_POST["cem_name"]);
    $cemetery->setCemCity($_POST["cem_city"]);
    $cemetery->setCemComments($_POST["cem_comments"]);

    $service = new CemService();
    $service->addCemetery($cemetery);
    return;
}

function deleteCemetery()
{
    echo 'Hello world';
    echo ($_POST["cem_id"]);
    $service = new cemService();
    $service->deleteCemetery($_POST["cem_id"]);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value
if(isset($_GET["func"]))
{
    $func = $_GET["func"];

    switch($func) 
    {
        case 'all':
            getAllCemeteries();
            break;
        case 'get':
            getCemetery();
            break;
    }
    
} 
else if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'add':
            addCemetery();
            break;
        case 'del':
            deleteCemetery();
            break;
    }
}

?>