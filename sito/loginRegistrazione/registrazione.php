<?php
if (isset($_COOKIE['tema'])) {
    $tema = $_COOKIE['tema'];
}
?>
<!DOCTYPE html>
<?php
if ($tema == 'scuro')
    echo '<html lang="it" data-bs-theme="dark">';
else
    echo '<html lang="it" data-bs-theme="light">';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card shadow" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="card-body p-4 p-lg-5">

                        <form method="post" action="validazioneRegistrazione.php">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Benvenuto</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Crea il tuo account</h5>

                            <?php if(isset($_GET['errore'])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['errore'] ?>
                                </div>
                            <?php } ?>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form2Example17" class="form-control form-control-lg"
                                       name="email" required/>
                                <label class="form-label" for="form2Example17">Indirizzo email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="form2Example27" class="form-control form-control-lg"
                                       name="pass" required/>
                                <label class="form-label" for="form2Example27">Password</label>
                                <p id="passError" class="error text-danger"></p>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="nome"
                                       required/>
                                <label class="form-label" for="form2Example17">Nome</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form2Example17" class="form-control form-control-lg"
                                       name="cognome" required/>
                                <label class="form-label" for="form2Example17">Cognome</label>
                            </div>

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

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="date" id="form2Example17" class="form-control form-control-lg" name="data"
                                       required/>
                                <label class="form-label" for="form2Example17">Data di nascità</label>
                                <p id="dataError" class="error text-danger"></p>
                            </div>
                            Al fine di consentire la Sua iscrizione nel nostro "Sito", nonché l’accesso ai servizi
                            erogati attraverso il medesimo Sito e l’esatta esecuzione degli stessi, Ticketuan S.p.A.,
                            con sede in Castellanza (VA), Via Azzimonti n. 25, in qualità di Titolare, sottoporrà a
                            trattamento i dati personali che la riguardano, ai sensi delle previsioni del Regolamento UE
                            2016/679, Regolamento Generale in materia di Protezione dei Dati Personali (cd. “RGPD”) e
                            del D.Lgs. 30 giugno 2003, n. 196 (cd. "Codice della Privacy"), ove applicabile. I Suoi dati
                            personali saranno trattati per le finalità, nei modi e secondo i termini indicati dal art.
                            13 RGPD

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                       id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Accetto</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                       id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Non accetto</label>
                            </div>
                            Al trattamento dei miei dati, come elencati nell’informativa, da parte di Ticketuan per
                            l'invio di materiale pubblicitario relativo a prodotti e servizi propri o di terzi per
                            email, SMS o altri sistemi automatizzati e per posta (marketing).

                            all'elaborazione da parte di Ticketuan delle mie scelte e abitudini di acquisto sul Sito per
                            l'invio di materiale pubblicitario relativo a prodotti e servizi propri o di terzi di mio
                            specifico interesse per email, SMS o altri sistemi automatizzati e per posta (profilazione).
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2"
                                       id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Accetto</label>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2"
                                       id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Non accetto</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg btn-block"
                                        type="submit">registrati
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>