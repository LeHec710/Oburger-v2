<?php
if(isset($_POST["addCart"])) {
    $cart->add($_POST["burgerId"]);
}
?>

<div class="content-container center">
    <div class="content-left">
        <div class="bar">
            <div class="line">
                <div class="point"></div>
            </div>
        </div>
        <h1>Burgers</h1>
        <div class="burger-container">
            <?php foreach($burgers as $burger): ?>
            <div class="burger">
                <h3><?= $burger->getName(); ?></h3>
                <p class="description"><?= $burger->getDescription(); ?></p>
                <p class="price"><?= $burger->getPrice(); ?>€</p>
                <form action="" method="post">
                    <input type="hidden" name="burgerId" value="<?= $burger->getId(); ?>">
                    <button name="addCart">Ajouter au panier</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="medias">
            <ul>
                <li>Facebook</li>
                <li>Twitter</li>
                <li>Mail</li>
            </ul>
        </div>
    </div>
    <div class="content-right center">
        <div class="img-container">
            <?php foreach($burgers as $burger): ?>
            <div class="img">
                <img src="<?= $burger->getImage(); ?>" alt="Burger">
            </div>
            <?php  endforeach; ?>
        </div>
        <div class="selectors">
            <div class="left"><i class="fas fa-chevron-left"></i></div>
            <div class="separator"></div>
            <div class="right"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>
<script src="assets/js/script.js" defer></script>
