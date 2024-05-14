<?php
require_once "../dbConnection.php";
session_start();

if (empty($_SESSION["id"])) {
    header("Location: ../index.php");
}
$query = "INSERT INTO biglietti(ImportoPagato, Posto, DataAcquisto, IdC, IdE) VALUES (?,?,?,?,?)";
$result = $pdo->prepare($query);
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$posto = $characters[random_int(0, $charactersLength - 1)];
$result = $result->execute([$_GET["prezzo"],rand(0,9).$posto,date("Y-m-d"),$_SESSION['id'],$_GET['id']]);
header("Location: ../userPage.php");