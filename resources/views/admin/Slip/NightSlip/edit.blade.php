<div class="content">
    <div class="card">
        <div class="card-body">
            <form id="nightSleep" class="row">
                <input type="hidden" name="id" value="{{ $edit['id'] }}">
                <div class="form-group col-xl-6">
                  <label for="firstName">First Name (নামের প্রথম অংশ)</label>
                  <input type="text" class="form-control" id="firstName" name="firstname" value="{{ $edit['first_name'] }}" placeholder="Enter Your First Name" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="LastName">Last Name (নামের শেষাংশ)</label>
                  <input type="text" class="form-control" id="LastName" name="Lastname" value="{{ $edit['last_name'] }}" placeholder="Enter Your Last Name" required>
                </div>
                <div class="form-group col-xl-6">
                  <label for="passport_number">Passport No (পাসপোর্ট নম্বর)</label>
                  <input type="text" class="form-control" id="passport_number" name="passport_number"value="{{ $edit['passport_no'] }}" placeholder="Passport No (পাসপোর্ট নম্বর)" required>
                </div>
                <div class="form-group col-xl-2">
                  <label for="gender">Gender (লিঙ্গ)</label>
                  <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male" @if ($edit['gender'] == 'male') selected @endif>Male</option>
                    <option value="female" @if ($edit['gender'] == 'female') selected @endif>Female</option>
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="marital_status">Marital Status (বৈবাহিক অবস্থা)</label>
                  <select class="form-control" id="marital_status" name="marital_status" required>
                    <option value="">Select Marital Status</option>
                    <option value="married" @if ($edit['marital_status'] == 'married') selected @endif>Married</option>
                    <option value="single" @if ($edit['marital_status'] == 'single') selected @endif>Single</option>
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="birthdate">Birth Date (জন্ম তারিখ)</label>
                  <input type="text" placeholder="DD-MM-YYY" class="date form-control" id="birthdate" name="birthdate" value="{{ Carbon\Carbon::parse($edit['birth_date'])->format('d-m-Y') }}" required>
                </div>
                <div class="form-group col-xl-4">
                  <label for="passport_issue_date">Passport Issue Date (পাসপোর্ট ইস্যু তারিখ)</label>
                  <input type="text" placeholder="DD-MM-YYY" class="date form-control" id="passport_issue_date" value="{{ Carbon\Carbon::parse($edit['passport_issue_date'])->format('d-m-Y') }}" name="passport_issue_date">
                </div>
                <div class="form-group col-xl-4">
                  <label for="passport_expiry">Passport Expiry (মেয়াদ উত্তীর্ণের তারিখ)</label>
                  <input type="text" placeholder="DD-MM-YYY" class="date form-control" id="passport_expiry" value="{{ Carbon\Carbon::parse($edit['passport_expiry_date'])->format('d-m-Y') }}" name="passport_expiry" required>
                </div>
                <div class="form-group col-xl-4">
                  <label for="passport_issue_place">Passport Issue Place (পাসপোর্ট ইস্যু স্থান)</label>
                  <input type="text" class="form-control" id="passport_issue_place" value="{{ $edit['passport_issue_place'] }}" placeholder="Passport Issue Place (পাসপোর্ট ইস্যু স্থান)" name="passport_issue_place" required>
                </div>
                <div class="form-group col-xl-4">
                    <label for="country_traveling">Country Traveling To (গন্তব্য দেশ):</label>
                    <select class="form-control" id="country_traveling" name="country_traveling" required>
                      <option value="">Select Country</option>
                      <option value="UEA" @if ($edit['traveling_to'] == 'UEA') selected @endif>UEA</option>
                      <option value="Bahrain" @if ($edit['traveling_to'] == 'Bahrain') selected @endif>Bahrain</option>
                      <option value="Oman" @if ($edit['traveling_to'] == 'Oman') selected @endif>Oman</option>
                      <option value="Qatar" @if ($edit['traveling_to'] == 'Qatar') selected @endif>Qatar</option>
                      <option value="Kuwait" @if ($edit['traveling_to'] == 'Kuwait') selected @endif>Kuwait</option>
                      <option value="Saudi Arabia" @if ($edit['traveling_to'] == 'Saudi Arabia') selected @endif>Saudi Arabia</option>
                    </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="visa_type">Visa Type (ভিসার ধরন)</label>
                  <select class="form-control" id="visa_type" name="visa_type" required>
                    <option value="">Select Visa Type</option>
                    <option value="Work" @if ($edit['visa_type'] == 'Work') selected @endif>Work Visa</option>
                    <option value="Family" @if ($edit['visa_type'] == 'Family') selected @endif>Family Visa</option>
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="country_from">Country From (যে দেশ থেকে)</label>
                  <select class="form-control" id="country_from" name="country_from">
                    <option value="bangladesh" selected>Bangladesh</option>
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="nationality">Nationality (জাতীয়তা)</label>
                  <select class="form-control" id="nationality" name="nationality">
                    <option value="bangladesh" selected>Bangladesh</option>
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="job_post">Position applied for (আবেদনকৃত পজিশন)</label>
                  <select class="form-control" id="job_post" name="job_post" required>
                    <option value="">Select Position</option>
                    @foreach ($job as $item)
                    <option value="{{ $item['id'] }}" @if ($item['id'] == $edit['position_applied']) selected @endif>{{$item['title']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="exampleFormControlSelect12">City From (যে শহর থেকে)</label>
                  <select class="form-control" id="city" name="city_from">
                    <option value="">Select City</option>
                    <option value="dhaka" @if ($edit['city_from'] == 'dhaka') selected @endif>Dhaka</option>
                    <option value="chittagong" @if ($edit['city_from'] == 'chittagong') selected @endif>Chittagong</option>
                    <option value="sylhet" @if ($edit['city_from'] == 'sylhet') selected @endif>Sylhet</option>
                    <option value="cumilla" @if ($edit['city_from'] == 'cumilla') selected @endif>Cumilla</option>
                    <option value="rajshahi" @if ($edit['city_from'] == 'rajshahi') selected @endif>Rajshahi</option>
                    <option value="coxsbazar" @if ($edit['city_from'] == 'coxsbazar') selected @endif>Cox's Bazar</option>
                    <option value="Barisal" @if ($edit['city_from'] == 'Barisal') selected @endif>Barisal</option>
                  </select>
                </div>
                <div class="form-group col-xl-4">
                  <label for="national_id">National ID (Optional)</label>
                  <input type="number" value="{{ $edit['nid'] }}" class="form-control" id="national_id" name="national_id" placeholder="National ID">
                </div>
                <div class="form-group col-xl-4">
                  <label for="comment">Your Own Remarks (If Any)</label>
                  <textarea class="form-control" id="comment" rows="1" name="comment" placeholder="আপনার নিজস্ব মন্তব্য">{{ $edit['comments'] }}</textarea>
                </div>
                <div class="form-footer mt-6 col-xl-4">
                  <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                </div>
              </form>
        </div>
    </div>
</div>
<script>
   $("#job_post").select2({
          placeholder: "Select a programming language",
          allowClear: true
      });
  $('#nightSleep').on('submit',function(e){
    e.preventDefault();
    $('#loader').removeClass('hidden')
    let url = '{{route('nightSlip.update')}}';
    let data = $('#nightSleep').serializeArray();
    ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
        if (response.status === 'error') {
            console.log(response.data);
            $('#loader').addClass('hidden')
        } else {
          $('#loader').addClass('hidden')
          $('.nightSlip').click();
        }
    });
  });
 
</script>