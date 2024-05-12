<?php
$tema = 'chiaro';
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
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="immagini/loginRegistrazione.jpg"
                             alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5">

                            <form method="post" action="validazioneLogin.php">

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
                                    <input type="email" id="form2Example17" class="form-control form-control-lg"
                                           name="email" required/>
                                    <label class="form-label" for="form2Example17">Indirizzo email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="form2Example27" class="form-control form-control-lg"
                                           name="pass" required/>
                                    <label class="form-label" for="form2Example27">Password</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-outline-warning btn-lg btn-block" type="submit">Login
                                    </button>
                                </div>

                                <a class="small text-muted" href="#!">Password dimeticata?</a>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">Non hai un account?
                                    <a href="registrazione.php" style="color: #393f81;">Registrati</a></p>
                                <a href="../pagineSecondarie/legal/terminiUso.php" class="small text-muted">termini d'uso.</a>
                                <a href="../pagineSecondarie/legal/privacyPolicy.php" class="small text-muted">Privacy policy</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
