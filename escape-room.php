<?php include('header.php'); ?>

<main>
    <section class="promotion row">
        <article class="col_4 title-room offset_3">
            <h1>Escape the Library</h1>
        </article>
        <article class="col_14 description-room offset_1">
            <p>
                Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.<br><br>Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.<br><br>Iis igitur est difficilius satis facere, qui se Latina scripta dicunt contemnere. in quibus hoc primum est in quo admirer, cur in gravissimis rebus non delectet eos sermo patrius, cum idem fabellas Latinas ad verbum e Graecis expressas non inviti legant. quis enim tam inimicus paene nomini Romano est, qui Ennii Medeam aut Antiopam Pacuvii spernat aut reiciat, quod se isdem Euripidis fabulis delectari dicat, Latinas litteras oderit?
            </p>
        </article>
        <article class="col_4 order offset_6">
            <img src="img/order/chrono.png" alt="The timer is 60 minutes">
            <img src="img/order/pregnant_no.png" alt="The room is not allowed to pregnant woman">
            <img src="img/order/wheelchair_no.png" alt="The room is not allowed to wheelchair persons">
            <img src="img/order/deaf_ok.png" alt="The room is allowed to deaf persons">
        </article>
        <aside class="col_2 share offset_3">
            <p>Partager sur</p>
            <a href="#"><img src="img/share/share_facebook.svg" alt="Share on facebook"></a>
            <a href="#"><img src="img/share/share_twitter.svg" alt="Share on twitter"></a>
        </aside>
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
        <article class="col_16 picture-promotion">
            <a href="img/escapes/library.jpg" target="_blank"><img src="img/escapes/library.jpg" alt=""></a>
            <a href="img/escapes/book1.jpg" target="_blank"><img src="img/escapes/book1.jpg" alt=""></a>
            <a href="img/escapes/book2.jpg" target="_blank"><img src="img/escapes/book2.jpg" alt=""></a>
            <a href="img/escapes/book3.jpg" target="_blank"><img src="img/escapes/book3.jpg" alt=""></a>
        </article>
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
        <article class="legend col_3 offset_1">
            <div class="legend_plein">&nbsp;</div>Plus de créneaux disponibles
            <div class="legend_semiplein">&nbsp;</div>Entre 1 et 3 créneaux disponibles
            <div class="legend_vide">&nbsp;</div>Entre 4 et 7 créneaux disponibles
        </article>
        <article class="col_2 slots offset_4">
            <select class="creneaux"></select>
            <input type="submit" value="Valider">
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