<?php session_start(); ?>
		<?php include('header.php');?>
<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
		<content id="Inscription">
			<div id="banniere">	
				<h2>Inscription</h2>
			</div>
		
			<div id="register" class="animate form">
                <form  method="post" action="scriptInscription.php" autocomplete="on">  
						<p> 

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

                                    <input id="Email" name="Email" required="required" type="text" placeholder="exemple@viacesi.fr" />
						</p>
						<p> 
                                    <label for="usernamesignupConfirm" class="uname" data-icon="u" >Confirmation de l'Email</label>
									<br/>

                                    <input id="EmailConfirm" name="EmailConfirm" required="required" type="text" placeholder="exemple@viacesi.fr" />
						</p>
                        
						<p> 

                                    <label for="passwordsignup" class="youpasswd" data-icon="p" >Mot de passe</label>
									<br/>

                                    <input id="Password" name="Password" required="required" type="password" placeholder="Saisissez votre mot de passe"/>
						</p>
						
						<p> 

                                    <label for="passwordsignupConfirm" class="youpasswd" data-icon="p" >Confirmation du mot de passe</label>
									<br/>

                                    <input id="PasswordConfirm" name="PasswordConfirm" required="required" type="password" placeholder="Confirmer votre mot de passe"/>
						</p>
                                
						<p> 
                            <button class="loginscrcon" id="signupbutton" type="submit">S'inscrire</button> 
						</p>
						<p class="change_link">  
                                    Déjà inscrit ?
                                    <a href="connexion.php">Connexion</a>
						</p>
                </form>
            </div>
						
		</content>

	
		<?php include('footer.php'); ?>
