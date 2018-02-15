<?php include('header.php'); ?>

    <main>
        <section class="carrousel">
            <img src="img/carrousel/image1.jpg" alt="image 1 du carrousel" id="image1">
            <img src="img/carrousel/image2.jpg" alt="image 2 du carrousel" id="image2">
            <img src="img/carrousel/image3.jpg" alt="image 3 du carrousel" id="image3">
        </section>

        <section class="introduction">
            <h1>Titre d'introduction</h1>
            <p>Sed quid est quod in hac causa maxime homines admirentur et reprehendant meum consilium, cum ego idem antea multa decreverim, que magis ad hominis dignitatem quam ad rei publicae necessitatem pertinerent? Supplicationem quindecim dierum decrevi sententia mea. Rei publicae satis erat tot dierum quot C. Mario ; dis immortalibus non erat exigua eadem gratulatio quae ex maximis bellis. Ergo ille cumulus dierum hominis est dignitati tributus.</p>
        </section>

        <section class="video">
            <iframe  width="560" height="315" src="https://www.youtube.com/embed/bzzKksk_z2k?rel=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
        </section>

        <section class="escape-room row">
                <section class="col_4 room offset_1 ">
                    <!-- Affiche par défaut -->
                    <article class="escape-back">
                        <img src="img/escapes/library.jpg" alt="library preview">
                        <div class="room-title"><a href="escape-room.php">Escape the Library</a></div>
                    </article>
                </section>
                <section class="col_4 room offset_1 ">
                    <!-- Affiche par défaut -->
                    <article class="escape-back">
                        <img src="img/escapes/labo.jpg" alt="labo preview">
                        <div class="room-title"><a href="escape-room.php">Escape the Lab</a></div>
                    </article>
                </section>
                <section class="col_4 room offset_1 ">
                    <!-- Affiche par défaut -->
                    <article class="escape-back">
                        <img src="img/escapes/school.jpg" alt="school preview">
                        <div class="room-title"><a href="escape-room.php">Escape the School</a></div>
                    </article>
                </section>
        </section>

        <section class="map row">
            <!-- Map google map -->
            <article class="col_6 offset_3"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.475184322657!2d2.3874704158722255!3d48.84914850931109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6727347e25d67%3A0xc73e22c1131584f7!2s242+Rue+du+Faubourg+Saint-Antoine%2C+75012+Paris!5e0!3m2!1sfr!2sfr!4v1516803151575" frameborder="0" style="border:0" allowfullscreen></iframe></article>
            <!-- Adresse entreprise -->
            <article class="col_3 offset_1">
                <h2>nom societe</h2>
                <br>
                <p>242, Rue du Faubourg Saint-Antoine</p>
                <br>
                <p>75012 Paris</p>
                <br>
                <p>FRANCE</p>
            </article>
        </section>
    </main>

<?php include('footer.php'); ?>