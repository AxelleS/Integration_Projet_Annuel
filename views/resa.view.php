<main>
    <section class="row resa">
        <article class="col_16">
            <h1>Réserver une salle</h1>
        </article>
        <article class="col_5 offset_3 calendar">
            <?php include('display-calendar.php'); ?>
        </article>
        <article class="col_1 rooms-text">
            <p>Choix salle :</p>
        </article>
        <article class="col_1 rooms">
            <select class="select-room">
                <option value="1">Escape the Library</option>
                <option value="2">Escape the Lab</option>
                <option value="3">Escape the School</option>
            </select>
        </article>
        <article class="col_1 slots-text">
            <p>Choix créneau :</p>
        </article>
        <article class="col_1 slots">
            <select class="creneaux"></select>
            <?php echo '<input type="submit" value="Valider" href="'.DIRNAME.'resanext">'; ?>
        </article>
    </section>
</main>