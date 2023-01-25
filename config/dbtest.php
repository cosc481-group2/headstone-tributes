<?php

    $username = "will"; 
    $password = "pw";
    $dbName = "testdb1"; 
    $instanceHost = "34.162.157.82";
    $instanceUnixSocket = '/cloudsql/proj-481:us-east5:w481';

    try {

        //$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $instanceHost);

        // Connect using UNIX sockets
        $dsn = sprintf('mysql:dbname=%s;unix_socket=%s',$dbName,$instanceUnixSocket);

        // Connect to the database
        $conn = new PDO(
            $dsn,
            $username,
            $password,
            //[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ] // PDO::FETCH_CLASS FETCH_ASSC
        );

        echo "Successfully connected to MYSQL database PDO"."<br />";

    } catch (\PDOException $e) {
            throw new \PDOException(
                sprintf(
                    'Could not connect to the Cloud NSQL Database',
                    $e->getMessage()
                ),
                $e->getCode()
            );
    }

    $data = $conn->query("SELECT * FROM users")->fetchAll();
    // and somewhere later:
    foreach ($data as $row) {
        echo $row['user_name']." ".$row['last_name']."<br />";
    }

// $query = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (?,?,?,?)';
// $query = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (:email, :name, :active, :date)';
// $stmt = $db->prepare($query);
// $stmt->execute([1,2,3,4]);

// $id= (int) $db->lastInsertId();
