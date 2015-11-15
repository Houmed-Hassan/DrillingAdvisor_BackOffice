<?php

 session_start();

?>


<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>formulaire d'inscription </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="css/grayscale.css" rel="stylesheet">
       

        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="container">
        	<div class="row">
        	    <div class="col-lg-3 col-lg-offset-2">

        			<nav class="navbar navbar-custom navbar-fixed-top" role="navigation"  background-color="black">
        			        <div class="container">

        			          
        			                   
        			            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        			                <ul class="nav navbar-nav">
        			                   
        			                   <li> 
        			                   		<div class="form-group">
        			                   
        			                    	<a href="profil_utilisateur.php"> <img src="image/profil_image.gif"  alt="image profil" style ="width:50px;height:50px;" /></a>

        			                        </div>
        			                    </li>

        			                    <li>
        			                    	
        			                   			 <a href="php/deconnexion.php"> Deconnexion </a>

        			                    </li>
        			           
        			        	</div>
        			        </ul>
        			        
        			</nav>

        		</div>


        	</div>





        	<div class="corps">
        	    
        	       
        		<div class="page-header">
        		   <h3 id="phrase">   veuillez saisir un theme <h3> 
        		</div>


        		<form role="form" method="post" action="php/insertion_theme.php">
                    <div class="col-lg-6">
                       
                        <div class="form-group">
                            <label>Entrer le Nom de votre theme: </label>
                            <div class="input-group">
                                <input type="text" class="form-control input-lg"  name="nom_theme" placeholder="Nom " required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>preciser le categorie auquel appartient votre thème </label>
                            <div class="input-group" id="categorie_d">
                                <select class="form-control input-lg"  id="categorie" name="categorie">

                                    <?php

                                     require_once 'php/base_connexion.php';


                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{
                                                


                                                try{    


                                                    $email =  $_SESSION['email_user'];

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                                                
                                                    $req = "SELECT * FROM categorie ";     // envoyer la requête au SGBD    
                                                
                                                    $res = $cnx->query($req);     // parcourir les lignes de résultat    

                                                    while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
                                                     
                                                            echo "<option value=".$ligne['nom'].">". $ligne['nom'] ."</option>";
                                                    
                                                    }


                                                }   catch(PDOException $e){  


                                                       die("echec : ".$e->getMessage()); 
                                            
                                                    }
                                            }

                                	
                                    ?>

                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                     
                        <div class="form-group">
                            <label>preciser le categorie auquel appartient votre thème, s' il appartient à un thème  </label>
                            <div class="input-group" id="categorie_d">
                                <select class="form-control input-lg"  id="theme"  name="theme">

                                    <option value="aucun">  aucun </option>
                                    
                                        <?php


                                                $req = "SELECT * FROM theme ";     // envoyer la requête au SGBD    
                                                
                                                $res = $cnx->query($req);     // parcourir les lignes de résultat    

                                                while ($ligne = $res->fetch()){      // afficher les données de la ligne  
                                                                              
                                                     echo "<option value=".$ligne['nom'].">". $ligne['nom'] ."</option>";
                                                    
                                                }


                                        ?>
                                   
                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label> donner une explication   </label>
                            <div class="input-group" id="categorie_d">
                                
                                 <textarea name="InputMessage" id="text_theme" class="form-control input-lg" rows="5" cols="30" ></textarea>
                                <span class="input-group-addon"></span></span>
                               
                            </div>
                        </div>


                        <button class="btn btn-primary btn-lg btn-block"  type="submit"> Valider </button> </br>
                        
                    </div>
                </form>
        	  
        	</div>

        </div>




        <script type="text/javascript">

                $(document).ready(function(){

                        var $categorie = $('#categorie');
                        var $thme = $('#theme');

                        //chargement des categories


                        $.ajax({


                                url: 'php/recherche_theme.php';
                                data: 'categorie_envoie';

                                dataType: 'json';
                                success: function(json){

                                    $.each(json, function(value){

                                        $categorie.append('<option value="'+value'">' +value +'<option>');

                                    });
                                }


                        });



                        $categorie.on('change', function(){

                                var val= $(this).val();

                                if(val != ''){

                                    $theme.empty();

                                    $ajax({

                                        url:'php/recherche_theme.php';
                                        data:'id_categorie ='+val();
                                        dataType; 'json';
                                        success: function(json){

                                            $.each(json, function(value){

                                             $theme.append('<option value="'+value'">' +value +'<option>');

                                    });
                                        }

                                    });
                                }

                        });


                });


        </script>

    </body>

</html>

