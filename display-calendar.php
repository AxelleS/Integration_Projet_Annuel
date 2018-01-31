<?php
	// Récuperation des variables passées, on donne soit année; mois; année+mois
	if(!isset($_GET['mois'])) $num_mois = 1; else $num_mois = $_GET['mois'];
	if(!isset($_GET['annee'])) $num_an = 2018; else $num_an = $_GET['annee'];

	$array_semi = array("2018-01-25");
	$array_plein = array("2018-01-30");

	// nombre de jours dans le mois et numero du premier jour du mois
	$int_nbj = date("t", mktime(0,0,0,$num_mois,1,$num_an));
	$int_premj = date("N",mktime(0,0,0,$num_mois,1,$num_an));

	for($i=1;$i<$int_nbj+1;$i++){
        $theday = strlen($i)<2 ? "0".$i : $i;
		if(in_array(date("Y-m-d",mktime(0,0,0,$num_mois,$theday,$num_an)),$array_semi)){
            $monarray = array(
                "10" => "10h00-11h30",
                "12" => "12h00-13h30",
                "14" => "14h00-15h30"
            );
			$thiscreneaux[date("Y-m-d",mktime(0,0,0,$num_mois,$theday,$num_an))] = $monarray;
		}
		elseif(!in_array(date("Y-m-d",mktime(0,0,0,$num_mois,$theday,$num_an)),$array_plein)){
            $monarray = array(
                "10" => "10h00-11h30",
                "12" => "12h00-13h30",
                "14" => "14h00-15h30",
                "16" => "16h00-17h30",
                "18" => "18h00-19h30",
                "20" => "20h00-21h30",
                "22" => "22h00-23h30"
            );
			$thiscreneaux[date("Y-m-d",mktime(0,0,0,$num_mois,$theday,$num_an))] = $monarray;
		}
	}

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

        var thiscreneaux = <?php echo json_encode($thiscreneaux) ?>;

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
            <th colspan="7">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="7">
                <a href="escape-room.php?<?php echo (($num_mois - 1) > 0 ? ("mois=".($num_mois-1)."&annee=".$num_an) : ("mois=12&annee=".($num_an-1)));?>"><img class="arrow" src="img/arrow_left.svg"></a>&nbsp;&nbsp;<?php echo $tab_mois[$num_mois]." ".$num_an;  ?>&nbsp;&nbsp;<a href="escape-room.php?<?php echo (($num_mois + 1) < 13 ? ("mois=".($num_mois+1)."&annee=".$num_an) : ("mois=1&annee=".($num_an+1)));?>"><img class="arrow" src="img/arrow_right.svg"></a>
            </th>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
        </tr>
        <tr>
            <?php for($i = 1; $i <= 7; $i++): ?>
            <th><?php echo $tab_jours[$i];?></th>
            <?php endfor; ?>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
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
                
                <td class="<?php echo ((in_array($madate,$array_semi))? 'semiplein':((!in_array($madate,$array_plein))? 'vide' : 'plein')); ?>"><?php echo ((!in_array($madate,$array_plein))?"<input id='".$madate."' type='button' value='".$tab_cal[$i]."' name='".$madate."'>":$tab_cal[$i]); ?></td>
                <?php $joursemaine++; ?>
            <?php endfor; ?>
        </tr>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
    </tbody>
</table>