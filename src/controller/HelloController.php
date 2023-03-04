<?php

function helloWorld() {

    echo 'Hello World PHP';
}


if(isset($_GET["func"]))
{
    echo('In the GETTER');

    helloWorld();
}

if(isset($_POST["func"]))
{

    echo('In the POSTTER');

    helloWorld();
}

//helloWorld();