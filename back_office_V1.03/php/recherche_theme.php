<?php
try{    
        require_once 'base_connexion.php';

         $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
         $req = "SELECT theme.* FROM theme,categorie WHERE categorie.nom='".$_GET['nom']."' and theme.categorie_id=categorie.id";    // envoyer la requête au SGBD    
                                                
          $res = $cnx->query($req);     // parcourir les lignes de résultat    

            while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
           echo "<option value=".$ligne['id'].">". $ligne['nom'] ."</option>";
             }
                                                   


          }   catch(PDOException $e){  

			die("echec : ".$e->getMessage()); 
                                            
          }

?>