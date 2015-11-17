+<?php


session_start();

require 'Class_utilisateur.php';

$email = null;
$password = null;

$user = new utilisateur();

$user -> authentification($email, $password);




?>