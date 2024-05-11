<?php
require_once "../dbConnection.php";

$pdo = creatorePdo();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['titolo']) && isset($_POST['text']) && isset($_POST['data'])){
        $insertReclamo = "insert into reclami (Mail, Nome, Titolo, Testo, DataEvento) values (?, ?, ?, ?, ?)";
        $stamentInsertReclamo = $pdo->prepare($insertReclamo);
        $stamentInsertReclamo->execute(array($_POST['email'], $_POST['nome'], $_POST['titolo'], $_POST['text'], $_POST['data']));
        header("Location: reclami.php?sucesso=Segnalazione inviata con successo. La contatteremo al più presto");
        exit();

    }
    else{
        header("Location: reclami.php?errore=Errore inserimento segnalazione. Riprova più tardi");
    }

}


?>