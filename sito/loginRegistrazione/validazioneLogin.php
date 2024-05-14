<?php
require_once "../dbConnection.php";
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['email']) && isset($_POST['pass']) ){

        $queryEmail = "SELECT Password,IdCliente FROM clienti WHERE Mail = ?";
        $statementEmail = $pdo->prepare($queryEmail);
        $statementEmail->execute([$_POST['email']]);
        if($statementEmail->rowCount() == 0){
            header("Location: login.php?errore=email o/e password errati");
            exit();
        }
        else{
            $results = $statementEmail -> fetchAll();
            if(password_verify($_POST['pass'], $results[0]["Password"])){
                $_SESSION['username'] = $_POST['email'];
                $_SESSION['id'] = $results[0]["IdCliente"];
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