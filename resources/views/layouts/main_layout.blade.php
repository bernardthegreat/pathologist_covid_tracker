<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Covid19 Lab Tracker</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/datatables-responsive/css/responsive.bootstrap4.min.css') }} ">
 
  <!-- jQuery -->
  <script src="{{ asset('js/jquery.min.js') }} "></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('partials.nav')
       
        <div id="right-panel" class="right-panel">   
            @include('partials.header')
             <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            @include('flash-message')
                @yield('content')
            </div>
        </div>
        @include('partials.footer')

    </div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}  "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.js') }}  "></script>
<script src="{{ asset('js/moment.min.js') }}  "></script>
<script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}  "></script>

<script src="{{ asset('js/datatables-bs4/js/dataTables.bootstrap4.min.js') }}  "></script>
<script src="{{ asset('js/datatables-responsive/js/dataTables.responsive.min.js') }}  "></script>
<script src="{{ asset('js/datatables-responsive/js/responsive.bootstrap4.min.js') }}  "></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [0, "desc"],
      
    });

  });


 

</script>

</body>
</html>



