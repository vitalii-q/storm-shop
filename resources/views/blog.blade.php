@extends('layouts.hf')

@isset($selected_category['name'])
    @section('title', $selected_category['name'])
@else
    @section('title', 'Блог')
@endisset

@section('content')

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">

        <!-- breadcrumb-big-title - start -->
        <div class="breadcrumb-big-title" style="background-image: url({{ URL::asset('images/breadcrumb/bg-image-1.jpg') }});">
            <div class="overlay-black sec-ptb-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-6col-md-12 col-sm-12">
                            <h2 class="title-text">@isset($selected_category['name']) {{ $selected_category->name }} @elseБлог@endisset</h2>
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
                    @isset($selected_category['name'])
                        <li><a href="{{ route('blog') }}">Блог</a></li>
                        <li class="active">{{ $selected_category->name }}</li>
                    @else
                        <li class="active">Блог</li>
                    @endisset
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- blog-section start
    ================================================== -->
    <section id="blog-section" class="blog-section sec-ptb-60 clearfix">
        <div class="container">
            <div class="row justify-content-md-center">

                <!-- sidebar-section - start -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sidebar-section mb-60">

                        <!-- sidebar-search - start -->
                        <div class="sidebar-item sidebar-search ul-li-block mb-30">
                            <form action="#!">
                                <div class="form-item">
                                    <input type="search" id="sidebar-search" placeholder="search">
                                    <label for="sidebar-search" class="form-item-btn">
                                        <i class="flaticon-search"></i>
                                    </label>
                                </div>
                            </form>
                        </div>
                        <!-- sidebar-search - end -->

                        <!-- category-list - start -->
                        <div class="sidebar-item category-list ul-li-block mb-30">
                            <div class="sidebar-title">
                                <h2>Категории</h2>
                            </div>
                            <ul class="clearfix">
                                @foreach($blogCategories as $blogCategory)
                                    <li><a href="{{ route('blog_category', $blogCategory->code) }}">{{ $blogCategory->name }} <span class="float-right">({{ $blogCategory->getArticles()->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-list - end -->

                        <!-- recent-post - start -->
                        <div class="sidebar-item recent-post ul-li-block mb-30">
                            <div class="sidebar-title">
                                <h2>Популярное</h2>
                            </div>
                            <ul class="clearfix">
                                <li>
                                            <span class="image-container">
                                                <img src="{{ URL::asset('images/sidebar/recent-post/fashion/img-1.jpg') }}" alt="image_not_found">
                                            </span>
                                    <div class="content">
                                        <a href="#!" class="item-title">Paris Fashion Women 2018</a>
                                        <small class="post-date">Tue, October 6.</small>
                                    </div>
                                </li>
                                <li>
                                            <span class="image-container">
                                                <img src="{{ URL::asset('images/sidebar/recent-post/fashion/img-2.jpg') }}" alt="image_not_found">
                                            </span>
                                    <div class="content">
                                        <a href="#!" class="item-title">Paris Fashion Women 2018</a>
                                        <small class="post-date">Tue, October 6.</small>
                                    </div>
                                </li>
                                <li>
                                            <span class="image-container">
                                                <img src="{{ URL::asset('images/sidebar/recent-post/fashion/img-3.jpg') }}" alt="image_not_found">
                                            </span>
                                    <div class="content">
                                        <a href="#!" class="item-title">Paris Fashion Women 2018</a>
                                        <small class="post-date">Tue, October 6.</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- recent-post - end -->

                        <!-- popular-tags - start -->
                        <div class="sidebar-item popular-tags ul-li mb-30">
                            <div class="sidebar-title">
                                <h2>Теги</h2>
                            </div>
                            <ul class="clearfix mb-30">
                                <li><a href="#!">fashion</a></li>
                                <li><a href="#!">clothing</a></li>
                                <li><a href="#!">jewelry</a></li>
                                <li><a href="#!">accessories</a></li>
                                <li><a href="#!">hot</a></li>
                                <li><a href="#!">backpack</a></li>
                                <li><a href="#!">shoes</a></li>
                                <li><a href="#!">clothings</a></li>
                            </ul>
                            <a href="#!" class="view-all-btn">+<u>Посмотреть все</u></a>
                        </div>
                        <!-- popular-tags - end -->

                    </div>
                </div>
                <!-- sidebar-section - end -->


                <div class="col-lg-9 col-md-10 col-sm-12">

                    @foreach($blog as $article)
                        <!-- blog-big-item - start -->
                        <div class="blog-big-item mb-60">
                            <div class="blog-title mb-30">
                                <a href="{{ route('article', $article->code) }}" class="title-text">{{ $article->title }}</a>
                                <div class="post-meta ul-li">
                                    <ul class="clearfix">
                                        <li>post by: <a href="#!">admin</a></li>
                                        <li>
                                            <a href="#!">Beauty Tips,</a>
                                            <a href="#!">Lifestyle</a>
                                        </li>
                                        <li>On March 16, 2018</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="image-container mb-30">
                                <img src="{{ URL::asset($article->image) }}" alt="image_not_found">
                            </div>
                            <div class="blog-content">
                                <p class="mb-30">
                                    {{ $article->preview_text }}
                                </p>
                                <a href="{{ route('article', $article->code) }}" class="read-more">continue reading</a>
                            </div>
                        </div>
                        <!-- blog-big-item - end -->
                    @endforeach

                </div>

            </div>
        </div>
    </section>
    <!-- blog-section end
    ================================================== -->

@endsection