<html>
<head>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link rel="stylesheet" href="/WebSite/site/static/css/form.css">
    <title>Google reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<form method="post" action="auth.php">
    <h1>Login to admin panel</h1>
    <div>
        <input type="text" name="login" placeholder="login">
    </div>
    <div>
        <input type="password" name="password" placeholder="Password">
    </div>
    <div class="g-recaptcha" data-sitekey="6LcHU7cbAAAAAG7mBbK_mEtHC9em4fyo3xUZtd13"></div>
    <div>
        <div>
            <input type="checkbox" class="form-check-input">
            <label>
                Remember me
        </div>
    </div>
    <button type="submit">Sign in</button>
</form>
</body>

</html>
