<?php




require 'Class_utilisateur.php';

$email = null;
$password = null;


if(isset($_SESSION['email_user'])){

    header('Location:../espace_membres.php');

}

else{


$user = new utilisateur();

$user -> authentification($email, $password);

}



?>