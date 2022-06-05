<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Payne</title>
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<div class="wrapper">
    <div class="main-content-wrapper">
        <div class="shop-page-wrapper shop-fullwidth ptb--80">
            <div class="container">
                <div class="row mb--50">
                    <div class="col-12">
                        <div class="shop-toolbar">
                            <div class="row align-items-center">
                                <div class="col-md-5 mb-sm--30 mb-xs--10">
                                    <div class="shop-toolbar__left">
                                        <div class="product-ordering">
                                            <select class="product-ordering__select nice-select">
                                                <option value="0">Default Sorting</option>
                                                <option value="1">Relevance</option>
                                                <option value="2">Name, A to Z</option>
                                                <option value="3">Name, Z to A</option>
                                                <option value="4">Price, low to high</option>
                                                <option value="5">Price, high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="shop-toolbar__right">
                                        <p class="product-pages">Showing Result 08 Among 72</p>
                                        <div class="product-view-mode ml--50 ml-xs--0">
                                            <a class="active" href="#" data-target="grid">
                                                <img src="/assets/img/icons/grid.png" alt="Grid">
                                            </a>
                                            <a href="#" data-target="list">
                                                <img src="/assets/img/icons/list.png" alt="Grid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid shop-products">
                <div class="row">
                    <?php foreach ($data['products'] as $index_product => $product) : ?>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb--50">
                            <div class="payne-product">
                                <div class="product__inner">
                                    <div class="product__image">
                                        <figure class="product__image--holder">
                                            <img src="/assets/img/products/product-03-270x300.jpg" alt="Product">
                                        </figure>
                                        <a href="/main/product_show?id=<?= $product['id'] ?>"
                                           class="product__overlay"></a>
                                        <div class="product__action">
                                            <a data-toggle="modal" data-target="#productModal" class="action-btn">
                                                <i class="fa fa-eye"></i>
                                                <span class="sr-only">Quick View</span>
                                            </a>
                                            <a href="wishlist.html" class="action-btn">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="sr-only">Add to wishlist</span>
                                            </a>
                                            <a href="compare.html" class="action-btn">
                                                <i class="fa fa-repeat"></i>
                                                <span class="sr-only">Add To Compare</span>
                                            </a>
                                            <a href="cart.html" class="action-btn">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="sr-only">Add To Cart</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__info">
                                        <div class="product__info--left">
                                            <h3 class="product__title">
                                                <a href="/main/product_show?id=<?= $product['id'] ?>"><?= $product['title'] ?></a>
                                            </h3>
                                            <div class="product__price">
                                                <span class="money"><?= $product['price'] ?></span>
                                                <span class="sign">$</span>
                                            </div>
                                        </div>
                                        <div class="product__info--right">
                                            <div style="float: right" class="star-rating star-<?= $product['rating'] ?>">
                                                <span>Rated <strong class="rating"></strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payne-product-list">
                                <div class="product__inner">
                                    <figure class="product__image">
                                        <a href="product-details.html" class="d-block">
                                            <img src="/assets/img/products/product-03-270x300.jpg" alt="Products">
                                        </a>
                                        <div class="product__thumbnail-action">
                                            <a data-toggle="modal" data-target="#productModal"
                                               class="action-btn quick-view">
                                                <i class="fa fa-eye"></i>
                                                <span class="sr-only">Quick View</span>
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="product__info">
                                        <h3 class="product__title">
                                            <a href="product-details.html"><?= $product['title'] ?></a>
                                        </h3>
                                        <div class="product__price">
                                            <span class="money"><?= $product['price'] ?></span>
                                            <span class="sign">$</span>
                                        </div>
                                        <div style="float: left"
                                             class="star-rating star-<?= $product['rating'] ?>">
                                            <span>Rated <strong class="rating"></strong></span>
                                        </div>
                                        <br>
                                        <p class="product__short-description">
                                            Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna
                                            molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam
                                            egestas libero ac turpis pharetra
                                        </p>
                                        <div class="d-flex product__list-action">
                                            <a href="cart.html" class="btn btn-size-sm">Add To Cart</a>
                                            <a href="compare.html" class="action-btn">
                                                <i class="fa fa-repeat"></i>
                                                <span class="sr-only">Add To Compare</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-wrap mt--35 mt-md--25">
                            <ul class="pagination">
                                <li><span class="page-number current">1</span></li>
                                <li><a href="#" class="page-number">2</a></li>
                                <li><span class="dot"></span></li>
                                <li><span class="dot"></span></li>
                                <li><span class="dot"></span></li>
                                <li><a href="#" class="page-number">16</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->

    <!-- Footer Start-->

    <!-- Footer End-->

    <!-- OffCanvas Menu Start -->
    <aside class="offcanvas-navigation" id="offcanvasnav">
        <div class="offcanvas-navigation__inner">
            <a href="" class="btn-close">
                <i class="flaticon-cross"></i>
                <span class="sr-only">Close Offcanvas Navigtion</span>
            </a>
            <div class="offcanvas-navigation__top">
                <ul class="offcanvas-menu">
                    <li class="has-children">
                        <a href="#">
                            <span class="mm-text">Home</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="has-children">
                                <a href="index.html">
                                    <span class="mm-text">Home One</span>
                                </a>
                            </li>
                            <li class="has-children">
                                <a href="index-02.html">
                                    <span class="mm-text">Home Two</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop.html">
                            <span class="mm-text">New Arrivals</span>
                        </a>
                    </li>
                    <li class="has-children">
                        <a href="#">
                            <span class="mm-text">Shop</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="has-children">
                                <a href="#">
                                    <span class="overlay-menu__title">Shop Layout</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="shop-fullwidth.html">
                                            <span class="mm-text">Full Width</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop.html">
                                            <span class="mm-text">Left Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-right-sidebar.html">
                                            <span class="mm-text">Right Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-three-columns.html">
                                            <span class="mm-text">Three Columns</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-four-columns.html">
                                            <span class="mm-text">Four Columns</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-list.html">
                                            <span class="mm-text">Full Width</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-list-sidebar.html">
                                            <span class="mm-text">Left Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-list-right-sidebar.html">
                                            <span class="mm-text">Right Sidebar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">
                                    <span class="overlay-menu__title">Single Product</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="product-details.html">
                                            <span class="mm-text">Tab Style 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-tab-style-2.html">
                                            <span class="mm-text">Tab Style 2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-tab-style-3.html">
                                            <span class="mm-text">Tab Style 3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-gallery-left.html">
                                            <span class="mm-text">Gallery Left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-gallery-right.html">
                                            <span class="mm-text">Gallery Right</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-sticky-left.html">
                                            <span class="mm-text">Sticky Left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-sticky-right.html">
                                            <span class="mm-text">Sticky Right</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-slider-box.html">
                                            <span class="mm-text">Slider Box</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-slider-full-width.html">
                                            <span class="mm-text">Slider Box Full Width</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-affiliate.html">
                                            <span class="mm-text">Affiliate Proudct</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-variable.html">
                                            <span class="mm-text">Variable Proudct</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details-group.html">
                                            <span class="mm-text">Group Product</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">
                                    <span class="overlay-menu__title">Shop Pages</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="my-account.html">
                                            <span class="mm-text">My Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cart.html">
                                            <span class="mm-text">Shopping Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="checkout.html">
                                            <span class="mm-text">Check Out</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">
                                            <span class="mm-text">Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="order-tracking.html">
                                            <span class="mm-text">Order tracking</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="compare.html">
                                            <span class="mm-text">compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#">
                            <span class="mm-text">Pages</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="my-account.html">
                                    <span class="mm-text">My Account</span>
                                </a>
                            </li>
                            <li>
                                <a href="checkout.html">
                                    <span class="mm-text">Checkout</span>
                                </a>
                            </li>
                            <li>
                                <a href="cart.html">
                                    <span class="mm-text">Cart</span>
                                </a>
                            </li>
                            <li>
                                <a href="compare.html">
                                    <span class="mm-text">Compare</span>
                                </a>
                            </li>
                            <li>
                                <a href="order-tracking.html">
                                    <span class="mm-text">Track Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html">
                                    <span class="mm-text">Wishlist</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact-us.html">
                            <span class="mm-text">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- OffCanvas Menu End -->

    <!-- Mini Cart Start -->
    <aside class="mini-cart" id="miniCart">
        <div class="mini-cart-wrapper">
            <div class="mini-cart__close">
                <a href="#" class="btn-close"><i class="flaticon-cross"></i></a>
            </div>
            <div class="mini-cart-inner">
                <h3 class="mini-cart__heading mb--45">Shopping Cart</h3>
                <div class="mini-cart__content">
                    <ul class="mini-cart__list">
                        <li class="mini-cart__product">
                            <a href="#" class="mini-cart__product-remove">
                                <i class="flaticon-cross"></i>
                            </a>
                            <div class="mini-cart__product-image">
                                <img src="/assets/img/products/product-11-90x90.jpg" alt="products">
                            </div>
                            <div class="mini-cart__product-content">
                                <a class="mini-cart__product-title" href="product-details.html">Lexbaro Begadi</a>
                                <span class="mini-cart__product-quantity">1 x $49.00</span>
                            </div>
                        </li>
                        <li class="mini-cart__product">
                            <a href="#" class="mini-cart__product-remove">
                                <i class="flaticon-cross"></i>
                            </a>
                            <div class="mini-cart__product-image">
                                <img src="/assets/img/products/product-12-90x90.jpg" alt="products">
                            </div>
                            <div class="mini-cart__product-content">
                                <a class="mini-cart__product-title" href="product-details.html">Lexbaro Begadi</a>
                                <span class="mini-cart__product-quantity">1 x $49.00</span>
                            </div>
                        </li>
                        <li class="mini-cart__product">
                            <a href="#" class="mini-cart__product-remove">
                                <i class="flaticon-cross"></i>
                            </a>
                            <div class="mini-cart__product-image">
                                <img src="/assets/img/products/product-13-90x90.jpg" alt="products">
                            </div>
                            <div class="mini-cart__product-content">
                                <a class="mini-cart__product-title" href="product-details.html">Lexbaro Begadi</a>
                                <span class="mini-cart__product-quantity">1 x $49.00</span>
                            </div>
                        </li>
                    </ul>
                    <div class="mini-cart__total">
                        <span>Subtotal</span>
                        <span class="ammount">$98.00</span>
                    </div>
                    <div class="mini-cart__buttons">
                        <a href="cart.html" class="btn btn-fullwidth btn-bg-primary mb--20">View Cart</a>
                        <a href="checkout.html" class="btn btn-fullwidth btn-bg-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Mini Cart End -->

    <!-- Qicuk View Modal Start -->
    <div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="flaticon-cross"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="element-carousel slick-vertical-center" data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
                                }'>
                                <div class="item">
                                    <figure class="product-gallery__image">
                                        <img src="/assets/img/products/product-03-270x300.jpg" alt="Product">
                                        <span class="product-badge sale">Sale</span>
                                    </figure>
                                </div>
                                <div class="item">
                                    <figure class="product-gallery__image">
                                        <img src="/assets/img/products/product-04-270x300.jpg" alt="Product">
                                        <span class="product-badge sale">Sale</span>
                                    </figure>
                                </div>
                                <div class="item">
                                    <figure class="product-gallery__image">
                                        <img src="/assets/img/products/product-05-270x300.jpg" alt="Product">
                                        <span class="product-badge sale">Sale</span>
                                    </figure>
                                </div>
                                <div class="item">
                                    <figure class="product-gallery__image">
                                        <img src="/assets/img/products/product-06-270x300.jpg" alt="Product">
                                        <span class="product-badge sale">Sale</span>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="modal-box product-summary">
                                <div class="product-navigation text-right mb--20">
                                    <a href="#" class="prev"><i class="fa fa-angle-double-left"></i></a>
                                    <a href="#" class="next"><i class="fa fa-angle-double-right"></i></a>
                                </div>
                                <div class="product-rating d-flex mb--20">
                                    <div class="star-rating star-four">
                                        <span>Rated <strong class="rating">5.00</strong> out of 5</span>
                                    </div>
                                </div>
                                <h3 class="product-title mb--20">Golden Easy Spot Chair.</h3>
                                <p class="product-short-description mb--20">Donec accumsan auctor iaculis. Sed suscipit
                                    arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget,
                                    sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus
                                    scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit arcu.</p>
                                <div class="product-price-wrapper mb--25">
                                    <span class="money">$200.00</span>
                                    <span class="price-separator">-</span>
                                    <span class="money">$400.00</span>
                                </div>
                                <form action="#" class="variation-form mb--20">
                                    <div class="product-size-variations d-flex align-items-center mb--15">
                                        <p class="variation-label">Size:</p>
                                        <div class="product-size-variation variation-wrapper">
                                            <div class="variation">
                                                <a class="product-size-variation-btn selected" data-toggle="tooltip"
                                                   data-placement="top" title="S">
                                                    <span class="product-size-variation-label">S</span>
                                                </a>
                                            </div>
                                            <div class="variation">
                                                <a class="product-size-variation-btn" data-toggle="tooltip"
                                                   data-placement="top" title="M">
                                                    <span class="product-size-variation-label">M</span>
                                                </a>
                                            </div>
                                            <div class="variation">
                                                <a class="product-size-variation-btn" data-toggle="tooltip"
                                                   data-placement="top" title="L">
                                                    <span class="product-size-variation-label">L</span>
                                                </a>
                                            </div>
                                            <div class="variation">
                                                <a class="product-size-variation-btn" data-toggle="tooltip"
                                                   data-placement="top" title="XL">
                                                    <span class="product-size-variation-label">XL</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="reset_variations">Clear</a>
                                </form>
                                <div class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                    <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                        <label class="quantity-label" for="qty">Quantity:</label>
                                        <div class="quantity">
                                            <input type="number" class="quantity-input" name="qty" id="qty" value="1"
                                                   min="1">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-shape-square btn-size-sm"
                                            onclick="window.location.href='cart.html'">
                                        Add To Cart
                                    </button>
                                </div>
                                <div class="product-footer-meta">
                                    <p><span>Category:</span>
                                        <a href="shop.html">Full Sweater</a>,
                                        <a href="shop.html">SweatShirt</a>,
                                        <a href="shop.html">Jacket</a>,
                                        <a href="shop.html">Blazer</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qicuk View Modal End -->

    <!-- Global Overlay Start -->
    <div class="global-overlay"></div>
    <!-- Global Overlay End -->

    <!-- Scroll To Top Start -->
    <a class="scroll-to-top" href=""><i class="fa fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->
</div>
<script src="/assets/js/vendor.js"></script>
<!---->
<!-- Main JS -->
<script src="/assets/js/main.js"></script>
</body>
</html>