<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Welcome to DrillingAdvisor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="">
                    <strong>
					<p id="demo"></p>

					<b> <script>
					document.getElementById("demo").innerHTML = Date();
					</script></b>
					</strong>
                </a>


                  <?php

                   if(isset($_SESSION['email_user'])){

                    echo '   <span class="right"> 
                     
                        <a href="espace_membres.php"> <strong ><b> Espace utilisateur </b></strong> </a>

                            </span>';
                    

                    }

                    else{

            ?>


                <span class="right">
				 <a href="inscription.html">
                        <strong ><b>Creer un compte </b></strong>
                    </a>
                    <a href="authentification.html">
                        <strong ><b>Connexion</b></strong>
                    </a>
                </span>
            <?php

                }
            ?>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
			<a href="./acceuil.html">
               <img float="right" src="images/img1.png"  alt="image profil" style ="width:70px;height:70px;" />

			   <img src="images/img2.png"  style ="width:180px;height:50px; " /></h1></br></br></br></br>
					
						
				</p>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div >
                            
                                <h1> Description </h1> 
                         <p><center>Prepare and live your perfect trip with DrillingAdvisor.
						 With over 225 million reviews and comments can trust, 
						 DrillingAdvisor helps you to easily find the best hotels, the best restaurants ...Wherever you are. Our powerful application search engine allows you to find a differents things all times. With DrillingAdvisor app, hotel booking, restaurants and Education and Sport is at your fingertips!
                         DrillingAdvisor The mobile application is free and easy.</center></p>

							
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>