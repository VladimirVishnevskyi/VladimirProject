<?php
echo '<p>Ваш комментарий добавлен</p>';


$data = [$data];

$a = 0;
$b = 0;
//echo $data['id'];
//echo $data['name'];
//echo 'Комментарий:' . ' '.$data['text']. ' - ';
//       echo 'Почта:' . ' ' .$data['email'] .' - ';
//       echo 'Дата публицации:' . ' ' .$data['date'] . ' ';
//       echo 'Оценка пользователя: ' . ' '.$data['rating'] . '<br>';
//if ($data['rating']){
//           $b +=1;
//       }
//       $avg = $a / $b;
//echo '<br>Средняя оценка продукта: ' . $avg;

foreach ($data as $datum){
       echo 'Уникальный номер' . ' ' . $datum['id'] . ' - ';
       echo 'Имя Автора:'.' ' . $datum['name'] . ' - ';
       echo 'Комментарий:' . ' '.$datum['text']. ' - ';
       echo 'Почта:' . ' ' .$datum['email'] .' - ';
       echo 'Дата публицации:' . ' ' .$datum['date'] . ' ';
       echo 'Оценка пользователя: ' . ' '.$datum['rating'] . '<br><br>';
//       $a += $datum['rating'];
//       if ($datum['rating']){
//           $b +=1;
//       }
//       $avg = $a / $b;

}
echo '<a href="/main/index">Вернуться на cтрвницу продуктов</a> <br><br>';
//echo '<br>Средняя оценка продукта: ' . $avg;
