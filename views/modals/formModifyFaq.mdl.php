

<form action="<?php echo $config['config']['action']?>"
      class="row" method="<?php echo $config['config']['method']?>">
      <input type="hidden" name="actualPageType" value="<?php echo $config['config']['actualPageTypeValue']?>" />
      
      <p class="<?php echo $config['style']['classText']?>"><?php echo $config['firstQuestion']['descriptionQuestion']?></p>
      <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['firstQuestion']['questionName']?>" value="<?php echo $config['firstQuestion']['question']?>" /> 
      
      <p class="<?php echo $config['style']['classText']?>"><?php echo $config['firstQuestion']['descriptionAnswer']?></p>
      <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['firstQuestion']['answerName']?>" value="<?php echo $config['firstQuestion']['answer']?>" /> 
      
      <p class="<?php echo $config['style']['classText']?>"><?php echo $config['secondQuestion']['descriptionQuestion']?></p>
      <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['secondQuestion']['questionName']?>" value="<?php echo $config['secondQuestion']['question']?>" /> 
      
      <p class="<?php echo $config['style']['classText']?>"><?php echo $config['secondQuestion']['descriptionAnswer']?></p>
      <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['secondQuestion']['answerName']?>" value="<?php echo $config['secondQuestion']['answer']?>" /> 
      
      <p class="<?php echo $config['style']['classText']?>"><?php echo $config['thirdQuestion']['descriptionQuestion']?></p>
      <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['thirdQuestion']['questionName']?>" value="<?php echo $config['thirdQuestion']['question']?>" /> 
      
      <p class="<?php echo $config['style']['classText']?>"><?php echo $config['thirdQuestion']['descriptionAnswer']?></p>
      <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['thirdQuestion']['answerName']?>" value="<?php echo $config['thirdQuestion']['answer']?>" /> 
      
      <a href="<?php echo $config['config']['cancel']?>" class="<?php echo $config['style']['classCancel']?>"><button class="<?php echo $config['style']['buttonCancel']?>">Retour</button></a>
        <input class="<?php echo $config['style']['classValidate']?>" type="<?php echo $config['validate']['type']?>" value="<?php echo $config['validate']['value']?>"></p>  
      </form>