<?php


	
	require 'Class_utilisateur.php';

	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email_text'];
	$password = $_POST['pwd'];
	$password_confirmation = $_POST['confirmation_pwd'];
	
	
	$created_date = date("Y-m-d H:i:s");


if(isset($_SESSION['email_user'])){

    header('Location:../espace_membres.php');

}

else{
	
	$user = new utilisateur();
	
	$user->inscription_user($nom, $prenom, $email, $password, $password_confirmation,  $created_date);

}
  	 	

?>