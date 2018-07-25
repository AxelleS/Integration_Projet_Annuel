<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
    <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_title">
        <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Calendrier</h1>
    </div>
    <div class="row site-center">
        <article class="calendar col-lg-5 col-md-5 col-sm-5 col-xs-5 offset-lg-3">
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
    </div>
    <div class="row site-center">
        <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-3 rooms-selector-text">
            <p>Choix de la salle :</p>
        </article>
        <article class="rooms-selector col-lg-2">
            <select class="salles" id="select_room" onchange="generateCalendar()">
                <?php foreach($rooms as $key => $value) : ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </article>
        <article class="room-count col-lg-2"></article>
    </div>
    <div class="row site-center">
        <article class="calendar col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-lg-3">
                <table class="bordered centered">
                    <thead>
                        <tr>
                            <th>ID Client</th>
                            <th>Créneaux</th>
                            <th>Nb Joueurs</th>
                            <th>Prix HT</th>
                            <th>Est Active</th>
                        </tr>
                    </thead>
                    <tbody id="body_recap">
                    </tbody>
                </table>
        </article>
    </div>
    <div class="row site-center">
        <article class="calendar col-lg-1 col-md-1 col-sm-1 col-xs-1 offset-lg-7">
            <input class="btn-default" type="button" value="Enregistrer" onclick="saveChanges()">
        </article>
    </div>
</section>

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

        $('#buttonValidate').css('display','block');
    });

    function generateCalendar(){
        var month = sessionStorage.getItem('month');
        var year = sessionStorage.getItem('year');
        var thead_title = '';

        var room = $('#select_room').val();

        $('#tbody').html('');

        $('#body_recap').html('');

        $.ajax({
            url : '<?php echo DIRNAME.Route::getSlug('calendar','ajaxCalendar'); ?>',
            type : 'GET',
            data : {
                month: sessionStorage.getItem('month'),
                year: sessionStorage.getItem('year'),
                room : room
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

                            cell.innerHTML = "<input id='"+n+"' type='button' value='"+n+"' name='"+n+"' onclick='loadTable("+n+","+timeSlotsTemp+")'>"
                        } else {
                            cell.innerHTML = n;
                        }
                    }
                    firstDay = firstDay + 1;
                }
            }
        });
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

    function loadTable(theDate, timeSlots) {
        $('.vide input').css('background-color','green');
        $('.semiplein input').css('background-color','orange');
        $('input').css('color','black');

        $('#'+ theDate +'').css('background-color','#338FF9');
        $('#'+ theDate +'').css('color','white');

        var row = document.getElementById('body_recap');

        var nbCreneauxFree = Object.keys(timeSlots).length;
        $('.room-count').html(nbCreneauxFree+' sur 7 de libre(s)');

        var room = $('#select_room').val();

        $('#body_recap').html('');

        $.ajax({
            url: '<?php echo DIRNAME . Route::getSlug('calendar', 'ajaxTable'); ?>',
            type: 'GET',
            data: {
                day : theDate,
                month : parseInt(sessionStorage.getItem('month')) + 1,
                year : sessionStorage.getItem('year'),
                room: room
            },
            complete: function (data) {
                var timeSlots = JSON.parse(data['responseText']);
                $.each(timeSlots, function(key, value) {
                    var newLigne = row.insertRow();
                    var cell = newLigne.insertCell();
                    cell.innerHTML = value['id_user'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = value['time_slot'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = value['nb_players'];
                    cell = newLigne.insertCell();
                    if (value['price'] != '') {
                        cell.innerHTML = value['price'] + '€';
                    }
                    else {
                        cell.innerHTML = value['price'];
                    }
                    cell = newLigne.insertCell();
                    if (value['is_active']) {
                        cell.innerHTML = "<input id='"+key+"' type='checkbox' checked>";
                    }
                    else {
                        cell.innerHTML = "<input id='"+key+"' type='checkbox'>";
                    }
                });
            }

        });
    }

    function saveChanges(){
        var arrayRows = document.getElementById("body_recap").rows;
        var nbRows = arrayRows.length;
        var i=0;

        var slots = [];
        while(i<nbRows)
        {
            var arrayColumns = arrayRows[i].cells;
            var nbColumns = arrayColumns.length;

            var n=0;
            while(n<nbColumns)
            {
                var temp = [];
                var toto = arrayColumns[n].innerHTML;
                var tableau = toto.split(' ');
                if(tableau.length > 1){
                    var idTimeSlot = tableau[1].split('"')[1];
                    var idCheckbox = '#'+(idTimeSlot).toString();
                    if ($(idCheckbox).is(':checked')) {
                        var isActive = 1;
                    }
                    else {
                        var isActive = 0;
                    }

                    temp.push(idTimeSlot);
                    temp.push(isActive);
                    slots.push(temp);
                }
                n = n + 1;
            }
            i = i + 1;
        }
        $.ajax({
            url: '<?php echo DIRNAME . Route::getSlug('calendar', 'ajaxSave'); ?>',
            type: 'GET',
            data: {
                timeSlots : slots
            }
        });
        alert('Modifications enregistrées !');
    }
</script>