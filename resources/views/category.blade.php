@extends('layouts.hf')

@section('title', 'Каталог')

@section('content')
    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">

        <!-- breadcrumb-big-title - start -->
        <div class="breadcrumb-big-title" style="background-image: url({{ URL::asset('images/breadcrumb/bg-image-1.jpg') }});">
            <div class="overlay-black sec-ptb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h2 class="title-text">{{ $selected_category->name }}</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-big-title - end -->

        <!-- breadcrumb-list - start -->
        <div class="breadcrumb-list">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="{{ route('index') }}">Главная</a></li>
                    <li><a href="{{ route('catalog') }}">Каталог</a></li>
                    <li class="active">{{ $selected_category->name }}</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- product-section start
    ================================================== -->
    <section id="product-section" class="product-section sec-ptb-100 clearfix">
        <div class="container">
            <div class="row justify-content-md-center">

                <!-- sidebar-section - start -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sidebar-section">

                        <!-- category-list - start -->
                        <div class="sidebar-item category-list ul-li-block mb-30">
                            <div class="sidebar-title">
                                <h2>Каталог</h2>
                            </div>
                            <ul class="clearfix">
                                @foreach($categories as $category)
                                    <li><a href="/catalog/{{ $category->code }}">{{ $category->name }} <span class="float-right">({{ $category->getProducts()->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-list - end -->

                        <!-- category-list - start -->
                        {{--<div class="sidebar-item price-range-list ul-li-block mb-30">--}}
                            {{--<div class="sidebar-title">--}}
                                {{--<h2>price</h2>--}}
                            {{--</div>--}}
                            {{--<ul class="clearfix">--}}
                                {{--<li><a href="#!">$0.00 - $99.00 <span class="float-right">(50)</span></a></li>--}}
                                {{--<li><a href="#!">$100.00 and above <span class="float-right">(20)</span></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        <!-- category-list - end -->

                        <!-- brand-list - start -->
                        <div class="sidebar-item brand-list ul-li-block mb-30">
                            <div class="sidebar-title">
                                <h2>brands</h2>
                            </div>
                            <ul class="clearfix">
                                <li><a href="#!">New Arrivals <span class="float-right">(50)</span></a></li>
                                <li><a href="#!">Beard Grooming <span class="float-right">(20)</span></a></li>
                                <li><a href="#!">Beard Oil <span class="float-right">(40)</span></a></li>
                                <li><a href="#!">Clothing <span class="float-right">(70)</span></a></li>
                                <li><a href="#!">Accessories <span class="float-right">(30)</span></a></li>
                                <li><a href="#!">Backpack <span class="float-right">(10)</span></a></li>
                            </ul>
                        </div>
                        <!-- brand-list - end -->

                        <!-- size-list - start -->
                        <div class="sidebar-item size-list ul-li mb-30">
                            <div class="sidebar-title">
                                <h2>sizes</h2>
                            </div>
                            <ul class="clearfix">
                                <li><a href="#!">xs</a></li>
                                <li><a href="#!">s</a></li>
                                <li><a href="#!">m</a></li>
                                <li><a href="#!">l</a></li>
                                <li><a href="#!">xl</a></li>
                                <li><a href="#!">xxl</a></li>
                            </ul>
                        </div>
                        <!-- size-list - end -->

                        <!-- colors-list - start -->
                        <div class="sidebar-item colors-list ul-li mb-30">
                            <div class="sidebar-title">
                                <h2>colors</h2>
                            </div>
                            <ul class="clearfix">
                                <li><a href="#!" class="bg-gray"></a></li>
                                <li><a href="#!" class="bg-past"></a></li>
                                <li><a href="#!" class="bg-royal-blue active"></a></li>
                                <li><a href="#!" class="bg-sky-blue"></a></li>
                                <li><a href="#!" class="bg-pure-red"></a></li>
                                <li><a href="#!" class="bg-green"></a></li>
                                <li><a href="#!" class="bg-maroon"></a></li>
                                <li><a href="#!" class="bg-orange"></a></li>
                                <li><a href="#!" class="bg-black"></a></li>
                                <li><a href="#!" class="bg-olive-green"></a></li>
                            </ul>
                        </div>
                        <!-- colors-list - end -->

                        <!-- popular-tags - start -->
                        {{--<div class="sidebar-item popular-tags ul-li mb-30">--}}
                            {{--<div class="sidebar-title">--}}
                                {{--<h2>sizes</h2>--}}
                            {{--</div>--}}
                            {{--<ul class="clearfix">--}}
                                {{--<li><a href="#!">fashion</a></li>--}}
                                {{--<li><a href="#!">clothing</a></li>--}}
                                {{--<li><a href="#!">jewelry</a></li>--}}
                                {{--<li><a href="#!">accessories</a></li>--}}
                                {{--<li><a href="#!">hot</a></li>--}}
                                {{--<li><a href="#!">backpack</a></li>--}}
                                {{--<li><a href="#!">shoes</a></li>--}}
                                {{--<li><a href="#!">clothings</a></li>--}}
                            {{--</ul>--}}
                            {{--<a href="#!" class="view-all-btn">+<u>view all</u></a>--}}
                        {{--</div>--}}
                        <!-- popular-tags - end -->

                        <!-- compare-products - start -->
                        <div class="sidebar-item compare-products ul-li mb-30">
                            <div class="sidebar-title">
                                <h2>Compare Products</h2>
                            </div>
                            <p class="m-0">You have no items to compare.</p>
                        </div>
                        <!-- compare-products - end -->

                        <!-- wishlist - start -->
                        <div class="sidebar-item wishlist ul-li mb-30">
                            <div class="sidebar-title">
                                <h2>My Wishlist</h2>
                            </div>
                            <p class="m-0">You have no items in your wishlist.</p>
                        </div>
                        <!-- wishlist - end -->

                    </div>
                </div>
                <!-- sidebar-section - end -->

                <!-- product-grid-section - start -->
                <div class="col-lg-9 col-md-10 col-sm-12">
                    <div class="product-grid-section">
                        <div class="row">

                            <!-- filter-content - start -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="filter-content mb-60">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            {{--<form action="#!">--}}
                                                {{--<select class="filter-select storm-select">--}}
                                                    {{--<option value="" disabled>Choose your option</option>--}}
                                                    {{--<option value="1" selected>Show:   12 Products/Page</option>--}}
                                                    {{--<option value="2">Option 2</option>--}}
                                                    {{--<option value="3">Option 3</option>--}}
                                                {{--</select>--}}
                                            {{--</form>--}}
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            {{--<form action="#!">--}}
                                                {{--<select class="filter-select storm-select">--}}
                                                    {{--<option value="" disabled>Choose your option</option>--}}
                                                    {{--<option value="1" selected>Sort by:   Price: Low to High</option>--}}
                                                    {{--<option value="2">Option 2</option>--}}
                                                    {{--<option value="3">Option 3</option>--}}
                                                {{--</select>--}}
                                            {{--</form>--}}
                                        </div>

                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                            <ul class="nav filter-nav">
                                                <li><a class="active" data-toggle="tab" href="#grid-style"><i class="flaticon-grid"></i></a></li>
                                                <li><a data-toggle="tab" href="#list-style"><i class="flaticon-menu"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- filter-content - end -->

                            <!-- tab-content - start -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content mb-60">

                                    <div id="grid-style" class="tab-pane fade in active show">
                                        <div class="row">

                                            @foreach($products as $product)
                                                <!-- product-item - start -->
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="product-item">

                                                        {{--<div class="post-labels">--}}
                                                            {{--<ul class="clearfix">--}}
                                                                {{--<li class="bg-primary">new</li>--}}
                                                                {{--<li class="bg-danger">-50%</li>--}}
                                                            {{--</ul>--}}
                                                        {{--</div>--}}

                                                        <div class="image-container">
                                                            <img src="{{ Storage::url($product->image_1) }}" alt="image_not_found">
                                                            <a href="{{ '/catalog/' . $selected_category->code . '/' . $product->code }}" class="quick-view">
                                                                <i class="fas fa-eye"></i>
                                                                quick view
                                                            </a>
                                                        </div>

                                                        <div class="item-content text-center">
                                                            <a href="#!" class="item-title">{{ $product->name }}</a>
                                                            <div class="item-price">
                                                                <strong class="color-black">{{ $product->price }}₽</strong>
                                                                {{--<del>$359.00</del>--}}
                                                            </div>
                                                        </div>

                                                        <div class="hover-content">
                                                            <div class="color-options ul-li-center mb-15">
                                                                <ul>
                                                                    <li><a href="#!" class="color-1"></a></li>
                                                                    <li><a href="#!" class="color-2"></a></li>
                                                                    <li><a href="#!" class="color-3"></a></li>
                                                                </ul>
                                                            </div>

                                                            <a href="#!" class="add-to-cart">
                                                                <i class="flaticon-shopping-basket"></i>
                                                                В корзину
                                                            </a>

                                                            <div class="product-meta ul-li-center">
                                                                <ul class="clearfix">
                                                                    <li><a href="#!"><i class="flaticon-heart"></i></a></li>
                                                                    <li><a href="#!"><i class="flaticon-libra"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- product-item - end -->
                                            @endforeach

                                        </div>
                                    </div>

                                    <div id="list-style" class="tab-pane fade">
                                        @foreach($products as $product)
                                            <!-- product-list-item - start -->
                                            <div class="product-list-item clearfix">
                                                <div class="image-container float-left">
                                                    <img src="{{ Storage::url($product->image_1) }}" alt="image_not_found">
                                                </div>
                                                <div class="item-content">
                                                    <a href="#!" class="item-title">{{ $product->name }}</a>
                                                    <div class="item-price mb-30">
                                                        <strong class="color-black">{{ $product->price }}₽</strong>
                                                        <!--<del>$359.00</del>-->
                                                    </div>
                                                    <div class="item-size-color ul-li mb-30 clearfix">

                                                        <ul class="size-list clearfix">
                                                            <li><a href="#!">xs</a></li>
                                                            <li><a href="#!">s</a></li>
                                                            <li><a href="#!" class="active">m</a></li>
                                                            <li><a href="#!">l</a></li>
                                                        </ul>

                                                        <ul class="color-list clearfix">
                                                            <li><a href="#!" class="color-1"></a></li>
                                                            <li><a href="#!" class="color-2"></a></li>
                                                            <li><a href="#!" class="active color-3"></a></li>
                                                            <li><a href="#!" class="color-4"></a></li>
                                                        </ul>

                                                    </div>
                                                    <p class="mb-30">
                                                        {{ $product->description }}
                                                    </p>
                                                    <div class="item-btns-group ul-li clearfix">
                                                        <ul class="clearfix">
                                                            <li>
                                                                <a href="#!" class="add-to-cart">
                                                                    <i class="flaticon-shopper"></i>
                                                                    В корзину
                                                                </a>
                                                            </li>
                                                            <li><a href="#!"><i class="flaticon-heart"></i></a></li>
                                                            <li><a href="#!"><i class="flaticon-libra"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product-list-item - end -->
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                            <!-- tab-content - end -->

                            <!-- pagination-section - start -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="pagination-section ul-li-right">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            {{--<form action="#!">--}}
                                                {{--<select class="filter-select storm-select">--}}
                                                    {{--<option value="" disabled>Choose option</option>--}}
                                                    {{--<option value="1" selected>Show 12</option>--}}
                                                    {{--<option value="2">Option 2</option>--}}
                                                    {{--<option value="3">Option 3</option>--}}
                                                {{--</select>--}}
                                            {{--</form>--}}

                                            <span class="filter-result">Показано {{ $products->count() }} из {{ $products->total() }}</span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            {{ $products->links() }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- pagination-section - end -->

                        </div>
                    </div>
                </div>
                <!-- product-grid-section - end -->

            </div>
        </div>
    </section>
    <!-- product-section end
    ================================================== -->
@endsection