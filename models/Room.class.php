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

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setName($name) {
    $this->name=ucfirst(strtolower(trim($name)));
  }

  public function setDescription($description) {
    $this->description=trim($description);
  }

  public function setUrlVideo($url_video) {
    $this->url_video=strtolower(trim($url_video));
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

  public function formModifyRoom() {

    return [
      "config"=>[
        "method"=>"POST",
        "action"=>DIRNAME.Route::getSlug('organization','save'),
        "cancel"=>DIRNAME.Route::getSlug('organization','index')
      ],
      "validate"=>[
        "value"=>"sauvegarder",
        "type"=>"submit"
      ],
      "style"=>[
        "classText"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style",
        "classInput"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style",
        "classCancel"=>"col-lg-2 offset-lg-3 col-md-2 offset-md-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2",
        "classDelete"=>" col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage",
        "buttonCancel"=>"col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage resize-cancel-button",
        "classValidate"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage"
      ],
      "value"=>[
        "name"=>$this->name,
        "description"=>$this->description,
        "url_video"=>$this->url_video,
        "capacity"=>$this->capacity,
        "is_pregnant"=>$this->is_pregnant,
        "is_wheelchair"=>$this->is_wheelchair,
        "is_deaf"=>$this->is_deaf
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
      "title_introduction"=>[
        "type"=>"text",
        "nameView"=>"Titre d'introduction",
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
        "nameView"=>"Capacité max",
        "name"=>"capacity",
        "value"=>$this->capacity
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

  public function formCreateRoom() {
    return [
      "config"=>[
        "method"=>"POST",
        "action"=>DIRNAME.Route::getSlug('organization','save'),
        "cancel"=>DIRNAME.Route::getSlug('organization','index')
      ],
      "validate"=>[
        "value"=>"sauvegarder",
        "type"=>"submit"
      ],
      "style"=>[
        "classText"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style",
        "classInput"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style",
        "classCancel"=>"col-lg-2 offset-lg-3 col-md-2 offset-md-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2",
        "buttonCancel"=>"col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage resize-cancel-button",
        "classValidate"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage"
      ],
      "value"=>[
        "name"=>$this->name,
        "description"=>$this->description,
        "url_video"=>$this->url_video,
        "capacity"=>$this->capacity,
        "is_pregnant"=>$this->is_pregnant,
        "is_wheelchair"=>$this->is_wheelchair,
        "is_deaf"=>$this->is_deaf
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
      "title_introduction"=>[
        "type"=>"text",
        "nameView"=>"Titre d'introduction",
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
        "nameView"=>"Capacité max",
        "name"=>"capacity",
        "value"=>$this->capacity
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

 ?>
