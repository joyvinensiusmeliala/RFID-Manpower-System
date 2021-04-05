<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RFID Manpower System </title>

    <!-- Bootstrap -->
    <link href="{{asset('AdminLTE/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
   
    <!-- Font Awesome -->
    <link href="{{asset('AdminLTE/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    
    <!-- NProgress -->
    <link href="{{asset('AdminLTE/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    
    <!-- iCheck -->
    <link href="{{asset('AdminLTE/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{asset('AdminLTE/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
   
    <!-- JQVMap -->
    <link href="{{asset('AdminLTE/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('AdminLTE/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{asset('AdminLTE/build/css/custom.min.css')}}" rel="stylesheet">
   
    {{-- Datatable --}}
    {{-- <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}
    <link href="{{asset('AdminLTE/jquery.dataTables.min.css')}}">

    <link href="{{asset('AdminLTE/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('AdminLTE/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('AdminLTE/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('AdminLTE/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('AdminLTE/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{asset('styles.css')}}" rel="stylesheet">

</head>
<body class="nav-md">
<!-- Site wrapper -->
<div class="container body">
  <div class="main_container">
    @include('template.navigation')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
        <!-- footer content -->
    <footer>
      <div class="pull-right">
            Rapid Infrastruktur Indonesia
      </div>
      <div class="clearfix"></div>
    </footer>
  <!-- /footer content -->
</div>
</div>
<!-- ./wrapper -->

@include('template.footer')