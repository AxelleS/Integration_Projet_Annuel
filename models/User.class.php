<?php
class User extends BaseSql{

  protected $id = null;
  protected $id_type;
  protected $firstname;
  protected $lastname;
  protected $years_old;
  protected $url_picture = null;
  protected $email;
  protected $phone;
  protected $address;
  protected $address_2 = null;
  protected $zipcode;
  protected $city;
  protected $password;
  protected $token;
  protected $date_inserted;

  protected $status; //Définit l'état de l'utilisateur, 1 banni, 2 toujours ok, etc etc

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setType($id_type) {
      $this->id_type = $id_type;
  }

  public function setFirstname($firstname) {
    $this->firstname=ucfirst(strtolower(trim($firstname)));
  }

  public function setLastname($lastname) {
    $this->lastname=strtoupper(trim($lastname));
  }

  public function setYearsOld($years_old) {
    $this->years_old=$years_old;
  }

  public function setPicture($url_picture) {
    $this->url_picture=$url_picture;
  }

  public function setEmail($email) {
    $this->email=strtolower(trim($email));
  }

  public function setPhone($phone) {
    $this->phone=trim($phone);
  }

  public function setAddress($address) {
    $this->address=strtolower(trim($address));
  }

  public function setAddress2($address_2) {
    $this->address_2=strtolower(trim($address_2));
  }

  public function setZipcode($zipcode) {
    $this->zipcode=trim($zipcode);
  }

  public function setCity($city) {
    $this->city=strtoupper(trim($city));
  }

  public function setPassword($password) {
    $this->password= password_hash($password, PASSWORD_DEFAULT); //possibilité de sécuriser avec des algos plus facilement
    //on peut changer la constante pour mettre à jour le hash plus facilement
  }

  public function setToken($token) {
    $this->token=$token;
  }

  public function setStatus($status) {
    $this->status=$status;
  }

  public function setDateInserted($date_inserted){
    $this->date_inserted=$date_inserted;
  }

  public function configFormUserSignup($errors){
    return [
        "config"=>["method"=>"POST","action"=>DIRNAME.Route::getSlug('users','signup'),"name"=>"signup"],
        "input"=>[
          "A"=>[
            "Personnel"=>[
              "id"=>[
                "type"=>"hidden",
                "required"=>false,
                "value" => $this->id,
                'class' => ''
              ],
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
              "years_old"=>[
                "type"=>"number",
                "placeholder"=>"Votre âge",
                "required"=>true,
                "class" => "col-lg-4",
                "value" => $this->years_old
              ]
            ],
            "Mot de passe"=>[
              "password"=>[
                "type"=>"password",
                "placeholder"=>"Votre mot de passe",
                "required"=>true,
                "class" => "col-lg-12",
                "value" => ''
              ],
              "passwordConf"=>[
                "type"=>"password",
                "placeholder"=>"Votre confirmation",
                "required"=>true,
                "class" => "col-lg-12",
                "value" => '',
                "confirm" => 'password'
              ]
            ]
          ],
          "B"=>[
            "Contact"=>[
              "email"=>[
                "type"=>"email",
                "placeholder"=>"Votre email",
                "required"=>true,
                "class" => "col-lg-5",
                "value" => $this->email
              ],
              "phone"=>[
                "type"=>"text",
                "placeholder"=>"Votre téléphone",
                "required"=>true,
                "class" => "col-lg-5 offset-lg-1",
                "value" => $this->phone,
                "maxString" => 10,
                "minString" =>  10
              ]
            ]
          ],
          "C"=>[
            "Location"=>[
              "address"=>[
                "type"=>"text",
                "placeholder"=>"Votre adresse",
                "required"=>true,
                "class" => "col-lg-12",
                "value" => $this->address
              ],
              "address_2"=>[
                "type"=>"text",
                "placeholder"=>"Votre adresse suite",
                "required"=>false,
                "class" => "col-lg-12",
                "value" => $this->address_2
              ],
              "zipcode"=>[
                "type"=>"text",
                "placeholder"=>"Votre code postal",
                "required"=>true,
                "class" => "col-lg-4",
                "value" => $this->zipcode,
                "maxString" => 5,
                "minString" =>  5
              ],
              "city"=>[
                "type"=>"text",
                "placeholder"=>"Votre ville",
                "required"=>true,
                "class" => "col-lg-5 offset-lg-2",
                "value" => $this->city
              ]
            ]
          ],
          "D"=>[
            "Photo de profil"=>[
                "preview"=>[
                    "type"=>"img",
                    "required"=>false,
                    "class" => "col-lg-12",
                    "value" => $this->url_picture
                ],
              "picture"=>[
                "type"=>"file",
                "required"=>false,
                "class" => "col-lg-12",
                "value" => ''
              ],
              "picture-old"=>[
                "type"=>"hidden",
                "class" => "col-lg-12",
                "value" => $this->url_picture
              ]
            ]
          ]
        ],
        "errors"=>[
            $errors
        ]
    ];
  }

    public function configFormUserInfos($errors){
        return [
            "config"=>["method"=>"POST","action"=>DIRNAME.Route::getSlug('users','saveCustomer'),"name"=>"customer-infos"],
            "input"=>[
                "A"=>[
                    "Personnel"=>[
                        "id"=>[
                            "type"=>"hidden",
                            "required"=>false,
                            "value" => $this->id,
                            'class' => ''
                        ],
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
                        "years_old"=>[
                            "type"=>"number",
                            "placeholder"=>"Votre âge",
                            "required"=>true,
                            "class" => "col-lg-4",
                            "value" => $this->years_old
                        ]
                    ]
                ],
                "B"=>[
                    "Contact"=>[
                        "email"=>[
                            "type"=>"email",
                            "placeholder"=>"Votre email",
                            "required"=>true,
                            "class" => "col-lg-5",
                            "value" => $this->email
                        ],
                        "phone"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre téléphone",
                            "required"=>true,
                            "class" => "col-lg-5 offset-lg-1",
                            "value" => $this->phone,
                            "maxString" => 10,
                            "minString" =>  10
                        ]
                    ]
                ],
                "C"=>[
                    "Location"=>[
                        "address"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre adresse",
                            "required"=>true,
                            "class" => "col-lg-12",
                            "value" => $this->address
                        ],
                        "address_2"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre adresse suite",
                            "required"=>false,
                            "class" => "col-lg-12",
                            "value" => $this->address_2
                        ],
                        "zipcode"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre code postal",
                            "required"=>true,
                            "class" => "col-lg-4",
                            "value" => $this->zipcode,
                            "maxString" => 5,
                            "minString" =>  5
                        ],
                        "city"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre ville",
                            "required"=>true,
                            "class" => "col-lg-5 offset-lg-2",
                            "value" => $this->city
                        ]
                    ]
                ],
                "D"=>[
                    "Photo de profil"=>[
                        "preview"=>[
                            "type"=>"img",
                            "required"=>false,
                            "class" => "col-lg-12",
                            "value" => $this->url_picture
                        ],
                        "picture"=>[
                            "type"=>"file",
                            "required"=>false,
                            "class" => "col-lg-12",
                            "value" => ''
                        ],
                        "picture-old"=>[
                            "type"=>"hidden",
                            "class" => "col-lg-12",
                            "value" => $this->url_picture
                        ]
                    ]
                ]
            ],
            "errors"=>[
                $errors
            ]
        ];
    }

    public function configFormUserAddModifyBO($errors){
        return [
            "config"=>["method"=>"POST","action"=>DIRNAME.Route::getSlug('users','save'),"name"=>"edit"],
            "input"=>[
                "A"=>[
                    "Personnel"=>[
                        "id"=>[
                            "type"=>"hidden",
                            "required"=>false,
                            "value" => $this->id,
                            'class' => ''
                        ],
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
                        "years_old"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre âge",
                            "required"=>true,
                            "class" => "col-lg-4",
                            "value" => $this->years_old
                        ]
                    ]
                ],
                "B"=>[
                    "Contact"=>[
                        "email"=>[
                            "type"=>"email",
                            "placeholder"=>"Votre email",
                            "required"=>true,
                            "class" => "col-lg-5",
                            "value" => $this->email
                        ],
                        "phone"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre téléphone",
                            "required"=>true,
                            "class" => "col-lg-5 offset-lg-1",
                            "value" => $this->phone,
                            "maxString" => 10,
                            "minString" =>  10
                        ]
                    ]
                ],
                "C"=>[
                    "Location"=>[
                        "address"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre adresse",
                            "required"=>true,
                            "class" => "col-lg-12",
                            "value" => $this->address
                        ],
                        "address_2"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre adresse suite",
                            "class" => "col-lg-12",
                            "value" => $this->address_2
                        ],
                        "zipcode"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre code postal",
                            "required"=>true,
                            "class" => "col-lg-4",
                            "value" => $this->zipcode,
                            "maxString" => 5,
                            "minString" =>  5
                        ],
                        "city"=>[
                            "type"=>"text",
                            "placeholder"=>"Votre ville",
                            "required"=>true,
                            "class" => "col-lg-5 offset-lg-2",
                            "value" => $this->city
                        ]
                    ]
                ],
                "D"=>[
                    "Options"=>[
                        "status"=>[
                            "type"=>"select",
                            "class" => "col-lg-4",
                            "value" => $this->status
                        ],
                        "id_type"=>[
                            "type"=>"select",
                            "class" => "col-lg-4",
                            "value" => $this->id_type
                        ]
                    ]
                ]
            ],
            "errors"=>[
                $errors
            ]
        ];
    }

  public function configFormUserConnect($errors){
    return [
        "config"=>["method"=>"POST","action"=>DIRNAME.Route::getSlug('signin','connect'),"name"=>"signin"],
        "input"=>[
          "A"=>[
            "Connexion"=>[
              "email"=>[
                "type"=>"email",
                "placeholder"=>"Votre email",
                "required"=>true,
                "class" => "col-lg-12",
                "value" => $this->email
              ],
              "password"=>[
                "type"=>"password",
                "placeholder"=>"Votre mot de passe",
                "required"=>true,
                "class" => "col-lg-12",
                "value" => ''
              ]
            ]
          ]
        ],
        "errors"=>[
            $errors
        ]
    ];
  }

    public function configFormLostPassword($errors){
        return [
            "config"=>["method"=>"POST","action"=>DIRNAME.Route::getSlug('signin','lostpassword'),"name"=>"lostPassword"],
            "input"=>[
                "A"=>[
                    "Connexion"=>[
                        "email"=>[
                            "type"=>"email",
                            "placeholder"=>"Votre email",
                            "required"=>true,
                            "class" => "col-lg-12",
                            "value" => $this->email
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
