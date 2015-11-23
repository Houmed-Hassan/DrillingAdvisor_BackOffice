<?php


	session_start();


	Class sous_theme{



		public function insertion(){
			// connexion à la base des données
			require_once 'base_connexion.php';


			$cnx = null;

			try{

				$cnx = new PDO(DSN, LOGIN, PASSWORD, $options);   

			}catch(PDOException $ex){

				echo " desole pas de connexion à la base des données ";

			}
			
				$categorie = $_POST['categorie'];

				

				 // recuperation de id du categorie  

				$categorie_id =null;

			try{
				

				 $requete_id_categorie = "SELECT id FROM categorie WHERE categorie.nom='".$categorie."'";     // envoyer la requête au SGBD    
			                                                
			    $resultat = $cnx->query($requete_id_categorie);     // parcourir les lignes de résultat    

			    while ($ligne = $resultat->fetch()){      // afficher les données de la ligne  
			                                                                              
			                                                     
			       $categorie_id = $ligne['id'];
			                                                    
			    }

			 


			} catch(Exception $e){

				echo ' <script type="text/javascript">


				   alert("desole il y a une erreur, veuillez recommencer !!!!!!!");


				 </script>';
			     header('Location:../creer_sous_theme.php');

			}

				// recuperation de id theme

				$theme = $_POST['theme'];

				echo $theme;

				$nom = $_POST['nom_theme'];
				

				$image =null;

				if(isset($_POST['image_theme'])){

					$image= $_POST['image_theme']; 
				
				}

				else{

					$image = "vide";
				}

				


				$description = $_POST['description'];

			
				$id_utilisateur=null;
				// recuperation de l'id d'un utilisateur connecter



				try{    


		                    	


		                        $email =  $_SESSION['email_user'];

		                        $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
		                    
		                        $requete1 = "SELECT id FROM utilisateur WHERE email='".$email."'";     // envoyer la requête au SGBD    
		                    
		                        $resultat = $cnx->query($requete1);     


//echo " je suis arrive jusqu'a ici 11111111 </br>";

		                        while ($ligne = $resultat->fetch()){       // afficher les données de la ligne  
		                    
		                                 
		                               $id_utilisateur = $ligne['id'];
		                              /// echo " je suis arrive jusqu'a ici dans la boucle 1 </br>";
		                        }
		                	}catch(PDOException $ex){


		                	} 


				try{

				// insertion d'un sous_theme

				$requete_insertion = "INSERT into soustheme VALUE('','".$nom."', '".$image."',  '".$description."','".$categorie_id."', '".$theme."', '". $id_utilisateur."' )"; 

				$cnx->exec($requete_insertion);  

				echo ' <script type="text/javascript">


							alert("insertion de theme reussi ");


						</script>';

				header('Location:affichage_theme.php');

				
			    }	catch (PDOException $e){     // en cas d’erreur de connexion ou d’insertion   

			      	 echo ' <script type="text/javascript">


							alert("desole il y a une erreur, veuillez recommencer !!!!!!!");


						</script>';
			     	 header('Location:../creer_sous_theme.php');


			  	 	}


		} // fin de la methode insertion sous-theme


		public function modification_theme($id_theme, $nom, $image, $description){


			require_once 'base_connexion.php';


			$cnx = null; 

			try{


				// connexion à la base des données 
				$cnx = new PDO (DSN, LOGIN, PASSWORD, $options);


				// requete de mise à jour

				$requete_update ="UPDATE  soustheme set nom='$nom', image= '$image', contenu='$description' WHERE id=$id_theme";

					echo $requete_update;

			    $cnx -> exec($requete_update);



				

				
				header('Location: affichage_theme.php');

			}catch(PDOException $ex){


					echo "desole il y a eu une erreur";

			}



		}


		public function affichage_theme(){

			// appelle au fichier qui effectuer une description  de connexion vers la base des données
			require_once 'base_connexion.php';

			// on initialise un attribut cnx à null
			$cnx = null;

			try{


				// connexion a une base des données
				$cnx = new PDO(DSN, LOGIN, PASSWORD, $options);

				// recuperation de l'email d'un utilisateur connecter
				$email =  $_SESSION['email_user'];

				// requete de selection d'un id utilisateur 
						                    
		        $requete1 = "SELECT id FROM utilisateur WHERE email='".$email."'";       
		                    
		        $resultat = $cnx->query($requete1);    // envoyer la requête au SGBD   

                while ($ligne = $resultat->fetch()){      
		                    
		                                 
                    $id_utilisateur = $ligne['id'];  // afficher les données de la ligne  
		                             
                }

               


                // requte de selection de toutes les themes inserer par l'utilisateur connecter

                $requete2 = "SELECT soustheme.*, categorie.nom as categorie_nom, theme.nom as theme_nom FROM soustheme 
							Inner JOIN categorie ON  soustheme.categorie_id = categorie.id
							Inner JOIN theme ON soustheme.theme_id = theme.id
							WHERE utilisateur_id='".$id_utilisateur."'";

                $resultat2 = $cnx ->query($requete2);



                //	echo $id_categorie;

                /*// requte de selection du nom de categorie concernant le soustheme
                $requete3 =  "SELECT cateogorie.nom FROM categorie, soustheme  WHERE categorie.id = soustheme.categorie_id
                			 AND categorie.id= '".$id_categorie."' ";

                 $resultat3 = $cnx ->query($requete3);

                 $categorie_nom= null; // variable qui nous permet de recuperer le nom d'un categorie
                
                while ($ligne3 = $resultat3 ->fecth()) {
                	# code...

                	$categorie_nom = $ligne3['nom'];

                }
                echo " je suis ici\n";

                // requete de selection du nom de categorie concernant le soustheme
                $requete4 =  "SELECT theme.nom FROM theme, soustheme  WHERE theme.id = soustheme.theme_id
                			 AND theme.id= '".$id_theme."' ";

                 $resultat4 = $cnx ->query($requete4);


                 $theme_nom= null; // variable qui nous permet de recuperer le nom d'un theme
                
                while ($ligne4 = $resultat4 ->fecth()) {
                	# code...

                	$theme_nom = $ligne3['nom'];

                }
*/

                // on va mettre les resultat du requete dans un tableau .
                echo '<table>';

                	echo '<tr> ';
                	echo '	<th> Nom </th> &nbsp;&nbsp;
                			
							<th> Image </th> &nbsp;&nbsp;
							<th> Description </th>&nbsp;&nbsp;


							<th> Categorie </th>
							<th> Theme </th>



							<th> Modifier </th>&nbsp;&nbsp;
							<th> Supprimer </th>&nbsp;&nbsp;

                			';
                	echo '</tr> ';


                while($ligne2 = $resultat2 ->fetch()){

      				echo '<tr>';
		 				echo '<td>'.$ligne2['nom']. '</td>&nbsp;&nbsp;';  

		 				echo '<td>'.$ligne2['categorie_nom'].'</td>&nbsp;&nbsp;';

		 				echo '<td>'.$ligne2['theme_nom'].'</td>&nbsp;&nbsp;';
		 				
		 				echo '<td> <img src = '.$ligne2['image'].'</td> &nbsp;&nbsp;';
		 				
		 				echo '<td>'.$ligne2['contenu']. '</td> &nbsp;&nbsp;';
		 				echo '<td> <a href="../form_modification_theme.php?id='.$ligne2['id'].'"> <input type="submit" value="Modifer"/></a></td>';

		 				echo '<td> <a href="suppression_theme.php?id='.$ligne2['id'].'"> <input type="submit" value="supression"/></a></td>';
		 				   		

					echo '</tr>';
                }

                echo'</table>';




			}catch(PDOException $ex){


				// on cas d'exception affichage de l'erreur de connexion 
				echo " desole pas de connexion à la base des données ";

			}





		}// fin de la methode affichage d'un theme
		


		public function supression($id_theme){

					require_once 'base_connexion.php';

			           

			            	try{


			            
			            			$cnx = new PDO(DSN, LOGIN, PASSWORD, $options);    



								    $req = "DELETE FROM support WHERE theme_id='".$id_theme."'";
 
								    
								    $cnx -> exec($req);



								    $req2 = "DELETE FROM soustheme WHERE id='".$id_theme."'";
 
								    
								    $cnx -> exec($req2);
								    
								    


								   	header('Location:affichage_theme.php');

								  
							    }
						    	catch (PDOException $e){       

						      
						      die("echec : ".$e->getMessage()); 


						  	 	}

			} // fin de la fonction suppression



	} // fin de la classe sous-theme

















?>