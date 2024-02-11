<li class="has-sub call" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#penddingCancelSlip"
      aria-expanded="false" aria-controls="penddingCancelSlip">
      <i class="mdi mdi-vector-combine"></i>
      <span class="nav-text">Cancel Slip</span> <b class="caret"></b>
    </a>
    <ul  class="collapse"  id="penddingCancelSlip"
      data-parent="#sidebar-menu">
      <div class="sub-menu">
        <li>
          <a class="sidenav-item-link penddingCancelSlip" href="#" onclick="adminContainer.penddingCancelSlip()">
            <span class="nav-text">Pendding Slip</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link progressCancelSlip" href="#" onclick="adminContainer.progressCancelSlip()">
            <span class="nav-text">Progress Slip</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link completeCancelSlip" href="#" onclick="adminContainer.completeCancelSlip()">
            <span class="nav-text">Complete Slip</span>
          </a>
        </li>
      </div>
    </ul>
</li>
<li class="has-sub call" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Night"
      aria-expanded="false" aria-controls="Night">
      <i class="mdi mdi-adobe"></i>
      <span class="nav-text">Night Slip</span> <b class="caret"></b>
    </a>
    <ul  class="collapse"  id="Night"
      data-parent="#sidebar-menu">
      <div class="sub-menu">
        <li>
          <a class="sidenav-item-link penddingnightSlip" href="#" onclick="adminContainer.penddingnightSlip()">
            <span class="nav-text">Pendding Slip</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link progressNightSlip" href="#" onclick="adminContainer.progressNightSlip()">
            <span class="nav-text">Progress Slip</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link completeNightSlip" href="#" onclick="adminContainer.completeNightSlip()">
            <span class="nav-text">Complete Slip</span>
          </a>
        </li>
      </div>
    </ul>
</li>
<li class="has-sub call" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#chose"
      aria-expanded="false" aria-controls="chose">
      <i class="mdi mdi-account-details"></i>
      <span class="nav-text">User Managemant</span> <b class="caret"></b>
    </a>
    <ul  class="collapse"  id="chose"
      data-parent="#sidebar-menu">
      <div class="sub-menu">
        <li>
          <a class="sidenav-item-link userList" href="#" onclick="adminContainer.userList()">
            <span class="nav-text">User list</span>
          </a>
        </li>
      </div>
    </ul>
</li>
<li class="has-sub call" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#job"
      aria-expanded="false" aria-controls="job">
      <i class="mdi mdi-octagram"></i>
      <span class="nav-text">Add Select Tools</span> <b class="caret"></b>
    </a>
    <ul  class="collapse"  id="job"
      data-parent="#sidebar-menu">
      <div class="sub-menu">
        <li>
          <a class="sidenav-item-link joblist" href="#" onclick="adminContainer.jobPosition()">
            <span class="nav-text">Add Job Possition</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link addHospital" href="#" onclick="adminContainer.addHospital()">
            <span class="nav-text">Add Hospital</span>
          </a>
        </li>
      </div>
    </ul>
</li>
<li class="has-sub call" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#transfer"
      aria-expanded="false" aria-controls="transfer">
      <i class="mdi mdi-bank-transfer"></i>
      <span class="nav-text">Transaction Manage</span> <b class="caret"></b>
    </a>
    <ul  class="collapse" id="transfer"
      data-parent="#sidebar-menu">
      <div class="sub-menu">
        <li>
          <a class="sidenav-item-link PenddingAmmount" href="#" onclick="adminContainer.PenddingAmmount()">
            <span class="nav-text">Pendding Ammount</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link allTransaction" href="#" onclick="adminContainer.allTransaction()">
            <span class="nav-text">All Transaction</span>
          </a>
        </li>
      </div>
    </ul>
</li>
  <script>
    var adminContainer = {
        userList: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('user-list')}}';
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
      jobPosition: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('job-list')}}';
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
      penddingCancelSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('pendding-cancel-slip-list')}}';
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
      progressCancelSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('progress-cancel-slip-list')}}';
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
      completeCancelSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('complete-cancel-slip-list')}}';
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
      PenddingAmmount: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('pendding-ammount-list')}}';
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
      allTransaction: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('all-ammount-list')}}';
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
      penddingnightSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('pendding-night-slip')}}';
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
      progressNightSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('progress-night-slip')}}';
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
      completeNightSlip: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('complete-night-slip')}}';
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
      addHospital: function(){
        $('#loader').removeClass('hidden')
        url = '{{route('hospital-list')}}';
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