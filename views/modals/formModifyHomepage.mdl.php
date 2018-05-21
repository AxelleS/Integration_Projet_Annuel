<form action="<?php echo $config['config']['action']?>"
      class="row" method="<?php echo $config['config']['method']?>">
      
        <input type="hidden" name="actualPageType" value="<?php echo $config['value']['actualPageTypeValue']?>" />

        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['title_introduction']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>" type="text" name="<?php echo $config['input']['title_introduction']['name']?>" value="<?php echo $config['value']['title_introduction']?>" />
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['roomList']['room1']['nameView']?></p>
        <select name="<?php echo $config['input']['roomList']['room1']['name']?>" id="" class="<?php echo $config['style']['classInput']?>">
        <?php foreach($config['roomList'] as $key=>$value): ?>
                <option value="<?php echo $config['roomList'][$key]['id'];?>"><?php echo $config['roomList'][$key]['name'];?></option>
        <?php endforeach; ?>
        </select>

        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['roomList']['room2']['nameView']?></p>
        <select name="<?php echo $config['input']['roomList']['room2']['name']?>" id="" class="<?php echo $config['style']['classInput']?>">
        <?php foreach($config['roomList'] as $key=>$value): ?>
                <option value="<?php echo $config['roomList'][$key]['id'];?>"><?php echo $config['roomList'][$key]['name'];?></option>
        <?php endforeach; ?>
        </select>

        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['roomList']['room3']['nameView']?></p>
        <select name="<?php echo $config['input']['roomList']['room3']['name']?>" id="" class="<?php echo $config['style']['classInput']?>">
        <?php foreach($config['roomList'] as $key=>$value): ?>
                <option value="<?php echo $config['roomList'][$key]['id'];?>"><?php echo $config['roomList'][$key]['name'];?></option>
        <?php endforeach; ?>
        </select>

        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['description_introduction']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['description_introduction']['name']?>" value="<?php echo $config['value']['description_introduction']?>" /> 
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['url_video']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['url_video']['name']?>" value="<?php echo $config['value']['url_video']?>" />
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['name_company']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['name_company']['name']?>" value="<?php echo $config['value']['name_company']?>" />
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['address_company']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['address_company']['name']?>" value="<?php echo $config['value']['address_company']?>" />
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['zipcode_company']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['zipcode_company']['name']?>" value="<?php echo $config['value']['zipcode_company']?>" />
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['city_company']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['city_company']['name']?>" value="<?php echo $config['value']['city_company']?>" />
        
        <p class="<?php echo $config['style']['classText']?>"><?php echo $config['input']['url_google']['nameView']?></p>
        <input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['input']['url_google']['name']?>" value="<?php echo $config['value']['url_google']?>" />
        
        <a href="<?php echo $config['config']['cancel']?>" class="<?php echo $config['style']['classCancel']?>"><button class="<?php echo $config['style']['buttonCancel']?>">Retour</button></a>
        <input class="<?php echo $config['style']['classValidate']?>" type="<?php echo $config['validate']['type']?>" value="<?php echo $config['validate']['value']?>"></p>
      </form>