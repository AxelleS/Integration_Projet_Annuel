<pre>
<?php //print_r($config);?>
</pre>

<form method="<?php echo $config["config"]["method"]?>" action="<?php echo DIRNAME.Route::getSlug('users','save'); ?>" name="<?php echo $config["config"]["name"]?>">

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
								<?php echo (isset($attributs["required"]))?"required='required'":"";?>
							>
						</article>
					<?php endif;?>
					<?php if($attributs["type"]=="file" || $attributs["type"]=="hidden"):?>
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
			<?php endforeach;?>
			</section>
			</fieldset>
			</section>
		<?php endforeach;?>
		</div>
	<?php endforeach;?>

	<input type="submit" class="btn-default" value="Valider">
	</form>

