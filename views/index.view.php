    <main id="main-hp" class="container-fluid">
        <div class="container-home row">
            <div class="page-title col-md-12 col-sm-12 col-xs-12"><p>Play with my CMS</p></div>
            <section class="carrousel">
                <?php for($i=0; $i<count($donnees['carrousel']);$i++) :?>
                <img src="<?php echo $donnees['carrousel'][$i]; ?>" alt="image <?php echo $i + 1; ?> du carrousel">
                <?php endfor; ?>
            </section>

            <section class="introduction">
                <h1><?php echo $donnees['title_introduction'];?></h1>
                <p><?php echo $donnees['description_introduction'];?></p>
            </section>

            <section class="video-promotion col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo $donnees_video; ?>
            </section>

            <section class="escape-room row">
                    <section class="col-lg-2 col-md-2 col-sm-2 col-xs-2 room">
                        <!-- Affiche par défaut -->
                        <article class="escape-back">
                            <img src="<?php echo $donnees['picture_room_1']; ?>" alt="room preview">
                            <a href=<?php echo DIRNAME.Route::getSlug('escaperoom', 'index').'/'.$donnees['id_room_1'];?>><div class="room-title"><?php echo $donnees['name_room_1']; ?></div></a>
                        </article>
                    </section>
                    <section class="col-lg-2 col-md-2 col-sm-2 col-xs-2 room">
                        <!-- Affiche par défaut -->
                        <article class="escape-back">
                            <img src="<?php echo $donnees['picture_room_2']; ?>" alt="room preview">
                            <a href=<?php echo DIRNAME.Route::getSlug('escaperoom', 'index').'/'.$donnees['id_room_2'];?>><div class="room-title"><?php echo $donnees['name_room_2'];?></div></a>
                        </article>
                    </section>
                    <section class="col-lg-2 col-md-2 col-sm-2 col-xs-2 room">
                        <!-- Affiche par défaut -->
                        <article class="escape-back">
                            <img src="<?php echo $donnees['picture_room_3']; ?>" alt="room preview">
                            <a href=<?php echo DIRNAME.Route::getSlug('escaperoom', 'index').'/'.$donnees['id_room_3'];?>><div class="room-title"><?php echo $donnees['name_room_3'];?></div></a>
                        </article>
                    </section>
            </section>
        </div>

        <section class="map row">
            <!-- Map google map -->
            <article class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><?php echo $donnees_maps; ?></article>
            <!-- Adresse entreprise -->
            <article class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-lg-1">
                <h2><?php echo $donnees['name_company'];?></h2>
                <br>
                <p><?php echo $donnees['address_company'];?></p>
                <br>
                <p><?php echo $donnees['zipcode_company'].' '.$donnees['city_company'];?></p>
                <br>
                <p>FRANCE</p>
            </article>
        </section>
    </main>