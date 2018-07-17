<?php
class Route{

    static $routes = [
        [
            "slug"       => "contact",
            "controller" => "contact",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "enregistrer-le-message",
            "controller" => "contact",
            "action"     => "save",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "mes-factures",
            "controller" => "customerinvoices",
            "action"     => "index",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "mes-infos",
            "controller" => "customerinfo",
            "action"     => "index",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "enregistrer-infos-user",
            "controller" => "users",
            "action"     => "saveCustomer",
            "security"   => false,
            "type"       => 2
        ],
        [
            "slug"       => "enregistrer-signup-user",
            "controller" => "users",
            "action"     => "signup",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "noter-la-partie",
            "controller" => "customeropinion",
            "action"     => "index",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "enregistrer-la-note",
            "controller" => "customeropinion",
            "action"     => "save",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "mes-reservations",
            "controller" => "customerreservations",
            "action"     => "index",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "annuler-ma-reservation",
            "controller" => "customerreservations",
            "action"     => "cancel",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "escaperoom",
            "controller" => "escaperoom",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "faq",
            "controller" => "faq",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "",
            "controller" => "index",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "ma-facture",
            "controller" => "myinvoice",
            "action"     => "index",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "reserver",
            "controller" => "reservation",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "reserver-suite",
            "controller" => "reservationnext",
            "action"     => "index",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "enregistrer-joueurs",
            "controller" => "reservationnext",
            "action"     => "savePlayers",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "enregistrer-reservation",
            "controller" => "reservationnext",
            "action"     => "save",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "se-connecter",
            "controller" => "signin",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "connexion",
            "controller" => "signin",
            "action"     => "connect",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "deconnexion",
            "controller" => "signin",
            "action"     => "disconnect",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "s-inscrire",
            "controller" => "signup",
            "action"     => "index",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "page-accueil-admin",
            "controller" => "dashboardadmin",
            "action"     => "index",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "statistiques",
            "controller" => "statistics",
            "action"     => "index",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "chargement-statistiques",
            "controller" => "statistics",
            "action"     => "ajaxStatistics",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "modifier-les-statistiques",
            "controller" => "statistics",
            "action"     => "edit",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "enregistrer-les-statistiques",
            "controller" => "statistics",
            "action"     => "save",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "voir-les-pages-site",
            "controller" => "organization",
            "action"     => "index",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "modifier-page-site",
            "controller" => "organization",
            "action"     => "edit",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "supprimer-page-site",
            "controller" => "organization",
            "action"     => "delete",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "enregistrer-modification-page",
            "controller" => "organization",
            "action"     => "save",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "calendrier",
            "controller" => "calendar",
            "action"     => "index",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "enregistrer-calendrier",
            "controller" => "calendar",
            "action"     => "ajaxSave",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "voir-les-utilisateurs",
            "controller" => "users",
            "action"     => "index",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "genererer-utilisateurs",
            "controller" => "users",
            "action"     => "generate",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "modifier-utilisateur",
            "controller" => "users",
            "action"     => "edit",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "ajouter-utilisateur",
            "controller" => "users",
            "action"     => "add",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "supprimer-utilisateur",
            "controller" => "users",
            "action"     => "delete",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "enregistrer-utilisateur",
            "controller" => "users",
            "action"     => "save",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "parametres",
            "controller" => "parameters",
            "action"     => "index",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "enregistrer-parametres",
            "controller" => "parameters",
            "action"     => "save",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "charger-calendrier-fo",
            "controller" => "escaperoom",
            "action"     => "ajaxCalendar",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "mail-inscription",
            "controller" => "signup",
            "action"     => "mail",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "mdp-oublie",
            "controller" => "signin",
            "action"     => "lostpassword",
            "security"   => false,
            "type"       => 1
        ],
        [
            "slug"       => "mail-reservation",
            "controller" => "reservationnext",
            "action"     => "mail",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "charger-calendrier-bo",
            "controller" => "calendar",
            "action"     => "ajaxCalendar",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "charger-table-bo",
            "controller" => "calendar",
            "action"     => "ajaxTable",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "voir-les-messages",
            "controller" => "contact",
            "action"     => "viewAll",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "voir-le-message",
            "controller" => "contact",
            "action"     => "openMessage",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "inserer-creneau",
            "controller" => "calendar",
            "action"     => "insertNewSlot",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "changer-mot-de-passe-bo",
            "controller" => "users",
            "action"     => "changePasswordBO",
            "security"   => true,
            "type"       => 1
        ],
        [
            "slug"       => "changer-mot-de-passe-fo",
            "controller" => "users",
            "action"     => "changePasswordFO",
            "security"   => true,
            "type"       => 2
        ],
        [
            "slug"       => "404",
            "controller" => "errors",
            "action"     => "quatreCentQuatre",
            "security"   => false,
            "type"       => 0
        ],
        [
            "slug"       => "403",
            "controller" => "errors",
            "action"     => "quatreCentTrois",
            "security"   => true,
            "type"       => 1
        ]
    ];

    public static function getRoute($slug)
    {
        foreach (self::$routes as $route) {
            if ($route['slug'] == $slug) {
                return $route;
            }
        }
        return [
            "slug"       => "404",
            "controller" => "errors",
            "action"     => "quatreCentQuatre",
            "security"   => false,
            "type"       => 0
        ];
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