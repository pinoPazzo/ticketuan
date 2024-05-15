<?php
session_start();
$isLogged = false;
if (!empty($_SESSION["username"]))
    $isLogged = true;

$tema = 'chiaro';

if (isset($_COOKIE['tema'])) {
    $tema = $_COOKIE['tema'];
}

if (isset($_GET['tema'])) {
    setcookie('tema', $_GET['tema'], time() + (365 * 24 * 60 * 60), '/', 'localhost');
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
    <link rel="icon" type="image/x-icon" href="/sito/immagini/image.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
            defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <a class="navbar-brand ms-2" href="index.php">
        <img src="immagini/image.png" width="30" height="30"
             class="d-inline-block align-top"
             alt="">
        TicketUAN
    </a>
    <div class="flex-grow-1"></div>
    <form class="me-3 mt-1 mb-1" role="search" method="GET" action="" onsubmit="return validateSearch();">
        <input class="form-control" type="search" id="search" name="search" placeholder="Cerca" aria-label="Cerca" oninput="validateSearch();">
    </form>
        <?php
        if ($tema == 'chiaro') {
            $s = '<a href="?tema=scuro';
            $s1 = '';
            foreach ($_GET as $key => $value) {
                if ($key != 'tema') {
                    $s1 = '&'.$key.'='.$value;
                }
            }
            $s2= '"
            <button class="btn btn-primary rounded-3">
                <i class="bi bi-moon-stars"></i>
            </button>
        </a>';
            echo $s.$s1.$s2;
        } else {
            $s = '<a href="?tema=chiaro';
            $s1 = '';
            foreach ($_GET as $key => $value) {
                if ($key != 'tema') {
                    $s1 = '&'.$key.'='.$value;
                }
            }
            $s2= '"
            <button class="btn btn-primary rounded-3">
                <i class="bi bi-moon-stars"></i>
            </button>
        </a>';
            echo $s.$s1.$s2;
        }
        echo '&nbsp;&nbsp;&nbsp;&nbsp;'; // Spazio
        if ($isLogged) {
            if ($tema == 'chiaro') {
                echo '<a href="userPage.php?tema=chiaro">
                        <button class="btn btn-primary rounded-3">
                            <i class="bi bi-person"></i>
                        </button>
                    </a>';
            } else {
                echo '<a href="userPage.php?tema=scuro">
                        <button class="btn btn-primary rounded-3">
                            <i class="bi bi-person-fill"></i>
                        </button>
                    </a>';
            }
            echo '&nbsp;&nbsp;&nbsp;&nbsp;';

            echo '<a class="btn btn-outline-warning me-3"
           href="loginRegistrazione/logout.php">
            Logout
        </a>';
        } else {
            echo '<a class="btn btn-outline-warning me-3"
           href="loginRegistrazione/login.php">
            Login
        </a>';
        }
        ?>


</header>

