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
                            <h2 class="title-text">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
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
                    <li><a href="{{ route('personal', Auth::user()->id) }}">{{ __('personal.account') }}</a></li>
                    <li class="active">{{ __('personal.editing') }}</li>
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
                    {{--<div class="block-header block-header-default">--}}
                    {{--<h3 class="block-title">Заказы</h3>--}}

                    {{--<div class="block-options">--}}
                    {{--<div class="block-options-item">--}}
                    {{--<code>.table</code>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="block-content">
                        <table class="table table-vcenter">

                            @if(count($orders) > 0)
                            <thead>
                            <tr>
                                <th style="width: 33px"></th>
                                <th>{{ __('personal.orders') }}</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">{{ __('personal.status.status') }}</th>
                                <th class="text-center" style="width: 100px;">{{ __('personal.actions') }}</th>
                            </tr>
                            </thead>

                            <tbody>

                                @foreach($orders as $order)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $order->id }}</td>

                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-info">{{ __('personal.status.processed') }}</span>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                <i class="fa fa-folder-open"></i>
                                            </button>

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
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="checkout-sidebar-section">

                        <form action="{{ route('personal_update') }}" method="post" class="order-summary mb-30 clearfix" enctype="multipart/form-data" accept="image/*">
                            @csrf

                            <div class="section-title section-title_checkout-custom">
                                <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                            </div>

                            {{--<span class="item-amount mb-15">{{ Auth::user()->first_name }}</span>--}}
                            <div class="item-summary mb-15">
                                <div class="item-content width-100 pl-0">
                                    {{--<h3 class="title-text">Checked Cotton Shirt</h3>--}}

                                    <div class="form-group">
                                        <label for="first_name">{{ __('personal.person.first_name') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="@isset(Auth::user()->first_name){{ Auth::user()->first_name }}@endisset" placeholder="{{ __('personal.person.first_name') }}..">
                                        </div>

                                        <label for="last_name">{{ __('personal.person.last_name') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="@isset(Auth::user()->last_name){{ Auth::user()->last_name }}@endisset" placeholder="{{ __('personal.person.last_name') }}..">
                                        </div>

                                        <label for="middle_name">{{ __('personal.person.middle_name') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="middle_name" name="middle_name" value="@isset(Auth::user()->middle_name){{ Auth::user()->middle_name }}@endisset" placeholder="{{ __('personal.person.middle_name') }}..">
                                        </div>

                                        <label for="middle_name">{{ __('personal.person.email') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="email" name="email" value="@isset(Auth::user()->email){{ Auth::user()->email }}@endisset" placeholder="{{ __('personal.person.email') }}..">
                                        </div>

                                        <label for="phone">{{ __('personal.person.phone') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="phone" name="phone" value="@isset(Auth::user()->phone){{ Auth::user()->phone }}@endisset" placeholder="{{ __('personal.person.phone') }}..">
                                        </div>

                                        <label for="city">{{ __('personal.person.city') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="city" name="city" value="@isset(Auth::user()->city){{ Auth::user()->city }}@endisset" placeholder="{{ __('personal.person.city') }}..">
                                        </div>

                                        <label for="street">{{ __('personal.person.street') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="street" name="street" value="@isset(Auth::user()->street){{ Auth::user()->street }}@endisset" placeholder="{{ __('personal.person.street') }}..">
                                        </div>

                                        <label for="apartment">{{ __('personal.person.apartment') }}</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="apartment" name="apartment" value="@isset(Auth::user()->apartment){{ Auth::user()->apartment }}@endisset" placeholder="{{ __('personal.person.apartment') }}..">
                                        </div>
                                    </div>

                                    {{--<div class="item-price">--}}
                                    {{--<strong class="color-black">$199.99</strong>--}}
                                    {{--</div>--}}
                                </div>

                                <div class="custom-file mb-43">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input id="delete_image" type="text" name="delete_image" value="no" placeholder="delete_image" hidden>
                                    <input onchange="adminShowImage(this)" type="file" class="custom-file-input js-custom-file-input-enabled" id="image_show_input" name="image" value="@isset(Auth::user()->image){{ Auth::user()->image }}@endisset" data-toggle="custom-file-input" accept="image/*">
                                    <label class="custom-file-label" for="image_show_input">{{ __('personal.person.select_image') }}</label>
                                </div>

                                <div class="col-md-12 animated fadeIn">
                                    <div class="options-container">
                                        <img id="imgShowElement" class="img-fluid options-item" src="@isset(Auth::user()->image){{ URL::asset(Auth::user()->image) }}@else {{ URL::asset('media/photos/photo5.jpg') }} @endisset" alt="">
                                        <div class="options-overlay bg-black-op-75">
                                            <div class="options-overlay-content">
                                                <h3 class="h4 text-white mb-5">{{ __('personal.image') }}</h3>
                                                {{--<h4 class="h6 text-white-op mb-15">More Details</h4>--}}
                                                <a onclick="adminEditImg()" class="btn btn-sm btn-rounded btn-alt-primary min-width-75">
                                                    <i class="fa fa-pencil"></i> {{ __('personal.edit') }}
                                                </a>
                                                <a onclick="adminDeleteImg()" class="btn btn-sm btn-rounded btn-alt-danger min-width-75">
                                                    <i class="fa fa-times"></i> {{ __('personal.delete') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="next-btn custom-btn bg-past">{{ __('personal.save') }}</button>
                        </form>

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