<?php
class Room extends BaseSql{

  protected $id = null;
  protected $name;
  protected $description;
  protected $url_video;
  protected $capacity;
  protected $is_pregnant = 0;
  protected $is_wheelchair = 0;
  protected $is_deaf = 1;
  protected $price;
  protected $status;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setName($name) {
    $this->name=trim($name);
  }

  public function setDescription($description) {
    $this->description=trim($description);
  }

  public function setUrlVideo($url_video) {
    $this->url_video=trim($url_video);
  }

  public function setCapacity($capacity) {
    $this->capacity=$capacity;
  }

  public function setIsPregnant($is_pregnant) {
    $this->is_pregnant=$is_pregnant;
  }

  public function setIsWheelchair($is_wheelchair) {
    $this->is_wheelchair=$is_wheelchair;
  }

  public function setIsDeaf($is_deaf) {
    $this->is_deaf=$is_deaf;
  }

  public function setPrice($price) {
      $this->price=$price;
  }

  public function setStatus($status) {
      $this->status=$status;
  }

  public static function getStatusLibel($status) {
      switch ($status) {
          case ACTIF:
              return 'Active';
              break;
          case INACTIF:
              return 'Inactive';
              break;
          case SUPPRIME:
              return 'Supprimée';
              break;
      }
  }

    public static function getAllStatus() {
        return [
            ACTIF => 'Active',
            INACTIF=> 'Inactive',
            SUPPRIME=> 'Supprimée'
        ];
    }

  public function formModifyRoom($errors, $roomsPictures) {

    return [
      "config"=>[
        "method"=>"POST",
        "action"=>DIRNAME.Route::getSlug('organization','save'),
        "cancel"=>DIRNAME.Route::getSlug('organization','index')
      ],
      "cancel"=>[
        "value"=>"Retour",
        "type"=>"button"
      ],
      "validate"=>[
        "value"=>"Sauvegarder",
        "type"=>"submit"
      ],
      "errors"=>[
          $errors
      ],
      "style"=>[
        "classText"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style",
        "classInput"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style",
        "classDelete"=>" col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage",
        "buttonCancel"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage",
        "classValidate"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage"
      ],
      "pictures"=>$roomsPictures,
      "value"=>[
        "name"=>$this->name,
        "description"=>$this->description,
        "url_video"=>$this->url_video,
        "capacity"=>$this->capacity,
        "is_pregnant"=>$this->is_pregnant,
        "is_wheelchair"=>$this->is_wheelchair,
        "is_deaf"=>$this->is_deaf,
        "price"=>$this->price,
        "status"=>$this->status
      ],
      "id"=>[
        "type"=>"hidden",
        "required"=>true,
        "value" => $this->id,
        "name"=>"id"
      ],
      "actualPageType"=>[
        "type"=>"hidden",
        "required"=>true,
        "value" => $this->id,
        "name"=>"actualPageType"
      ],
      "name"=>[
        "type"=>"text",
        "nameView"=>"Nom",
        "required"=>true,
        "name"=> "name",
        "value"=>$this->name
      ],
      "description"=>[
        "nameView"=>"Description",
        "name"=>"description",
        "value"=>$this->description
      ],
      "url_video"=>[
        "nameView"=>"URL de la vidéo",
        "name"=>"url_video",
        "value"=>$this->url_video
      ],
      "capacity"=>[
        "type"=>"number",
        "nameView"=>"Capacité max",
        "name"=>"capacity",
        "required"=>true,
        "value"=>$this->capacity
      ],
      "price"=>[
          "type"=>"number",
          "nameView"=>"Prix de la salle",
          "name"=>"price",
          "required"=>true,
          "value"=>$this->price
      ],
      "is_pregnant"=>[
        "type"=>"radio",
        "nameView"=>"Adapté aux femmes enceintes",
        "name"=>"is_pregnant",
        "is_pregnant"=>$this->is_pregnant,
        "button_choice"=>[
          "yes"=>[
            "name"=>"Oui",
            "value"=>"1"
          ],
          "no"=>[
            "name"=>"Non",
            "value"=>"0"
          ]
        ]
      ],
      "is_wheelchair"=>[
        "type"=>"radio",
        "nameView"=>"Adapté aux personnes à mobilité réduite",
        "name"=>"is_wheelchair",
        "is_wheelchair"=>$this->is_wheelchair,
        "button_choice"=>[
          "yes"=>[
            "name"=>"Oui",
            "value"=>"1"
          ],
          "no"=>[
            "name"=>"Non",
            "value"=>"0"
          ]
        ]
      ],
      "is_deaf"=>[
        "type"=>"radio",
        "nameView"=>"Adapté aux sourds et malentendants",
        "name"=>"is_deaf",
        "is_deaf"=>$this->is_deaf,
        "button_choice"=>[
          "yes"=>[
            "name"=>"Oui",
            "value"=>"1"
          ],
          "no"=>[
            "name"=>"Non",
            "value"=>"0"
          ]
        ]
      ],
      "status"=>[
          "nameView"=>"Statut",
          "name"=>"status"
      ],
      "allStatus"=>[
          self::getAllStatus()
      ]
    ];

  }

  public function formCreateRoom($errors) {
    return [
      "config"=>[
        "method"=>"POST",
        "action"=>DIRNAME.Route::getSlug('organization','save'),
        "cancel"=>DIRNAME.Route::getSlug('organization','index')
      ],
        "cancel"=>[
            "value"=>"Retour",
            "type"=>"button"
        ],
      "validate"=>[
        "value"=>"sauvegarder",
        "type"=>"submit"
      ],
      "errors"=>[
          $errors
      ],
      "style"=>[
        "classText"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style",
        "classInput"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style",
        "buttonCancel"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage",
        "classValidate"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage"
      ],
      "value"=>[
        "name"=>$this->name,
        "description"=>$this->description,
        "url_video"=>$this->url_video,
        "capacity"=>$this->capacity,
        "is_pregnant"=>$this->is_pregnant,
        "is_wheelchair"=>$this->is_wheelchair,
        "is_deaf"=>$this->is_deaf,
        "price"=>$this->price
      ],
      "id"=>[
        "type"=>"hidden",
        "required"=>true,
        "value" => $this->id,
        "name"=>"id"
      ],
      "actualPageType"=>[
        "type"=>"hidden",
        "required"=>true,
        "value" => "Nouvelle page",
        "name"=>"actualPageType"
      ],
      "name"=>[
        "type"=>"text",
        "nameView"=>"Nom",
        "required"=>true,
        "name"=> "name",
        "value"=>$this->name
      ],
      "description"=>[
        "nameView"=>"Description",
        "name"=>"description",
        "value"=>$this->description
      ],
      "url_video"=>[
        "nameView"=>"URL de la vidéo",
        "name"=>"url_video",
        "value"=>$this->url_video
      ],
      "capacity"=>[
          "type"=>"number",
          "nameView"=>"Capacité max",
          "name"=>"capacity",
          "required"=>true,
          "value"=>$this->capacity
      ],
      "price"=>[
          "type"=>"number",
          "nameView"=>"Prix de la salle",
          "name"=>"price",
          "required"=>true,
          "value"=>$this->price
      ],
      "is_pregnant"=>[
        "type"=>"radio",
        "nameView"=>"Adapté aux femmes enceintes",
        "name"=>"is_pregnant",
        "is_pregnant"=>$this->is_pregnant,
        "button_choice"=>[
          "yes"=>[
            "name"=>"Oui",
            "value"=>"1"
          ],
          "no"=>[
            "name"=>"Non",
            "value"=>"0"
          ]
        ]
      ],
      "is_wheelchair"=>[
        "type"=>"radio",
        "nameView"=>"Adapté aux personnes à mobilité réduite",
        "name"=>"is_wheelchair",
        "is_wheelchair"=>$this->is_wheelchair,
        "button_choice"=>[
          "yes"=>[
            "name"=>"Oui",
            "value"=>"1"
          ],
          "no"=>[
            "name"=>"Non",
            "value"=>"0"
          ]
        ]
      ],
      "is_deaf"=>[
        "type"=>"radio",
        "nameView"=>"Adapté aux sourds et malentendants",
        "name"=>"is_deaf",
        "is_deaf"=>$this->is_deaf,
        "button_choice"=>[
          "yes"=>[
            "name"=>"Oui",
            "value"=>"1"
          ],
          "no"=>[
            "name"=>"Non",
            "value"=>"0"
          ]
        ]
      ],
    ];
  }

}
