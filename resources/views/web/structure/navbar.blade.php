<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <a href="/"  class="logo "><img src="favicon.png" alt="SolidScript Exchange" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="/">{{ config('app.name') }}</a></h1>
     

      <nav id="navbar" class="navbar">
        <ul>
            @if(Request::path() == "/")
                <li><a class="nav-link" href="#hero">Home</a></li>
                <li><a class="nav-link" href="#about">¿Quiénes Somos?</a></li>
                <li><a class="nav-link" href="#features">Servicios</a></li>
                <li><a class="nav-link" href="#contact">Contacto</a></li>
            @endif
          {{-- <li><a class="nav-link " href="#team">Team</a></li> --}}
          
          @if(Auth::user() != null)

               <li class="dropdown">
                    <a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a class="dropdown-item" href="/my-account/dashboard/">
                               {{-- <i class="fa fa-user-circle"></i> --}} My Account
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                       
                    </ul>
                </li>
                   
           @else
               <li><a class="getstarted scrollto" href="{{route('login')}}" target="_blank">Entrar</a></li>
               <li><a class="getstarted scrollto" href="{{route('register')}}" target="_blank">Registrarse</a></li>
           @endif
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



   {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}