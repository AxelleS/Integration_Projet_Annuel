<?php include('header.php'); ?>

<main>
    <section class="promotion row">
        <article class="col_4 title-room offset_3">
            <h1>Escape the Library</h1>
        </article>
        <article class="col_12 description-room offset_2">
            <p>
                Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.<br>Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.<br>Iis igitur est difficilius satis facere, qui se Latina scripta dicunt contemnere. in quibus hoc primum est in quo admirer, cur in gravissimis rebus non delectet eos sermo patrius, cum idem fabellas Latinas ad verbum e Graecis expressas non inviti legant. quis enim tam inimicus paene nomini Romano est, qui Ennii Medeam aut Antiopam Pacuvii spernat aut reiciat, quod se isdem Euripidis fabulis delectari dicat, Latinas litteras oderit?
            </p>
        </article>
        <article class="col_4 order offset_6">
            <img src="img/order/chrono.png" alt="The timer is 60 minutes">
            <img src="img/order/pregnant_no.png" alt="The room is not allowed to pregnant woman">
            <img src="img/order/wheelchair_no.png" alt="The room is not allowed to wheelchair persons">
            <img src="img/order/deaf_ok.png" alt="The room is allowed to deaf persons">
        </article>
        <aside class="col_2 share offset_4">
            <p>Partager sur</p>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg></a>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
        </aside>
    </section>

    <section class="booking row">
        <article class="col_4 offset_6">
            <h2>Réserver la salle</h2>
        </article>
        <article class="col_6 offset_5">
            <hr>
        </article>
        <article class="calendar col_4 offset_4">
            <?php include('display-calendar.php'); ?>
        </article>
        <article class="col_2 slots-text">
            <p>Choix créneau :</p>
        </article>
        <article class="col_2 slots">
            <select class="creneaux"></select>
            <input type="submit" value="Valider">
        </article>
        <article class="legend col_2 offset_4">
            <p>Légende</p>
            <div class="legend_plein">Plus de créneaux disponibles</div>
            <div class="legend_semiplein">Entre 1 et 3 créneaux disponibles</div>
            <div class="legend_vide">Entre 4 et 7 créneaux disponibles</div>
        </article>
    </section>

    <section class="pictures row">
        <article class="col_2 offset_7">
            <h2>En images</h2>
        </article>
        <article class="col_6 offset_5">
            <hr>
        </article>
        <article class="video-promotion col_16">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/B5RO26wuCaU" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
        </article>
        <article class="col_6 picture-promotion offset_5">
            <a href="img/escapes/library.jpg" target="_blank"><img src="img/escapes/library.jpg" alt=""></a>
            <a href="img/escapes/book1.jpg" target="_blank"><img src="img/escapes/book1.jpg" alt=""></a>
        </article>
        <article class="col_6 picture-promotion offset_5">
            <a href="img/escapes/book2.jpg" target="_blank"><img src="img/escapes/book2.jpg" alt=""></a>
            <a href="img/escapes/book3.jpg" target="_blank"><img src="img/escapes/book3.jpg" alt=""></a>
        </article>
    </section>

    <section class="row opinion">
        <article class="col_4 offset_6">
            <h2>Les avis</h2>
        </article>
        <article class="col_6 offset_5">
            <hr>
        </article>
        <article class="col_16 opinion-people">
            <p id="opinion-date">01/01/2018</p>
            <p id="opinion-name">N. Prénom</p>
            <p id="opinion-score">Note 4/5</p>
        </article>
        <article class="col_16 opinion-people">
            <p id="opinion-date">01/01/2018</p>
            <p id="opinion-name">N. Prénom</p>
            <p id="opinion-score">Note 4/5</p>
        </article>
        <article class="col_16 opinion-people">
            <p id="opinion-date">01/01/2018</p>
            <p id="opinion-name">N. Prénom</p>
            <p id="opinion-score">Note 4/5</p>
        </article>
    </section>
</main>

<?php include('footer.php'); ?>

</html>