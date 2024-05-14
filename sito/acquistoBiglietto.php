<?php
require_once "navBar.php";
require_once "dbConnection.php";
if($isLogged){
    $query = "SELECT * FROM eventi WHERE IdEvento = ?";
    $result = $pdo->prepare($query);
    $result->execute([$_GET["id"]]);
    if ($result->rowCount() > 0){
        $result = $result->fetchAll();
        print_r($result);?>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card shadow" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="####"
                                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5">

                                    <form method="post" action="GestioneAcquisto/confermaBiglietto.php?id=<?=$_GET["id"]?>&prezzo=<?=$result[0]["Costo"]?>">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Bentornato</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Accedi al tuo account</h5>

                                        <?php if(isset($_GET['errore'])){ ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_GET['errore'] ?>
                                            </div>
                                        <?php } ?>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input id="form2Example17" class="form-control form-control-lg"
                                                   type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}"
                                                   autocomplete="cc-number" maxlength="19"
                                                   placeholder="xxxx xxxx xxxx xxxx" required>
                                            <label class="form-label" for="form2Example17">Numero di carta</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form2Example17" class="form-control form-control-lg"
                                                   name="cvv" required/>
                                            <label class="form-label" for="form2Example17">CVV</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="month" id="form2Example17" class="form-control form-control-lg"
                                                   name="data" required/>
                                            <label class="form-label" for="form2Example17">Data di scadenza</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form2Example27" class="form-control form-control-lg"
                                                   name="nome" required/>
                                            <label class="form-label" for="form2Example27">Nome</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-outline-warning btn-lg btn-block" type="submit">Acquista
                                            </button>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    else{
        header("Location: index.php");
    }
}else{?>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <a href="loginRegistrazione/login.php">
                <h2 class="text-center">Per acquistare il biglietto serve Loggare, premi qui per farlo direttamente</h2>
            </a>
        </div>
    </div>
</div>
<?php }?>
$_SESSION['username']

<a class="btn btn-outline-warning  m-auto mb-2" href="GestioneAcquisto/confermaBiglietto.php?id=<?=$_GET["id"]?>&prezzo=<?=$result[0]["Costo"]?>">Conferma Acquisto</a>