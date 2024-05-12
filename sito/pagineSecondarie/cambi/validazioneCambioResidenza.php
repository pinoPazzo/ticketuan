<?php
require_once "../../dbConnection.php";

session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

$pdo = creatorePdo();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['citta'])  && isset($_POST['via'])  && isset($_POST['civico'])){

            $residenza = $_POST['via']. ";" . $_POST['civico'] . ";" . $_POST['citta'];
            $email = $_SESSION['username'];

            $UpdateCliente = "update clienti
                                set Residenza = ?
                                where Mail = ?";
            $statementUpdateCliente = $pdo->prepare($UpdateCliente);
            $statementUpdateCliente->execute(array($residenza, $email));

            header("Location: ../../userPage.php");
            exit();
    }

}
header("Location: cambioResidenza.php?errore=Dati mancanti");
exit();
?>