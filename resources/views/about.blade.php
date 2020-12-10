@extends('layouts.hf')

@section('title', 'О нас')

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
                            <h2 class="title-text">О нас</h2>
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
                    <li><a href="index.html">Главная</a></li>
                    <li class="active">О нас</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- about-section - start
    ================================================== -->
    <section id="about-section" class="about-section clearfix">

        <div class="about-image">
            <img src="images/aboutus-img.jpg" alt="image_not_found">
        </div>

        <div class="about-content">
            <h2 class="mb-30">Добро пожаловать</h2>
            <p>
                Lorem Ipsum - это просто фиктивный текст в полиграфической и наборной индустрии. Lorem Ipsum был стандартным фиктивным текстом в отрасли с 1500-х годов, когда неизвестный типограф взял камбуз и скремблировал его, чтобы сделать книгу образцов шрифта. Он пережил не только пять веков, но и скачок в сеттинг, оставшись практически неизменным.
            </p>
        </div>

    </section>
    <!-- about-section - end
    ================================================== -->





    <!-- funfact-section - start
    ================================================== -->
    {{--<section id="funfact-section" class="funfact-section sec-ptb-60 bg-gray clearfix">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}

                {{--<div class="col-lg-3 col-md-6 col-sm-12">--}}
                    {{--<div class="funfact-item text-center float-left">--}}
							{{--<span class="icon">--}}
								{{--<i class="flaticon-user-1"></i>--}}
							{{--</span>--}}
                        {{--<h2><span class="counter">60000</span>+</h2>--}}
                        {{--<small>Happy clients</small>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-6 col-sm-12">--}}
                    {{--<div class="funfact-item text-center">--}}
							{{--<span class="icon">--}}
								{{--<i class="flaticon-ecommerce"></i>--}}
							{{--</span>--}}
                        {{--<h2><span class="counter">20</span>+</h2>--}}
                        {{--<small>total pages</small>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-6 col-sm-12">--}}
                    {{--<div class="funfact-item text-center">--}}
							{{--<span class="icon">--}}
								{{--<i class="flaticon-bookmark"></i>--}}
							{{--</span>--}}
                        {{--<h2><span class="counter">1500</span>+</h2>--}}
                        {{--<small>Answered Tickets</small>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-6 col-sm-12">--}}
                    {{--<div class="funfact-item text-center float-right">--}}
							{{--<span class="icon">--}}
								{{--<i class="flaticon-clock-circular-outline"></i>--}}
							{{--</span>--}}
                        {{--<h2><span class="counter">2000</span>+</h2>--}}
                        {{--<small>Development hours</small>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- funfact-section - end
    ================================================== -->





    <!-- team-section - start
    ================================================== -->
    <section id="team-section" class="team-section sec-ptb-60 clearfix">
        <div class="container">
            <div class="row">

                <!-- section-title - start -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-title text-center">
                        <h2 class="m-0">Наша команда</h2>
                    </div>
                </div>
                <!-- section-title - end -->

                @foreach($team as $person)
                    <!-- team-member - start -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-member text-center">

                            <div class="image-container">
                                <img src="{{ Storage::url($person->image) }}" alt="image_not_found">

                            </div>
                            <div class="member-content">
                                <h3 class="member-name">{{ $person->name }}</h3>
                                <span class="member-title">{{ $person->description }}</span>
                            </div>

                        </div>
                    </div>
                    <!-- team-member - end -->
                @endforeach

            </div>
        </div>
    </section>
    <!-- team-section - end
    ================================================== -->



@endsection