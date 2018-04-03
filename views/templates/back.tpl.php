<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard admin</title>
    <link rel="stylesheet" href="assets/dist/grid.css">
    <link rel="stylesheet" href="assets/dist/default.css">
    <link rel="stylesheet" href="assets/dist/css/main.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
    <script>
      $(document).ready(function(){
        $('.burgerResponsive, .burgerResponsiveSidebar, .overlay').click(function(){
            if($('#sidebar').css('display') == 'block'){
                $('.burgerResponsiveSidebar').css('display','none');
                $('#sidebar').css('display','none');
                $('.logo-dashboard').css('display','block');
                $('.background-container').css('background','');
                $('.background-content').css('background','#FFFFFF');
                $('.content-scrollable').css('overflow-y','auto');
                $('.fill-icon').css('fill','');
                $('.fill-icon').css('color','');
                $('#sidebar').css('display','none');
                $('#sidebar').css('position','');
                $('#sidebar').css('width','');
                // $('.burgerResponsiveSidebar').css('display','none');
                // $('.background-container').css('display','block');
            } else{
                $('.burgerResponsiveSidebar').css('display','block');
                $('.logo-dashboard').css('display','none');
                $('.background-container, .background-content').css('background','rgba(0, 0, 0, 0.6)');
                $('.content-scrollable').css('overflow-y','hidden');
                $('#sidebar').css('display','block');
                $('#sidebar').css('position','fixed');
                $('#sidebar').css('width','50%');
                // $('.fill-icon').css('fill','#000000');
                // $('.fill-icon').css('color','#000000');
                // $('.background-container').css('display','none');
            }
        });
      });
    </script>
  </head>
  <body class="container-fluid">
    <header class="row">
      <div class="overlay"></div>
      <section id="sidebar" class="dashboard-fullheight background-nav navbar-fixed-left col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <figure class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img class="logo-dashboard col-lg-2 offset-lg-4 col-md-2 offset-md-4 col-sm-2 offset-sm-4 col-xs-2 offset-xs-4" src="img/logo.jpg" alt="Logo Play with My CMS">
          <svg class="burgerResponsiveSidebar col-lg-1 offset-lg-5 col-md-1 offset-md-5 col-sm-1 offset-sm-5 col-xs-1 offset-xs-5" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
          <path d="M31.708 25.708c-0-0-0-0-0-0l-9.708-9.708 9.708-9.708c0-0 0-0 0-0 0.105-0.105 0.18-0.227 0.229-0.357 0.133-0.356 0.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13 0.048-0.252 0.124-0.357 0.228 0 0-0 0-0 0l-9.708 9.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057 0.229l-4.586 4.586c-0.286 0.286-0.361 0.702-0.229 1.057 0.049 0.13 0.124 0.252 0.229 0.357 0 0 0 0 0 0l9.708 9.708-9.708 9.708c-0 0-0 0-0 0-0.104 0.105-0.18 0.227-0.229 0.357-0.133 0.355-0.057 0.771 0.229 1.057l4.586 4.586c0.286 0.286 0.702 0.361 1.057 0.229 0.13-0.049 0.252-0.124 0.357-0.229 0-0 0-0 0-0l9.708-9.708 9.708 9.708c0 0 0 0 0 0 0.105 0.105 0.227 0.18 0.357 0.229 0.356 0.133 0.771 0.057 1.057-0.229l4.586-4.586c0.286-0.286 0.362-0.702 0.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z"></path>
          </svg>

        </figure>
        <div class="">
          <?php echo '<a href="'.DIRNAME.'dashboardadmin" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">"'; ?>
            <figure class="row align-navbar-details menu-hover align-border-top">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Accueil</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'statistiques" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M7 24h-6v-6h6v6zm8-9h-6v9h6v-9zm8-4h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Statistiques</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'organisation" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M16 6h-8v-6h8v6zm-10 12h-6v6h6v-6zm18 0h-6v6h6v-6zm-11-7v-3h-2v3h-9v5h2v-3h7v3h2v-3h7v3h2v-5h-9zm2 7h-6v6h6v-6z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Organisation site</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'database" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M22 15.055v2.458c0 1.925-4.655 3.487-10 3.487-5.344 0-10-1.562-10-3.487v-2.458c2.418 1.738 7.005 2.256 10 2.256 3.006 0 7.588-.523 10-2.256zm-10-12.055c-5.344 0-10 1.486-10 3.32s4.656 3.32 10 3.32c5.345 0 10-1.486 10-3.32s-4.655-3.32-10-3.32zm0 8.64c-3.006 0-7.588-.523-10-2.256v2.44c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.44c-2.418 1.738-7.005 2.256-10 2.256z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Base de données</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'calendrier" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M17 1c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-12 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm13 5v10h-16v-10h16zm2-6h-2v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-8v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-2v18h20v-18zm4 3v19h-22v-2h20v-17h2zm-17 7h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Calendrier</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'utilisateurs" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Utilisateurs</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'parametres" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24"><path d="M24 13.616v-3.232c-1.651-.587-2.694-.752-3.219-2.019v-.001c-.527-1.271.1-2.134.847-3.707l-2.285-2.285c-1.561.742-2.433 1.375-3.707.847h-.001c-1.269-.526-1.435-1.576-2.019-3.219h-3.232c-.582 1.635-.749 2.692-2.019 3.219h-.001c-1.271.528-2.132-.098-3.707-.847l-2.285 2.285c.745 1.568 1.375 2.434.847 3.707-.527 1.271-1.584 1.438-3.219 2.02v3.232c1.632.58 2.692.749 3.219 2.019.53 1.282-.114 2.166-.847 3.707l2.285 2.286c1.562-.743 2.434-1.375 3.707-.847h.001c1.27.526 1.436 1.579 2.019 3.219h3.232c.582-1.636.75-2.69 2.027-3.222h.001c1.262-.524 2.12.101 3.698.851l2.285-2.286c-.744-1.563-1.375-2.433-.848-3.706.527-1.271 1.588-1.44 3.221-2.021zm-12 2.384c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z"/></svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Paramètres</p></figcaption>
            </figure>
          <?php echo '</a>'; ?>
          <?php echo '<a href="'.DIRNAME.'signout" title="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 href-style">'; ?>
            <figure class="row align-navbar-details menu-hover">
              <svg version="1.1" class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 fill-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 512 512">
              <title></title>
              <g id="icomoon-ignore">
              </g>
              <path d="M384 320v-64h-160v-64h160v-64l96 96zM352 288v128h-160v96l-192-96v-416h352v160h-32v-128h-256l128 64v288h128v-96z"></path>
              </svg>
              <figcaption class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1 col-xs-6 offset-xs-1 align-navbar-text"><p class="fill-color">Deconnexion</p>  </figcaption>
            </figure>
          <?php echo '</a>'; ?>
        </div>
      </section>
      <section class="col-lg-9 col-md-9 col-sm-9 col-xs-12 background-container"><?php include "views/".$this->v; ?></section></header>
      
      
    <script src="script/chartAnalytics.js"></script>
      
    <!-- <div class="container">
      <section class="align-navbar row col_3">
        <nav class="nav-dashboard-admin">
          <figure>
            <img class="logo-dashboard" src="img/logo.jpg" alt="Logo Play with My CMS">
          </figure>
          <div class="nav-navbar">
              <a href="#">
                <figure class="align-navbar-content">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg>
                  <figcaption>Accueil</figcaption>
              </figure>
            </a>
            <?php echo '<a href="'.DIRNAME.'dashboardadmin" title="">'; ?>
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 24h-6v-6h6v6zm8-9h-6v9h6v-9zm8-4h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>
                <figcaption>Statistiques</figcaption>
              </figure>
            <?php echo '</a>'; ?>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 6h-8v-6h8v6zm-10 12h-6v6h6v-6zm18 0h-6v6h6v-6zm-11-7v-3h-2v3h-9v5h2v-3h7v3h2v-3h7v3h2v-5h-9zm2 7h-6v6h6v-6z"/></svg>
                <figcaption>Organisation du site</figcaption>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 15.055v2.458c0 1.925-4.655 3.487-10 3.487-5.344 0-10-1.562-10-3.487v-2.458c2.418 1.738 7.005 2.256 10 2.256 3.006 0 7.588-.523 10-2.256zm-10-12.055c-5.344 0-10 1.486-10 3.32s4.656 3.32 10 3.32c5.345 0 10-1.486 10-3.32s-4.655-3.32-10-3.32zm0 8.64c-3.006 0-7.588-.523-10-2.256v2.44c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.44c-2.418 1.738-7.005 2.256-10 2.256z"/></svg>
                <figcaption>Base de données</figcaption>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 1c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-12 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm13 5v10h-16v-10h16zm2-6h-2v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-8v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-2v18h20v-18zm4 3v19h-22v-2h20v-17h2zm-17 7h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z"/></svg>
                <figcaption>Calendriers</figcaption>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
                <figcaption>Utilisateurs</figcaption>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 13.616v-3.232c-1.651-.587-2.694-.752-3.219-2.019v-.001c-.527-1.271.1-2.134.847-3.707l-2.285-2.285c-1.561.742-2.433 1.375-3.707.847h-.001c-1.269-.526-1.435-1.576-2.019-3.219h-3.232c-.582 1.635-.749 2.692-2.019 3.219h-.001c-1.271.528-2.132-.098-3.707-.847l-2.285 2.285c.745 1.568 1.375 2.434.847 3.707-.527 1.271-1.584 1.438-3.219 2.02v3.232c1.632.58 2.692.749 3.219 2.019.53 1.282-.114 2.166-.847 3.707l2.285 2.286c1.562-.743 2.434-1.375 3.707-.847h.001c1.27.526 1.436 1.579 2.019 3.219h3.232c.582-1.636.75-2.69 2.027-3.222h.001c1.262-.524 2.12.101 3.698.851l2.285-2.286c-.744-1.563-1.375-2.433-.848-3.706.527-1.271 1.588-1.44 3.221-2.021zm-12 2.384c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z"/></svg>
                <figcaption>Paramètres</figcaption>
              </figure>
            </a>
          </div>
          <header class="header-dashboard-admin">
          <figure class="header-menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.137 3.945c-.644-.374-1.042-1.07-1.041-1.82v-.003c.001-1.172-.938-2.122-2.096-2.122s-2.097.95-2.097 2.122v.003c.001.751-.396 1.446-1.041 1.82-4.667 2.712-1.985 11.715-6.862 13.306v1.749h20v-1.749c-4.877-1.591-2.195-10.594-6.863-13.306zm-3.137-2.945c.552 0 1 .449 1 1 0 .552-.448 1-1 1s-1-.448-1-1c0-.551.448-1 1-1zm3 20c0 1.598-1.392 3-2.971 3s-3.029-1.402-3.029-3h6z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/></svg>
            <div class="header-menu-profil" href="#">
            <img src="img/dashboard/titi.jpg" alt="">
            <svg  class="arrow-rotate" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>
          </figure>
        </header>
        </nav>
      </section> -->



      