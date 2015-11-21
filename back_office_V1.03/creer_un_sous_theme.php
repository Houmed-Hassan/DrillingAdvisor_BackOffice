<?php

    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title> creation d'un sous theme </title>
    </head>
    <body>
        
        <?php

            if(!isset($_SESSION['email_user'])){

                header('Location:authentification.html');

            }


            else{
        ?>


            <form  name="form_creation_sous_theme" method="POST"  action="php/insertion_theme.php">
                            
    
                        <select name="categorie" id="categorie" onchange="showHint()">

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


                        </select></br>


                        <select name="theme" id="theme">
                           
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
                                                            document.getElementById("theme").innerHTML = xmlhttp.responseText;
                                                            
                                                        }
                                                    };

                                                    xmlhttp.open("GET", "php/recherche_theme.php?nom=" + strUser, true);
                                                    xmlhttp.send();
                                                }
                                            }
                                        </script>
                                   

                        </select> </br>



                        <input type="text"  name="nom_theme" placeholder="veuillez saisir votre NOM" required /> </br>


                        <input type="file"  name="image_theme" placeholder="veuillez lui donner une image" /></br>

                        <textarea name="description" ></textarea>



                        <input type="submit"  value="valider" name="valider"/>

            </form>
        <?php

            }
        ?>

    </body>
</html>