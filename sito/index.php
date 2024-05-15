<?php require_once "navBar.php";
require_once "dbConnection.php";

$fallimento = true;
if (!empty($_GET['search'])) {
    $results = [
        'Artista' => [],
        'NomeEvento' => [],
    ];
    $search = htmlspecialchars($_GET['search']);

    if (strlen($search) >= 2) {
        $str = "SELECT * FROM eventi WHERE Artista LIKE :artista
                        OR NomeEvento LIKE :nomeEvento;";

        $statement = $pdo->prepare($str);

        $searchParam = '%' . $search . '%';
        $statement->bindParam(':artista', $searchParam, PDO::PARAM_STR);
        $statement->bindParam(':nomeEvento', $searchParam, PDO::PARAM_STR);

        $statement->execute();
        if ($statement->rowCount() > 0) {
            $fallimento = false; ?>
            <main class="row row-cols-1 row-cols-md-3 g-4 flex-grow-1 m-2">
                <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col" style="width: fit-content; height: fit-content" >
                        <div class="card d-flex flex-column justify-content-center" style="width: fit-content">
                            <img class="card-img-top"
                                 src="<?= $row["URL"] ?>"
                                 alt="puzzo"
                                >
                            <a class="btn btn-outline-warning h-25 m-auto mb-2 mt-2"
                               href="pagineSecondarie/GestioneAcquisto/acquistoBiglietto.php?id=<?= $row["IdEvento"]; ?>">Acquista</a>
                        </div>
                    </div>
                <?php } ?>
            </main>


            <?php
        }
    }

}
if ($fallimento == true) {
    $query = "SELECT * FROM eventi";
    $result = $pdo->prepare($query);
    $result->execute();
    $result = $result->fetchAll();
    $organizzazione = array();

    foreach ($result as $row) {
        $categoria = $row["Categoria"];
        if (!isset($organizzazione[$categoria])) {
            $organizzazione[$categoria] = array();
        }
        $organizzazione[$categoria][] = $row;
    }


    ?>

    <main class="d-flex flex-column flex-grow-1">
        <?php
        foreach ($organizzazione as $index => $item) { ?>
            <div class="mt-4">
                <h2 class="text-center"><?= $index ?></h2>
                <div class="owl-carousel owl-theme">
                    <?php foreach ($item as $item) { ?>
                        <div class="card d-flex flex-column justify-content-center ">
                            <div class="card-body">
                                <img class="card-img-top h-25"
                                     src="<?= $item["URL"] ?>"
                                     alt="puzzo">
                            </div>
                            <a class="btn btn-outline-warning h-25 m-auto mb-2"
                               href="pagineSecondarie/GestioneAcquisto/acquistoBiglietto.php?id=<?= $item["IdEvento"]; ?>">Acquista</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </main>
<?php }
require_once "footer.html" ?>
