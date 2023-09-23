<!DOCTYPE html>
<html>

<head>
  @include('components.backend.meta')

  <title>{{ $title ?? 'SI-ALDO' }}</title>
    
  <link rel="apple-touch-icon" href="">
  <link rel="shortcut icon" href="" type="image/x-icon">

  @stack('before-style')

  @include('components.backend.style')

  @stack('after-style')

    @yield('styles')
</head>

<body class="sidebar-mini layout-fixed hold-transition" style="height: auto;">
    <div class="wrapper">
                
        <div class="preloader">
            <div class="loading">
                <img src="{{ asset('img/audio.svg') }}">
            </div>
        </div>

        <nav class="main-header navbar navbar-expand bg-warning gradient-warning navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            @if(count(config('panel.available_languages', [])) > 1)
                <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach(config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            @endif

        </nav>

        @include('partials.menu')
        <div class="content-wrapper" style="min-height: 917px;">
            <!-- Main content -->
            <section class="content" style="padding-top: 20px">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </section>
            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Dinas PUPR Kota Banjarmasin</b>
            </div>
            <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
        </footer>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    @stack('before-script')

    @include('components.backend.script')
    
    @stack('after-script')
    
    @yield('scripts')
</body>

</html>
