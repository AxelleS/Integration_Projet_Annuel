<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
    <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_title">
        <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Message de <?php echo $donnees['lastname']." ".$donnees['firstname']; ?></h1>
    </div>
    <div class="row site-center">
        <article class="row col-lg-10 offset-lg-1">
            <fieldset>
                <legend>Expéditeur</legend>
                <label for="lastname">Nom :</label>
                <?php echo $donnees['lastname']; ?>
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" value="" readonly>
            </fieldset>
        </article>
        <article class="row col-lg-10 offset-lg-1">
            <fieldset>
                <legend>Expéditeur</legend>
                <label for="lastname">Nom :</label>
                <?php echo $donnees['lastname']; ?>
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" value="" readonly>
            </fieldset>
        </article>
    </div>
</section>