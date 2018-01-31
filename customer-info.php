<?php include 'header.php';?>

<main>
    <section class="row signin">
        <article class="col_16 signin-form">
            <h1>Mes informations</h1>
            <form action="" method="post" id="signin-form" name="signin-form" class="row">
                <section class="row">
                    <section class="col_5 offset_2"  >
                        <fieldset>
                            <legend>Personnel</legend>
                            <section class="row">
                                <article class="col_7">
                                    <label for="input-lastname">Votre nom :</label>
                                    <input type="text" name="input-lastname" id="input-lastname">
                                </article>
                                <article class="col_7 offset_2">
                                    <label for="input-firstname">Votre prénom :</label>
                                    <input type="text" name="input-firstname" id="input-firstname">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                    <section class="row col_7 offset_2">
                        <fieldset>
                            <legend>Mot de passe</legend>
                            <section>
                                <section class="row">
                                    <article class="col_16">
                                        <label for="input-password">Mot de passe :</label>
                                        <input type="text" name="input-password" id="input-password">
                                    </article>
                                </section>
                                <section class="row">
                                    <article class="col_16">
                                        <label for="input-password_validate">Confirmation mot de passe :</label>
                                        <input type="text" name="input-password_validate" id="input-password_validate">
                                    </article>
                                </section>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row">
                    <section class="col_5 offset_2">
                        <fieldset>
                            <legend>Contacte</legend>
                            <section class="row">
                                <article class="col_7">
                                    <label for="input-email">Votre email : </label>
                                    <input type="text" name="input-email" id="input-email">
                                </article>
                                <article class="col_8 offset_1">
                                    <label for="input-phone">Votre Téléphone :</label>
                                    <input type="number" name="input-phone" id="input-phone">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row location-section">
                    <section class="col_5 offset_2">
                        <fieldset>
                            <legend>Location</legend>
                            <section class="row">
                                <article class="row col_16">
                                    <label for="input-place">Adresse : </label>
                                    <input type="text" name="input-place" id="input-place">
                                </article>
                            </section>
                            <section>
                                <article class="row col_7">
                                    <label for="input-firstname">Complément :</label>
                                    <input type="text" name="input-firstname" id="input-firstname">
                                </article>
                            </section>
                            <section class="row">
                                <article class="col_3" >
                                    <label for="input-firstname">Code postal :</label>
                                    <input type="number" name="input-firstname" id="input-firstname">
                                </article>
                                <article class="col_11 offset_2">
                                    <label for="input-firstname">Ville :</label>
                                    <input type="text" name="input-firstname" id="input-firstname">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row">
                    <section class="row col_7 offset_5">
                        <article class="col_4 title">
                            <input type="submit" form="signin-form" value="Valider">
                        </article>
                    </section>
                </section>
            </form>
        </article>
    </section>
</main>

<?php include 'footer.php';?>

</html>