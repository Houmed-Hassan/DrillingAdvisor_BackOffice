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
                           
                                 
                                
                     <form  name="form_modification_sous_theme" method="POST"  action="php/modification_theme.php?id=<?php  echo $id;  ?>">
                                          
                                        <h1>  Modification d'un theme </h1>
                            
                                <p> 
                                    <label for="nametheme" class="nametheme"  > Nom du theme  </label>
                                    <input id="nametheme" name="nom_theme" required="required"  value=<?php echo $nom ; ?> type="text" placeholder="donne un nom a votre theme "/>
                                </p>


                               
                                <p> 
                                    <label for="nametheme" class="nametheme" > </label>
                                    <input id="imageoftheme" name="image_theme"  type="file" value=<?php echo $image; ?> />
                                </p>
                               

                                <p> 
                                    <label for="nametheme" class="nametheme"  > Description du theme </label>  </p>
                                <p>  <textarea name="description" ></textarea>
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