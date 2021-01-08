<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon/favicon-1.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- icon css include -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/flaticon-package-1.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="=css/flaticon-package-2.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/flaticon-package-3.css"> -->

    <!-- carousel css include -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.theme.default.min.css') }}">

    <!-- others css include -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/magnific-popup.css') }}">

    @yield('css')

    <!-- custom css include -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style_custom.css') }}">

</head>


<body class="home-shoes-2">

<!-- backtotop - start -->
<div id="thetop" class="thetop"></div>
<div class='backtotop'>
    <a href="#" class='scroll'>
        <i class="fas fa-arrow-up"></i>
    </a>
</div>
<!-- backtotop - end -->


<!-- preloader - start -->
{{--<div id="preloader"></div>--}}
<!-- preloader - end -->


<!-- header-section (bicycle-header) - start
================================================== -->
<header id="header-section" class="header-section clearfix">
    <div id="bicycle-header" class="bicycle-header clearfix">

        <div class="header-top bg-past clearfix">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="header-top-left ul-li">
                            <ul class="clearfix">

                                <li>{{ __('main.online_shop') }}</li>
                                <li>
                                    <ul class="social-links">
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-pinterest"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>

                    {{--<div class="col-lg-4">--}}
                        {{--<div class="header-top-middle text-center">--}}
                            {{--<p class="discount-text">--}}
                                {{--Получите скидку <strong><u>25%</u></strong> на заказы от <strong><u>5000₽</u></strong> и больше--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="col-lg-8">
                        <div class="header-top-right ul-li-right">
                            <ul class="clearfix">

                                <li>
                                    <form action="{{ route('currency') }}">
                                        <select id="currencySelectElement" onchange="changeCurrency()" class="storm-select" name="currency" data-symbol="{{ \App\Services\CurrencyConversion::currencySymbol() }}" data-placeholder="Choose a currency...">
                                            @foreach($currenciesHF as $currencyHF)
                                                <option value="{{ $currencyHF->code }}" @if(session('currency') == $currencyHF->code)selected @endif>{{ $currencyHF->code }}</option>
                                            @endforeach
                                        </select>
                                        <button id="currency-button" type="submit" hidden></button>
                                    </form>
                                </li>

                                <li>
                                    <form action="{{ route('locale') }}">
                                        <select onchange="changeLocale()" class="storm-select" name="locale" data-placeholder="Choose a Language...">
                                            <option value="ru" @if(session('locale') == 'ru')selected @endif>Русский</option>
                                            <option value="en" @if(session('locale') == 'en')selected @endif>English</option>
                                        </select>
                                        <button id="locale-button" type="submit" hidden></button>
                                    </form>
                                </li>


                                @guest
                                    <li><a href="{{ route('login') }}">{{ __('main.buttons.login') }}</a></li>
                                @endguest
                                @auth
                                    @if(Auth::user()->privilege == 1)
                                        <li><a href="{{ route('admin') }}">{{ __('main.admin_panel') }}</a></li>
                                        <li><a href="{{ route('personal', Auth::user()->id) }}">{{ Auth::user()->first_name }}</a></li>
                                    @else
                                        <li><a href="{{ route('personal', Auth::user()->id) }}">{{ Auth::user()->first_name }}</a></li>
                                    @endif

                                    <li><a href="{{ route('get_logout') }}">{{ __('main.buttons.logout') }}</a></li>
                                @endauth

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-bottom bg-white clearfix">
            <div class="container">
                <div class="main-menu">
                    <div class="row">

                        <div class="col-lg-2">
                            <div class="brand-logo">
                                <a href="{{ route('index') }}" class="logo">
                                    <img src="{{ URL::asset('images/brand-logo/logo-1.png') }}" alt="logo_not_found">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="main-menu-list ul-li-center">
                                <ul class="clearfix">

                                    <li class="menu-item-has-children @if(Route::currentRouteNamed('index')) active @endif">
                                        <a href="{{ route('index') }}">{{ __('main.menu.main') }}</a>
                                        <!--<ul class="sub-menu clearfix">-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">Bicycle home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-bicycle-1.html">bicycle home v.1</a></li>-->
                                        <!--<li><a href="home-bicycle-2.html">bicycle home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">digital home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-digital-1.html">digital home v.1</a></li>-->
                                        <!--<li><a href="home-digital-2.html">digital home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">fashion home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-fashion-1.html">fashion home v.1</a></li>-->
                                        <!--<li><a href="home-fashion-2.html">fashion home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">food home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-food-1.html">food home v.1</a></li>-->
                                        <!--<li><a href="home-food-2.html">food home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">furniture home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-furniture-1.html">furniture home v.1</a></li>-->
                                        <!--<li><a href="home-furniture-2.html">furniture home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">jewellry home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-jewellry-1.html">jewellry home v.1</a></li>-->
                                        <!--<li><a href="home-jewellry-2.html">jewellry home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">shoes home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-shoes-1.html">shoes home v.1</a></li>-->
                                        <!--<li><a href="home-shoes-2.html">shoes home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">sunglass home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-sunglass-1.html">sunglass home v.1</a></li>-->
                                        <!--<li><a href="home-sunglass-2.html">sunglass home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">tools home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-tools-1.html">tools home v.1</a></li>-->
                                        <!--<li><a href="home-tools-2.html">tools home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children">-->
                                        <!--<a href="#!">watches home</a>-->
                                        <!--<ul class="sub-menu">-->
                                        <!--<li><a href="home-watches-1.html">watches home v.1</a></li>-->
                                        <!--<li><a href="home-watches-2.html">watches home v.2</a></li>-->
                                        <!--</ul>-->
                                        <!--</li>-->
                                        <!--</ul>-->
                                    </li>

                                    <li class="menu-item-has-children has-mega-menu @if(Route::currentRouteNamed(['catalog', 'category', 'brand', 'brand_category', 'product'])) active @endif">
                                        <a href="{{ route('catalog') }}">{{ __('main.menu.catalog') }}</a>
                                        <ul class="mega-menu clearfix" style="background-image: url({{ Storage::url('images/header_footer/mega-menu-bg-2.jpg') }});">
                                            @if(!empty($categoriesHF))
                                            <li>
                                                <span class="title-text color-past mb-30">{{ __('main.menu.categories') }}</span>
                                                <ul class="menu-item-list clearfix">
                                                    @foreach($categoriesHF as $categoryHF)
                                                        <li><a href="{{ route('category', $categoryHF->code) }}">{{ $categoryHF->__('name') }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif

                                            <li>
                                                <span class="title-text color-past mb-30">{{ __('main.menu.brands') }}</span>
                                                <ul class="menu-item-list clearfix">
                                                    @foreach($brandsHF as $brandHF)
                                                        <li><a href="{{ route('brand', $brandHF->code) }}">{{ $brandHF->__('name') }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="@if(Route::currentRouteNamed('about')) active @endif"><a href="{{ route('about') }}">{{ __('main.menu.about') }}</a></li>
                                    <li class="menu-item-has-children @if(Route::currentRouteNamed(['blog', 'blog_category', 'article', 'tag_blog'])) active @endif">
                                        <a href="{{ route('blog') }}">{{ __('main.menu.blog') }}</a>
                                        {{--<ul class="sub-menu clearfix">--}}
                                            {{--<li><a href="blog.html">Blog page</a></li>--}}
                                            {{--<li><a href="blog-details.html">Blog details</a></li>--}}
                                        {{--</ul>--}}
                                    </li>
                                    <li class="@if(Route::currentRouteNamed('contacts')) active @endif"><a href="{{ route('contacts') }}">{{ __('main.menu.contacts') }}</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="btns-list ul-li-right">

                                <div class="main-search">
                                    <form action="{{ route('search') }}" method="get">
                                        <input type="search" name="search" placeholder="{{ __('main.search.search_input') }}">
                                        <button type="submit" class="search-btn">
                                            <i class="flaticon-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <ul class="clearfix">
                                    <li class="wishlist-btn">
                                        @if(Auth::check())
                                            <a href="{{ route('desires', Auth::user()->id) }}">
                                                <i class="flaticon-heart"></i>
                                                <span id="wishlist_count-element" class="item-counter bg-past">{{ count($desiresHF) }}</span>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}">
                                                <i class="flaticon-heart"></i>
                                                {{--<span class="item-counter bg-past">0</span>--}}
                                            </a>
                                        @endif

                                        {{--<div class="wishlist-items-container no-items">--}}
                                            {{--<span class="empty-text">--}}
                                            {{--<i class="flaticon-shopping-basket"></i> У вас нет товаров в вашем списке желаний.--}}
                                            {{--</span>--}}

                                            {{--<div id="hf_wishlist-products_wrapper">--}}
                                                {{--@if(!empty($cartHF))--}}
                                                    {{--@php($i=1) @foreach($cartHF as $cartProductHF)--}}
                                                        {{--@if($i != 1)<div class="wishlist_space-element"></div> @endif--}}
                                                        {{--<div id="hf_wishlist-product-{{ $cartProductHF['id'] }}" class="wishlist-item clearfix flex-container">--}}
                                                            {{--<div class="wishlist_image-container image-container">--}}
                                                                {{--<img src="{{  URL::asset($cartProductHF['image_1']) }}" alt="image_not_found">--}}
                                                            {{--</div>--}}

                                                            {{--<div class="item-content clearfix">--}}
                                                                {{--<a href="" class="wishlist_item-title item-title mb-15">{{ $cartProductHF['name'] }}</a>--}}
                                                                {{--<div class="item-price mb-30 flex-container">--}}
                                                                    {{--<strong class="color-black">{{ $cartProductHF['price'] }}₽</strong>--}}
                                                                {{--</div>--}}

                                                                {{--<div class="wishlist_product-description"></div>--}}

                                                                {{--<ul class="clearfix">--}}
                                                                    {{--<li>--}}
                                                                    {{--<button type="button" class="edit-btn"><i class="flaticon-pencil"></i></button>--}}
                                                                    {{--</li>--}}
                                                                    {{--<li>--}}
                                                                        {{--<button onclick="" type="button" class="remove-btn"><i class="flaticon-dustbin"></i></button>--}}
                                                                    {{--</li>--}}
                                                                {{--</ul>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--@php($i++) @endforeach--}}
                                                {{--@endif--}}
                                            {{--</div>--}}

                                            {{--<div class="wishlist_text-bottom">Показанно 2 желания из 46</div>--}}

                                        {{--</div>--}}
                                    </li>

                                    <li class="cart-btn">
                                        <a href="{{ route('cart') }}">
                                            <i class="flaticon-shopper"></i>
                                            <span id="mini-cart_count" class="item-counter bg-past">{{ count(session('cart.products')) }}</span>
                                        </a>
                                        <div class="price">
                                            <span>Ваша корзина</span>
                                            <strong>1299₽</strong>
                                        </div>
                                        <div class="cart-items-container has-items">
                                            <h2 id="mini-cart_top-info" class="title-text @if(empty($cartHF)) display-none @endif">{{ __('cart.added_title') }}</h2>

                                            <!-- шаблон продукта для добавления в корзину header через js --- -->
                                            <div id="hf_cart-product-template" class="cart-item clearfix display-none">
                                                <div class="image-container">
                                                    <img class="hf-img-teg" src="" alt="image_not_found"> <!-- $ -->
                                                </div>

                                                <div class="item-content clearfix">
                                                    <h3 class="item-title mb-15"></h3>
                                                    <div class="item-price mb-30 flex-container">
                                                        <strong class="for-inner-price color-black"></strong>

                                                        <div class="hf_cart-product_sku-values flex-container"></div>
                                                    </div>
                                                    <ul class="clearfix">
                                                        <li>
                                                            <span class="qty-text">{{ __('cart.quantity') }}</span>
                                                            <input onkeyup="this.value = this.value.replace(/[^\d]/g,'1');" oninput="updateProductInCart(this)" data-id="" data-product-id="" data-sku-values=""
                                                            data-position="header" class="quantity-input quantity_get-value" name="quantity" type="number" value="1" min="1" placeholder="quantity">
                                                        </li>
                                                        <li>
                                                            <button onclick="removeProductCart()" type="button" class="remove-btn"><i class="flaticon-dustbin"></i></button> <!-- $ -->
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- шаблон продукта для добавления в корзину header через js end -->


                                            <!-- шаблон пустой корзины -------------------------------------- -->
                                            <div id="mini-cart_empty-wrapper" class="mini-cart_empty-wrapper @if(!empty($cartHF)) display-none @endif">
                                                <div class="mini-cart_empty-text">{{ __('cart.empty') }}</div>
                                            </div>
                                            <!-- шаблон пустой корзины ---------------------------------- end -->

                                            <div id="hf_cart-products_wrapper">
                                                @if(!empty($cartHF))
                                                @foreach($cartHF as $cartProductHF)
                                                    <div id="hf_cart-product-{{ $cartProductHF['id'] }}" class="cart-item clearfix">
                                                        <div class="image-container">
                                                            <img src="{{  URL::asset($cartProductHF['image_1']) }}" alt="image_not_found">
                                                        </div>
                                                        <div class="item-content clearfix">
                                                            {{--<h3 class="item-title mb-15">{{ $cartProductHF['name'] }}</h3>--}}
                                                            <h3 class="item-title mb-15">{{ \App\Models\Product::where('id', $cartProductHF['product_id'])->first()->__('name') }}</h3>

                                                            <div class="item-price mb-30 flex-container">
                                                                <strong class="color-black">{{ \App\Services\CurrencyConversion::convert($cartProductHF['price']) }}</strong>

                                                                <div class="hf_cart-product_sku-values flex-container">
                                                                @foreach(\App\Models\Sku::where('id', $cartProductHF['id'])->first()->skuValues as $skuValue)
                                                                    <p>&nbsp;&nbsp;&nbsp;<b>{{ $skuValue->attributeValue->attribute->__('name') }}:</b> {{ $skuValue->attributeValue->__('name') }}</p>
                                                                @endforeach
                                                                </div>

                                                                {{--<del>359₽</del>--}}

                                                                {{--<div class="flex-container">--}}
                                                                {{--@foreach($cartProductHF['sku']->skuValues as $skuValue)--}}
                                                                    {{--<p><b>{{ $skuValue->attributeValue->attribute->name }}:</b> {{ $skuValue->attributeValue->name }}</p>--}}
                                                                {{--@endforeach--}}
                                                                {{--</div>--}}

                                                            </div>
                                                            <ul class="clearfix">
                                                                <li>
                                                                    <span class="qty-text">{{ __('cart.quantity') }}</span>

                                                                    <input onkeyup="this.value = this.value.replace(/[^\d]/g,'1');" oninput="updateProductInCart(this)" data-id="{{ $cartProductHF['id'] }}" data-product-id="{{ $cartProductHF['product_id'] }}"
                                                                    data-sku-values="@php($i=0)@foreach(\App\Models\Sku::where('id', $cartProductHF['id'])->first()->skuValues as $skuValue)@if($i>0),@endif{{$skuValue->attributeValue->value}}@php($i++)@endforeach"
                                                                    @if(Route::current()->getName() == 'cart')data-position="header-cart" @else data-position="header" @endif class="quantity-input quantity_get-value" name="quantity" type="number" value="{{ $cartProductHF['quantity'] }}" min="1" placeholder="quantity">

                                                                </li>
                                                                {{--<li>--}}
                                                                    {{--<button type="button" class="edit-btn"><i class="flaticon-pencil"></i></button>--}}
                                                                {{--</li>--}}
                                                                <li>
                                                                    <button onclick="removeProductCart({{ $cartProductHF['id'] }})" type="button" class="remove-btn"><i class="flaticon-dustbin"></i></button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </div>

                                            <div id="mini-cart_bottom-info" class="footer-container clearfix @if(empty($cartHF)) display-none @endif">
                                                <div class="footer-left clearfix">
                                                    <div class="total-price">
                                                        {{ __('cart.total') }} <strong id="mini-cart_total-price" class="color-black">{{ App\Http\Controllers\CartController::getTotalSum() }}</strong>
                                                    </div>
                                                </div>
                                                <div class="footer-right ul-li-right clearfix">
                                                    <ul class="clearfix">
                                                        <li><a href="{{ route('cart') }}">{{ __('cart.cart') }}</a></li>
                                                        <li><a href="{{ route('checkout') }}">{{ __('cart.checkout') }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</header>

<!-- mobile-menu - start -->
<div class="mobile-menu">
    <div class="container">
        <div class="brand-logo float-left">
            <a href="#!" class="logo">
                <img src="{{ URL::asset('images/brand-logo/logo-1.png') }}" alt="logo_not_found">
            </a>
        </div>
        <button type="button" id="sidebarCollapse" class="menu-btn bg-past float-right">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</div>
<!-- mobile-menu - end -->

<div class="mobile-menu-wrapper">
    <div id="sidebar">
        <div id="dismiss"><i class="fas fa-arrow-left"></i></div>

        <div class="brand-logo">
            <a href="#!" class="logo">
                <img src="{{ URL::asset('images/brand-logo/logo-1.png') }}" alt="logo_not_found">
            </a>
        </div>

        <!-- btns-group - start -->
        <div class="btns-group ul-li-center mb-30">
            <ul class="clearfix">
                <li><a href="#!"><i class="flaticon-user"></i></a></li>
                <li>
                    <a href="#!">
                        <i class="flaticon-heart"></i>
                        <small class="item-counter bg-past">1</small>
                    </a>
                </li>
                <li>
                    <a href="#!">
                        <i class="flaticon-shopper"></i>
                        <small class="item-counter bg-past">2</small>
                    </a>
                </li>
            </ul>
        </div>
        <!-- btns-group - end -->

        <!-- search-bar - start -->
        <div class="search-bar mb-60">
            <div class="form-item m-0">
                <input type="search" placeholder="search...">
                <button type="submit" class="form-item-btn">
                    <i class="flaticon-search"></i>
                </button>
            </div>
        </div>
        <!-- search-bar - end -->

        <!-- home-pages - start -->
        <div class="home-pages">
            <div class="sidebar-title mb-15">
                <h2>
                    all home pages
                </h2>
            </div>
            <ul class="list-unstyled components">
                <li class="menu-item-has-child active">
                    <a href="#bicycle-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fas fa-bicycle"></i></span>
                        bicycle
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="bicycle-submenu">
                        <li><a href="home-bicycle-1.html">bicycle v.1</a></li>
                        <li><a href="home-bicycle-2.html">bicycle v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#digital-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fas fa-bolt"></i></span>
                        digital
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="digital-submenu">
                        <li><a href="home-digital-1.html">digital v.1</a></li>
                        <li><a href="home-digital-2.html">digital v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#fashion-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fab fa-slideshare"></i></span>
                        fashion
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="fashion-submenu">
                        <li><a href="home-fashion-1.html">fashion v.1</a></li>
                        <li><a href="home-fashion-2.html">fashion v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#food-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fab fa-gulp"></i></span>
                        food
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="food-submenu">
                        <li><a href="home-food-1.html">food v.1</a></li>
                        <li><a href="home-food-2.html">food v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#furniture-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon">F</span>
                        furniture
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="furniture-submenu">
                        <li><a href="home-furniture-1.html">furniture v.1</a></li>
                        <li><a href="home-furniture-2.html">furniture v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#jewelry-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="far fa-gem"></i></span>
                        jewelry
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="jewelry-submenu">
                        <li><a href="home-jewellry-1.html">jewelry v.1</a></li>
                        <li><a href="home-jewellry-2.html">jewelry v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#shoes-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon">S</span>
                        shoes
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="shoes-submenu">
                        <li><a href="home-shoes-1.html">shoes v.1</a></li>
                        <li><a href="home-shoes-2.html">shoes v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#sunglass-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon">S</span>
                        sunglass
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="sunglass-submenu">
                        <li><a href="home-sunglass-1.html">sunglass v.1</a></li>
                        <li><a href="home-sunglass-2.html">sunglass v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#tools-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fas fa-wrench"></i></span>
                        tools
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="tools-submenu">
                        <li><a href="home-tools-1.html">tools v.1</a></li>
                        <li><a href="home-tools-2.html">tools v.2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#watches-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="far fa-clock"></i></span>
                        watches
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="watches-submenu">
                        <li><a href="home-watches-1.html">watches v.1</a></li>
                        <li><a href="home-watches-2.html">watches v.2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- home-pages - end -->

        <!-- home-pages - start -->
        <div class="home-pages">
            <div class="sidebar-title mb-15">
                <h2>
                    single pages here
                </h2>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="about.html">
                        <span class="icon"><i class="flaticon-user"></i></span>
                        about us
                    </a>
                </li>
                <li class="menu-item-has-child">
                    <a href="#blog-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="far fa-square"></i></span>
                        our blog
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="blog-submenu">
                        <li><a href="blog.html">blog page</a></li>
                        <li><a href="blog-details.html">blog details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#product-grid-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fas fa-th"></i></span>
                        product grid
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="product-grid-submenu">
                        <li><a href="product-grid-left-sidebar.html">left sidebar</a></li>
                        <li><a href="product-grid-right-sidebar.html">right sidebar</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-child">
                    <a href="#product-list-submenu" data-toggle="collapse" aria-expanded="false">
                        <span class="icon"><i class="fas fa-th-list"></i></span>
                        product list
                    </a>
                    <ul class="sub-menu collapse list-unstyled" id="product-list-submenu">
                        <li><a href="product-list-left-sidebar.html">left sidebar</a></li>
                        <li><a href="product-list-right-sidebar.html">right sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="product-details.html">
                        <span class="icon"><i class="fas fa-info"></i></span>
                        product details
                    </a>
                </li>
                <li>
                    <a href="shopping-cart.html">
                        <span class="icon"><i class="flaticon-cart"></i></span>
                        shopping cart
                    </a>
                </li>
                <li>
                    <a href="#!">
                        <span class="icon"><i class="flaticon-check-box"></i></span>
                        checkout
                    </a>
                </li>
                <li>
                    <a href="contact.html">
                        <span class="icon"><i class="flaticon-phone-call"></i></span>
                        contact us
                    </a>
                </li>
                <li>
                    <a href="404.html">
                        <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                        404 error
                    </a>
                </li>
            </ul>
        </div>
        <!-- home-pages - end -->

        <!-- login-signup - start -->
        <div class="login-signup ul-li-center mb-30 clearfix">
            <ul class="clearfix">
                <li><a href="login-register.html">login</a></li>
                <li><a href="login-register.html">sign up</a></li>
            </ul>
        </div>
        <!-- login-signup - end -->

        <!-- footer-area - start -->
        <div class="footer-area ul-li-center text-center">
            <div class="mb-15">
                <ul class="social-links">
                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#!"><i class="fas fa-rss"></i></a></li>
                    <li><a href="#!"><i class="fab fa-pinterest"></i></a></li>
                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <p class="m-0">
                Copyright 2018 © Powered by <a href="#!"><strong class="color-past">Storm</strong></a>
            </p>
        </div>
        <!-- footer-area - end -->

    </div>

    <div class="overlay"></div>
</div>
<!-- header-section (bicycle-header) - end
================================================== -->

@if(session()->has('notification')) <!-- если заказ оформлен успешно -->
<!-- Large Modal -->
<div id="notification-modal-large" class="notification-modal display-block" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="notification-modal-dialog modal-lg" role="document">
        <div class="notification-modal-content">
            <div class="notification-block block-themed block-transparent mb-0">
                <div class="notification-block-header bg-primary-dark">
                    <h3 class="notification-block-title">{{ __('notifications.notification') }}</h3>
                    <div class="notification-block-options">
                        <button type="button" class="notification-btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="notification-block-content">
                    <p>{{ session()->get('notification') }}</p>
                </div>
            </div>
            <div class="notification-modal-footer">
                <button onclick="notificationClose()" type="button" class="notification-btn btn-alt-secondary" data-dismiss="modal">{{ __('notifications.close') }}</button>
                {{--<button type="button" class="notification-btn btn-alt-success" data-dismiss="modal">--}}
                {{--<i class="fa fa-check"></i> Perfect--}}
                {{--</button>--}}
            </div>
        </div>
    </div>
</div>
<!-- END Large Modal -->
@endif
{{--@if(session()->has('warning'))--}}
    {{--{{ session()->get('warning') }}--}}
{{--@endif--}}

@yield('content')


<!-- footer-section (default-footer) - start
================================================== -->
<footer id="footer-section" class="footer-section clearfix">
    <div class="default-footer">

        <!-- footer-top - start -->
        <div class="footer-top bg-past clearfix">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-logo">
                            <a href="{{ route('index') }}" class="brand-logo">
                                <img src="{{ URL::asset('images/brand-logo/logo-0.png') }}" alt="logo_not_found">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="footer-menu ul-li-center">
                            <ul class="clearfix">

                                <li><a href="{{ route('index') }}">{{ __('main.menu.main') }}</a></li>
                                <li><a href="{{ route('catalog') }}">{{ __('main.menu.catalog') }}</a></li>
                                <li><a href="{{ route('about') }}">{{ __('main.menu.about') }}</a></li>
                                <li><a href="{{ route('blog') }}">{{ __('main.menu.blog') }}</a></li>
                                <li><a href="{{ route('contacts') }}">{{ __('main.menu.contacts') }}</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-social-links clearfix ul-li-right">
                            <ul class="clearfix">

                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- footer-top - end -->

        <!-- footer-middle - start -->
        <div class="footer-middle">
            <div class="container">

                <div class="row">

                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="footer-contact ul-li-block">
                            <h2 class="footer-title">{{ __('main.menu.contacts') }}</h2>
                            <ul class="clearfix">

                                <li>
											<span class="icon">
												<i class="flaticon-maps-and-flags"></i>
											</span>
                                    <div class="contact-text"><strong>{{ __('main.footer.contacts.address') }}: </strong> {{ __('main.footer.contacts_value.address') }}</div>
                                </li>
                                <li>
											<span class="icon">
												<i class="flaticon-phone-call"></i>
											</span>
                                    <div class="contact-text">
                                        <strong>{{ __('main.footer.contacts.phone') }}: </strong> {{ __('main.footer.contacts_value.phone') }}
                                    </div>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="flaticon-e-mail-envelope"></i>
                                    </span>
                                    <div class="contact-text">
                                        <strong>{{ __('main.footer.contacts.email') }}: </strong> {{ __('main.footer.contacts_value.email') }}
                                    </div>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="flaticon-clock-circular-outline"></i>
                                    </span>
                                    <div class="contact-text">
                                        <strong>{{ __('main.footer.contacts.hours') }}: </strong> {{ __('main.footer.contacts_value.hours') }}
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="useful-links ul-li-block">
                            <h2 class="footer-title">{{ __('main.menu.categories') }}</h2>
                            <ul class="clearfix">

                                @foreach($categoriesHF as $categoryHF)
                                    <li><a href="{{ route('category', $categoryHF->code) }}">{{ $categoryHF->__('name') }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="useful-links ul-li-block">
                            <h2 class="footer-title">{{ __('main.menu.brands') }}</h2>
                            <ul class="clearfix">

                                @foreach($brandsHF as $brand)
                                <li><a href="{{ route('brand', $brand->code) }}">{{ $brand->__('name') }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="useful-links ul-li-block">
                            <h2 class="footer-title">{{ __('main.footer.titles.information') }}</h2>
                            <ul class="clearfix">

                                <li><a href="{{ route('about') }}">{{ __('main.menu.about') }}</a></li>
                                <li><a href="{{ route('blog') }}">{{ __('main.menu.blog') }}</a></li>
                                <li><a href="{{ route('contacts') }}">{{ __('main.menu.contacts') }}</a></li>

                            </ul>
                        </div>
                    </div>

                </div>

                <div class="footer-newsletter">
                    <div class="row justify-content-center">

                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="newsletter-content">
                                <h4 class="m-0">{{ __('main.footer.subscription.title') }}</h4>
                                <p class="m-0">{{ __('main.footer.subscription.subtitle') }}</p>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="newsletter-form">
                                <form action="{{ route('subscription') }}" method="POST">
                                    @csrf

                                    <div class="form-item m-0">
                                        <input type="email" id="footer-newsletter" name="email_footer" placeholder="{{ __('main.footer.subscription.email_area') }}">
                                        <button type="submit" class="bg-past">{{ __('main.footer.subscription.button') }}</button>
                                    </div>
                                    @error('email_footer')
                                    <br>
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- footer-middle - end -->

        <!-- footer-bottom - start -->
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="payment-card mb-15">
                    <img src="{{ URL::asset('images/payment-card.png') }}" alt="image_not_found">
                </div>
                <p class="copyright-text m-0">Copyright © 2021 <a href="{{ route('index') }}"><strong class="color-past">Storm-shop</strong></a> All rights reserved</p>
            </div>
        </div>
        <!-- footer-bottom - end -->

    </div>
</footer>
<!-- footer-section (default-footer) - end
================================================== -->





<!-- fraimwork - jquery include -->
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/popper.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- carousel jquery include -->
<script src="{{ URL::asset('js/slick.min.js') }}"></script>
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>

<!-- map jquery include -->
<script src="{{ URL::asset('js/gmap3.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

<!-- others jquery include -->
<script src="{{ URL::asset('js/masonry.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.mCustomScrollbar.js') }}"></script>
<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>

<!-- custom jquery include -->
<script src="{{ URL::asset('js/custom.js') }}"></script>

<!-- кастомный скрипт -->
<script src="{{ URL::asset('js/script.js') }}"></script>

@yield('js')



</body>
</html>