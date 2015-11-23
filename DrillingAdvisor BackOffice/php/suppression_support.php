<?php


require 'Class_support.php';

$id = $_GET['id'];



if(!isset($_SESSION['email_user'])){

    header('Location:../authentification.html');

}

else{


 $support= new Support();
 
 $support->supression($id);

}

?>