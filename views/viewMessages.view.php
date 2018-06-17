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
                    <th>ID</th>
                    <th>Date d'envoi</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Objet</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach ($donnees as $donnee) : ?>
                        <tr>
                            <td><?php echo $donnee['id']; ?></td>
                            <td><?php echo $donnee['date_send']; ?></td>
                            <td><?php echo $donnee['lastname']; ?></td>
                            <td><?php echo $donnee['firstname']; ?></td>
                            <td><?php echo $donnee['email']; ?>
                            <td><?php echo $donnee['phone']; ?></td>
                            <td><?php echo $donnee['subject']; ?></td>
                            <td><?php echo strlen($donnee['content'])>30 ? substr($donnee['content'], 0, 30).' [...]' : $donnee['content']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>
    </div>
</section>