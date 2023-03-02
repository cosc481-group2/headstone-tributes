<?php

require_once '../service/UserService.php';
require_once '../model/User.php';
require_once '../model/Login.php';

use SERVICE\UserService;
use MODEL\User;
use MODEL\Login;


function getNextId() 
{
    $service = new userService();
    $user = $service->getNextId();
    echo json_encode($user, JSON_PRETTY_PRINT); // this is key for JS 
    return;
}

function getLogByIdPw_2() 
{
    $service = new userService();
    $user = $service->getLoginByIdPw_2($_GET["user_name"], $_GET['pw']);
    echo json_encode($user, JSON_PRETTY_PRINT); // this is key for JS 
    return;
}
function getLogByIdPw() 
{
    $service = new userService();
    $user = $service->getLoginByIdPw($_GET["user_id"], $_GET['pw']);
    echo json_encode($user, JSON_PRETTY_PRINT); // this is key for JS 
    return;
}

function getAllUsers()
{
    $service = new userService();
    $users = $service->getUsers();
    echo json_encode($users, JSON_PRETTY_PRINT);
    return;
}


function getUserByUserName()
{
    $service = new userService();
    $user = $service->getIDbyUN($_GET["user_name"]);
    echo json_encode($user, JSON_PRETTY_PRINT); // this is key for JS 
    return;
}


function getUser()
{
    $service = new userService();
    $user = $service->getUser($_GET["user_id"]);
    echo json_encode($user, JSON_PRETTY_PRINT);
    return;
}

function addUser()
{
    $login = new Login();
    $login->setUserId($_POST["user_id"]);
    $login->setPassword($_POST["pw"]);
    $login->setComments('');

    $user = new User();
    $user->setUserId($_POST["user_id"]);
    $user->setUsername($_POST["user_name"]);
    $user->setFirstname($_POST["first_name"]);
    $user->setLastname($_POST["last_name"]);
    $user->setEmail($_POST["email"]);

    $service = new userService();
    $service->addUser($user, $login);
    return;
}

function deleteUser()
{
    $service = new userService();
    $service->deleteUser($_POST["user_id"]);
    return;
}

# Check is FUNC param is set for either GET or POST and excute the value
if(isset($_GET["func"]))
{
    $func = $_GET["func"];

    switch($func) 
    {
        case 'all':
            getAllUsers();
            break;
        case 'get':
            getUser();
            break;
        case 'getByUN':
            getUserByUserName();
            break;
        case 'getLogByIdPw':
            getLogByIdPw();
            break;
        case 'getLog2':
            getLogByIdPw_2();
            break;
        case 'nextId':
            getNextId();
            break;
    }
    
} 
else if (isset($_POST["func"])) 
{
    $func = $_POST["func"];

    switch($func) 
    {
        case 'add':
            addUser();
            break;
        case 'del':
            deleteUser();
            break;
    }
}

?>