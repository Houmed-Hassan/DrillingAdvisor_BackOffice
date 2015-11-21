<?php

    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title> formulaire de modification d'un theme </title>
    </head>
    <body>
        
        <?php

            if(!isset($_SESSION['email_user'])){

                header('Location:authentification.html');

            }


            else{





        ?>
                <?php

                    $id = $_GET['id'];
                ?>

            <form  name="form_modification_sous_theme" method="POST"  action="php/modification_theme.php?id=<?php  echo $id;  ?>">
             <?php        

                           // appelle au fichier qui effectuer une description  de connexion vers la base des données
            require_once 'php/base_connexion.php';

            // on initialise un attribut cnx à null
            $cnx = null;

            try{


                // connexion a une base des données
                $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);

                
                
                // requete de selection d'un id utilisateur 
                                            
                $requete1 = "SELECT * FROM soustheme WHERE id='".$id."'";       
                            
                $resultat = $cnx->query($requete1);    // envoyer la requête au SGBD   


                $nom=null;
                $image=null; 
                $contenu = null;

                while ($ligne = $resultat->fetch()){      
                            
                                         
                 // afficher les données de la ligne  
                    $nom = $ligne['nom'];
                    $image = $ligne['image'];
                    $contenu = $ligne['contenu'];



                } 
            }catch(PDOException $ex){


            }   


            ?> 

                        <input type="text"  name="nom_theme" placeholder="veuillez saisir votre NOM"  value=<?php echo $nom ; ?> required /> </br>


                        <input type="file"  name="image_theme" placeholder="veuillez lui donner une image"   value=<?php echo $image; ?> /></br>

                        <textarea name="description"  > <?php echo $contenu; ?> </textarea>



                        <input type="submit"  value="valider" name="valider"/>

            </form>
        <?php

            }
        ?>

    </body>
</html>