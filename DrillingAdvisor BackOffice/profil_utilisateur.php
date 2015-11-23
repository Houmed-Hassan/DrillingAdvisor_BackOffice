<?php


session_start();


?>


<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8" />

        <title>DrillingAdvisor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
<body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="">
                    <strong>
                        <p id="demo"></p>

                    <script>
                        document.getElementById("demo").innerHTML = Date();
                    </script> </strong>
                </a>

                <span class="right"> 
                     
                        <a href="espace_membres.php"> <strong ><b> Espace utilisateur </b></strong> </a>

                            </span>
                <span class="right">
                 
                        <strong >Welcome to DrillingAdvisor</strong>
                    
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
            
             <a href="index.php">
               <img float="right" src="images/img1.png"  alt="image profil" style ="width:70px;height:70px;" />

               <img src="images/img2.png"  style ="width:180px;height:50px; " /></h1></br>
                    
                        
                </p>
                
            </header>
            <?php


                require_once 'php/base_connexion.php';


                if(!isset($_SESSION['email_user'])){

                        header('Location:authentification.html');

                }


                else{



                    try{    


                        $email =  $_SESSION['email_user'];

                        $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                    
                        $req = "SELECT * FROM utilisateur WHERE email='".$email."'";     // envoyer la requête au SGBD    
                    
                        $res = $cnx->query($req);     // parcourir les lignes de résultat    

                        while ($ligne = $res->fetch()){       // afficher les données de la ligne  
                    
                                 
                                 
                                 $nom = $ligne['nom'];
                                 $prenom = $ligne['prenom'];
                                 $email_user = $ligne['email'];


                                                                
                                 

                        }  



                    }  catch (PDOException $e){  


                           die("echec : ".$e->getMessage()); 
                        }



                } // fin d'else

        

?>
            <section>

                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="yourprofil.php" autocomplete="on"> 
                         <h1>Your profil</h1> 
                               <p >
                                     <img src="images/profil_image.gif"  alt="image profil" style ="width:70px;height:70px;" />
                                </p></p>
                                
                               
                                          
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Nom</label>
                                    <input id="usernamesignup" name="nom" required="required" type="text" value="<?php  echo $nom; ?> " />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Prenom </label>
                                    <input id="usernamesignup" name="prenom" required="required" type="text" value="<?php  echo $prenom; ?>" />
                                </p>
                                
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email_text" required="required" type="text" value="<?php  echo $email; ?>"/> 
                                </p>

                                
                               
                                 <p class="signin button"> 
                                    <input type="submit" value="Validate"/> 
                                    
                                </p>
                                
                                
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>



<!-- profil utilisateur, recuperation des données de la base .  -->




 

<!-- Registration form - END -->

</div>

</body>
</html>