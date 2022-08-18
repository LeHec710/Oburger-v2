<?php
if(isset($_POST["deleteBurger"])) {
    $cart->remove($_POST["burgerId"]);
}
if(isset($_POST["editAmount"])) {
    $cart->editAmount($_POST["burgerId"], $_POST["amount"]);
}
?>
<div class="content-container inscription">
    <div class="content-left center">
        <div class="bill-container">
            <h1>L'addition</h1>
            <?php 
                $total = 0;
                foreach($_SESSION["cart"] as $b):
                $burger = $burgerManager->getBurgerById($b["id"]);
                $total = $total + $burger->getPrice() * $b["amount"];
            ?>
            <ul>
                <li><?= $burger->getName(); ?></li>
                <li>x<?= $b["amount"]; ?></li>
                <li><?= $burger->getPrice() * $b["amount"]; ?>€</li>
            </ul>
            <?php endforeach ?>
            <hr>
            <ul>
                <li>TVA</li>
                <li></li>
                <li><?= $total*0.2?>€</li>
            </ul>
            <ul>
                <li>TOTAL</li>
                <li></li>
                <li><?= $total + $total*0.2 ?>€</li>
            </ul>
            <form action="" method="post">
                <input type="hidden" name="total" value="<?= $total + $total*0.2 ?>">
                <button class="green" name="subOrder">Valider ma commande</button>
            </form>
        </div>
    </div>
    <div class="content-right center">
        <div class="cart-container">
            <h1>Ma commande</h1>
            <?php foreach($_SESSION["cart"] as $b): ?>
            <?php $burger = $burgerManager->getBurgerById($b["id"]); ?>
            <ul>
                <li><img src="<?= $burger->getImage(); ?>" alt=""></li>
                <li><h4><?= $burger->getName(); ?></h4></li>
                <li>
                    <form action="" method="post">
                        <input type="number" value="<?= $b["amount"] ?>" min="1" name="amount">
                        <input type="hidden" name="burgerId" value="<?= $burger->getId(); ?>">
                        <input type="submit" name="editAmount" style="display: none;">
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <input type="hidden" name="burgerId" value="<?= $burger->getId(); ?>">
                        <button type="hidden" name="deleteBurger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </li>
            </ul>
            <?php endforeach ?>
        </div>

    </div>
</div>