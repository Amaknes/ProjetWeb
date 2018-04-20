<?php session_start(); ?>
		<?php include('header.php'); ?>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
	
        <section id="Connexion">
			<div id="banniere">	
				<h2>Connexion</h2>
			</div>
            <div class="sectionconnexion">
			<script>
			function validateForm() {
			var Email = document.forms["login"]["Email"].value;
			var Password = document.forms["login"]["Password"].value;

			if (Email == "") {
				alert("Une adresse email est nécessaire pour vérifier qui vous êtes");
				return false;
				}
			if (Password == "") {
				alert("нет, vous ne passerez pas sans mot de passe");
				return false;
				}
			} 
		</script>
				
                    <div id="login" class="animateform">
                        <form name="login" method="post" action="scriptConnexion.php" onsubmit="return validateForm()" autocomplete="on">
                           
                                <p> 
                                    <label for="Email" class="uname"> Email</label>
									<br/>
                                    <input id="Email" name="Email"  type="text" placeholder="exemple@viacesi.fr"/>
                                </p>
                                <p> 
                                    <label for="Password" class="youpasswd"> Mot de passe</label>
									<br/>
                                    <input id="Password" name="Password"  type="password" placeholder="Saisissez votre mot de passe" /> 
                                </p>
                            
                                <p> 
                                    <button class="loginscrcon" id="loginbutton" type="submit">Se connecter</button> 
                                </p>
                                <p class="change_link">
                                    Pas encore inscrit ?
                                    <a href="inscription.php">Inscription</a>
                                </p>
                        </form>
                    </div>                       
                
            </div>

        </section>

	
		<?php include('footer.php'); ?>
	
