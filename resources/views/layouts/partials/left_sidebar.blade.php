<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #123c69;">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img
      src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Google_Camera_Icon.svg/1024px-Google_Camera_Icon.svg.png"
      class="brand-image mt-1 ml-4 mr-3" style="opacity: .8">
    <span class="brand-text font-weight-bold">InstaPhotos</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link font-weight-bold">
                <i class="fas fa-home nav-icon"></i>
                <p class="font-weight-bold text-light">Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('post.index') }}" class="nav-link font-weight-bold">
                <i class="fas fa-hashtag nav-icon"></i>
                <p class="font-weight-bold text-light">Explore</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link font-weight-bold">
                <i class="fas fa-bell nav-icon"></i>
                <p class="font-weight-bold text-light">Notifications</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link font-weight-bold">
                <i class="fas fa-envelope nav-icon"></i>
                <p class="font-weight-bold text-light">Messages</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link font-weight-bold">
                <i class="fas fa-bookmark nav-icon"></i>
                <p class="font-weight-bold text-light">Bookmarks</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link font-weight-bold">
                <i class="fas fa-list-alt nav-icon"></i>
                <p class="font-weight-bold text-light">Lists</p>
              </a>
            </li>
          </ul>
        </li>
        <!--
          <a href="{{ route('post.create') }}" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px">
            Tweet
          </a> -->
        <button type="button" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px"
          data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fas fa-plus-circle"></i>
          New Post
        </button>
  </div>
  </ul>
  </nav>
  <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
