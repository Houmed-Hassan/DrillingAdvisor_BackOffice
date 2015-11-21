<?php


require 'Class_theme.php';

$id = $_GET['id'];



if(!isset($_SESSION['email_user'])){

    header('Location:../authentification.html');

}

else{


 $ss_theme= new sous_theme();
 
 $ss_theme->supression($id);

}

?>