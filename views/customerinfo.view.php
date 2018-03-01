<main>
    <section class="row signin">
        <article class="col_16 signin-form">
            <h1>Mes informations</h1>
            <form action="" method="post" id="signin-form" name="signin-form" class="row">
                <section class="row">
                    <section class="col_5 offset_2">
                        <fieldset>
                            <legend>Personnel</legend>
                            <section class="row">
                                <article class="col_7">
                                    <label for="input-lastname">Votre nom :</label>
                                    <input type="text" name="input-lastname" id="input-lastname" value="<?php echo $donnees['lastname']; ?>">
                                </article>
                                <article class="col_7 offset_2">
                                    <label for="input-firstname">Votre prénom :</label>
                                    <input type="text" name="input-firstname" id="input-firstname" value="<?php echo $donnees['firstname']; ?>">
                                </article>
                            </section>
                            <section class="row">
                                <article class="col_3">
                                    <label for="input-years">Votre age :</label>
                                    <input type="number" name="input-years" id="input-years" value="<?php echo $donnees['years_old']; ?>">
                                </article>
                                <article class="col_7 offset_6">
                                    <label for="input-picture">Votre photo :</label>
                                    <p><i><?php echo $donnees['url_picture']; ?></i></p>
                                    <input type="file" name="input-picture" id="input-picture" accept=".png, .jpg, .jpeg">
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
                                        <input type="password" name="input-password" id="input-password">
                                    </article>
                                </section>
                                <section class="row">
                                    <article class="col_16">
                                        <label for="input-password_validate">Confirmation mot de passe :</label>
                                        <input type="password" name="input-password_validate" id="input-password_validate">
                                    </article>
                                </section>
                            </section>
                        </fieldset>
                    </section>
                </section>
                <section class="row">
                    <section class="col_5 offset_2">
                        <fieldset>
                            <legend>Contact</legend>
                            <section class="row">
                                <article class="col_7">
                                    <label for="input-email">Votre email : </label>
                                    <input type="text" name="input-email" id="input-email" value="<?php echo $donnees['email']; ?>">
                                </article>
                                <article class="col_8 offset_1">
                                    <label for="input-phone">Votre Téléphone :</label>
                                    <input type="text" name="input-phone" id="input-phone" value="<?php echo $donnees['phone']; ?>">
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
                                    <input type="text" name="input-place" id="input-place" value="<?php echo $donnees['address']; ?>">
                                </article>
                            </section>
                            <section>
                                <article class="row col_7">
                                    <label for="input-place2">Complément :</label>
                                    <input type="text" name="input-place2" id="input-place2" value="<?php echo $donnees['address_2']; ?>">
                                </article>
                            </section>
                            <section class="row">
                                <article class="col_3" >
                                    <label for="input-zipcode">Code postal :</label>
                                    <input type="text" name="input-zipcode" id="input-zipcode" value="<?php echo $donnees['zipcode']; ?>">
                                </article>
                                <article class="col_11 offset_2">
                                    <label for="input-city">Ville :</label>
                                    <input type="text" name="input-city" id="input-city" value="<?php echo $donnees['city']; ?>">
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