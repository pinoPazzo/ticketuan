<?php
require_once "../../dbConnection.php";

session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = $_SESSION['username'];

        $deleteCliente = "delete from clienti
                            where Mail = ?";
        $statementDeleteCliente = $pdo->prepare($deleteCliente);
        $statementDeleteCliente->execute(array($email));

        session_destroy();
        header("Location: ../../index.php");
        exit();
}


header("Location: cambioResidenza.php?errore=Errore. Riprovare più tardi");
exit();
?>