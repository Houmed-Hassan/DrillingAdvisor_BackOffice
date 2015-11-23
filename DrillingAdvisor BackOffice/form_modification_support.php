<?php

    session_start();



            if(!isset($_SESSION['email_user'])){

                header('Location:authentification.html');

            }


            else{





        ?>
                <?php

                    $id = $_GET['id'];
             

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
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                           
                                 
                                
                     <form action="php/modification_support.php?id=<?php  echo $id;?>" method="POST" name="modif_support">

                                        <h1>  Modification d'un support </h1>

                                 <p>  
                               <label for="namesupport" class="namesupport"  > Categorie </label> </br>
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
                                </select></p>
                                
                                <p> 
                                    <label for="nametheme" class="nametheme"  > titre du support  </label>
                                    <input id="nametheme" name="nom_support" required="required"  value=<?php echo $titre ; ?> type="text" placeholder="donne un nom a votre theme "/>
                                </p>


                                <p> 
                                    <label for="nametheme" class="nametheme"  > Nom du theme  </label>
                                    <input id="nametheme" name="nom_support" required="required"  value=<?php echo $nom ; ?> type="text" placeholder="donne un nom a votre theme "/>
                                </p>


                               
                                <p> 
                                    <label for="nametheme" class="nametheme" > </label>
                                    <input id="imageoftheme" name="image_theme"  type="file" value=<?php echo $image; ?> />
                                </p>
                               

                               <p>  
                               <label for="namesupport" class="namesupport"  > Type du support </label> </br>
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
                                   
                                </select></p>

                                 <label for="nametheme" class="nametheme"  > lien vers le support (si vous avez un documents a joindre) </label>
                                    <input id="imageoftheme" name="lien"  type="file"  required value= <?php  echo $lien;  ?> />
                                </p>
                               

                                <p> 
                                    <label for="nametheme" class="nametheme"  > Description du theme </label>  </p>
                                <p>  <textarea name="description" > <?php  echo $contenu ?> </textarea>


                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Save" /> 
                                </p>
                                
                            </form>
                        </div>

             
                        
                    </div>
                </div>

    </body>
</html>

<?php


}
?>