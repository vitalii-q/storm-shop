@extends('layouts.hf')

@section('title', 'Восстановление пароля')

@section('content')
    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">

        <!-- breadcrumb-big-title - start -->
        <div class="breadcrumb-big-title" style="background-image: url({{ URL::asset('images/breadcrumb/bg-image-1.jpg') }}">
            <div class="overlay-black sec-ptb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h2 class="title-text">Восстановление пароля</h2>
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
                    <li class="active">Восстановление пароля</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- login-reg-section - start
    ================================================== -->
    <section id="login-reg-section" class="login-reg-section sec-ptb-100 clearfix">
        <div class="container">
            <div class="row justify-content-md-center">

                <!-- login-container - start -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login-container reset-password_form-block">
                        <h2 class="form-title">Адресс электронной почты</h2>

                        <div class="login-form">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-item">
                                    <input type="email" id="your-email" name="email" placeholder="Email">
                                    <label class="form-item-btn" for="your-email">
                                        <i class="far fa-envelope"></i>
                                    </label>
                                </div>

                                <button type="submit" class="custom-btn bg-past">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- login-container - end -->

            </div>
        </div>
    </section>
    <!-- login-reg-section - end
    ================================================== -->
@endsection