<?php
class Faq extends BaseSql{

  protected $id = null;
  private $question;
  private $answer;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setQuestion($question) {
    $this->question=$question;
  }

  public function setAnswer($answer) {
    $this->answer=$answer;
  }

  public function setDescription($description) {
    $this->description=trim($description);
  }

  public function formModifyFaq() {

    $faqList = new Faq();
    $response_faqList = $faqList->select();

    $donnees_faqList = array();
    while($details_faqList = $response_faqList->fetchAll()){
        array_push($donnees_faqList, $details_faqList);
    }

    // echo '<pre>';
    // print_r($donnees_faqList);
    // echo '</pre>';
    // die;

    return [
      "config"=>[
        "method"=>"POST",
        "action"=>DIRNAME.Route::getSlug('organization','save'),
        "cancel"=>DIRNAME.Route::getSlug('organization','index'),
        "actualPageTypeValue"=>"Foire à questions"
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
      "firstQuestion"=>[
        "questionName"=>"question_1",
        "answerName"=>"answer_1",
        "descriptionQuestion"=>"Modifiez votre première question : ",
        "descriptionAnswer"=>"Modifiez votre première réponse : ",
        "question"=>$donnees_faqList[0][0]['question'],
        "answer"=>$donnees_faqList[0][0]['answer'],
      ],
      "secondQuestion"=>[
        "questionName"=>"question_2",
        "answerName"=>"answer_2",
        "descriptionQuestion"=>"Modifiez votre deuxième question : ",
        "descriptionAnswer"=>"Modifiez votre deuxième réponse : ",
        "question"=>$donnees_faqList[0][1]['question'],
        "answer"=>$donnees_faqList[0][1]['answer']
      ],
      "thirdQuestion"=>[
        "questionName"=>"question_3",
        "answerName"=>"answer_3",
        "descriptionQuestion"=>"Modifiez votre troisième question : ",
        "descriptionAnswer"=>"Modifiez votre troisième réponse : ",
        "question"=>$donnees_faqList[0][2]['question'],
        "answer"=>$donnees_faqList[0][2]['answer']
      ]
    ];
  }

}

 ?>
