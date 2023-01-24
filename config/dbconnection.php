<?php  
    $dbHost="34.66.137.171";  
    $dbName="testdb";  
    $dbUser="root";      
    $dbPassword="YO`lO|Pp`)841j6*";
    try{  
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);
        //$dbConn = new mysqli($dbHost,$dbUser,$dbPassword);  
        echo "Successfully connected with myDB database";  
    } catch(Exception $e){  
        echo "Connection failed" . $e->getMessage();  
    }  
?>


