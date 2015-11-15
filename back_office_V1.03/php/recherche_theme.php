<?php
session_start();

require_once 'base_connexion.php';


	if(isset($_POST['categorie_envoie']) || isset($_POST['id_categorie'])) {
	 
	    $json = array();
	     
	    if(isset($_POST['categorie_envoie'])) {
	        // requête qui récupère les régions
	        $requete = "SELECT id, nom FROM categorie  ORDER BY nom";



	    } else if(isset($_POST['id_region'])) {

	        $id = htmlentities(intval($_POST['id_categorie']));
	        // requête qui récupère les départements selon la région
	        $req= "SELECT id, nom FROM theme WHERE categorie_id = ". $id ." ORDER BY nom";
	    }
	     
	    // connexion à la base de données
	    try {


	        $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     // requête SQL d’interrogation de la table ville   
                    
                               
            $res = $cnx->query($req);  
	      
	        		     
		    // résultats
		    while($donnees = $res->fetch(PDO::FETCH_ASSOC)) {
		        // je remplis un tableau et mettant l'id en index (que ce soit pour les régions ou les départements)
		        $json[$donnees['id']][] = utf8_encode($donnees['nom']);
		    }
	     
		    // envoi du résultat au success
		    echo json_encode($json);


	    } catch(Exception $e) {


	        exit('Impossible de se connecter à la base de données.');

	    }
	  
	}



?>