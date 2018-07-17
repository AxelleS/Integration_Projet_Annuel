<main class="container">
    <section class="row resa-next">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row info-resa-next">
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p id="libel">Date : </p>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p><?php echo $calendarDetails['date_calendar']; ?></p>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p id="libel">Créneau : </p>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p><?php echo $slotDetails['time_slot']; ?></p>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p id="libel">Mission : </p>
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <p><?php echo $roomDetails['name']; ?></p>
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <p id="libel">Nombre de joueurs : </p>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <select name="nbjoueurs" id="nbjoueurs" onchange="addPlayer()">
                    <?php for($i = 2; $i<$roomDetails['capacity']+1; $i++) : ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </article>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <p id="libel">Nom</p>
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <p id="libel">Prénom</p>
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <p id="libel">Email</p>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <p id="libel">Surprise ?</p>
            </article>
        </div>
        <div id="player_1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p id="libel">Joueur n°1</p>
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="text" name="nom_1" id="nom_1">
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="text" name="prenom_1" id="prenom_1">
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="text" name="email_1" id="email_1">
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="checkbox" name="surprise_1" id="surprise_1">
            </article>
            <input type="hidden" name="info_player_1" id="info_player_1" value="">
        </div>
        <div id="player_2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <p id="libel">Joueur n°2</p>
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="text" name="nom_2" id="nom_2">
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="text" name="prenom_2" id="prenom_2">
            </article>
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="text" name="email_2" id="email_2">
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1 offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">
                <input type="checkbox" name="surprise_2" id="surprise_2">
            </article>
            <input type="hidden" name="info_player_2" id="info_player_2" value="">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p>Merci de renseigner les informations des joueurs (vous y compris si vous participez).<br>Cochez la case “Surprise” pour que les joueurs ne recoivent pas d’informations.</p>
        </div>
    </section>

    <section class="row resa-next-price">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p>Prix HT : <?php echo $roomDetails['price']; ?> €</p>
            <p>TVA : 20%</p>
            <p>Prix TTC : <?php echo $roomDetails['price'] + ($roomDetails['price'] * 0.20); ?> €</p>
        </article>
    </section>
    <?php
        $url_cancel = 'http://'.$_SERVER['SERVER_NAME'].DIRNAME.Route::getSlug('reservation','index');
        $url_paid = 'http://'.$_SERVER['SERVER_NAME'].DIRNAME.Route::getSlug('reservationnext','save').'/'.$slotDetails['id'];
    ?>
    <section class="row resa-next-valid">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="formpaypal">
                <input type='hidden' value="<?php echo $roomDetails['price']; ?>" name="amount" />
                <input name="currency_code" type="hidden" value="EUR" />
                <input name="shipping" type="hidden" value="0.00" />
                <input name="tax" type="hidden" value="<?php echo $roomDetails['price'] * 0.20; ?>" />
                <input name="return" type="hidden" value="<?php echo $url_paid; ?>" />
                <input name="cancel_return" type="hidden" value="<?php echo $url_cancel; ?>" />
                <input name="cmd" type="hidden" value="_xclick" />
                <input name="business" type="hidden" value="admin.cms@test.fr" />
                <input name="item_name" type="hidden" value="Réservation d'une partie" />
                <input name="no_note" type="hidden" value="1" />
                <input name="lc" type="hidden" value="FR" />
                <input name="bn" type="hidden" value="PP-BuyNowBF" />
                <input name="custom" type="hidden" value="ID_ACHETEUR" />
                <input onclick="savePlayer(event)" alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
            </form>
        </article>
    </section>
    

</main>

<script>
    $(document).ready(function(){
        sessionStorage.setItem('old_nb_players', (2).toString());
    });

    function addPlayer(){
        var oldPlayers = parseInt(sessionStorage.getItem('old_nb_players'));
        for (var i=3; i<oldPlayers + 1; i++) {
            $('#player_'+(i)).remove();
        }

        var nbPlayers = parseInt($('#nbjoueurs option:selected').val());
        for (var i=3; i<nbPlayers + 1; i++) {
            $('#player_'+(i-1)).after(
                '<div id="player_'+i+'" class="col-lg-12 row">'+
                    '<article class="col-lg-1">'+
                        '<p id="libel">Joueur n°'+i+'</p>'+
                    '</article>'+
                    '<article class="col-lg-2 offset-lg-1">'+
                        '<input type="text" name="nom_'+i+'" id="nom_'+i+'">'+
                    '</article>'+
                    '<article class="col-lg-2 offset-lg-1">'+
                        '<input type="text" name="prenom_'+i+'" id="prenom_'+i+'">'+
                    '</article>'+
                    '<article class="col-lg-2 offset-lg-1">'+
                        '<input type="text" name="email_'+i+'" id="email_'+i+'">'+
                    '</article>'+
                    '<article class="col-lg-1 offset-lg-1">'+
                        '<input type="checkbox" name="surprise_'+i+'" id="surprise_'+i+'">'+
                    '</article>'+
                    '<input type="hidden" name="info_player_'+i+'" id="info_player_'+i+'" value="">'+
                '</div>'
            );
        }
        sessionStorage.setItem('old_nb_players', (nbPlayers).toString());
    }

    function savePlayer(event) {
        event.preventDefault();
        var players = '';
        var nbPlayers = parseInt(sessionStorage.getItem('old_nb_players'));
        for (var i=1; i<nbPlayers + 1; i++) {
            if ($('#surprise_'+i).is(":checked")) {
                var surprise = 1;
            } else {
                var surprise = 0;
            }
            players = players + $('#nom_'+i).val()+'/'+ $('#prenom_'+i).val()+'/'+ $('#email_'+i).val()+'/'+ surprise + '&';
        }

        $.ajax({
            url: '<?php echo DIRNAME . Route::getSlug('reservationnext', 'savePlayers'); ?>',
            type: 'GET',
            data: {
                players: players,
                timeslot: "<?php echo $slotDetails['id']; ?>"
            },
            success: function (data) {
                $('#formpaypal').submit();
            }

        });

        //
    }
</script>