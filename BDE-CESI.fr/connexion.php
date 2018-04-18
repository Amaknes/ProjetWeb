<?php session_start(); ?>
		<?php include('header.php'); ?>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
	
        <content id="Connexion">
			<div id="banniere">	
				<h2>Connexion</h2>
			</div>
            <section class="sectionconnexion">
				
                    <div id="login" class="animateform">
                        <form method="post" action="scriptConnexion.php" autocomplete="on">
                           
                                <p> 
                                    <label for="Email" class="uname"> Email</label>
									<br/>
                                    <input id="Email" name="Email" required="required" type="text" placeholder="exemple@viacesi.fr"/>
                                </p>
                                <p> 
                                    <label for="Password" class="youpasswd"> Mot de passe</label>
									<br/>
                                    <input id="Password" name="Password" required="required" type="password" placeholder="Saisissez votre mot de passe" /> 
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
                
            </section>

        </content>

	
		<?php include('footer.php'); ?>
	
