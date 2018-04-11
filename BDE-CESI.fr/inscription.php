<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
<?php session_start(); ?>
	<header>
		<?php include('header.php');?>
	</header>
	
    <head>
        <title>BDE CESI EXIA St Nazaire</title>
    </head>
	

	
    <body>
		
		<section>
			<div id="register" class="animate form">
                <form  method="post" action="scriptInscription.php" autocomplete="on"> 
                    <h1> Inscription </h1> 
						<p> 
                                    <label for="firstnamesignup" class="uname" data-icon="u" >Prénom : </label>
                                    <input id="Prenom" name="Prenom" required="required" type="text" placeholder="Saisissez votre prénom" />
						</p>
						<p> 
                                    <label for="lastnamesignup" class="uname" data-icon="u" >Nom : </label>
                                    <input id="Nom" name="Nom" required="required" type="text" placeholder="Saisissez votre nom" />
						</p>
						<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" >Email : </label>
                                    <input id="Email" name="Email" required="required" type="text" placeholder="exemple@viacesi.fr" />
						</p>
                        
						<p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p" >Mot de passe : </label>
                                    <input id="Password" name="Password" required="required" type="password" placeholder="Saisissez votre mot de passe"/>
						</p>
						
						<p> 
                                    <label for="passwordsignupConfirm" class="youpasswd" data-icon="p" >Confirmation du mot de passe : </label>
                                    <input id="PasswordConfirm" name="PasswordConfirm" required="required" type="password" placeholder="Confirmer votre mot de passe"/>
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