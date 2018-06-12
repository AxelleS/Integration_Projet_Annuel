<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content max-scrollable">
<div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11 organization_content_resize organization_title">
    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Modification de la page FAQ</h1>
  </div>


<div class="row">
<form class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-8 offset-xs-2" method="POST" action="<?php echo DIRNAME.Route::getSlug('organization','save')?>">
  <input type="hidden" name="actualPageType" value="Foire à questions" />
  <input type="hidden" id="lastId" value="<?php echo $lastId;?>">
      <?php foreach ($faqList as $key=>$value) : ?>
          <fieldset class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fieldset-none-center fieldset-content">
              <legend>Question-Réponse</legend>
              <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-style" for="<?php echo 'question_'.$key;?>">Question</label>
              <input type="text" class="organization-input-style" name="<?php echo $key.'[question]';?>" value="<?php echo $value['question'];?>">
              <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="<?php echo 'answer_'.$key;?>">Réponse</label>
              <textarea class="organization-input-style" name="<?php echo $key.'[answer]';?>"><?php echo $value['answer'];?></textarea>
              <input type="button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 addNewQuestion" id="delQA" value="Supprimer la question/réponse">
          </fieldset>
      <?php endforeach; ?>
  <input type="button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 addNewQuestion" id="addQA" value="Ajouter une nouvelle question">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
    <a href="<?php DIRNAME.Route::getSlug('organization','index')?>" class="col-lg-2 offset-lg-3 col-md-2 offset-md-3 col-sm-2 offset-sm-3 col-xs-2 offset-xs-3"><button class="validate-modify-homepage resize-cancel-button">Retour</button></a>
    <input class="col-lg-2 offset-lg-2 col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-xs-2 offset-xs-2 validate-modify-homepage" type="submit" value="sauvegarder">
  </div>
  </form>
  
  <script>
    $(document).ready(function() {
    $('#addQA').click(function() {
      addQA();
      });
    });

    $(document).on("click",".fieldset-content #delQA", function(){
      console.log("toto");
      $(this).parent().remove();
    });

  function addQA(){
    
    var lastId = parseInt($('#lastId').val()) + 1;
    $('#lastId').attr('value', lastId);
    $('#addQA').before(
      '<fieldset class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fieldset-none-center fieldset-content">' +
      '<legend>Question-Réponse</legend>'+
      '<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-style" for="question_'+lastId+'">Question</label>'+
      '<input class="organization-input-style" type="text" name="'+lastId+'[question]" value="">'+
      '<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="answer_'+lastId+'">Réponse</label>'+
      '<textarea class="organization-input-style" name="'+lastId+'[answer]"></textarea>'+
      '<input type="button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 addNewQuestion" id="delQA" value="Supprimer la question/réponse">'+
      '</fieldset>'
    );
      
    }
    
</script>
</div>
</div>
</section>