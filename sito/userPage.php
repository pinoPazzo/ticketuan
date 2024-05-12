<?php
require_once "navBar.php";
require_once "dbConnection.php";

if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

$email = $_SESSION['username'];


$query = "SELECT * FROM clienti where mail = '$email'";
$statement = $pdo->query($query);
$result = $statement->fetchAll();
?>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="card-body p-4 p-lg-5">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Ciao <?= $result[0]['Nome'] ?></span>
                            </div>

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <p>indirizzo email: <?= $_SESSION['username'] ?></p>
                            </div>

                            <div class="d-flex align-items-center">
                                <p>residenza:</p>
                            </div>
                            <?php
                            $residenza = explode(";", $result[0]['Residenza']);
                            ?>
                            <div class="d-flex align-items-center">
                                <ul>
                                    <li>Via <?= $residenza[0]?>, <?= $residenza[1]?></li>
                                    <li><?= $residenza[2]?></li>
                                </ul>
                            </div>
                            <hr>
                            <br>
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <a href="pagineSecondarie/cambi/cambioPassword.php" class="btn btn-outline-warning ms-3">Cambio password</a>
                                <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;';?>
                                <a href="pagineSecondarie/cambi/cambioResidenza.php" class="btn btn-outline-warning ms-3">Cambio residenza</a>
                                <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;';?>
                                <a href="pagineSecondarie/eliminazione/elimina.php" class="btn btn-outline-warning ms-3">Elimina Account</a>
                            </div>

                            <p>PLACE OLDER CRONOLOGIA ACQUISTI</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once "footer.html";

?>