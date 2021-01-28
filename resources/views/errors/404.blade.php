@extends('layouts.hf')

@section('title', 'Error')

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
                            <h2 class="title-text">{{ __('main.404.title') }}</h2>
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
                    <li class="active">{{ __('main.404.breadcrumb') }}</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- error-section - start
    ================================================== -->
    <section id="error-section" class="error-section sec-ptb-100 clearfix">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="error-content text-center clearfix">

							<span class="icon">
								<i class="far fa-frown"></i>
							</span>
                        <h2>{{ __('main.404.error') }} <strong class="color-past">{{ __('main.404.404') }}</strong> </h2>
                        <p>
                            {{ __('main.404.not_available') }}
                            {{ __('main.404.you_can_back') }} <a href="{{ route('index') }}" class="color-past">{{ __('main.404.main') }}</a> {{ __('main.404.or') }} <a href="{{ route('search') }}" class="color-past">{{ __('main.404.search') }}</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- error-section - end
    ================================================== -->
@endsection