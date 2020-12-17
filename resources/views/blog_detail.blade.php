@extends('layouts.hf')

@section('title', $article->title)

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
                            <h2 class="title-text">{{ $article->title }}</h2>
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
                    <li><a href="{{ route('blog') }}">Блог</a></li>
                    <li class="active">{{ $article->title }}</li>
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
                                    <li><a href="{{ route('blog_category', $blogCategory['code']) }}">{{ $blogCategory['name'] }} <span class="float-right">({{ $blogCategory->getArticles()->count() }})</span></a></li>
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
                                <h2>tags</h2>
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
                            <a href="#!" class="view-all-btn">+<u>view all</u></a>
                        </div>
                        <!-- popular-tags - end -->

                    </div>
                </div>
                <!-- sidebar-section - end -->


                <div class="col-lg-9 col-md-10 col-sm-12">
                    <!-- blog-big-item - start -->
                    <div class="blog-details mb-60">

                        <div class="blog-title mb-30">
                            <h2 class="title-text">{{ $article->title }}</h2>
                            <div class="post-meta ul-li">
                                <ul class="clearfix">
                                    <li>post by: <a href="">{{ $user->first_name }}</a></li>
                                    <li>
                                        <a href="#!">Beauty Tips,</a>
                                        <a href="#!">Lifestyle</a>
                                    </li>
                                    {{--<li>{{ Carbon\Carbon::parse($article->created_at)->format('j F Y') }}</li>--}}
                                    <li>{{ Date::parse($article->created_at)->format('j F Y') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="image-container mb-30">
                            <img src="{{ URL::asset( $article->image ) }}" alt="image_not_found">
                        </div>

                        <div class="blog-content">
                               {!! $article->text !!}
                        </div>

                    </div>
                    <!-- blog-big-item - end -->

                @if($comments->count() > 0)
                    <!-- blog-review - start -->
                    <div class="blog-review">

                            @foreach($comments as $comment)
                            <!-- review-item - start -->
                            <div class="review-item clearfix">
                                <span class="reviewer-img"></span>
                                <div class="review-content">
                                    <div class="post-meta ul-li">
                                        <ul>
                                            <li><!--BY--> <a href="">{{ $comment->name }}</a></li>
                                            <li><i class="flaticon-clock-circular-outline"></i>
                                            {{--<li>{{ Carbon\Carbon::parse($article->created_at)->format('j F Y') }}</li>--}}
                                                {{ Date::parse($comment->created_at)->format('j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-0">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            </div>
                            <!-- review-item - end -->
                            @endforeach

                    </div>
                    <!-- blog-review - end -->
                    @endisset

                    <div class="comment-form">
                        <form action="{{ route('comment') }}" method="post">
                            @csrf

                            <input type="number" id="article_id" name="article_id" value="{{ $article->id }}" hidden>

                            @if(Auth::check())
                                <input type="number" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>
                            @else
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-item">
                                            <input type="text" id="name" name="name" placeholder="Ваше имя">
                                            <label for="name" class="form-item-btn"><i class="flaticon-user"></i></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-item">
                                            <input type="email" id="email" name="email" placeholder="Ваш email">
                                            <label for="email" class="form-item-btn"><i class="flaticon-e-mail-envelope"></i></label>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-textarea clearfix">
                                <textarea id="comment-textarea" name="comment"></textarea>
                                <label for="comment-textarea" class="form-item-btn">
										<span class="admin-img">
											<img src="{{ URL::asset('images/post-meta/admin-2.png') }}" alt="image_not_found">
										</span>
                                    Комментировать
                                </label>
                                <div class="textarea-footer ul-li-right clearfix">
                                    <ul class="clearfix">
                                        {{--<li><a href="#!"><i class="far fa-file-image"></i></a></li>--}}
                                        {{--<li><a href="#!"><i class="fas fa-paperclip"></i></a></li>--}}
                                        {{--<li><a href="#!"><i class="far fa-smile"></i></a></li>--}}
                                        <li><button type="submit" class="submit-btn">Комментировать</button></li>
                                    </ul>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- blog-section end
    ================================================== -->

@endsection