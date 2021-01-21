@extends('layouts.hf')

@section('title', __('main.search.title'))

@section('css')
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ URL::asset('css/codebase.min.css') }}">
@endsection

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
                            <h2 class="title-text">{{ __('main.search.title') }}</h2>
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
                    <li class="active">{{ __('main.search.search') }}</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-list - end -->

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <main id="main-container" class="search-container">
        <!-- Page Content -->
        <div class="content">

            <!-- Search -->
            <form class="push" action="{{ route('search') }}" method="get">
                <div class="input-group input-group-lg">
                    <input type="text" name="search" class="search-page_input-search form-control" placeholder="{{ __('main.search.search_input') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- END Search -->

            <!-- Results -->
            <div class="block">
                <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a onclick="searchView('catalog')" class="nav-link_search nav-link @if($searchView == 'catalog')active @endif" data-toggle="tab" href="#search-catalog">{{ __('main.menu.catalog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="searchView('blog')" class="nav-link_search nav-link @if($searchView == 'blog')active @endif" data-toggle="tab" href="#search-blog">{{ __('main.menu.blog') }}</a>
                    </li>
                </ul>

                {{--<div class="col-lg-2 col-md-6 col-sm-12">--}}
                    {{--<ul class="nav filter-nav">--}}
                        {{--<li><a onclick="catalogView('grid')" @if($catalogView == 'grid')class="active" @endif data-toggle="tab" href="#grid-style"><i class="flaticon-grid"></i></a></li>--}}
                        {{--<li><a onclick="catalogView('list')" @if($catalogView == 'list')class="active" @endif data-toggle="tab" href="#list-style"><i class="flaticon-menu"></i></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}

                <div class="block-content block-content-full tab-content overflow-hidden">

                    <div id="search-catalog" class="tab-pane fade @if($searchView == 'catalog')active show @endif" role="tabpanel">
                        <div class="font-size-h3 font-w600 py-30 mb-20 text-center border-b">
                            <span class="search-catalog_title-count font-w700">@if(isset($foundProducts)){{ count($foundProducts) }}@else 0 @endif</span> {{ __('main.search.catalog_text_1') }}  <mark class="search-catalog_title-where">{{ __('main.search.catalog_text_2') }}</mark>
                        </div>

                        <div class="row gutters-tiny">

                            @if(isset($foundProducts))
                            @foreach($foundProducts as $product)
                            <div class="col-lg-6 flex-container">
                                <div class="col-md-9">
                                    <h4 class="col-md-12 h5 mb-5">
                                        <a href="{{ '/catalog/' . $product->getCategory()->code . '/' . $product->code }}">{{ $product->__('name') }}</a>
                                    </h4>

                                    <div class="col-md-12">
                                        {{--<div class="font-sm text-earth mb-5">https://pixelcave.com/codebase/</div>--}}
                                        <p class="font-sm text-muted">{{ mb_strimwidth($product->__('description'), 0, 320, "...") }}</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3 push">
                                    <img class="img-fluid search-catalog_img" src="{{ URL::asset($product->image_1) }}" alt="">
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>

                    <div id="search-blog" class="tab-pane fade @if($searchView == 'blog')active show @endif" role="tabpanel">
                        <div class="font-size-h3 font-w600 py-30 mb-20 text-center border-b">
                            <span class="search-catalog_title-count font-w700">@if(isset($foundArticles)){{ count($foundArticles) }}@else 0 @endif</span> {{ __('main.search.blog_text_1') }}  <mark class="search-catalog_title-where">{{ __('main.search.blog_text_2') }}</mark>
                        </div>

                        <div class="row gutters-tiny">

                            @if(isset($foundArticles))
                            @foreach($foundArticles as $article)
                                <div class="col-lg-6 flex-container">
                                    <div class="col-md-8">
                                        <h4 class="col-md-12 h5 mb-5">
                                            <a href="{{ '/blog/' . $article->code }}">{{ $article->__('title') }}</a>
                                        </h4>

                                        <div class="col-md-12">
                                            {{--<div class="font-sm text-earth mb-5">https://pixelcave.com/codebase/</div>--}}
                                            <p class="font-sm text-muted">{{ mb_strimwidth($article->__('preview_text'), 0, 210, "...") }}</p>
                                        </div>
                                    </div>

                                    <div class="search-catalog_img-wrapper col-md-4 col-lg-4 push">
                                        <img class="img-fluid search-catalog_img" src="{{ URL::asset($article->image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                            @endif

                        </div>
                    </div>

                </div>
            </div>
            <!-- END Results -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection