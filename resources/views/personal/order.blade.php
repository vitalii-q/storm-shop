@extends('layouts.hf')

@section('title', Auth::user()->first_name)

@section('css')
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ URL::asset('css/codebase.min.css') }}">
@endsection

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
                            <h2 class="title-text">Личный кабинет</h2>
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
                    <li><a href="{{ route('personal', Auth::user()->id) }}">Личный кабинет</a></li>
                    <li class="active">Заказ: {{ $order->id }}</li>
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

                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title block-title_order-custom">Номер заказа: {{ $order->id }}</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-borderless mt-20">
                                <tbody>
                                <tr>
                                    <td class="font-w600">Заказчик</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                </tr>

                                <tr>
                                    <td class="font-w600">Номер телефона</td>
                                    <td>{{ $order->phone }}</td>
                                </tr>

                                <tr>
                                    <td class="font-w600">Сумма покупки</td>
                                    <td>{{ $order->sum.App\Services\CurrencyConversion::getCurrencySymbol($order->currency_id) }}</td>
                                </tr>

                                <tr>
                                    <td class="font-w600">Дата покупки</td>
                                    <td>{{ Date::parse($order->created_at)->format('j F Y') }}</td>
                                </tr>

                                <tr>
                                    <td class="font-w600">Время покупки</td>
                                    <td>{{ Date::parse($order->created_at)->format('H:i') }}</td>
                                </tr>

                                <tr>
                                    <td class="font-w600">Статус</td>
                                    <td>
                                        @if($order->status == 1)
                                            <span class="badge badge-info">{{ __('personal.status.formalized') }}</span>
                                        @elseif($order->status == 2)
                                            <span class="badge badge-warning">{{ __('personal.status.pack') }}</span>
                                        @elseif($order->status == 3)
                                            <span class="badge badge-success">{{ __('personal.status.completed') }}</span>
                                        @elseif($order->status == 4)
                                            <span class="badge badge-danger">{{ __('personal.status.canceled') }}</span>
                                        @endif
                                    </td>
                                </tr>

                                @if($order->message)
                                <tr>
                                    <td class="font-w600">Комментарий</td>
                                    <td>{{ $order->message }}</td>
                                </tr>
                                </tbody>
                                @endif
                            </table>

                            <div class="block-content_skus block-content_skus-custom">

                                @foreach($skus as $sku)
                                    <div class="block-content_sku flex-container">
                                        <table class="table table-striped table-borderless mt-20 col-md-8">

                                                <tbody>
                                                <tr>
                                                    <td class="font-w600">Название товара</td>
                                                    <td>{{ $sku->product->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="font-w600">Детали товара</td>
                                                    <td>{{ $order->getOptions($sku->id) }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="font-w600">Количество</td>
                                                    <td>{{ $sku->quantity($order->id) }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="font-w600">Стоимость</td>
                                                    <td>{{ App\Services\CurrencyConversion::getCurrencyById($sku->product->price, $order->currency_id).App\Services\CurrencyConversion::getCurrencySymbol($order->currency_id) }}</td>
                                                </tr>
                                                </tbody>

                                        </table>

                                        <div class="col-md-4 mt-20 animated fadeIn">
                                            <div class="options-container">
                                                <img class="img-fluid options-item order-sku_img-custom" src="{{ URL::asset($sku->product->image_1) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="checkout-sidebar-section">

                        <div class="order-summary mb-30 clearfix">
                            <div class="section-title section-title_checkout-custom">
                                <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                            </div>

                            {{--<span class="item-amount mb-15">{{ Auth::user()->first_name }}</span>--}}
                            <div class="item-summary flex-container mb-15">
                                <div class="item-content">
                                    {{--<h3 class="title-text">Checked Cotton Shirt</h3>--}}

                                    @if(Auth::user()->email)
                                        <span class="qty-text mb-15">
                                        Email: <br><br>
                                        <small>{{ Auth::user()->email }}</small>
                                    </span>
                                        <br>
                                    @endif

                                    @if(Auth::user()->phone)
                                        <span class="qty-text mb-15">
                                        Телефон: <br><br>
                                        <small>{{ Auth::user()->phone }}</small>
                                    </span>
                                        <br>
                                    @endif

                                    @if(Auth::user()->city)
                                        <span class="qty-text mb-15">
                                        Город: <br><br>
                                        <small>{{ Auth::user()->city }}</small>
                                    </span>
                                        <br>
                                    @endif

                                    @if(Auth::user()->street)
                                        <span class="qty-text mb-15">
                                        Улица: <br><br>
                                        <small>{{ Auth::user()->street }}</small>
                                    </span>
                                        <br>
                                    @endif

                                    @if(Auth::user()->apartment)
                                        <span class="qty-text mb-15">
                                        Квартира: <small>{{ Auth::user()->apartment }}</small>
                                    </span>
                                    @endif

                                    {{--<div class="item-price">--}}
                                    {{--<strong class="color-black">$199.99</strong>--}}
                                    {{--</div>--}}
                                </div>

                                @if(isset(Auth::user()->image))
                                    <div class="image-container">
                                        <img src="{{ URL::asset(Auth::user()->image) }}" alt="image_not_found">
                                    </div>
                                @endif
                            </div>

                            {{--<a href="{{ route('personal_edit') }}" class="next-btn custom-btn bg-past">Редактировать</a>--}}
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

                        {{--<a href="#!" class="next-btn custom-btn bg-past">next</a>--}}
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