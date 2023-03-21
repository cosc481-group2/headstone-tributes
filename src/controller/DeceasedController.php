<?php
session_start();
require_once '../service/DeceasedService.php';
require_once '../model/Deceased.php';
require_once '../model/Cemeteries.php';
require_once '../core/TimeFunctions.php';

use MODEL\Cemeteries;
use SERVICE\DeceasedService;
use MODEL\Deceased;



function getAllDeceased()
{
    $service = new DeceasedService();
    $deceaseds = $service->getDeceaseds();
    echo json_encode($deceaseds , JSON_PRETTY_PRINT);
    return;
}

function getAllDeceasedByUserId()
{
    $service = new DeceasedService();
    $deceaseds = $service->getDeceasedsByUser($_GET['user_id']);
    echo json_encode($deceaseds , JSON_PRETTY_PRINT);
    return;
}


function getDeceased()
{
    $service = new deceasedService();
    $deceased = $service->getDeceased($_GET["dec_id"]);
    echo json_encode($deceased, JSON_PRETTY_PRINT);
    return;
}

function addDeceased()
{
  // session_start();
  // $_SESSION('user_id') = 1; // todo confirm approach  
  $deceased = new Deceased();
  $cemetery = new Cemeteries();
  //$deceased->setDecId($_POST["dec_id"]);
  $deceased->setUserId($_POST["user_id"]);
  //$deceased->setCemId($_POST["cem_id"]);
  $deceased->setLastname($_POST["d_last_name"]);
  $deceased->setFirstname($_POST["d_first_name"]);
  $deceased->setMidInit($_POST["d_mi"]);
    
    if (isValidDate($_POST["dt_born"]))
        $deceased->setDtBorn($_POST["dt_born"]);
    else
        $deceased->setDtBorn(null);


    if (isValidDate($_POST["dt_passed"]))
        $deceased->setDtPassed($_POST["dt_passed"]);
    else
        $deceased->setDtPassed(null);


    $deceased->setObit($_POST["obit"]);
    $deceased->setComments($_POST["comments"]);

    $cemetery->setConId($_POST["con_id"]);
    $cemetery->setCemName($_POST["cem_name"]);
    $cemetery->setCemCity($_POST["cem_city"]);

    $service = new DeceasedService();
    $service->addDeceasedWithCemetery($deceased, $cemetery);
    return;
}

function updateDeceased()
{
    $deceased = new Deceased();
    $cemetery = new Cemeteries();

    $deceased->setDecId($_POST["dec_id"]);
    $deceased->setUserId($_POST["user_id"]);
    $deceased->setCemId($_POST["cem_id"]);
    $deceased->setLastname($_POST["d_last_name"]);
    $deceased->setFirstname($_POST["d_first_name"]);
    $deceased->setMidInit($_POST["d_mi"]);
    
    if (isValidDate($_POST["dt_born"]))
        $deceased->setDtBorn($_POST["dt_born"]);
    else
        $deceased->setDtBorn(null);

    if (isValidDate($_POST["dt_passed"]))
        $deceased->setDtPassed($_POST["dt_passed"]);
    else
        $deceased->setDtPassed(null);

    $deceased->setObit($_POST["obit"]);
    $deceased->setComments($_POST["comments"]);

    $cemetery->setCemId($_POST["cem_id"]);
    $cemetery->setConId($_POST["con_id"]);
    $cemetery->setCemName($_POST["cem_name"]);
    $cemetery->setCemCity($_POST["cem_city"]);

    $service = new DeceasedService();
    $service->updateDeceasedCem($deceased, $cemetery);
}

function deleteDeceased()
{
    $service = new DeceasedService();
    $service->deleteDeceased($_POST["dec_id"]);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value
if(isset($_GET["func"]))
{
    $func = $_GET["func"];

    switch($func) 
    {
        case 'all':
            getAllDeceased();
            break;
        case 'get':
            getDeceased();
            break;
        case 'allByUser': 
            getAllDeceasedByUserId();
            break; 
    }
// localhost:8080/src/controller/DeceasedController?func=allByUser&user_id=1
    

} 
else if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'add':
            addDeceased();
            break;
        case 'update':
            updateDeceased();
            break;
        case 'del':
            deleteDeceased();
            break;
    }
}

?>
