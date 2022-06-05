<h1><?=$data['dove']['name']?></h1>
<p>Какой то текст для описания уникальности данного голубя, его текущая голубиность и общение
    с другими подвидами голубей</p>
<p>Id: <?=$data['dove']['id']?></p>
<p>Age: <?=$data['dove']['age']?></p>
<p>Цвет: <div style="width: 10px; height: 10px; background: #<?=$data['dove']['color']?>; display: inline-block;"></div></p>
<p>Пол: <?=($data['dove']['sex'] == 1) ? 'Мужчина' : 'Женщина'?></p>
<a href="/dove/update_dove_form?id=<?=$data['dove']['id']?>">Обновить данние по голубю</a>
<br>
<a href="/dove/delete_dove?id=<?=$data['dove']['id']?>">Обезвредить голубя</a>

<!---<h1><=$data['dove']->name?></h1>
<h1><=$data['dove']->person->name?></h1>-->