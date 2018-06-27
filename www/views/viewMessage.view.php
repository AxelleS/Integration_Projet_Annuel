<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
    <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_title">
        <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Message</h1>
    </div>
    <div class="row site-center">
        <article class="row col-lg-12 offset-lg-1">
            <fieldset class="info-contact">
                <legend>Informations</legend>
                <div class="row">
                    <label>ID : </label>
                </div>
                <div class="row">
                    <?php echo $donnees['id']; ?>
                </div>
                <div class="row">
                    <label>Date d'envoi : </label>
                </div>
                <div class="row">
                    <?php echo $donnees['date_send']; ?>
                </div>
            </fieldset>
            <fieldset class="expediteur-contact">
                <legend>Expéditeur</legend>
                <div class="row">
                    <label>Nom : </label>
                </div>
                <div class="row">
                    <?php echo $donnees['lastname']; ?>
                </div>
                <div class="row">
                    <label>Prénom : </label>
                </div>
                <div class="row">
                    <?php echo $donnees['firstname']; ?>
                </div>
                <div class="row">
                    <label>Téléphone :</label>
                </div>
                <div class="row">
                    <?php echo $donnees['phone']; ?>
                </div>
                <div class="row">
                    <label>Email :</label>
                </div>
                <div class="row">
                    <a href="mailto:<?php echo $donnees['email']; ?>"><?php echo $donnees['email']; ?></a>
                </div>
            </fieldset>
        </article>
        <article class="row col-lg-12 offset-lg-1">
            <fieldset class="message-contact">
                <legend>Message</legend>
                <div class="row">
                    <label>Objet :</label>
                </div>
                <div class="row">
                    <?php echo $donnees['subject']; ?>
                </div>
                <div class="row">
                    <label>Message :</label>
                </div>
                <div class="row">
                    <textarea readonly><?php echo $donnees['content']; ?></textarea>
                </div>
            </fieldset>
        </article>
        <article class="row col-lg-13 offset-lg-1">
            <input type="button" class="btn-default" value="Retour aux messages" onclick="location.href='<?php echo DIRNAME.Route::getSlug("contact", "viewAll"); ?>'">
        </article>
    </div>
</section>