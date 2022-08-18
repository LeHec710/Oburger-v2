<?php
if(isset($_POST["addBurger"])) {
    $data = array(
        "name" => $_POST["name"],
        "price" => $_POST["price"],
        "image" => $burgerManager->setImagePath($_FILES["image"]),
        "description" => $_POST["desc"]
    );
    $burgerManager->addBurger($data);
}
?>
    <div class="form-container">
        <div class="form-title">
            <h1 class="title">Ajouter un burger</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui quasi reiciendis cum illum voluptates.</p>
            <br>
            <p style="color: red;"><?php if(isset($error)) {echo $error;} ?></p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Nom :</label><br>
            <input type="text" id="name" name="name">
            <br><br>

            <label for="price">Prix :</label><br>
            <input type="number" id="price" name="price">
            <br><br>

            <label for="image">Image :</label><br>
            <input type="file" id="image" name="image">
            <br><br>

            <label for="desc">Description :</label><br>
            <textarea name="desc" id="desc" cols="20" rows="3"></textarea>
            <br><br>

            <input type="submit" name="addBurger" value="Ajouter">

        </form>
    </div>