<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Play with my CMS</title>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/dist/grid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/dist/default.css" />
    <!-- Seul CSS à modifier -->
    <link rel="stylesheet" type="text/css" media="screen" href="assets/dist/css/main.css" />
    <!--  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" type="image/ico" href="img/favicon.ico" />

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
        });
    </script>
</head>
<body>
    <header>
        <div class="burger-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg></div>
        <div class="logo"><?php echo '<a href="'.DIRNAME.'index"><img src="img/logo.jpg" alt=""></a>'; ?></div>
        <nav>
            <ul>
                <?php echo '<li class="active"><a href="'.DIRNAME.'index" title="" active>ACCUEIL</a></li>'; ?>
                <li class="unactive" id="mission"><a id="mission-select" href="#" title="">MISSION</a>
                    <ul>        
                        <?php echo '<li><a href="'.DIRNAME.'escaperoom" title="">Escape the Library</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.'escaperoom" title="">Escape the Lab</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.'escaperoom" title="">Escape the School</a></li>'; ?>                        
                    </ul>
                </li>
                <li class="unactive reserver"><a href="#" title="">RESERVER</a></li>
                <?php echo '<li class="unactive"><a href="'.DIRNAME.'faq" title="">FAQ</a></li>'; ?>
                <?php echo '<li class="unactive"><a href="'.DIRNAME.'contact" title="">CONTACT</a></li>'; ?>
                <?php echo '<li class="unactive"><a href="'.DIRNAME.'signin" title="">CONNEXION</a></li>'; ?>
            </ul>
        </nav>
    </header>

    <?php include "views/".$this->v; ?>

    <?php include 'footer.php';?>

</html>