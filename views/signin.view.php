<main>
    <section class="row signin">
        <article class="col-lg-3 col-sm-3 signin-form">
            <h1>Connexion</h1>
            <p><?php if(isset($donnees['error'])){echo $donnees['error']; } ?></p>
            <form action="<?php echo DIRNAME.Route::getSlug('signin','connect');?>" method="post" id="signin-form" name="signin-form">
                <fieldset>
                    <legend>Identifiants</legend>
                    <section class="row title">
                        <article class="col-lg-12 col-sm-12">
                            <label for="input-email">Email</label>
                        </article>
                    </section>
                    <section class="row input">
                        <article class="col-lg-12 col-sm-12">
                            <input type="text" name="input-email" id="input-email" value="<?php if(isset($donnees['email'])){echo $donnees['email']; } ?>">
                        </article>
                    </section>
                    <section class="row title">
                        <article class="col-lg-12 col-sm-12">
                            <label for="input-password">Mot de passe</label>
                        </article>
                    </section>
                    <section class="row input">
                        <article class="col-lg-12 col-sm-12">
                            <input type="password" name="input-password" id="input-password">
                        </article>
                    </section>
                </fieldset>
            </form>
            <section class="row btn-signin">
                <article class="col-lg-4 col-sm-6 col-xs-6 col-md-6">
                    <input class="btn-default" type="submit" form="signin-form" value="Envoyer">
                </article>
            </section>
        </article>
    </section>
    <section class="row signup-via-signin">
        <article class="col-lg-12 col-sm-12">
            <?php echo '<a href="' . DIRNAME.Route::getSlug('signup','index') . '">Pas de compte ? Cliquez pour vous inscrire</a>'; ?>
        </article>
    </section>
</main>