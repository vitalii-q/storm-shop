@extends('layouts.hf')

@section('title', $selected_product->name)

@section('content')
    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">

        <!-- breadcrumb-big-title - start -->
        <div class="breadcrumb-big-title" style="background-image: url({{ URL::asset('images/breadcrumb/bg-image-1.jpg') }})">
            <div class="overlay-black sec-ptb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h2 class="title-text">{{ $selected_product->name }}</h2>
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
                    <li><a href="/catalog/{{ $selected_product->getCategory()->code }}">{{ $selected_product->getCategory()->name }}</a></li>
                    <li class="active">{{ $selected_product->name }}</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- product-details-section - start
    ================================================== -->
    <section id="product-details-section" class="product-details-section sec-ptb-60 clearfix">
        <div class="container">

            {{--@dump(\App\Models\AttributeValue::where('id', 9)->first()->skuValues)--}}

            <!-- product-details - start -->
            <div id="product-item_{{ $selected_product->id }}" class="product-details" data-name="{{ $selected_product->name }}" data-price="{{ $selected_product->price }}₽" data-attr-values="" data-img="{{ URL::asset($selected_product->image_1) }}">
                <div class="row justify-content-md-center">

                    <!-- product-details-carousel - start -->
                    <div class="col-lg-6 col-md-10 col-sm-12">
                        <div class="product-details-carousel">
                            <div class="slider-for">
                                @if(strlen($selected_product->image_1) > 0)
                                    <div class="item">
                                        <img src="{{ URL::asset($selected_product->image_1) }}" alt="image_not_found">
                                    </div>
                                @endif
                                @if(strlen($selected_product->image_2) > 0)
                                    <div class="item">
                                        <img src="{{ URL::asset($selected_product->image_2) }}" alt="image_not_found">
                                    </div>
                                @endif
                                @if(strlen($selected_product->image_3) > 0)
                                    <div class="item">
                                        <img src="{{ URL::asset($selected_product->image_3) }}" alt="image_not_found">
                                    </div>
                                @endif
                            </div>

                            @if((strlen($selected_product->image_1) > 0 and strlen($selected_product->image_2) > 0) or
                            (strlen($selected_product->image_2) > 0 and strlen($selected_product->image_3) > 0))
                                <div class="slider-nav">
                                    @if(strlen($selected_product->image_1) > 0)
                                        <div class="item">
                                            <img src="{{ URL::asset($selected_product->image_1) }}" alt="image_not_found">
                                        </div>
                                    @endif
                                    @if(strlen($selected_product->image_2) > 0)
                                        <div class="item">
                                            <img src="{{ URL::asset($selected_product->image_2) }}" alt="image_not_found">
                                        </div>
                                    @endif
                                    @if(strlen($selected_product->image_3) > 0)
                                        <div class="item">
                                            <img src="{{ URL::asset($selected_product->image_3) }}" alt="image_not_found">
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- product-details-carousel - end -->

                    <!-- product-details-content - start -->
                    <div class="col-lg-6 col-md-10 col-sm-12">
                        <div id="attributes-wrapper_product-{{ $selected_product->id }}" class="product-details-content">

                            {{--<div class="product-code ul-li mb-30">--}}
                                {{--<ul class="clearfix">--}}
                                    {{--<li>SKU: SK68</li>--}}
                                    {{--<li>Availability: <span class="text-success"></span></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            <div class="product-title mb-30">
                                {{--<div class="rateing-star">--}}
                                    {{--<ul>--}}
                                        {{--<li><i class="fas fa-star"></i></li>--}}
                                        {{--<li><i class="fas fa-star"></i></li>--}}
                                        {{--<li><i class="fas fa-star"></i></li>--}}
                                        {{--<li><i class="fas fa-star"></i></li>--}}
                                        {{--<li><i class="fas fa-star"></i></li>--}}
                                    {{--</ul>--}}
                                    {{--<span><i>(05 review)</i></span>--}}
                                {{--</div>--}}

                                <h2>{{ $selected_product->name }}</h2>
                                <h3>{{ $selected_product->price }} ₽</h3>
                            </div>

                            <p class="mb-30">
                                {!! $selected_product->description !!}
                            </p>

                            <!-- формируем массив с ids аттрибутов -->
                            @php($attributesId = [])
                            @foreach($attributes as $attribute)
                                @php(array_push($attributesId, $attribute->id))
                            @endforeach


                            @php($i=0) @foreach($attributes as $attribute)
                                @if($attribute->code == 'size')
                                    <div id="attribute_{{$attributesId[$i]}}" class="attribute_container product-size ul-li mb-30">
                                        <h3 class="list-title">Размер:</h3>
                                        <ul class="clearfix">
                                            @foreach($attribute->attributeValues as $value)
                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                    <li><a id="value_{{ $value->id }}" data-attribute-id="{{$attributesId[$i]}}" onclick="attributeChange([{{ $selected_product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $selected_product->id }}-attribute_{{ $attribute->id }}" data-value="{{ $value->value }}">{{ $value->value }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($attribute->code == 'color')
                                    <div id="attribute_{{$attributesId[$i]}}" class="attribute_container product-color ul-li mb-30">
                                        <h3 class="list-title">Цвет:</h3>
                                        <ul class="clearfix">
                                            @foreach($attribute->attributeValues as $value)
                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                <li><a id="value_{{ $value->id }}" data-attribute-id="{{$attributesId[$i]}}" onclick="attributeChange([{{ $selected_product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $selected_product->id }}-attribute_{{ $attribute->id }}" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}"></a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div id="attribute_{{$attributesId[$i]}}" class="ul-li mb-30">
                                        <h3 class="list-title">Цвет:</h3>
                                        <ul class="clearfix">
                                        @foreach($attribute->attributeValues as $value)
                                            @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                <li><a id="value_{{ $value->id }}" data-attribute-id="{{$attributesId[$i]}}" onclick="attributeChange([{{ $selected_product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $selected_product->id }}-attribute_{{ $attribute->id }}" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}"></a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @php($i++) @endforeach

                            {{--<div class="product-size ul-li mb-30">--}}
                                {{--<h3 class="list-title">size:</h3>--}}
                                {{--<form action="#">--}}
                                    {{--<ul class="clearfix">--}}
                                        {{--<li><a href="#!">xs</a></li>--}}
                                        {{--<li><a href="#!">s</a></li>--}}
                                        {{--<li><a class="active" href="#!">m</a></li>--}}
                                        {{--<li><a href="#!">l</a></li>--}}
                                        {{--<li><a href="#!">xl</a></li>--}}
                                    {{--</ul>--}}
                                {{--</form>--}}
                            {{--</div>--}}

                            {{--<div class="product-color ul-li mb-30">--}}
                                {{--<h3 class="list-title">color:</h3>--}}
                                {{--<form action="#">--}}
                                    {{--<ul class="clearfix">--}}
                                        {{--<li><a href="#!" class="color-1"></a></li>--}}
                                        {{--<li><a href="#!" class="color-2 active"></a></li>--}}
                                        {{--<li><a href="#!" class="color-3"></a></li>--}}
                                        {{--<li><a href="#!" class="color-4"></a></li>--}}
                                    {{--</ul>--}}
                                {{--</form>--}}
                            {{--</div>--}}

                            {{--<div class="product-quantity mb-30">--}}
                                {{--<h3 class="list-title">qty:</h3>--}}
                                {{--<form action="#">--}}
                                    {{--<input oninput="checkQuantity(this)" id="productQuantity" type="number" min="1" value="1" placeholder="quantity">--}}
                                {{--</form>--}}
                            {{--</div>--}}


                        <!-- проверка, есть ли продукт в корзине --- -->
                            @php($productInCart = false) @php($cartProductQuantity = 0)

                            @if(!empty($cartProducts))
                                @foreach($cartProducts as $cartProduct)
                                    @if($selected_product->id == $cartProduct['id']) @php($cartProductQuantity = $cartProduct['quantity']) @php($productInCart = true) @endif
                                @endforeach
                            @endif
                        <!-- проверка, есть ли продукт в корзине end -->

                            <div class="item-btns-group ul-li clearfix mb-30">
                                <ul class="clearfix">
                                    <li>
                                        <div id="cart_add-plus_minus-container_{{ $selected_product->id }}"
                                             @if($productInCart == true)class="cart_add-plus_minus-container flex-container" @else
                                             class="cart_add-plus_minus-container display-none flex-container"@endif
                                        >
                                            <div onclick="cartMinusProduct({{ $selected_product->id }})" class="cart_add-minus">-</div>

                                            <div id="catalogQuantityProduct_{{ $selected_product->id }}" data-id="{{ $selected_product->id }}" data-position="catalog" class="cart_add-plus_minus-count">
                                                @if($productInCart == true){{ $cartProductQuantity }} @else
                                                    {{ '1' }} @endif
                                            </div>

                                            <div onclick="cartPlusProduct({{ $selected_product->id }})" class="cart_add-plus">+</div>
                                        </div>

                                        <a id="cartAddButton_{{ $selected_product->id }}" onclick="addToCartButtonCatalog({{ $selected_product->id }})"
                                           @if($productInCart == true)class="add-to-cart display-none" @else
                                           class="add-to-cart"@endif
                                        disabled="disabled">
                                            <i class="flaticon-shopping-basket"></i>
                                            В корзину
                                        </a>
                                    </li>
                                    <li><a href="#!"><i class="flaticon-heart"></i></a></li>
                                    <li><a href="#!"><i class="flaticon-libra"></i></a></li>
                                </ul>
                            </div>

                            {{--<div class="product-share-links ul-li">--}}
                                {{--<ul class="clearfix">--}}
                                    {{--<li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>--}}
                                    {{--<li><a href="#!"><i class="fab fa-twitter"></i></a></li>--}}
                                    {{--<li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>--}}
                                    {{--<li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>--}}
                                    {{--<li><a href="#!"><i class="fab fa-youtube"></i></a></li>--}}
                                    {{--<li><a href="#!"><i class="fab fa-instagram"></i></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                    <!-- product-details-content - end -->

                </div>
            </div>
            <!-- product-details - end -->

            <!-- product-details-tab - start -->
            <div class="product-details-tab sec-ptb-60">
                <div class="tab-menu ul-li-center mb-30">
                    <ul class="nav">
                        <li><a class="active" data-toggle="tab" href="#descriptions">Описание</a></li>
                        <li><a data-toggle="tab" href="#informations">Информация</a></li>
                        {{--<li><a data-toggle="tab" href="#reviews">reviews<sup>(3)</sup></a></li>--}}
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="descriptions" class="tab-pane fade in active show">
                        {!! $selected_product->description_bottom !!}
                    </div>

                    <div id="informations" class="tab-pane fade">
                        {!! $selected_product->information !!}
                    </div>

                    {{--<div id="reviews" class="tab-pane fade">--}}

                        {{--<!-- review-item - start -->--}}
                        {{--<div class="review-item clearfix">--}}
                            {{--<span class="reviewer-img"></span>--}}
                            {{--<div class="review-content">--}}
                                {{--<div class="post-meta ul-li">--}}
                                    {{--<ul>--}}
                                        {{--<li>By <a href="#!">George Stven</a></li>--}}
                                        {{--<li><i class="flaticon-clock-circular-outline"></i> on Sep 26, 2018   at 20:30</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<p class="m-0">--}}
                                    {{--Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- review-item - end -->--}}

                        {{--<!-- review-item - start -->--}}
                        {{--<div class="review-item clearfix">--}}
                            {{--<span class="reviewer-img"></span>--}}
                            {{--<div class="review-content">--}}
                                {{--<div class="post-meta ul-li">--}}
                                    {{--<ul>--}}
                                        {{--<li>By <a href="#!">George Stven</a></li>--}}
                                        {{--<li><i class="flaticon-clock-circular-outline"></i> on Sep 26, 2018   at 20:30</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<p class="m-0">--}}
                                    {{--Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- review-item - end -->--}}

                        {{--<!-- review-item - start -->--}}
                        {{--<div class="review-item clearfix">--}}
                            {{--<span class="reviewer-img"></span>--}}
                            {{--<div class="review-content">--}}
                                {{--<div class="post-meta ul-li">--}}
                                    {{--<ul>--}}
                                        {{--<li>By <a href="#!">George Stven</a></li>--}}
                                        {{--<li><i class="flaticon-clock-circular-outline"></i> on Sep 26, 2018   at 20:30</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<p class="m-0">--}}
                                    {{--Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- review-item - end -->--}}

                    {{--</div>--}}
                </div>
            </div>
            <!-- product-details-tab - end -->

        </div>
    </section>
    <!-- product-details-section - end
    ================================================== -->


    @if(count($related) >= 1)
        <!-- featured-section - start
        ================================================== -->
        <section id="featured-section" class="featured-section sec-ptb-60 clearfix">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title">
                            <h2>Похожие товары</h2>
                        </div>
                    </div>

                    @foreach($related as $relate)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="product-item">

                                <div class="post-labels">
                                    <ul class="clearfix">
                                        @if($relate->bestseller == 1)<li class="bg-success">Бестселлер</li>@endif
                                        @if($relate->new == 1)<li class="bg-primary">Новинка</li>@endif
                                        @if($relate->sale == 1)<li class="bg-danger">Скидка</li>@endif
                                    </ul>
                                </div>

                                <div class="image-container">
                                    <img src="{{ URL::asset($relate->image_1) }}" alt="image_not_found">
                                    <a href="#!" class="quick-view">
                                        <i class="fas fa-eye"></i>
                                        Смотреть
                                    </a>
                                </div>

                                <div class="item-content text-center">
                                    <a href="#!" class="item-title">{{ $relate->name }}</a>
                                    <div class="item-price">
                                        <strong class="color-black">{{ $relate->price }}</strong>
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
                    @endforeach

                </div>
            </div>
        </section>
        <!-- featured-section - end
        ================================================== -->
    @endif

@endsection