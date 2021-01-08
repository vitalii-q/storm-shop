@extends('layouts.hf')

@section('title', __('main.online_shop'))

@section('content')
    <!-- slider-section - start
    ================================================== -->
    <section id="slider-section" class="slider-section clearfix">

        @foreach($sliders as $slider)
            <!-- slider-item - start -->
                <div class="slider-item" style="background-image: url({{ URL::asset($slider->image) }});">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-8 col-md-8 col-sm-10">
                                <div class="slider-content {{ $slider->__('text_position') }}">
                                    <h2 class="color-white">{{ $slider->__('text_top') }}</h2>
                                    <h1 class="color-white">{{ $slider->__('text') }}</h1>
                                    <h3 class="color-white mb-30">{{ $slider->__('text_bottom') }}</h3>
                                    @if($slider->button == 1)
                                        <a href="{{ $slider->link }}" class="custom-btn bg-pure-black">{{ __('main.buttons.more_details') }}</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- slider-item - end -->
        @endforeach

    </section>
    <!-- slider-section - end
    ================================================== -->

    <!-- police-section - start
    ================================================== -->
    <section id="police-section" class="police-section clearfix">
        <div class="container">

            <div class="police-service-list ul-li">
                <ul class="clearfix">

                    @foreach($advantages as $advantage)
                        <li>
                            <span class="icon bg-white">
                                <i class="{{ $advantage->icon_class }}"></i>
                            </span>

                            <div class="content">
                                <h3>{{ $advantage->__('title') }}</h3>
                                <p class="m-0">
                                    {{ $advantage->__('text') }}
                                </p>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </section>
    <!-- police-section - end
    ================================================== -->

    <!-- featured-section - start
    ================================================== -->
    <div id="featured-section" class="featured-section sec-ptb-60 clearfix">
        <div class="featured-container mb-60">
            <div class="container">
                <ul class="nav digital-featured-nav">
                    <li><a onclick="productTabsOnMainPage('sales')" data-toggle="tab" href="#sales" class="active">{{ __('main.tabs.sales') }}</a></li>
                    <li><a onclick="productTabsOnMainPage('bestseller')" data-toggle="tab" href="#bestseller">{{ __('main.tabs.bestsellers') }}</a></li>
                    <li><a onclick="productTabsOnMainPage('news')" data-toggle="tab" href="#news">{{ __('main.tabs.news') }}</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <!-- tab-pane (featured) - start -->
                <div id="sales" class="tab-pane fade in active show">
                    <div class="container">
                        <div class="row"> <!--class="shoes-2-mesonry grid"-->

                            @foreach($sales as $sale)
                                <!-- product-item - start -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div id="product-item_{{$sale->id}}" class="product-item" data-name="{{ $sale->__('name') }}" data-price="{{ $sale->price }}₽" data-img="{{ URL::asset($sale->image_1) }}" data-tabs-product-id="{{$sale->id}}">

                                        <!-- проверка, есть ли продукт в корзине --- -->
                                        @php($productInCart = false) @php($cartProductQuantity = 0)

                                        @if(!empty($cartProducts))
                                            @foreach($cartProducts as $cartProduct)
                                                @if($sale->id == $cartProduct['id']) @php($cartProductQuantity = $cartProduct['quantity']) @php($productInCart = true) @endif
                                            @endforeach
                                        @endif
                                        <!-- проверка, есть ли продукт в корзине end -->

                                        <div class="post-labels">
                                            <ul class="clearfix">
                                                @if($sale->bestseller == 1)<li class="bg-success">{{ __('main.stickers.bestseller') }}</li>@endif
                                                @if($sale->new == 1)<li class="bg-primary">{{ __('main.stickers.new') }}</li>@endif
                                                @if($sale->sale == 1)<li class="bg-danger">{{ __('main.stickers.sale') }}</li>@endif
                                            </ul>
                                        </div>

                                        <div class="image-container">
                                            <img src="{{ URL::asset($sale->image_1) }}" alt="image_not_found">
                                            <a href="{{ '/catalog/' . $sale->getCategory()->code . '/' . $sale->code }}" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                                {{ __('main.product.view') }}
                                            </a>
                                        </div>

                                        <div class="item-content text-center">
                                            <a href="{{ '/catalog/' . $sale->getCategory()->code . '/' . $sale->code }}" class="item-title">{{ $sale->__('name') }}</a>
                                            <div class="item-price">
                                                <strong class="color-black">{{ $sale->currency() }}</strong>
                                                {{--<del>$359.00</del>--}}
                                            </div>
                                        </div>

                                        <div class="hover-content">
                                            <div class="attribute-options color-options ul-li-center mb-15">

                                                <div id="attributes-wrapper_product-{{ $sale->id }}" class="attributes-wrapper_product-grid" data-tabs-product-id="{{$sale->id}}">
                                                @php($productAttributeValuesId = []) <!-- массив с id значений атрибутов продукта -->
                                                    @foreach($sale->skus as $sku)
                                                        @foreach($sku->skuValues as $value)
                                                            @php( array_push($productAttributeValuesId, $value->attributeValue->id))
                                                        @endforeach
                                                    @endforeach

                                                    @foreach($sale->attributes as $attribute)
                                                        @if($attribute->code == 'size')
                                                            <div id="product_{{$sale->id}}_attribute_{{$attribute->id}}" class="attribute_container product-size ul-li attribute_container-grid" data-tabs-product-id="{{$sale->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="size-list clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$sale->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $sale->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $sale->id }}-attribute_{{ $attribute->id }} attribute_value-grid" data-value="{{ $value->value }}" data-tabs-product-id="{{$sale->id}}" data-value-id="{{$value->id}}">{{ $value->value }}</a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @elseif($attribute->code == 'color')
                                                            <div id="product_{{$sale->id}}_attribute_{{$attribute->id}}" class="attribute_container product-color ul-li attribute_container-grid" data-tabs-product-id="{{$sale->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="color-list clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$sale->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $sale->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $sale->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}" data-tabs-product-id="{{$sale->id}}" data-value-id="{{$value->id}}"></a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div id="product_{{$sale->id}}_attribute_{{$attribute->id}}" class="ul-li attribute_container-grid" data-tabs-product-id="{{$sale->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$sale->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $sale->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $sale->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}" data-tabs-product-id="{{$sale->id}}" data-value-id="{{$value->id}}"></a></li>
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

                                            <div id="cart_add-plus_minus-container_{{ $sale->id }}" data-tabs-product-id="{{$sale->id}}"
                                                 @if($productInCart == true)class="cart_add-plus_minus-container cart_add-plus_minus-container-grid flex-container" @else
                                                 class="cart_add-plus_minus-container cart_add-plus_minus-container-grid display-none flex-container"@endif
                                            >
                                                <div onclick="cartMinusProduct({{ $sale->id }})" class="cart_add-minus">-</div>

                                                <div id="catalogQuantityProduct_{{ $sale->id }}" data-id="{{ $sale->id }}" data-tabs-product-id="{{$sale->id}}" data-position="catalog" class="cart_add-plus_minus-count catalogQuantityProduct-grid">
                                                    @if($productInCart == true){{ $cartProductQuantity }} @else
                                                        {{ '1' }} @endif
                                                </div>

                                                <div onclick="cartPlusProduct({{ $sale->id }})" class="cart_add-plus">+</div>
                                            </div>

                                            <a id="cartAddButton_{{ $sale->id }}" data-tabs-product-id="{{$sale->id}}" onclick="addToCartButtonCatalog({{ $sale->id }})"
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
                </div>
                <!-- tab-pane (featured) - end -->

                <!-- tab-pane (best-seller) - start -->
                <div id="bestseller" class="tab-pane fade">
                    <div class="container">
                        <div class="row">

                        @foreach($bestsellers as $bestseller)
                            <!-- product-item - start -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div id="product-item_{{$bestseller->id}}" class="product-item" data-name="{{ $bestseller->__('name') }}" data-price="{{ $bestseller->price }}₽" data-img="{{ URL::asset($bestseller->image_1) }}"  data-tabs-product-id="{{$bestseller->id}}">

                                        <!-- проверка, есть ли продукт в корзине --- -->
                                        @php($productInCart = false) @php($cartProductQuantity = 0)

                                        @if(!empty($cartProducts))
                                            @foreach($cartProducts as $cartProduct)
                                                @if($new->id == $cartProduct['id']) @php($cartProductQuantity = $cartProduct['quantity']) @php($productInCart = true) @endif
                                            @endforeach
                                        @endif
                                        <!-- проверка, есть ли продукт в корзине end -->

                                        <div class="post-labels">
                                            <ul class="clearfix">
                                                @if($bestseller->bestseller == 1)<li class="bg-success">{{ __('main.stickers.bestseller') }}</li>@endif
                                                @if($bestseller->new == 1)<li class="bg-primary">{{ __('main.stickers.new') }}</li>@endif
                                                @if($bestseller->sale == 1)<li class="bg-danger">{{ __('main.stickers.sale') }}</li>@endif
                                            </ul>
                                        </div>

                                        <div class="image-container">
                                            <img src="{{ URL::asset($bestseller->image_1) }}" alt="image_not_found">
                                            <a href="{{ '/catalog/' . $bestseller->getCategory()->code . '/' . $bestseller->code }}" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                                {{ __('main.product.view') }}
                                            </a>
                                        </div>

                                        <div class="item-content text-center">
                                            <a href="{{ '/catalog/' . $bestseller->getCategory()->code . '/' . $bestseller->code }}" class="item-title">{{ $bestseller->__('name') }}</a>
                                            <div class="item-price">
                                                <strong class="color-black">{{ $bestseller->currency() }}</strong>
                                                {{--<del>$359.00</del>--}}
                                            </div>
                                        </div>

                                        <div class="hover-content">
                                            <div class="attribute-options color-options ul-li-center mb-15">

                                                <div id="attributes-wrapper_product-{{ $bestseller->id }}" class="attributes-wrapper_product-grid" data-tabs-product-id="{{$bestseller->id}}">
                                                @php($productAttributeValuesId = []) <!-- массив с id значений атрибутов продукта -->
                                                    @foreach($bestseller->skus as $sku)
                                                        @foreach($sku->skuValues as $value)
                                                            @php(array_push($productAttributeValuesId, $value->attributeValue->id))
                                                        @endforeach
                                                    @endforeach

                                                    @foreach($bestseller->attributes as $attribute)
                                                        @if($attribute->code == 'size')
                                                            <div id="product_{{$bestseller->id}}_attribute_{{$attribute->id}}" class="attribute_container product-size ul-li attribute_container-grid" data-tabs-product-id="{{$bestseller->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="size-list clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$bestseller->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $bestseller->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $bestseller->id }}-attribute_{{ $bestseller->id }} attribute_value-grid" data-value="{{ $value->value }}" data-tabs-product-id="{{$bestseller->id}}" data-value-id="{{$value->id}}">{{ $value->value }}</a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @elseif($attribute->code == 'color')
                                                            <div id="product_{{$bestseller->id}}_attribute_{{$attribute->id}}" class="attribute_container product-color ul-li attribute_container-grid" data-tabs-product-id="{{$bestseller->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="color-list clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$bestseller->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $bestseller->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $bestseller->id }}-attribute_{{ $bestseller->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}" data-tabs-product-id="{{$bestseller->id}}" data-value-id="{{$value->id}}"></a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div id="product_{{$bestseller->id}}_attribute_{{$attribute->id}}" class="ul-li attribute_container-grid" data-tabs-product-id="{{$bestseller->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$bestseller->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $bestseller->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $bestseller->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}" data-tabs-product-id="{{$bestseller->id}}" data-value-id="{{$value->id}}"></a></li>
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

                                            <div id="cart_add-plus_minus-container_{{ $bestseller->id }}" data-tabs-product-id="{{$bestseller->id}}"
                                                 @if($productInCart == true)class="cart_add-plus_minus-container cart_add-plus_minus-container-grid flex-container" @else
                                                 class="cart_add-plus_minus-container cart_add-plus_minus-container-grid display-none flex-container"@endif
                                            >
                                                <div onclick="cartMinusProduct({{ $bestseller->id }})" class="cart_add-minus">-</div>

                                                <div id="catalogQuantityProduct_{{ $bestseller->id }}" data-id="{{ $bestseller->id }}" data-tabs-product-id="{{$bestseller->id}}" data-position="catalog" class="cart_add-plus_minus-count catalogQuantityProduct-grid">
                                                    @if($productInCart == true){{ $cartProductQuantity }} @else
                                                        {{ '1' }} @endif
                                                </div>

                                                <div onclick="cartPlusProduct({{ $bestseller->id }})" class="cart_add-plus">+</div>
                                            </div>

                                            <a id="cartAddButton_{{ $bestseller->id }}" onclick="addToCartButtonCatalog({{ $bestseller->id }})" data-tabs-product-id="{{$bestseller->id}}"
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
                </div>
                <!-- tab-pane (best-seller) - start -->

                <!-- tab-pane (top-rated) - start -->
                <div id="news" class="tab-pane fade">
                    <div class="container">
                        <div class="row">

                        @foreach($news as $new)
                            <!-- product-item - start -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div id="product-item_{{$new->id}}" class="product-item" data-name="{{ $new->__('name') }}" data-price="{{ $new->price }}₽" data-img="{{ URL::asset($new->image_1) }}" data-tabs-product-id="{{$new->id}}">

                                        <!-- проверка, есть ли продукт в корзине --- -->
                                        @php($productInCart = false) @php($cartProductQuantity = 0)

                                        @if(!empty($cartProducts))
                                            @foreach($cartProducts as $cartProduct)
                                                @if($new->id == $cartProduct['id']) @php($cartProductQuantity = $cartProduct['quantity']) @php($productInCart = true) @endif
                                            @endforeach
                                        @endif
                                        <!-- проверка, есть ли продукт в корзине end -->

                                        <div class="post-labels">
                                            <ul class="clearfix">
                                                @if($new->bestseller == 1)<li class="bg-success">{{ __('main.stickers.bestseller') }}</li>@endif
                                                @if($new->new == 1)<li class="bg-primary">{{ __('main.stickers.new') }}</li>@endif
                                                @if($new->sale == 1)<li class="bg-danger">{{ __('main.stickers.sale') }}</li>@endif
                                            </ul>
                                        </div>

                                        <div class="image-container">
                                            <img src="{{ URL::asset($new->image_1) }}" alt="image_not_found">
                                            <a href="{{ '/catalog/' . $sale->getCategory()->code . '/' . $sale->code }}" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                                {{ __('main.product.view') }}
                                            </a>
                                        </div>

                                        <div class="item-content text-center">
                                            <a href="{{ '/catalog/' . $new->getCategory()->code . '/' . $new->code }}" class="item-title">{{ $new->__('name') }}</a>
                                            <div class="item-price">
                                                <strong class="color-black">{{ $new->currency() }}</strong>
                                                {{--<del>$359.00</del>--}}
                                            </div>
                                        </div>

                                        <div class="hover-content">
                                            <div class="attribute-options color-options ul-li-center mb-15">

                                                <div id="attributes-wrapper_product-{{ $new->id }}" class="attributes-wrapper_product-grid" data-tabs-product-id="{{$new->id}}">
                                                @php($productAttributeValuesId = []) <!-- массив с id значений атрибутов продукта -->
                                                    @foreach($new->skus as $sku)
                                                        @foreach($sku->skuValues as $value)
                                                            @php( array_push($productAttributeValuesId, $value->attributeValue->id))
                                                        @endforeach
                                                    @endforeach

                                                    @foreach($new->attributes as $attribute)
                                                        @if($attribute->code == 'size')
                                                            <div id="product_{{$new->id}}_attribute_{{$attribute->id}}" class="attribute_container product-size ul-li attribute_container-grid" data-tabs-product-id="{{$new->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="size-list clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$new->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $new->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $new->id }}-attribute_{{ $attribute->id }} attribute_value-grid" data-value="{{ $value->value }}" data-tabs-product-id="{{$new->id}}" data-value-id="{{$value->id}}">{{ $value->value }}</a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @elseif($attribute->code == 'color')
                                                            <div id="product_{{$new->id}}_attribute_{{$attribute->id}}" class="attribute_container product-color ul-li attribute_container-grid" data-tabs-product-id="{{$new->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="color-list clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$new->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $new->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $new->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}" data-tabs-product-id="{{$new->id}}" data-value-id="{{$value->id}}"></a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div id="product_{{$new->id}}_attribute_{{$attribute->id}}" class="ul-li attribute_container-grid" data-tabs-product-id="{{$new->id}}" data-attribute-id="{{$attribute->id}}">
                                                                <ul class="clearfix">
                                                                @foreach($attribute->attributeValues as $value)
                                                                    @if(in_array($value->id, $productAttributeValuesId)) <!-- проверка есть ли у sku продукта значение аттрибута -->
                                                                        <li><a id="product_{{$new->id}}_value_{{ $value->id }}" data-attribute-id="{{$attribute->id}}" onclick="attributeChange([{{ $new->id }}, {{ $value->id }}, {{ $attribute->id }}])" class="product-attribute_element product_{{ $new->id }}-attribute_{{ $attribute->id }} attribute_value-grid" style="background-color: {{ $value->value }}"  data-value="{{ $value->value }}" data-tabs-product-id="{{$new->id}}" data-value-id="{{$value->id}}"></a></li>
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

                                            <div id="cart_add-plus_minus-container_{{ $new->id }}" data-tabs-product-id="{{$new->id}}"
                                                 @if($productInCart == true)class="cart_add-plus_minus-container cart_add-plus_minus-container-grid flex-container" @else
                                                 class="cart_add-plus_minus-container cart_add-plus_minus-container-grid display-none flex-container"@endif
                                            >
                                                <div onclick="cartMinusProduct({{ $new->id }})" class="cart_add-minus">-</div>

                                                <div id="catalogQuantityProduct_{{ $new->id }}" data-id="{{ $new->id }}" data-tabs-product-id="{{$new->id}}" data-position="catalog" class="cart_add-plus_minus-count catalogQuantityProduct-grid">
                                                    @if($productInCart == true){{ $cartProductQuantity }} @else
                                                        {{ '1' }} @endif
                                                </div>

                                                <div onclick="cartPlusProduct({{ $new->id }})" class="cart_add-plus">+</div>
                                            </div>

                                            <a id="cartAddButton_{{ $new->id }}" onclick="addToCartButtonCatalog({{ $new->id }})" data-tabs-product-id="{{$new->id}}"
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
                </div>
                <!-- tab-pane (top-rated) - start -->
            </div>
        </div>
    </div>
    <!-- featured-section - end
    ================================================== -->
@endsection
