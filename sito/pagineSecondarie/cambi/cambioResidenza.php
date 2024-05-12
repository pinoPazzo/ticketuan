<?php
require_once "../navBarPagineSecondarie.php";
?>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="card-body p-4 p-lg-5">

                            <form method="post" action="validazioneCambioResidenza.php">

                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">Cambio residenza</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Modifica il tuo Indirizzo</h5>

                                <?php if(isset($_GET['errore'])){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_GET['errore'] ?>
                                    </div>
                                <?php } ?>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="citta"
                                           required/>
                                    <label class="form-label" for="form2Example17">Città</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="via"
                                           required/>
                                    <label class="form-label" for="form2Example17">Via</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form2Example17" class="form-control form-control-lg"
                                           name="civico" required/>
                                    <label class="form-label" for="form2Example17">Civico</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg btn-block"
                                            type="submit">Cambio
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once "../footerPagineSecondarie.html";
?>