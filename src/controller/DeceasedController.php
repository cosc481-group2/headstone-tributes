<?php

require_once '../service/DeceasedService.php';
require_once '../model/Deceased.php';
require_once '../core/TimeFunctions.php';

use SERVICE\DeceasedService;
use MODEL\Deceased;



function getAllDeceased()
{
    $service = new DeceasedService();
    $deceaseds = $service->getDeceaseds();
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
    $deceased = new Deceased();
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

    $service = new DeceasedService();
    $service->addDeceased($deceased);
    return;
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
    }
    
} 
else if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'add':
            addDeceased();
            break;
        case 'del':
            deleteDeceased();
            break;
    }
}

?>



<!-- ========================================================================================== -->



</head>
<body>
<div class="container">
<h1>Deceased tester</h1>

<!-- POST -->
<form method="post">


<p>dec_id:
  <input type="text" name="dec_id" size="30" value="1"/>
</p>
<p>user_id:
  <input type="text" name="user_id" size="30" value="1"/>
</p>
<p>cem_id:
  <input type="text" name="cem_id" size="30" value="1"/>
</p>
<p>d_last_name:
  <input type="text" name="d_last_name" size="30" value="Bodnar"/>
</p>
<p>d_first_name:
  <input type="text" name="d_first_name" size="30" value="Andy"/>
</p>
<p>d_mi:
  <input type="text" name="d_mi" size="30" value="L"/>
</p>
<p>dt_born:
  <input type="text" name="dt_born" size="30" value="1982-06-22"/>
</p>
<p>dt_passed:
  <input type="text" name="dt_passed" size="30" value="2012-07-24"/>
</p>
<p>obit:
  <input type="text" name="obit" size="30" value="obit text..."/>
</p>
<p>comments:
  <input type="text" name="comments" size="30" value="comments..."/>
</p>
<p>func:
  <input type="text" name="func" size="30" value="add"/>
</p>

  <input type="submit" value="Test" name="test">

</p>
</form>
</div>
</body>
</html>


