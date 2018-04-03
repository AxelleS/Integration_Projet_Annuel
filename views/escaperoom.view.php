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

    <section class="booking row">
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Réserver la salle</h2>
        </article>
        <article class="col_6 offset_5">
            <hr>
        </article>
        <article class="calendar col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <?php include 'display-calendar.php';?>
        </article>
        <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 slots-text">
            <p>Choix créneau :</p>
        </article>
        <article class="slots">
            <select class="creneaux"></select>
            <?php echo '<input type="submit" value="Valider" href="' . DIRNAME . 'resanext">'; ?>
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
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_1']; ?>" target="_blank"><img src="<?php echo $donnees['picture_1']; ?>" alt=""></a>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_2']; ?>" target="_blank"><img src="<?php echo $donnees['picture_2']; ?>" alt=""></a>
        </article>
        <article class="col-lg-8 col-md-6 col-sm-6 col-xs-6 picture-promotion row">
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_3']; ?>" target="_blank"><img src="<?php echo $donnees['picture_3']; ?>" alt=""></a>
            <a class="col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $donnees['picture_4']; ?>" target="_blank"><img src="<?php echo $donnees['picture_4']; ?>" alt=""></a>
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