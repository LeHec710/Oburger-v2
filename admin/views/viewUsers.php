<?php
if(isset($_POST["subEdit"])) {
    $data = array(
        "firstname" => $_POST["editFirstname"],
        "lastname" => $_POST["editLastname"],
        "email" => $_POST["editEmail"],
        "role" => $_POST["editRole"]
    );
    $userManager->updateUser($_POST["userId"], $data);
}
if(isset($_POST["deleteUser"])) {
    $userManager->deleteUser($_POST["userId"]);
}
if(isset($_POST["subSearchUser"])) {
    $users = $userManager->searchUser($_POST["searchUser"]);
}
?>
    <form method="post" action="" class="searchbar">
        <input type="text" placeholder="Rechercher un utilisateur (prenom)" name="searchUser" value="<?php if(isset($_POST["searchUser"])) { echo $_POST["searchUser"]; } ?>">
        <button type="submit" name="subSearchUser"><i class="fas fa-search"></i></button>
    </form>
    <div class="burgers-container table">
        <div class="row selectors">
            <ul>
                <li>id</li>
                <li>prenom</li>
                <li>nom</li>
                <li>email</li>
                <li>rôle</li>
                <li>date création</li>
                <li></li>
            </ul>
        </div>

        <?php
        foreach($users as $user): ?>
            <!-- elements -->
            <div class="row element">
                    <ul>
                        <li><?= $user->getId(); ?></li>
                        <li><?= $user->getFirstname(); ?></li>
                        <li><?= $user->getLastname(); ?></li>
                        <li><?= $user->getEmail(); ?></li>
                        <li><?= $user->getRole(); ?></li>
                        <li><?= $user->getDate(); ?></li>
                        <li class="action">
                        <form action="" method="post">
                            <input type="hidden" name="userId" value="<?= $user->getId(); ?>">
                            <button type="submit" style="border: transparent; background: transparent; outline: none; color: inherit" name="deleteUser"><i id="deleteUser" class="fas fa-trash-alt deleteUser" userId="<?= $user->getId(); ?>"></i></button>
                        </form>
                            <i id="editUser" class="far fa-edit editUser" userId="<?= $user->getId(); ?>"></i>
                        </li>
                    </ul>
            </div>
            <!-- edit elements -->
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="userId" value="<?= $user->getId(); ?>">
                <div class="row element hidden edit" editingUser="<?= $user->getId(); ?>">
                    <ul>
                        <li><?= $user->getId(); ?></li>
                        <li><input type="text" name="editFirstname" id="editFirstname" value="<?= $user->getFirstname(); ?>"></li>
                        <li><input type="text" name="editLastname" value="<?= $user->getLastname(); ?>"></li>
                        <li><input type="text" name="editEmail" value="<?= $user->getEmail(); ?>"></li>
                        <li><input type="text" name="editRole" value="<?= $user->getRole(); ?>"></li>
                        <li class="action editUser" id="editUser" burgerId="<?= $user->getId(); ?>"><button type="submit" name="subEdit" style="border:none; background: transparent; color:inherit;"><i class="fas fa-check"></i></button></li>
                        <li></li>
                    </ul>
                </div>
            </form>
            <br>
        <?php endforeach; ?>
    </div>
