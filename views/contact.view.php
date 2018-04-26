<main>
    <section class="row contact">
        <article class="col-lg-3 offset-lg-3 contact-picture">
            <img src="img//letter.jpg" alt="Illustration picture of Contact Us">
        </article>
        <article class="col-lg-4 offset-lg-1 contact-form">
            <h1>Contactez-nous</h1>
            <form action="" method="post" id="contact-form" name="contact-form">
                <div class="row">
                    <article class="col-lg-5">
                        <label for="input-lastname">Votre nom</label>
                        <input type="text" name="input-lastname" id="input-lastname" placeholder="Nom">
                    </article>
                    <article class="col-lg-5 offset-lg-1">
                        <label for="input-firstname">Votre prénom</label>
                        <input type="text" name="input-firstname" id="input-firstname" placeholder="Prénom">
                    </article>
                </div>
                <div class="row">
                    <article class="col-lg-5">
                        <label for="input-email">Votre email</label>
                        <input type="text" name="input-email" id="input-email" placeholder="email@exemple.com">
                    </article>
                    <article class="col-lg-5 offset-lg-1">
                        <label for="input-phone">Votre téléphone</label>
                        <input type="text" name="input-phone" id="input-phone" placeholder="0000000000">
                    </article>
                </div>
                <div class="row">
                    <article class="col-lg-12">
                        <label for="input-object">Objet de votre demande</label>
                        <input type="text" name="input-object" id="input-object" placeholder="Exemple de demande">
                    </article>
                </div>
                <div class="row">
                    <article class="col-lg-12">
                        <label for="textarea-message">Votre message</label>
                        <textarea name="textarea-message" id="textarea-message" rows="10" placeholder="Je vous contacte pour vous demander..."></textarea>
                    </article>
                </div>
                <div class="row button">
                    <article class="col-lg-6">
                        <input class="btn-default" type="submit" form="contact-form" value="Envoyer">
                    </article>
                </div>
            </form>
        </article>
    </section>
</main>