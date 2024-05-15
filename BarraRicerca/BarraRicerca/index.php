<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultati della Ricerca</title>
    <script>
        function validateSearch() {
            const searchInput = document.getElementById('search').value;
            const submitButton = document.getElementById('searchButton');
            if (searchInput.length < 2) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }
    </script>
</head>
<body>
<form method="GET" action="" onsubmit="return validateSearch();">
    <label for="search">Cerca:</label>
    <input type="text" id="search" name="search" oninput="validateSearch();">
    <button type="submit" id="searchButton" disabled>Cerca</button>
</form>

<?php
// Codice PHP per ottenere i risultati della ricerca
require_once "../../sito/dbConnection.php";

$results = [
    'Artista' => [],
    'NomeEvento' => [],
];

if (!empty($pdo)) {
    if(isset($_GET['search']) && !empty($_GET['search'])) {

        $search = htmlspecialchars($_GET['search']);

        if (strlen($search) >= 2) {
            $str = "SELECT * FROM eventi WHERE Artista LIKE :searchArtista
            OR NomeEvento LIKE :searchEvento
            OR Citta LIKE :searchCitta
            OR Localita LIKE :searchLocalita;";

            $statement = $pdo->prepare($str);

            $searchParam = '%' . $search . '%';
            $statement->bindParam(':searchArtista', $searchParam, PDO::PARAM_STR);
            $statement->bindParam(':searchEvento', $searchParam, PDO::PARAM_STR);
            $statement->bindParam(':searchCitta', $searchParam, PDO::PARAM_STR);
            $statement->bindParam(':searchLocalita', $searchParam, PDO::PARAM_STR);

            $statement->execute();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if (!empty($row['Artista'])) {
                    $results['Artista'][] = $row['Artista'];
                }
                if (!empty($row['NomeEvento'])) {
                    $results['NomeEvento'][] = $row['NomeEvento'];
                }
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

    // Remove duplicates
    $results['Artista'] = array_unique($results['Artista']);
    $results['NomeEvento'] = array_unique($results['NomeEvento']);
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
?>
</body>
</html>
