<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themescare.com/demos/seipkon-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Nov 2020 18:38:00 GMT -->
<head>
    <link rel="icon" href="{{ asset('public/favicon.png') }}" type="image/png" sizes="16x16">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Seipkon is a Premium Quality Admin Site Responsive Template" />
      <meta name="keywords" content="admin template, admin, admin dashboard, cms, Seipkon Admin, premium admin templates, responsive admin, panel, software, ui, web app, application" />
      <meta name="author" content="Themescare">
      <!-- Title -->
      <title>Fortunes Admin</title>
      <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href=" {{ asset('public/Backend/ assets/img/favicon/favicon-32x32.png') }}">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/css/animate.min.css') }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/bootstrap/bootstrap.min.css') }}">
      <!-- Font awesome CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/font-awesome/font-awesome.min.css') }}">
      <!-- Themify Icon CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/themify-icons/themify-icons.css') }}">
      <!-- Perfect Scrollbar CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}">
      <!-- Jvector CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/jvector/css/jquery-jvectormap.css') }}">
      <!-- Daterange CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/daterangepicker/css/daterangepicker.css') }}">
      <!-- Bootstrap-select CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}">
      <!-- Summernote CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/summernote/css/summernote.css') }}">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/css/seipkon.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/css/responsive.css') }}">
       <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/datatables/css/dataTables.bootstrap.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/datatables/css/buttons.bootstrap.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('public/Backend/assets/plugins/datatables/css/responsive.bootstrap.min.css') }}" >
   
   </head>

   <body>

      @yield('content')
      @yield('details')
      

      <!-- jQuery -->
      <script src="{{ asset('public/Backend/assets/js/jquery-3.1.0.min.js') }}"></script>
      <!-- Bootstrap JS -->
      <script src="{{ asset('public/Backend/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
      <!-- Bootstrap-select JS -->
      <script src="{{ asset('public/Backend/assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
      <!-- Daterange JS -->
      <script src="{{ asset('public/Backend/assets/plugins/daterangepicker/js/moment.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/daterangepicker/js/daterangepicker.js') }}"></script>
      <!-- Jvector JS -->
      <script src="{{ asset('public/Backend/assets/plugins/jvector/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/jvector/js/jquery-jvectormap-world-mill-en.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/jvector/js/jvector-init.js') }}"></script>
      <!-- Raphael JS -->
      <script src="{{ asset('public/Backend/assets/plugins/raphael/js/raphael.min.js') }}"></script>
      <!-- Morris JS -->
      <script src="{{ asset('public/Backend/assets/plugins/morris/js/morris.min.js') }}"></script>
      <!-- Sparkline JS -->
      <script src="{{ asset('public/Backend/assets/plugins/sparkline/js/jquery.sparkline.js') }}"></script>
      <!-- Chart JS -->
      <script src="{{ asset('public/Backend/assets/plugins/charts/js/Chart.js') }}"></script>
      <!-- Datatables -->
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
      <!-- Perfect Scrollbar JS -->
      <script src="{{ asset('public/Backend/assets/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js') }}"></script>
      <!-- Vue JS -->
      <script src="{{ asset('public/Backend/assets/plugins/vue/vue.min.js') }}"></script>
      <!-- Summernote JS -->
      <script src="{{ asset('public/Backend/assets/plugins/summernote/js/summernote.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/summernote/js/custom-summernote.js') }}"></script>
      <!-- Dashboard JS -->
      <script src="{{ asset('public/Backend/assets/js/dashboard.js') }}"></script>
      <!-- Custom JS -->
      <script src="{{ asset('public/Backend/assets/js/seipkon.js') }}"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
         <!-- Datatables -->
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/dataTables.bootstrap.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/buttons.bootstrap.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/buttons.flash.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/responsive.bootstrap.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/jszip.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/pdfmake.min.js') }}"></script>
      <script src="{{ asset('public/Backend/assets/plugins/datatables/js/vfs_fonts.js') }}"></script>
      <!-- Perfect Scrollbar JS -->
      <!-- Form Wizard Custom JS For Only This Page -->
      <script src="{{ asset('public/Backend/assets/js/advance_table_custom.js') }}"></script>

<script>
      @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

      
            switch(type){
                  case 'info':
                     toastr.info("{{ Session::get('message') }}");
                     break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
            case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
      @endif
</script>
   </body>

</html>
