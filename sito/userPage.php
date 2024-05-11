<?php
require_once "navBar.php";
require_once "dbConnection.php";

if(!isset($_SESSION['username'])){
    $_SESSION['username'] = null;
}

$email = $_SESSION['username'];

$pdo= creatorePdo();

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
                                <span class="h1 fw-bold mb-0">Benvenuto <?= $result[0]['Nome'] ?></span>
                            </div>

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <a href="#" class="btn btn-primary">Cambio password</a>
                                <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;';?>
                                <a href="#" class="btn btn-primary">Cambio residenza</a>
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