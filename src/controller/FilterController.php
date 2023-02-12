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

    $filtered = $service->getFilteredDecIds($_POST['filt_str']);
    echo json_encode($filtered , JSON_PRETTY_PRINT);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value

if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'filt':

            getFiltered();
            break;

    }
}

?>
