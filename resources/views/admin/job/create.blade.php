<div class="content">
    <div class="card">
        <div class="card-body">
            <form id="job_store" class="row">
                <div class="form-group col-xl-12">
                  <label for="title">Job Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Job Title" required>
                </div>
                <div class="d-flex justify-content-end mt-6">
                  <button type="submit" class="btn btn-primary mb-2 btn-pill">Add Job</button>
                </div>
              </form>
        </div>
    </div>
</div>
<script>
  $('#job_store').on('submit',function(e){
    e.preventDefault();
    $('#loader').removeClass('hidden')
    let url = '{{route('job-store')}}';
    let data = $('#job_store').serializeArray();
    ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
        if (response.status === 'error') {
            console.log(response.data);
            $('#loader').addClass('hidden')
        } else {
          $('.joblist').click();
        }
    });
  });
 
</script>