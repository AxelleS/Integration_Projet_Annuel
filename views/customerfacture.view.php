<main>
    <section class="row customer-fact">
        <article class="col_14 offset_1">
            <h1>Mes Factures</h1>
            <table class="centered striped">
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
                            <?php echo $value['total_price']; ?>€
                        </td>
                        <td>
                            <a href="Mafacture" target="_blank">Afficher</a>
                        </td>                    
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </article>
        <div class="col_3"></div>
    </section>
</main>