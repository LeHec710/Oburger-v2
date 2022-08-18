<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
    <title>O'Burger - Espace admin</title>
</head>
<body>
    <!-- popup -->
    <div class="popup-container hidden" id="popup">
        <div class="popup">
            <h3 class="close" id="close-popup"><i class="fas fa-times"></i></h3>
            <div class="popup-text" id="popup-text">
            </div>
        </div>
    </div>

    <!-- sidebar -->
    <div class="sidebar">
        <div class="nav">
            <ul>
                <a href="../index.php">
                    <li>
                        <i class="fas fa-home"></i>
                    </li>
                </a>
                <a href="<?= WEBROOT."accueil"; ?>">
                    <li>
                        <i class="fas fa-chart-bar"></i>
                    </li>
                </a>
                <a href="<?= WEBROOT."burgers"; ?>">
                    <li class="burgers extendable" id="burgers">
                        <i class="fas fa-hamburger"></i>
                        <ul class="submenu hidden" id="submenu">
                            <a href="<?= WEBROOT."burgers" ?>"><li><i class="far fa-edit"></i> &nbsp; Gérer les burgers</li></a>
                            <a href="<?= WEBROOT."addburger" ?>"><li><i class="far fa-plus-square"></i> &nbsp; Ajouter un burger</li></a>
                        </ul>
                    </li>
                </a>
                <a href="<?= WEBROOT."users" ?>"><li class="users" id="users"><i class="fas fa-user-friends"></i></li></a>
                <a href="../deconnexion"><li class="sales"><i class="fas fa-sign-out-alt"></i></i></li></a>
            </ul>
        </div>
    </div>

    <!-- content -->
    <div class="content">
        <div class="topbar">
            <h1>O'burger - Espace admin</h1>
        </div>
        <div class="container">
            <?= $content ?>
        </div>
    </div>

    <!-- for a chrome bug that animate transitions onload page -->
    <script> </script>
</body>
</html>