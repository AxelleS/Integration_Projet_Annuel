<main>
    <section class="row faq">
        <article class="col-lg-4 faq-picture ">
            <img src="img//faq.jpg" alt="Illustration picture of FAQ">
        </article>
        <article class="col-lg-6 offset-lg-1 faq-question ">
            <article class="title-faq">
                <h1>FAQ</h1>
            </article>
            <?php $i = 1; ?>
            <?php foreach ($donnees as $donnee) :?>
                <h4><?php echo $i.'. '.$donnee['question']; ?></h4>
                <p><?php echo $donnee['answer']; ?></p>
             <?php $i++; ?>
            <?php endforeach; ?>
        </article>
        <div class="col_3"></div>
    </section>
</main>
