
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Global GCC Health</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{ asset('/') }}assets/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />


  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{ asset('/') }}assets/css/style.css" />


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- FAVICON -->

  <script src="{{ asset('/') }}assets/js/ajax.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
  {{-- <link href="{{ asset('/') }}assets/images/favicon.png" rel="shortcut icon" /> --}}
  <script>
    $(function(){
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
    })
  </script>
</head>

