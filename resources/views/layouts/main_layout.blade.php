<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">

  <link rel="stylesheet" href="/css/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/datatables-responsive/css/responsive.bootstrap4.min.css">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('partials.nav')
        <div id="right-panel" class="right-panel">   
            @include('partials.header')
             <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        @include('partials.footer')

    </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/js//bootstrap.bundle.js"></script>

<script src="/js/moment.min.js"></script>

<script src="/js/datatables/jquery.dataTables.min.js"></script>
<script src="/js/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/js/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="/js/adminlte.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>



