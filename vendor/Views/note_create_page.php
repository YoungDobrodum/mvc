<?php if (!empty($errors)):?>
<div class="warning">
    <ul>
        <?php foreach($errors as $error):?>
        <li><?= $error?></li>
        <?php endforeach;?>
    </ul>
</div>
<?php endif;?>

<form method="post" action="<?=Route::url('note', 'store')?>">
    <label>Note:
        <input type="text" name="note"/>
    </label>
    <input type="submit" value="Create"/>
</form>