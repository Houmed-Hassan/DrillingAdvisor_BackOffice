
<?php
// restaurer la session
session_start();

// supprimer les variables de session
$_SESSION = array();
// fermer la session
session_destroy();



header('Location: ../index.php');//redirection vers la page d'accueil 
	

?>
