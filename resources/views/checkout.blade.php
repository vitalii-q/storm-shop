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
                            <h2 class="title-text">Оформление</h2>
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
                    <li class="active">checkout</li>
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
                            <a href="{{ route('login') }}" class="sign-in-btn">sign in</a>
                        </div>
                        <!-- sign-in-container - end -->
                    @endguest

                    <div class="checkout-content">
                        <ul class="nav checkout-nav mb-60">
                            <li>
                                <a class="active" data-toggle="tab" href="#menu1">
                                    <span>1</span>
                                    <strong>Shipping</strong>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu2">
                                    <span>2</span>
                                    <strong>Payments</strong>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div id="menu1" class="tab-pane fade in active show">
                                <div class="section-title">
                                    <h2>shipping address</h2>
                                </div>

                                <form action="{{ route('buy') }}">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">First Name<sup>*</sup></span>
                                                <input type="text" name="first_name">

                                                @error('first_name') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">Last Name<sup>*</sup></span>
                                                <input type="text" name="last_name">

                                                @error('last_name') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">Email Address<sup>*</sup></span>
                                                <input type="email" name="email">
                                                {{--<p class="mb-0">You can create an account after checkout.</p>--}}

                                                @error('email') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">Phone<sup>*</sup></span>
                                                <input type="tel" name="phone">

                                                @error('phone') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">City<sup>*</sup></span>
                                                <input type="text" name="shipping_city">

                                                @error('shipping_city') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">Street Address<sup>*</sup></span>
                                                <input type="text" name="shipping_street">

                                                @error('shipping_street') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-item">
                                                <span class="input-title font-w600">Apartment<sup>*</sup></span>
                                                <input type="text" name="shipping_apartment">

                                                @error('shipping_apartment') <!-- добавляем вывод ошибки -->
                                                    <br>
                                                    <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="address-textarea mb-30">
                                                <span class="input-title font-w600">Message<sup>*</sup></span>
                                                <textarea name="message"></textarea>

                                                @error('message') <!-- добавляем вывод ошибки -->
                                                <br>
                                                <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" class="next-btn custom-btn bg-past">Оформить</button>
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

                            <div id="menu2" class="tab-pane fade">
                                <div class="section-title">
                                    <h2>Payments</h2>
                                </div>

                                <form action="#!">
                                    <div class="row">
                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                            {{--<div class="form-item">--}}
                                                {{--<span class="input-title font-w600">Email Address<sup>*</sup></span>--}}
                                                {{--<input type="email">--}}
                                                {{--<p class="mb-0">You can create an account after checkout.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="sate-province mb-30">
                                                <span class="input-title font-w600">Способ оплаты<sup>*</sup></span>
                                                <select name="payment" class="storm-select">
                                                    <option selected>Выберите способ оплаты</option>
                                                    <option value="">Оплата картой</option>
                                                    <option value="">Оплата наличными</option>
                                                    <option value="">PayPal</option>
                                                </select>

                                                @error('payment')
                                                <br>
                                                <br><div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="checkout-sidebar-section">

                        <div class="order-summary mb-30 clearfix checkout_products-block">
                            <div class="section-title section-title_checkout-custom">
                                <h2>Итог заказа</h2>
                            </div>

                            <span class="item-amount mb-15">{{ App\Http\Controllers\CartController::getProductsCountInCart() }} продуктов в корзине</span>

                            <div class="flex-container">
                                @php($i = 1)
                                @if($products)
                                    @foreach($products as $product)
                                        <div class="item-summary checkout_product-block">
                                            <div class="image-container">
                                                <img src="{{ Storage::url($product['image_1']) }}" alt="image_not_found">
                                            </div>
                                            <div class="item-content">
                                                <h3 class="title-text">{{ $product['name'] }}</h3>
                                                <span class="qty-text mb-15">К-во: <small>{{ $product['quantity'] }}</small></span>
                                                <div class="item-price">
                                                    <strong class="color-black">{{ App\Http\Controllers\CartController::getProductSum($product['id']) }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        @php($i++)
                                    @endforeach
                                @endif
                            </div>

                        </div>

                        <div class="shipping-method clearfix">
                            <div class="section-title">
                                <h2>Shipping Methods</h2>
                            </div>

                            <div class="shipping-methods-table bg-gray clearfix">
                                <table class="table mb-30">
                                    <thead>
                                    <tr>
                                        <th scope="row">select method</th>
                                        <th>price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">
                                            <input type="checkbox" id="check-1">
                                        </th>
                                        <td>$10.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <input type="checkbox" id="check-2">
                                        </th>
                                        <td>$15.00</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table class="table mb-30">
                                    <thead>
                                    <tr>
                                        <th scope="row">method title</th>
                                        <th>carrier title</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Fixed</th>
                                        <td>Flat Rate</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Free</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <a href="{{ route('buy') }}" class="next-btn custom-btn bg-past">next</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- checkout-section end
    ================================================== -->
@endsection