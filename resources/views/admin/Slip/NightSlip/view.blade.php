<div class="row no-gutters" style="color: black">        
    <div class="col-md-4">
        <h5 class="mt-1">First Name</h5>
        <h5 class="mt-1">Last Name</h5>
        <h5 class="mt-1">Passport Number</h5>
        <h5 class="mt-1">Gender</h5>
        <h5 class="mt-1">Marital Status</h5>
        <h5 class="mt-1">Date of Birth</h5>
        <h5 class="mt-1">Passport Issue Date</h5>
        <h5 class="mt-1">Passport Expiry Date</h5>
        <h5 class="mt-1">Passport Issue Place</h5>
        <h5 class="mt-1">Traveling To</h5>
        <h5 class="mt-1">Visa Type</h5>
        <h5 class="mt-1">Traveling From</h5>
        <h5 class="mt-1">Nationality</h5>
        <h5 class="mt-1">Job Position Applied</h5>
        <h5 class="mt-1">City From</h5>
        <h5 class="mt-1">NID Number</h5>
        <h5 class="mt-1">Remarks</h5>
    </div>
    <div class="col-md-8">
        <p class="mt-1">{{ $nightSlip['first_name'] }}</p>
        <p class="mt-1">{{ $nightSlip['last_name'] }}</p>
        <p class="mt-1">{{ $nightSlip['passport_no'] }}</p>
        <p class="mt-1">{{ $nightSlip['gender'] }}</p>
        <p class="mb-1">{{ $nightSlip['marital_status'] }}</p>
        <p class="">{{ Carbon\Carbon::parse($nightSlip['birth_date'])->format('d-m-Y') }}</p>
        <p class="">{{ Carbon\Carbon::parse($nightSlip['passport_issue_date'])->format('d-m-Y') }}</p>
        <p class="mt-1">{{ Carbon\Carbon::parse($nightSlip['passport_expiry_date'])->format('d-m-Y') }}</p>
        <p class="mt-1">{{ $nightSlip['passport_issue_place'] }}</p>
        <p class="mt-1">{{ $nightSlip['traveling_to'] }}</p>
        <p class="mt-1">{{ $nightSlip['visa_type'] }}</p>
        <p class="mt-1">{{ $nightSlip['traveling_from'] }}</p>
        <p class="mt-1">{{ $nightSlip['nationality'] }}</p>
        <p class="mt-1">{{ $nightSlip['jobPost']['title'] }}</p>
        <p class="mt-1">{{ $nightSlip['city_from'] }}</p>
        <p class="mt-1">{{ $nightSlip['nid'] }}</p>
        <p class="mt-1">{{ $nightSlip['comments'] }}</p>
    </div>
  </div>