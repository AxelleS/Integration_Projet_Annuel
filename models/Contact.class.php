<?php
class Contact extends BaseSql{

  protected $id = null;
  protected $firstname;
  protected $lastname;
  protected $email;
  protected $subject;
  protected $content;
  protected $phone = null;
  protected $is_read = 0;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setFirstname($firstname) {
    $this->firstname=ucfirst(strtolower(trim($firstname)));
  }

  public function setLastname($lastname) {
    $this->lastname=ucfirst(strtoupper(trim($lastname)));
  }

  public function setEmail($email) {
    $this->email=strtolower(trim($email));
  }

  public function setPhone($phone) {
    $this->phone=trim($phone);
  }

  public function setSubject($subject) {
    $this->subject=trim($subject);
  }

  public function setContent($content) {
    $this->content=trim($content);
  }

  public function setIsRead($is_read) {
    $this->is_read=$is_read;
  }

  public function configFormContact($errors){
    return [
      "config"=>["method"=>"POST","action"=>DIRNAME.Route::getSlug('contact','save'),"name"=>"contact"],
      "input"=>[
        "A"=>[
          "Contact"=>[
            "lastname"=>[
            "type"=>"text",
            "placeholder"=>"Votre nom",
            "required"=>true,
            "class" => "col-lg-5",
            "value" => $this->lastname
            ],
            "firstname"=>[
              "type"=>"text",
              "placeholder"=>"Votre prénom",
              "required"=>true,
              "class" => "col-lg-5 offset-lg-1",
              "value" => $this->firstname
            ],
            "email"=>[
              "type"=>"email",
              "placeholder"=>"Votre email",
              "required"=>true,
              "class" => "col-lg-5",
              "value" => $this->email
            ],
            "phone"=>[
              "type"=>"number",
              "placeholder"=>"Votre téléphone",
              "required"=>false,
              "class"=>"col-lg-5 offset-lg-1",
              "value"=> $this->phone
            ],
            "object"=>[
              "type"=>"text",
              "placeholder"=>"Objet de votre demande",
              "required"=>true,
              "class"=>"col-lg-12",
              "value"=>$this->subject
            ],
            "message"=>[
              "type"=>"textarea",
              "placeholder"=>"Votre message",
              "required"=>true,
              "class"=>"col-lg-12",
              "value"=>$this->content
            ]
          ]
          
        ]
      ],
      "errors"=>[
          $errors
      ]
    ];
  }
}
?>
