<?php  
    require "../../src/common/template.php";
    require "../../src/fonctions/dbFonction.php";
    $titre = "Page de Login";
    if(isset($_SESSION["connected"]) && $_SESSION["connected"] == true){
        header("location: ../../index.php");
        exit();
    }

?>


<form  class="formulaire p-5" method="post" action="../../src/pages/login.php">

        <?php
        // Traitement formulaire
            if(isset($_POST["login"]) && !empty($_POST["login"])){
            getUserByLogin($_POST["login"], $_POST["mdp"]);
        }
        // Si erreur, je la traite ici
            if(isset($_GET["error"]) && $_GET["error"] == true){
                echo "<h2>". $_GET["message"] ."</h2>";
            }
        ?>

    <div class="field">
        <label class="label">Login</label>
            <div class="control">
                <input class="input" type="text" name="login" placeholder="" required>
            </div>
    </div>

    <div class="field">
        <label class="label">Mot de passe</label>
            <div class="control">
                <input class="input" type="password" name="mdp" placeholder="" required>
            </div>
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link">Connecter</button>
        </div>
</form>