<?php
require "dbConnection.php";

$results = [];

if (!empty($pdo)) {
    if(isset($_GET['search']) && !empty($_GET['search'])) {
        // Pulisce la stringa di ricerca
        $search = htmlspecialchars($_GET['search']);

        // Query per la ricerca
        $str = "SELECT * FROM eventi WHERE Artista LIKE :search 
                OR NomeEvento LIKE :search OR Localita LIKE :search 
                OR Citta LIKE :search OR DataOra LIKE :search 
                OR Costo LIKE :search OR Categoria LIKE :search";

        // Prepariamo la query
        $statement = $pdo->prepare($str);

        // Bind dei parametri e esecuzione della query
        $statement->execute(array(':search' => "%$search%"));

        // Recupero dei risultati
        $results = $statement->fetchAll();
    } else {
        // Nessuna ricerca effettuata, recupera tutti gli eventi
        $str = "SELECT * FROM eventi";
        $statement = $pdo->query($str);
        if (!$statement) {
            echo "ERROR";
        }
        $results = $statement->fetchAll();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Eventi</title>
</head>
<body>
<h1>Elenco degli Eventi</h1>

<!-- Form per la ricerca -->
<form method="GET" action="">
    <input type="text" name="search" placeholder="Cerca per artista, nome evento, località, città, data, costo o categoria...">
    <button type="submit">Cerca</button>
</form>

<?php
if (!empty($results)) {
    foreach ($results as $event) {
        echo "<div>";
        echo "<h2>{$event['Artista']}</h2>";
        echo "<p>Nome Evento: {$event['NomeEvento']}</p>";
        echo "<p>Località: {$event['Localita']}</p>";
        echo "<p>Città: {$event['Citta']}</p>";
        echo "<p>Data e Ora: {$event['DataOra']}</p>";
        echo "<p>Costo: {$event['Costo']}</p>";
        echo "<p>Categoria: {$event['Categoria']}</p>";
        // Altre informazioni sull'evento...
        echo "</div>";
    }
} else {
    echo "<p>Nessun evento trovato.</p>";
}
?>
</body>
</html>


