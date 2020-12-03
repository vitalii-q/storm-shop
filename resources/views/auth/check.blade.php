@extends('layouts.hf')

@section('title', 'Авторизация')

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
                            <h2 class="title-text">Войти / зарегистрироватся</h2>
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
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li class="active">Authentication</li>
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
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="login-container">
                        <h2 class="form-title">Войти в аккаунт</h2>
                        {{--<div class="social-accounts">--}}
                            {{--<span>Login with Social Account</span>--}}
                            {{--<ul>--}}
                                {{--<li><a href="#!"><i class="fab fa-facebook-square"></i> facebook</a></li>--}}
                                {{--<li><a href="#!"><i class="fab fa-twitter-square"></i> twitter</a></li>--}}
                                {{--<li><a href="#!"><i class="fab fa-google-plus-square"></i> google plus</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        <div class="login-form">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-item">
                                    <input type="email" id="email" name="email" value="" placeholder="User email">
                                    <label class="form-item-btn" for="email">
                                        <i class="far fa-user"></i>
                                    </label>

                                    @error('email')
                                        <br>
                                        <br><div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-item auth-pass_input-custom">
                                    <input type="password" id="password" name="password" value="" placeholder="Password">
                                    <label class="form-item-btn" for="password">
                                        <i class="fas fa-unlock-alt"></i>
                                    </label>

                                    @error('password')
                                        <br>
                                        <br><div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="custom-form-check_custom"> <!-- custom-form-check mb-30 стандартные стили шаблона -->
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <input onclick="checkboxRemember()" type="checkbox" id="remember" name="remember">
                                            <label for="remember">Запомнить</label>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <a href="{{ route('password.request') }}" class="forgetpass-btn">Забыли пароль?</a>
                                        </div>

                                    </div>
                                </div>

                                <button type="submit" class="custom-btn bg-past">Войти</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- login-container - end -->

                <!-- register-container - start -->
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="register-container">
                        <h2 class="form-title">Нет аккаунта? Зарегистрируйте сейчас!</h2>
                        <div class="register-form">

                            <form method="POST" action="{{ route('register') }}" aria-label="Register">
                                @csrf
                                <div class="form-item">
                                    <input type="email" id="register_email" name="register_email" value="" placeholder="Your Email">
                                    <label class="form-item-btn" for="register_email">
                                        <i class="far fa-envelope"></i>
                                    </label>

                                    @error('register_email')
                                        <br>
                                        <br><div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-item">
                                    <input type="text" id="register_name" name="register_first_name" value="" placeholder="User Name">
                                    <label class="form-item-btn" for="register_name">
                                        <i class="far fa-user"></i>
                                    </label>

                                    @error('register_first_name')
                                        <br>
                                        <br><div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-item">
                                    <input type="password" id="register_password" name="register_password" value="" placeholder="Password">
                                    <label class="form-item-btn" for="register_password">
                                        <i class="fas fa-unlock-alt"></i>
                                    </label>

                                    @error('register_password')
                                        <br>
                                        <br><div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{--<div class="custom-form-check mb-30">--}}
                                    {{--<input type="checkbox" id="agree">--}}
                                    {{--<label for="agree">I agree to <strong class="color-black">Terms & Conditions</strong></label>--}}
                                {{--</div>--}}
                                <button type="submit" class="register-btn">Зарегистрироватся</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- register-container - end -->

            </div>
        </div>
    </section>
    <!-- login-reg-section - end
    ================================================== -->
@endsection