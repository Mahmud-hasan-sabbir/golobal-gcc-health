<div class="content">
    <div class="card card-default">
      <div class="card-body">
        <form id="user_store">
          <div class="row mb-2">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="name">User name</label>
                <input type="text" class="form-control" name="name" value="{{ $user['name'] }}" required>
                <span class="text-danger" id="nameErrorMsg"></span>
              </div>
            </div>
            <input type="hidden" name="id" value="{{ $user['id'] }}">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="firstName">Full name</label>
                <input type="text" class="form-control" id="firstName" name="full_name" value="{{ $user['full_name'] }}" required>
              </div>
            </div>
  
            <div class="col-lg-6">
              <div class="form-group">
                <label for="lastName">Company name</label>
                <input type="text" class="form-control" id="lastName" name="company_name" value="{{ $user['company_name'] }}" required>
                <span class="text-danger" id="company_nameErrorMsg"></span>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" required>
              <span class="text-danger" id="emailErrorMsg"></span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ $user['phone'] }}" required>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ $user['adress'] }}" required>
            </div>
          </div>
          {{-- <div class="col-lg-6">
            <div class="form-group">
              <label for="newPassword">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div> --}}
          <div class="d-flex justify-content-end mt-6">
            <button type="submit" class="btn btn-primary mb-2 btn-pill">Update User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
    $('#user_store').on('submit',function(e){
      e.preventDefault();
      $('#loader').removeClass('hidden')
      let url = '{{route('user-update')}}';
      let data = $('#user_store').serializeArray();
      ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
          if (response.status === 'error') {
              console.log(response.data);
              $('#loader').addClass('hidden')
          } else {
            $('.userList').click();
          }
      });
    });
   
  </script>