<?php


session_start();

?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html"; charset="ISO-8859-1 "/>
    <title>Création d'un support  </title>

 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
     <link href="css/grayscale.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>

<body>

        <div class="container">
        	<div class="row">
        	    <div class="col-lg-3 col-lg-offset-2">

        			<nav class="navbar navbar-custom navbar-fixed-top" role="navigation"  background-color="black">
        			        <div class="container">

        			          
        			                   
        			            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        			                <ul class="nav navbar-nav">
        			                   
        			                   <li> 
        			                   		<div class="form-group">
        			                   
        			                    	<a href="profil_utilisateur.php"> <img src="image/profil_image.gif"  alt="image profil" style ="width:50px;height:50px;" /></a>

        			                        </div>
        			                    </li>

        			                    <li>
        			                    	
        			                   			 <a href="php/deconnexion.php"> Deconnexion </a>

        			                    </li>
        			           
        			        	</div>
        			        </ul>
        			        
        			</nav>

        		</div>


        	</div>



<div class="container">

<div class="page-header">
   <h3> Création d'un support <h3> 
</div>


<div class="corps">
    <div class="row">

        <form role="form" method="post" action="php/insertion_suppport.php">
            <div class="col-lg-6">

				<div class="form-group">
				
				
				
					
					  <div class="form-group">
                            <label>preciser le categorie auquel appartient votre thème </label>
                            <div class="input-group" id="categorie_d">
                                <select class="form-control input-lg"  id="categorie" name="categorie">

                                    <?php

                                     require_once 'php/base_connexion.php';


                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{



                                                try{    


                                                    $email =  $_SESSION['email_user'];

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);      
                                                
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

								  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>

                        </div>
					 
					<div class="form-group">
                            <label>preciser le categorie auquel appartient votre thème, s' il appartient à un thème  </label>
                            <div class="input-group" id="categorie_d">
                                <select class="form-control input-lg"  id="theme"  name="theme">

                                    <option value="aucun">  aucun </option>
                                    
                                        <?php


                                                $req = "SELECT * FROM theme";     // envoyer la requête au SGBD    
                                                
                                                $res = $cnx->query($req);     // parcourir les lignes de résultat    

                                                while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
                                                    echo "<option value=".$ligne['nom'].">". $ligne['nom'] ."</option>";
                                                    
                                                }


                                        ?>
                                   
                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                    </div>
					
					 <div style="text-align: center" class="form-group">
							
					      <p>    Parcourir : Choisissez un fichier(Taille maximum: 2 048Kio)</p>
					 	<div class="input-group" id="file_insert">
							<input type="file" name="test" value="Parcourir" class="form-control input-lg"  placeholder="ajouter une fichier"/>

								  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			
						  </div>
					 </div>
					 <br/>


					 <div class="form-group">
					      <textarea  name="message" class="form-control input-lg"  value="Message"  placeholder="Déscription" required ></textarea>
							
					 </div>
					
					  
					 
					 
					
                </div>
              
                 
                 <input type="submit" class="btn btn-primary btn-lg btn-block" value="Valider"  style="right"  style="width:130px" /> 
				

                  
                    </div>
                </div>
            </div>
        </form>
</div>
<!-- Registration form - END -->

</div>

</body>
</html>