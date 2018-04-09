<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>

	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
		<h2>inscription</h2>
    </head>
	
	<nav>
		<?php include('nav.php'); ?>
		<br>
	</nav>
	
    <body>
	
	<header>
		<?php include('header.php'); ?>
	</header>
		
		<section>
			<div id="register" class="animate form">
                <form  method="post" action="scriptInscription.php" autocomplete="on"> 
                    <h1> Inscription </h1> 
						<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" >Pseudo : </label>
                                    <input id="usernamesignup" name="pseudo" required="required" type="text" placeholder="pseudo" />
						</p>
                        
						<p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p" >Mot de passe : </label>
                                    <input id="passwordsignup" name="motDePasse" required="required" type="password" placeholder="mot de passe"/>
						</p>
                                
						<p class="signin button"> 
                                    <input type="submit" value="S'inscrire"/> 
						</p>
						<p class="change_link">  
                                    Déjà inscrit ?
                                    <a href="connexion.php">Connexion</a>
						</p>
                </form>
            </div>
						
		</section>

    </body>
	
	<footer>
		<?php include('footer.php'); ?>
	</footer>
	
</html>