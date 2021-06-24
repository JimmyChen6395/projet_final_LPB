<?php
// require "../../src/fonctions/dbFonction.php";

function getCategoryIdByCatergoryName($name){
    $bdd = bdd();
    $requete = $bdd->prepare("SELECT * FROM category WHERE typeProduct = ?");
    $requete->execute(array($name)) 
    or die(print_r($requete->errorInfo(),TRUE));
    while($donnees = $requete->fetch()):
        $categoryId = $donnees["categoryId"];
    endwhile;   
    return $categoryId;
}

function getIdProductByProductName($name){
    $bdd = bdd();
    $requete = $bdd->prepare("SELECT productId FROM product WHERE productName = ?");
    $requete->execute(array($name));

    while($donnees = $requete->fetch()){
        $productId = $donnees["productId"];
    }
    return $productId;
}

function addNewProduct($categorieProduit, $productName, $fichier, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, 
                        $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS, $description, $onTop){
    $bdd = bdd();
    $photoUrl = sendImg($fichier);
    $categorieId = getCategoryIdByCatergoryName($categorieProduit);
    $requete = $bdd->prepare("INSERT INTO product(productName, imgUrl, description, catergoryId, onTop) 
                            VALUES (?, ?, ?, ?, ?)");
    $requete->execute(array($productName, $photoUrl, $description, $categorieId, $onTop)) or die(print_r($requete->errorInfo(),TRUE));

    $productId = getIdProductByProductName($productName);

    $requete = $bdd->prepare("INSERT INTO fichetechnique(productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $requete->execute(array($productId, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, 
                            $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS)) 
                            or die(print_r($requete->errorInfo(),TRUE)); 
                            
    header("location: ../../src/pages/admin.php?addProduct=true&message=Produit Correctement Ajouté Dans La DB");
    exit();
}


//2. dans dbProduitsFonctions.php, coder la fonction qui va récupérer les 5 derniers produits dont la colonne onTop est true
function fiveOnTop(){

    $bdd = bdd();

    $requete = $bdd->prepare("SELECT p.productId, p.productName, p.imgUrl, ft.prix ,c.typeProduct 
                                from product p
                                INNER JOIN category c
                                on c.categoryId = p.categoryId
                                INNER JOIN fichetechnique ft
                                on ft.productId = p.productId
                                WHERE p.onTop = 1
                                ORDER BY p.productId
                                DESC
                                LIMIT 5");
    $requete->execute([]);
    $result = $requete->fetchAll(PDO::FETCH_OBJ);

    return $result;
}





