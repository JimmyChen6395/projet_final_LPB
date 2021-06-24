<?php
    // gérer la déconnection de l'utilisateur
    if(isset($_GET['deconnect']) && $_GET["deconnect"] == true):
        session_destroy();
        header("location: ../../index.php");
        exit();
    endif;
?>






<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php">
                <img src="/src/img/E.gif" alt="" width="100" height="88">
            </a>    
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <?php
                if(isset($_SESSION["connected"]) && $_SESSION["connected"] == true){

            ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">Bonjour <?=$_SESSION["login"]?></li>
                    <li class="nav-item"><a href="../../index.php?deconnect=true"><i class="fas fa-sign-out-alt"></i>Déconnection</a></li>
                </ul>
            </div>    
            <?php
                } else {
            ?>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../src/pages/login.php">Se connecter</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../src/pages/register.php">S'enregistrer</a>
                    </li>
            <?php 
                } 
            ?>  
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Panier</a>
                    </li>
                    <li class="nav-item">
                    
                        <a class="nav-link active" aria-current="page" href="../../src/pages/adminContent/menuAdmin.php">Admin</a>
                    </li>               
                </ul>
            </div>
        </div>
    </nav>   
</header>