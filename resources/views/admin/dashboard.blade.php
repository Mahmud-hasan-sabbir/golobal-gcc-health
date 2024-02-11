@include('admin.layouts.css')
  <body class="navbar-fixed sidebar-fixed" id="body">
    {{-- <div id="toaster"></div> --}}
    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        @include('admin.layouts.sidebar')

      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
         @include('admin.layouts.header')

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div id="loader" class="lds-dual-ring hidden overlay"></div>
        <div class="content-wrapper">

        </div>
        
          <!-- Footer -->
          

      </div>
    </div>              
    <script src="{{ asset('/') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('/') }}assets/plugins/simplebar/simplebar.min.js"></script> --}}
    
    <script src="{{ asset('/') }}assets/js/mono.js"></script>
    <script src="{{ asset('/') }}assets/js/custom.js"></script>
    


  </body>
</html>
