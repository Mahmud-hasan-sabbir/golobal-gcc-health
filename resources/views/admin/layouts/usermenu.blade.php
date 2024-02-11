<li class="has-sub call" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#chose"
      aria-expanded="false" aria-controls="chose">
      <i class="mdi mdi-email"></i>
      <span class="nav-text">Slip</span> <b class="caret"></b>
    </a>
    <ul  class="collapse"  id="chose"
      data-parent="#sidebar-menu">
      <div class="sub-menu">
        <li>
          <a class="sidenav-item-link nightSlip" href="#" onclick="userContainer.nightSlip()">
            <span class="nav-text">Night Slip</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link CancelSlip" href="#" onclick="userContainer.CancelSlip()">
            <span class="nav-text">Cancel Slip</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link ChooseClip" href="#" onclick="userContainer.ChooseClip()">
            <span class="nav-text">ChooseClip Slip</span>
          </a>
        </li>
      </div>
    </ul>
  </li>
  <li class="call" data-toggle="collapse">
    <a class="sidenav-item-link accountManagement" href="javascript:void(0)" onclick="userContainer.accountManagement()">
      <i class="mdi mdi-bank-transfer"></i>
      <span class="nav-text">Account Management</span>
    </a>
  </li>
  <script>
    var userContainer = {
        nightSlip: function(){
            $('#loader').removeClass('hidden')
            url = '{{route('nightSlip')}}';
            data = {};
            ajaxCallAsyncCallbackAPI(url, data, 'GET', function (response) {
                if (response.status === 'error') {
                    toastr.warning(response.data)
                    $('#loader').addClass('hidden')
                } else {
                    $('.content-wrapper').html(response);
                    $('#loader').addClass('hidden')
                }
            })
        },
      CancelSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('cancelSlip')}}';
        data = {};
        ajaxCallAsyncCallbackAPI(url, data, 'GET', function (response) {
            if (response.status === 'error') {
              $('#loader').addClass('hidden')
            } else {
                $('.content-wrapper').html(response);
                $('#loader').addClass('hidden')
            }
        })
      },
      ChooseClip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('chooseClip')}}';
        data = {};
        ajaxCallAsyncCallbackAPI(url, data, 'GET', function (response) {
            if (response.status === 'error') {
              $('#loader').addClass('hidden')
            } else {
                $('.content-wrapper').html(response);
                $('#loader').addClass('hidden')
            }
        })
      },
      accountManagement: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('accountManagement-list')}}';
        data = {};
        ajaxCallAsyncCallbackAPI(url, data, 'GET', function (response) {
            if (response.status === 'error') {
              $('#loader').addClass('hidden')
            } else {
                $('.content-wrapper').html(response);
                $('#loader').addClass('hidden')
            }
        })
      }
    }
  </script>
