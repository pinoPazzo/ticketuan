<?php
require_once "../dbConnection.php";

session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['citta'])  && isset($_POST['via'])  && isset($_POST['civico'])  && isset($_POST['data'])){

        $queryEmail = "SELECT Mail FROM clienti WHERE Mail = ?";
        $statementEmail = $pdo->prepare($queryEmail);
        $statementEmail->execute([$_POST['email']]);
        if($statementEmail->rowCount() > 0){
            header("Location: Registrazione.php?errore=email gia presente");
            exit();
        }
        else{
            $passwordHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $residenza = $_POST['via']. ";" . $_POST['civico'] . ";" . $_POST['citta'];

            $insertCliente = "insert into clienti(nome, cognome, datanascita, residenza, mail, password) values (?, ?, ?, ?, ?, ?)";
            $statementInsertCliente = $pdo->prepare($insertCliente);
            $statementInsertCliente->execute(array($_POST['nome'], $_POST['cognome'], $_POST['data'], $residenza, $_POST['email'], $passwordHash));
            $queryEmail = "SELECT Password,IdCliente FROM clienti WHERE Mail = ?";
            $statementEmail = $pdo->prepare($queryEmail);
            $statementEmail->execute([$_POST['email']]);
            $results = $statementEmail -> fetchAll();
            $_SESSION['id'] = $results[0]["IdCliente"];
            $_SESSION['username'] = $_POST['email'];

            header("Location: ../index.php");
            exit();
        }
    }
}
header("Location: Registrazione.php?errore=dati mancanti");
exit();
?>