<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
    <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_content_resize organization_title">
        <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Modification d'une room</h1>
      </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">
                <?php print_r($this->addModal("formModifyRoom", $roomDetails)); ?>
            </div>
            <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">
               <input class="<?php echo $roomDetails['style']['buttonCancel'];?>" type="button" onclick="deleteQa(<?php echo $roomDetails['id']['value'];?>)" value="Supprimer">
            </div>
        </div>
    </div>
</section>

<script>
function deleteQa(idRoom) {
    console.log("hello");
    if (confirm("Etes vous sûr de vouloir supprimer cette room ?")) {
        location.href = '<?php echo DIRNAME.Route::getSlug('organization', 'delete'); ?>'+'/room/'+idRoom;
    }
}
</script>