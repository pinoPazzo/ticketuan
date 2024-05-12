<?php
require_once "../../dbConnection.php";

session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}
//T9#abcdef
$pdo = creatorePdo();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['vecchiaPass']) && isset($_POST['nuovaPass']) ){

        $email = $_SESSION['username'];
        $queryEmail = "SELECT Password FROM clienti WHERE Mail = ?";
        $statementEmail = $pdo->prepare($queryEmail);
        $statementEmail->execute(array($email));

        $statementEmail->setFetchMode(PDO::FETCH_ASSOC);
        $results = $statementEmail -> fetchAll();
        if(password_verify($_POST['vecchiaPass'], $results[0]["Password"])){

            if(password_verify($_POST['nuovaPass'], $results[0]["Password"])){
                header("Location: cambioPassword.php?errore=La password nuova non può essere uguale a quella attuale");
                exit();
            }
            else{
                $passwordHash = password_hash($_POST['nuovaPass'], PASSWORD_DEFAULT);
                $UpdateCliente = "update clienti
                                set Password = ?
                                where Mail = ?";
                $statementUpdateCliente = $pdo->prepare($UpdateCliente);
                $statementUpdateCliente->execute(array($passwordHash, $email));

                header("Location: ../../userPage.php");
                exit();
            }

        }
        else{
            header("Location: cambioPassword.php?Errore=la password attule non è corretta");
            exit();
        }
    }

}
header("Location: cambioPassword.php?errore=Dati mancanti");
exit();
?>