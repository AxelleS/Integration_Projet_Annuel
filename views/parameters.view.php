<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
	<div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_content_resize organization_title">
	    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
	    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Modification des paramètres</h1>
	</div>


	<div class="row">
		<div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">
			<form action="<?php echo DIRNAME.Route::getSlug('parameters','save');?>" class="row" method="POST">
				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">URL facebook</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="text" name="url_facebook" value="<?= $donnees['url_facebook']?>" />

				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">URL twitter</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="text" name="url_twitter" value="<?= $donnees['url_twitter']?>" />

				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">URL youtube</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="text" name="url_youtube" value="<?= $donnees['url_youtube']?>" />

				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Mention légale</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="file" name="url_legal_mention" value="<?= $donnees['url_legal_mention']?>" />

				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">CGV</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="file" name="CGV" value="<?= $donnees['url_CGV']?>" />

				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">CGU</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="file" name="CGU" value="<?= $donnees['url_CGU']?>" />

				<p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Prix par personne</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="number" name="unit_price" value="<?= $donnees['unit_price']?>" />

				<a href="/projet/voir-les-pages-site" class="col-lg-2 offset-lg-3 col-md-2 offset-md-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2"><button class="col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage resize-cancel-button">Retour</button></a>
				<input class="col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage" type="submit" value="sauvegarder"></p>
			</form>
		</div>

		</div>
	</div>
</section>