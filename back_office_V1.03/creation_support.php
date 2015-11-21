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

                                                            xmlhttp.open("GET", "categorie_theme.php?nom=" + strUser, true);
                                                            xmlhttp.send();
                                                        }
                                                    }
                                                </script>
                                           

                                </select> </br>

                                <input type="text" name="titre_support" required  placeholder="veuillez donner un titre"> </br>
                
               
                                


                               <input type="text" name="nom_support" required placeholder="veuillez donner un nom"/> </br>
                               <input type="file" name="image_support"  placeholder="veuillez donner un nom"/> </br>

                               
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

                     <input type="file" name="lien"  placeholder=" un lien vers votre fichier" required/>

                     <textarea cols="50"  rows="10"  name="description"  placeholder> </textarea>  


                     <input type="submit" value="valider" name="valider">
            </form>


</body>
</html>