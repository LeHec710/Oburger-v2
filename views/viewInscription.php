<?php
// send inscription
if(isset($_POST["subRegister"])) {
    $error = $userManager->register(array(
        "firstname" => $_POST["firstname"],
        "lastname" => $_POST["lastname"],
        "email" => $_POST["email"],
        "password" => $_POST["password"]
    ));
}
?>
<div class="content-container inscription">
    <div class="content-left center">
        <div class="login-link-container">
            <h3>Déjà un compte ?</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis quam eveniet libero laboriosam corrupti ipsa quia, recusandae exercitationem quae asperiores.</p>
            <button class="green"><a href="<?= WEBROOT."connexion"; ?>">Se connecter</a></button>
        </div>
    </div>
    <div class="content-right center">
        <h1>Inscription</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium, magni.</p>
        <p style="color: red;"><?php if(isset($error)) {echo $error;} ?></p>
        <form action="" method="post">
            <div class="input name">
                <div class="firstname">
                    <label for="firstname">Prenom:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Votre prénom">
                </div>
                <div class="lastname">
                    <label for="name">Nom:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Votre nom">
                </div>
            </div>
            <br>
            <div class="input email">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="Votre adresse email">
            </div>
            <br>
            <div class="input password">
                <label for="password">Mot de passe:</label><br>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe">
            </div>
            <br>
            <div class="input submit-register">
                <input type="submit" value="Créer mon compte" name="subRegister">
            </div>
        </form>
    </div>
</div>