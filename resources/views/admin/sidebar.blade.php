<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{  asset('dist/img/AdminLTELogo.png')  }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Homeopathy</span>
    </a>



    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
            @if(auth()->check())
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            @endif
        </div>
      </div>

        @if(auth()->check())
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('registration.create')) || ((Route::currentRouteName()) == ('registration.index'))  || ((Route::currentRouteName()) == ('registration.edit')) ? 'active' : ''}}">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Registration
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('registration.create')) || ((Route::currentRouteName()) == ('registration.index')) || ((Route::currentRouteName()) == ('registration.edit')) ? 'display:block' : ''}}">
                  <li class="nav-item ">
                    <a href="{{route('registration.create')}}" class="nav-link {{((Route::currentRouteName()) == ('registration.create')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Registration Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('registration.index')}}" class="nav-link {{((Route::currentRouteName()) == ('registration.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('pages.index'))  ||  ((Route::currentRouteName()) == ('pages.edit')) ? 'active' : ''}}">
                  <i class="nav-icon far fa-file"></i>
                  <p>
                    Pages
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('pages.index'))  ||  ((Route::currentRouteName()) == ('pages.edit'))  ? 'display:block' : ''}}">
                  {{-- <li class="nav-item">
                    <a href="/pages/create" class="nav-link">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Create Page</p>
                    </a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="{{route('pages.index')}}" class="nav-link {{((Route::currentRouteName()) == ('pages.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>




              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('message.index')) ||  ((Route::currentRouteName()) == ('message.create')) ||  ((Route::currentRouteName()) == ('message.edit')) ? 'active' : ''}}">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    Messages
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('message.index'))  ||  ((Route::currentRouteName()) == ('message.create'))  ||  ((Route::currentRouteName()) == ('message.edit'))  ? 'display:block' : ''}}">
                  <li class="nav-item">
                    <a href="{{route('message.create')}}" class="nav-link {{((Route::currentRouteName()) == ('message.create')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('message.index')}}" class="nav-link {{((Route::currentRouteName()) == ('message.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>



              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('slider.index')) ||  ((Route::currentRouteName()) == ('slider.create')) ||  ((Route::currentRouteName()) == ('slider.edit')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-sliders-h"></i>
                  <p>
                    Slider
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('slider.index'))  ||  ((Route::currentRouteName()) == ('slider.create'))  ||  ((Route::currentRouteName()) == ('slider.edit'))  ? 'display:block' : ''}}">
                  <li class="nav-item">
                    <a href="{{route('slider.create')}}" class="nav-link {{((Route::currentRouteName()) == ('slider.create')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('slider.index')}}" class="nav-link {{((Route::currentRouteName()) == ('slider.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('album.index')) ||  ((Route::currentRouteName()) == ('album.create')) ||  ((Route::currentRouteName()) == ('album.edit')) ? 'active' : ''}} ">
                  <i class="fab fa-wpforms nav-icon"></i>
                  <p>
                    Album
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('album.index'))  ||  ((Route::currentRouteName()) == ('album.create'))  ||  ((Route::currentRouteName()) == ('album.edit'))  ? 'display:block' : ''}}">
                  <li class="nav-item">
                    <a href="{{route('album.create')}}" class="nav-link {{((Route::currentRouteName()) ==  ('album.create')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('album.index')}}" class="nav-link {{((Route::currentRouteName()) ==  ('album.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('photo.index')) ||  ((Route::currentRouteName()) == ('photo.create')) ||  ((Route::currentRouteName()) == ('photo.edit')) ? 'active' : ''}} ">
                  <i class="fab fa-wpforms nav-icon"></i>
                  <p>
                    Photos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('photo.index'))  ||  ((Route::currentRouteName()) == ('photo.create'))  ||  ((Route::currentRouteName()) == ('photo.edit'))  ? 'display:block' : ''}}">
                  <li class="nav-item">
                    <a href="{{route('photo.create')}}" class="nav-link {{((Route::currentRouteName()) ==  ('photo.create')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('photo.index')}}" class="nav-link {{((Route::currentRouteName()) ==  ('photo.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>



              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) ==  ('setting.edit')) ? 'active' : ''}}">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>
                    Settings
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('setting.edit'))  ? 'display:block' : ''}}">
                  <li class="nav-item">
                    <a href="{{route('setting.edit',1)}}" class="nav-link {{((Route::currentRouteName()) ==  ('setting.edit')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Edit</p>
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="{{route('photo.index')}}" class="nav-link">
                      <i class="fa fa-list nav-icon"></i>
                      <p>Photos</p>
                    </a>
                  </li> --}}
                </ul>
              </li>




              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) == ('notice.index')) ||  ((Route::currentRouteName()) == ('notice.create')) ||  ((Route::currentRouteName()) == ('notice.edit')) ? 'active' : ''}} ">
                  <i class="fab fa-wpforms nav-icon"></i>
                  <p>
                    Notice
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) == ('notice.index'))  ||  ((Route::currentRouteName()) == ('notice.create'))  ||  ((Route::currentRouteName()) == ('notice.edit'))  ? 'display:block' : ''}}">
                  <li class="nav-item">
                    <a href="{{route('notice.create')}}" class="nav-link {{((Route::currentRouteName()) ==  ('notice.create')) ? 'active' : ''}}">
                      <i class="fab fa-wpforms nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('notice.index')}}" class="nav-link {{((Route::currentRouteName()) ==  ('notice.index')) ? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>







              <li class="nav-item has-treeview">
                <a href="#" class="nav-link {{((Route::currentRouteName()) ==  ('adminCURD.create')) || ((Route::currentRouteName()) ==  ('adminCURD.index')) || ((Route::currentRouteName()) ==  ('adminCURD.edit'))? 'active' : ''}}">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Admin
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="{{((Route::currentRouteName()) ==  ('adminCURD.create')) || ((Route::currentRouteName()) ==  ('adminCURD.index')) || ((Route::currentRouteName()) ==  ('adminCURD.edit'))? 'display:block' : ''}}">
                  <li class="nav-item">


                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <i class="fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>




                  </li>
                  <li class="nav-item">
                    <a href="{{  route('adminCURD.create')  }}" class="nav-link {{((Route::currentRouteName()) ==  ('adminCURD.create'))? 'active' : ''}}">
                      <i class="fas fa-registered"></i>
                      <p>Register</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{  route('adminCURD.index')  }}" class="nav-link {{((Route::currentRouteName()) ==  ('adminCURD.index'))? 'active' : ''}}">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>


                </ul>
              </li>




            </ul>
          </nav>
        @endif

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
