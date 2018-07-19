<?php
$url = explode('/', $_SERVER['REQUEST_URI']);
unset($url[0]);
if($url[1] == str_ireplace('/', '', DIRNAME)) {
    unset($url[1]);
}
$url = array_values($url);
$pageActive = $url[0];
$userMenu = ['mes-infos', 'mes-reservations', 'mes-factures'];

$homepage = new Homepage();
$responseHP = $homepage->select();
$donneesConstante = $responseHP->fetch();

$room = new Room();
$responseRoom = $room->select();

$user = new User();
$user->setId($_SESSION['id_user']);
$donneesUser = $user->select('id')->fetch();
?>
<!DOCTYPE html>
<html>
<head>
<base href=<?php echo 'http://'.$_SERVER["SERVER_NAME"].'/'.DIRNAME; ?>>
    <meta charset="utf-8" />
    <title>Play with my CMS</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIRNAME; ?>assets/dist/grid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIRNAME; ?>assets/dist/default.css" />
    <!-- Seul CSS à modifier -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIRNAME; ?>assets/dist/css/main.css" />
    <!--  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" type="image/ico" href="<?php echo DIRNAME.$donneesConstante['logo']; ?>" />

    <script>
        $(document).ready(function(){
            $('.burger-menu svg').click(function(){
                if($('nav').css('display') == 'block'){
                    $('nav').css('display','none');
                    $('.burger-menu').css('padding-left','1%');
                } else{
                    $('nav').css('display','block');
                    $('.burger-menu').css('padding-left','35%');
                }
            });

            $('#mission-select').click(function(event){
                event.preventDefault();
            });

            $('#user-select').click(function(event){
                event.preventDefault();
            });

        });
    </script>
</head>
<body>
    <header>
        <div class="burger-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg></div>
        <div class="logo"><a href="<?php echo DIRNAME.Route::getSlug('index','index'); ?>"><img src="<?php echo DIRNAME.$donneesConstante['logo']; ?>" alt=""></a></div>
        <nav>
            <ul>
                <li class="<?php echo ($pageActive == 'page-accueil' || $pageActive == '') ? 'active' : 'unactive'; ?>"><a href="<?php echo DIRNAME.Route::getSlug('index','index'); ?>" title="" active>ACCUEIL</a></li>
                <li class="<?php echo $pageActive == 'escaperoom' ? 'active' : 'unactive'; ?>" id="mission"><a id="mission-select" href="" title="">MISSION</a>
                    <ul>
                        <?php while ($donneesRoom = $responseRoom->fetch()) : ?>
                            <?php echo '<li><hr><a href="'.DIRNAME.Route::getSlug('escaperoom','index').'/'.$donneesRoom['id'].'" title="">'.$donneesRoom['name'].'</a></li>'; ?>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="<?php echo $pageActive == 'reserver' ? 'active' : 'unactive'; ?>"><a href="<?php echo DIRNAME.Route::getSlug('reservation','index'); ?>" title="">RESERVER</a></li>
                <li class="<?php echo $pageActive == 'faq' ? 'active' : 'unactive'; ?>"><a href="<?php echo DIRNAME.Route::getSlug('faq','index'); ?>" title="">FAQ</a></li>
                <li class="<?php echo $pageActive == 'contact' ? 'active' : 'unactive'; ?>"><a href="<?php echo DIRNAME.Route::getSlug('contact','index'); ?>" title="">CONTACT</a></li>
                <?php if ($donneesUser['id_type'] == 2) : ?>
                <li class="<?php echo in_array($pageActive, $userMenu) ? 'active' : 'unactive'; ?>" id="user"><a href="" id="user-select" title="">COMPTE</a>
                    <ul> 
                        <li><hr><img src="<?php echo (isset($donneesUser['url_picture']))? $donneesUser['url_picture'] : 'img/user.svg'; ?>"></img></li>       
                        <?php echo '<li><a href="'.DIRNAME.Route::getSlug('customerreservations','index').'" title="">Mes Réservations</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.Route::getSlug('customerinvoices','index').'" title="">Mes Factures</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.Route::getSlug('customerinfo','index').'" title="">Mes Informations</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.Route::getSlug('users','changePasswordFO').'" title="">Changer mot de passe</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.Route::getSlug('signin','disconnect').'" title="">Déconnexion</a></li>'; ?>
                    </ul>
                </li>
                <?php else: ?>
                    <li class="unactive"><a href="<?php echo DIRNAME.Route::getSlug('dashboardadmin','index'); ?>" title="">DASHBOARD</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <?php include "views/templates/footer.tpl.php"; ?>