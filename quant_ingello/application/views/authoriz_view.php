<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/authoriz/authoriz" method="post" >
    <div class="login-box">
        <h3 class="heading__tertiary mb--30">Login</h3>
        Token: <?= @$_COOKIE['token'] ?> </hr><br><br>
        <div>
        <label class="form__label" for="username_email">Username or email address <span class="required">*</span></label>
        </div>
    <input class="form__input" id="login" name="user" type="text" placeholder="Введите ваш логин" /><br>
        <div>
        <label class="form__label" for="login_password">Password <span class="required">*</span></label>
        </div>
    <input class="form__input" id="login" name="password" type="password" placeholder="Введите пароль"  /><br>
        <div class="form__group mr--30">
            <input type="submit" value="Log in" class="btn btn-size-sm">
        </div>
    </div>
</form>
</body>
</html>
