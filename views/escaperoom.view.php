<main class="container-fluid">
    <section class="promotion row">
        <article class="col-lg-6 col-sm-12 col-xs-12 title-room">
            <h1><?php echo $donnees['name']; ?></h1>
        </article>
        <article class="col-lg-9 col-sm-12 description-room">
            <p>
                <?php echo $donnees['description']; ?>
            </p>
        </article>
        <article class="col-lg-4 offset-lg-4 order">
            <img src="<?php echo DIRNAME; ?>img/order/chrono.png" alt="The timer is 60 minutes">
            
            <?php if($donnees['is_pregnant']) :?>
                <img src="<?php echo DIRNAME; ?>img/order/pregnant_ok.png" alt="The room is allowed to pregnant woman">
            <?php else :?>
                <img src="<?php echo DIRNAME; ?>img/order/pregnant_no.png" alt="The room is not allowed to pregnant woman">
            <?php endif; ?>

            <?php if($donnees['is_wheelchair']) :?>
                <img src="<?php echo DIRNAME; ?>img/order/wheelchair_ok.png" alt="The room is allowed to wheelchair persons">
            <?php else :?>
                <img src="<?php echo DIRNAME; ?>img/order/wheelchair_no.png" alt="The room is not allowed to wheelchair persons">
            <?php endif; ?>
            
            <?php if($donnees['is_deaf']) :?>
                <img src="<?php echo DIRNAME; ?>img/order/deaf_ok.png" alt="The room is allowed to deaf persons">
            <?php else :?>
                <img src="<?php echo DIRNAME; ?>img/order/deaf_no.png" alt="The room is not allowed to deaf persons">
            <?php endif; ?>

        </article>
        <aside class="col-lg-1 share offset-lg-1">
            <div class="fb-share-button" data-href="https://play-with-my-cms.ovh/" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fplay-with-my-cms.ovh%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
        </aside>
    </section>

    <section class="booking">
        <article class="row">
            <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>Réserver la salle</h2>
            </article>
        </article>

        <article class="row">
            <article class="col-lg-6 offset-lg-3">
                <hr>
            </article>
        </article>

        <article class="row">
            <article class="calendar col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-lg-2">
                <table>
                    <thead>
                    <tr>
                        <th colspan="7" id="thead_title"></th>
                    </tr>
                    <tr id="thead_days"></tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </article>
            <article class="col-lg-1 col-md-1 col-sm-1 col-xs-1 offset-lg-1 slots-text">
                <p>Choix créneau :</p>
            </article>
            <article class="slots">
                <select class="creneaux" onchange="saveChoices()"></select>
                <form action="<?php echo DIRNAME.Route::getSlug('reservationnext','index'); ?>" method="post">
                    <input type="hidden" id="slotChoose" name="slotChoose" value="">
                    <input type="submit" class="btn-default validate-button" value="Valider">
                </form>
            </article>
        </article>
    </section>
    <section class="booking-legend row">
        <article class="row legend col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <p>Légende</p>
            <div class="legend_plein">Plus de créneaux disponibles</div>
            <div class="legend_semiplein">Entre 1 et 3 créneaux disponibles</div>
            <div class="legend_vide">Entre 4 et 7 créneaux disponibles</div>
        </article>
    </section>

    <section class="pictures row">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Photos et vidéo</h2>
        </article>
        <article class="col_6 offset_5">
            <hr>
        </article>
        <article class="video-promotion col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $donnees_video; ?>
        </article>
        <article class="col-lg-8 col-md-6 col-sm-6 col-xs-6 picture-promotion row">
            <?php if(isset($donnees['picture_1'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo DIRNAME.$donnees['picture_1']; ?>" target="_blank"><img src="<?php echo DIRNAME.$donnees['picture_1']; ?>" alt=""></a>
            <?php endif; ?>
            <?php if(isset($donnees['picture_2'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo DIRNAME.$donnees['picture_2']; ?>" target="_blank"><img src="<?php echo DIRNAME.$donnees['picture_2']; ?>" alt=""></a>
            <?php endif; ?>
        </article>
        <article class="col-lg-8 col-md-6 col-sm-6 col-xs-6 picture-promotion row">
            <?php if(isset($donnees['picture_3'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo DIRNAME.$donnees['picture_3']; ?>" target="_blank"><img src="<?php echo DIRNAME.$donnees['picture_3']; ?>" alt=""></a>
            <?php endif; ?>
            <?php if(isset($donnees['picture_4'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo DIRNAME.$donnees['picture_4']; ?>" target="_blank"><img src="<?php echo DIRNAME.$donnees['picture_4']; ?>" alt=""></a>
            <?php endif; ?>
        </article>
    </section>

    <section class="row opinion">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Les avis</h2>
        </article>
        <article class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <hr>
        </article>
        <?php 
            if(count($donnees['opinions']) < 3){
                $compteur = 0;
            } else {
                $compteur = count($donnees['opinions']) - 3;
            }
        ?>
        <?php if(count($donnees['opinions']) > 0 ) : ?>
        <?php for($i= $compteur; $i<count($donnees['opinions']);$i++) : ?>
            <article class="col-lg-12 opinion-people">     
                <p id="opinion-date"><?php echo $donnees['opinions'][$i]['date']?></p>
                <p id="opinion-name"><?php echo $donnees['opinions'][$i]['name']?></p>
                <p id="opinion-score">Note <?php echo $donnees['opinions'][$i]['score']?>/5</p>
            </article>
        <?php endfor; ?>
        <?php else : ?>
            <article class="col-lg-12 opinion-people">     
                <p>Aucun avis pour le moment</p>
            </article>
        <?php endif; ?>
    </section>
</main>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    var ladate = new Date();
    var tab_days = new Array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
    var tab_months = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

    $(document).ready(function(){
        sessionStorage.setItem('month', (ladate.getMonth()).toString());
        sessionStorage.setItem('year', (ladate.getFullYear()).toString());

        var thead_days = document.getElementById('thead_days');
        for(var i=0; i<7;i++){
            thead_days.insertCell().outerHTML = "<th>"+tab_days[i]+"</th>";
        }

        generateCalendar();
    });

    function generateCalendar(){
        var month = sessionStorage.getItem('month');
        var year = sessionStorage.getItem('year');
        var thead_title = '';

        $('#tbody').html('');

        $.ajax({
            url : '<?php echo DIRNAME.Route::getSlug('escaperoom','ajaxCalendar'); ?>',
            type : 'GET',
            data : {
                month: sessionStorage.getItem('month'),
                year: sessionStorage.getItem('year'),
                room : <?php echo $donnees['id']; ?>
            },
            complete : function(data){
                var timeSlots = JSON.parse(data['responseText']);
                if(month > ladate.getMonth()){
                    thead_title = '<img class="arrow" src="<?php echo DIRNAME; ?>img/arrow_left.svg" onclick="removeMonth()">';
                } else {
                    if (year > ladate.getFullYear()) {
                        thead_title = '<img class="arrow" src="<?php echo DIRNAME; ?>img/arrow_left.svg" onclick="removeMonth()">';
                    }
                }

                thead_title = thead_title + ' ' +tab_months[month] + ' ' + year + ' ' + '<img class="arrow" src="<?php echo DIRNAME; ?>img/arrow_right.svg" onclick="addMonth()">';
                $('#thead_title').html(thead_title);
                var firstDay = (new Date(year, month, 1)).getDay();
                var row = document.getElementById('tbody');
                var newLigne = row.insertRow();
                newLigne.className = "content";
                if(firstDay == 0){
                    firstDay = 7;
                }
                if (firstDay > 0) {
                    for (var n=0;n<firstDay-1;n++){
                        newLigne.insertCell();
                    }
                }
                for(var n =1;n<getNbDays(month,year)+1;n++){
                    //console.log(Object.keys(timeSlots[n]).length);
                    if(firstDay > 7){
                        firstDay = 1;
                        newLigne = row.insertRow();
                        newLigne.className = "content";
                    }
                    var cell = newLigne.insertCell();

                    var now = new Date();

                    var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());

                    var dateToCompare = new Date(year, month, n);

                    if(dateToCompare < today) {
                        cell.className = 'plein';
                        cell.innerHTML = n;
                    } else {
                        if(Object.keys(timeSlots[n]).length > 3) {
                            cell.className = 'vide';
                        } else {
                            if(Object.keys(timeSlots[n]).length > 1) {
                                cell.className = 'semiplein';
                            } else {
                                cell.className = 'plein';
                            }
                        }
                        if(Object.keys(timeSlots[n]).length > 1) {

                            var timeSlotsTemp = JSON.stringify(timeSlots[n]);

                            var monthTemp = parseInt(month) + 1;

                            if (month < 10) {
                                monthTemp = '0' + monthTemp;
                            }

                            if (n < 10) {
                                theDate = year + '-' + '0' + monthTemp + '-' + '0' + n;
                            } else {
                                theDate = year + '-' + monthTemp + '-' + n;
                            }

                            cell.innerHTML = "<input id='"+n+"' type='button' value='"+n+"' name='"+n+"' onclick='loadSelector("+n+","+timeSlotsTemp+")'>"
                        } else {
                            cell.innerHTML = n;
                        }
                    }
                    firstDay = firstDay + 1;
                }
            }
        });
    }
               
    function saveChoices() {
        $('#slotChoose').attr('value',  $('.creneaux option:selected').val());
    }

    function loadSelector(theDate, timeSlots) {
        $('.vide input').css('background-color','green');
        $('.semiplein input').css('background-color','orange');
        $('input').css('color','black');

        $('#'+ theDate +'').css('background-color','#338FF9');
        $('#'+ theDate +'').css('color','white');

        $('.creneaux').empty();

        //Met un option vide par défaut
        $('.creneaux').append('<option value=""></option>');
        //Remplit le select
        $.each(timeSlots, function(key, value) {
            $('.creneaux').append('<option value="'+key+'">'+value+'</option>');
        });

        $('article.slots-text').css('display') == 'none' ? $('.slots-text').css('display','block') : null;
        $('.creneaux').css('display') == 'none' ? $('.creneaux').css('display','block') : null;
        $('.slots input').css('display') == 'none' ? $('.slots input').css('display','block') : null;
    }

    function getNbDays(month, year){
        if(month == 1){
            if(year % 4 == 0) {
                return 29;
            } else {
                return 28;
            }
        } else {
            if(month < 7){
                if(month % 2 == 0){
                    return 31;
                } else {
                    return 30;
                }
            } else {
                if(month % 2 == 1){
                    return 31;
                } else {
                    return 30;
                }
            }
        }
    }

    function addMonth(){
        var monthTemp = parseInt(sessionStorage.getItem('month'));
        var yearTemp = parseInt(sessionStorage.getItem('year'));

        if(monthTemp + 1 > 11) {
            sessionStorage.setItem('month', (0).toString());
            sessionStorage.setItem('year', (yearTemp + 1).toString());
        } else {
            sessionStorage.setItem('month', (monthTemp + 1).toString());
            sessionStorage.setItem('year', (yearTemp).toString());
        }

        generateCalendar();
    }

    function removeMonth(){
        var monthTemp = parseInt(sessionStorage.getItem('month'));
        var yearTemp = parseInt(sessionStorage.getItem('year'));

        if(monthTemp - 1 < 0) {
            sessionStorage.setItem('month', (11).toString());
            sessionStorage.setItem('year', (yearTemp - 1).toString());
        } else {
            sessionStorage.setItem('month', (monthTemp - 1).toString());
            sessionStorage.setItem('year', (yearTemp).toString());
        }

        generateCalendar();
    }
</script>
