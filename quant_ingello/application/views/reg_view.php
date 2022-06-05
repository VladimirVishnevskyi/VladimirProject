<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<form action="/reg/add_pers" method="post" >
    Форма регистрации пользователя<br>
    <div class="login-box">
        <div class="login_input">
            <?=$data?>
        </div>
    <!--передаем сгенерированную форму по модели персони-->

        <div class="form__group mr--30">
            <input type="submit" value="Sing in" class="btn btn-size-sm">
        </div>
    </div>
</form>


</body>
</html>
