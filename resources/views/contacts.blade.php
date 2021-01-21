@extends('layouts.hf')

@section('title', 'Контакты')

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
                            <h2 class="title-text">{{ __('main.menu.contacts') }}</h2>
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
                    <li class="active">{{ __('main.menu.contacts') }}</li>
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
            {{--<div id="google-map" class="float-left">--}}
                {{--<div id="googleMaps"></div>--}}
            {{--</div>--}}

            <div class="contacts-map_wrapper" class="float-left">
                <iframe class="contacts-map_google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2244.5085191236144!2d37.60058061548945!3d55.76703949836194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a3f5375de19%3A0xb7d8a7c252de021c!2z0KLQstC10YDRgdC60LDRjyDRg9C7LiwgMjAg0YHRgtGA0L7QtdC90LjQtSAzLCDQnNC-0YHQutCy0LAsIDEyNzAwNg!5e0!3m2!1sru!2sru!4v1607446601745!5m2!1sru!2sru"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="contact-info float-right ul-li">
                <div class="row justify-content-start justify-content-md-center">

                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="info-item">
                            <div class="title-text mb-30">
                                <span>{{ __('contacts.address_title') }}</span>
                            </div>
                            <p class="address-text m-0">
                                {{ __('contacts.address') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="info-item">
                            <div class="title-text mb-30">
                                <span>{{ __('contacts.phone_title') }}</span>
                            </div>
                            <p class="phone-number m-0">{{ __('contacts.phone_1') }}</p>
                            <p class="phone-number m-0">{{ __('contacts.phone_2') }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mb-60 clearfix">
            <div class="store-image float-right image-container">
                <img src="images/store-image.jpg" alt="image_not_found">
            </div>
            <div class="store-info float-left ul-li-right">
                <div class="row justify-content-end">

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="info-item">
                            <div class="title-text mb-30">
                                <span>{{ __('contacts.distribution_title') }}</span>
                            </div>
                            <p class="m-0">{{ __('contacts.distribution_mail') }}</p>
                            <p class="m-0">{{ __('contacts.distribution_phone') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="info-item">
                            <div class="title-text mb-30">
                                <span>{{ __('contacts.hours_title') }}</span>
                            </div>
                            {{ __('contacts.hours') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="contact-form text-center">
            <div class="container">

                <div class="section-title text-center">
                    <h2>{{ __('contacts.message_title') }}</h2>
                    <p>{{ __('contacts.message_subtitle') }}</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <form method="POST" action="{{ route('contacts_submit') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input id="name" type="text" name="name" placeholder="{{ __('contacts.name') }}">
                                        <label for="name" class="form-item-btn">
                                            <i class="far fa-user"></i>
                                        </label>
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input id="email" type="text" name="email" placeholder="{{ __('contacts.email') }}">
                                        <label for="email" class="form-item-btn">
                                            <i class="far fa-envelope"></i>
                                        </label>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--<div class="form-item">--}}
                                {{--<input id="subject" type="file" placeholder="Файл" hidden>--}}
                                {{--<label for="subject" class="form-item-btn">--}}
                                    {{--<i class="far fa-file-alt"></i>--}}
                                {{--</label>--}}
                            {{--</div>--}}

                            <div class="form-item">
                                <input id="subject" type="file" name="file" placeholder="" hidden>

                                <label for="subject" class="contacts-form_label-file">
                                    <div for="subject" class="form-item-btn">
                                        <i class="far fa-file-alt"></i>
                                    </div>
                                </label>
                                @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-textarea clearfix">
                                <textarea id="comment-textarea" name="message"></textarea>
                                <label for="comment-textarea" class="form-item-btn">
                                            <span class="admin-img">
                                                <img src="{{ URL::asset('images/post-meta/admin-2.png') }}" alt="image_not_found">
                                            </span>
                                    {{ __('contacts.message') }}
                                </label>
                                @error('comment-textarea')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="textarea-footer ul-li-right clearfix">
                                    <ul class="clearfix">
                                        {{--<li><a href="#!"><i class="far fa-file-image"></i></a></li>--}}
                                        {{--<li><a href="#!"><i class="fas fa-paperclip"></i></a></li>--}}
                                        {{--<li><a href="#!"><i class="far fa-smile"></i></a></li>--}}
                                        <li><button type="submit" class="submit-btn">{{ __('contacts.send') }}</button></li>
                                    </ul>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- contact-section - end
    ================================================== -->

@endsection