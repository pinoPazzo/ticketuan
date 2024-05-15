<?php
require_once "../navBarPagineSecondarie.php";
require_once "../../dbConnection.php";

if($isLogged){
$query = "SELECT * FROM eventi WHERE IdEvento = ?";
$result = $pdo->prepare($query);
$result->execute([$_GET["id"]]);
if ($result->rowCount() > 0){
$result = $result->fetchAll();
?>
<div class="container py-5 flex-grow-1">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card shadow" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="<?=$result[0]["URL"]?>"
                             alt="immagine evento" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                        <div class="card-body p-4 p-lg-5">
                            <?php
                            echo '<div class="d-flex align-items-center mb-3 pb-1">
                                            <b>Nome evento: </b>‎ '. $result[0]["NomeEvento"].'                                   
                                        </div>';
                            if($result[0]["Artista"] != NULL) {
                                echo '<div class="d-flex align-items-center mb-3 pb-1">
                                            <b>Nome artista: </b>‎ ' . $result[0]["Artista"] . '                                   
                                        </div>';
                            }
                            echo '<div class="d-flex align-items-center mb-3 pb-1">
                                            <b>Dove? </b>‎ '. $result[0]["Citta"]. ', ‎'. $result[0]["Localita"]. '                                   
                                        </div>';
                            echo '<div class="d-flex align-items-center mb-3 pb-1">
                                            <b>Quando? </b>‎ '. $result[0]["DataOra"]. '                                   
                                        </div>';
                            echo '<div class="d-flex align-items-center mb-3 pb-1">
                                            <b>Costo biglietto: </b>‎ '. $result[0]["Costo"]. ' €'. '                                   
                                        </div>';
                            ?>

                        </div>

                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5">

                            <form id="formino" method="post" action="confermaBiglietto.php?id=<?=$_GET["id"]?>&prezzo=<?=$result[0]["Costo"]?>">

                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">Acquisto</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Procedi con il tuo acquisto</h5>

                                <div class="alert alert-danger" role="alert" id="allert2" style="display: none;">
                                    <p id="error"></p>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form2Example27" class="form-control form-control-lg"
                                           name="nome" required/>
                                    <label class="form-label" for="form2Example27">Nome Cognome</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input id="form2Example17" class="form-control form-control-lg"
                                           type="tel" inputmode="numeric" pattern="[0-9\s-]{19}"
                                           autocomplete="cc-number" maxlength="19"
                                           placeholder="xxxx xxxx xxxx xxxx" required>
                                    <label class="form-label" for="form2Example17">Numero di carta</label>
                                </div>

                                <script>
                                    document.getElementById('form2Example17').addEventListener('input', function (e) {
                                        let input = e.target.value.replace(/\D/g, '');
                                        let formattedInput = input.replace(/(\d{4})/g, '$1-');
                                        formattedInput = formattedInput.trim().slice(0, 19);
                                        e.target.value = formattedInput;
                                    });
                                </script>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="form2Example18" class="form-control form-control-lg"
                                           name="cvv" pattern="[0-9\s]{3}" required maxlength="3"/>
                                    <label class="form-label" for="form2Example18">CVV</label>
                                </div>

                                <script>
                                    document.getElementById('form2Example18').addEventListener('input', function (e) {
                                        let input = e.target.value.replace(/\D/g, '');
                                        input = input.slice(0, 3);
                                        e.target.value = input;

                                        let button = document.querySelector('button[type="submit"]');
                                        if (input.length === 3) {
                                            button.disabled = false;
                                        } else {
                                            button.disabled = true;
                                        }
                                    });
                                </script>


                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="expiry-date" class="form-control form-control-lg"
                                           name="data" placeholder="MM-YYYY" required maxlength="7"/>
                                    <label class="form-label" for="expiry-date">Data di scadenza</label>
                                </div>

                                <script>
                                    document.getElementById('expiry-date').addEventListener('input', function(e) {
                                        let input = e.target.value.replace(/\D/g, '');
                                        if (input.length > 2) {
                                            input = input.substring(0, 2) + '-' + input.substring(2, 6);
                                        }
                                        e.target.value = input.substring(0, 7);

                                        let month = parseInt(input.substring(0, 2));
                                        let year = parseInt(input.substring(3, 7));
                                        let currentYear = new Date().getFullYear();
                                        let currentMonth = new Date().getMonth() + 1;
                                        let button = document.querySelector('button[type="submit"]');

                                        if (month > 12 || year < currentYear || (year === currentYear && month < currentMonth)) {
                                            document.getElementById('allert2').style.display = 'block';
                                            let errorMsg = '';
                                            if (year < currentYear || (year === currentYear && month < currentMonth)) {
                                                errorMsg = 'La carta è scaduta.';
                                            } else {
                                                errorMsg = 'Data di scadenza non valida. Assicurati che il mese sia tra 01 e 12.';
                                            }
                                            document.getElementById('error').innerText = errorMsg;
                                            button.disabled = true;
                                        } else {
                                            document.getElementById('allert2').style.display = 'none';
                                            document.getElementById('error').innerText = '';
                                            button.disabled = false;
                                        }
                                    });
                                </script>

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
    header("Location: ../../index.php");
}
}else{
    header("Location: ../../loginRegistrazione/login.php?nonLoggato");
} ?>
<script src="validazioneBiglietto.js"></script>
<?php
require_once "../../footer.html";
?>

