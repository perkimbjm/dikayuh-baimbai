<header class="h-100 w-100 bg-white" style="box-sizing: border-box;">
    <!-- Navbar -->
    <div class="header-7-1" style="font-family: 'Poppins', sans-serif">
        <nav class="navbar navbar-expand-lg navbar-light" style="padding-top: 2rem; padding-bottom: 1rem">
            <div class="container-xxl d-flex gap-1">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/si-aldo4.png') }}"
                        alt="logo si-aldo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3 mb-3">
                        <li class="nav-item hover-underline-animation">
                            <a class="nav-link px-md-3 {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">{{ trans('frontend.home') }}</a>
                        </li>
                        <li class="nav-item hover-underline-animation">
                          <a class="nav-link px-md-3 {{ request()->is('webmap') ? 'active' : '' }}" href={{ url("/webmap") }}>WebGIS</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-decoration-none {{ request()->is('download') ? 'active' : '' }}" href="#"
                                data-bs-toggle="dropdown">
                                {{ trans('frontend.download') }}
                            </a>
                            <ul class="dropdown-menu nav-dropdown">
                                <li>
                                    <div
                                        class="dropdown-header-hover dropdown-item h-100 d-flex py-2 ps-2 align-items-center justify-content-start text-start">
                                        <a href="/download" class="text-decoration-none">{{ trans('frontend.regulation') }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="dropdown-header-hover dropdown-item h-100 d-flex py-2 ps-2 align-items-center justify-content-start text-start">
                                        <a href="#" target="_blank" class="text-decoration-none">{{ trans('frontend.manual-book') }}</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hover-underline-animation">
                            <a class="nav-link px-md-3 {{ request()->is('infographic') ? 'active' : '' }}" href={{ url("/infographic") }}>{{ trans('frontend.infographic') }}</a>
                        </li>
                    </ul>


                    @auth
                    <ul class="navbar-nav mb-2 mb-lg-0 mb-3" >
                        <li class="nav-item">
                            <a class="nav-link px-md-3" href="{{ route('admin.home') }}">
                                {{ trans('global.dashboard') }}
                            </a>
                        </li>
                    </ul>
                    @endauth
                    @guest
                    <div class="d-flex">
                        <a href="{{ route('login') }}" class="nav-link px-md-2">
                            <button class="btn btn-sm btn-login btn-login-blue" >
                                {{ trans('frontend.login') }}
                            </button>
                        </a>
                    </div>
                    @endguest


                    <!-- Right navbar links -->
                    @if(count(config('panel.available_languages', [])) > 1)
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown text-decoration-none">
                            <a class="nav-link" data-toggle="dropdown" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-globe" aria-hidden="true"></i>&nbsp;{{ strtoupper(app()->getLocale()) }}
                            </a>
                            <div class="dropdown-menu dropdown-header-hover dropdown-menu-right">
                                @foreach(config('panel.available_languages') as $langLocale => $langName)
                                    <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>