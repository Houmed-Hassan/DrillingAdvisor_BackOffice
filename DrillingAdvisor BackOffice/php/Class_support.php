

<?php
	session_start();

	
	Class  Support{


		private $titre=null;
		private $nom=null; 
		private $sous_theme=null;
		private $lien=null;
		private $description=null; 
		private $image = null;
		private $categorie= null;
		private $id_utilisateur =null;


		public function  insertion_support($titre, $nom, $theme, $sous_theme, $type, $lien, $description, $image, $categorie, $id_utilisateur){


			require_once 'base_connexion.php';


          	echo "je suis me suis connecter à la base ";

           

            	try{


            		$optionss = array(

		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

		 );
            			$cnx = new PDO(DSN, LOGIN, PASSWORD, $optionss);    

	echo "je suis me suis connecter j aio ";

					    $req = "INSERT INTO  support VALUES 
					    ('', '".$nom."', '".$image."', '".$categorie."', '".$id_utilisateur."', '".$theme."', '".$sous_theme."', '".$type."', 
					    	'".$lien."', '".$description."', '".$titre."')";    // envoyer la requête au SGBD    
					    
					    $cnx->exec($req);  

					    echo "je viens d'executer la requete ";


					  
				    }
			    	catch (PDOException $e){     // en cas d’erreur de connexion ou d’insertion   

			      
			      die("echec : ".$e->getMessage()); 


			  	 	}





		} // fin de la methode  insertion_support








public function  modifier_support($titre, $nom, $type, $lien, $description, $image, $id_suport){


			require_once 'base_connexion.php';


			try{
           // connexion à la base des données 
				$cnx = new PDO (DSN, LOGIN, PASSWORD, $options);


				// requete de mise à jour

				$requete_update ="UPDATE  support set nom='$nom', image= '$image', type='$type', lien='$lien', description='$description' WHERE id=$id_suport";

				echo $requete_update;

			    $cnx -> exec($requete_update);



				echo " je suis arrive ici \n";

				
				header('Location: consulter_support.php');

			}catch(PDOException $ex){


					echo "desole il y a eu une erreur";

			}


		} // fin de la fonction update


public function consulter(){

		require_once 'base_connexion.php';

           

            	try{


            		$optionss = array(

		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

		 );
            			$cnx = new PDO(DSN, LOGIN, PASSWORD, $optionss);    



  						try{    


		                    	$id_utilisateur=null;


		                        $email =  $_SESSION['email_user'];

		                        $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
		                    
		                        $requete1 = "SELECT id FROM utilisateur WHERE email='".$email."'";     // envoyer la requête au SGBD    
		                    
		                        $resultat = $cnx->query($requete1);     // parcourir les lignes de résultat    


//echo " je suis arrive jusqu'a ici 11111111 </br>";

		                        while ($ligne = $resultat->fetch()){       // afficher les données de la ligne  
		                    
		                                 
		                               $id_utilisateur = $ligne['id'];
		                              /// echo " je suis arrive jusqu'a ici dans la boucle 1 </br>";
		                        }
		                	}catch(PDOException $ex){


		                	} 






					    $req = "SELECT support.* FROM support, utilisateur where support.utilisateur_id = utilisateur.id 
					    and utilisateur_id='".$id_utilisateur."'";


					        
					    
					   $res = $cnx->query($req);     // parcourir les lignes de résultat    


echo' <table style="width:100%">';
	echo '<tr>  <th>  Nom </th>  


				<th>  Titre </th> 
				<th>  Image </th> 
				<th>  Sous Theme </th> 
				<th>  lien </th> 
				<th>  type </th> 
				<th>  description </th> 
				<th>  Modifier</th>
				<th> Supprimer </th> 

	 </tr>' ;
//echo " je suis arrive jusqu'a ici 11111111 </br>";
			while ($ligne1 = $res->fetch()){       // afficher les données de la ligne  
		                    
 				   		

 				   		echo '<tr>';
		 				   		echo '<td>'.$ligne1['nom']. '</td>';  
		 				   		echo '<td>'.$ligne1['titre']. '</td>';
		 				   		echo '<td>'.$ligne1['image']. '</td>';
		 				   		echo '<td>'.$ligne1['soustheme_id']. '</td>';
		 				   		echo '<td>'.$ligne1['lien']. '</td>';
		 				   		echo '<td>'.$ligne1['type']. '</td>';
		 				   		echo '<td>'.$ligne1['description']. '</td>';


		 				   		echo '<td> <a href="../form_modification_support.php?id='.$ligne1['id'].'"> <input type="submit" VALUE="Modifier"/></a></td>';

		 				   		echo '<td> <a href="suppression_support.php?id='.$ligne1['id'].'"> <input type="submit" VALUE="Supression"/></a></td>';
		 				   		

						echo '</tr>';	 				   
		                              /// echo " je suis arrive jusqu'a ici dans la boucle 1 </br>";
						}
echo '</table>';
				    }
			    	catch (PDOException $e){       

			      
			      die("echec : ".$e->getMessage()); 


			  	 	}

		}// fin de consulter
		





		public function supression($id_support){

					require_once 'base_connexion.php';

			           

			            	try{


			            		$optionss = array(

					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

					 );
			            			$cnx = new PDO(DSN, LOGIN, PASSWORD, $optionss);    



								    $req = "DELETE FROM support WHERE id='".$id_support."'";
 
								    
								    $cnx -> exec($req);
								    


								   	header('Location: consulter_support.php');

								  
							    }
						    	catch (PDOException $e){       

						      
						      die("echec : ".$e->getMessage()); 


						  	 	}





		}

		

































	}// fin de la classe



?>