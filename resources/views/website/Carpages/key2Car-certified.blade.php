
@extends('websiteMasterView')


@section('title')
Key2Car Certified  | Key2Cars
@endsection

@section('icons')

<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car-active" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="accessories"  href="{{Route('/accessory')}}"></a></li>
             <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
             <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
           
            
            
            
          </ul>
    
    
        </div>

<ul class="center-block hidden-sm hidden-lg hidden-md " id="">
    <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="car-active" href="{{Route('carIndexPage')}}"></a></li>
            <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="bike"  href="{{Route('bike')}}"></a></li>
             <li class="col-xs-4"><a  style="padding: 17px; margin: 0" class="accessories"  href="{{Route('/accessory')}}"></a></li>
             <li class="col-xs-4"><a class="tractor"  href="{{Route('/farms')}}"></a></li>
            <li class="col-xs-4"><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class="col-xs-4"><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
            
           
            
          </ul>

@endsection

@section('cssblock')
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

        <link rel="stylesheet" href="{{URL ::asset('assets/css/custom.css')}}">
		<link rel="stylesheet" href="{{URL ::asset('assets/css/ribbon.css')}}"
        <link rel="stylesheet" href="{{URL ::asset('assets/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{URL ::asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL ::asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL ::asset('assets/css/bootsnav.css')}}">

        <!-- index css -->
        
        <link rel="stylesheet" href="{{URL ::asset('assets/car/css/style.css')}}">
        <link rel="stylesheet" href="{{URL ::asset('assets/car/css/bootstrap.css')}}">



        <!--Theme custom css -->
       <link rel="stylesheet" href="{{URL ::asset('assets/css/style.css')}}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        
        <!-- JS includes -->

        <script src="{{URL ::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{URL ::asset('assets/js/vendor/bootstrap.min.js')}}"></script>

        
      



        <script src="{{URL ::asset('assets/js/plugins.js')}}"></script>
        <script src="{{URL ::asset('assets/js/main.js')}}"></script>

    

    <link href="{{URL ::asset('assets/car/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
	<link href="{{URL ::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{URL ::asset('assets/car/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL ::asset('assets/car/js/index_used_cars.js')}}" type="text/javascript"></script>

    <script>
  user_type = 'Anonymous';
  is_mobile = '0';
  newsletter_subscriber = 'false';
  logged_in=false;
  hashed_email='';
         car_listings=bike_listings=parts_listings='';
  pw_language = 'English';
</script>


@endsection
  
  
  

  @section('content')
  
  <img src="{{URL::asset('images/coming_soon.jpg')}}" style="width:100%;">
  

@endsection


@section('jsblock')

   
  

@endsection