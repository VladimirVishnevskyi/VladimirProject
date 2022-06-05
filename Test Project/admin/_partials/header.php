
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title></title>
<head>
<body>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col col-sm-2">
            Hello, <?php echo   $user->login  ?></br>
            <a href="logout.php"><button type="button" class="btn btn-secondary">Logout</button></a>
            <ul>
                <li>
                    <a href="<?=ADMIN_URL?>/front.php?controller=users&action=list">Users</a>
                </li>
                <li>
                    <a href="<?=ADMIN_URL?>/front.php?controller=category&action=list">Categories</a>
                </li> <li>
                    <a href="<?=ADMIN_URL?>/front.php?controller=product&action=list">Products</a>
                </li> <li>
                    <a href="<?=ADMIN_URL?>/front.php?controller=customer&action=list">Customers</a>
                </li> <li>
                    <a href="<?=ADMIN_URL?>/front.php?controller=order&action=list">Orders</a>
                </li>
            </ul>
        </div>
        <div class="col">
