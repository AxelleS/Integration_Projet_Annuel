<main class="container">
    <section class="row signup">
        <article class="col-lg-12 signup-form">
            <h1>Inscription</h1>
            <form action="" method="post" id="signup-form" name="signup-form" class="row">
                <section class="row col-lg-12">
                    <section class="col-lg-4 offset-lg-1">
                        <fieldset>
                            <legend>Personnel</legend>
                            <section class="row">
                                <article class="col-lg-5">
                                    <label for="input-lastname">Votre nom :</label>
                                    <input type="text" name="input-lastname" id="input-lastname">
                                </article>
                                <article class="col-lg-5 offset-lg-1">
                                    <label for="input-firstname">Votre prénom :</label>
                                    <input type="text" name="input-firstname" id="input-firstname">
                                </article>
                            </section>
                            <section class="row">
                                <article class="col-lg-4">
                                    <label for="input-years">Votre âge :</label>
                                    <input type="text" name="input-years" id="input-years">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                    <section class="row col-lg-4 offset-lg-2">
                        <fieldset>
                            <legend>Mot de passe</legend>
                            <section>
                                <section class="row">
                                    <article class="col-lg-12">
                                        <label for="input-password">Mot de passe :</label>
                                        <input type="text" name="input-password" id="input-password">
                                    </article>
                                </section>
                                <section class="row">
                                    <article class="col-lg-12">
                                        <label for="input-password-validate">Confirmation mot de passe :</label>
                                        <input type="text" name="input-password-validate" id="input-password-validate">
                                    </article>
                                </section>
                            </section>
                        </fieldset>
                    </section>
                    <section class="row col-lg-4 offset-lg-7 validation-CGU">
                        <input type="checkbox" name="CGU-validate" id="CGU-validate" class="col-lg-1">
                        <p class="col-lg-9">J'accepte les <a href="<?php echo DIRNAME.'files/CGU.pdf';?>" target="_blank">Conditions Générales d'Utilisation</a></p>
                    </section>
                </section>
                <section class="row contact-section col-lg-12">
                    <section class="col-lg-4 offset-lg-1">
                        <fieldset>
                            <legend>Contact</legend>
                            <section class="row">
                                <article class="col-lg-5">
                                    <label for="input-email">Votre email : </label>
                                    <input type="password" name="input-email" id="input-email">
                                </article>
                                <article class="col-lg-5 offset-lg-1">
                                    <label for="input-phone">Votre Téléphone :</label>
                                    <input type="password" name="input-phone" id="input-phone">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row location-section col-lg-12">
                    <section class="col-lg-4 offset-lg-1">
                        <fieldset>
                            <legend>Location</legend>
                            <section class="row col-lg-">
                                <article class="row col-lg-12">
                                    <label for="input-place">Adresse : </label>
                                    <input type="text" name="input-address" id="input-address">
                                </article>
                            </section>
                            <section>
                                <article class="row col-lg-7">
                                    <label for="input-firstname">Complément :</label>
                                    <input type="text" name="input-complete" id="input-complete">
                                </article>
                            </section>
                            <section class="row">
                                <article class="col-lg-3" >
                                    <label for="input-firstname">Code postal :</label>
                                    <input type="text" name="input-zipcode" id="input-zipcode">
                                </article>
                                <article class="col-lg-5 offset-lg-2">
                                    <label for="input-firstname">Ville :</label>
                                    <input type="text" name="input-city" id="input-city">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row photo-section col-lg-12">
                    <section class="col-lg-4 offset-lg-1">
                        <fieldset>
                            <legend>Photo de profil</legend>
                            <section class="row">
                                <article class="row col-lg-12">
                                    <input type="file" name="input-photo" id="input-photo">
                                </article>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row col-lg-12">
                    <section class="row col-lg-3 offset-lg-4">
                        <article class="col-lg-4 title">
                            <button type="submit" form="signup-form" class="btn-default">Valider</button>
                        </article>
                    </section>
                </section>
            </form>
        </article>
    </section>
</main>