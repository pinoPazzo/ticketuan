<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultati della Ricerca</title>
</head>
<body>
<form method="GET" action="">
    <label for="search">Cerca:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Cerca</button>
</form>

<?php
// Codice PHP per ottenere i risultati della ricerca
require_once "dbConnection.php";

$results = [
    'Artista' => [],
    'NomeEvento' => [],
];

if (!empty($pdo)) {
    if(isset($_GET['search']) && !empty($_GET['search'])) {

        $search = htmlspecialchars($_GET['search']);

        $str = "SELECT * FROM eventi WHERE Artista LIKE :artista
                    OR NomeEvento LIKE :nomeEvento;";

        $statement = $pdo->prepare($str);

        $searchParam = '%' . $search . '%';
        $statement->bindParam(':artista', $searchParam);
        $statement->bindParam(':nomeEvento', $searchParam);

        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if (!empty($row['Artista'])) {
                $results['Artista'][] = $row['Artista'];
            }
            if (!empty($row['NomeEvento'])) {
                $results['NomeEvento'][] = $row['NomeEvento'];
            }
        }

    } else {
        // Fetch all records if no search term is provided
        $str = "SELECT * FROM eventi";
        $statement = $pdo->query($str);
        if (!$statement) {
            echo "ERROR";
        }
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if (!empty($row['Artista'])) {
                $results['Artista'][] = $row['Artista'];
            }
            if (!empty($row['NomeEvento'])) {
                $results['NomeEvento'][] = $row['NomeEvento'];
            }
        }
    }
}
?>

<h2>Risultati della Ricerca</h2>

<?php
if (!empty($results['Artista'])) {
    echo "<h3>Artisti</h3>";
    echo "<ul>";
    foreach ($results['Artista'] as $artista) {
        echo "<li>$artista</li>";
    }
    echo "</ul>";
}

if (!empty($results['NomeEvento'])) {
    echo "<h3>Eventi</h3>";
    echo "<ul>";
    foreach ($results['NomeEvento'] as $evento) {
        echo "<li>$evento</li>";
    }
    echo "</ul>";
}
?
</body>
</html>
