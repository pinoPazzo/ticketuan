<?php
$tema = 'chiaro';

if (isset($_COOKIE['tema'])) {
    $tema = $_COOKIE['tema'];
}

if (isset($_GET['tema'])) {
    setcookie('tema', $_GET['tema'], time() + (365 * 24 * 60 * 60));
    $tema = $_GET['tema'];
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
    <title>TicketUAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
            defer></script>
    <?php
    if ($tema == 'scuro')
        echo '<style>
               .footer, .navbar {
                     background-color: rgba(34, 31, 31, 0.87); 
                    }
                </style>';
    else
        echo '<style>
               .footer, .navbar {
                     background-color: rgba(223,220,220,0.87); 
                    }
                </style>';
    ?>

</head>
<body class="d-flex flex-column vh-100 ">
<header class="navbar py-3 d-flex flex-row justify-content-between">
    <a class="navbar-brand ms-2" href="#">
        <img src="https://cdn0.iconfinder.com/data/icons/flat-round-system/512/archlinux-512.png" width="30" height="30"
             class="d-inline-block align-top"
             alt="">
        TicketUAN
    </a>
    <div class="flex-grow-1"></div>
    <div class="container justify-content-end w-auto">
        <?php
        if ($tema == 'chiaro'){
            echo '<a href="index.php?tema=scuro">
            <button class="btn btn-primary rounded-3">
                <i class="bi bi-moon-stars"></i>
            </button>
        </a>';
        }else{
            echo '<a href="index.php?tema=chiaro">
            <button class="btn btn-primary rounded-3">
                <i class="bi bi-brightness-high"></i>
            </button>
        </a>';
        }
        ?>
        <a class="btn btn-outline-warning ms-3"
           href="loginRegistrazione/login.php">
            Login
        </a>
    </div>
</header>

