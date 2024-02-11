<div class="content">
    <div class="card">
        <div class="card-body">
            <form id="job_store" class="row">
                <div class="form-group col-xl-8">
                  <label for="title">Hospital Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Hospital Name" required>
                </div>
                <div class="form-group col-xl-4">
                  <label for="title">Hospital Payment</label>
                  <input type="number" class="form-control" id="payment" name="payment" placeholder="Enter Hospital payment" required>
                </div>
                <div class="d-flex justify-content-end mt-6">
                  <button type="submit" class="btn btn-primary mb-2 btn-pill">Add Hospital</button>
                </div>
              </form>
        </div>
    </div>
</div>
<script>
  $('#job_store').on('submit',function(e){
    e.preventDefault();
    $('#loader').removeClass('hidden')
    let url = '{{route('hospital-store')}}';
    let data = $('#job_store').serializeArray();
    ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
        if (response.status === 'error') {
            console.log(response.data);
            $('#loader').addClass('hidden')
        } else {
          $('.addHospital').click();
        }
    });
  });
 
</script>