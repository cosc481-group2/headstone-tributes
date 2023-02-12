<?php

require_once '../service/CountryService.php';
require_once '../model/Country.php';

use SERVICE\CountryService;
use MODEL\Country;


function getCountry()
{
    $service = new countryService();
    $country = $service->getCountry($_GET["con_id"]);
    echo json_encode($country, JSON_PRETTY_PRINT);
    return;
}

function addUser()
{
    $country = new Country();
    $country->setConId($_POST["con_id"]);
    $country->setCountry($_POST["country"]);

    $service = new userService();
    $service->addCountry($country);
    return;
}

function deleteUser()
{
    $service = new userService();
    $service->deleteCountry($_POST["con_id"]);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value
if(isset($_GET["func"]))
{
    $func = $_GET["func"];

    switch($func) 
    {
        case 'get':
            getCountry();
            break;
    }
    
} 
else if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'add':
            addCountry();
            break;
        case 'del':
            deleteCountry();
            break;
    }
}

?>