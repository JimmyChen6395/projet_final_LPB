<?php  
    require "../../src/common/template.php";

?>


<form  class="formulaire p-5" method="post" action="../../src/pages/register.php">

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