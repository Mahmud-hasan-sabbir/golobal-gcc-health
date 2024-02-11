<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="#" onclick="NavbarContainer.dashboard()">
          {{-- <img src="{{ asset('/') }}assets/images/logo.png" alt="Global GCC Health"> --}}
          <span class="brand-name">Global GCC Health</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-left" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li class="call active" data-toggle="collapse">
              <a class="sidenav-item-link" href="javascript:void(0)" onclick="NavbarContainer.dashboard()">
                <i class="mdi mdi-briefcase-account-outline"></i>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>
            @if (auth()->user()->is_admin)
              @include('admin.layouts.adminmenu')
            @else
              @include('admin.layouts.usermenu')
            @endif
            
            
            {{-- <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                aria-expanded="false" aria-controls="email">
                <i class="mdi mdi-email"></i>
                <span class="nav-text">email</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="email"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li>
                    <a class="sidenav-item-link" href="#">
                      <span class="nav-text">Email Inbox</span>
                      
                    </a>
                  </li>
                  <li class="">
                    <a class="sidenav-item-link" href="email-details.html">
                      <span class="nav-text">Email Details</span>
                      
                    </a>
                  </li>
                  <li class="">
                    <a class="sidenav-item-link" href="email-compose.html">
                      <span class="nav-text">Email Compose</span>
                      
                    </a>
                  </li>
                </div>
              </ul>
            </li> --}}
        </ul>

      </div>

      
    </div>
  </aside>
  <script>
     $(document).ready(function () {
        $('.call').click(function () {
            // Remove the 'active' class from all items
            $('.call').removeClass('active');

            // Add the 'active' class to the clicked item
            $(this).addClass('active');
        });
    });
    var NavbarContainer = {
      dashboard: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('home')}}';
        data = {};
        ajaxCallAsyncCallbackAPI(url, data, 'GET', function (response) {
            if (response.status === 'error') {
              $('#loader').addClass('hidden')
                toastr.warning(response.data)
            } else {
                $('.content-wrapper').html(response);
                $('#loader').addClass('hidden')
            }
        })
      }
    }
</script>