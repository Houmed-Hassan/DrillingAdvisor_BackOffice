 <?php


 session_start();

                                     require_once 'php/base_connexion.php';


                                            if(!isset($_SESSION['email_user'])){

                                                    header('Location:authentification.html');

                                            }


                                            else{
                                                



                                                try{    


                                                    $email =  $_SESSION['email_user'];

                                                    $cnx = new PDO(DSN, LOGIN, PASSWORD, $options);     
                                                    // requête SQL d’interrogation de la table   
                                                
                                                    $req1 = "SELECT soustheme.id, soustheme.nom FROM soustheme, categorie where soustheme.categorie_id = categorie.id

                                                        and categorie.nom='".$_GET['nom']."'";     
                                                        // envoyer la requête au SGBD    
                                                
                                                    $res = $cnx->query($req1);     
                                                    // parcourir les lignes de résultat    

                                                    while ($ligne = $res->fetch()){    
                                                      // afficher les données de la ligne  
                                                                              
                                                     
                                                            echo "<option value=".$ligne['id'].">". $ligne['nom'] ."</option>";
                                                    
                                                    }


                                                }   catch(PDOException $e){  


                                                       die("echec : ".$e->getMessage()); 
                                            
                                                    }
                                            }

                                    
                                    ?>