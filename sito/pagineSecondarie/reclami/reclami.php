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

                        <form method="post" action="validazioneReclami.php">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Tutto ok?</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Hai riscontrato un problema durante utilizzo del nostro "sito"? Facello sapere.</h5>

                            <?php if(isset($_GET['errore'])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['errore'] ?>
                                </div>
                            <?php } ?>
                            <div class="alert alert-danger" role="alert" id="allert2">
                                <p id="error"></p>
                            </div>

                            <?php if(isset($_GET['sucesso'])){ ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_GET['sucesso'] ?>
                                </div>
                            <?php } ?>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form2Example17" class="form-control form-control-lg"
                                       name="email" required/>
                                <label class="form-label" for="form2Example17">Indirizzo email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="nome"
                                       required/>
                                <label class="form-label" for="form2Example17">Nome</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form2Example27" class="form-control form-control-lg"
                                       name="titolo" maxlength = "40" required/>
                                <label class="form-label" for="form2Example27">Titolo</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form2Example27" class="form-control form-control-lg"
                                       name="text" required/>
                                <label class="form-label" for="form2Example27">Descrizione</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="date" id="form2Example17" class="form-control form-control-lg" name="data"
                                       required/>
                                <label class="form-label" for="form2Example17">Data di evento</label>
                                <p id="dataError" class="error text-danger"></p>
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg btn-block"
                                        type="submit">Invio
                                </button>
                            </div>
                        </form>
                        <div class="pt-1 mb-4">
                            <a href="../../index.php">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg btn-block">
                                    Ritorna alla home
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="validazioneInvioReclamo.js"></script>
</body>
</html>
