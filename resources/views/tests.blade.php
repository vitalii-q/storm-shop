@extends('layouts.hf')

@section('title', 'Тестовая страница')

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
                            <h2 class="title-text">Тестовая страница</h2>
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
                    <li class="active">Тестовая страница</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- contact-section - start
    ================================================== -->
    <section id="contact-section" class="contact-section sec-ptb-100 clearfix">

        <div class="clearfix flex-container">

        </div>



        <div class="contact-form text-center">
            <div class="container">

                @php
                    $test = \DB::table('orders')->select('products.id', 'name', 'code', \DB::raw('count(*) as count'))
                    ->join('order_sku', 'order_sku.order_id', '=', 'orders.id')
                    ->join('skus', 'skus.id', '=', 'order_sku.product_id')
                    ->join('products', 'products.id', '=', 'skus.product_id')
                    ->groupBy('products.id')
                    ->orderByDesc('count')
                    ->get();

                    /*$test = \DB::table('order_sku')->select('order_sku.product_id', \DB::raw('count(*) as count'))
                    ->join('skus', 'skus.id', '=', 'order_sku.product_id')
                    //->join('products', 'products.id', '=', 'skus.product_id')
                    ->groupBy('order_sku.product_id')
                    ->get();*/

                    dump($test);
                @endphp

            </div>
        </div>

    </section>
    <!-- contact-section - end
    ================================================== -->

@endsection
