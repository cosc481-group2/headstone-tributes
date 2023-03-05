<?php
use SERVICE\FilterService;
session_start();
require_once '../service/FilterService.php';
require_once '../model/Filter.php';


use SERVICE\FilteredService;
use MODEL\Filter;



function getFiltered()
{
    $service = new FilterService();

    $filtered = $service->getFilteredDecIds($_GET['search']);
    echo json_encode($filtered , JSON_PRETTY_PRINT);
    return;
}

function getById()
{
    $service = new FilterService();

    $filtered = $service->getFilteredDeceasedById($_GET['id']);
    echo json_encode($filtered , JSON_PRETTY_PRINT);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value

if (isset($_GET["func"])) 
{
    $func = $_GET["func"];

    switch($func) 
    {
        case 'filter':
            getFiltered();
            break;
        case 'get':
            getById();
            break;
    }
}

?>
