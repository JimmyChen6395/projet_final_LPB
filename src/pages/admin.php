<?php 
session_start();
require "../../src/fonctions/dbaccess.php";
require "../../src/fonctions/dbCategorieFonctions.php";
    if($_SESSION["roleId"] != "1"){
        header("location: ../index.php?error=true&message=Vous n'avez rien à faire ici !");
        exit();
    }
    require "../common/template.php";
    require "adminContent/menuAdmin.php";
    if(isset($_GET["addCategorie"]) && $_GET["addCategorie"] == true){
        require "../../src/pages/adminContent/categorieProduit.php";
    }
    if(isset($_GET["addProduct"]) && $_GET["addProduct"] == true){
    require "adminContent/addProduct.php";
    }
    require "../common/footer.php";
    ?>