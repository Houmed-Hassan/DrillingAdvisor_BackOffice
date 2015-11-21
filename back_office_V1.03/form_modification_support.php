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

                    <?php

                        $id = $_GET['id'];
                    ?>

      
            <form action="php/modification_support.php?id=<?php  echo $id;?>" method="POST" name="modif_support">
                 <?php        

                           // appelle au fichier qui effectuer une description  de connexion vers la base des données
            require_once 'php/base_connexion.php';

            // on initialise un attribut cnx à null
            $cnx = null;

            try{


                // connexion a une base des données
                $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);

                
                
                // requete de selection d'un id utilisateur 
                                            
                $requete1 = "SELECT * FROM support WHERE id='".$id."'";       
                            
                $resultat = $cnx->query($requete1);    // envoyer la requête au SGBD   


                $nom=null;
                $image=null; 
                $titre = null;
                $type = null;
                $lien = null;
                $description = null; 

                $id_categorie= null;


                while ($ligne = $resultat->fetch()){      
                            
                                         
                 // afficher les données de la ligne  
                    $nom = $ligne['nom'];
                    $image = $ligne['image'];
                    $contenu = $ligne['description'];
                    $type = $ligne['type'];
                    $lien = $ligne['lien'];
                    $titre = $ligne['titre'];

                    $id_categorie = $ligne['categorie_id'];



                } 
            }catch(PDOException $ex){


            }   


            ?> 
                 
                                <select name="categorie" id="categorie"> 
                                    <?php



                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{



                                                 try{    


                                              

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                                                
                                                    $req = "SELECT * FROM categorie  where id= '".$id_categorie."'";     // envoyer la requête au SGBD    
                                                
                                                    $res = $cnx->query($req);     // parcourir les lignes de résultat    

                                                    while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
                                                     
                                                            echo "<option value=".$ligne['nom'].">". $ligne['nom'] ."</option>";
                                                    
                                                    }


                                                }   catch(PDOException $e){  


                                                       die("echec : ".$e->getMessage()); 
                                            
                                                    }
                                            
                                                
                                    ?>

                                <input type="text" name="titre_support" required  placeholder="veuillez donner un titre" value="<?php echo $titre; ?>"> </br>
                
               
                                


                               <input type="text" name="nom_support" required placeholder="veuillez donner un nom" value=<?php  echo $nom; ?> /> </br>
                               <input type="file" name="image_support"  placeholder="veuillez donner un nom" value=<?php echo $image ?> /> </br>

                               
                                <select name="type_support" id="type_support">   
                                   
                                     <script>
                                            showHint();
                                            function showHint() {
                                                    var e = document.getElementById("categorie");
                                                    var strUser = e.options[e.selectedIndex].value;
                                                if (strUser ==null) { 
                                                    return;
                                                } else {
                                                    var xmlhttp = new XMLHttpRequest();
                                                    xmlhttp.onreadystatechange = function() {
                                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                            document.getElementById("type_support").innerHTML = xmlhttp.responseText;
                                                         

                                                        }
                                                    };
                                                     
                                                    xmlhttp.open("GET", "categorie.php?nom=" + strUser, true);
                                                    xmlhttp.send();


                                                }
                                            }
                                        </script>
                                   
                                </select>

                     <input type="file" name="lien"  required  value= <?php  echo $lien;  ?> />

                     <textarea cols="50"  rows="10"  name="description"  > <?php  echo $description ?> </textarea>  


                     <input type="submit" value="valider" name="valider">
            </form>
        <?php

            }

        ?>



</body>
</html>