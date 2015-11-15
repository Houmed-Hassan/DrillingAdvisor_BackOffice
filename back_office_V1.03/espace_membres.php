<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>formulaire d'inscription </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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


	    	

			<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" >
			        <div class="container">

			           <!-- 1. dans le nav, div pour l'elements span  view  Application -->
			            <div class="navbar-header">
			              
			               <!--  -->
			                
			                <span class="light"> <a href="creation_theme.php" > Créer un theme </a> </span>  &nbsp; &nbsp; &nbsp;

			                <span class="light"> <a href="creation_support.php"> ajouter un support </a></span>
			                
			            </div> <!-- 1. fin de l'element  -->

			                   
			            <div class="collapse navbar-collapse navbar-right navbar-main-collapse"  >
			                <ul class="nav navbar-nav">
			                   
			                   <li> 
			                   		<div class="form-group">
			                   
			                    	<a href="profil_utilisateur.php"> <img src="image/profil_image.gif"  alt="image profil" style ="width:50px;height:50px;" /></a>

			                        </div>
			                    </li>

			                    <li>
			                    	
			                   			 <a href="php/deconnexion.php"> Deconnexion </a>

			                    </li>
			           		</ul>
			        	</div>
			        </div>
			        
			</nav>

		</div>


	</div>

	<div class="corps">
		    
		       
			<div class="page-header">
			   <h3 id="phrase">   Theme ainsi que le support  par theme que vous avez creer que vous avez creer <h3> 
			</div>

		<ul>

		<?php


		                require_once 'php/base_connexion.php';


		                if(!isset($_SESSION['email_user'])){

		                        header('Location:authentification.html');

		                }


		                else{



		                    try{    


		                    	$id_utilisateur;


		                        $email =  $_SESSION['email_user'];

		                        $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
		                    
		                        $requete1 = "SELECT id FROM utilisateur WHERE email='".$email."'";     // envoyer la requête au SGBD    
		                    
		                        $res = $cnx->query($requete1);     // parcourir les lignes de résultat    


//echo " je suis arrive jusqu'a ici 11111111 </br>";

		                        while ($ligne = $res->fetch()){       // afficher les données de la ligne  
		                    
		                                 
		                               $id_utilisateur = $ligne['id'];
		                              /// echo " je suis arrive jusqu'a ici dans la boucle 1 </br>";
		                        }
		                        		//echo " je suis arrive jusqu'a ici requete 2</br>";


		                              $requte2 ="select theme.id, theme.nom from theme, utilisateur where theme.id_utilisateur = utilisateur.id and id_utilisateur='".$id_utilisateur."'";

		                              $res1 = $cnx->query($requte2);



		                              while ($ligne1 =  $res1 ->fetch()) {
		                              	# code...

		                              		$id_theme = $ligne1['id'];
		                              		$nom_theme = $ligne1['nom'];





		                              	echo'	<li>
						
												<p> 

														'.$nom_theme.'

												<input type="submit" id="modifier_support" value="modifier" /> 

												 <input type="submit" id="supprimer_support" value="supprimer"/>

												 </p>';
		                              		
												 

		                              	    $requte3 ="select support.nom from support, theme, utilisateur where support.theme_id = theme.id
		                              	    		   and support.utilisateur_id = utilisateur.id  
		                              	    		   and support.theme_id = '".$id_theme."'
		                              	    		   and support.utilisateur_id='".$id_utilisateur."'";

		                                    $res2 = $cnx->query($requte3);



		                                    while ($ligne2 =  $res2 ->fetch()) {
		                                    	# code...

		                                    		$nom_support = $ligne2['nom'];


		                                    		echo '<ol>
															<li>
																 '.$nom_support.'

																 <input type="submit" id="modifier_support" value="modifier" /> 

																 <input type="submit" id="supprimer_support" value="supprimer"/>
															</li>';


		                                    }


		                                   echo '</ol>';

		                                echo '</li>';


		                              } 



		                    }  catch (PDOException $e){  


		                           die("echec : ".$e->getMessage()); 
		                        }



		                } // fin d'else

		        

		?>
		</ul>

				

		



				

					

							
						

		       
		  
	</div>

</div>

</body>
</html>