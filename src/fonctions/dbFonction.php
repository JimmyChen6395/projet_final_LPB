<?php 
   
   function createUser($login, $mdp, $email, $ban){

      $bdd = new PDO ('mysql:host=localhost;dbname=magasin_tech;vharset=utf8', 'root', '');

      // vérifier si le mail et le login existent
      $requete = $bdd->prepare('SELECT COUNT(*) AS x 
                                 FROM users 
                                 WHERE login = ? or email = ?');
      $requete->execute(array($login, $email)) or die(print_r($requete->errorInfo(),TRUE));
         while($result = $requete->fetch()){
            if($result["x"] != 0){
               header('location: ../../src/pages/register.php?error=true&message=Login ou Email déjà existant choisir un autre');
               exit();
            }
         }
      $requete = $bdd->prepare('INSERT INTO users(login, email, password, ban)
                                 VALUES(?, ?, ?, ?)');

      $requete->execute(array($login,$email, $mdp, $ban)) 
      
      //affiche une erreur si la requete a une erreur
      or die(print_r($requete->errorInfo(),TRUE));

      header('location: ../../src/pages/register.php?error=false&message=Votre compte est bien créé, veuillez vous connecter !!!!!');
      exit();


   }

    


    



?>

