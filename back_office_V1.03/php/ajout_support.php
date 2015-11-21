<?php




require 'Class_support.php';

require_once 'base_connexion.php';

 $cnx = new PDO( DSN , LOGIN, PASSWORD, $options );

$categorie = $_POST['categorie'];

$requete = "SELECT id From categorie where categorie.nom='".$categorie."'";

 $res = $cnx->query($requete);     // parcourir les lignes de résultat    

$id_categorie ;
//echo " je suis arrive jusqu'a ici 11111111 </br>";
while ($ligne = $res->fetch()){       // afficher les données de la ligne  
		                    
    $id_categorie = $ligne['id'];
		                              /// echo " je suis arrive jusqu'a ici dans la boucle 1 </br>";
}


// recuperation de id utilisateur conneceter


	 try{    
		   	$id_utilisateur;

            $email =  $_SESSION['email_user'];

            $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
		                    
            $requete1 = "SELECT id FROM utilisateur WHERE email='".$email."'";     // envoyer la requête au SGBD    
	                    
            $res = $cnx->query($requete1);     // parcourir les lignes de résultat    

//echo " je suis arrive jusqu'a ici 11111111 </br>";

            while ($ligne = $res->fetch()){       // afficher les données de la ligne  
		                    
		                                 
            $id_utilisateur = $ligne['id'];
		                              /// echo " je suis arrive jusqu'a ici dans la boucle 1 </br>";
            }
      } catch(PDOException $e ){


      }






// recuperer les id de sous theme 

     
		   	$id_soustheme=$_POST['theme'];


       

      echo $id_soustheme;

                  $titre= $_POST['titre_support'];
                  $nom =$_POST['nom_support'];

                  

                   $image =null;

                  if(isset($_POST['image_support'])){

                    $image= $_POST['image_support']; 
                  
                  }

                  else{

                    $image = "vide";
                  }

            $lien = $_POST['lien'];

            $description = $_POST['description'];

            $type = $_POST['type_support'];


                            if(!isset($_SESSION['email_user'])){

                                    header('Location:authentification.html');

                            }

                        else{


      $support= new Support();
      $a= 1;
      $support->insertion_support($titre, $nom, $a ,$id_soustheme, $type ,$lien, $description, $image, $id_categorie, $id_utilisateur);


      echo '<script type="text/javascript">

        alert("l\'insertion  est pas reussi car le mot de passe  est  confirmer ");

           </script>';


      header('Location: ../espace_membres.php');

}









?>