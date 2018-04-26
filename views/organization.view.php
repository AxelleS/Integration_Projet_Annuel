<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
<div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_title">
    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Organisation du site</h1>
  </div>
<div class="row site-center">
    <?php foreach($roomList as $key=>$value): ?>
    <a class="col-lg-3 offset-lg-1 col-md-3 offset-md-1 col-sm-10 offset-sm-2 col-xs-10 offset-xs-2 placed" href="<?php echo DIRNAME.Route::getSlug('organization','edit'); ?><?php echo "/".$roomList[$key]['name']."/".$roomList[$key]['id'];?>""">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="titre-organization"><b><?php echo $roomList[$key]['name'];?></b></p>
        </div>
    </a>
    <?php endforeach; ?>

    <!-- <a class="col-lg-3 offset-lg-1 col-md-3 offset-md-1 col-sm-10 offset-sm-2 col-xs-10 offset-xs-2 placed" href="<?php echo DIRNAME.Route::getSlug('organization','edit'); ?><?php echo "/".$roomList[$key]['faq']."/".$roomList[$key]['id'];?>""">
        <div class="col-lg-3 offset-lg-1 col-md-3 offset-md-1 col-sm-10 offset-sm-2 col-xs-10 offset-xs-2" href="#">
            <p class="titre-organization"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg></p>
        </div>
    </a> -->
</div>
</section>