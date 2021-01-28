<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title')</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ URL::asset('media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ URL::asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ URL::asset('css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->

    <!-- Styles custom -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style_custom.css') }}">

    @yield('css')

</head>
<body>

<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-inverse'                           Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-modern'                        Modern Header style
    'page-header-inverse'                       Dark themed Header (works only with classic Header style)
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class="sidebar-inverse enable-page-overlay side-scroll page-header-fixed main-content-narrow @if(session('view.admin_panel')== 'sidebar') sidebar-o @endif">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar32" src="{{ URL::asset('media/avatars/avatar15.jpg') }}" alt="">
                    </a>
                    <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <!-- Search -->
            <div class="block pull-t pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <form action="be_pages_generic_search.html" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary px-10">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Search -->

            <!-- Mini Stats -->
            <div class="block pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="row">
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Clients</div>
                            <div class="font-size-h4">460</div>
                        </div>
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Sales</div>
                            <div class="font-size-h4">728</div>
                        </div>
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Earnings</div>
                            <div class="font-size-h4">$7,860</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Mini Stats -->

            <!-- Friends -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i>Friends</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <ul class="nav-users push">
                        <li>
                            <a href="be_pages_generic_profile.html">
                                <img class="img-avatar" src="{{ URL::asset('media/avatars/avatar8.jpg') }}" alt="">
                                <i class="fa fa-circle text-success"></i> Lori Grant
                                <div class="font-w400 font-size-xs text-muted">Photographer</div>
                            </a>
                        </li>
                        <li>
                            <a href="be_pages_generic_profile.html">
                                <img class="img-avatar" src="{{ URL::asset('media/avatars/avatar16.jpg') }}" alt="">
                                <i class="fa fa-circle text-success"></i> Albert Ray
                                <div class="font-w400 font-size-xs text-muted">Web Designer</div>
                            </a>
                        </li>
                        <li>
                            <a href="be_pages_generic_profile.html">
                                <img class="img-avatar" src="{{ URL::asset('media/avatars/avatar6.jpg') }}" alt="">
                                <i class="fa fa-circle text-warning"></i> Sara Fields
                                <div class="font-w400 font-size-xs text-muted">UI Designer</div>
                            </a>
                        </li>
                        <li>
                            <a href="be_pages_generic_profile.html">
                                <img class="img-avatar" src="{{ URL::asset('media/avatars/avatar15.jpg') }}" alt="">
                                <i class="fa fa-circle text-danger"></i> Thomas Riley
                                <div class="font-w400 font-size-xs text-muted">Copywriter</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Friends -->

            <!-- Activity -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-clock-o font-size-default mr-5"></i>Activity
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <ul class="list list-activity">
                        <li>
                            <i class="si si-wallet text-success"></i>
                            <div class="font-w600">+$29 New sale</div>
                            <div>
                                <a href="javascript:void(0)">Admin Template</a>
                            </div>
                            <div class="font-size-xs text-muted">5 min ago</div>
                        </li>
                        <li>
                            <i class="si si-close text-danger"></i>
                            <div class="font-w600">Project removed</div>
                            <div>
                                <a href="javascript:void(0)">Best Icon Set</a>
                            </div>
                            <div class="font-size-xs text-muted">26 min ago</div>
                        </li>
                        <li>
                            <i class="si si-pencil text-info"></i>
                            <div class="font-w600">You edited the file</div>
                            <div>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-file-text-o"></i> Docs.doc
                                </a>
                            </div>
                            <div class="font-size-xs text-muted">3 hours ago</div>
                        </li>
                        <li>
                            <i class="si si-plus text-success"></i>
                            <div class="font-w600">New user</div>
                            <div>
                                <a href="javascript:void(0)">StudioWeb - View Profile</a>
                            </div>
                            <div class="font-size-xs text-muted">5 hours ago</div>
                        </li>
                        <li>
                            <i class="si si-wrench text-warning"></i>
                            <div class="font-w600">App v5.5 is available</div>
                            <div>
                                <a href="javascript:void(0)">Update now</a>
                            </div>
                            <div class="font-size-xs text-muted">8 hours ago</div>
                        </li>
                        <li>
                            <i class="si si-user-follow text-pulse"></i>
                            <div class="font-w600">+1 Friend Request</div>
                            <div>
                                <a href="javascript:void(0)">Accept</a>
                            </div>
                            <div class="font-size-xs text-muted">1 day ago</div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Activity -->

            <!-- Profile -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="side-overlay-profile-name" name="side-overlay-profile-name" placeholder="Your name.." value="John Smith">
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-email">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" placeholder="Your email.." value="john.smith@example.com">
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="side-overlay-profile-password" name="side-overlay-profile-password" placeholder="New Password..">
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-password-confirm">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="side-overlay-profile-password-confirm" name="side-overlay-profile-password-confirm" placeholder="Confirm New Password..">
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-block btn-alt-primary">
                                    <i class="fa fa-refresh mr-5"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Profile -->

            <!-- Settings -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-wrench font-size-default mr-5"></i>Settings
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row gutters-tiny">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-status" name="side-overlay-settings-status" value="1" checked>
                                <label class="custom-control-label" for="side-overlay-settings-status">Online Status</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-public-profile" name="side-overlay-settings-public-profile" value="1">
                                <label class="custom-control-label" for="side-overlay-settings-public-profile">Public Profile</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-notifications" name="side-overlay-settings-notifications" value="1" checked>
                                <label class="custom-control-label" for="side-overlay-settings-notifications">Notifications</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-updates" name="side-overlay-settings-updates" value="1">
                                <label class="custom-control-label" for="side-overlay-settings-updates">Auto updates</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-api-access" name="side-overlay-settings-api-access" value="1" checked>
                                <label class="custom-control-label" for="side-overlay-settings-api-access">API Access</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-limit-requests" name="side-overlay-settings-limit-requests" value="1">
                                <label class="custom-control-label" for="side-overlay-settings-limit-requests">API Requests</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Settings -->
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Helper classes

        Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

        Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
        Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
            - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
    -->
    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="{{ route('index') }}">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{ URL::asset('media/avatars/avatar15.jpg') }}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="{{ route('personal', Auth::user()->id) }}">
                        <div class="img-avatar admin-img-avatar_custom" style="background-image: url({{ Auth::user()->image }})" alt=""></div>
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="{{ route('personal', Auth::user()->id) }}">{{ Auth::user()->first_name }}</a>
                        </li>
                        {{--<li class="list-inline-item">--}}
                            {{--<!-- Layout API, functionality initialized in Template._uiApiLayout() -->--}}
                            {{--<a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">--}}
                                {{--<i class="si si-drop"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="{{ route('get_logout') }}">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a href="{{ route('admin') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Рабочий стол</span></a>
                    </li>

                    <li>  <!--class="open"-->
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Управление</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('admin.notifications.index') }}">Уведомления</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}">Заказы</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Контент</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i></i><span class="sidebar-mini-hide">Каталог</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('admin.catalog.categories.index') }}">Категории</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.catalog.brands.index') }}">Бренды</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.catalog.products.index') }}">Продукция</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.catalog.attributes.index') }}">Свойства</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i></i><span class="sidebar-mini-hide">Блог</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('admin.blog.categories.index') }}">Категории</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.articles.index') }}">Статьи</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.tags.index') }}">Теги</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Страницы</span></a>
                        <ul>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Главная</a>
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.pages.main.slider.index') }}">Слайдер</a>
                                    </li>
                                    {{--<li>--}}
                                        {{--<a href="#">Преимущества</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Топ товаров</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#">Link 3-1</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            {{--<li>--}}
                                {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Link 2-1</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#">Link 3-1</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </li>

                    {{--<li>--}}
                        {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span class="sidebar-mini-hide">Формы</span></a>--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<a href="be_forms_elements_bootstrap.html">Bootstrap Elements</a>--}}
                            {{--</li>--}}

                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Ссылки</span></a>--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<a href="#">Link 1-1</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Link 2-1</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#">Link 3-1</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <div onclick="viewAdmin()" class="button-admin_panel-view"> <!-- data-action="sidebar_toggle" data-action="sidebar_toggle" -->
                    <i class="fa fa-navicon"></i>
                </div>
                <!-- END Toggle Sidebar -->

                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                {{--<button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">--}}
                    {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
                <!-- END Open Search Section -->

                <!-- Layout Options (used just for demonstration) -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                {{--<div class="btn-group" role="group">--}}
                    {{--<button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<i class="fa fa-wrench"></i>--}}
                    {{--</button>--}}
                    {{----}}
                    {{--<div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">--}}
                        {{--<h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>--}}
                        {{--<h6 class="dropdown-header">Color Themes</h6>--}}
                        {{--<div class="row no-gutters text-center mb-5">--}}
                            {{--<div class="col-2 mb-5">--}}
                                {{--<a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">--}}
                                    {{--<i class="fa fa-2x fa-circle"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 mb-5">--}}
                                {{--<a class="text-elegance" data-toggle="theme" data-theme="{{ URL::asset('css/themes/elegance.min.css') }}" href="javascript:void(0)">--}}
                                    {{--<i class="fa fa-2x fa-circle"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 mb-5">--}}
                                {{--<a class="text-pulse" data-toggle="theme" data-theme="{{ URL::asset('css/themes/pulse.min.css') }}" href="javascript:void(0)">--}}
                                    {{--<i class="fa fa-2x fa-circle"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 mb-5">--}}
                                {{--<a class="text-flat" data-toggle="theme" data-theme="{{ URL::asset('css/themes/flat.min.css') }}" href="javascript:void(0)">--}}
                                    {{--<i class="fa fa-2x fa-circle"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 mb-5">--}}
                                {{--<a class="text-corporate" data-toggle="theme" data-theme="{{ URL::asset('css/themes/corporate.min.css') }}" href="javascript:void(0)">--}}
                                    {{--<i class="fa fa-2x fa-circle"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-2 mb-5">--}}
                                {{--<a class="text-earth" data-toggle="theme" data-theme="{{ URL::asset('css/themes/earth.min.css') }}" href="javascript:void(0)">--}}
                                    {{--<i class="fa fa-2x fa-circle"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<h6 class="dropdown-header">Header</h6>--}}
                        {{--<div class="row gutters-tiny text-center mb-5">--}}
                            {{--<div class="col-6">--}}
                                {{--<button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>--}}
                            {{--</div>--}}
                            {{--<div class="col-6">--}}
                                {{--<button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<h6 class="dropdown-header">Sidebar</h6>--}}
                        {{--<div class="row gutters-tiny text-center mb-5">--}}
                            {{--<div class="col-6">--}}
                                {{--<button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>--}}
                            {{--</div>--}}
                            {{--<div class="col-6">--}}
                                {{--<button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="d-none d-xl-block">--}}
                            {{--<h6 class="dropdown-header">Main Content</h6>--}}
                            {{--<button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>--}}
                        {{--</div>--}}
                        {{--<div class="dropdown-divider"></div>--}}
                        {{--<div class="row gutters-tiny text-center">--}}
                            {{--<div class="col-6">--}}
                                {{--<a class="dropdown-item mb-0" href="be_layout_api.html">--}}
                                    {{--<i class="si si-chemistry mr-5"></i> Layout API--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-6">--}}
                                {{--<a class="dropdown-item mb-0" href="be_ui_color_themes.html">--}}
                                    {{--<i class="fa fa-paint-brush mr-5"></i> Color Themes--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- END Layout Options -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{ Auth::user()->first_name }}</span>
                        <i class="fa fa-angle-down ml-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                        <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Admin</h5>
                        <a class="dropdown-item" href="{{ route('personal', Auth::user()->id) }}">
                            <i class="si si-user mr-5"></i> Личный кабинет
                        </a>
                        {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">--}}
                            {{--<span><i class="si si-envelope-open mr-5"></i> Inbox</span>--}}
                            {{--<span class="badge badge-primary">3</span>--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-item" href="be_pages_generic_invoice.html">--}}
                            {{--<i class="si si-note mr-5"></i> Invoices--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-divider"></div>--}}

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        {{--<a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">--}}
                            {{--<i class="si si-wrench mr-5"></i> Settings--}}
                        {{--</a>--}}
                        <!-- END Side Overlay -->

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('get_logout') }}">
                            <i class="si si-logout mr-5"></i> {{ __('main.buttons.logout') }}
                        </a>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <!-- Notifications -->
                <div class="btn-group" role="group">
                    @if(count($AdminNotificationsHF) > 0) <!-- если есть уведомления -->
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flag"></i>
                        @if(count($AdminNotificationsHF) > 0)<span class="badge badge-primary badge-pill">{{ count($AdminNotificationsHF) }}</span>@endif
                    </button>
                    @else <!-- если нет уведомлений -->
                    <a href="{{ route('admin.notifications.index') }}" class="btn btn-rounded btn-dual-secondary admin-notifications_link">
                        <i class="fa fa-flag"></i>
                    </a>
                    @endif

                    @if(count($AdminNotificationsHF) > 0)
                    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
                        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Уведомления</h5>
                        <ul class="list-unstyled my-20">
                            @foreach($AdminNotificationsHF as $adminNotification)
                            <li>
                                <a class="text-body-color-dark media mb-15" href="{{ route('admin.notifications.edit', $adminNotification->id) }}">
                                    <div class="ml-5 mr-15">
                                        @if($adminNotification->type == 'Сообщение')
                                        <i class="fa fa-fw fa-envelope text-success"></i>
                                        @elseif($adminNotification->type == 'Подписка')
                                        <i class="fa fa-fw fa-mail-forward text-warning"></i>
                                        @elseif($adminNotification->type == 'Комментарий')
                                        <i class="fa fa-fw fa-comment text-primary"></i>
                                        @elseif($adminNotification->type == 'Заказ')
                                        <i class="fa fa-fw fa-archive text-danger"></i>
                                        @endif
                                    </div>
                                    <div class="media-body pr-10">
                                        <p class="mb-0">
                                            @if($adminNotification->type == 'Комментарий')
                                                {{ mb_strimwidth($adminNotification->comment->comment, 0, 60, '...') }}
                                            @elseif($adminNotification->type == 'Подписка')
                                                {{ mb_strimwidth($adminNotification->subscription->email, 0, 60, '...') }}
                                            @elseif($adminNotification->type == 'Сообщение')
                                                {{ mb_strimwidth($adminNotification->message->message, 0, 60, '...') }}
                                            @elseif($adminNotification->type == 'Заказ')
                                                {{ $adminNotification->order->first_name.' '.$adminNotification->order->last_name }}
                                            @endif
                                        </p>
                                        <div class="text-muted font-size-sm font-italic">{{ Date::parse($adminNotification->created_at)->format('j F H:i') }}</div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center mb-0" href="{{ route('admin.notifications.index') }}">
                            <i class="fa fa-flag mr-5"></i> View All
                        </a>
                    </div>
                    @endif

                </div>
                <!-- END Notifications -->

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                {{--<button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">--}}
                    {{--<i class="fa fa-tasks"></i>--}}
                {{--</button>--}}
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header">
            <div class="content-header content-header-fullrow">
                <form action="be_pages_generic_search.html" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header content-header-fullrow text-center">
                <div class="content-header-item">
                    <i class="fa fa-sun-o fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    @yield('content')

    <!-- Footer -->
        <footer id="page-footer" class="opacity-0">
            <div class="content py-20 font-size-sm clearfix">
                <div class="float-right">
                    Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://github.com/VitalyWeb/storm-shop" target="_blank">VitalyWeb</a>
                </div>
                <div class="float-left">
                    <a class="font-w600" href="https://github.com/VitalyWeb/storm-shop" target="_blank">Codebase 3.4</a> &copy; <span class="js-year-copy"></span>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        Codebase JS Core

        Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
        to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

        If you like, you could also include them separately directly from the assets/js/core folder in the following
        order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

        assets/js/core/jquery.min.js
        assets/js/core/bootstrap.bundle.min.js
        assets/js/core/simplebar.min.js
        assets/js/core/jquery-scrollLock.min.js
        assets/js/core/jquery.appear.min.js
        assets/js/core/jquery.countTo.min.js
        assets/js/core/js.cookie.min.js
    -->
    <script src="{{ URL::asset('js/codebase.core.min.js') }}"></script>

    <!--
        Codebase JS

        Custom functionality including Blocks/Layout API as well as other vital and optional helpers
        webpack is putting everything together at assets/_es6/main/app.js
    -->
    <script src="{{ URL::asset('js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ URL::asset('js/plugins/chartjs/Chart.bundle.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::asset('js/pages/be_pages_dashboard.min.js') }}"></script>

    <!-- кастомный скрипт -->
    <script src="{{ URL::asset('js/script.js') }}"></script>

    @yield('js')
</body>
</html>