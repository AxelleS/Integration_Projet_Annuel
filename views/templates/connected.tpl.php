<!DOCTYPE html>
<html>
<head>
<base href=<?php echo 'http://'.$_SERVER["SERVER_NAME"].'/'.DIRNAME; ?>>
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
                <li class="unactive" id="mission"><a href="#" title="">NOM USER</a>
                    <ul>        
                        <?php echo '<li><a href="'.DIRNAME.'customerresa" title="">Mes Réservations</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.'customerfacture" title="">Mes Factures</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.'customerinfo" title="">Mes Informations</a></li>'; ?>
                        <?php echo '<li><hr><a href="'.DIRNAME.'customersignout" title="">Déconnexion</a></li>'; ?>                         
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <?php include "views/".$this->v; ?>

    <footer>
        <section class="social-network">           
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"/></svg></a>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z"/></svg></a>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.279 13.52h-.939v5.027h-.908v-5.027h-.94v-.854h2.788v.854zm5.395 1.721v2.406c0 .537-.2.954-.736.954-.296 0-.541-.108-.767-.388v.333h-.813v-5.88h.813v1.893c.183-.222.429-.405.718-.405.59 0 .785.499.785 1.087zm-.83.049c0-.146-.027-.257-.086-.333-.098-.129-.279-.143-.42-.071l-.167.132v2.703l.19.153c.132.066.324.071.413-.045.046-.061.069-.161.069-.299v-2.24zm-2.347-5.859c.229 0 .354-.183.354-.431v-2.119c0-.255-.111-.434-.371-.434-.237 0-.353.185-.353.434v2.119c.001.24.137.431.37.431zm-.733 8.07c-.099.123-.317.325-.475.325-.172 0-.215-.118-.215-.292v-3.325h-.805v3.626c0 .88.597.885 1.031.636.16-.092.315-.227.464-.403v.479h.807v-4.338h-.807v3.292zm13.236-12.501v14c0 2.761-2.238 5-5 5h-14c-2.761 0-5-2.239-5-5v-14c0-2.761 2.239-5 5-5h14c2.762 0 5 2.239 5 5zm-10.566 4.427c0 .45.137.813.592.813.256 0 .611-.133.979-.569v.503h.847v-4.554h-.847v3.457c-.104.129-.333.341-.498.341-.182 0-.226-.124-.226-.307v-3.491h-.847v3.807zm-3.177-2.621v2.233c0 .803.419 1.22 1.24 1.22.682 0 1.218-.456 1.218-1.22v-2.233c0-.713-.531-1.224-1.218-1.224-.745 0-1.24.493-1.24 1.224zm-3.155-2.806l1.135 3.67v2.504h.953v-2.504l1.11-3.67h-.969l-.611 2.468-.658-2.468h-.96zm11.564 11.667c-.014-2.978-.232-4.116-2.111-4.245-1.734-.118-7.377-.118-9.109 0-1.876.128-2.098 1.262-2.111 4.245.014 2.978.233 4.117 2.111 4.245 1.732.118 7.375.118 9.109 0 1.877-.129 2.097-1.262 2.111-4.245zm-1.011-.292v1.104h-1.542v.818c0 .325.027.607.352.607.34 0 .36-.229.36-.607v-.301h.83v.326c0 .836-.358 1.342-1.208 1.342-.771 0-1.164-.561-1.164-1.342v-1.947c0-.753.497-1.275 1.225-1.275.773-.001 1.147.491 1.147 1.275zm-.83-.008c0-.293-.062-.508-.353-.508-.299 0-.359.21-.359.508v.439h.712v-.439z"/></svg></a>
        </section>
        <section class="info">
            <p>NomSociete - Tous droits réservés 2018</p>
            <a href="files/MentionsLegales.pdf" target="_blank">Mentions légales</a>
            <a href="files/CGV.pdf" target="_blank">CGV</a>
            <a href="files/CGU.pdf" target="_blank">CGU</a>
        </section>
    </footer>
</body>
</html>