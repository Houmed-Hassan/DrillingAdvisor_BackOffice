<?php

	

	class Theme{


			function insertion_theme( $nom, $categorie, $theme, $id_utilisateur){


					$id_categorie;
					$id_theme_reference;
				// inclure les informations de connexion 
				require_once 'base_connexion.php'; 
			 	
			 	try{     // créer un objet PDO pour communiquer avec SGBD    
			 	
			 	$cnx = new PDO(DSN, LOGIN, PASSWORD, $options);    


			 	$requete1 = "SELECT id  FROM categorie where nom='".$categorie."'";

			 	$res1 = $cnx-> query($requete1);


			 	while($ligne = $res1 ->fetch()){


			 		$id_categorie = $ligne['id'];
			 	}




		 	
			    $requete2= "SELECT id FROM theme where nom='".$theme."'";
			    $res2 = $cnx-> query($requete2);

			    while ($ligne = $res2->fetch()) {
				    	

			    	$id_theme_reference = $ligne['id'];

			    }

						



			    $requete_insertion = "INSERT into theme VALUE('','".$nom."', '".$id_categorie."', '".$id_theme_reference."', '". $id_utilisateur."' )"; 

			    $cnx->exec($requete_insertion);  


			    echo '<script type="text/javascript">

			    		alert("insertion reussi");

			    	   </script>';

			    	 header('Location: ../espace_membres.php');
			   			    

			    }	catch (PDOException $e){     // en cas d’erreur de connexion ou d’insertion   

			      
			      die("echec : ".$e->getMessage()); 


			  	 	}

			 } // fin de fonction d'insertion



	}	// fin de la classe 


?>