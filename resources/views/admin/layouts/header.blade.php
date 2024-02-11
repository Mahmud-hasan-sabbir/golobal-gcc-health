<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      @if (!auth()->user()->is_admin)
      <span class="page-title">Balance {{ auth()->user()->balance }} BDT</span>
      @endif

      <div class="navbar-right ">

        <!-- search form -->
        <ul class="nav navbar-nav">
          <!-- User Account -->
          <li class="dropdown user-menu">
            <button class="dropdown-toggle nav-link" data-toggle="dropdown">
              <img src="{{ asset('/') }}assets/images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" />
              <span class="d-none d-lg-inline-block">{{ Auth::user()->full_name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="dropdown-link-item" href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                       <i class="mdi mdi-logout"></i>
                       <span class="nav-text">Log Out</span>
                  </a>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  </header>