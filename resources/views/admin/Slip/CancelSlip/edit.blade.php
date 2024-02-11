<div class="content">
    <div class="card">
        <div class="card-body">
            <form id="cancelSlip_store" class="row">
                <div class="form-group col-xl-6">
                  <label for="firstName">First Name (নামের প্রথম অংশ)</label>
                  <input type="text" class="form-control" id="firstName" value="{{ $edit['first_name'] }}" name="firstname" placeholder="Enter Your First Name" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="LastName">Last Name (নামের শেষাংশ)</label>
                  <input type="text" class="form-control" id="LastName" name="Lastname" value="{{ $edit['last_name'] }}" placeholder="Enter Your Last Name" required>
                </div>
                <input type="hidden" name="id" value="{{ $edit['id'] }}">
                <div class="form-group col-xl-6">
                  <label for="passport_number">Passport No (পাসপোর্ট নম্বর)</label>
                  <input type="text" class="form-control" id="passport_number" value="{{ $edit['passport_no'] }}" name="passport_number" placeholder="Passport No (পাসপোর্ট নম্বর)" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="gcc_number">GCC Slip No (জিসিসি স্লিপ নম্বর)</label>
                  <input type="number" class="form-control" id="gcc_number" name="gcc_number" value="{{ $edit['gcc_slip_no'] }}" placeholder="GCC Slip No (জিসিসি স্লিপ নম্বর)" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="comment">Your Own Remarks (If Any)</label>
                  <textarea class="form-control" id="comment" rows="2" name="comment" placeholder="আপনার নিজস্ব মন্তব্য">{{ $edit['comments'] }}</textarea>
                </div>
                <div class="form-footer mt-6 col-xl-2">
                  <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                </div>
              </form>
        </div>
    </div>
</div>
<script>
  $('#cancelSlip_store').on('submit',function(e){
    e.preventDefault();
    $('#loader').removeClass('hidden')
    let url = '{{route('cancelSlip-update')}}';
    let data = $('#cancelSlip_store').serializeArray();
    ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
        if (response.status === 'error') {
            console.log(response.data);
            $('#loader').addClass('hidden')
        } else {
          $('.CancelSlip').click();
        }
    });
  });
 
</script>