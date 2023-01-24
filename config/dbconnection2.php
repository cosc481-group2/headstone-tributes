<?php  
    $dbHost="10.99.240.3";  
    $dbName="testdb";  
    $dbUser="root";      //by default root is user name.  
    $dbPassword="YO`lO|Pp`)841j6*";     //password is blank by default  
    try{  
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);
        //$dbConn = new mysqli($dbHost,$dbUser,$dbPassword);  
        echo "Successfully connected with myDB database";  
    } catch(Exception $e){  
        echo "Connection failed" . $e->getMessage();  
    }  
?>

