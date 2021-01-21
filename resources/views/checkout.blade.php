@extends('layouts.hf')

@section('title', 'Оформление заказа')

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
                            <h2 class="title-text">{{ __('cart.checkout_title') }}</h2>
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
                    <li><a href="{{ route('cart') }}">{{ __('cart.cart') }}</a></li>
                    <li class="active">{{ __('cart.checkout_breadcrumb') }}</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- checkout-section start
    ================================================== -->
    <section id="checkout-section" class="checkout-section sec-ptb-60 clearfix">
        <div class="container">
            <div class="row justify-content-md-center">

                <div class="col-lg-8 col-md-12 col-sm-12">

                    @guest
                        <!-- sign-in-container - start -->
                        <div class="sign-in-container">
                            <a href="{{ route('login') }}" class="sign-in-btn">{{ __('main.buttons.login') }}</a>
                        </div>
                        <!-- sign-in-container - end -->
                    @endguest

                    <div class="checkout-content">
                        {{--<ul class="nav checkout-nav mb-60">--}}
                            {{--<li>--}}
                                {{--<a class="active" data-toggle="tab" href="#menu1">--}}
                                    {{--<span>1</span>--}}
                                    {{--<strong>Shipping</strong>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a data-toggle="tab" href="#menu2">--}}
                                    {{--<span>2</span>--}}
                                    {{--<strong>Payments</strong>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        <div class="tab-content">

                            <div id="menu1" class="tab-pane fade in active show">
                                <div class="section-title">
                                    <h2>{{ __('cart.order.ordering') }}</h2>
                                </div>

                                <form action="{{ route('buy') }}">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.first_name') }}<sup>*</sup></span>
                                                @if(Auth::check())
                                                    <input type="text" name="first_name" value="{{ Auth::user()->first_name }}">
                                                @else
                                                    <input type="text" name="first_name">
                                                @endif

                                                @error('first_name') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.last_name') }}<sup>*</sup></span>
                                                @if(Auth::check())
                                                    <input type="text" name="last_name" value="{{ Auth::user()->last_name }}">
                                                @else
                                                    <input type="text" name="last_name">
                                                @endif

                                                @error('last_name') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.email') }}</span>
                                                @if(Auth::check())
                                                    <input type="email" name="email" value="{{ Auth::user()->email }}">
                                                @else
                                                    <input type="email" name="email">
                                                @endif
                                                {{--<p class="mb-0">You can create an account after checkout.</p>--}}

                                                @error('email') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.phone') }}<sup>*</sup></span>
                                                @if(Auth::check())
                                                    <input type="tel" name="phone" value="{{ Auth::user()->phone }}">
                                                @else
                                                    <input type="tel" name="phone">
                                                @endif

                                                @error('phone') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.city') }}<sup>*</sup></span>
                                                @if(Auth::check())
                                                    <input type="text" name="shipping_city" value="{{ Auth::user()->city }}">
                                                @else
                                                    <input type="text" name="shipping_city">
                                                @endif

                                                @error('shipping_city') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.street') }}<sup>*</sup></span>
                                                @if(Auth::check())
                                                    <input type="text" name="shipping_street" value="{{ Auth::user()->street }}">
                                                @else
                                                    <input type="text" name="shipping_street">
                                                @endif


                                                @error('shipping_street') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">{{ __('cart.order.apartment') }}<sup>*</sup></span>
                                                @if(Auth::check())
                                                    <input type="text" name="shipping_apartment" value="{{ Auth::user()->apartment }}">
                                                @else
                                                    <input type="text" name="shipping_apartment">
                                                @endif

                                                @error('shipping_apartment') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="address-textarea mb-30">
                                                <span class="input-title font-w600">{{ __('cart.order.comment') }}</span>
                                                <textarea name="message"></textarea>

                                                @error('message') <!-- добавляем вывод ошибки -->
                                                <br>
                                                <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" class="next-btn custom-btn bg-past">{{ __('cart.checkout') }}</button>
                                        </div>

                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                            {{--<div class="sate-province mb-30">--}}
                                                {{--<span class="input-title">Sate/Province<sup>*</sup></span>--}}
                                                {{--<select class="storm-select">--}}
                                                    {{--<option selected>Please select a region, state or province.</option>--}}
                                                    {{--<option value="AB">Alberta</option>--}}
                                                    {{--<option value="BC">British Columbia</option>--}}
                                                    {{--<option value="MB">Manitoba</option>--}}
                                                    {{--<option value="NB">New Brunswick</option>--}}
                                                    {{--<option value="NL">Newfoundland and Labrador</option>--}}
                                                    {{--<option value="NS">Nova Scotia</option>--}}
                                                    {{--<option value="ON">Ontario</option>--}}
                                                    {{--<option value="PE">Prince Edward Island</option>--}}
                                                    {{--<option value="QC">Quebec</option>--}}
                                                    {{--<option value="SK">Saskatchewan</option>--}}
                                                    {{--<option value="NT">Northwest Territories</option>--}}
                                                    {{--<option value="NU">Nunavut</option>--}}
                                                    {{--<option value="YT">Yukon</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                            {{--<div class="form-item">--}}
                                                {{--<span class="input-title">Zip/Postal Code<sup>*</sup></span>--}}
                                                {{--<input type="text">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                            {{--<div class="country-select mb-30">--}}
                                                {{--<span class="input-title">Country<sup>*</sup></span>--}}
                                                {{--<select class="storm-select">--}}
                                                    {{--<option value="BE">Belgium</option>--}}
                                                    {{--<option value="CN">China</option>--}}
                                                    {{--<option value="EE">Estonia</option>--}}
                                                    {{--<option value="FI">Finland</option>--}}
                                                    {{--<option value="FR">France</option>--}}
                                                    {{--<option value="DE">Germany</option>--}}
                                                    {{--<option value="GR">Greece</option>--}}
                                                    {{--<option value="HK">Hong Kong</option>--}}
                                                    {{--<option value="IE">Ireland</option>--}}
                                                    {{--<option value="IL">Israel</option>--}}
                                                    {{--<option value="IT">Italy</option>--}}
                                                    {{--<option value="JP">Japan</option>--}}
                                                    {{--<option value="KZ">Kazakhstan</option>--}}
                                                    {{--<option value="KR">South Korea</option>--}}
                                                    {{--<option value="LU">Luxembourg</option>--}}
                                                    {{--<option value="NZ">New Zealand</option>--}}
                                                    {{--<option value="NO">Norway</option>--}}
                                                    {{--<option value="PL">Poland</option>--}}
                                                    {{--<option value="PT">Portugal</option>--}}
                                                    {{--<option value="RU">Russian Federation</option>--}}
                                                    {{--<option value="ES">Spain</option>--}}
                                                    {{--<option value="UA">Ukraine</option>--}}
                                                    {{--<option value="AE">United Arab Emirates</option>--}}
                                                    {{--<option value="GB">United Kingdom</option>--}}
                                                    {{--<option value="US">United States</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    </div>
                                </form>
                            </div>

                            {{--<div id="menu2" class="tab-pane fade">--}}
                                {{--<div class="section-title">--}}
                                    {{--<h2>Payments</h2>--}}
                                {{--</div>--}}

                                {{--<form action="#!">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                            {{--<div class="form-item">--}}
                                                {{--<span class="input-title font-w600">Email Address<sup>*</sup></span>--}}
                                                {{--<input type="email">--}}
                                                {{--<p class="mb-0">You can create an account after checkout.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                            {{--<div class="sate-province mb-30">--}}
                                                {{--<span class="input-title font-w600">Способ оплаты<sup>*</sup></span>--}}
                                                {{--<select name="payment" class="storm-select">--}}
                                                    {{--<option selected>Выберите способ оплаты</option>--}}
                                                    {{--<option value="">Оплата картой</option>--}}
                                                    {{--<option value="">Оплата наличными</option>--}}
                                                    {{--<option value="">PayPal</option>--}}
                                                {{--</select>--}}

                                                {{--@error('payment')--}}
                                                {{--<br>--}}
                                                {{--<br><div class="alert alert-danger">{{ $message }}</div>--}}
                                                {{--@enderror--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="checkout-sidebar-section">

                        <div class="order-summary mb-30 clearfix checkout_products-block">
                            <div class="section-title section-title_checkout-custom">
                                <h2>{{ __('cart.order.summary').': '.App\Http\Controllers\CartController::getTotalSum().App\Services\CurrencyConversion::currencySymbol() }}</h2>
                            </div>

                            <span class="item-amount mb-15">{{ App\Http\Controllers\CartController::getProductsCountInCart() }} {{ __('cart.order.in_cart') }}</span>

                            <div class="flex-container">
                                @php($i = 1)
                                @if($products)
                                    @foreach($products as $product)
                                        <div class="item-summary checkout_product-block">
                                            <div class="image-container">
                                                <img src="{{ URL::asset($product['image_1']) }}" alt="image_not_found">
                                            </div>
                                            <div class="item-content">
                                                <h3 class="title-text">{{ App\Models\Product::where('id', $product['product_id'])->first()->__('name') }}</h3>

                                                @foreach(App\Models\Product::getSku($product['id'])->skuValues as $skuValue)
                                                    <p><b>{{  $skuValue->attributeValue->attribute->__('name') }}:</b> {{ $skuValue->attributeValue->__('name') }}</p>
                                                @endforeach

                                                <span class="qty-text mb-15">{{ __('cart.quantity') }}: <small>{{ $product['quantity'] }}</small></span>
                                                <div class="item-price">
                                                    <strong class="color-black">{{ App\Http\Controllers\CartController::getProductSum($product['id']).App\Services\CurrencyConversion::currencySymbol() }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        @php($i++)
                                    @endforeach
                                @endif
                            </div>

                        </div>

                        {{--<div class="shipping-method clearfix">--}}
                            {{--<div class="section-title">--}}
                                {{--<h2>Shipping Methods</h2>--}}
                            {{--</div>--}}

                            {{--<div class="shipping-methods-table bg-gray clearfix">--}}

                                {{--<table class="table mb-30">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">select method</th>--}}
                                        {{--<th>price</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<input type="checkbox" id="check-1">--}}
                                        {{--</th>--}}
                                        {{--<td>$10.00</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">--}}
                                            {{--<input type="checkbox" id="check-2">--}}
                                        {{--</th>--}}
                                        {{--<td>$15.00</td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}

                                {{--<table class="table mb-30">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">method title</th>--}}
                                        {{--<th>carrier title</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">Fixed</th>--}}
                                        {{--<td>Flat Rate</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="row">Free</th>--}}
                                        {{--<td>Free Shipping</td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}

                                {{--<a href="{{ route('buy') }}" class="next-btn custom-btn bg-past">next</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- checkout-section end
    ================================================== -->
@endsection