<h1>Голуби</h1>
<p>Добавить голубя в голубятню: <a href="/dove/add_dove_form">Перейти</a></p>

<?php foreach($doves as $index_dove => $dove) : ?>
        <h4 style="color: #<?= $dove['color'] ?> ">
            <?=$dove['name']?>
        </h4>

        <a href="/dove/dove_show?id=<?=$dove['id']?>">
          Перейти на страницу голубя
        </a>
    <br>
        <a href="/dove/delete_dove?id=<?=$dove['id']?>">Обезвредить голубя</a>
        <hr>
<?php endforeach; ?>
<?php if(isset($pages)) :
    for($i = 1; $i <= $pages; $i++) :
        if($i == $activePage){ echo "<span>$i</span>"; continue;}
    ?>
        <a href="/dove/index?page=<?=$i?>&doves=<?=$dovesOnPage?>"><?=$i?></a>
<?php endfor; endif ?>
