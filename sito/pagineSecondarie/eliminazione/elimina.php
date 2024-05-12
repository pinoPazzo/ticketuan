<?php
require_once "../navBarPagineSecondarie.php";
?>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card shadow" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="card-body p-4 p-lg-5">

                        <form method="post" action="validazioneElimina.php">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Vuoi eliminare il profilo?</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Se procedi il tuo profilo verra eliminato per sempre(è un sacco di tempo)</h5>

                            <?php if(isset($_GET['errore'])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['errore'] ?>
                                </div>
                            <?php } ?>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input class="form-check-input" type="checkbox" name="conferma" id="flexRadioDefault1" required>
                                <label class="form-check-label" for="flexRadioDefault1">conferma</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg btn-block"
                                        type="submit">Elimina
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
