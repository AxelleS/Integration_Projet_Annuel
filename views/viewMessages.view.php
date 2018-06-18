<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
    <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_title">
        <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Messages</h1>
    </div>
    <div class="row site-center">
        <article class="col-lg-10 offset-lg-1">
            <table class="bordered centered">
                <thead>
                <tr>
                    <th>Lu/Non lu</th>
                    <th>Date d'envoi</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Message</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach ($donnees as $donnee) : ?>
                    <?php
                        if ($donnee['is_read']) {
                            $envelope = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M.026 24l11.974-11.607 11.974 11.607h-23.948zm11.964-23.961l-11.99 8.725v12.476l7.352-7.127-5.653-4.113 10.291-7.488 10.309 7.488-5.655 4.108 7.356 7.132v-12.476l-12.01-8.725z"/></svg>';
                        } else {
                            $envelope = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/></svg>';
                        }
                        ?>
                        <tr>
                            <td><?php echo $envelope; ?></td>
                            <td><?php echo $donnee['date_send']; ?></td>
                            <td><?php echo $donnee['lastname']; ?></td>
                            <td><?php echo $donnee['firstname']; ?></td>
                            <td><?php echo $donnee['email']; ?>
                            <td><?php echo $donnee['phone']; ?></td>
                            <td><?php echo $donnee['subject']; ?></td>
                            <td><?php echo $donnee['content']; ?></td>
                            <td><input type="button" value="Voir" class="btn-default" onclick="location.href='<?php echo Route::getSlug("contact", "openMessage")."/".$donnee["id"]; ?>'"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>
    </div>
</section>