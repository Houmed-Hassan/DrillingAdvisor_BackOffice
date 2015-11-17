<?php


session_start();

?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html"; charset="ISO-8859-1 "/>
    <title>Création d'un support  </title>

 

</head>

<body>

                    

      
            <form action="php/ajout_support.php" method="POST" name="ajout_support">
                
                <input type="text"   name="categorie" value=<?php echo $_POST['categorie']?> >
                <input type="text" name="titre_support" required  placeholder="veuillez donner un titre"> </br>
                
                <select name="sous_theme_support"> 
                      <?php

                                     require_once 'php/base_connexion.php';


                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{
                                                


                                                try{    


                                                    $email =  $_SESSION['email_user'];

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                                                
                                                    $req1 = "SELECT soustheme.nom FROM soustheme, categorie where soustheme.categorie_id = categorie.id

                                                        and categorie.nom='".$_POST['categorie']."'";     // envoyer la requête au SGBD    
                                                
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



                               <input type="text" name="nom_support" required placeholder="veuillez donner un nom"/> </br>
                               <input type="file" name="image_support"  placeholder="veuillez donner un nom"/> </br>

                               
                                <select name="type_support">   
                                    <?php
                                    

                                        if($_POST['categorie'] == "Education"){


                                            echo'

                                                        <option value="cours"> Cours </option>

                                                        <option value="livre">  Livre </option>

                                                        <option value="Tutorial"> Tutorial </option> 

                                                    
                                                ';

                                        }


                                        else if($_POST['categorie'] == "Restauration"){

                                            echo'

                                                        <option value="entre"> entre </option>

                                                        <option value="dessert">  dessert </option>

                                                        

                                                    
                                                ';
                                        }


                                    ?>
                                </select>

                     <input type="file" name="lien"  placeholder=" un lien vers votre fichier" required/>

                     <textarea cols="50"  rows="10"  name="description"  placeholder> </textarea>  


                     <input type="submit" value="valider" name="valider">
            </form>


</body>
</html>