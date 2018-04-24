<?php
class Route{

    static $routes = [
        [
            "slug"       => "contact",
            "controller" => "contact",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "enregistrer-le-message",
            "controller" => "contact",
            "action"     => "save",
            "security"   => false,
        ],
        [
            "slug"       => "mes-factures",
            "controller" => "customerinvoices",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "mes-infos",
            "controller" => "customerinfo",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "modifier-mes-infos",
            "controller" => "users",
            "action"     => "edit",
            "security"   => true,
        ],
        [
            "slug"       => "noter-la-partie",
            "controller" => "customeropinion",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "enregistrer-la-note",
            "controller" => "customeropinion",
            "action"     => "save",
            "security"   => true,
        ],
        [
            "slug"       => "mes-reservations",
            "controller" => "customerreservations",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "annuler-ma-reservation",
            "controller" => "customerreservations",
            "action"     => "cancel",
            "security"   => true,
        ],
        [
            "slug"       => "escaperoom",
            "controller" => "escaperoom",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "faq",
            "controller" => "faq",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "page-accueil",
            "controller" => "index",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "",
            "controller" => "index",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "ma-facture",
            "controller" => "myinvoice",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "reserver",
            "controller" => "reservation",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "reserver-suite",
            "controller" => "reservationnext",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "enregistrer-reservation",
            "controller" => "reservationnext",
            "action"     => "save",
            "security"   => true,
        ],
        [
            "slug"       => "se-connecter",
            "controller" => "signin",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "connexion",
            "controller" => "signin",
            "action"     => "connect",
            "security"   => false,
        ],
        [
            "slug"       => "s-inscrire",
            "controller" => "signup",
            "action"     => "index",
            "security"   => false,
        ],
        [
            "slug"       => "inscription",
            "controller" => "signup",
            "action"     => "save",
            "security"   => false,
        ],
        [
            "slug"       => "se-deconnecter",
            "controller" => "signout",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "page-accueil-admin",
            "controller" => "dashboardadmin",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "statistiques",
            "controller" => "statistics",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "modifier-les-statistiques",
            "controller" => "statistics",
            "action"     => "edit",
            "security"   => true,
        ],
        [
            "slug"       => "enregistrer-les-statistiques",
            "controller" => "statistics",
            "action"     => "save",
            "security"   => true,
        ],
        [
            "slug"       => "voir-les-pages-site",
            "controller" => "organizationsite",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "modifier-page-site",
            "controller" => "organizationsite",
            "action"     => "edit",
            "security"   => true,
        ],
        [
            "slug"       => "supprimer-page-site",
            "controller" => "organizationsite",
            "action"     => "delete",
            "security"   => true,
        ],
        [
            "slug"       => "enregistrer-modification-page",
            "controller" => "organizationsite",
            "action"     => "save",
            "security"   => true,
        ],
        [
            "slug"       => "base-de-donnees",
            "controller" => "database",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "supprimer-enregistrement",
            "controller" => "database",
            "action"     => "delete",
            "security"   => true,
        ],
        [
            "slug"       => "calendrier",
            "controller" => "calendar",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "enregistrer-calendrier",
            "controller" => "calendar",
            "action"     => "save",
            "security"   => true,
        ],
        [
            "slug"       => "voir-les-utilisateurs",
            "controller" => "users",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "modifier-utilisateur",
            "controller" => "users",
            "action"     => "edit",
            "security"   => true,
        ],
        [
            "slug"       => "ajouter-utilisateur",
            "controller" => "users",
            "action"     => "add",
            "security"   => true,
        ],
        [
            "slug"       => "supprimer-utilisateur",
            "controller" => "users",
            "action"     => "delete",
            "security"   => true,
        ],
        [
            "slug"       => "enregristrer-utilisateur",
            "controller" => "user",
            "action"     => "save",
            "security"   => true,
        ],
        [
            "slug"       => "parametres",
            "controller" => "parameters",
            "action"     => "index",
            "security"   => true,
        ],
        [
            "slug"       => "enregistrer-parametres",
            "controller" => "parameters",
            "action"     => "save",
            "security"   => true,
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