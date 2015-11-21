<?php

require 'Class_support.php';


				  $titre= $_POST['titre_support'];
                  $nom =$_POST['nom_support'];

                  

                   $image =null;

                  if(isset($_POST['image_support'])){

                    $image= $_POST['image_support']; 
                  
                  }

                  else{

                    $image = "vide";
                  }

            $lien = $_POST['lien'];

            $description = $_POST['description'];

            $type = $_POST['type_support'];

            $id_support = $_GET['id'];


                            if(!isset($_SESSION['email_user'])){

                                    header('Location:../authentification.html');

                            }

                        else{


      $support= new Support();
      
      $support->modifier_support($titre, $nom,  $type, $lien, $description, $image, $id_support);
  }


?>