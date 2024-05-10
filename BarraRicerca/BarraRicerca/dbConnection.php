<?php

    $type = 'mysql';
    $server = 'localhost';
    $db = 'ticketuan';
    $port = '3306';
    $charset = 'utf8mb4';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";
    $pdo = new PDO($dsn, $username, $password, $options);

    try{
        $pdo = new PDO($dsn, $username, null, $options);
    }
    catch (PDOException $e){
        throw new PDOException($e -> getMessage(), $e -> getCode());
    }

?>