<div class="content">
    <div class="card">
        <div class="card-body">
            <form id="transaction_store" class="row" enctype="multipart/form-data">
                <div class="form-group col-xl-6">
                  <label for="transaction_number">Transaction Number</label>
                  <input type="text" class="form-control" id="transaction_number" value="{{ $edit['transaction_number'] }}" name="transaction_number" placeholder="Enter Your Transaction Number" required>
                </div>
                <input type="hidden" name="id" value="{{ $edit['id'] }}">
                <div class="form-group col-xl-6">
                  <label for="amount">Amount</label>
                  <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="{{ $edit['amount'] }}" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="bank_name">Bank Name</label>
                  <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $edit['bank_name'] }}" placeholder="Bank Name" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="bank_name">Transection Screenshot</label>
                  <input type="file" id="image" value="{{ $edit['image'] }}" class="form-control" name="image">
                </div>
                <div class="form-group col-xl-6">
                  <label for="comment">Your Own Remarks (If Any)</label>
                  <textarea class="form-control" id="comment" rows="2" name="comment" placeholder="আপনার নিজস্ব মন্তব্য">{{ $edit['comments'] }}</textarea>
                </div>
                <div class="col-xl-6">
                  <div id="preview"></div>
                </div>
                <div class="col-xl-2">
                  <button type="button" id="uploadButton" class="btn btn-primary btn-pill">Submit</button>
                </div>
              </form>
        </div>
    </div>
</div>
<script>
   $(document).ready(function() {
    loadExistingData();
    function loadExistingData() {
        // Assuming you have a variable 'existingImageURL' that contains the existing image URL
       
        var existingImageURL = '{{ asset('images/transaction/' . $edit['image']) }}';
        // Load existing image and display in preview
        var img = new Image();
        img.src = existingImageURL;

        img.onload = function() {
            $('#preview').html('<img src="' + this.src + '" class="col-xl-12" alt="Existing Image">');
        };

        
    }
    $('#uploadButton').on('click', function() {
        $('#loader').removeClass('hidden')
        var formData = new FormData($('#transaction_store')[0]);

        $.ajax({
            url: '{{ route('update-transaction') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              $('#loader').addClass('hidden')
              $('.accountManagement').click();
            },
            error: function(error) {
              $('#loader').addClass('hidden')
                
            }
        });
    });


    // Preview the selected image before upload
    $('#image').on('change', function() {
        var input = this;
        var url = window.URL || window.webkitURL;
        var file = input.files[0];

        if (file) {
            var img = new Image();
            img.src = url.createObjectURL(file);

            img.onload = function() {
                $('#preview').html('<img src="' + this.src + '" class="col-xl-12" alt="' + file.name + '">');
            };
        }
    });
});
 
</script>