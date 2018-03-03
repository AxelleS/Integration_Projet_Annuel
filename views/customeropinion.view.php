<main>
    <section class="row customer-opinion">
        <article class="col_4 offset_6 opinion-form">
            <h1>Notez votre partie !</h1>
            <form action="customeropinion/save" method="post" id="opinion-form" name="opinion-form">
                <input type="hidden" name="id_time_slot" id="id_time_slot" value="<?php echo $donnees['id']; ?>">
                <div class="row">
                    <article class="col_5">
                        <p><b>Nom de la salle : </b></p>
                        <p><?php echo $donnees['name_room']; ?></p>
                    </article>
                    <article class="col_5">
                        <p><b>Date de la partie : </b></p>
                        <p><?php echo $donnees['date_calendar']; ?></p>
                    </article>
                    <article class="col_5">
                        <p><b>Heure de la partie : </b></p>
                        <p><?php echo $donnees['value_time_slot']; ?></p>
                    </article>
                </div>
                <div class="row">
                    <article class="col_16">
                        <p><b>Recommanderiez-vous cette salle ?</b></p>
                        <div class="note">
                            <div id="note_1"><p>1</p></div>
                            <div id="note_2"><p>2</p></div>
                            <div id="note_3"><p>3</p></div>
                            <div id="note_4"><p>4</p></div>
                            <div id="note_5"><p>5</p></div>
                            <input type="hidden" name="lanote" id="lanote" value="">
                        </div>
                    </article>
                </div>
                <div class="row button">
                    <article class="col_6">
                        <input class="btn-default" type="submit" form="opinion-form" value="Envoyer">
                    </article>
                </div>
            </form>
        </article>
    </section>
</main>

<script>
    $(document).ready(function(){
            $('.note #note_1').hover(function(){
                switch($('.note input').val()){
                    case "1":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "2":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "3":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "4":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "5":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    default:
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                }
            });
            $('.note #note_2').hover(function(){
                switch($('.note input').val()){
                    case "1":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "2":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "3":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "4":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "5":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    default:
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                }
            });
            $('.note #note_3').hover(function(){
                switch($('.note input').val()){
                    case "1":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "2":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "3":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "4":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "5":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    default:
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                }
            });
            $('.note #note_4').hover(function(){
                switch($('.note input').val()){
                    case "1":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "2":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "3":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "4":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "5":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    default:
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                }
            });
            $('.note #note_5').hover(function(){
                switch($('.note input').val()){
                    case "1":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    case "2":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    case "3":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    case "4":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    case "5":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    default:
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                }
            });

            $('.note div').mouseleave(function(){
                switch($('.note input').val()){
                    case "1":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "2":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "3":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "4":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                    case "5":
                        $('.note #note_1').css('background-color','#42BDC4');
                        $('.note #note_2').css('background-color','#42BDC4');
                        $('.note #note_3').css('background-color','#42BDC4');
                        $('.note #note_4').css('background-color','#42BDC4');
                        $('.note #note_5').css('background-color','#42BDC4');
                    break;
                    default:
                        $('.note #note_1').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_2').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_3').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_4').css('background-color','rgb(178, 230, 233)');
                        $('.note #note_5').css('background-color','rgb(178, 230, 233)');
                    break;
                }
            });
        
        $('.note #note_1').click(function(){
            $('.note #note_1').css('background-color','#42BDC4');
            $('.note #note_2').css('background-color','rgb(178, 230, 233)');
            $('.note #note_3').css('background-color','rgb(178, 230, 233)');
            $('.note #note_4').css('background-color','rgb(178, 230, 233)');
            $('.note #note_5').css('background-color','rgb(178, 230, 233)');
            $('.note input').val(1);
        });
        $('.note #note_2').click(function(){
            $('.note #note_1').css('background-color','#42BDC4');
            $('.note #note_2').css('background-color','#42BDC4');
            $('.note #note_3').css('background-color','rgb(178, 230, 233)');
            $('.note #note_4').css('background-color','rgb(178, 230, 233)');
            $('.note #note_5').css('background-color','rgb(178, 230, 233)');
            $('.note input').val(2);
        });
        $('.note #note_3').click(function(){
            $('.note #note_1').css('background-color','#42BDC4');
            $('.note #note_2').css('background-color','#42BDC4');
            $('.note #note_3').css('background-color','#42BDC4');
            $('.note #note_4').css('background-color','rgb(178, 230, 233)');
            $('.note #note_5').css('background-color','rgb(178, 230, 233)');
            $('.note input').val(3);
        });
        $('.note #note_4').click(function(){
            $('.note #note_1').css('background-color','#42BDC4');
            $('.note #note_2').css('background-color','#42BDC4');
            $('.note #note_3').css('background-color','#42BDC4');
            $('.note #note_4').css('background-color','#42BDC4');
            $('.note #note_5').css('background-color','rgb(178, 230, 233)');
            $('.note input').val(4);
        });
        $('.note #note_5').click(function(){
            $('.note #note_1').css('background-color','#42BDC4');
            $('.note #note_2').css('background-color','#42BDC4');
            $('.note #note_3').css('background-color','#42BDC4');
            $('.note #note_4').css('background-color','#42BDC4');
            $('.note #note_5').css('background-color','#42BDC4');
            $('.note input').val(5);
        });
        
    });
</script>