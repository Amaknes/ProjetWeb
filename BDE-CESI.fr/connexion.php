<!DOCTYPE HTML>

<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
<html>
<?php session_start(); ?>
		<?php include('header.php'); ?>
	
	
    <body>
        <div id="connexion">
			<div id="banniere">	
				<h2>Connexion</h2>
			</div>
            <section>
				
                    <div id="login" class="animate form">
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
                                    <button id="loginbutton" type="submit">Se connecter</button> 
                                </p>
                                <p class="change_link">
                                    Pas encore inscrit ?
                                    <a href="inscription.php">Inscription</a>
                                </p>
                        </form>
                    </div>                       
                
            </section>

        </div>
    </div>

    </body>
	
		<?php include('footer.php'); ?>
	
</html>