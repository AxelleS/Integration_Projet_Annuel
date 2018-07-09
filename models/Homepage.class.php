<?php
class Homepage extends BaseSql{

  protected $id = null;
  protected $id_room_1;
  protected $id_room_2;
  protected $id_room_3;
  protected $title_introduction;
  protected $description_introduction;
  protected $url_video;
  protected $name_company;
  protected $address_company;
  protected $zipcode_company;
  protected $city_company;
  protected $roomList;
  protected $logo;

  protected $foreign;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setIdRoom1($id_room_1) {
    $this->id_room_1=$id_room_1;
  }
  
  public function setIdRoom2($id_room_2) {
    $this->id_room_2=$id_room_2;
  }

  public function setIdRoom3($id_room_3) {
    $this->id_room_3=$id_room_3;
  }

  public function setTitleIntroduction($title_introduction) {
    $this->title_introduction=ucfirst(strtolower(trim($title_introduction)));
  }

  public function setDescriptionIntroduction($description_introduction) {
    $this->description_introduction=trim($description_introduction);
  }

  public function setUrlVideo($url_video) {
    $this->url_video=strtolower(trim($url_video));
  }

  public function setNameCompany($name_company) {
    $this->name_company=ucfirst(strtolower(trim($name_company)));
  }

  public function setAddressCompany($address_company) {
    $this->address_company=strtolower(trim($address_company));
  }

  public function setZipcodeCompany($zipcode_company) {
    $this->zipcode_company=trim($zipcode_company);
  }

  public function setCityCompany($city_company) {
    $this->city_company=strtoupper(trim($city_company));
  }

  public function setRoomList($roomList) {
    $this->roomList=$roomList;
  }

  public function setLogo($logo){
      $this->logo=$logo;
  }

  public function setForeign($foreign){
    $this->foreign=$foreign;
  }

  public function getMapsModal($addr, $city, $zip) {
    $geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
    $adresse = $addr;
    $adresse .= ', '.$zip;
    $adresse .= ', '.$city;

    // Requête envoyée à l'API Geocoding
    $query = sprintf($geocoder, urlencode(utf8_encode($adresse)));

    $result = json_decode(file_get_contents($query));

    $json = isset($result->results[0]) ? $result->results[0] : null;
    $lat = isset( $json->geometry->location->lat) ? (string) $json->geometry->location->lat : null;
    $lng = isset( $json->geometry->location->lng) ? (string) $json->geometry->location->lng : null;

    return "<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href='emg.com/fr'>https://embedgooglemaps.com/fr/</a></small></div><div><small><a href='http://botonmegusta.org/'>fb agregar</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(".$lat.",".$lng."),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(48.849145,2.389659100000017)});infowindow = new google.maps.InfoWindow({content:'<strong>Titre</strong><br>242 rue du faubourg saint antoine<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>";
  }

  public function formModifyHomepage($errors) {
    $homepageValue = new Homepage();
    $response_homepageValue = $homepageValue->select();
    $response = array();
    while($donnees_roomValue = $response_homepageValue->fetchAll()){
      array_push($response, $donnees_roomValue);
    }
    // echo '<pre>';
    // print_r($this->roomList);
    // echo '</pre>';
    // die;

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
      "errors"=>[
          $errors
      ],
      "style"=>[
        "classText"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 form-style",
        "classInput"=>"col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2 organization-input-style",
        "classCancel"=>"col-lg-2 offset-lg-3 col-md-2 offset-md-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2",
        "buttonCancel"=>"col-lg-12 col-md-12 col-sm-12 col-xs-12 validate-modify-homepage resize-cancel-button",
        "classValidate"=>"col-lg-2 offset-lg-3 col-md-2 offset-lg-2 col-sm-2 offset-sm-4 col-xs-2 offset-xs-2 validate-modify-homepage"
      ],
      "value"=>[
        "id"=>$this->id,
        "id_room_1"=>$this->id_room_1,
        "id_room_2"=>$this->id_room_2,
        "id_room_3"=>$this->id_room_3,
        "title_introduction"=>$this->title_introduction,
        "description_introduction"=>$this->description_introduction,
        "url_video"=>$this->url_video,
        "name_company"=>$this->name_company,
        "address_company"=>$this->address_company,
        "zipcode_company"=>$this->zipcode_company,
        "city_company"=>$this->city_company,
        "actualPageTypeValue"=>"Homepage",
        "actualPageType"=>"actualPageType"
      ],
      "roomList"=>$this->roomList,
      "input"=>[
        "id"=>[
          "type"=>"hidden",
          "required"=>false,
          "value" => 1,
        ],
        "title_introduction"=>[
          "type"=>"text",
          "nameView"=>"Titre d'introduction",
          "required"=>true,
          "name"=> "title_introduction"
        ],
        "roomList"=>[
          "room1"=>[
            "nameView"=>"Choisissez votre 1ère room",
            "name"=>"id_room_1"
          ],
          "room2"=>[
            "nameView"=>"Choisissez votre 2ème room",
            "name"=>"id_room_2"
          ],
          "room3"=>[
            "nameView"=>"Choisissez votre 3ème room",
            "name"=>"id_room_3"
          ]
          ],
          "description_introduction"=>[
            "nameView"=>"Description d'introduction",
            "name"=>"description_introduction"
          ],
          "url_video"=>[
            "nameView"=>"URL de la vidéo",
            "name"=>"url_video"
          ],
          "name_company"=>[
            "nameView"=>"Nom de l'entreprise",
            "name"=>"name_company"
          ],
          "address_company"=>[
            "nameView"=>"Adresse de l'entreprise",
            "name"=>"address_company"
          ],
          "zipcode_company"=>[
            "nameView"=>"Code postal de l'entreprise",
            "name"=>"zipcode_company"
          ],
          "city_company"=>[
            "nameView"=>"Ville de l'entreprise",
            "name"=>"city_company"
          ]
      ]
    ];
  }

}

 ?>
