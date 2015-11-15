
<?php
	

	session_start();

	require 'Class_theme.php';


	$nom =$_POST['nom_theme'];
	$id_categorie =$_POST['categorie'];
	$id_theme_reference = $_POST['theme'];	
	



		                require_once 'base_connexion.php';


		                if(!isset($_SESSION['email_user'])){

		                        header('Location:authentification.html');

		                }


		                else{



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
		                	}catch(PDOException $ex){


		                	}        	


						}
	$theme= new Theme();
	
	$theme->insertion_theme($nom, $id_categorie, $id_theme_reference, $id_utilisateur);

	
?>	 	