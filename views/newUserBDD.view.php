<main class="container">
    <section class="row signin">
        <article class="col-lg-12 signin-form">
            <h1>Paramètres pour l'installeur</h1>
            <form action="<?php echo DIRNAME.Route::getSlug('index', 'install'); ?>" class="row" method="post">
                <p class="errors"><?php echo isset($errors) ? $errors : '' ; ?></p>
                <p class="">URL de la BDD</p>
                <input class="" type="text" name="pathBDD" value="">
                <p class="">Port de la BDD</p>
                <input class="" type="number" name="portBDD" value="">
                <p class="">Utilisateur de la BDD</p>
                <input class="" type="text" name="userBDD" value="">
                <p class="">Mot de passe de la BDD</p>
                <input class="" type="password" name="pwdBDD" value="">
                <input class="" type="submit" value="Valider">
            </form>
        </article>
    </section>
</main>