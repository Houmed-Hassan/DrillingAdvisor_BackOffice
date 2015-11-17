<?php




	class utilisateur {
        private $nom=null; 
		private $prenom=null;
		private $pseudo=null;
		private $email=null;
		private $password=null; 


		



	    function authentification($email, $password){

			require_once 'base_connexion.php';
	    
	    	if(isset($_POST['email_user']) && isset($_POST['pwd_user']))
			{   


			      echo "la fonction isset est true \n";


			    if(!empty($_POST['email_user']) && !empty($_POST['pwd_user']))
			    {



			        echo " la fonction empty est true \n "; 


			            $email= filter_var($_POST['email_user'], FILTER_SANITIZE_STRING);
			            $password = filter_var($_POST['pwd_user'], FILTER_SANITIZE_STRING);

			            $password = MD5($password);

			            echo $password;

			            try{
			                 
			                  $cnx = new PDO( DSN , LOGIN, PASSWORD, $options );

			                  $cnx -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			                  echo "je suis dans try  ";

			                  $req = $cnx -> prepare("SELECT email, password FROM utilisateur WHERE email='$email' and password='$password'");
			                  $req -> bindParam('".$email."', $email , PDO::PARAM_STR);
			                  $req -> bindParam('".$password."', $password , PDO::PARAM_STR);
			                  $req -> execute();

			                    //echo $req;

			                  $count = $req ->fetchColumn();

			                  if($count ==true){


			                  	  session_start();

			                      $_SESSION['email_user'] = $email;                   

			                      header('Location:../espace_membres.php');
			                     

			                  }

			                  else{

			                  	header('Location:../authentification.html');

			                      echo ' <script type="text/javascript">


								          document.getElementByName("error_cnx").innerHTML="erreur email ou mot de passe";


								        </script>';
			                  
			                  }   



			              } catch (Exception $e ) {

			                    header('Location:../authentification.html');
			                       echo ' <script type="text/javascript">


          								document.getElementByName("error_cnx").innerHTML="nous avons detecter une erreur de connexion";


       										 </script>';
			                }

			    } // fin de if (empty ), sous-condition

		    else{
		    	header('Location:../authentification.html');

			          echo ' <script type="text/javascript">


						 document.getElementByName("error_cnx").innerHTML="veuillez saisir email ou  mot de passe";


						  </script>';


		     }

		    } // fin de if(isset), 1er condition

    		else{


    			header('Location:../authentification.html');

       			  echo ' <script type="text/javascript">


			          document.getElementByName("error_cnx").innerHTML="nous avons detecter une erreur de connexion";


			        </script>';
    		}


    		

		} // fin de la fonction d'authentification 




/****************************************************************************************************************************************************/

		function inscription_user($pseudo, $nom, $prenom, $email, $password, $type, $date_creation){



									// inclure les informations de connexion 
				require_once 'base_connexion.php'; // centraliser les erreurs
			 	
			 	try{     // créer un objet PDO pour communiquer avec SGBD    
			 	
			 	$cnx = new PDO(DSN, LOGIN, PASSWORD, $options);    


			 	$pwd_user = md5($password);
			 	

			    $req = "INSERT INTO utilisateur VALUES ('', '".$pseudo."', '".$nom."', '".$prenom."', '".$email."', '".$pwd_user."', '".$type."', '".$date_creation."' )";     // envoyer la requête au SGBD    
			    
			    $cnx->exec($req);  


			    echo <script type="text/javascript">

			    		alert("insertion reussi");

			    	   </script>;

			    	 header('Location: ../profil.html');
			   			    

			    }	catch (PDOException $e){     // en cas d’erreur de connexion ou d’insertion   

			      
			      die("echec : ".$e->getMessage()); 


			  	 	}


		}// fin de la  methode incription_user


/****************************************************************************************************************************************************/



	} // fin de la classe.




?>
