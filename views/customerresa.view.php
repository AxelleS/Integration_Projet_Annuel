<?php
    $day = date("d");
    $month = date("m");
    $year = date("Y");
?>
<main>
    <section class="row customer-resa">
        <article class="col_14 offset_1">
            <h1>Mes réservations</h1>
            <table class="centered striped">
                <thead>
                    <tr>
                        <th>Date de réservations</th>
                        <th>Date de la partie</th>
                        <th>Créneau choisi</th>
                        <th>Salle choisie</th>
                        <th>Nombre de participants</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12/01/2018</td>
                        <td>30/01/2018</td>
                        <td>14h00-15h30</td>
                        <td>Escape the Library</td>
                        <td>5 personnes</td>
                        <td>
                            <?php
                                $datepartie = strtotime(date("Y-m-d",mktime(0,0,0,3,3,2018)));
                                $datedujour = strtotime(date("Y-m-d",mktime(0,0,0,$month,$day+7,$year)));
                            ?>
                            <?php
                                if($datedujour < $datepartie) {
                                    echo '<input type="button" class="btn-error" value="Annuler">';
                                } elseif($datedujour > $datepartie) {
                                    echo '<input type="button" class="btn-default" value="Noter">';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>12/01/2018</td>
                        <td>18/04/2018</td>
                        <td>14h00-15h30</td>
                        <td>Escape the Lab</td>
                        <td>3 personnes</td>
                        <td>
                            <?php
                                $datepartie = strtotime(date("Y-m-d",mktime(0,0,0,4,18,2018)));
                                $datedujour = strtotime(date("Y-m-d",mktime(0,0,0,$month,$day+7,$year)));
                            ?>
                            <?php
                                if($datedujour < $datepartie) {
                                    echo '<input type="button" class="btn-error" value="Annuler">';
                                } elseif($datedujour > $datepartie) {
                                    echo '<input type="button" class="btn-default" value="Noter">';
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
        <div class="col_3"></div>
    </section>
</main>