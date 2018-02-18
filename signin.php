<?php include 'header.php';?>

<main>
    <section class="row signin">
        <article class="col_3 signin-form">
            <h1>Connexion</h1>
            <form action="" method="post" id="signin-form" name="signin-form">
                <fieldset>
                    <legend>Identifiants</legend>
                    <section class="row title">
                        <article class="col_16">
                            <label for="input-email">Email</label>
                        </article>
                    </section>
                    <section class="row input">
                        <article class="col_16">
                            <input type="text" name="input-email" id="input-email">
                        </article>
                    </section>
                    <section class="row title">
                        <article class="col_16">
                            <label for="input-password">Mot de passe</label>
                        </article>
                    </section>
                    <section class="row input">
                        <article class="col_16">
                            <input type="text" name="input-phone" id="input-phone">
                        </article>
                    </section>
                </fieldset>
            </form>
            <section class="row">
                <article class="col_4">
                    <input class="btn-default" type="submit" form="signin-form" value="Envoyer">
                </article>
            </section>
        </article>
        <section class="row signup-via-signin">
            <article class="col_16">
                <a href="signup.php">Pas de compte ? Cliquez pour vous inscrire</a>
            </article>
        </section>
    </section>
</main>

<?php include 'footer.php';?>

</html>