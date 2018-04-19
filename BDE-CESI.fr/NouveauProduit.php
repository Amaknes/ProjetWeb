<?php session_start(); ?>
		<?php include('header.php');?>
<!--####################################
 Auteur : Groupe 3 (Moyon Matthis, Pasquet Vincent, Chéraud Florentin, Amaury Vincent)
 Date : 2018
 Contexte : Projet WEB Exia CESI Saint-Nazaire
 #######################################-->
 
		<section id="NouveauProduit">
			<div id="banniere">	
				<h2>Ajouter un nouveau produit</h2>
			</div>
			
			
			<div id="FormNewProduit" class="NouveauProduitform form">
                <form  method="post" action="scriptNouveauProduit.php" autocomplete="on">  
						<p> 

                                    <label for="Name" class="uname" data-icon="u" >Produit</label>
									<br/>
                                    <input id="Name" name="Name" required="required" type="text" placeholder="Saisissez le nom du produit" />
						</p>

						<p> 
                                    <label for="Category" class="uname" data-icon="u" >Categorie</label>
									<br/>
							<select id="Category" name="Category" required="required" type="text" placeholder="Categorie" size="1">
								<option>Vêtements</option>
								<option>Alimentaire</option>
								<option>Accessoires</option>
								<option>Voiture</option>
							</select>
						</p>
						<p> 
                                    <label for="Price" class="uname" data-icon="u" >Prix</label>
									<br/>

                                    <input id="Price" name="Price" required="required" type="text" placeholder="Prix						       €" />
						</p>
						<p> 
                                    <label for="UrlImage" class="uname" data-icon="u" >Image du produit</label>
									<br/>

                                    <input id="UrlImage" name="UrlImage" required="required" type="text" placeholder="url de l'image" />
						</p>
                                
						<p> 
                            <button class="BoutonAjoutProduit" id="BoutonAjoutProduit" type="submit">Ajouter</button> 
						</p>
                </form>
            </div>
						
		</section>

	
		<?php include('footer.php'); ?>