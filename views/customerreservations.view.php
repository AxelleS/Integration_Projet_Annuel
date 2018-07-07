<main class="container">
    <section class="row customer-resa">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>Mes réservations</h1>
            <table class="centered striped">
                <thead>
                    <tr>
                        <th>Date de réservations</th>
                        <th>Date de la partie</th>
                        <th>Créneau choisi</th>
                        <th>Salle choisie</th>
                        <th>Nombre de participants</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Découpe le tableau 2 dimensions en tableau 1 dimension -->
                    <?php foreach ($donnees as $key=>$value): ?>
                        <tr>
                            <td>
                                <!-- Date de réservation -->
                                <?php echo $value['date_booking']; ?>
                            </td>
                            <td>
                                 <!-- Date de la partie -->
                                <?php echo $value['date_calendar']; ?>
                            </td>
                            <td>
                                <!-- Créneau de la partie -->
                                <?php echo $value['time_slot']; ?>
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
                                <!-- Si la date de la partie est passée, on affiche un btn pour noter -->
                                <?php if($value['date_now'] > $value['date_game']): ?>
                                    <?php if($value['opinion'] == null): ?>
                                        <input type="button" class="btn-default" value="Noter" onClick="redirectTo('notation')">
                                    <?php else : ?>
                                        <p>Partie déjà noté</p>
                                    <?php endif; ?>
                                <!-- Sinon, si il reste plus de 7 jours avant l'escape, on affiche un btn annuler -->
                                <?php elseif($value['interval'] >= 7): ?>
                                    <input type="button" class="btn-default" value="Annuler" onClick="redirectTo('cancel')">
                                <?php endif; ?>
                            </td>                    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>      
    </section>
</main>

<script>
    function redirectTo($to) {
        if($to == 'notation') {
            window.location.href = '<?php echo DIRNAME.Route::getSlug('customeropinion', 'index').'/'.$value['id']; ?>';
        }
        if($to == 'cancel') {
            if(window.confirm('Etes-vous sûr de vouloir annuler la partie ?')) {
                window.location.href = '<?php echo DIRNAME.Route::getSlug('customerreservations', 'cancel').'/'.$value['id']; ?>';
            }
        }
    }
</script>