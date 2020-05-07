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
 <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/datatables-responsive/css/responsive.bootstrap4.min.css') }} ">
 
  <!-- jQuery -->
  <script src="{{ asset('js/jquery.min.js') }} "></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed layout-footer-fixed">
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
<script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}  "></script>

<script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}  "></script>

<script src="{{ asset('js/datatables-bs4/js/dataTables.bootstrap4.min.js') }}  "></script>
<script src="{{ asset('js/datatables-responsive/js/dataTables.responsive.min.js') }}  "></script>
<script src="{{ asset('js/datatables-responsive/js/responsive.bootstrap4.min.js') }}  "></script>
<script src="{{ asset('js/moment.min.js') }}  "></script>
<script src="{{ asset('js/bootstrap/tempusdominus-bootstrap-4.min.js') }}  "></script>

<script src="{{ asset('js/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker/daterangepicker.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });

    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });

    $("#example4").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });

    $("#pending_table").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [1, "desc"],
    });

    $("#expired_table").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [5, "desc"],
    });

    $("#rejected_table").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [5, "desc"],
    });

    $("#completed_table").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [5, "desc"],
    });




  });



</script>

</body>
</html>



