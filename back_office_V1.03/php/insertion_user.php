<?php



	require 'Class_utilisateur.php';

	$pseudo = $_POST['pseudo'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email_text'];
	$password = $_POST['pwd'];
	$type = $_POST['theme_drill'];
	$created_date = date("Y-m-d H:i:s");
	



	
	$user = new utilisateur();
	
	$user->inscription_user($pseudo, $nom, $prenom, $email, $password, $type, $created_date);

	
  	 	

?>