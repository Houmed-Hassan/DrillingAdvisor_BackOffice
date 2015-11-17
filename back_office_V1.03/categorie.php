<?php

	session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title>selection d'un categorie</title>
</head>
<body>


		 <form action="creation_support.php" method="POST" name="ajout-sous-theme">
                

                 <select   name="categorie">

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

                                                            $categorie = $ligne['nom'];
                                                    
                                                    }


                                                }   catch(PDOException $e){  


                                                       die("echec : ".$e->getMessage()); 
                                            
                                                    }
                                            }

                                    
                                    ?>

                                </select> </br>

		<input type="submit" name="valider" value="valider"/>
				
</body>
</html>