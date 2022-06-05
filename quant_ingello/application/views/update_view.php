
<form action="<?=$data['path']?>" method="post" >

    Форма обновления продукта<br>
    <input type="hidden" name="id" value="<?=isset($_GET['id']) ? $_GET['id'] : $_POST['id']?>">
    <?=$data['htmlForm']?>
    <input type="submit" /><br>
</form>
