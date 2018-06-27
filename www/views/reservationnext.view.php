<main>
    <section class="row resa-next">
        <div class="col_8 offset_4 row">
            <article class="col_2">
                <p id="libel">Date : </p>
            </article>
            <article class="col_2">
                <p>24/01/2018</p>
            </article>
            <article class="col_2">
                <p id="libel">Créneau : </p>
            </article>
            <article class="col_2">
                <p>14h00-15h30</p>
            </article>
            <article class="col_2">
                <p id="libel">Mission : </p>
            </article>
            <article class="col_2">
                <p>Escape the Library</p>
            </article>
            <article class="col_3">
                <p id="libel">Nombre de joueurs : </p>
            </article>
            <article class="col_1">
                <select name="nbjoueurs" id="nbjoueurs">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </article>
        </div>
        <div class="col_8 offset_4 row">
            <article class="col_3 offset_2">
                <p id="libel">Nom</p>
            </article>
            <article class="col_3 offset_1">
                <p id="libel">Prénom</p>
            </article>
            <article class="col_3 offset_1">
                <p id="libel">Email</p>
            </article>
            <article class="col_2 offset_1">
                <p id="libel">Surprise ?</p>
            </article>
        </div>
        <div class="col_8 offset_4 row">
            <article class="col_2">
                <p id="libel">Joueur n°1</p>
            </article>
            <article class="col_3">
                <input type="text" name="nom" id="nom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="prenom" id="prenom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="email" id="email">
            </article>
            <article class="col_2 offset_1">
                <input type="checkbox" name="surprise" id="surprise">
            </article>
        </div>
        <div class="col_8 offset_4 row">
            <article class="col_2">
                <p id="libel">Joueur n°2</p>
            </article>
            <article class="col_3">
                <input type="text" name="nom" id="nom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="prenom" id="prenom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="email" id="email">
            </article>
            <article class="col_2 offset_1">
                <input type="checkbox" name="surprise" id="surprise">
            </article>
        </div>
        <div class="col_8 offset_4 player_3 row">
            <article class="col_2">
                <p id="libel">Joueur n°3</p>
            </article>
            <article class="col_3">
                <input type="text" name="nom" id="nom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="prenom" id="prenom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="email" id="email">
            </article>
            <article class="col_2 offset_1">
                <input type="checkbox" name="surprise" id="surprise">
            </article>
        </div>
        <div class="col_8 offset_4 player_4 row">
            <article class="col_2">
                <p id="libel">Joueur n°4</p>
            </article>
            <article class="col_3">
                <input type="text" name="nom" id="nom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="prenom" id="prenom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="email" id="email">
            </article>
            <article class="col_2 offset_1">
                <input type="checkbox" name="surprise" id="surprise">
            </article>
        </div>
        <div class="col_8 offset_4 player_5 row">
            <article class="col_2">
                <p id="libel">Joueur n°5</p>
            </article>
            <article class="col_3">
                <input type="text" name="nom" id="nom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="prenom" id="prenom">
            </article>
            <article class="col_3 offset_1">
                <input type="text" name="email" id="email">
            </article>
            <article class="col_2 offset_1">
                <input type="checkbox" name="surprise" id="surprise">
            </article>
        </div>
        <div class="col_8 offset_4">
            <p>Merci de renseigner les informations des joueurs (vous y compris si vous participez).<br>Cochez la case “Surprise” pour que les joueurs ne recoivent pas d’informations.</p>
        </div>
    </section>

    <section class="row resa-next-price">
        <article class="col_2 offset_4">
            <p>Prix Total : 60.00€</p>
        </article>
    </section>

    <section class="row resa-next-valid">
        <article class="col_1 offset_11">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="FGGUDKR2LR9MY">
            <input type="image" src="https://www.sandbox.paypal.com/fr_FR/FR/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
            </form>
        </article>
    </section>
    

</main>

<script>
    $(document).ready(function(){
        $('#nbjoueurs').change(function(){
            if($('#nbjoueurs').val() == '2'){
                $('.player_3, .player_4, .player_5').css('display','none');
                $('.resa-next-price article p').html('Prix Total : 60.00€');
            }
            if($('#nbjoueurs').val() == '3'){
                $('.player_3').css('display','flex');
                $('.player_4, .player_5').css('display','none');
                $('.resa-next-price article p').html('Prix Total : 90.00€');
            }
            if($('#nbjoueurs').val() == '4'){
                $('.player_3, .player_4').css('display','flex');
                $('.player_5').css('display','none');
                $('.resa-next-price article p').html('Prix Total : 120.00€');
            }
            if($('#nbjoueurs').val() == '5'){
                $('.player_3, .player_4, .player_5').css('display','flex');
                $('.resa-next-price article p').html('Prix Total : 150.00€');
            }
        });
    });
</script>