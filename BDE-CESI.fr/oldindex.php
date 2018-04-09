<!DOCTYPE html>

<!--####################################
 Auteur : Emma Prudent
 Date : 2017
 Contexte : Prosit Exia CESI - PHP/BDD
 #######################################-->

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/styleConnexion.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <title>GOTO Mountains</title>
    </head>

    <body>

    <!-- L'en-tête -->    
    <header>
    <h1><strong>GOTO</strong>mountains</h1>
    </header>

    

    <!-- Le corps -->
    <div id="corps">

        <!-- Le menu -->
         <?php include("menu.php"); ?>

            <div class="products">
            <?php include("displayProducts.php"); ?>
            </div>
    </div>
    
    </body>

</html>