<?php


echo '<h1><b>All COMMENTS</b></h1>';


$data = [$data];

$a = 0;
$b = 0;
foreach ($data as $datum) {
    foreach ($datum as $item) {
        foreach ($item as $value) {
            echo 'Уникальный номер' . ' ' . $value['id'] . ' - ';
            echo 'Имя Автора:' . ' ' . $value['name'] . ' - ';
            echo 'Комментарий:' . ' ' . $value['text'] . ' - ';
            echo 'Почта:' . ' ' . $value['email'] . ' - ';
            echo 'Дата публицации:' . ' ' . $value['date'] . ' ';
            echo 'Оценка пользователя: ' . ' ' . $value['rating'] . '<br><br>';
            $a += $value['rating'];
            if ($value['rating']) {
                $b += 1;
            }
            $avg = $a / $b;
        }
    }
}
echo '<a href="/main/index">Вернуться на cтрвницу продуктов</a> <br><br>';
echo '<br>Средняя оценка продукта: ' . $avg;
