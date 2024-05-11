<?php
require_once "../dbConnection.php";
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

$pdo = creatorePdo();
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