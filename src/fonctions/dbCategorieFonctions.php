<?php 
require "dbaccess.php";
function listCategories(){
    $bdd = bdd();
    $requete = $bdd->prepare("SELECT * FROM category");
    $requete->execute();
    //crée un objet result
    $result = $requete->fetchAll(PDO::FETCH_OBJ);
    //retourner l'objet quand on appelle la fonction on "retourne" le $result 
    return $result;
}

function addCategory($categorie){
    $bdd = bdd();
    $requete = $bdd->prepare("INSERT INTO category (typeProduct) 
                                VALUES (?)");
    $requete->execute([$categorie]) 
    or die(print_r($requete->errorInfo(),TRUE));
}