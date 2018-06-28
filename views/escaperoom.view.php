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
            <img src="img/order/chrono.png" alt="The timer is 60 minutes">
            
            <?php if($donnees['is_pregnant']) :?>
                <img src="img/order/pregnant_ok.png" alt="The room is allowed to pregnant woman">
            <?php else :?>
                <img src="img/order/pregnant_no.png" alt="The room is not allowed to pregnant woman">
            <?php endif; ?>

            <?php if($donnees['is_wheelchair']) :?>
                <img src="img/order/wheelchair_ok.png" alt="The room is allowed to wheelchair persons">
            <?php else :?>
                <img src="img/order/wheelchair_no.png" alt="The room is not allowed to wheelchair persons">
            <?php endif; ?>
            
            <?php if($donnees['is_deaf']) :?>
                <img src="img/order/deaf_ok.png" alt="The room is allowed to deaf persons">
            <?php else :?>
                <img src="img/order/deaf_no.png" alt="The room is not allowed to deaf persons">
            <?php endif; ?>

        </article>
        <aside class="col-lg-2 share offset-lg-1">
            <p>Partager sur</p>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg></a>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
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
                <select class="creneaux"></select>
                <?php echo '<input type="submit" value="Valider" href="' . DIRNAME.Route::getSlug('reservationnext','index') . '">'; ?>
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
            <?php echo $donnees['url_video']; ?>
        </article>
        <article class="col-lg-8 col-md-6 col-sm-6 col-xs-6 picture-promotion row">
            <?php if(isset($donnees['picture_1'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_1']; ?>" target="_blank"><img src="<?php echo $donnees['picture_1']; ?>" alt=""></a>
            <?php endif; ?>
            <?php if(isset($donnees['picture_2'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_2']; ?>" target="_blank"><img src="<?php echo $donnees['picture_2']; ?>" alt=""></a>
            <?php endif; ?>
        </article>
        <article class="col-lg-8 col-md-6 col-sm-6 col-xs-6 picture-promotion row">
            <?php if(isset($donnees['picture_3'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_3']; ?>" target="_blank"><img src="<?php echo $donnees['picture_3']; ?>" alt=""></a>
            <?php endif; ?>
            <?php if(isset($donnees['picture_4'])) : ?>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_4']; ?>" target="_blank"><img src="<?php echo $donnees['picture_4']; ?>" alt=""></a>
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
                    thead_title = '<img class="arrow" src="img/arrow_left.svg" onclick="removeMonth()">';
                } else {
                    if (year > ladate.getFullYear()) {
                        thead_title = '<img class="arrow" src="img/arrow_left.svg" onclick="removeMonth()">';
                    }
                }

                thead_title = thead_title + ' ' +tab_months[month] + ' ' + year + ' ' + '<img class="arrow" src="img/arrow_right.svg" onclick="addMonth()">';
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