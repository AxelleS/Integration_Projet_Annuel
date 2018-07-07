<main class="container">
    <section class="row customer-pwd">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 customer-pwd-form">
            <h1>Modification du mot de passe</h1>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <form enctype ="multipart/form-data" action="<?php echo DIRNAME.Route::getSlug('users','changePasswordFO');?>" class="row" method="POST">
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

                        <input class="col-lg-2 offset-lg-7 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 btn-default" type="submit" value="sauvegarder"></p>
                    </form>
                </div>
            </div>
        </article>
        <div class="col_3"></div>
    </section>
</main>