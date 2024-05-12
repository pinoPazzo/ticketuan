<?php
require_once "../navBarPagineSecondarie.php";
?>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="card-body p-4 p-lg-5">

                            <form method="post" action="validazioneCambioPassword.php">

                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">Cambio password</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Modifica la tua password</h5>

                                <?php if(isset($_GET['errore'])){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_GET['errore'] ?>
                                    </div>
                                <?php } ?>
                                <div class="alert alert-danger" role="alert" id="allert2">
                                    <p id="error"></p>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="form2Example27" class="form-control form-control-lg"
                                           name="vecchiaPass" required/>
                                    <label class="form-label" for="form2Example27">Password in uso</label>
                                    <p id="passError" class="error text-danger"></p>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="form2Example27" class="form-control form-control-lg"
                                           name="nuovaPass" required/>
                                    <label class="form-label" for="form2Example27">Password nuova</label>
                                    <p id="passError" class="error text-danger"></p>
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
    <script src="validazioneInvioPassword.js"></script>
<?php
require_once "../footerPagineSecondarie.html";
?>