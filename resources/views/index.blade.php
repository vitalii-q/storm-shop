@extends('layouts.hf')

@section('title', 'Интернет магазин - storm')

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
                                <div class="slider-content {{ $slider->text_position }}">
                                    <h2 class="color-white">{{ $slider->text_top }}</h2>
                                    <h1 class="color-white">{{ $slider->text }}</h1>
                                    <h3 class="color-white mb-30">{{ $slider->text_bottom }}</h3>
                                    @if($slider->button == 1)
                                        <a href="{{ $slider->link }}" class="custom-btn bg-pure-black">Подробнее</a>
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
                                <h3>{{ $advantage->title }}</h3>
                                <p class="m-0">
                                    {{ $advantage->text }}
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
                    <li><a class="active" data-toggle="tab" href="#featured">Скидки</a></li>
                    <li><a data-toggle="tab" href="#best-seller">Бестселлеры</a></li>
                    <li><a data-toggle="tab" href="#top-rated">Новинки</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <!-- tab-pane (featured) - start -->
                <div id="featured" class="tab-pane fade in active show">
                    <div class="container">
                        <div class="row"> <!--class="shoes-2-mesonry grid"-->

                            @foreach($sales as $sale)
                                <!-- product-item - start -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="product-item">

                                        <div class="post-labels">
                                            <ul class="clearfix">
                                                @if($sale->bestseller == 1)<li class="bg-success">Бестселлер</li>@endif
                                                @if($sale->new == 1)<li class="bg-primary">Новинка</li>@endif
                                                @if($sale->sale == 1)<li class="bg-danger">Скидка</li>@endif
                                            </ul>
                                        </div>

                                        <div class="image-container">
                                            <img src="{{ URL::asset($sale->image_1) }}" alt="image_not_found">
                                            <a href="{{ '/catalog/' . $sale->getCategory()->code . '/' . $sale->code }}" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                                Смотреть
                                            </a>
                                        </div>

                                        <div class="item-content text-center">
                                            <a href="#!" class="item-title">{{ $sale->name }}</a>
                                            <div class="item-price">
                                                <strong class="color-black">{{ $sale->price }} ₽</strong>
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
                                <!-- product-item - end -->
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- tab-pane (featured) - end -->

                <!-- tab-pane (best-seller) - start -->
                <div id="best-seller" class="tab-pane fade">
                    <div class="container">
                        <div class="row">

                        @foreach($bestsellers as $bestseller)
                            <!-- product-item - start -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="product-item">

                                        <div class="post-labels">
                                            <ul class="clearfix">
                                                @if($bestseller->bestseller == 1)<li class="bg-success">Бестселлер</li>@endif
                                                @if($bestseller->new == 1)<li class="bg-primary">Новинка</li>@endif
                                                @if($bestseller->sale == 1)<li class="bg-danger">Скидка</li>@endif
                                            </ul>
                                        </div>

                                        <div class="image-container">
                                            <img src="{{ URL::asset($bestseller->image_1) }}" alt="image_not_found">
                                            <a href="{{ '/catalog/' . $sale->getCategory()->code . '/' . $sale->code }}" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                                Смотреть
                                            </a>
                                        </div>

                                        <div class="item-content text-center">
                                            <a href="#!" class="item-title">{{ $bestseller->name }}</a>
                                            <div class="item-price">
                                                <strong class="color-black">{{ $bestseller->price }} ₽</strong>
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
                                <!-- product-item - end -->
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- tab-pane (best-seller) - start -->

                <!-- tab-pane (top-rated) - start -->
                <div id="top-rated" class="tab-pane fade">
                    <div class="container">
                        <div class="row">

                        @foreach($news as $new)
                            <!-- product-item - start -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="product-item">

                                        <div class="post-labels">
                                            <ul class="clearfix">
                                                @if($new->bestseller == 1)<li class="bg-success">Бестселлер</li>@endif
                                                @if($new->new == 1)<li class="bg-primary">Новинка</li>@endif
                                                @if($new->sale == 1)<li class="bg-danger">Скидка</li>@endif
                                            </ul>
                                        </div>

                                        <div class="image-container">
                                            <img src="{{ URL::asset($new->image_1) }}" alt="image_not_found">
                                            <a href="{{ '/catalog/' . $sale->getCategory()->code . '/' . $sale->code }}" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                                Смотреть
                                            </a>
                                        </div>

                                        <div class="item-content text-center">
                                            <a href="#!" class="item-title">{{ $new->name }}</a>
                                            <div class="item-price">
                                                <strong class="color-black">{{ $new->price }} ₽</strong>
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
