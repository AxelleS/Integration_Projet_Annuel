<main>
    <section class="row resa">
        <article class="col-lg-12 col-sm-12 title-resa">
            <h1>Réserver une salle</h1>
        </article>
    </section>
    <section class="row">
        <article class="col-lg-4 col-sm-5 offset-lg-1 calendar">
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
        </article>
        <div class="row col-lg-3 selection-resa">
            <article class="col-lg-4 col-sm-2 rooms-text">
                <p>Choix salle</p>
            </article>
            <article class="col-lg-3 col-sm-3 rooms">
                <select class="select-room" onchange="generateCalendar()">
                    <?php while($donnees = $response->fetch()): ?>
                        <option value="<?php echo $donnees['id']; ?>"><?php echo $donnees['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </article>
        </div>
        <div class="row col-lg-3 selection-resa">
            <article class="col-lg-4 col-sm-2 slots-text">
                <p>Choix créneau</p>
            </article>
            <article class="col-lg-3 col-sm-3 slots">
                <select class="creneaux"></select>
                <?php echo '<input type="submit" value="Valider" href="' . DIRNAME.Route::getSlug('reservationnext','index') . '">'; ?>
            </article>
        </div>        
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

        $('.slots-text').css('display','none');
        $('.creneaux').css('display','none');
        $('.slots input').css('display','none');

        $('#tbody').html('');

        $.ajax({
            url : '<?php echo DIRNAME.Route::getSlug('escaperoom','ajaxCalendar'); ?>',
            type : 'GET',
            data : {
                month: sessionStorage.getItem('month'),
                year: sessionStorage.getItem('year'),
                room : $('.select-room option:selected').val()
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