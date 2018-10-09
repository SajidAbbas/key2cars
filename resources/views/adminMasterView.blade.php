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
      <span class="logo-mini"><b>K</b>2C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Key2Cars</b></span>
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
        <li class="treeview {{current_page('admin') ? '' : 'active' }}">
          <a href="{{URL('/admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
           <li class="treeview menu {{current_page('CityArea') ? '' : 'active' }} {{current_page_s('EditCity') ? 'active' : '' }} {{current_page('City/Add') ? '' : 'active' }} {{current_page('Vehicle/Add') ? '' : 'active' }} {{current_page_s('ConditionDetail/Edit') ? 'active' : '' }} {{current_page('Condition_Detail/Add') ? '' : 'active' }} {{current_page_s('EditFeature') ? 'active' : '' }} {{current_page('Features/Add') ? '' : 'active' }} {{current_page_s('EditModelVersion') ? 'active' : '' }} {{current_page('ModelVersion/Add') ? '' : 'active' }} {{current_page_s('EditModel') ? 'active' : '' }} {{current_page('Model/Add') ? '' : 'active' }} {{current_page_s('EditManufacture') ? 'active' : '' }} {{current_page('Manufacture/Add') ? '' : 'active' }} {{current_page('VehicleType/Add') ? '' : 'active' }} {{current_page_s('EditVehicleType') ? 'active' : '' }} {{current_page_s('EditVehicle') ? 'active' : '' }} {{current_page_s('AccessoryDetail') ? 'active' : '' }}{{current_page_s('Accessory/Edit') ? 'active' : '' }}{{current_page('Accessory/Add') ? '' : 'active' }} {{current_page('City') ? '' : 'active' }} {{current_page('Condition_Detail') ? '' : 'active' }} {{current_page('Features') ? '' : 'active' }} {{current_page('ModelVersion') ? '' : 'active' }} {{current_page('Model') ? '' : 'active' }} {{current_page('Manufacture') ? '' : 'active' }} {{current_page('VehicleType') ? '' : 'active' }} {{current_page('Vehicle') ? '' : 'active' }} {{current_page('Ads/Accessory') ? '' : 'active' }}  ">
          <a href="#">
            <i class="fa fa-book"></i> <span>Catalog</span>
            <span class="pull-right-container">            
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{current_page('Vehicle') ? '' : 'active' }} {{current_page('Vehicle/Add') ? '' : 'active' }} {{current_page_s('EditArea') ? 'active' : '' }} {{current_page('CityArea/Add') ? '' : 'active' }} {{current_page_s('EditVehicle') ? 'active' : '' }}"><a href="{{ route('adminAds') }}"><i class="fa fa-circle-o"></i> Ads/Vehicle</a></li>
              <li class="{{current_page('Ads/Accessory') ? '' : 'active' }}{{current_page_s('AccessoryDetail') ? 'active' : '' }}{{current_page_s('Accessory/Edit') ? 'active' : '' }}{{current_page('Accessory/Add') ? '' : 'active' }}"><a href="{{ route('adminAdsAccessories') }}"><i class="fa fa-circle-o"></i> Ads/Accesories</a></li>
            
              <li class="{{current_page('VehicleType') ? '' : 'active' }} {{current_page('VehicleType/Add') ? '' : 'active' }} {{current_page_s('EditVehicleType') ? 'active' : '' }}"><a href="{{ route('adminVehicleType') }}"><i class="fa fa-circle-o"></i> Vehicle Type</a></li>
              <li class="{{current_page('Manufacture') ? '' : 'active' }} {{current_page_s('EditManufacture') ? 'active' : '' }} {{current_page('Manufacture/Add') ? '' : 'active' }}"><a href="{{ route('manufacture') }}"><i class="fa fa-circle-o"></i> Manufacturer</a></li>
              <li class="{{current_page('Model') ? '' : 'active' }} {{current_page_s('EditModel') ? 'active' : '' }} {{current_page('Model/Add') ? '' : 'active' }}" ><a href="{{route('model')}}"><i class="fa fa-circle-o"></i> Model</a></li>
              <li class="{{current_page('ModelVersion') ? '' : 'active' }} {{current_page_s('EditModelVersion') ? 'active' : '' }} {{current_page('ModelVersion/Add') ? '' : 'active' }}"><a href="{{route('model_version')}}"><i class="fa fa-circle-o"></i> Model Version</a></li>
              <li class="{{current_page('Features') ? '' : 'active' }} {{current_page_s('EditFeature') ? 'active' : '' }} {{current_page('Features/Add') ? '' : 'active' }}" ><a href="{{route('feature')}} "><i class="fa fa-circle-o"></i> Features</a></li>
              <li class="{{current_page('Condition_Detail') ? '' : 'active' }} {{current_page_s('ConditionDetail/Edit') ? 'active' : '' }} {{current_page('Condition_Detail/Add') ? '' : 'active' }}"><a href="{{ route('conditionDetail') }}"><i class="fa fa-circle-o"></i> Condition Detail</a></li>
              <li class="{{current_page('City') ? '' : 'active' }} {{current_page_s('EditCity') ? 'active' : '' }} {{current_page('City/Add') ? '' : 'active' }}"><a href="{{route('city')}}"><i class="fa fa-circle-o"></i> City</a></li> 
              <li class="{{current_page('CityArea') ? '' : 'active' }} {{current_page_s('EditArea') ? 'active' : '' }} {{current_page('CityArea/Add') ? '' : 'active' }}"><a href="{{ route('area') }}"><i class="fa fa-circle-o"></i> Area</a></li>
                           
             
              
              
          </ul>
        </li>

        <li class="treeview menu {{current_page('Moderator/Vehicles') ? '' : 'active' }}{{current_page('Moderator/Accessories') ? '' : 'active' }}{{current_page('Moderator/HotWheel') ? '' : 'active' }} ">
          <a href="#">
            <i class="fa fa-book"></i> <span>Moderator</span>
            <span class="pull-right-container">            
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{current_page('Moderator/Vehicles') ? '' : 'active' }} " ><a href="{{route('pendingRequestVehicles')}}"><i class="fa fa-circle-o"></i>Vehicles Pending Requests</a></li>
              <li class="{{current_page('Moderator/Accessories') ? '' : 'active' }}"><a href="{{route('pendingRequestAccessory')}}"><i class="fa fa-circle-o"></i>Accessory Pending Requests</a></li>
              <li class="{{current_page('Moderator/HotWheel') ? '' : 'active' }}"><a href="{{route('pendingRequestHotWheel')}}"><i class="fa fa-circle-o"></i>Hot Wheels Pending Requests</a></li>
              
              <li class=""><a href="{{-- route('featuredRequest') --}}"><i class="fa fa-circle-o"></i> Featured Requests</a></li>
      
          </ul>
        </li>
         <li class="treeview menu {{current_page_s('Admin/Vehicle') ? 'active' : '' }}  ">
          <a href="#">
            <i class="fa fa-book"></i> <span>New Vehicles</span>
            <span class="pull-right-container">            
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class=" {{current_page_s('Admin/Vehicle') ? 'active' : '' }} " ><a href="{{route('newvehicle')}}"><i class="fa fa-circle-o"></i>Vehicle</a></li>
             
      
          </ul>
        </li>
      
       
        <li class="treeview {{current_page('Admin/ManageDealers') ? '' : 'active' }} {{current_page_s('Admin/Dealer') ? 'active' : '' }}" >
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">            
              <i class="fa fa-angle-left pull-right"></i>
            </span>  
          </a>
              <ul class="treeview-menu">                        
              <li class="{{current_page('Admin/ManageDealers') ? '' : 'active' }} {{current_page_s('Admin/Dealer') ? 'active' : '' }}"><a href="{{Route('/dealers')}}"><i class="fa fa-circle-o"></i> Dealer</a></li>
              <li ><a href="#"><i class="fa fa-circle-o"></i> Guest</a></li>      
              </ul>
        </li>
        
        <li class="treeview {{current_page('MFV/Car') ? '' : 'active' }} {{current_page('MFV/Add') ? '' : 'active' }}">
          <a href="#">
            <i class="fa fa-star"></i> <span>Most Featured Vehicles</span>
            <span class="pull-right-container">            
              <i class="fa fa-angle-left pull-right"></i>
            </span>  
          </a>
              <ul class="treeview-menu">
              <li class="{{current_page('MFV/Car') ? '' : 'active' }} {{current_page('MFV/Add') ? '' : 'active' }}"><a href="{{route('/mfvCar')}}"><i class="fa fa-circle-o"></i> Vehicles</a></li>                        
              
              
              </ul>
        </li>
        
        <li class="treeview {{current_page('Ads/HotWheel') ? '' : 'active' }} {{current_page('HotWheel/Add') ? '' : 'active' }}">
          <a href="{{Route('/AdminHotWheel')}}">
            <i class="fa fa-star"></i> <span>Hot Wheels</span>
           
          </a>
              
        </li>
        <li class="treeview {{current_page('Admin/News') ? '' : 'active' }} {{current_page('Admin/News/Detail/') ? '' : 'active' }} {{current_page('Admin/News/Add') ? '' : 'active' }}">
          <a href="{{Route('/autoNews')}}">
            <i class="fa fa-newspaper-o"></i> <span>Auto News</span>
            
          </a>
              
        </li>
        
        
        
           <li class="treeview">
          <a href="{{route('shop')}}">
            <i class="fa fa-shopping-cart"></i> <span>Store</span>
           
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
<script src="{{URL ::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
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
