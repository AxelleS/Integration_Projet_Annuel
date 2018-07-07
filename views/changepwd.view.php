<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
	<div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_content_resize organization_title">
	    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
	    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Modification du mot de passe</h1>
	</div>


	<div class="row">
		<div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">
			<form enctype ="multipart/form-data" action="<?php echo DIRNAME.Route::getSlug('users','changePasswordBO');?>" class="row" method="POST">
                <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Mot de passe</p>
                <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="password" name="password" required/>
                <?php if(array_key_exists('password', $errors)) : ?>
                    <p class="errors"><?php echo $errors['password']; ?></p>
                <?php endif; ?>

                <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Confirmation mot de passe</p>
				<input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="password" name="passwordConf" required/>
                <?php if(array_key_exists('pwd_and_conf', $errors)) : ?>
                    <p class="errors"><?php echo $errors['pwd_and_conf']; ?></p>
                <?php endif; ?>

				<a href="<?php echo DIRNAME.Route::getSlug('users','index');?>" class="col-lg-2 offset-lg-3 col-md-2 offset-md-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2"><button class="col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage resize-cancel-button">Retour</button></a>
				<input class="col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage" type="submit" value="sauvegarder"></p>
			</form>
		</div>

		</div>
	</div>
</section>