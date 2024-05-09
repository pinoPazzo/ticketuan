<?php
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

$type = 'mysql';
$server = 'localhost';
$db = 'ticketuan';
$port = '3306';
$charset = 'utf8mb4';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";
$pdo = new PDO($dsn, $username, $password, $options);

//_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['citta'])  && isset($_POST['via'])  && isset($_POST['civico'])  && isset($_POST['data'])){
        /*lo so perfettamente che non c'e' validazione, ne sanificazione dei dati, let me cook*/

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

            $_SESSION['username'] = $_POST['email'];
            header("Location: ../index.php");
            exit();
        }
    }
}
header("Location: Registrazione.php?dati mancanti");
exit();
?>