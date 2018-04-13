<header class="main-header">
  <!-- Logo -->
  <a href="{{route('home')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
      <b>V</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">
      <b>Agenda</b>VM</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Authentication Links -->
            @guest
                {{-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a></li> --}}
                {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li> --}}
            @else
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              Usuário :{{ Auth::user()->name }} | {{ __('Sair') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </li>
            @endguest
        </ul>
    </div>

  </nav>
</header>