<?php session_start(); ?>
		<?php include('header.php');?>
<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
		<section id="Inscription">
			<div id="banniere">	
				<h2>Inscription</h2>
			</div>
			
			<script>
			function validateForm() {
			var Prenom = document.forms["signup"]["Prenom"].value;
			var Nom = document.forms["signup"]["Nom"].value;
			var Email = document.forms["signup"]["Email"].value;
			var EmailConfirm = document.forms["signup"]["EmailConfirm"].value;
			var Password = document.forms["signup"]["Password"].value;
			var PasswordConfirm = document.forms["signup"]["PasswordConfirm"].value;
			
			if (Prenom == "") {
				alert("Phillipe, je sais ou tu te caches! Pas besoin de cacher ton prénom");
				return false;
				}
			if (Nom == "") {
				alert("Non vous n'êtes pas Dieu, comment on le sait? Vous n'auriez pas eu besoin du formulaire si vous l'étiez");
				return false;
				}
			if (Email == "") {
				alert("Comment on gagne de l'argent en vous inscrivant à des liste de spam si vous ne renseignez pas d'adresse mail?");
				return false;
				}
			if (EmailConfirm == "") {
				alert("Il faut recopier l'adresse mail écrite juste au-dessus, Je suis sûr que vous en êtes capables");
				return false;
				}
			if (Password == "") {
				alert("Rentrez un mot de passe");
				return false;
				}
			if (PasswordConfirm == "") {
				alert("Recopiez votre mot de passe s'il vous plait");
				return false;
				}
			} 
			</script>
			
			<div id="register" class="animate form">
                <form name="signup" method="post" action="scriptInscription.php"  onsubmit="return validateForm()"autocomplete="on">  
						<p> 

                                    <label for="firstnamesignup" class="uname" data-icon="u" >Prénom</label>
									<br/>
                                    <input id="Prenom" name="Prenom" type="text" placeholder="Saisissez votre prénom" />
						</p>
						<p> 
                                    <label for="lastnamesignup" class="uname" data-icon="u" >Nom</label>
									<br/>
                                    <input id="Nom" name="Nom" type="text" placeholder="Saisissez votre nom" />
						</p>
						<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" >Email</label>
									<br/>

                                    <input id="Email" name="Email" type="text" placeholder="exemple@viacesi.fr" />
						</p>
						<p> 
                                    <label for="usernamesignupConfirm" class="uname" data-icon="u" >Confirmation de l'Email</label>
									<br/>

                                    <input id="EmailConfirm" name="EmailConfirm" type="text" placeholder="exemple@viacesi.fr" />
						</p>
                        
						<p> 

                                    <label for="passwordsignup" class="youpasswd" data-icon="p" >Mot de passe</label>
									<br/>

                                    <input id="Password" name="Password" type="password" placeholder="Saisissez votre mot de passe"/>
						</p>
						
						<p> 

                                    <label for="passwordsignupConfirm" class="youpasswd" data-icon="p" >Confirmation du mot de passe</label>
									<br/>

                                    <input id="PasswordConfirm" name="PasswordConfirm" type="password" placeholder="Confirmer votre mot de passe"/>
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
						
		</section>

	
		<?php include('footer.php'); ?>