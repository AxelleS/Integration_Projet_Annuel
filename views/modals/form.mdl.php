<?php
Security::generateCaptcha();
$errors = $config['errors'][0];
?>


<form enctype="multipart/form-data" method="<?php echo $config["config"]["method"];?>" action="<?php echo $config["config"]["action"]; ?>" name="<?php echo $config["config"]["name"];?>">
    <?php if(array_key_exists('signin', $errors)) : ?>
        <p class="errors"><?php echo $errors['signin']; ?></p>
    <?php endif; ?>
	<?php foreach ($config["input"] as $rows):?>
		<div class="row">
		<?php foreach ($rows as $key => $value):?>
		<section class="col-lg-4">
			<fieldset>
        	<legend><?php echo $key; ?></legend>
			<section class="row">
			<?php foreach ($value as $name => $attributs):?>
					<?php if($attributs["type"]=="text" || $attributs["type"]=="email" || $attributs["type"]=="number" || $attributs["type"]=="password"):?>
						<article class="<?php echo $attributs['class']; ?>">
							<label for="<?php echo $name;?>"><?php echo $attributs["placeholder"];?></label>
							<input 
								type="<?php echo $attributs["type"];?>" 
								placeholder="<?php echo $attributs["placeholder"];?>" 
								name="<?php echo $name;?>" 
								id="<?php echo $name;?>"
								value="<?php echo $attributs["value"];?>"
								<?php echo ((isset($attributs["required"])) && ($attributs["required"]))?"required='required'":"";?>
							>
                            <?php if(array_key_exists($name, $errors)) : ?>
                                <p class="errors"><?php echo $errors[$name]; ?></p>
                            <?php endif; ?>
                            <?php if($name == 'password' && array_key_exists('pwd_and_conf', $errors)) : ?>
                                <p class="errors"><?php echo $errors['pwd_and_conf']; ?></p>
                            <?php endif; ?>
						</article>
					<?php endif;?>
					<?php if($attributs["type"]=="file"):?>
						<article class="<?php echo $attributs['class']; ?>">
                            <input
                                type="<?php echo $attributs["type"];?>"
                                name="<?php echo $name;?>"
                                id="<?php echo $name;?>"
                                value="<?php echo $attributs["value"];?>"
                            >
						</article>
					<?php endif;?>
                    <?php if($attributs["type"]=="hidden"):?>
                        <article class="<?php echo $attributs['class']; ?>">
                            <input
                                    type="<?php echo $attributs["type"];?>"
                                    name="<?php echo $name;?>"
                                    id="<?php echo $name;?>"
                                    value="<?php echo $attributs["value"];?>"
                            >
                        </article>
                    <?php endif;?>
					<?php if($attributs["type"]=="checkbox"):?>
					<br>
						<article class="row <?php echo $attributs['class']; ?>">
							<input 
								type="<?php echo $attributs["type"];?>" 
								name="<?php echo $name;?>" 
								id="<?php echo $name;?>"
								class="col-lg-1"
							><?php echo $attributs['text']; ?>
						</article>
					<?php endif;?>
                    <?php if($attributs["type"]=="textarea"):?>
                        <br>
                        <article class="<?php echo $attributs['class']; ?>">
                            <label for="<?php echo $name;?>"><?php echo $attributs["placeholder"];?></label>
                            <textarea
                                    id="<?php echo $name;?>"
                                    name="<?php echo $name;?>"
                                    placeholder="<?php echo $attributs["placeholder"];?>"
                            ><?php echo $attributs["value"]; ?></textarea>
                        </article>
                    <?php endif;?>
                    <?php if($attributs["type"]=="img"):?>
                        <br>
                        <article class="<?php echo $attributs['class']; ?>">
                            <img class="profil-img" src="<?php echo $attributs["value"] != '' ? $attributs["value"] : 'img/no_picture.png';?>">
                        </article>
                    <?php endif;?>
            <?php endforeach;?>
			</section>
			</fieldset>
			</section>
		<?php endforeach;?>
		</div>
	<?php endforeach;?>
    <?php if ($config["config"]["name"] == 'signup') : ?>
    <div class="row">
        <section class="col-lg-4">
            <fieldset>
                <legend>Captcha</legend>
                <section class="row">
                    <img src="captcha.php" alt="captcha">
                    <p>Recopiez le captcha en respectant la casse</p>
                </section>
                <section class="row">
                    <input type="text" class="col-lg-6" name="response_captcha" value="">
                    <?php if(array_key_exists('captcha', $errors)) : ?>
                        <p class="errors"><?php echo $errors['captcha']; ?></p>
                    <?php endif; ?>
                </section>
            </fieldset>
        </section>
	</div>
    <div class="row">
        <section class="col-lg-4">
            <input type="checkbox" name="cgu" class="validation-CGU">J'accepte les <a href="files/CGU.pdf" target="_blank">CGU</a> et les <a href="files/CGV.pdf" target="_blank">CGV</a>
            <?php if(array_key_exists('cgu', $errors)) : ?>
                <p class="errors"><?php echo $errors['cgu']; ?></p>
            <?php endif; ?>
        </section>
    </div>
    <?php endif; ?>
    <div class="row">
        <section class="col-lg-2">

            <input type="submit" class="btn-default" value="Valider">
        </section>
    </div>

	</form>
