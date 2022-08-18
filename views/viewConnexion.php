<?php
// send inscription
if(isset($_POST["subLogin"])) {
    $error = $userManager->login(array(
        "email" => $_POST["email"],
        "password" => $_POST["password"]
    ));
}
?>
<div class="content-container inscription">
    <div class="content-left center">
        <div class="login-link-container">
            <h3>Pas encore de compte ?</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis quam eveniet libero laboriosam corrupti ipsa quia, recusandae exercitationem quae asperiores.</p>
            <button class="green"><a href="<?= WEBROOT."inscription"; ?>">S'inscrire</a></button>
        </div>
    </div>
    <div class="content-right center">
        <h1>Connexion</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium, magni.</p>
        <p style="color: red;"><?php if(isset($error)) {echo $error;} ?></p>
        <form action="" method="post">
            <div class="input email">
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" placeholder="Votre adresse email">
            </div>
            <br>
            <div class="input password">
                <label for="password">Mot de passe:</label><br>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe">
            </div>
            <br>
            <div class="input submit-register">
                <input type="submit" value="Se connecter" name="subLogin">
            </div>
        </form>
    </div>
</div>