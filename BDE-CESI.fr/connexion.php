<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
<?php session_start(); ?>
		<?php include('header.php'); ?>
	
	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
    </head>
	
	
    <body>
            
            <section>
				<div id="connexion">
                    <div id="login" class="animate form">
                        <form method="post" action="scriptConnexion.php" autocomplete="on">
                            <h1>Connexion</h1>
                                <p> 
                                    <label for="Email" class="uname" data-icon="u" > Email : </label>
                                    <input id="Email" name="Email" required="required" type="text" placeholder="Email"/>
                                </p>
                                <p> 
                                    <label for="Password" class="youpasswd" data-icon="p"> Mot de passe : </label>
                                    <input id="Password" name="Password" required="required" type="password" placeholder="Password" /> 
                                </p>
                            
                                <p class="login button"> 
                                    <input type="submit" value="Connexion" /> 
                                </p>
                                <p class="change_link">
                                    Pas encore inscrit ?
                                    <a href="inscription.php">Inscription</a>
                                </p>
                        </form>
                    </div>                       
                </div> 
            </section>

        
    </div>

    </body>
	
		<?php include('footer.php'); ?>
	
</html>