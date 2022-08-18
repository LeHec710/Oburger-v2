<?php
if(isset($_POST["subEdit"])) {
    $data = array(
        "name" => $_POST["editName"],
        "price" => $_POST["editPrice"],
        "description" => $_POST["editDesc"]
    );
    $burgerManager->updateBurger($_POST["burgerId"], $data);
}
if(isset($_POST["deleteBurger"])) {
    $burgerManager->deleteBurger($_POST["burgerId"]);
}
if(isset($_POST["subSearchBurger"])) {
    $burgers = $burgerManager->searchBurgers($_POST["searchBurger"]);
}
?>
    <form method="post" action="" class="searchbar">
        <input type="text" placeholder="Rechercher un burger" name="searchBurger" value="<?php if(isset($_POST["searchBurger"])) { echo $_POST["searchBurger"]; } ?>">
        <button type="submit" name="subSearchBurger"><i class="fas fa-search"></i></button>
    </form>
    <div class="burgers-container table">
        <div class="row selectors">
            <ul>
                <li>id</li>
                <li>image</li>
                <li>nom</li>
                <li>prix</li>
                <li>description</li>
                <li></li>
            </ul>
        </div>

        <?php
        foreach($burgers as $burger): ?>
            <!-- elements -->
            <div class="row element">
                    <ul>
                        <li><?= $burger->getId(); ?></li>
                        <li><img src="../<?= $burger->getImage(); ?>" alt=""></li>
                        <li><?= $burger->getName(); ?></li>
                        <li><?= $burger->getPrice(); ?>€</li>
                        <li><?= $burger->getDescription(); ?></li>
                        <li class="action">
                            <i id="deleteBurger" class="fas fa-trash-alt deleteBurger" burgerId="<?= $burger->getId(); ?>"></i>
                            <i id="editBurger" class="far fa-edit editBurger" burgerId="<?= $burger->getId(); ?>"></i>
                        </li>
                    </ul>
            </div>
            <!-- edit elements -->
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="burgerId" value="<?= $burger->getId(); ?>">
                <div class="row element hidden edit" editingBurger="<?= $burger->getId(); ?>">
                    <ul>
                        <li><?= $burger->getId(); ?></li>
                        <li>
                            <label for="editImage" class="input">Choisir une image</label>
                            <input type="file" name="editImage" id="editImage"  accept="image/*" style="display: none">
                        </li>
                        <li><input type="text" name="editName" value="<?= $burger->getName(); ?>"></li>
                        <li><input type="text" name="editPrice" value="<?= $burger->getPrice(); ?>">€</li>
                        <li><input type="text" name="editDesc" value="<?= $burger->getDescription(); ?>">€</li>
                        <li class="action editBurger" id="editBurger" burgerId="<?= $burger->getId(); ?>"><button type="submit" name="subEdit" style="border:none; background: transparent; color:inherit;"><i class="fas fa-check"></button></i></li>
                    </ul>
                </div>
            </form>
            <br>
        <?php endforeach; ?>
    </div>
