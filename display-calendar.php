<?php
    $salleselect = 1;
    try
    {
        $pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
    }
    catch(Exception $e)
    {
        die('Erreur SQL : '.$e->getMessage());
    }

	// Récuperation des variables passées, on donne soit année; mois; année+mois
	if(!isset($_GET['mois'])) $num_mois = date('n'); else $num_mois = $_GET['mois'];
    if(!isset($_GET['annee'])) $num_an = date('Y'); else $num_an = $_GET['annee'];
    if($num_mois<10){
        $moisreconstitue = "0".$num_mois;
    } else{
        $moisreconstitue = $num_mois;
    }
    $date = $num_an.'-'.$moisreconstitue.'-%';
    $response_date = $pdo->query('SELECT * FROM calendar WHERE date_calendar LIKE "'.$date.'"');

    while($donnees_date = $response_date->fetch()){
        $temp = array();
        $response_creneaux = $pdo->query("SELECT * FROM time_slot WHERE id_calendar LIKE ".$donnees_date['id']." AND id_room LIKE ".$salleselect);
        while($donnees_creneaux = $response_creneaux->fetch()){
            if(is_null($donnees_creneaux['id_user'])){
                $temp[$donnees_creneaux['id']] = $donnees_creneaux['value_time_slot'];
            }
        }
        $creneaux[$donnees_date['date_calendar']] = $temp;  
    }

	// nombre de jours dans le mois et numero du premier jour du mois
	$int_nbj = date("t", mktime(0,0,0,$num_mois,1,$num_an));
	$int_premj = date("N",mktime(0,0,0,$num_mois,1,$num_an));

	// tableau des jours, tableau des mois...
	$tab_jours = array("","Lu","Ma","Me","Je","Ve","Sa","Di");
	$tab_mois = array("","Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");

	$tab_cal = array();

	for($i=0;$i<$int_nbj+1;$i++){
		$tab_cal[$i] = $i;
	}

	
?>
<script>
    $(document).ready(function(){
        //Convertit le tableau php en object JS

        var thiscreneaux = <?php echo json_encode($creneaux) ?>;

        $('.semiplein input').click(function(){
            //Réinitialise les couleurs des dates
            $('.semiplein input').css('background-color','orange');
            $('.vide input').css('background-color','green');
            $('input').css('color','black');
            // $('#heurechoose').empty();

            //Recupère l'attribut name du input
            var date = $(this).attr("name");
            var cut_date = date.split('-');
            var convert_date = cut_date[2]+'/'+cut_date[1]+'/'+cut_date[0];		

            //Met en higlight la date sélectionnée
            $('#'+ date +'').css('background-color','#338FF9');
            $('#'+ date +'').css('color','white');
            
            //Cible la clé égale à la date cliqué		
            var creneaux = thiscreneaux[date];
            
            //Vide le select
            $('.creneaux').empty();

            //Met un option vide par défaut
            $('.creneaux').append('<option value=""></option>');
            //Remplit le select
            $.each(creneaux, function(key, value) {
                $('.creneaux').append('<option>'+value+'</option>');
            });

            //Récapitulatif de date choisie
            // $('#datechoose').html(convert_date);
            $('#datechoose').val(convert_date);

            //Affiche le select
            $('article.slots-text').css('display') == 'none' ? $('.slots-text').css('display','block') : null;
            $('.creneaux').css('display') == 'none' ? $('.creneaux').css('display','block') : null;
            $('.slots input').css('display') == 'none' ? $('.slots input').css('display','block') : null;


        });

        $('.vide input').click(function(){
            //Réinitialise les couleurs des dates
            $('.vide input').css('background-color','green');
            $('.semiplein input').css('background-color','orange');
            $('input').css('color','black');
            // $('#heurechoose').empty();

            //Recupère l'attribut name du input
            var date = $(this).attr("name");
            var cut_date = date.split('-');
            var convert_date = cut_date[2]+'/'+cut_date[1]+'/'+cut_date[0];

            //Met en higlight la date sélectionnée
            $('#'+ date +'').css('background-color','#338FF9');
            $('#'+ date +'').css('color','white');

            //Cible la clé égale à la date cliqué
            var creneaux = thiscreneaux[date];
            
            //Vide le select
            $('.creneaux').empty();

            //Met un option vide par défaut
            $('.creneaux').append('<option value=""></option>');
            //Remplit le select
            $.each(creneaux, function(key, value) {
                $('.creneaux').append('<option value="'+key+'">'+value+'</option>');
            });
            //Récapitulatif de date choisie
            // $('#datechoose').html(convert_date);
            $('#datechoose').val(convert_date);

            //Affiche le select
            $('article.slots-text').css('display') == 'none' ? $('.slots-text').css('display','block') : null;
            $('.creneaux').css('display') == 'none' ? $('.creneaux').css('display','block') : null;
            $('.slots input').css('display') == 'none' ? $('.slots input').css('display','block') : null;
        });

        $('.plein').click(function(){
            //Réinitialise les couleurs des dates
            $('.vide input').css('background-color','green');
            $('.semiplein input').css('background-color','orange');
            $('input').css('color','black');
            // $('#datechoose').empty();
            // $('#heurechoose').empty();
            
            //Vide le select
            $('.creneaux').empty();
            //Cache le select
            $('.creneaux').css('display') == 'block' ? $('.creneaux').css('display','none') : null;
            $('.slots input').css('display') == 'block' ? $('.slots input').css('display','none') : null;
        });

        $('.creneaux').change(function(){
            // $('#heurechoose').html($('.creneaux option:selected').text());
            $('#heurechoose').val($('.creneaux option:selected').text());
        });
    });

    function extractUrlParams(){	
        var t = location.search.substring(1).split('&');
        var f = [];
        for (var i=0; i<t.length; i++){
            var x = t[ i ].split('=');
            f[x[0]]=x[1];
        }
        return f;
    }

</script>

<table>	
    <thead>
        <tr>
            <th colspan="7">           
            <?php if($num_mois > date('n')) { echo '<a href="'.DIRNAME.'escaperoom?'.(($num_mois - 1) > 0 ? ("mois=".($num_mois-1)."&annee=".$num_an) : ("mois=12&annee=".($num_an-1))).'"><img class="arrow" src="img/arrow_left.svg"></a>';}?> &nbsp;&nbsp;<?php echo $tab_mois[$num_mois]." ".$num_an;  ?>&nbsp;&nbsp;<?php echo '<a href="'.DIRNAME.'escaperoom?'.(($num_mois + 1) < 13 ? ('mois='.($num_mois+1).'&annee='.$num_an) : ('mois=1&annee='.($num_an+1))).'"><img class="arrow" src="img/arrow_right.svg"></a>';?>
            </th>
        </tr>
        <tr>
            <?php for($i = 1; $i <= 7; $i++): ?>
            <th><?php echo $tab_jours[$i];?></th>
            <?php endfor; ?>
        </tr>
    </thead>

    <tbody>
        <tr class="content">
            <?php for($i=1;$i<$int_nbj+1;$i++): ?>
                <?php
                    $themonth = strlen($num_mois) < 2 ? "0".$num_mois : $num_mois;
                    $theday = strlen($tab_cal[$i]) < 2 ? "0".$tab_cal[$i] : $tab_cal[$i];
                    $madate = $num_an.'-'.$themonth.'-'.$theday; 
                ?>
                <?php if($i == 1): ?>
                    <?php if($int_premj > 1): ?>
                        <?php for($n = 0;$n<$int_premj-1;$n++): ?>
                            <td>&nbsp;</td>
                        <?php endfor; ?>
                    <?php endif; ?>
                    <?php $joursemaine = $int_premj; ?>
                <?php else: ?>
                    <?php if($joursemaine > 7): ?>
                        <?php $joursemaine = 1; ?>
                        </tr>
                        <tr class="content">
                    <?php endif; ?>
                <?php endif; ?>                
                <td class="<?php if(count($creneaux[$madate]) > 3){echo 'vide';} elseif(count($creneaux[$madate]) > 1){echo 'semiplein';}else{echo 'plein';}?>"><?php if(count($creneaux[$madate]) > 1){echo "<input id='".$madate."' type='button' value='".$tab_cal[$i]."' name='".$madate."'>";} else {echo $tab_cal[$i];} ?></td>
                <?php $joursemaine++; ?>
            <?php endfor; ?>
        </tr>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
    </tbody>
</table>