<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
	
	<header>
		<?php include('header.php'); ?>
	</header>
	
	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>Connexion</h2>
    </head>
	
	
    <body>
            
            <section>
				<div id="connexion">
                    <div id="login" class="animate form">
                        <form method="post" action="scriptConnexion.php" autocomplete="on">
                            <h1>Connexion</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Pseudo : </label>
                                    <input id="username" name="pseudo" required="required" type="text" placeholder="pseudo"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Mot de passe : </label>
                                    <input id="password" name="motDePasse" required="required" type="password" placeholder="motdepasse" /> 
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
	
	<footer>
		<?php include('footer.php'); ?>
	</footer>
	
</html>