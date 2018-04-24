<main>
    <section class="row resa">
        <article class="col-lg-12 col-sm-12 title-resa">
            <h1>Réserver une salle</h1>
        </article>
        <article class="col-lg-3 col-sm-5 calendar">
            <?php include('display-calendar.php'); ?>
        </article>
        <div class="row selection-resa">
            <article class="col-lg-3 col-sm-2 rooms-text">
                <p>Choix salle :</p>
            </article>
            <article class="col-lg-3 col-sm-3 rooms">
                <select class="select-room">
                    <option value="1">Escape the Library</option>
                    <option value="2">Escape the Lab</option>
                    <option value="3">Escape the School</option>
                </select>
            </article>
            <article class="col-lg-6 col-sm-2 slots-text">
                <p>Choix créneau :</p>
            </article>
            <article class="col-lg-3 col-sm-3 slots">
                <select class="creneaux"></select>
                <?php echo '<input type="submit" value="Valider" href="'.DIRNAME.'resanext">'; ?>
            </article>
        </div>
    </section>
</main>