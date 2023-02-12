<?php
require_once '../service/TributeService.php';
require_once '../model/Tributes.php';
require_once '../core/TimeFunctions.php';

use SERVICE\TributeService;
use MODEL\Tributes;



function getAllTributes()
{
    $service = new TributeService();
    $tributes = $service->getTributes();
    echo json_encode($tributes , JSON_PRETTY_PRINT);
    return;
}

function getAllTributesByUser()
{
    $service = new TributeService();
    $tributes = $service->getTributesByUser($_GET['user_id']);
    echo json_encode($tributes , JSON_PRETTY_PRINT);
    return;
}

function getTribute()
{
    $service = new TributeService();
    $tribute = $service->getTribute($_GET["id"]);
    echo json_encode($tribute, JSON_PRETTY_PRINT);
    return;
}

function addTribute()
{
  $tribute = new Tributes();
  $tribute->setDecId($_POST["dec_id"]);
  $tribute->setUserId($_POST["user_id"]);
  $tribute->setTribute($_POST["tribute"]);
  $tribute->setId($_POST["id"]);
    
  if (isValidDate($_POST["dt_post"]))
      $tribute->setDtPosted($_POST["dt_post"]);
  else
      $tribute->setDtPosted(null);

  $service = new TributeService();
  $service->addTribute($tribute);
  return;
}

function deleteTribute()
{
    $service = new TributeService();
    $service->deleteTribute($_POST["id"]);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value
if(isset($_GET["func"]))
{
    $func = $_GET["func"];

    switch($func) 
    {
        case 'all':
            getAllTributes();
            break;
        case 'get':
            getTribute();
            break;
        case 'allByUser';
            getAllTributesByUser();
            break;
    }
    
} 
else if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'add':
            addTribute();
            break;
        case 'del':
            deleteTribute();
            break;
    }
}

?>
