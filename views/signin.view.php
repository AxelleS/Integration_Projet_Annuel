<main class="container">
    <section class="row signin">
        <article class="col-lg-12 signin-form">
            <h1>Connexion</h1>
            <?php $this->addModal("form", $config); ?>
        </article>
        <article class="signup-link col-lg-3">
            <a href="<?php echo DIRNAME.Route::getSlug('signin','lostpassword'); ?>">Mot de passe oublié</a>
        </article>
    </section>
    <section class="row">
        <article class="signup-link col-lg-3">
            <a href="<?php echo DIRNAME.Route::getSlug('signup','index'); ?>">Pas de compte ? Vous inscrire ici !</a>
        </article>
    </section>
</main>