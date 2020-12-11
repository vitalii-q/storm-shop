@extends('layouts.hf')

@section('title', $article->title)

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
                            <h2 class="title-text">women's fashion</h2>
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
                    <li><a href="index.html">Home</a></li>
                    <li class="active">blog details</li>
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
                                <h2>Categories</h2>
                            </div>
                            <ul class="clearfix">
                                <li><a href="#!">Beauty <span class="float-right">(30)</span></a></li>
                                <li><a href="#!">Fashion <span class="float-right">(50)</span></a></li>
                                <li><a href="#!">Food <span class="float-right">(10)</span></a></li>
                                <li><a href="#!">Life Style <span class="float-right">(60)</span></a></li>
                                <li><a href="#!">Travel <span class="float-right">(10)</span></a></li>
                            </ul>
                        </div>
                        <!-- category-list - end -->

                        <!-- recent-post - start -->
                        <div class="sidebar-item recent-post ul-li-block mb-30">
                            <div class="sidebar-title">
                                <h2>Categories</h2>
                            </div>
                            <ul class="clearfix">
                                <li>
										<span class="image-container">
											<img src="assets/images/sidebar/recent-post/fashion/img-1.jpg" alt="image_not_found">
										</span>
                                    <div class="content">
                                        <a href="#!" class="item-title">Paris Fashion Women 2018</a>
                                        <small class="post-date">Tue, October 6.</small>
                                    </div>
                                </li>
                                <li>
										<span class="image-container">
											<img src="assets/images/sidebar/recent-post/fashion/img-2.jpg" alt="image_not_found">
										</span>
                                    <div class="content">
                                        <a href="#!" class="item-title">Paris Fashion Women 2018</a>
                                        <small class="post-date">Tue, October 6.</small>
                                    </div>
                                </li>
                                <li>
										<span class="image-container">
											<img src="assets/images/sidebar/recent-post/fashion/img-3.jpg" alt="image_not_found">
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
                            <h2 class="title-text">Styling Belt Bags And Over The Knee Boots</h2>
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
                            <img src="assets/images/blog/fashion/big-blog-1.jpg" alt="image_not_found">
                        </div>

                        <div class="blog-content">
                            <p class="mb-60">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ...
                            </p>
                            <blockquote class="blockquote mb-60">
                                <p class="mb-30">
                                    <sup><i class="flaticon-left-quotes-sign"></i></sup>
                                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip.
                                    <sub><i class="flaticon-right-quotes-symbol"></i></sub>
                                </p>
                                <footer class="blockquote-footer">
                                    <a href="#!" class="admin">George Stven</a>
                                    <cite title="Source Title">George Stven from New Youk, On Jun 13, 2018</cite>
                                </footer>
                            </blockquote>
                            <p class="m-0">
                                Dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>

                    </div>
                    <!-- blog-big-item - end -->

                    <!-- blog-review - start -->
                    <div class="blog-review">
                        <!-- review-item - start -->
                        <div class="review-item clearfix">
                            <span class="reviewer-img"></span>
                            <div class="review-content">
                                <div class="post-meta ul-li">
                                    <ul>
                                        <li>By <a href="#!">George Stven</a></li>
                                        <li><i class="flaticon-clock-circular-outline"></i> on Sep 26, 2018   at 20:30</li>
                                    </ul>
                                </div>
                                <p class="m-0">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                </p>
                            </div>
                        </div>
                        <!-- review-item - end -->

                        <!-- review-item - start -->
                        <div class="review-item clearfix">
                            <span class="reviewer-img"></span>
                            <div class="review-content">
                                <div class="post-meta ul-li">
                                    <ul>
                                        <li>By <a href="#!">George Stven</a></li>
                                        <li><i class="flaticon-clock-circular-outline"></i> on Sep 26, 2018   at 20:30</li>
                                    </ul>
                                </div>
                                <p class="m-0">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                </p>
                            </div>
                        </div>
                        <!-- review-item - end -->

                        <!-- review-item - start -->
                        <div class="review-item clearfix">
                            <span class="reviewer-img"></span>
                            <div class="review-content">
                                <div class="post-meta ul-li">
                                    <ul>
                                        <li>By <a href="#!">George Stven</a></li>
                                        <li><i class="flaticon-clock-circular-outline"></i> on Sep 26, 2018   at 20:30</li>
                                    </ul>
                                </div>
                                <p class="m-0">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                </p>
                            </div>
                        </div>
                        <!-- review-item - end -->
                    </div>
                    <!-- blog-review - end -->

                    <div class="comment-form">
                        <form action="#!">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" id="comment-form-name" placeholder="your name">
                                        <label for="comment-form-name" class="form-item-btn"><i class="flaticon-user"></i></label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="email" id="comment-form-email" placeholder="your email">
                                        <label for="comment-form-email" class="form-item-btn"><i class="flaticon-e-mail-envelope"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-textarea clearfix">
                                <textarea id="comment-textarea"></textarea>
                                <label for="comment-textarea" class="form-item-btn">
										<span class="admin-img">
											<img src="assets/images/post-meta/admin-2.png" alt="image_not_found">
										</span>
                                    Write your comment
                                </label>
                                <div class="textarea-footer ul-li-right clearfix">
                                    <ul class="clearfix">
                                        <li><a href="#!"><i class="far fa-file-image"></i></a></li>
                                        <li><a href="#!"><i class="fas fa-paperclip"></i></a></li>
                                        <li><a href="#!"><i class="far fa-smile"></i></a></li>
                                        <li><button type="submit" class="submit-btn">post comment</button></li>
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