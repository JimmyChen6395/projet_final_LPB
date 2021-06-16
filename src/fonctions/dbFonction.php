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

   
   

   // function getUserByLogin ($login){
   //    $bdd = new PDO ('mysql:host=localhost;dbname=magasin_tech;vharset=utf8', 'root', '');
   //    $requete = $bdd->prepare('SELECT login from users wher login = ?');
   //    $requete->execute(array($login)) or die(print_r($requete->errorInfo(),TRUE));
   // }

   function getUserByLogin($login, $mdp){
      $bdd = new PDO("mysql:host=localhost;dbname=magasin_tech;charset=utf8", "root", "");
      $requete = $bdd->prepare("SELECT * FROM users WHERE login = ?");
      $requete->execute(array($login));

      while($données = $requete->fetch()){
          $user[] = $données; 
      }

      // Si mon user n'existe pas, je redirige vers un get error
      if(!isset($user[0]["login"])){
          header("location: ../../src/pages/login.php?error=true&message=Login inconnu, veuillez recommencer!");
          exit();
      }
      // Je crypt le password recu pour le comparer à celui présent dans ma db
      $mdpCrypt = crypt($mdp, $user[0]["ban"]);

      // Test Password
      if(isset($user[0]["password"]) && $user[0]["password"] != $mdpCrypt){
          header("location: ../../src/pages/login.php?error=true&message=Mot de passe invalide, veuillez recommencer");
          exit();
      }

      // Vérfification complémentaire pour connecter user
      // if($user[0]["login"] == $login && $user[0]["password"] == $mdpCrypt){
         $_SESSION["connected"] = true;
         $_SESSION["login"] = $user[0]["login"];
         $_SESSION["email"] = $user[0]["email"];
         // Je redirige vers l'acceuil
         header("location: ../../index.php");
         exit();
      // }
  }


    



?>

