<?php

    $username = getenv('DB_USER');
    $password = getenv('DB_PASS'); 
    $dbName = getenv('DB_NAME');
    $instanceHost = getenv('DB_HOST');
    $instanceUnixSocket = getenv('INSTANCE_UNIX_SOCKET');

    try {

        //$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $instanceHost);

        // Connect using UNIX sockets
        $dsn = sprintf('mysql:dbname=%s;unix_socket=%s',$dbName,$instanceUnixSocket);

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

