<?php require_once "navBar.php";
require_once "dbConnection.php";
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
    foreach ($organizzazione as $index => $item) {?>
        <div class="mt-4">
            <h2 class="text-center"><?=$index?></h2>
            <div class="owl-carousel owl-theme">
                <?php foreach ($item as $item) {?>
                <div class="card d-flex flex-column justify-content-center ">
                    <div class="card-body">
                        <img class="card-img-top h-25"
                             src="https://images.pexels.com/photos/1435904/pexels-photo-1435904.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                             alt="puzzo">
                    </div>
                    <a class="btn btn-outline-warning h-25 m-auto mb-2"  href="acquistoBiglietto.php?id=<?=$item["IdEvento"];?>" >Acquista</a>
                </div>
                <?php }   ?>
            </div>
        </div>
    <?php } ?>
</main>
<?php require_once "footer.html" ?>
