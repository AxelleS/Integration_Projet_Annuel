<main class="container">
    <section class="row signin">
        <article class="col-lg-12 signin-form">
            <h1>Connexion</h1>
            <?php $this->addModal("form", $config); ?>
        </article>
        <article class="col-lg-12">
            <a href="<?php echo DIRNAME.Route::getSlug('signup','index'); ?>">Pas de compte ? Vous inscrire içi !</a>
        </article>
    </section>
</main>