<?php
$errors = $config['errors'][0];
?>
<form enctype="multipart/form-data" action="<?php echo $config['config']['action']?>" class="row" method="<?php echo $config['config']['method']?>">
<input type="hidden" name="<?php echo $config['actualPageType']['name']?>" value="<?php echo $config['actualPageType']['value']?>" />
<input type="hidden" name="<?php echo $config['id']['name']?>" value="<?php echo $config['id']['value']?>" />

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['name']['nameView']?></p>
<input class="<?php echo $config['style']['classInput']?>" type="text" name="<?php echo $config['name']['name']?>" value="<?php echo $config['value']['name']?>" required>
<?php if(array_key_exists('name', $errors)) : ?>
    <p class="errors"><?php echo $errors['name']; ?></p>
<?php endif; ?>

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['description']['nameView']?></p>
<textarea class="<?php echo $config['style']['classInput']?>" name="<?php echo $config['input']['description']['name']?>" required><?php echo $config['value']['description']?></textarea>
<?php if(array_key_exists('description', $errors)) : ?>
    <p class="errors"><?php echo $errors['url_video']; ?></p>
<?php endif; ?>

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['url_video']['nameView']?></p>
<input class="<?php echo $config['style']['classInput']?>"  type="text" name="<?php echo $config['url_video']['name']?>" value="<?php echo $config['value']['url_video']?>" />
<?php if(array_key_exists('url_video', $errors)) : ?>
    <p class="errors"><?php echo $errors['url_video']; ?></p>
<?php endif; ?>

<p class="<?php echo $config['style']['classText']?>"><?= "Images de la Room"?></p>
<input class="<?php echo $config['style']['classInput']?>" type="file" name="1" />
    <?php if (isset($config['pictures'])) : ?>
    <img class="miniature" src="<?php echo DIRNAME.$config['pictures'][0]?>">
    <?php endif; ?>
<input class="<?php echo $config['style']['classInput']?>" type="file" name="2" />
    <?php if (isset($config['pictures'])) : ?>
    <img class="miniature" src="<?php echo DIRNAME.$config['pictures'][1]?>">
    <?php endif; ?>
<input class="<?php echo $config['style']['classInput']?>" type="file" name="3" />
    <?php if (isset($config['pictures'])) : ?>
    <img class="miniature" src="<?php echo DIRNAME.$config['pictures'][2]?>">
    <?php endif; ?>
<input class="<?php echo $config['style']['classInput']?>" type="file" name="4" />
    <?php if (isset($config['pictures'])) : ?>
    <img class="miniature" src="<?php echo DIRNAME.$config['pictures'][3]?>">
    <?php endif; ?>

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['capacity']['nameView']?></p>
<input class="<?php echo $config['style']['classInput']?>"  type="number" name="<?php echo $config['capacity']['name']?>" value="<?php echo $config['value']['capacity']?>" />
<?php if(array_key_exists('capacity', $errors)) : ?>
    <p class="errors"><?php echo $errors['capacity']; ?></p>
<?php endif; ?>

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['price']['nameView']?></p>
<input class="<?php echo $config['style']['classInput']?>"  type="number" name="<?php echo $config['price']['name']?>" value="<?php echo $config['value']['price']?>" />
<?php if(array_key_exists('price', $errors)) : ?>
    <p class="errors"><?php echo $errors['price']; ?></p>
<?php endif; ?>

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['is_pregnant']['nameView']?></p>
<input <?php echo ($config['is_pregnant']['is_pregnant'] === "1" ? "checked": null); ?> class="<?php echo $config['style']['classInput']?>"  type="radio" name="<?php echo $config['is_pregnant']['name']?>" value="<?php echo $config['is_pregnant']['button_choice']['yes']['value']?>"><?php echo $config['is_pregnant']['button_choice']['yes']['name']?>
<input <?php echo ($config['is_pregnant']['is_pregnant'] === "0" ? "checked": null); ?> class="<?php echo $config['style']['classInput']?>"  type="radio" name="<?php echo $config['is_pregnant']['name']?>" value="<?php echo $config['is_pregnant']['button_choice']['no']['value']?>"><?php echo $config['is_pregnant']['button_choice']['no']['name']?>

<p class="<?php echo $config['style']['classText']?>"><?php echo $config['is_wheelchair']['nameView']?></p>
<input <?php echo ($config['is_wheelchair']['is_wheelchair'] === "1" ? "checked": null); ?> class="<?php echo $config['style']['classInput']?>"  type="radio" name="<?php echo $config['is_wheelchair']['name']?>" value="<?php echo $config['is_wheelchair']['button_choice']['yes']['value']?>"><?php echo $config['is_pregnant']['button_choice']['yes']['name']?>
<input <?php echo ($config['is_wheelchair']['is_wheelchair'] === "0" ? "checked": null); ?> class="<?php echo $config['style']['classInput']?>"  type="radio" name="<?php echo $config['is_wheelchair']['name']?>" value="<?php echo $config['is_wheelchair']['button_choice']['no']['value']?>"><?php echo $config['is_pregnant']['button_choice']['no']['name']?>


<p class="<?php echo $config['style']['classText']?>"><?php echo $config['is_deaf']['nameView']?></p>
<input <?php echo ($config['is_deaf']['is_deaf'] === "1" ? "checked": null); ?> class="<?php echo $config['style']['classInput']?>"  type="radio" name="<?php echo $config['is_deaf']['name']?>" value="<?php echo $config['is_deaf']['button_choice']['yes']['value']?>"><?php echo $config['is_pregnant']['button_choice']['yes']['name']?>
<input <?php echo ($config['is_deaf']['is_deaf'] === "0" ? "checked": null); ?> class="<?php echo $config['style']['classInput']?>"  type="radio" name="<?php echo $config['is_deaf']['name']?>" value="<?php echo $config['is_deaf']['button_choice']['no']['value']?>"><?php echo $config['is_pregnant']['button_choice']['no']['name']?>

<?php if (isset($config['status'])) : ?>
<p class="<?php echo $config['style']['classText']?>"><?php echo $config['status']['nameView']?></p>
<select class="<?php echo $config['style']['classInput']?>" id="<?php echo $config['status']['name']?>" name="<?php echo $config['status']['name']?>" onchange="deleteRoom(<?php echo $config['id']['value']; ?>)">
    <?php foreach ($config['allStatus'][0] as $key=>$value) : ?>
        <?php if ($key == $config['value']['status']) : ?>
            <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option>
        <?php else : ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>
<?php endif; ?>

<input class="<?php echo $config['style']['buttonCancel']?>" type="<?php echo $config['cancel']['type']?>" value="<?php echo $config['cancel']['value']?>" onclick="backTo()">
<input class="<?php echo $config['style']['classValidate']?>" type="<?php echo $config['validate']['type']?>" value="<?php echo $config['validate']['value']?>">
</form>

<script>
    function deleteRoom(idRoom) {
        if ($('#status').val() == 3) {
            if (confirm("Etes vous sûr de vouloir supprimer cette room ? Cette action est irréversible ")) {
                location.href = '<?php echo DIRNAME.Route::getSlug('organization', 'delete'); ?>'+'/room/'+idRoom;
            }
        }
    }

    function backTo() {
        window.location.href = "<?php echo $config['config']['cancel']?>";
    }
</script>