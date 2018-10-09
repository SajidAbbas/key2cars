<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="{{URL::asset('assets/images/favicon.png')}}">

@yield('cssblock')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="body-reletive bg-grey" data-spy="scroll" data-target=".navbar-collapse">

<!-- Preloader -->
<div id="loading">
  <div id="loading-center">
    <div id="loading-center-absolute">
      <div class="object" id="object_one"></div>
      <div class="object" id="object_two"></div>
      <div class="object" id="object_three"></div>
      <div class="object" id="object_four"></div>
    </div>
  </div>
</div>
<!--End off Preloader -->

<div class="culmn"> 
  <!--Home page style--> 
  
  <!-- Navigation -->
  <nav class="navbar navbar-default bootsnav">
    <div class="navbar-top bg-blue hidden-xs" style="margin-bottom:5px;">
      <div class="container">
        <div class="row">
          <div class="col-xs-3 hidden-xs">
            <div class="navbar-callus text-left sm-text-center">
              <ul class="list-inline social-icon" style="margin-bottom:0;">
                  <li><a href="https://web.facebook.com/key2car" target="_blank"><i class="fa fa-facebook "></i></a></li>
                <li><a href="#"><i class="fa fa-twitter "></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin "></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus "></i></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-xs-9">
            <div class="navbar-socail text-right sm-text-center">
             
              <ul class="list-inline" style="margin-bottom:0;">
                
                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Sign In</a></li>
                        
                        |
                        
                        <li><a href="{{ url('/register') }}">Sign Up</a></li>
                    @else
                      
                    <li><a href="{{URL('/admin')}}">Welcome {{ Auth::user()->name }}</a></li>
                    |
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                          
                           
                                
                        
                    @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
      
          <div class="pull-left col-sm-2 col-xs-12"><a href="{{Route('home')}}"><img  class="center-block" alt="logo" src="{{URL::asset('assets/images/logo.png')}}"/></a></div>
        <div class="col-sm-1"></div>
        @yield('icons')
        
        
        <div class="pull-right">
          <ul class="list-inline" id="logo-right">
              <li class="dropdown hidden-xs" style="margin-top: 15px;"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img   src="{{URL::asset('assets/images/btn-post.png')}}"/></a>

            <ul class="dropdown-menu animated " style=" margin-left: -16px; width: auto; border-top: 5px solid #d9534f;">
                <li><a href="{{Route('/sellCar')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <i class="fa fa-car"></i>&nbsp; &nbsp; Sell my Car</a></li>
                <li><a href="{{Route('sellBike')}}" style="padding-left:0 !important;"> &nbsp; &nbsp; <i class="fa fa-motorcycle"></i>&nbsp; &nbsp; Sell my Bike</a></li>
                <li><a href="{{Route('/sellAccessory')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <i class="fa fa-cog"></i>&nbsp; &nbsp; Sell my Accessory</a></li>
                <li><a href="{{Route('/sellTruck')}}" style="padding-left:0 !important;"> &nbsp; &nbsp; <i class="fa fa-truck"></i>&nbsp; &nbsp; Sell my Truck</a></li>
                <li><a href="{{Route('/sellBus')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <i class="fa fa-bus"></i>&nbsp; &nbsp; Sell my Bus</a></li>
                <li><a href="{{Route('/sellFarm')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <img src="{{URL::asset('assets/images/tractor-icon.png')}}" style="max-width:20px;">&nbsp; Sell my Farm</a></li>
              </ul>
              </li>
            <!--  <li class="dropdown hidden-sm hidden-md hidden-lg " style="margin-top: 0px;"> <a style="padding:-1px 0;" class="dropdown-toggle" data-toggle="dropdown" href="#"><img style="margin-top:-30px" src="{{URL::asset('assets/images/btn-post.png')}}"/></a>
            <ul class="dropdown-menu animated " style=" margin-top: -15px; margin-left: 0px; width: auto; border-top: 5px solid #d9534f;">
                <li><a href="{{Route('/sellCar')}}">&nbsp; &nbsp; <i class="fa fa-car"></i>&nbsp; &nbsp; Sell my Car</a></li>
                <li><a href="{{Route('sellBike')}}"> &nbsp; &nbsp; <i class="fa fa-motorcycle"></i>&nbsp; &nbsp; Sell my Bike</a></li>
                <li><a href="{{Route('/sellAccessory')}}">&nbsp; &nbsp; <i class="fa fa-cog"></i>&nbsp; &nbsp; Sell my Accessory</a></li>
                <li><a href="{{Route('/sellTruck')}}"> &nbsp; &nbsp; <i class="fa fa-truck"></i>&nbsp; &nbsp; Sell my Truck</a></li>
                <li><a href="{{Route('/sellBus')}}">&nbsp; &nbsp; <i class="fa fa-bus"></i>&nbsp; &nbsp; Sell my Buses</a></li>
                <li><a href="{{Route('/sellFarm')}}">&nbsp; &nbsp; <img src="{{URL::asset('assets/images/tractor-icon.png')}}" style="max-width:20px;">&nbsp; Sell my Farm</a></li>
              </ul>
            
            </li>-->
            
            
          </ul>
          
          
        </div>
      </div>
    </div>
      
      
    
    
    
    
    
    <div class="bg-blue ">
      <div class="container">
       
        <!-- Start Header Navigation -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
          
        </div>
        <!-- End Header Navigation --> 
        <div class=" pull-right dropdown hidden-sm hidden-md hidden-lg " style="margin-top: -20px;"> <a style="padding:-1px 0;" class="dropdown-toggle" data-toggle="dropdown" href="#"><img style="margin-top:-34px" src="{{URL::asset('assets/images/add-post.png')}}"/></a>
            <ul class="dropdown-menu animated " style=" margin-top: -9px; margin-left: 0px; width: auto; border-top: 5px solid #d9534f;">
                <li><a href="{{Route('/sellCar')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <i class="fa fa-car"></i>&nbsp; &nbsp; Sell my Car</a></li>
                <li><a href="{{Route('sellBike')}}" style="padding-left:0 !important;"> &nbsp; &nbsp; <i class="fa fa-motorcycle"></i>&nbsp; &nbsp; Sell my Bike</a></li>
                <li><a href="{{Route('/sellAccessory')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <i class="fa fa-cog"></i>&nbsp; &nbsp; Sell my Accessory</a></li>
                <li><a href="{{Route('/sellTruck')}}" style="padding-left:0 !important;""> &nbsp; &nbsp; <i class="fa fa-truck"></i>&nbsp; &nbsp; Sell my Truck</a></li>
                <li><a href="{{Route('/sellBus')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <i class="fa fa-bus"></i>&nbsp; &nbsp; Sell my Buses</a></li>
                <li><a href="{{Route('/sellFarm')}}" style="padding-left:0 !important;">&nbsp; &nbsp; <img src="{{URL::asset('assets/images/tractor-icon-mobile.png')}}" style="max-width:20px;">&nbsp; Sell my Farm</a></li>
              </ul>
            
            </div>
        <!-- navbar menu -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="hidden-lg hidden-md hidden-sm m-top-10 m-bottom-10">
                 @if (Auth::guest())
                <a href="{{ url('/login') }}" class="btn btn-danger pull-left"><i class="fa fa-user"></i> Sign In</a>
                <a href="{{ url('/register') }}" class="btn btn-danger pull-right"><i class="fa fa-key"></i> Sign Up</a>
           
                    @else
                    <a href="{{URL('/admin')}}" class="btn btn-danger pull-left"><i class="fa fa-user"></i> My Account</a>
                <a href="{{ url('/logout') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Logout</a>
           
                    @endif
                
                <div class="clearfix"></div><hr  style="margin: 8px 0 0 0;"></div>
          <ul class="nav navbar-nav navbar-left" style="margin-right:-26px">
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="{{Route('carIndexPage')}}">New &amp; Used Cars</a>
              <ul class="dropdown-menu">
                <li><a href="{{Route('carIndexPage')}}"><i class="fa fa-search" style="width:10px;"></i> &nbsp; &nbsp;Find Cars for Sale<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find your next car</small></a></li>
                <li><a href="{{Route('carNewPage')}}"><i class="fa fa-eye" style="width:10px;"></i> &nbsp; &nbsp;See New Cars<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find news,reviews & more</small></a></li>
                <li><a href="{{Route('carFeaturedPage')}}"><i class="fa fa-star" style="width:10px;"></i> &nbsp; &nbsp;Featured Cars<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;View our featured cars</small></a></li>
                <li><a href="{{Route('carDealerPage')}}"> <i class="fa fa-male" style="width:10px;"></i> &nbsp; &nbsp;Find Car Dealers<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find Car Dealers in Pakistan</small></a></li>
                <li><a href="{{Route('carCertfiedPage')}}"><i class="fa fa-certificate" style="width:10px;"></i> &nbsp; &nbsp;Key2Cars Certified<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find key2cars certified cars</small></a></li>
              </ul>
                            
            </li>
            
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="{{Route('bike')}}">Bikes</a>
              <ul class="dropdown-menu">
                <li><a href="{{Route('bike')}}"><i class="fa fa-search" style="width:10px;"></i> &nbsp; &nbsp;Find bikes for sale<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;find new & used bikes for sale </small></a></li>
                <li><a href="{{Route('newBike')}}"><i class="fa fa-eye" style="width:10px;"></i> &nbsp; &nbsp;See New Bikes<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find news,reviews & more</small></a></li>
                <li><a href="{{Route('featuredBike')}}"><i class="fa fa-star" style="width:10px;"></i> &nbsp; &nbsp;Featured Bikes<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;View our featured bikes</small></a></li>
                <li><a href="{{Route('bikeDealer')}}"><i class="fa fa-male" style="width:10px;"></i> &nbsp; &nbsp;Find Bike Dealers<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find bike dealers in Pakistan</small></a></li>
              </ul>
            </li> 
            
                
            <li class="dropdown "> <a class="dropdown-toggle" data-toggle="dropdown" href="{{Route('/accessory')}}">Accessories</a>
              <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{Route('/accessory')}}"><i class="fa fa-search" style="width:10px;"></i>&nbsp; &nbsp;Find Accessories<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find new and used parts</small></a></li>
                <li class="dropdown-item"><a href="{{Route('/featuredAccessory')}}"><i class="fa fa-star" style="width:10px;"></i>&nbsp; &nbsp;Featured Accessories<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Browse featured accessories</small></a></li>
                <li class="dropdown-item"><a href="{{Route('/sellAccessory')}}"><i class="fa fa-tag" style="width:10px;"></i>&nbsp; &nbsp;Sell Accessories & Parts<br>
                  <small class="hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Post a free ad</small></a></li>
              </ul>
            </li>
                        
            <li><a href="">Shop</a></li>
            <li><a href="{{Route('/news')}}">News &amp; Reviews</a></li>
            <li><a href="{{Route('hotwheel')}}">Hot Wheels</a></li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Other Vehicles </a>
              <ul class="dropdown-menu">
               <li><a href="{{Route('/farms')}}"><img src="{{URL::asset('assets/images/tractor-icon.png')}}" style="max-width:20px;"> &nbsp;Farm</a></li>
                <li><a href="{{Route('/buses')}}"><i class="fa fa-bus"></i>&nbsp; &nbsp;Buses</a></li>
                <!--<li><a href="{{Route('/machinery')}}"><i class="fa fa-industry"></i>&nbsp; &nbsp;Heavy Machinary</a></li>-->
                <li><a href="{{Route('/trucks')}}"><i class="fa fa-truck"></i>&nbsp; &nbsp;Trucks</a></li>
              </ul>
            </li>
            
            
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
    </div>
  </nav>
  
  <!--            
<div id="fixed-button"><a href="#"><img src="assets/images/sell-car.jpg"></a></div>--> 
  
  
  @yield('content')
  
  
  
  <!-- End off Call to action section --> 
<!--Footer section-->
<div class="clearfix"></div>
<footer class="hidden-xs">
<div class="search-text"> 
       <div class="container">
         <div class="row text-center">
         
           <div class="form">
               <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <form id="search-form" class="form-search form-horizontal">
                    <input type="text" name="newsemail" id="newsemail" class="input-search" placeholder="Email Address">
                    <input type="button" onclick="submitEmail()" class="emailForm btn-search" value="Submit">
                </form>
            </div>
        
          </div>         
       </div>     
	</div>
<section class="nb-footer">
<div class="container">
<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
	<div class="footer-title"><h6 style="color:#FFFFFF">Quick Search</h6></div>
	 <ul class="list-unstyled">
            <li><a href="{{Route('carIndexPage')}}">Find Cars for Sale</a></li>
            <li><a href="{{Route('bike')}}">Find Bikes for Sale</a></li>
            <li><a href="{{Route('/accessory')}}">Find Accessories for Sale</a></li>
            <li><a href="{{Route('/farms')}}">Find Farm</a></li>
            <li><a href="{{Route('/buses')}}">Find Buses for Sale</a></li>
            <li><a href="{{Route('/trucks')}}">Find Trucks for Sale</a></li>
            </ul>
        </div></div>

<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
     <div class="footer-title"><h6 style="color:#FFFFFF">New &amp; Used Cars</h6></div>
	 <ul class="list-unstyled">
            <li><a href="{{Route('carIndexPage')}}">Find Cars for Sale</a></li>
            <li><a href="{{Route('carNewPage')}}">See New Cars</a></li>
            <li><a href="{{Route('carFeaturedPage')}}">Featured Cars</a></li>
            <li><a href="{{Route('carDealerPage')}}">Find Car Dealers</a></li>
            <li><a href="{{Route('carCertfiedPage')}}">Key2Cars Certified</a></li>
            </ul>
        </div></div>


<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
	<div class="footer-title"><h6 style="color:#FFFFFF">Key2Cars.com</h6></div>
	 <ul class="list-unstyled">
     		<li><a href="#">About Us</a></li>
            <li><a href="#">Our Products</a></li>
            <li><a href="#">Payment</a></li>
            <li><a href="#">Advertise With Us</a></li>
            <li><a href="">Key2Cars Shop </a></li>
            </ul>
        </div></div>
        
<div class="col-md-3 col-sm-6">
	<div class="footer-single">
	<div class="dummy-logo">
	<div class=" pull-left ">
        <a href="{{URL('/')}}"><img alt="footer_logo" class="img-responsive" src="{{ URL::asset('assets/images/f-logo.png')}}"/></a>
	</div>
	</div>

	</div>
    
    <!--<div class=" text-right xs-center">
	<ul class="list-inline footer-social">
		<li><a href=""><i class="fa fa-facebook"></i></a></li>
		<li><a href=""><i class="fa fa-twitter"></i></a></li>
		<li><a href=""><i class="fa fa-youtube-play"></i></a></li>
		<li><a href=""><i class="fa fa-google-plus"></i></a></li>
		<li><a href=""><i class="fa fa-insta"></i></a></li>
	</ul>
</div>-->

<div><div class="clearfix"></div>

          <h6 style="color:#FFFFFF ; margin-top:25px;">&nbsp;Follow Us</h6>
          <ul class="list-unstyled list-inline networks">
            <li>
              <a href="" class="twitter" rel="nofollow" target="_blank" title="Follow Us On Twitter"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <a href="https://web.facebook.com/key2car"  rel="nofollow" target="_blank" title="Follow Us On Facebook"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
              <a href="" class="googleplus" rel="me" target="_blank" title="Follow Us On Google Plus"><i class="fa fa-google-plus"></i></a>
            </li>
            <!--<li>
              <a href="" class="pinterest" rel="nofollow" target="_blank" title="Follow Us On Pinterest"><i class="fa fa-pinterest"></i></a>
            </li>-->
            <li>
              <a href="" class="instagram" rel="nofollow" target="_blank" title="Follow Us On Instagram"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
              <a href="" class="youtube" rel="me" target="_blank" title="Follow Us On Youtube"><i class="fa fa-youtube"></i></a>

            </li>
          </ul>
        </div>
</div>


<div class="clearfix"></div>
<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
	 <div class="footer-title"><h6 style="color:#FFFFFF">Featured Ads</h6></div>
	 <ul class="list-unstyled">
            <li><a href="{{Route('carFeaturedPage')}}">Cars Featured Ads</a></li>
            <li><a href="{{Route('featuredBike')}}">Bikes Featured Ads</a></li>
            <li><a href="{{Route('/featuredAccessory')}}">Accessories Featured Ads</a></li>
            <li><a href="{{Route('/trucks')}}">Trucks Featured Ads</a></li>
            <li><a href="{{Route('/buses')}}">Buses Featured Ads</a></li>
            <li><a href="{{Route('/farms')}}">Farm Featured Ads</a></li>
            </ul>
        </div>
</div>

<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
	 <div class="footer-title"><h6 style="color:#FFFFFF">New &amp; Used Bikes</h6></div>
	 <ul class="list-unstyled">
            <li><a href="{{Route('bike')}}">Find Bikes for Sale</a></li>
            <li><a href="{{Route('newBike')}}">See New Bikes</a></li>
            <li><a href="{{Route('featuredBike')}}">Featured Bikes</a></li>
            <li><a href="{{Route('bikeDealer')}}">Find Bike Dealers</a></li>
            </ul>
        </div>
</div>

<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
	<div class="footer-title"><h6 style="color:#FFFFFF">Accessories &amp; Parts</h6></div>
	 <ul class="list-unstyled">
            <li><a href="{{Route('/accessory')}}">Find Accessory for Sale</a></li>
            <li><a href="{{Route('/featuredAccessory')}}">Featured Accessories</a></li>
            <li><a href="{{Route('/sellAccessory')}}">Sell Accessory</a></li>
           
            </ul>
        </div></div>


</div>

</section>	

<section class="nb-copyright">
<div class="container">
<div class="row">
<div class=" copyrt xs-center center-block text-center">
	2016-2018 © Key2Cars pvt (ltd). All Rights Reserved. <a href="">Terms &amp; Conditions</a> | <a href="">Privacy Policy</a>
</div>

</div>
</div>
</section>
</footer>


<footer class="hidden-lg hidden-md hidden-sm">
 <div class="search-text" style="border-bottom:1px solid #393939; padding:20px 0; margin:0"> 
       <div class="container">
         <div class="row text-center">
         
           <div class="form">
               <h4 style="font-weight:400;">SIGN UP TO OUR NEWSLETTER</h4>
                <form id="search-form" class="form-search form-horizontal">
                    <input type="text" id='newsemail' nmae="email" class="input-search" placeholder="Email Address">
                    <input type="button" onclick="submitEmail()" class="emailForm btn-search" value="Submit">
                </form>
            </div>
        
          </div>         
       </div>     
	</div>
	

<section class="nb-copyright">
<div class="container">
<div class="row " style="text-align:center;">
<div class="copyrt xs-center text-center"  style="border-bottom:1px solid #393939; padding:20px 0; margin:0; font-size:15px">
	<a href="">About</a> | <a href="">Products</a> |<a href="">Privacy </a> | <a href="">Terms</a>
</div>

<div class="copyrt xs-center text-center"  style="border-bottom:1px solid #393939; padding:20px 0; margin:auto; display:inline-block">
<div class="col-xs-12 text-right xs-center ">
	<ul class="list-inline footer-social">
		<li><a href="https://web.facebook.com/key2car" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href=""><i class="fa fa-twitter"></i></a></li>
		<li><a href=""><i class="fa fa-youtube-play"></i></a></li>
		<li><a href=""><i class="fa fa-google-plus"></i></a></li>
		<li><a href=""><i class="fa fa-skype"></i></a></li>
	</ul>
</div>
</div>

<div class="col-xs-12 copyrt xs-center text-center"  style="border-bottom:1px solid #393939; padding:20px 0; margin:0; ">
	2016-2018 © Key2Cars pvt (ltd). All Rights Reserved. 
</div>

<!--<div class="col-sm-6 text-right xs-center">
	<ul class="list-inline footer-social">
		<li><a href="https://web.facebook.com/key2car"><i class="fa fa-facebook"></i></a></li>
		<li><a href=""><i class="fa fa-twitter"></i></a></li>
		<li><a href=""><i class="fa fa-youtube-play"></i></a></li>
		<li><a href=""><i class="fa fa-google-plus"></i></a></li>
		<li><a href=""><i class="fa fa-skype"></i></a></li>
	</ul>
</div>-->
</div>
</div>
</section>
</footer>

<!-- End off Footer section --> 





<!-- JS includes --> 

@yield('jsblock')



<script>
    
    function submitEmail(){
           
        
        var data = {'email':$("#newsemail").val()};
    $.ajax({
            url:'/submitEmail',
            type:'GET',
            data:data,
            success:function(data){
                console.log(data);
                 if($.isEmptyObject(data.error)){
                       swal('Congratulation','You are Successfully subcribe','success');
                       window.location = "{{ url('/') }}";
	                }else{
	       
                  swal('OOPS',data.error[0],'error');
                                
	                }
            }
        });
        
        
    }
    
</script>
    
</body>
</html>
