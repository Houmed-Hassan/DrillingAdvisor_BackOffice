<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta charset="UTF-8" />
        <title>DrillingAdvisor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style3.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>

<body>
 <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                 <span class="right">
				 <a href="profil_utilisateur.php"> 
                        <strong ><b><img align="top-right"src="../image/profil_image.gif"  alt="image profil" style ="width:50px;height:50px;" /></b></strong>
                    </a>
                     <a href="deconnexion.php">
                        <strong ><b>Deconnexion</b></strong>
                    </a>
                </span>

                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
				

				<header>
					<div class="page-header">
		       
				  <a href="../creer_sous_theme.php"> <input type="submit" class="menu_button" value="créer un sous-theme"/> </a> &nbsp; &nbsp;
	       		  <a href="../creation_support.php"> <input type="submit" class="menu_button" value="créer un support "/> </a> &nbsp; &nbsp;
	       		  <a href="consulter_support.php"> <input type="submit" class="menu_button" value="consulter vos supports "/> </a> &nbsp; &nbsp;
	       		  <a href="affichage_theme.php"> <input type="submit" class="menu_button" value="consulter vos theme "/> </a> &nbsp; &nbsp;
				
			</div>	
				</header>
			
			<div align="center">
			 		<b> Tout les themes que vous avez creer </b> 
			 		</br> </br>

				<?php

					require 'Class_Theme.php';
				 	if(!isset($_SESSION['email_user'])){

				        header('Location:../authentification.html');

				    }


				    else{

				       

				        $ss_theme = new sous_theme();

						$ss_theme -> affichage_theme();



					}

?>
			</div>