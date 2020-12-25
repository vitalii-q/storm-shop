@extends('layouts.hf')

@section('title', 'Корзина')

@section('content')
    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">

        <!-- breadcrumb-big-title - start -->
        <div class="breadcrumb-big-title" style="background-image: url(images/breadcrumb/bg-image-1.jpg)">
            <div class="overlay-black sec-ptb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h2 class="title-text">Корзина</h2>
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
                    <li><a href="index.html">Home</a></li>
                    <li class="active">shopping cart</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- shopping-cart-section start
    ================================================== -->
    <section id="shopping-cart-section" class="shopping-cart-section sec-ptb-60 clearfix">
        <div class="container">

            <!-- shopping-cart-table - start -->
            <div class="shopping-cart-table mb-60">
                <table class="table table-bordered mb-30">
                    <thead>
                    <tr>
                        <th colspan="2">products</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">total</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if($products)
                        @foreach($products as $product)
                            <tr id="productBlockInCart_{{ $product['id'] }}">
                                <td class="text-left" colspan="2">
                                            <span class="image-container float-left">
                                                <img src="{{ URL::asset($product['image_1']) }}" alt="image_not_found">
                                            </span>
                                    <span class="item-title">{{ $product['name'] }}</span>
                                    <ul class="clearfix">
                                        {{--<li><a href="#!"><i class="flaticon-pencil"></i></a></li>--}}
                                        {{--<li><a href="{{ route('cart_remove', $product['id']) }}"><i class="flaticon-dustbin"></i></a></li>--}}
                                        <li><a onclick="removeProductCart({{ $product['id'] }})"><i class="flaticon-dustbin"></i></a></li>
                                    </ul>
                                </td>
                                <td class="item-price product-price_get-price text-center">{{ $product['price'] }}</td>
                                <td class="item-quantity text-center">
                                    <input onkeyup="this.value = this.value.replace(/[^\d]/g,'1');" oninput="updateProductInCart(this)" data-id="{{ $product['id'] }}" data-position="cart" class="quantity_get-value" name="quantity" type="number" value="{{ $product['quantity'] }}" min="1" placeholder="quantity">
                                </td>
                                <td class="total-price product-sum_get-sum text-center">{{ App\Http\Controllers\CartController::getProductSum($product['id']) }}</td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <a href="{{ URL::previous() }}" class="continue-btn">Продолжить покупки</a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        {{--<div class="text-right">--}}

                            {{--<a href="{{ route('cart_update') }}" class="update-btn">Обновить корзину</a> <!--onclick="cartUpdate()"-->--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="text-right">
                            <a href="{{ route('cart_clear') }}" class="clear-btn">Очистить корзину</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shopping-cart-table - end -->

            <div class="row">
                <!-- shipping-estimate - start -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="shipping-estimate">

                        <div class="section-title">
                            <h2>Получение</h2>
                            {{--<p class="m-0">Выбирите способ получения</p>--}}
                        </div>

                        <form action="#!">
                            <div class="estimate-form-item mb-30">
                                <span class="title-text">Способы получения<sup class="color-orange">*</sup></span>
                                <select name="countries" class="storm-select">
                                    <option value="United States">Доставка курьером</option>
                                    <option value="United Kingdom">Отправление по почте</option>
                                    <option value="Bangladesh">Самовывоз</option>
                                </select>
                            </div>

                            {{--<div class="estimate-form-item mb-30">--}}
                                {{--<span class="title-text">state/province<sup class="color-orange">*</sup></span>--}}
                                {{--<select name="countries" class="storm-select">--}}
                                    {{--<option value="Indiana">Indiana</option>--}}
                                    {{--<option value="Option 2">Option 2</option>--}}
                                    {{--<option value="Option 3">Option 2</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<div class="estimate-form-item mb-30">--}}
                                {{--<span class="title-text">zip/postl code<sup class="color-orange">*</sup></span>--}}
                                {{--<select name="countries" class="storm-select">--}}
                                    {{--<option disabled selected>zip/postl code</option>--}}
                                    {{--<option value="Option 1">Option 1</option>--}}
                                    {{--<option value="Option 2">Option 2</option>--}}
                                    {{--<option value="Option 3">Option 2</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<a href="#!" class="calculate-btn">calculate shipping</a>--}}
                        </form>

                    </div>
                </div>
                <!-- shipping-estimate - end -->

                <!-- grand-total-price - start -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="grand-total-price">

                        <div class="money-list ul-li-block">
                            <ul class="clearfix">
                                <li>Стоимость доставки <span class="float-right">200</span></li>
                                {{--<li>tax <span class="float-right">$10.00</span></li>--}}
                            </ul>
                        </div>

                        <h2 class="total-price mb-30">Итоговая стоимость <strong id="total-price_total">{{ App\Http\Controllers\CartController::getTotalSum() }}</strong></h2>
                        <a href="{{ route('checkout') }}" class="proceed-btn">Оформить</a>

                    </div>
                </div>
                <!-- grand-total-price - end -->
            </div>

        </div>
    </section>
    <!-- shopping-cart-section end
    ================================================== -->
@endsection