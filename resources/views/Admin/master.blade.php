<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> @yield('title')</title>

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

  <link rel="shortcut icon" sizes="32x32"  type="image/png" href="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
{{--   <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'> --}}


  {{-- bootstrap link --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!--toastr link  -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

{{--   ionicons --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<style>
/*  .sidebarfont{
    font-family: poppins;
  } 
  .dashboard{
    font-family: poppins;
  }
*/


  div.dataTables_wrapper div.dataTables_length select {
      width: 60px;

    }


</style>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('Admin.include.menu')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('Admin.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
       
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('Dashboard')
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('Admin.include.footer')
</div>
<!-- ./wrapper -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/BackEndSourceFile')}}/dist/js/adminlte.min.js"></script>

<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!--- this feature for the pdf button -->

<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script src="{{asset('/BackEndSourceFile')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('/BackEndSourceFile')}}/dist/js/pages/dashboard2.js"></script>

<!-- Swwet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- toastr script -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>

    @if (Session::has('message'))

     toastr.options.progressBar = true;
    
    var type = "{{Session::get('alert-type','info')}}"

    switch(type){

      case 'info':
        toastr.info("{{Session::get('message')}}");
        break;

      case 'success':
        toastr.success("{{Session::get('message')}}");
        break;

      case 'warning':
        toastr.warning("{{Session::get('message')}}");
        break;

      case 'error':
        toastr.error("{{Session::get('message')}}");
        break;
    }

    @endif
   
</script>



 <!-- the old datatable -->

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



<script>
  $(function () {
    $("#example3").DataTable({
      // "responsive": true, "lengthChange": false, "autoWidth": false,
      "responsive": true,
      "autoWidth": false,
      "buttons": ["copy","print"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
   
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
