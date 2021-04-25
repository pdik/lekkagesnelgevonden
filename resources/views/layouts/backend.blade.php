<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Pdik web app | Lekdetectie</title>

        <meta name="description" content="Pdik web app for manage Quotations, Reports, Customer">
        <meta name="author" content="pdik systems">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
          <link rel="stylesheet" href="{{ mix('css/app.css') }}">
         @livewireStyles
         @livewireScripts
        @laravelUltimateLibraryAssets
         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
{{--        <link rel="stylesheet" id="css-theme" href="{{ mix('css/themes/xdream.css') }}">--}}
        @yield('css_after')
          <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <div id="page-container" class="enable-cookies sidebar-o enable-page-overlay side-scroll page-header-fixed main-content-narrow page-header-dark">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="bg-image" style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">
                    <div class="bg-primary-op">
                        <div class="content-header">
                            <!-- User Avatar -->
                            <a class="img-link mr-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                            </a>
                            <!-- END User Avatar -->

                            <!-- User Info -->
                            <div class="ml-2">
                                <a class="text-white font-w600" href="javascript:void(0)">{{ auth()->user()->name }}</a>
                                <div class="text-white-75 font-size-sm"></div>
                            </div>
                            <!-- END User Info -->

                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Side Overlay -->
                        </div>
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <div class="block pull-x mb-0">
                        <!-- Color Themes -->
                        <!-- Toggle Themes functionality initialized in Template._uiHandleTheme() -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Kleur thema's</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center">
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-default" data-toggle="theme" data-theme="default" href="#">
                                        Standaard
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xwork" data-toggle="theme" data-theme="{{ mix('css/themes/xwork.css') }}" href="#">
                                        xWork
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xmodern" data-toggle="theme" data-theme="{{ mix('css/themes/xmodern.css') }}" href="#">
                                        xModern
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xeco" data-toggle="theme" data-theme="{{ mix('css/themes/xeco.css') }}" href="#">
                                        xEco
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xsmooth" data-toggle="theme" data-theme="{{ mix('css/themes/xsmooth.css') }}" href="#">
                                        xSmooth
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xinspire" data-toggle="theme" data-theme="{{ mix('css/themes/xinspire.css') }}" href="#">
                                        xInspire
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xdream" data-toggle="theme" data-theme="{{ mix('css/themes/xdream.css') }}" href="#">
                                        xDream
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xpro" data-toggle="theme" data-theme="{{ mix('css/themes/xpro.css') }}" href="#">
                                        xPro
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xplay" data-toggle="theme" data-theme="{{ mix('css/themes/xplay.css') }}" href="#">
                                        xPlay
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Color Themes -->

                        <!-- Sidebar -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Zijkant</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Sidebar -->

                        <!-- Header -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Bovenkant</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center mb-2">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">Dark</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">Light</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_mode_static" href="javascript:void(0)">Static</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Header -->

                        <!-- Content -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Content</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
                                </div>
                                <div class="col-12 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Content -->
                    </div>

                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="bg-header-dark">
                    <div class="content-header bg-white-10">
                        <!-- Logo -->
                        <a class="font-w600 text-white tracking-wide" href="/">
                            <span class="smini-visible">
                                <span class="opacity-75">x</span>
                            </span>
                            <span class="smini-hidden">
                                Pdik<span class="opacity-75">web</span>
                            </span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Toggle Sidebar Style -->

                            <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');" href="javascript:void(0)">
                                <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                            </a>
                            <!-- END Toggle Sidebar Style -->
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                                    <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                    <span class="nav-main-link-name">Dashboard</span>

                                </a>
                            </li>

                            <li class="nav-main-heading">Klanten</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('customers.create')}}">
                                    <i class="nav-main-link-icon fa fa-user-plus"></i>
                                    <span class="nav-main-link-name">Nieuw</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('customers.index')}}">
                              <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                                    <span class="nav-main-link-name">Overzicht</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Rapporten</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('rapport.create')}}">
                                    <i class="nav-main-link-icon si si-docs"></i>
                                    <span class="nav-main-link-name">Maken</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('rapport.index')}}">
                                     <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                                    <span class="nav-main-link-name">Overzicht</span>
                                </a>
                            </li>
{{--                            <li class="nav-main-heading">Offerte's</li>--}}
{{--                            <li class="nav-main-item">--}}
{{--                                <a class="nav-main-link" href="{{ route('rapport.create') }}">--}}
{{--                                    <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>--}}
{{--                                    <span class="nav-main-link-name">Maken</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-main-item">--}}
{{--                                <a class="nav-main-link" href="{{route('rapport.index')}}">--}}
{{--                                    <i class="nav-main-link-icon fa fa-clipboard-list"></i>--}}
{{--                                    <span class="nav-main-link-name">Overzicht</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                              <li class="nav-main-heading">Items</li>
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('items.item') }}">
                                        <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>
                                        <span class="nav-main-link-name">Creeren</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('items') }}">
                                       <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                                    <span class="nav-main-link-name">Overzicht</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Bestanden</li>
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('files') }}">
                                        <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>
                                        <span class="nav-main-link-name">Bekijk</span>
                                    </a>
                                 </li>
                            @can('admin.settings.view')
                            <li class="nav-main-heading">Settings</li>
                               <li class="nav-main-item">
                                <a class="nav-main-link" href="/settings">
                                    <i class="nav-main-link-icon far fa-building"></i>
                                    <span class="nav-main-link-name">Mijn app</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                    <i class="nav-main-link-icon fa fa-balance-scale-right"></i>
                                    <span class="nav-main-link-name">Rechten</span>
                                </a>
                            </li>

                            @endcan
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                        </button>
                        <!-- END Open Search Section -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">{{ auth()->user()->name }}</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   Gebruiker opties
                                </div>
                                <div class="p-2">

                                    <a class="dropdown-item" href="/user/profile">
                                        <i class="far fa-fw fa-user mr-1"></i> Profiel
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i>{{ __('global.notifications') }}</span>
                                        <span class="badge badge-primary">{{ auth()->user()->unreadNotifications()->count() }}</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Facturen
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="far fa-fw fa-building mr-1"></i> App layout
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        @method('POST')
                                    <a class="dropdown-item"type="submit"  onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Log uit
                                    </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        @livewire('notifications-component')
                        <!-- END Notifications Dropdown -->


                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-primary">
                    <div class="content-header">
                        <form class="w-100" action="/dashboard" method="POST">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                   </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @if(isset($slot))
                    {{$slot}}
                    @endif
                @yield('content')
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Made with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://pdik.nl" target="_blank">Pdik systems</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://pdik.nl" target="_blank">Pdik systems</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Dashmix Core JS -->
        <script src="{{ asset('js/plugins/editor.js') }}" type="module"></script>
        <script src="{{ mix('js/dashmix.app.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
{{--        <script src="{{ asset('js/pages/be_comp_chat.js')}}"></script>--}}
{{--        <script src="{{ asset('js/plugins/cropperjs/cropper.js')}}"></script>--}}
{{--        <script src="{{asset('js/pages/be_comp_image_cropper.js')}}"></script>--}}
        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ asset('/js/laravel.app.js') }}"></script> -->
        @stack('modals')
        @yield('js_after')
        @stack('scripts')
        @stack('js_after')
        <script>
            $(document).ready(function() {

                @if(session('status'))
                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: '{{ session('status') }}'});
                @endif
                @if(session('failed'))
                Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: '{{ session('failed') }}'});
                @endif
            });
              document.addEventListener("DOMContentLoaded", () => {
                    window.Livewire.hook('element.updated', (el, component) => {

                     Dashmix.helpers('ckeditor5');
                    })
              });
        </script>
    </body>
</html>
