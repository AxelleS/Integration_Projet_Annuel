<?php
class Footer extends BaseSql{

  protected $id = null;
  protected $url_facebook;
  protected $url_twitter;
  protected $url_youtube;
  protected $url_CGV;
  protected $url_CGU;
  protected $url_legal_mention;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setUrlFacebook($url_video) {
    $this->url_video=strtolower(trim($url_video));
  }

  public function setUrlTwitter($url_facebook) {
    $this->url_facebook=strtolower(trim($url_facebook));
  }

  public function setUrlYoutube($url_youtube) {
    $this->url_youtube=strtolower(trim($url_youtube));
  }

  public function setUrlCGV($url_CGV) {
    $this->url_CGV=strtolower(trim($url_CGV));
  }

  public function setUrlCGU($url_CGU) {
    $this->url_CGU=strtolower(trim($url_CGU));
  }

  public function setUrlLegalMention($url_legal_mention) {
    $this->url_legal_mention=strtolower(trim($url_legal_mention));
  }

}

 ?>
