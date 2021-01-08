@extends('layouts.hf')

@section('title', __('main.menu.catalog'))

@section('content')
    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">

        <!-- breadcrumb-big-title - start -->
        <div class="breadcrumb-big-title" style="background-image: url(images/breadcrumb/bg-image-1.jpg);">
            <div class="overlay-black sec-ptb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h2 class="title-text"><strong></strong>{{ __('catalog.title') }}</h2>
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
                    <li><a href="{{ route('index') }}">{{ __('main.menu.main') }}</a></li>
                    <li class="active">{{ __('main.menu.catalog') }}</li>
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
                                <h2>{{ __('main.menu.categories') }}</h2>
                            </div>
                            <ul class="clearfix">
                                @foreach($categories as $category)
                                <li><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }} <span class="float-right">({{ $category->getSkus()->count() }})</span></a></li>
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
                                <h2>{{ __('main.menu.brands') }}</h2>
                            </div>

                            <ul class="clearfix">
                                @foreach($brands as $brand)
                                    <li><a href="{{ route('brand', $brand->code) }}">{{ $brand->__('name') }} <span class="float-right">({{ $brand->getSkus()->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- brand-list - end -->

                        <div id="filter_attributes-wrapper">
                            <!-- разбиваем строку сессии в массив для проверки активности элемента -->
                            @php($filterValues = explode(',', session()->get('catalog.filter')))
                            <!-- разбиваем строку сессии в массив для проверки активности элемента -->

                            @foreach($attributes as $attribute)
                                @if($attribute->code == 'size')
                                    <!-- size-list - start -->
                                    <div id="filter_{{$attribute->id}}" class="filter_attribute-wrapper sidebar-item size-list ul-li mb-30">
                                        <div class="sidebar-title">
                                            <h2>{{ __('catalog.attributes.sizes') }}</h2>
                                        </div>

                                        <ul class="clearfix">
                                            @foreach($attribute->attributeValues as $value)
                                                <li><a onclick="filter(this)" data-attribute-id="{{$attribute->id}}" data-value-id="{{$value->id}}" data-value="{{$value->value}}" class="filter_attribute-value filter_attribute-size-value @if(in_array($value->id, $filterValues))active @endif">{{ $value->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- size-list - end -->
                                @elseif($attribute->code == 'color')
                                    <!-- colors-list - start -->
                                    <div id="filter_{{$attribute->id}}" class="filter_attribute-wrapper sidebar-item colors-list ul-li mb-30">
                                        <div class="sidebar-title">
                                            <h2>{{ __('catalog.attributes.colors') }}</h2>
                                        </div>

                                        <ul class="clearfix">
                                            @foreach($attribute->attributeValues as $value)
                                                <li><a onclick="filter(this)" data-attribute-id="{{$attribute->id}}" data-value-id="{{$value->id}}" data-value="{{$value->value}}" style="background-color: {{ $value->value }}"class="filter_attribute-value filter_attribute-color-value @if(in_array($value->id, $filterValues))active @endif"></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- colors-list - end -->
                                @else

                                @endif
                            @endforeach
                        </div>

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
                        {{--<div class="sidebar-item compare-products ul-li mb-30">--}}
                            {{--<div class="sidebar-title">--}}
                                {{--<h2>Compare Products</h2>--}}
                            {{--</div>--}}
                            {{--<p class="m-0">You have no items to compare.</p>--}}
                        {{--</div>--}}
                        {{--<!-- compare-products - end -->--}}

                        @if(Auth::check())
                            {{--<!-- wishlist - start -->--}}
                            <div class="sidebar-item recent-post ul-li-block mb-30">
                                <div class="sidebar-title">
                                    <h2>{{ __('catalog.desires_list') }}</h2>
                                </div>

                                {{--<p class="m-0">You have no items in your wishlist.</p>--}}

                                <ul class="clearfix">

                                    @foreach($desires as $desire)
                                    <li>
                                        <span class="image-container">
                                            <img src="{{ URL::asset($desire->image_1) }}" alt="image_not_found">
                                        </span>

                                        <div class="content">
                                            <a href="{{ '/catalog/' . $desire->getCategory()->code . '/' . $desire->code }}" class="item-title">{{ $desire->__('name') }}</a>
                                            <small class="post-date">{{ Date::parse($desire->created_at)->format('j F Y') }}</small>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- wishlist - end -->
                        @endif

                    </div>
                </div>
                <!-- sidebar-section - end -->

                <!-- product-grid-section - start -->
                <div class="col-lg-9 col-md-10 col-sm-12">
                    <div id="catalog-filter_content" @if(!empty($selected_category)) data-position="category" data-category="{{ $selected_category->id }}" @else data-position="catalog" @endif class="product-grid-section">
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
                                                <li><a onclick="catalogView('grid')" @if($catalogView == 'grid')class="active" @endif data-toggle="tab" href="#grid-style"><i class="flaticon-grid"></i></a></li>
                                                <li><a onclick="catalogView('list')" @if($catalogView == 'list')class="active" @endif data-toggle="tab" href="#list-style"><i class="flaticon-menu"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- filter-content - end -->

                            <!-- tab-content - start -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content mb-60">

                                    <div id="grid-style" class="tab-pane fade in @if($catalogView == 'grid')active show @endif">
                                        <div class="row">

                                        @foreach($products as $product)

                                            <!-- проверка, есть ли продукт в корзине --- -->
                                            @php($productInCart = false) @php($cartProductQuantity = 0)

                                            @if(!empty($cartProducts))
                                                @foreach($cartProducts as $cartProduct)
                                                    @if($product->id == $cartProduct['id']) @php($cartProductQuantity = $cartProduct['quantity']) @php($productInCart = true) @endif
                                                @endforeach
                                            @endif
                                            <!-- проверка, есть ли продукт в корзине end -->

                                            <!-- product-item - start -->
                                                <div class="col-lg-4 col-md-6 col-sm-12">

                                                    <div @if($catalogView == 'grid')id="product-item_{{ $product->id }}" @endif class="product-item product-item_view-grid" data-name="{{ $product->__('name') }}" data-price="{{ $product->price }}₽" data-img="{{ URL::asset($product->image_1) }}">

                                                        <div class="post-labels">
                                                            <ul class="clearfix">
                                                                @if($product->bestseller == 1)<li class="bg-success">{{ __('main.stickers.bestseller') }}</li>@endif
                                                                @if($product->new == 1)<li class="bg-primary">{{ __('main.stickers.new') }}</li>@endif
                                                                @if($product->sale == 1)<li class="bg-danger">{{ __('main.stickers.sale') }}</li>@endif
                                                            </ul>
                                                        </div>

                                                        <div class="image-container">
                                                            <img src="{{ URL::asset($product->image_1) }}" alt="image_not_found">
                                                            <a href="{{ '/catalog/' . $product->getCategory()->code . '/' . $product->code }}" class="quick-view">
                                                                <i class="fas fa-eye"></i>
                                                                {{ __('main.product.view') }}
                                                            </a>
                                                        </div>

                                                        <div class="item-content text-center">
                                                            <a href="{{ '/catalog/' . $product->getCategory()->code . '/' . $product->code }}" class="item-title">{{ $product->__('name') }}</a>
                                                            <div class="item-price">
                                                                <strong class="color-black">{{ $product->currency() }}</strong>
                                                                {{--<del>$359.00</del>--}}
                                                            </div>
                                                        </div>

                                                        <div class="hover-content">
                                                            <div class="attribute-options color-options ul-li-center mb-15">

                                                                <div @if($catalogView == 'grid')id="attributes-wrapper_product-{{ $product->id }}" @endif class="attributes-wrapper_product-grid">
                                                                @php($productAttributeValuesId = []) <!-- массив с id значений атрибутов продукта -->
                                                                @foreach($product->skus as $sku)
                                                                    @foreach($sku->skuValues as $value)
                                                                        @php( array_push($productAttributeValuesId, $value->attributeValue->id))
                                                                    @endforeach
                                                                @endforeach

                                                                @foreach($product->attributes as $attribute)
                                                                    @if($attribute->code == 'size')
                                                                        <div @if($catalogView == 'grid')id="product_{{$product->id}}_attribute_{{$attribute->id}}" @endif class="attribute_container product-size ul-li attribute_container-grid">
                                                                            <ul class="size-list clearfix">
                                                                            @foreach($attribute->attributeValues as $value)
                                                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                                    <li><a @if($catalogView == 'grid')id="product_{{$product->id}}_value_{{ $value->id }}" @endif data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $product->id }}-attribute_{{ $attribute->id }} attribute_value-grid" data-value="{{ $value->value }}">{{ $value->value }}</a></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @elseif($attribute->code == 'color')
                                                                        <div @if($catalogView == 'grid')id="product_{{$product->id}}_attribute_{{$attribute->id}}" @endif class="attribute_container product-color ul-li attribute_container-grid">
                                                                            <ul class="color-list clearfix">
                                                                            @foreach($attribute->attributeValues as $value)
                                                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                                    <li><a @if($catalogView == 'grid')id="product_{{$product->id}}_value_{{ $value->id }}" @endif data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $product->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}"></a></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @else
                                                                        <div @if($catalogView == 'grid')id="product_{{$product->id}}_attribute_{{$attribute->id}}" @endif class="ul-li attribute_container-grid">
                                                                            <ul class="clearfix">
                                                                            @foreach($attribute->attributeValues as $value)
                                                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                                    <li><a @if($catalogView == 'grid')id="product_{{$product->id}}_value_{{ $value->id }}" @endif data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $product->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}"></a></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                </div>

                                                            </div>

                                                            {{--<form method="POST" action="{{ route('basket_add', $product->id) }}">--}}
                                                                {{--@csrf--}}
                                                                {{--<button type="submit" class="add-to-cart">--}}
                                                                    {{--<i class="flaticon-shopping-basket"></i>--}}
                                                                    {{--В корзину--}}
                                                                {{--</button>--}}
                                                            {{--</form>--}}

                                                            <div @if($catalogView == 'grid')id="cart_add-plus_minus-container_{{ $product->id }}" @endif
                                                             @if($productInCart == true)class="cart_add-plus_minus-container cart_add-plus_minus-container-grid flex-container" @else
                                                             class="cart_add-plus_minus-container cart_add-plus_minus-container-grid display-none flex-container"@endif
                                                            >
                                                                <div onclick="cartMinusProduct({{ $product->id }})" class="cart_add-minus">-</div>

                                                                <div @if($catalogView == 'grid')id="catalogQuantityProduct_{{ $product->id }}" @endif data-id="{{ $product->id }}" data-position="catalog" class="cart_add-plus_minus-count catalogQuantityProduct-grid">
                                                                    @if($productInCart == true){{ $cartProductQuantity }} @else
                                                                    {{ '1' }} @endif
                                                                </div>

                                                                <div onclick="cartPlusProduct({{ $product->id }})" class="cart_add-plus">+</div>
                                                            </div>

                                                            <a @if($catalogView == 'grid')id="cartAddButton_{{ $product->id }}" @endif onclick="addToCartButtonCatalog({{ $product->id }})"
                                                               @if($productInCart == true)class="add-to-cart cartAddButton-grid display-none" @else
                                                               class="add-to-cart cartAddButton-grid"@endif
                                                            >
                                                                <i class="flaticon-shopping-basket"></i>
                                                                {{ __('main.product.add_to_cart') }}
                                                            </a>

                                                            {{--<div onclick="addToCart({{ $product->id }})" class="add-to-cart cursor-p">--}}
                                                                {{--<i class="flaticon-shopping-basket"></i>--}}
                                                                {{--В корзину--}}
                                                            {{--</div>--}}

                                                            {{--<div class="product-meta ul-li-center">--}}
                                                                {{--<ul class="clearfix">--}}
                                                                    {{--<li><a href="#!"><i class="flaticon-heart"></i></a></li>--}}
                                                                    {{--<li><a href="#!"><i class="flaticon-libra"></i></a></li>--}}
                                                                {{--</ul>--}}
                                                            {{--</div>--}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- product-item - end -->
                                            @endforeach

                                        </div>
                                    </div>

                                    <div id="list-style" class="tab-pane fade @if($catalogView == 'list')active show @endif">

                                        @foreach($products as $product)

                                            <!-- проверка, есть ли продукт в корзине --- -->
                                            @php($productInCart = false) @php($cartProductQuantity = 0)

                                            @if(!empty($cartProducts))
                                                @foreach($cartProducts as $cartProduct)
                                                    @if($product->id == $cartProduct['id']) @php($cartProductQuantity = $cartProduct['quantity']) @php($productInCart = true) @endif
                                                @endforeach
                                            @endif
                                            <!-- проверка, есть ли продукт в корзине end -->

                                            <!-- product-list-item - start -->
                                                <div @if($catalogView == 'list')id="product-item_{{ $product->id }}" @endif class="product-item_view-list product-list-item clearfix" data-name="{{ $product->__('name') }}" data-price="{{ $product->price }}₽" data-img="{{ URL::asset($product->image_1) }}">

                                                    <div class="post-labels">
                                                        <ul class="clearfix">
                                                            @if($product->bestseller == 1)<li class="bg-success">{{ __('main.stickers.bestseller') }}</li>@endif
                                                            @if($product->new == 1)<li class="bg-primary">{{ __('main.stickers.new') }}</li>@endif
                                                            @if($product->sale == 1)<li class="bg-danger">{{ __('main.stickers.sale') }}</li>@endif
                                                        </ul>
                                                    </div>

                                                    <div class="image-container float-left">
                                                        <img src="{{ URL::asset($product->image_1) }}" alt="image_not_found">
                                                    </div>

                                                    <div class="item-content">
                                                        <a href="{{ '/catalog/' . $product->getCategory()->code . '/' . $product->code }}" class="item-title">{{ $product->__('name') }}</a>

                                                        <div class="item-price mb-30">
                                                            <strong class="color-black">{{ $product->price }}₽</strong>
                                                            <!--<del>$359.00</del>-->
                                                        </div>

                                                        <div class="item-size-color ul-li mb-30 clearfix">

                                                            <div @if($catalogView == 'list')id="attributes-wrapper_product-{{ $product->id }}" @endif class="attributes-wrapper_product-list">
                                                            @php($productAttributeValuesId = []) <!-- массив с id значений атрибутов продукта -->
                                                                @foreach($product->skus as $sku)
                                                                    @foreach($sku->skuValues as $value)
                                                                        @php( array_push($productAttributeValuesId, $value->attributeValue->id))
                                                                    @endforeach
                                                                @endforeach

                                                                @foreach($product->attributes as $attribute)
                                                                    @if($attribute->code == 'size')
                                                                        <div @if($catalogView == 'list')id="product_{{$product->id}}_attribute_{{$attribute->id}}" @endif class="attribute_container product-size ul-li attribute_container-list">
                                                                            <ul class="size-list clearfix size-list_list-custom">
                                                                            @foreach($attribute->attributeValues as $value)
                                                                                @if(in_array($value->id, $productAttributeValuesId))
                                                                                    <li><a @if($catalogView == 'list')id="product_{{$product->id}}_value_{{ $value->id }}" @endif data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $product->id }}-attribute_{{ $attribute->id }} attribute_value-list" data-value="{{ $value->value }}">{{ $value->value }}</a></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @elseif($attribute->code == 'color')
                                                                        <div @if($catalogView == 'list')id="product_{{$product->id}}_attribute_{{$attribute->id}}" @endif class="attribute_container product-color ul-li attribute_container-list">
                                                                            <ul class="color-list clearfix">
                                                                            @foreach($attribute->attributeValues as $value)
                                                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                                    <li><a @if($catalogView == 'list')id="product_{{$product->id}}_value_{{ $value->id }}" @endif data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $product->id }}-attribute_{{ $attribute->id }} attribute_value-list" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}"></a></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @else
                                                                        <div @if($catalogView == 'list')id="product_{{$product->id}}_attribute_{{$attribute->id}}" @endif class="ul-li attribute_container-list">
                                                                            <ul class="clearfix">
                                                                            @foreach($attribute->attributeValues as $value)
                                                                                @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                                    <li><a @if($catalogView == 'list')id="product_{{$product->id}}_value_{{ $value->id }}" @endif data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $product->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $product->id }}-attribute_{{ $attribute->id }} attribute_value-list" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}"></a></li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                        </div>

                                                        <p class="mb-30">
                                                            {!! $product->__('description') !!}
                                                        </p>

                                                        <div class="item-btns-group ul-li clearfix">
                                                            <ul class="clearfix">
                                                                <li>
                                                                    <div @if($catalogView == 'list')id="cart_add-plus_minus-container_{{ $product->id }}" @endif
                                                                    @if($productInCart == true)class="cart_add-plus_minus-container cart_add-plus_minus-container-list flex-container" @else
                                                                         class="cart_add-plus_minus-container cart_add-plus_minus-container-list display-none flex-container"@endif
                                                                    >
                                                                        <div onclick="cartMinusProduct({{ $product->id }})" class="cart_add-minus">-</div>

                                                                        <div @if($catalogView == 'list')id="catalogQuantityProduct_{{ $product->id }}" @endif data-id="{{ $product->id }}" data-position="catalog" class="cart_add-plus_minus-count catalogQuantityProduct-list">
                                                                            @if($productInCart == true){{ $cartProductQuantity }} @else
                                                                                {{ '1' }} @endif
                                                                        </div>

                                                                        <div onclick="cartPlusProduct({{ $product->id }})" class="cart_add-plus">+</div>
                                                                    </div>

                                                                    <a @if($catalogView == 'list')id="cartAddButton_{{ $product->id }}" @endif onclick="addToCartButtonCatalog({{ $product->id }})"
                                                                       @if($productInCart == true)class="add-to-cart cartAddButton-list display-none" @else
                                                                       class="add-to-cart cartAddButton-list"@endif
                                                                    >
                                                                        <i class="flaticon-shopping-basket"></i>
                                                                        {{ __('main.product.add_to_cart') }}
                                                                    </a>
                                                                </li>

                                                                @if(Auth::check())
                                                                    <li><a id="desire_{{$product->id}}" onclick="desire({{$product->id}})" class="product-details_desire-button @if($product->getUserDesire() != null)active @endif"><i class="flaticon-heart"></i></a></li>
                                                                @endif
                                                                {{--<li><a href="#!"><i class="flaticon-libra"></i></a></li>--}}
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

                                            <span class="filter-result">{{ __('main.pagination.shown') }} {{ $products->count() }} {{ __('main.pagination.from') }} {{ $products->total() }} {{ __('main.pagination.results') }}</span>
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