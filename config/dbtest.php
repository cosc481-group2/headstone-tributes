<?php

    $username = "root"; 
    $password = "YO`lO|Pp`)841j6*";
    $dbName = "testdb"; 
    $instanceHost = "10.99.240.3";
    $instanceUnixSocket = '/cloudsql/cosc571:us-central1:mysqladmin';

    //$username = "COSC571USER"; 
    //$password = "hhJVw5PPlxVQdpMH"; 
    //$dbName = "testdb"; 
    //$instanceHost = "34.74.14.193";

    try {
        // Connect using TCP
        //$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $instanceHost);
        
        $dsn = sprintf(
                'mysql:dbname=%s;unix_socket=%s',
                $dbName,
                $instanceUnixSocket
            );

        // Connect to the database
        $conn = new PDO(
            $dsn,
            $username,
            $password,
        );

        echo "Successfully connected to MYSQL database PDO";

    } catch (PDOException $e) {
            throw new RuntimeException(
                sprintf(
                    'Could not connect to the Cloud SQL Database',
                    $e->getMessage()
                ),
                $e->getCode(),
                $e
            );
    }

