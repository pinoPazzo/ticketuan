<?php
require_once "../dbConnection.php";
session_start();

if (empty($_SESSION["id"])) {
    header("Location: ../index.php");
}
$query = "INSERT INTO biglietti(ImportoPagato, Posto, DataAcquisto, IdC, IdE) VALUES (?,?,?,?,?)";
$result = $pdo->prepare($query);
$result = $result->execute([$_GET["prezzo"],"0A",date("Y-m-d"),$_SESSION['id'],$_GET['id']]);
header("Location: ../index.php");