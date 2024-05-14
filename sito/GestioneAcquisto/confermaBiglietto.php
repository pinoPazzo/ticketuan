<?php
require_once "../dbConnection.php";
session_start();

if (empty($_SESSION["id"])) {
    echo "crash";
    //header("Location: ../index.php");
}
$query = "INSERT INTO biglietti(ImportoPagato, Posto, DataAcquisto, IdC, IdE) VALUES (?,?,?,?,?)";
$result = $pdo->prepare($query);
$result = $result->execute([0.0,"0A","10-10-1010",$_SESSION['id'],$_GET['id']]);
//header("Location: index.php");