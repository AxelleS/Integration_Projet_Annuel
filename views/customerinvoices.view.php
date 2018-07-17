<main class="container-fluid">
    <section class="row promotion">
        <article class="col-lg-6 col-sm-12 col-xs-12 title-fact">
            <h1>Mes Factures</h1>
        </article>
        <article class="content-fact col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="centered striped responsive-table">
                <thead>
                    <tr>
                        <th>Date de facture</th>
                        <th>Date de la partie</th>
                        <th>Salle choisie</th>
                        <th>Nombre de participants</th>
                        <th>Prix payé</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Découpe le tableau 2 dimensions en tableau 1 dimension -->
                <?php foreach ($donnees as $key=>$value): ?>
                    <tr>
                        <td>
                            <!-- Date de réservation -->
                            <?php echo $value['date_bill']; ?>
                        </td>
                        <td>
                                <!-- Date de la partie -->
                            <?php echo $value['date_calendar']; ?>
                        </td>
                        <td>
                            <!-- Nom de la salle -->
                            <?php echo $value['name_room']; ?>
                        </td>
                        <td>
                            <!-- Nb joueurs -->
                            <?php echo $value['number_player']; ?> personnes
                        </td>
                        <td>
                            <!-- Nb joueurs -->
                            <?php echo $value['total_price'] + ($value['total_price'] * 0.20); ?>€
                        </td>
                        <td>
                            <a type="button" class="btn-default" href=<?php echo DIRNAME.Route::getSlug('myinvoice', 'index').'/'.$value['id'];?> target="_blank">Afficher</a>
                        </td>                    
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </article>
        <div class="col_3"></div>
    </section>
</main>