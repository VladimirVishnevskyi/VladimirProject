<?php

$categories = \Model\Category\Repository::getAll();
$cart = \Model\Cart\Repository::getCart();

?>

<html>
<head>
    <meta charset="UTF-8">
    <title> Board War</title>
    <link rel="stylesheet" href="static/css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://image.flaticon.com/icons/png/512/107/107620.png">
</head>
<body>
<nav class="nav">
    <div class="container">
        <div class="nav_rov">
            <div class="nav_logo">
                <a href="front.php?controller=index&action=default">Board War</a>
            </div>

            <ul class="nav_list">
                <li>
                    <?php foreach ($categories

                    as $category):; ?>

                <li class="nav_item"><a href="<?php echo $category->getUrl() ?>"><?php echo $category->name ?></a></li>
                <?php endforeach; ?>
            </ul>

            <div class="nav_cart">
                <a href="front.php?controller=cart&action=list" class="nav_cart_link">
                    <span id="cart_qty" class="nav_cart_number"><?php echo $cart->getCount() ?></span>
                    <img src="static/images/cart.jpg" alt="cart">
                </a>
            </div>
            <form class="search" method="get" action="front.php?controller=product&action=search">
                <input type="text" name="query" placeholder="what to look for ?"/>
                <input  type="hidden" name="controller" value="product"/>
                <input  type="hidden" name="action" value="search"/>
                <button type="submit">Search</button>
            </form>

        </div>
    </div>

</nav>

