<?php
function bdd()
{
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=magasin_tech;charset=utf8", "root", "");
        return $bdd;
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
};