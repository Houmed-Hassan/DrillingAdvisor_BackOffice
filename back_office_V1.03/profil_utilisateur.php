<?php


session_start();


?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Profil utilisateur </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="css/grayscale.css" rel="stylesheet">
   

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>

<body>

<!-- debut de nav -->

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">

          
                   
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                   
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="espace_membres.php">espace utilisateur</a>
                    </li>
                                     
                </ul>
            </div>
           
        </div>
        
    </nav>


<!--   fin de nav -->

<div class="container">

<div class="page-header">
   <h3> votre profil <h3> 
</div>




<!-- profil utilisateur, recuperation des données de la base .  -->


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



<div class="corps">
    <div class="row">

        <form method="post" action="modification_profil_user.php">  

                <div class="col-lg-6">

                    
                    <div class="form-group">
                        
                         <img src="image/profil_image.gif"  alt="image profil" style ="width:250px;height:250px;" />
                    </div>
                    
                    
                    


                     <div class="form-group">
                        <label  id="label_profil" >Email :</label>
                        <div class="alert alert-success">
                            
                           <span class="glyphicon glyphicon-remove"></span><strong> <label id="profil_identite"> <?php  echo $email_user; ?> </label> </br> </strong>
                        </div>
                    </div>

                  
                   

                </div>

            <div class="col-lg-5 col-md-push-1">
                <div class="col-md-12">

                

                   <div class="form-group">
                        <label  id="label_profil" > NOM:    </label>
                        <div class="alert alert-success">
                            
                           <span class="glyphicon glyphicon-remove"></span><strong> <label id="profil_identite"> <?php  echo $nom; ?> </label> </br> </strong>
                        </div>
                
                   </div>


                   <div class="form-group">
                        <label  id="label_profil" > PRENOM:    </label>
                        <div class="alert alert-success">
                            
                           <span class="glyphicon glyphicon-remove"></span><strong> <label id="profil_identite"> <?php  echo $prenom;  ?> </label> </br> </strong>
                        </div>
                
                   </div>



    	             <button type="submit" class="btn_profil">modifier votre profil </button>

                </div>
            </div>
        </form>
    </div>



</div>
<!-- Registration form - END -->

</div>

</body>
</html>