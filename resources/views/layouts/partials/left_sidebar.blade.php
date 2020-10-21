<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #e8519e; background: -webkit-linear-gradient(bottom, #e8519e, #c77ff2); background: -o-linear-gradient(bottom, #e8519e, #c77ff2); background: -moz-linear-gradient(bottom, #e8519e, #c77ff2); background: linear-gradient(bottom, #e8519e, #c77ff2);">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('images/buba.png') }}"
           class="brand-image mt-1 ml-4 mr-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold text-dark">Bukit Batu Virtual</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-1 pb-1 mb-1 d-flex">
        
        <div class="info nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link media pl-1">
                <div>
                    <img src="{{ asset('images/profile-image.jpg') }}" class="img-size-50 mr-1 img-circle elevation-2" alt="User Image">
                </div>
                <div class="media-body pl-1">
                    <h3 class="dropdown-item-title font-weight-bold text-dark">
                        {{ Auth::user()->name }}
                    </h3>
                    <p class="text-sm font-weight-bold text-dark">@ {{ Auth::user()->username }}</p>
                </div>
                <span class="ml-2 font-weight-bold text-dark"><i class="fas fa-angle-down"></i></span>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link font-weight-bold text-dark">
                        <i class="far fa-circle nav-icon"></i>
                        Your profile
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link font-weight-bold text-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="far fa-circle nav-icon"></i>
                        Log out       
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            </li> 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-dark">
                  <i class="fas fa-home nav-icon"></i>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-dark">
                  <i class="fas fa-hashtag nav-icon"></i>
                  Explore
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-dark">
                  <i class="fas fa-bell nav-icon"></i>
                  Notifications
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-dark">
                  <i class="fas fa-envelope nav-icon"></i>
                  Messages
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-dark">
                  <i class="fas fa-bookmark nav-icon"></i>
                  Bookmarks
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link font-weight-bold text-dark">
                  <i class="fas fa-list-alt nav-icon"></i>
                  Lists
                </a>
              </li>
            </ul>
          </li><!-- 
          <a href="{{ route('post.create') }}" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px">
            Tweet
          </a> -->
          <button type="button" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px" data-toggle="modal" data-target="#exampleModalCenter">Tweet</button>
        </div>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>