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
		       
				  <a href="creer_un_sous_theme.php"> <input type="submit" class="btn_profil" value="créer un sous-theme"/> </a> &nbsp; &nbsp;
	       		  <a href="creation_support.php"> <input type="submit" class="btn_profil" value="créer un support "/> </a> &nbsp; &nbsp;
	       		  <a href="php/consulter_support.php"> <input type="submit" class="btn_profil" value="consulter vos supports "/> </a> &nbsp; &nbsp;
	       		  <a href="php/affichage_theme.php"> <input type="submit" class="btn_profil" value="consulter vos theme "/> </a> &nbsp; &nbsp;
				
			</div>				

	</div>

</div>

</body>
</html>