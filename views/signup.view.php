<main>
    <section class="row signin signup">
        <article class="col_16 signin-form">
            <h1>Inscription</h1>
            <form action="" method="post" id="signup-form" name="signup-form" class="row">
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
                                        <label for="input-password-validate">Confirmation mot de passe :</label>
                                        <input type="text" name="input-password_-alidate" id="input-password-validate">
                                    </article>
                                </section>
                            </section>
                        </fieldset>
                    </section>
                    <section class="row col_5 offset_9 validation-CGU">
                        <input type="checkbox" name="CGU-validate" id="CGU-validate" class="col_1">
                        <p class="col_15">J'accepte les <a href="files/CGU.pdf" target="_blank">Conditions Générales d'Utilisation</a></p>
                    </section>
                </section>
                <section class="row contact-section">
                    <section class="col_5 offset_2">
                        <fieldset>
                            <legend>Contact</legend>
                            <section class="row">
                                <article class="col_7">
                                    <label for="input-email">Votre email : </label>
                                    <input type="text" name="input-email" id="input-email">
                                </article>
                                <article class="col_8 offset_1">
                                    <label for="input-phone">Votre Téléphone :</label>
                                    <input type="text" name="input-phone" id="input-phone">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row location-section-signup">
                    <section class="col_5 offset_2">
                        <fieldset>
                            <legend>Location</legend>
                            <section class="row">
                                <article class="row col_16">
                                    <label for="input-place">Adresse : </label>
                                    <input type="text" name="input-address" id="input-address">
                                </article>
                            </section>
                            <section>
                                <article class="row col_7">
                                    <label for="input-firstname">Complément :</label>
                                    <input type="text" name="input-complete" id="input-complete">
                                </article>
                            </section>
                            <section class="row">
                                <article class="col_5" >
                                    <label for="input-firstname">Code postal :</label>
                                    <input type="text" name="input-zipcode" id="input-zipcode">
                                </article>
                                <article class="col_9 offset_2">
                                    <label for="input-firstname">Ville :</label>
                                    <input type="text" name="input-city" id="input-city">
                                </article>
                            </section>
                        </fieldset>
                        <fieldset>
                            <legend>Photo de profil</legend>
                            <section class="row">
                                <article class="row col_16">
                                    <input type="file" name="input-photo" id="input-photo">
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