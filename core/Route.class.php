<?php
class Route{

    static $routes = [
        [
            "slug"       => "contact",
            "controller" => "contact",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "enregistrer-le-message",
            "controller" => "contact",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "mes-factures",
            "controller" => "customerinvoices",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "mes-infos",
            "controller" => "customerinfo",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "modifier-mes-infos",
            "controller" => "users",
            "action"     => "edit",
            "security"   => true
        ],
        [
            "slug"       => "noter-la-partie",
            "controller" => "customeropinion",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "enregistrer-la-note",
            "controller" => "customeropinion",
            "action"     => "save",
            "security"   => true
        ],
        [
            "slug"       => "mes-reservations",
            "controller" => "customerreservations",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "annuler-ma-reservation",
            "controller" => "customerreservations",
            "action"     => "cancel",
            "security"   => true
        ],
        [
            "slug"       => "escaperoom",
            "controller" => "escaperoom",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "faq",
            "controller" => "faq",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "page-accueil",
            "controller" => "index",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "",
            "controller" => "index",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "ma-facture",
            "controller" => "myinvoice",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "reserver",
            "controller" => "reservation",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "reserver-suite",
            "controller" => "reservationnext",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "enregistrer-reservation",
            "controller" => "reservationnext",
            "action"     => "save",
            "security"   => true
        ],
        [
            "slug"       => "se-connecter",
            "controller" => "signin",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "connexion",
            "controller" => "signin",
            "action"     => "connect",
            "security"   => false
        ],
        [
            "slug"       => "s-inscrire",
            "controller" => "signup",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "inscription",
            "controller" => "signup",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "se-deconnecter",
            "controller" => "signout",
            "action"     => "index",
            "security"   => true
        ],
        [
            "slug"       => "page-accueil-admin",
            "controller" => "dashboardadmin",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "statistiques",
            "controller" => "statistics",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "modifier-les-statistiques",
            "controller" => "statistics",
            "action"     => "edit",
            "security"   => false
        ],
        [
            "slug"       => "enregistrer-les-statistiques",
            "controller" => "statistics",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "voir-les-pages-site",
            "controller" => "organization",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "modifier-page-site",
            "controller" => "organization",
            "action"     => "edit",
            "security"   => false
        ],
        [
            "slug"       => "supprimer-page-site",
            "controller" => "organization",
            "action"     => "delete",
            "security"   => false
        ],
        [
            "slug"       => "enregistrer-modification-page",
            "controller" => "organization",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "base-de-donnees",
            "controller" => "database",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "supprimer-enregistrement",
            "controller" => "database",
            "action"     => "delete",
            "security"   => false
        ],
        [
            "slug"       => "calendrier",
            "controller" => "calendar",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "enregistrer-calendrier",
            "controller" => "calendar",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "voir-les-utilisateurs",
            "controller" => "users",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "modifier-utilisateur",
            "controller" => "users",
            "action"     => "edit",
            "security"   => false
        ],
        [
            "slug"       => "ajouter-utilisateur",
            "controller" => "users",
            "action"     => "add",
            "security"   => false
        ],
        [
            "slug"       => "supprimer-utilisateur",
            "controller" => "users",
            "action"     => "delete",
            "security"   => false
        ],
        [
            "slug"       => "enregistrer-utilisateur",
            "controller" => "users",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "parametres",
            "controller" => "parameters",
            "action"     => "index",
            "security"   => false
        ],
        [
            "slug"       => "enregistrer-parametres",
            "controller" => "parameters",
            "action"     => "save",
            "security"   => false
        ],
        [
            "slug"       => "charger-calendrier",
            "controller" => "escaperoom",
            "action"     => "ajaxCalendar",
            "security"   => false
        ],
        [
            "slug"       => "mail-inscription",
            "controller" => "signup",
            "action"     => "mail",
            "security"   => false
        ],
        [
            "slug"       => "mail-mdp-oublie",
            "controller" => "signin",
            "action"     => "lostpassword",
            "security"   => false
        ],
        [
            "slug"       => "mail-reservation",
            "controller" => "reservationnext",
            "action"     => "mail",
            "security"   => false
        ]
    ];

    public static function getRoute($slug)
    {
        foreach (self::$routes as $route) {
            if ($route['slug'] == $slug) {
                return $route;
            }
        }
        return "404";
    }

    public static function getSlug($controller, $action)
    {
        foreach (self::$routes as $route) {
            if (($route['controller'] == $controller) && ($route['action'] == $action)) {
                return $route['slug'];
            }
        }
        return "404";
    }

}