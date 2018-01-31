<?php include('header.php'); ?>

<main>
    <section class="row contact">
        <div class="col_2"></div>
        <article class="col_3 contact-picture">
            <img src="img/letter.jpg" alt="Illustration picture of Contact Us">
        </article>
        <div class="col_1"></div>
        <article class="col_4 contact-form">
            <h1>Contactez-nous</h1>
            <form action="" method="post" id="contact-form" name="contact-form">
                <section class="row title">
                    <article class="col_7">
                        <label for="input-lastname">Votre nom</label>
                    </article>
                    <div class="col_2"></div>
                    <article class="col_7">
                        <label for="input-firstname">Votre prénom</label>
                    </article>
                </section>
                <section class="row input">
                    <article class="col_7">
                        <input type="text" name="input-lastname" id="input-lastname">
                    </article>
                    <div class="col_2"></div>
                    <article class="col_7">
                        <input type="text" name="input-firstname" id="input-firstname">
                    </article>
                </section>
                <section class="row title">
                    <article class="col_8">
                        <label for="input-email">Votre email</label>
                    </article>
                    <div class="col_1"></div>
                    <article class="col_7">
                        <label for="input-phone">Votre téléphone</label>
                    </article>
                </section>
                <section class="row input">
                    <article class="col_8">
                        <input type="text" name="input-email" id="input-email">
                    </article>
                    <div class="col_1"></div>
                    <article class="col_7">
                        <input type="text" name="input-phone" id="input-phone">
                    </article>
                </section>
                <section class="row title">
                    <article class="col_16">
                        <label for="input-object">Objet de votre demande</label>
                    </article>
                </section>
                <section class="row input">
                    <article class="col_16">
                        <input type="text" name="input-object" id="input-object">
                    </article>
                </section>
                <section class="row title">
                    <article class="col_16">
                        <label for="textarea-message">Votre message</label>
                    </article>
                </section>
                <section class="row input">
                    <article class="col_16">
                        <textarea name="textarea-message" id="textarea-message" rows="10"></textarea>
                    </article>
                </section>
                <section class="row title">
                    <div class="col_14"></div>
                    <article class="col_2">
                        <input type="submit" form="contact-form" value="Envoyer">
                    </article>
                </section>
            </form>
        </article>
    </section>
</main>

<?php include('footer.php'); ?>

</html>