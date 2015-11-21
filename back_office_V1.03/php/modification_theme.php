<?php




	require 'Class_Theme.php';

 	if(!isset($_SESSION['email_user'])){

        header('Location:../authentification.html');

    }

    else{

    			$nom = $_POST['nom_theme'];
				

				$image =null;

				if(isset($_POST['image_theme'])){

					$image= $_POST['image_theme']; 
				
				}

				else{

					$image = "vide";
				}

				$description = $_POST['description'];

				$id_theme = $_GET['id'];


				echo $id_theme;

				$theme = new sous_theme();

				$theme ->  modification_theme($id_theme, $nom, $image, $description);






    }




?>