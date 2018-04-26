<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
<div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_content_resize organization_title">
    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Modification de la page d'accueil</h1>
  </div>


<div class="row">

<div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">

    

    <form action="<?php echo DIRNAME.Route::getSlug('organization','save')?>"
      class="row" method="POST">
        <input type="hidden" name="actualPageType" value="<?php echo $actualPageType;?>" />
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Titre d'introduction</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style" type="text" name="titre_introduction" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Choisissez votre 1ère room</p>
        <select name="id_room_1" id="" class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style">
        <?php foreach($roomSelect as $key=>$value): ?>
                <option value="<?php echo $roomSelect[$key]['id'];?>"><?php echo $roomSelect[$key]['name'];?></option>
        <?php endforeach; ?>
        </select>

        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Choisissez votre 2ème room</p>
        <select name="id_room_2" id="" class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style">
        <?php foreach($roomSelect as $key=>$value): ?>
                <option value="<?php echo $roomSelect[$key]['id'];?>"><?php echo $roomSelect[$key]['name'];?></option>
        <?php endforeach; ?>
        </select>

        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Choisissez votre 3ème room</p>
        <select name="id_room_3" id="" class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style">
        <?php foreach($roomSelect as $key=>$value): ?>
                <option value="<?php echo $roomSelect[$key]['id'];?>"><?php echo $roomSelect[$key]['name'];?></option>
        <?php endforeach; ?>
        </select>

        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Description d'introduction</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="description_introduction" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Url de la vidéo</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="url_video" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Nom de l'entreprise</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="name_company" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Adresse de l'entreprise</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="address_company" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Code postal de l'entreprise</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="zipcode_company" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">Ville de l'entreprise</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="city_company" />
        
        <p class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style">url google maps</p>
        <input class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style"  type="text" name="url_google" />
        
        <a href="#" class="col-lg-2 offset-lg-3 col-md-2 offset-md-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 col-"><button class="col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage resize-cancel-button">Retour</button></a>
        <input class="col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage" type="submit" value="Sauvegarder"></p>
      </form>
</div>

  

</div>
</div>
</section>