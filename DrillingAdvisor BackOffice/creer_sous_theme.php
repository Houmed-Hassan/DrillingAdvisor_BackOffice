<?php

    session_start();
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta charset="UTF-8" />
        <title>DrillingAdvisor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>

<body>
 <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                 <span class="right">
                 <a href="profil_utilisateur.php"> 
                        <strong ><b><img align="top-right"src="image/profil_image.gif"  alt="image profil" style ="width:50px;height:50px;" /></b></strong>
                    </a>
                     <a href="php/deconnexion.php">
                        <strong ><b>Deconnexion</b></strong>
                    </a>
                </span>

                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
                

                <header>
                    <div class="page-header">
               
                 
                  <a href="creation_support.php"> <input type="submit" class="menu_button" value="créer un support "/> </a> &nbsp; &nbsp;
                  <a href="php/consulter_support.php"> <input type="submit" class="menu_button" value="consulter vos supports "/> </a> &nbsp; &nbsp;
                  <a href="php/affichage_theme.php"> <input type="submit" class="menu_button" value="consulter vos theme "/> </a> &nbsp; &nbsp;
                
            </div>  
                </header>
            <section>	



            <?php

            if(!isset($_SESSION['email_user'])){

                header('Location:authentification.html');

            }


            else{
            ?>			
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  name="form_creation_sous_theme" method="POST"  action="php/insertion_theme.php" autocomplete="on"> 
                                <h1>Create a theme </h1> 
								
								<p> 
                                <label for="nametheme" class="nametheme"  > Categorie existant </label></br>
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
                                </p>

                                <p>
                                <label for="nametheme" class="nametheme"  > theme existant </label> </br> 
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
                                   

                        </select>

                        </p>
								 <p> 
                                    <label for="nametheme" class="nametheme"  > Nom d'un theme </label>
                                    <input id="nametheme" name="nom_theme" required="required" type="text" placeholder="donne un nom a votre theme "/>
                                </p>

                                <p> 
                                    <label for="nametheme" class="nametheme"  > Image d'un theme </label>
                                    <input id="imageoftheme" name="image_theme"  type="file" />
                                </p>
                               

                                <p> 
                                    <label for="nametheme" class="nametheme"  > Description du theme </label>  </p>
                                <p>  <textarea name="description" ><?php echo $contenu; ?></textarea>
                                </p>
                               

                              
                                
                               
                                <p class="login button"> 
                                    <input type="submit" value="valider" /> 

								</p>
                                
                            </form>
                        </div>

             
						
                    </div>
                </div> 

                <?php

                }

                ?> 
            </section>
        </div>
    </body>
</html>