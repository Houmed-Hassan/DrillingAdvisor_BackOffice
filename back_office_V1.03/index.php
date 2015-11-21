<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
  

    <title>DrillingAdvisor</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
      	<link href="css/styles.css" rel="stylesheet">
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>



<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">

           <!-- 1. dans le nav, div pour l'elements span  view  Application -->
            <div class="navbar-header">
              
               <!--  -->
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">View Application </span> 
                </a>
            </div> <!-- 1. fin de l'element  -->



 		           
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                   
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                  
            <?php

                   if(isset($_SESSION['email_user'])){

                    echo '   
                    <li>
                        <a class="page-scroll" href="espace_membres.php">Espace utilisateur </a>
                    </li>';

                    }

                    else{

            ?>
                    <li>
                        <a class="page-scroll" href="inscription.html">Inscription </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="authentification.html">Login</a>
                    </li>
                    <?php

                }
                    ?>
                </ul>
            </div>
           
        </div>
        
    </nav>




    
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">DrillingAdvisor</h1>
                        <p class="intro-text">A free application android <br>Created by AndroidIT.</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>





    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About DrillingAdvisor</h2>
                <p>

                    DrillingAdvisor is the back_office application of mobile application. </p>
                <p> 
                 cette page conserne que la creation, l'ajout des themes et des fichiers.
                </p>
            </div>
        </div>
    </section>




  


    
   
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </footer>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
