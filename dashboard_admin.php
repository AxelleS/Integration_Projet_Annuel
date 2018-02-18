<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard admin</title>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  </head>
  <body>
    <main class="container row">
      <section class="align-navbar row col_3">
        <nav class="nav-dashboard-admin">
          <figcaption>
            <img class="logo-dashboard" src="img/logo.png" alt="Logo Play with My CMS">
          </figcaption>
          <div class="nav-navbar">
              <a href="#">
                <figure class="align-navbar-content">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg>
                  <p>Accueil</p>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 24h-6v-6h6v6zm8-9h-6v9h6v-9zm8-4h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>
                <p>Statistiques</p>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 6h-8v-6h8v6zm-10 12h-6v6h6v-6zm18 0h-6v6h6v-6zm-11-7v-3h-2v3h-9v5h2v-3h7v3h2v-3h7v3h2v-5h-9zm2 7h-6v6h6v-6z"/></svg>
                <p>Organisation du site</p>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 15.055v2.458c0 1.925-4.655 3.487-10 3.487-5.344 0-10-1.562-10-3.487v-2.458c2.418 1.738 7.005 2.256 10 2.256 3.006 0 7.588-.523 10-2.256zm-10-12.055c-5.344 0-10 1.486-10 3.32s4.656 3.32 10 3.32c5.345 0 10-1.486 10-3.32s-4.655-3.32-10-3.32zm0 8.64c-3.006 0-7.588-.523-10-2.256v2.44c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.44c-2.418 1.738-7.005 2.256-10 2.256z"/></svg>
                <p>Base de données</p>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 1c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-12 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm13 5v10h-16v-10h16zm2-6h-2v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-8v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-2v18h20v-18zm4 3v19h-22v-2h20v-17h2zm-17 7h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z"/></svg>
                <p>Calendriers</p>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
                <p>Utilisateurs</p>
              </figure>
            </a>
            <a href="#">
              <figure class="align-navbar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 13.616v-3.232c-1.651-.587-2.694-.752-3.219-2.019v-.001c-.527-1.271.1-2.134.847-3.707l-2.285-2.285c-1.561.742-2.433 1.375-3.707.847h-.001c-1.269-.526-1.435-1.576-2.019-3.219h-3.232c-.582 1.635-.749 2.692-2.019 3.219h-.001c-1.271.528-2.132-.098-3.707-.847l-2.285 2.285c.745 1.568 1.375 2.434.847 3.707-.527 1.271-1.584 1.438-3.219 2.02v3.232c1.632.58 2.692.749 3.219 2.019.53 1.282-.114 2.166-.847 3.707l2.285 2.286c1.562-.743 2.434-1.375 3.707-.847h.001c1.27.526 1.436 1.579 2.019 3.219h3.232c.582-1.636.75-2.69 2.027-3.222h.001c1.262-.524 2.12.101 3.698.851l2.285-2.286c-.744-1.563-1.375-2.433-.848-3.706.527-1.271 1.588-1.44 3.221-2.021zm-12 2.384c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z"/></svg>
                <p>Paramètres</p>
              </figure>
            </a>
          </div>
        </nav>
      </section>
      <main class="dashboard-main col_13">
        <header class="header-dashboard-admin">
          <div class="logo-website">
            <img src="" alt="">
          </div>
          <div class="">
            <p>test header top</p>
          </div>
        </header>

        <div class="dashboard-title">
          <h1 class="text-color">Bienvenue</h1>
        </div>
        <div class="dashboard-overview placement">
          <div class="dashboard-activities col_5">
            <div class="activities-title">
              <h2 class="text-color title-placement">Activité</h2>
            </div>
            <div class="activities-content">
              <div class="activities-content-one col_16">
                <div class="activities-content-img col_4">
                  <img src="img/dashboard/titi.jpg" alt="">
                </div>
                <div class="activities-content-info col_12">
                  <p><b>Titi</b> vient de s'inscrire</p>
                  <p class="text-timedate">30 Janvier 1996</p>
                </div>
              </div>
              <div class="activities-content-one col_16">
                <div class="activities-content-img col_4">
                  <img src="img/dashboard/titi.jpg" alt="">
                </div>
                <div class="activities-content-info col_12">
                  <p><b>Titi</b> vient de s'inscrire</p>
                  <p class="text-timedate">30 Janvier 1996</p>
                </div>
              </div>
              <div class="activities-content-one col_16">
                <div class="activities-content-img col_4">
                  <img src="img/dashboard/titi.jpg" alt="">
                </div>
                <div class="activities-content-info col_12">
                  <p><b>Titi</b> vient de s'inscrire</p>
                  <p class="text-timedate">30 Janvier 1996</p>
                </div>
              </div>
              <div class="activities-content-one col_16">
                <div class="activities-content-img col_4">
                  <img src="img/dashboard/titi.jpg" alt="">
                </div>
                <div class="activities-content-info col_12">
                  <p><b>Titi</b> vient de s'inscrire</p>
                  <p class="text-timedate">30 Janvier 1996</p>
                </div>
              </div>
              <div class="activities-content-one col_16">
                <div class="activities-content-img col_4">
                  <img src="img/dashboard/titi.jpg" alt="">
                </div>
                <div class="activities-content-info col_12">
                  <p><b>Titi</b> vient de s'inscrire</p>
                  <p class="text-timedate">30 Janvier 1996</p>
                </div>
              </div>
              <div class="">

              </div>
            </div>
          </div>
          <div class="dashboard-social offset_1 col_9">
            <div class="dashboard-analytics">
              <canvas id="line-chart"></canvas>
            </div>
            <div class="dashboard-message">
              <div class="activities-title">
                <h2 class="text-color">Messages</h2>

              </div>
              <div class="activities-content">
                <div class="activities-content-one col_16">
                  <div class="activities-content-img col_4">
                    <img src="img/dashboard/titi.jpg" alt="">
                  </div>
                  <div class="activities-content-info col_12">
                    <p><b>Titi</b><p class="text-timedate">30 Janvier 1996</p></p>
                    <p>Ceci est un message très intéressant ...</p>
                  </div>
                </div>
                <div class="">

                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </main>
  </body>
  <script src="script/chartAnalytics.js" charset="utf-8"></script>
</html>
