<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'burger</title>
    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap">
    <!-- js -->
</head>
<body>
    <header>
        <nav>
            <div class="logo"><br>
            <a href="<?= WEBROOT."accueil"; ?>"><h1>O'burger</h1></a>
        </div><br><br>
            <ul>
                <a href="<?= WEBROOT."accueil"; ?>">
                    <li class="selected">Accueil</li>
                </a>
                <a href="<?php if($userManager->isLoggedIn()) {echo WEBROOT."deconnexion";} else {echo WEBROOT."inscription";} ?>">
                    <?php if($userManager->isLoggedIn()): ?>
                        <li>Deconnexion</li>
                    <?php else: ?>
                        <li>Mon compte</li>
                    <?php endif; ?>
                </a>
                <a href="<?= WEBROOT."commander"; ?>">
                    <li>Ma commande</li>
                </a>
                <?php if($userManager->isLoggedIn() && $_SESSION["role"] == "admin"): ?>
                <a href="<?= WEBROOT."admin"; ?>">
                    <li>Admin</li>
                </a>
                <?php endif; ?>
                </a>
                <a href="" id="search">
                    <li><i class="fas fa-search"></i></li>
                </a>
            </ul>
        </nav>
    </header>
    <?= $content ?>
</body>
</html>