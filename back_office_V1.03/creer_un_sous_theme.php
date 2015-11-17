<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>  creation d'un theme </title>
</head>
<body>

		
 			<form action="ajout_sous_theme.php" method="post" name="ajout-sous-theme">
 				
				

				 <select class="form-control input-lg"  id="theme"  name="theme">

                      <?php

                                     require_once 'php/base_connexion.php';


                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{
                                                


                                                try{    


                                                    $email =  $_SESSION['email_user'];

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                                                
                                                    $req = "SELECT * FROM categorie ";     // envoyer la requête au SGBD    
                                                
                                                    $res = $cnx->query($req);     // parcourir les lignes de résultat    

                                                    while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
                                                     
                                                            echo "<option value=".$ligne['nom'].">". $ligne['nom'] ."</option>";
                                                    
                                                    }


                                                }   catch(PDOException $e){  


                                                       die("echec : ".$e->getMessage()); 
                                            
                                                    }
                                            }

                                	
                                    ?>

                                </select>


                                 <select class="form-control input-lg"  id="theme"  name="theme">

                      <?php

                                     require_once 'php/base_connexion.php';


                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{
                                                


                                                try{    


                                                    $email =  $_SESSION['email_user'];

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                                                
                                                    $req1 = "SELECT * FROM theme ";     // envoyer la requête au SGBD    
                                                
                                                    $res = $cnx->query($req1);     // parcourir les lignes de résultat    

                                                    while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
                                                     
                                                            echo "<option value=".$ligne['nom'].">". $ligne['nom'] ."</option>";
                                                    
                                                    }


                                                }   catch(PDOException $e){  


                                                       die("echec : ".$e->getMessage()); 
                                            
                                                    }
                                            }

                                    
                                    ?>

                                </select> </br>



                                <input type="text" name="nom_sous_theme" required placeholder="Nom "/> </br>

                                <input  type="file" name="image_sous_theme" placeholder="inserer votre image" /> </br>
                                
                                <textarea cols="30"  placeholder="decrire votre theme"></textarea> </br>



                        <input type="submit" value="valider" name="valider">
 			</form>

</body>
</html>