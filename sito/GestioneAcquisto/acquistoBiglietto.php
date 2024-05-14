<?php
require_once "../navBar.php";
require_once "../dbConnection.php";
if($isLogged){
    $query = "SELECT * FROM eventi WHERE IdEvento = ?";
    $result = $pdo->prepare($query);
    $result->execute([$_GET["id"]]);
    if ($result->rowCount() > 0){
        $result = $result->fetchAll();
        print_r($result);?>
        <a class="btn btn-outline-warning  m-auto mb-2" href="../GestioneAcquisto/confermaBiglietto.php?id=<?=$_GET["id"]?>&prezzo=<?=$result[0]["Costo"]?>">Conferma Acquisto</a>
    <?php }
    else{
        header("Location: index.php");
    }
}else{?>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <a href="../loginRegistrazione/login.php">
                <h2 class="text-center">Per acquistare il biglietto serve Loggare, premi qui per farlo direttamente</h2>
            </a>
        </div>
    </div>
</div>
<?php }?>
$_SESSION['username']