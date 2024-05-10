<?php
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

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
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['email']) && isset($_POST['pass']) ){

        $queryEmail = "SELECT Password FROM clienti WHERE Mail = ?";
        $statementEmail = $pdo->prepare($queryEmail);
        $statementEmail->execute([$_POST['email']]);
        if($statementEmail->rowCount() == 0){
            header("Location: login.php?errore=email o/e password errati");
            exit();
        }
        else{
            $statementEmail->setFetchMode(PDO::FETCH_ASSOC);
            $results = $statementEmail -> fetchAll();
            if(password_verify($_POST['pass'], $results[0]["Password"])){
                $_SESSION['username'] = $_POST['email'];
                header("Location: ../index.php");
                exit();
            }
            else{
                header("Location: login.php?errore=email o/e password errati");
                exit();
            }

        }

    }
header("Location: Registrazione.php?dati mancanti");
exit();
}


?>