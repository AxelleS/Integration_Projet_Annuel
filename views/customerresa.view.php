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
                                <?php echo $value['value_time_slot']; ?>
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
                            <?php
                                //Si la date de la partie est passée, on affiche un btn pour noter
                                if($value['date_now'] > $value['date_game']){
                                    if($value['opinion'] == null){
                                        echo '<input type="button" class="btn-default" value="Noter" onClick="window.location.href=\''.DIRNAME.'customeropinion/index/'.$value['id'].'\'">';
                                        
                                    } else{
                                        echo '<p>Partie déjà noté</p>';
                                    }
                                    
                                } 
                                //Sinon, si il reste plus de 7 jours avant l'escape, on affiche un btn annuler 
                                elseif($value['interval'] >= 7){
                                    echo '<input type="button" class="btn-default" value="Annuler" onClick=if(window.confirm("Etes-vous sûr de vouloir annuler la partie ?")){window.location.href=\''.DIRNAME.'customerresa/cancel/'.$value['id'].'\';}>';
                                }
                            ?>
                            </td>                    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>      
    </section>
</main>