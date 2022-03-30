@extends('layouts.hf')

@if($user->id == Auth::user()->id)
    @section('title', Auth::user()->first_name)
@else
    @section('title', $user->first_name)
@endif

@section('css')
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ URL::asset('css/codebase.min.css') }}">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
{{--    <link rel="shortcut icon" href="{{ URL::asset('media/favicons/favicon.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="192x192" href="{{ URL::asset('media/favicons/favicon-192x192.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('media/favicons/apple-touch-icon-180x180.png') }}">--}}
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
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
                            @if($user->id == Auth::user()->id)
                            <h2 class="title-text">{{ __('personal.account') }}</h2>
                            @else
                            <h2 class="title-text">{{ __('personal.profile') }}</h2>
                            @endif
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
                    @if($user->id == Auth::user()->id)
                        <li class="active">{{ __('personal.account') }}</li>
                    @else
                        <li><a href="{{ route('personal', Auth::user()->id) }}">{{ __('personal.account') }}</a></li>
                        <li class="active">{{ $user->first_name }}</li>
                    @endif
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

                    @if($user->id == Auth::user()->id)
                    {{--<div class="block-header block-header-default">--}}
                        {{--<h3 class="block-title">Заказы</h3>--}}

                        {{--<div class="block-options">--}}
                            {{--<div class="block-options-item">--}}
                                {{--<code>.table</code>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="personal_block-content block-content">

                        <!-- Navigation -->
                        <div class="personal-tabs p-10 bg-white push">
                            <ul class="nav nav-pills justify-content-center">
                                <li class="personal-tab_li nav-item">
                                    <a onclick="viewPersonal('orders')" class="nav-link personal-tab_link @if($personalView == 'orders')active @endif" data-toggle="tab" href="#orders">
                                        <i class="fa fa-fw fa-archive mr-5"></i> {{ __('personal.orders') }}
                                    </a>
                                </li>

                                <li class="personal-tab_li nav-item">
                                    <a onclick="viewPersonal('desires')" class="nav-link personal-tab_link @if($personalView == 'desires')active @endif" data-toggle="tab" href="#desires">
                                        <i class="fa fa-fw fa-heart mr-5"></i> {{ __('personal.desires') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Navigation -->

                        <table id="orders" class="personal-block_content-table table table-vcenter @if($personalView == 'orders')active show @endif" role="tabpanel">
                            <thead>
                            <tr>
                                <th style="width: 33px"></th>
                                <th>{{ __('personal.orders') }}</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">{{ __('personal.status.status') }}</th>
                                <th class="text-center" style="width: 100px;">{{ __('personal.actions') }}</th>
                            </tr>
                            </thead>

                            @if(count($orders) > 0)
                            <tbody>

                                @foreach($orders as $order)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $order->id }}</td>

                                    <td class="d-none d-sm-table-cell">
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

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('personal_order', [Auth::user()->id, $order->id]) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                <i class="fa fa-folder-open"></i>
                                            </a>

                                            {{--<button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">--}}
                                                {{--<i class="fa fa-times"></i>--}}
                                            {{--</button>--}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            @endif

                        </table>

                        <table id="desires" class="personal-block_content-table table table-bordered mb-30 @if($personalView == 'desires')active show @endif" role="tabpanel">
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th colspan="2">products</th>--}}
                                {{--<th scope="col">price</th>--}}
                                {{--<th scope="col">quantity</th>--}}
                                {{--<th scope="col">total</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}

                            @if(count($desires) > 0)
                                @foreach($desires as $desire)
                                <tbody id="personal_desire_{{$desire->id}}">
                                <tr>
                                    <td class="text-left" colspan="2">
                                        <span class="personal-table_desires-img-container image-container float-left">
                                            <img class="personal-table_desires-img" src="{{ URL::asset( $desire->image_1 ) }}" alt="image_not_found">
                                        </span>

                                        <a class="personal-table_desires-link" href="{{ '/catalog/' . $desire->getCategory()->code . '/' . $desire->code }}">{{ $desire->__('name') }}</a>

                                        <span class="personal-table_desires-description">{!! mb_strimwidth($desire->__('description'), 0, 390, '...') !!}</span>

                                        <div class="personal-table_desires-buttons clearfix">
                                            <a onclick="desire({{$desire->id}})"><i class="flaticon-dustbin"></i></a>
                                        </div>
                                    </td>

                                    <td class="personal-table_desires-price item-price text-center">{{ $desire->price }}₽</td>
                                </tr>
                                </tbody>
                                @endforeach
                            @endif
                        </table>

                        {{--<div class="bg-white push">--}}
                            {{--<div class="row text-center">--}}
                                {{--<div class="col-sm-6 py-30">--}}
                                    {{--<div class="font-size-h1 font-w700 text-black js-count-to-enabled" data-toggle="countTo" data-to="3">3</div>--}}
                                    {{--<div class="font-w600 text-muted text-uppercase">Заказы</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-6 py-30">--}}
                                    {{--<div class="font-size-h1 font-w700 text-black js-count-to-enabled" data-toggle="countTo" data-to="12">12</div>--}}
                                    {{--<div class="font-w600 text-muted text-uppercase">Желания</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    @endif

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">

                    <div class="checkout-sidebar-section">

                        <div class="order-summary mb-30 clearfix">
                            <div class="section-title section-title_checkout-custom">
                                @if($user->id == Auth::user()->id)
                                    <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                                @else
                                    <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                @endif
                            </div>

                            {{--<span class="item-amount mb-15">{{ Auth::user()->first_name }}</span>--}}
                            <div class="item-summary flex-container mb-15">
                                <div class="item-content">
                                    {{--<h3 class="title-text">Checked Cotton Shirt</h3>--}}

                                    @if($user->id == Auth::user()->id)
                                        @if(Auth::user()->email)
                                        <span class="qty-text mb-15">
                                            {{ __('personal.person.email') }}: <br><br>
                                            <small>{{ Auth::user()->email }}</small>
                                        </span>
                                        <br>
                                        @endif

                                        @if(Auth::user()->phone)
                                        <span class="qty-text mb-15">
                                            {{ __('personal.person.phone') }}: <br><br>
                                            <small>{{ Auth::user()->phone }}</small>
                                        </span>
                                        <br>
                                        @endif


                                        @if(Auth::user()->city)
                                        <span class="qty-text mb-15">
                                            {{ __('personal.person.city') }}: <br><br>
                                            <small>{{ Auth::user()->city }}</small>
                                        </span>
                                        <br>
                                        @endif

                                        @if(Auth::user()->street)
                                        <span class="qty-text mb-15">
                                            {{ __('personal.person.street') }}: <br><br>
                                            <small>{{ Auth::user()->street }}</small>
                                        </span>
                                        <br>
                                        @endif

                                        @if(Auth::user()->apartment)
                                        <span class="qty-text mb-15">
                                            {{ __('personal.person.apartment') }}: <small>{{ Auth::user()->apartment }}</small>
                                        </span>
                                        @endif
                                    @endif

                                    {{--<div class="item-price">--}}
                                        {{--<strong class="color-black">$199.99</strong>--}}
                                    {{--</div>--}}
                                </div>

                                @if($user->id == Auth::user()->id)
                                    @if(isset(Auth::user()->image))
                                        <div class="image-container">
                                            <img src="{{ URL::asset(Auth::user()->image) }}" alt="image_not_found">
                                        </div>
                                    @endif
                                @else
                                    @if(isset($user->image))
                                        <div class="image-container">
                                            <img src="{{ URL::asset($user->image) }}" alt="image_not_found">
                                        </div>
                                    @endif
                                @endif
                            </div>

                            @if($user->id == Auth::user()->id)
                                <a href="{{ route('personal_edit', Auth::user()->id) }}" class="next-btn custom-btn bg-past">{{ __('personal.edit') }}</a>
                            @endif
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
