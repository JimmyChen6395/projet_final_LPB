<?php 
    require "../../src/common/template.php";
    require "../../src/fonctions/dbFonction.php";
?>


<style>
    
    .formulaire{
        border: solid 4px green;
    }
</style>

<?php   
    if(isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"]) && isset($_POST["email"])){
        // vérifier si mdp et mdp 2 sont identiques
        if($_POST["mdp"] != $_POST["mdp2"]){
            header("location: ../../src/pages/register.php?error=true&message=Le mots de passe n'est pas identiques");
            exit();
        }
        
        //sanetization des données
    $options = array(
        'login' => FILTER_SANITIZE_STRING,
        'mdp' => FILTER_SANITIZE_STRING,
        'email' => FILTER_VALIDATE_EMAIL
    );

    $result = filter_input_array(INPUT_POST, $options);

    $login = $result["login"];
    $mdp = $result["mdp"];
    $email = $result["email"];

        //crypter le mot de passe

    $key = rand();
    $mdpCrypt = crypt($mdp, $key);


    createUser($login, $mdpCrypt, $email, $key);
    }

?>

<form  class="formulaire p-5" method="post" action="../../src/pages/register.php">

    <?php  
        if((isset($_GET["error"]) && $_GET["error"] == true) || (isset($_GET["error"]) && ($_GET["error"] == false))){
            echo "<h2>".$_GET["message"]."</h2>";
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

    <div class="field">
    <label class="label">Confirmer mot de passe</label>
    <div class="control">
        <input class="input" type="password" name="mdp2" placeholder="" required>
    </div>
    </div>

    <div class="field">
    <label class="label">Email</label>
    <div class="control has-icons-left has-icons-right">
        <input class="input " type="email" name="email" placeholder="Email input" value="hello@" required>
        <span class="icon is-small is-left">
        <i class="fas fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
        <i class="fas fa-exclamation-triangle"></i>
        </span> 

    <div class="field">
    <div class="control">
        <label class="checkbox">
        <input type="checkbox">
        I agree to the <a href="#">terms and conditions</a>
        </label>
    </div>
    </div>

    

    <div class="field is-grouped">
    <div class="control">
        <button class="button is-link">Envoyer</button>
    </div>
    <div class="control">
        <button class="button is-link is-light">Annuler</button>
    </div>
    </div>

</form>