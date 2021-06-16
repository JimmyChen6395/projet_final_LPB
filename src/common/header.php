<?php
    // gérer la déconnection de l'utilisateur
    if(isset($_GET['deconnect']) && $_GET["deconnect"] == true):
        session_destroy();
        header("location: ../../index.php");
        exit();
    endif;
?>



<style>
        .navbar{
            border: solid 1px red;
        }
</style>


<header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <img src="/src/img/E.gif" width="112" height="28">
                </a>
            </div>

            <?php
                if(isset($_SESSION["connected"]) && $_SESSION["connected"] == true){
            ?>
                <li>Bonjour <?=$_SESSION["login"]?></li>
                <li><a href="../../index.php?deconnect=true"><i class="fas fa-sign-out-alt"></i>Déconnection</a></li>
            <?php
                } else {
            ?>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-dark" href="../../src/pages/login.php">
                            <strong>Se connecter</strong>
                        </a>
                        <a class="button is-dark" href="../../src/pages/register.php">
                            <strong>S'enregistrer</strong>
                        </a>
            <?php 
                } 
            ?>  
                        <a class="button is-light">
                            Panier
                        </a>
            </div>
        </nav>
    </header>