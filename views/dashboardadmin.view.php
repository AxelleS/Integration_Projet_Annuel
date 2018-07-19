<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content">
  <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11">
    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Bienvenue sur le Dashboard</h1>
  </div>
</section>
<div class="row ">
    <div class="col-lg-3 offset-lg-1 col-md-3 offset-md-1 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 placing placing-content content-container content-padding background-content">
      <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Activités</h2>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content-scrollable activities-container">
        <?php foreach ($users as $user) : ?>
          <div class="row placing-content">
            <figure class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
          <img class="avatar-activities" src="<?php echo (isset($user['url_picture']))? DIRNAME.$user['url_picture'] : 'img/user.svg'; ?>" alt="">
            </figure>
            <section class="col-lg-8 offset-lg-1 col-md-8 offset-md-1 col-sm-8 offset-sm-1 col-xs-8 offset-xs-1 center-content">
              <p><b><?php echo $user['lastname'].' '.$user['firstname']; ?></b> vient de s'inscrire !</p>
              <div class="timer-alignment fill-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.848 12.459c.202.038.202.333.001.372-1.907.361-6.045 1.111-6.547 1.111-.719 0-1.301-.582-1.301-1.301 0-.512.77-5.447 1.125-7.445.034-.192.312-.181.343.014l.985 6.238 5.394 1.011z"/></svg>
              <p class="fill-icon icon-placement"><?php echo $user['day'].' '.$user['month'].' '.$user['year']; ?></p></div>
            </section>
          </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 placing-content content-container content-padding">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing background-content content-padding dashboard-chart">
        <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Inscriptions</h2>
        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <canvas class="col-lg-12 col-md-12 col-sm-12 col-xs-12 canvas_dashboard" id="line-chart"></canvas>
            </article>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing placing-content background-content content-padding">
        <div class="row activities-title content-padding">
          <h2 class="col-lg-10 col-md-10 col-sm-10 col-xs-10 message-title-position">Messages</h2>
          <p class="counter-position"><?php echo $nbMessages; ?></p>
        </div>
        <div class="content-scrollable">
          <?php foreach ($contacts as $contact) : ?>
            <div class="row messages-position">
              <section class="col-lg-12 offset-lg-1 col-md-8 offset-md-1 col-sm-8 offset-sm-1 col-xs-8 offset-xs-1 center-content">
                  <div class="row">
                      <b><?php echo $contact['lastname'].' '.$contact['firstname'];?></b>
                      <div class="fill-icon messages-informations"><?php echo $contact['date'].' '.$contact['hour']; ?></div>
                  </div>
                  <div>
                      <p><?php echo $contact['message']; ?></p>
                  </div>
              </section>
            </div>
          <?php endforeach; ?>
        </div>
          <div class="">
            <div class="messages-plus">
                <a href="<?php echo Route::getSlug('contact', 'viewAll'); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg></a>
            </div>
          </div>
      </div>
    </div>
</div>