
    <!-- Start Header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg  navbar-light" >

            <div class="container">

              
                <a class="navbar-brand mob" href="{{route('home')}}" style="height:32px">
                  <div class="logo">
                    @yield('logo')
                  </div>
                </a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white lnr lnr-menu fas fa-bars"></span>
                    {{-- <span class="text-white lnr "><img src="{{  asset('Photos/logo_and_header_image/menu.jpg')  }}"></span> --}}
                  </button>

                  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        {{-- @yield('menu') --}}
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('page.aboutus')}}">About Us</a></li>
                        <li><a href="{{route('page.gallery')}}">Gallery</a></li>
                        <li><a href="{{route('page.contactus')}}">Contact Us</a></li>
                        {{--  <a><a href="{{route('login')}}">Login</a></a>  --}}
                        <li><a href="{{route('home.register')}}">Registration</a></li>



                        {{--  <!-- Dropdown -->
                        <li class="dropdown">
                          <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Pages
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="generic.html">Generic</a>
                            <a class="dropdown-item" href="elements.html">Elements</a>
                          </div>
                        </li>  --}}
                    </ul>
                  </div>
            </div>
        </nav>
    </header>
    <!-- End Header Area -->

  <style>
    .logo {
    position: absolute;
    top: 0px;
    z-index: -1;
    }
  </style>


    

