<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
    <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_title">
        <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1"><?php echo $title; ?></h1>
    </div>
    <input type="hidden" id="typeUser" value="<?php echo $type; ?>">
    <div class="row site-center">
        <article class="col-lg-10 offset-lg-1">
            <table class="bordered centered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </article>
    </div>
</section>

<script>
    var type = $('#typeUser').val();

    $(document).ready(function() {
        generateArray();
    });

    function generateArray(){
        $('#tbody').html('');
        $.ajax({
            url: '<?php echo DIRNAME . Route::getSlug('users', 'generate'); ?>',
            type: 'GET',
            data: {
                type : type
            },
            complete : function(data) {
                var users = JSON.parse(data['responseText']);

                var row = document.getElementById('tbody');
                for (var property in users) {
                    var newLigne = row.insertRow();
                    var cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['id'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['lastname'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['firstname'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['email'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['phone'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['zipcode'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = users[property]['city'];
                    cell = newLigne.insertCell();
                    cell.innerHTML = '<input type="button" class="btn-default" onclick="modifyUser('+users[property]['id']+')" value="Modifier"><input type="button" class="btn-default" onclick="deleteUser('+users[property]['id']+')" value="Supprimer">';
                }
            }
        });
    }

    function deleteUser(idUser) {
        if (confirm("Etes vous sûr de vouloir supprimer l'utilisateur ?")) {
            $.ajax({
                url: '<?php echo DIRNAME . Route::getSlug('users', 'delete'); ?>',
                type: 'GET',
                data: {
                    idUser : idUser
                },
                complete : function(data) {
                    var isDelete = JSON.parse(data['responseText']);
                    if(isDelete == 1) {
                        alert("Suppression effectuée !");
                        generateArray();
                    } else {
                        alert("Suppression échouée ! L'utilisateur est lié à des réservations.");
                    }
                }
            });
        }
    }

    function modifyUser(idUser) {
        var url = '<?php echo DIRNAME . Route::getSlug('users', 'edit').'/'; ?>';
        document.location.href = url + idUser;
    }

</script>