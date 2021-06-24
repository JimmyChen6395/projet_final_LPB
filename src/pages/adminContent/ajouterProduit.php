<?php
include "../../common/template.php";
require "../../fonctions/dbCategorieFonctions.php";
require "../../fonctions/dbProduitsFonctions.php";
require "../../fonctions/mesFonctions.php";


if(isset($_POST["productName"])){
   
    addNewProduct($_POST["categorieId"],$_POST["productName"],$_FILES["imgUrl"],$_POST["prix"],
                    $_POST["tailleMemoire"],$_POST["processeur"],$_POST["processeurFab"],$_POST["resolutionEcran"],$_POST["tailleEcran"],
                    $_POST["carteGraphique"],$_POST["typeHdd"],$_POST["tailleHdd"],$_POST["poids"],$_POST["OS"],$_POST["description"],$_POST["onTop"]);
                    
}

?>

<section class="register">

    <form action="../../fonctions/ajoutProduitFonction.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nom du produit</label>
            <input type="text" name="productName" placeholder="" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" placeholder="" required>
        </div>
        <div class="mb-3">
            <label>Première page?</label>
            <input type="checkbox" name="onTop">
        </div>
        <div class="mb-3">
            <label>Catégorie du produit</label>
            <select name="categoryId">
                <?php 
                    
                    //rechercher l'id d'une catégorie selon le nom de cette catégorie
                    foreach (listCategories() as $value) : ?>

                    <option value="<?php echo $value->typeProduct ?>"><?php echo $value->typeProduct ?></option>

                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <Label>Image</Label>
            <input type="file" name="imgUrl" required>
        </div>
        <div class="mb-3">
            <label>Prix</label>
            <input type="text" name="prix" required>
        </div>
        <div class="mb-3">
            <label>Ram</label>
            <input type="text" name="tailleMemoire" required>
        </div>
        <div class="mb-3">
            <label>Processeur</label>
            <input type="text" name="processeur" required>
        </div>
        <div class="mb3">
            <label>Fabriquant du processeur</label>
            <input type="text" name="processeurFab" required>
        </div>
        <div class="mb3">
            <label>Résolution de l'écran</label>
            <input type="text" name="resolutionEcran" required>
        </div>
        <div class="mb3">
            <label>Taille de l'écran</label>
            <input type="text" name="tailleEcran" required>
        </div>
        <div class="mb3">
            <label>Carte graphique</label>
            <input type="text" name="carteGraphique" required>
        </div>
        <div class="mb3">
            <label>Type de stockage (hdd ou ssd)</label>
            <input type="text" name="typeHdd" required>
        </div>
        <div class="mb3">
            <label>Quantité de stockage</label>
            <input type="text" name="tailleHdd" required>
        </div>
        <div class="mb3">
            <label>Poids</label>
            <input type="text" name="poids" required>
        </div>
        <div class="mb3">
            <label>Système d'exploitation</label>
            <input type="text" name="OS" required>
        </div>
        <input type="submit" value="Envoyer">
    </form>
</section>