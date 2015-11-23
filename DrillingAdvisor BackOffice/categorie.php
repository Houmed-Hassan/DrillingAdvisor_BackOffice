 <?php
                                    

                                        if($_GET['nom'] == "Education"){


                                            echo'

                                                        <option value="cours"> Cours </option>

                                                        <option value="livre">  Livre </option>

                                                        <option value="Tutorial"> Tutorial </option> 

                                                    
                                                ';

                                        }


                                        else if($_GET['nom'] == "Restauration"){

                                            echo'

                                                        <option value="entre"> entre </option>

                                                        <option value="dessert">  dessert </option>

                                                        

                                                    
                                                ';
                                        }

                                        else{


                                            echo '<option value="desole"> desole </option>'; 
                                        }

?>