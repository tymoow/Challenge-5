<?php
    function getDbConnection() {

        $dbhost     = "localhost";
        $dbname     = "db_kantine";
        $dbuser     = "top";
        $dbpass     = "tip";
        $conn       = "";          // connection string
        $pdo        = "";          // handler
        $charset = 'utf8mb4';

        $conn = "mysql:host=" . $dbhost . "; dbname=" . $dbname . ";charset=". $charset;

    

        $options = [ // define options for PDO connection
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // give error in case of issue
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // get row indexed by column name
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($conn, $dbuser, $dbpass, $options); // create connection
            return $pdo;
            //print_r($pdo);
        }
        catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

    } //end getDbConnection

    $pdo = getDbConnection();

?>