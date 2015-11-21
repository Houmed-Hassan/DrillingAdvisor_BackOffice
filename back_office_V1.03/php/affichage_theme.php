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