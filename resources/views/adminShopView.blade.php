<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="{{URL::asset('assets/images/favicon.png')}}">
  @yield('title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <!--upload file css-->
    <link rel="stylesheet" href="{{URL ::asset('bootstrap/css/upload-files.css') }}">

    <link rel="stylesheet" href="{{asset('bootstrap/css/styles.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <!--link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css"-->
  <!-- bootstrap datepicker -->
  <!--link rel="stylesheet" href="../plugins/datepicker/datepicker3.css"-->
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{URL ::asset('plugins/iCheck/all.css') }}">
  <!-- Bootstrap Color Picker -->
  <!--link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css"-->
  <!-- Bootstrap time Picker -->
  <!--link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css"-->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL ::asset('plugins/select2/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL :: asset('css/AdminLTE.min.css') }}">
    <!-- Ion Slider -->
  <link rel="stylesheet" href="{{ URL :: asset('plugins/ionslider/ion.rangeSlider.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL :: asset('css/skins/_all-skins.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/jquery-confirm.css') }}" media="screen" />

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <?php 
  function current_page($uri = "/") { 
    return strcmp(request()->path(), $uri); 
  } 
  
  function current_page_s($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>

<script src="{{URL ::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  @yield('cssblock')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{URL('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>2CS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Key2Cars Shop</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
        
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{URL :: asset('images/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">@yield('username')</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{URL :: asset('images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  @yield('username') 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL :: asset('images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@yield('username')</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview {{current_page('Shop') ? '' : 'active' }}">
          <a href="{{URL('/Shop')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
           <li class="treeview menu ">
               <a href="#">
            <i class="fa fa-book"></i> <span>Category</span>
            
          </a>
          
        </li>
         <li class="treeview menu    ">
          <a href="#">
            <i class="fa fa-book"></i> <span>Products</span>
            
          </a>
          
        </li>
         <li class="treeview menu   ">
          <a href="#">
            <i class="fa fa-book"></i> <span>Orders</span>
            
          </a>
          
        </li>
         <li class="treeview menu  {{current_page_s('Shop/Discount') ? 'active' : '' }} ">
          <a href="{{route('discount')}}">
            <i class="fa fa-book"></i> <span>Discount</span>
            
          </a>
          
        </li>

        
        
        
          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
   @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="http://exagic.com">EXAGIC</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<!-- Bootstrap 3.3.6 -->
<script src="{{URL ::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL ::asset('plugins/select2/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{URL ::asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{URL ::asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<!-- Ion Slider -->
<script src="{{URL ::asset('plugins/ionslider/ion.rangeSlider.min.js')}}"></script>    
<script src="{{URL ::asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!--script src="../plugins/daterangepicker/daterangepicker.js"></script-->
<!-- bootstrap datepicker -->
<!--script src="../plugins/datepicker/bootstrap-datepicker.js"></script-->
<!-- bootstrap color picker -->
<!--script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script-->
<!-- bootstrap time picker -->
<!--script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script-->
<!-- SlimScroll 1.3.0 -->
<script src="{{URL ::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{URL ::asset('plugins/iCheck/icheck.min.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>

<!-- FastClick -->
<!--script src="../plugins/fastclick/fastclick.js"></script-->
<!-- AdminLTE App -->
<script src="{{URL ::asset('js/app.min.js')}}"></script>
    <script src="{{URL ::asset('plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>

<script type="text/javascript" src="{{ URL :: asset('js/jquery-confirm.js') }}"></script>
@yield('jsblock')


</body>
</html>
