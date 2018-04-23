<main>
    <section class="row signin">
        <article class="col-lg-3 col-sm-3 signin-form">
            <article class="title-connexion">
                <h1>Connexion</h1>                
            </article>
            <form action="" method="post" id="signin-form" name="signin-form">
                <fieldset>
                    <legend>Identifiants</legend>
                    <section class="row title">
                        <article class="col-lg-12 col-sm-12">
                            <label for="input-email">Email</label>
                        </article>
                    </section>
                    <section class="row input">
                        <article class="col-lg-12 col-sm-12">
                            <input type="text" name="input-email" id="input-email">
                        </article>
                    </section>
                    <section class="row title">
                        <article class="col-lg-12 col-sm-12">
                            <label for="input-password">Mot de passe</label>
                        </article>
                    </section>
                    <section class="row input">
                        <article class="col-lg-12 col-sm-12">
                            <input type="text" name="input-phone" id="input-phone">
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
            <?php echo '<a href="' . DIRNAME . 'signup">Pas de compte ? Cliquez pour vous inscrire</a>'; ?>
        </article>
    </section>
</main>