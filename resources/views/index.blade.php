@extends('layouts.hf')

@section('title', 'Интернет магазин - storm')

@section('content')
    <!-- slider-section - start
    ================================================== -->
    <section id="slider-section" class="slider-section clearfix">

        @foreach($sliders as $slider)
            <!-- slider-item - start -->
                <div class="slider-item" style="background-image: url({{ Storage::url($slider->image) }});">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-8 col-md-8 col-sm-10">
                                <div class="slider-content {{ $slider->text_position }}">
                                    <h2 class="color-white">{{ $slider->text_top }}</h2>
                                    <h1 class="color-white">{{ $slider->text }}</h1>
                                    <h3 class="color-white mb-30">{{ $slider->text_bottom }}</h3>
                                    @if($slider->button = 1)
                                        <a href="#!" class="custom-btn bg-pure-black">Подробнее</a>
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
                    <li><a class="active" data-toggle="tab" href="#featured">featured</a></li>
                    <li><a data-toggle="tab" href="#best-seller">Best Seller</a></li>
                    <li><a data-toggle="tab" href="#top-rated">Top Rated</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <!-- tab-pane (featured) - start -->
                <div id="featured" class="tab-pane fade in active show">
                    <div class="container">
                        <div class="row"> <!--class="shoes-2-mesonry grid"-->

                            <!-- product-item - start -->
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="product-item">

                                    <div class="post-labels">
                                        <ul class="clearfix">
                                            <li class="bg-primary">new</li>
                                            <li class="bg-danger">-50%</li>
                                        </ul>
                                    </div>

                                    <div class="image-container">
                                        <img src="images/products/fashion/img-1.jpg" alt="image_not_found">
                                        <a href="#!" class="quick-view">
                                            <i class="fas fa-eye"></i>
                                            quick view
                                        </a>
                                    </div>

                                    <div class="item-content text-center">
                                        <a href="#!" class="item-title">Century Modern Sweatshirt</a>
                                        <div class="item-price">
                                            <strong class="color-black">$129.00</strong>
                                            <del>$359.00</del>
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
                                            add to cart
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

                        </div>
                    </div>
                </div>
                <!-- tab-pane (featured) - end -->

                <!-- tab-pane (best-seller) - start -->
                <div id="best-seller" class="tab-pane fade">
                    <div class="container">
                        <div class="row">

                            <!-- product-item - start -->
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="product-item">

                                    <div class="post-labels">
                                        <ul class="clearfix">
                                            <li class="bg-primary">new</li>
                                            <li class="bg-danger">-50%</li>
                                        </ul>
                                    </div>

                                    <div class="image-container">
                                        <img src="images/products/fashion/img-1.jpg" alt="image_not_found">
                                        <a href="#!" class="quick-view">
                                            <i class="fas fa-eye"></i>
                                            quick view
                                        </a>
                                    </div>

                                    <div class="item-content text-center">
                                        <a href="#!" class="item-title">Century Modern Sweatshirt</a>
                                        <div class="item-price">
                                            <strong class="color-black">$129.00</strong>
                                            <del>$359.00</del>
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
                                            add to cart
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

                        </div>
                    </div>
                </div>
                <!-- tab-pane (best-seller) - start -->

                <!-- tab-pane (top-rated) - start -->
                <div id="top-rated" class="tab-pane fade">
                    <div class="container">
                        <div class="row">

                            <!-- product-item - start -->
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="product-item">

                                    <div class="post-labels">
                                        <ul class="clearfix">
                                            <li class="bg-primary">new</li>
                                            <li class="bg-danger">-50%</li>
                                        </ul>
                                    </div>

                                    <div class="image-container">
                                        <img src="images/products/fashion/img-1.jpg" alt="image_not_found">
                                        <a href="#!" class="quick-view">
                                            <i class="fas fa-eye"></i>
                                            quick view
                                        </a>
                                    </div>

                                    <div class="item-content text-center">
                                        <a href="#!" class="item-title">Century Modern Sweatshirt</a>
                                        <div class="item-price">
                                            <strong class="color-black">$129.00</strong>
                                            <del>$359.00</del>
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
                                            add to cart
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
