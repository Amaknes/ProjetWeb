<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
<?php session_start(); ?>
		<?php include('header.php');?>
	
	
    <body>
		
		<content id="Inscription">
			<div id="banniere">	
				<h2>Inscription</h2>
			</div>
		
			<div id="register" class="animate form">
                <form  method="post" action="scriptInscription.php" autocomplete="on">  
						<p> 
<<<<<<< HEAD
                                    <label for="firstnamesignup" class="uname" data-icon="u" >Prénom</label>
									<br/>
                                    <input id="Prenom" name="Prenom" required="required" type="text" placeholder="Saisissez votre prénom" />
						</p>
						<p> 
                                    <label for="lastnamesignup" class="uname" data-icon="u" >Nom</label>
									<br/>
                                    <input id="Nom" name="Nom" required="required" type="text" placeholder="Saisissez votre nom" />
						</p>
						<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" >Email</label>
									<br/>
=======
                                    <label for="firstnamesignup" class="uname">Prénom : </label>
                                    <input id="Prenom" name="Prenom" required="required" type="text" placeholder="Saisissez votre prénom" />
						</p>
						<p> 
                                    <label for="lastnamesignup" class="uname">Nom : </label>
                                    <input id="Nom" name="Nom" required="required" type="text" placeholder="Saisissez votre nom" />
						</p>
						<p> 
                                    <label for="usernamesignup" class="uname">Email : </label>
>>>>>>> 4b88b2dddc49b2e74ca358feb643fa9462d0309c
                                    <input id="Email" name="Email" required="required" type="text" placeholder="exemple@viacesi.fr" />
						</p>
                        
						<p> 
<<<<<<< HEAD
                                    <label for="passwordsignup" class="youpasswd" data-icon="p" >Mot de passe</label>
									<br/>
=======
                                    <label for="passwordsignup" class="youpasswd">Mot de passe : </label>
>>>>>>> 4b88b2dddc49b2e74ca358feb643fa9462d0309c
                                    <input id="Password" name="Password" required="required" type="password" placeholder="Saisissez votre mot de passe"/>
						</p>
						
						<p> 
<<<<<<< HEAD
                                    <label for="passwordsignupConfirm" class="youpasswd" data-icon="p" >Confirmation du mot de passe</label>
									<br/>
=======
                                    <label for="passwordsignupConfirm" class="youpasswd">Confirmation du mot de passe : </label>
>>>>>>> 4b88b2dddc49b2e74ca358feb643fa9462d0309c
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
						
		</content>

    </body>
	
		<?php include('footer.php'); ?>
	
</html>