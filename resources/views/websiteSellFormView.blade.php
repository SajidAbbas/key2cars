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

<body class="body-reletive" data-spy="scroll" data-target=".navbar-collapse">

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
                <li><a style="padding: 7px;display: block;" href="https://web.facebook.com/key2car" target="_blank"><i class="fa fa-facebook "></i></a></li>
                <li><a style="padding: 7px;display: block;" href="#"><i class="fa fa-twitter "></i></a></li>
                <li><a style="padding: 7px;display: block;" href="#"><i class="fa fa-linkedin "></i></a></li>
                <li><a style="padding: 7px;display: block;" href="#"><i class="fa fa-google-plus "></i></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-xs-9">
            <div class="navbar-socail text-right sm-text-center">
             
              <ul class="list-inline" style="margin-bottom:0;">
                
                @if (Auth::guest())
                        <li><a  style="padding: 7px;display: block;" href="{{ url('/login') }}">Sign In</a></li>
                        
                        |
                        
                        <li><a style="padding: 7px;display: block;" href="{{ url('/register') }}">Sign Up</a></li>
                    @else
                       <li><a style="padding: 7px;display: block;" href="{{URL('/admin')}}">My Account</a></li>
                |
                    <li><a style="padding: 7px;display: block;" href="">{{ Auth::user()->name }}</a></li>
                    |
                        <li><a style="padding: 7px;display: block;" href="{{ url('/logout') }}">Logout</a></li>
                          
                           
                                
                        
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
         
       
        
        
        
      </div>
    </div>
    
   
    

  </nav>
  
  <!--            
<div id="fixed-button"><a href="#"><img src="assets/images/sell-car.jpg"></a></div>--> 
  
  
  @yield('content')
  
  
  
  <!-- End off Call to action section --> 
<!--Footer section-->
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
<div class="row">
<div class="col-md-3 col-sm-6">
	<div class="footer-single">
	
	<div class="dummy-logo">
	<div class=" pull-left ">
		
        <a href="{{URL('/')}}"><img alt="footer_logo" class="img-responsive" src="{{ URL::asset('assets/images/f-logo.png')}}"/></a>
	</div>
	</div>

		<p>Post a Free Ad Of Cars, Motorcycles, Farm, Trucks, Buses, Heavy Machinery and Parts. Pakistan's Biggest online automotive Website. </p>
		<a href="" class="btn btn-footer">Read More</a>
	</div>
</div>

<div class="col-md-3 col-sm-6">
	<div class="footer-single useful-links">
	 <div class="footer-title"><h2>Important Links</h2></div>
	 <ul class="list-unstyled">
            <li><a href="{{Route('carFeaturedPage')}}">Featured Cars</a></li>
            <li><a href="{{Route('featuredBike')}}">Featured Bikes</a></li>
            <li><a href="{{Route('/accessory')}}">Accessories </a></li>
            <li><a href="">Shops </a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="{{Route('/trucks')}}">Trucks &amp; Farm </a></li>
            </ul>
        </div>
</div>
<div class="clearfix visible-sm"></div>

<div class="col-md-3 col-sm-6">
	
	<div class="col-sm-12 left-clear right-clear footer-single footer-project">
		<div class="footer-title"><h2>Latest Key2Car Updates</h2></div>
		

	</div>

</div>

<div class="col-md-3 col-sm-6">
	<div class="footer-single">
		<div class="footer-title"><h2>Contact Information</h2></div>
		<address>
			Exagic Palaza, Near Clock Tower, Phase7 Bahria Tow Rawalpindi, Pakistan.   <br><br>

			<i class="fa fa-phone"></i>  987 654 3210 <br>
			<i class="fa fa-fax"></i> 012 123 2345<br>
			<i class="fa fa-envelope"></i> info@example.com<br>
		</address>					
	</div>
</div>

</div>
</div>
</section>	

<section class="nb-copyright">
<div class="container">
<div class="row">
<div class="col-sm-6 copyrt xs-center" style="    color: #aaaaaa;">
	2017 © Key2Cars. All Rights Reserved. <a href="">Terms &amp; Conditions</a> | <a href="">Privacy Policy</a>
</div>
<div class="col-sm-6 text-right xs-center">
	<ul class="list-inline footer-social">
		<li><a href="https://web.facebook.com/key2car" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href=""><i class="fa fa-twitter"></i></a></li>
		<li><a href=""><i class="fa fa-youtube-play"></i></a></li>
		<li><a href=""><i class="fa fa-google-plus"></i></a></li>
		<li><a href=""><i class="fa fa-skype"></i></a></li>
	</ul>
</div>
</div>
</div>
</section>
</footer>

<!-- End off Footer section --> 

<footer class="hidden-lg hidden-md hidden-sm">
 <div class="search-text" style="border-bottom:1px solid #393939; padding:20px 0; margin:0"> 
       <div class="container">
         <div class="row text-center">
         
           <div class="form">
               <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <form id="search-form" class="form-search form-horizontal">
                    <input type="text" nmae="email" class="input-search" placeholder="Email Address">
                    <input type="button" onclick="submitEmail()" class="emailForm btn-search" value="Submit">
                </form>
            </div>
        
          </div>         
       </div>     
	</div>
	

<section class="nb-copyright">
<div class="container">
<div class="row">
<div class="col-xs-12 copyrt xs-center"  style="border-bottom:1px solid #393939; padding:20px 0; margin:0">
	<a href="">Terms &amp; Conditions</a> | <a href="">Privacy Policy</a>
</div>

<div class="col-xs-12 copyrt xs-center"  style="border-bottom:1px solid #393939;  padding:20px 0; margin:0">
	2017 © Key2Cars. All Rights Reserved. 
</div>

<div class="col-sm-6 text-right xs-center">
	<ul class="list-inline footer-social">
		<li><a href="https://web.facebook.com/key2car"><i class="fa fa-facebook"></i></a></li>
		<li><a href=""><i class="fa fa-twitter"></i></a></li>
		<li><a href=""><i class="fa fa-youtube-play"></i></a></li>
		<li><a href=""><i class="fa fa-google-plus"></i></a></li>
		<li><a href=""><i class="fa fa-skype"></i></a></li>
	</ul>
</div>
</div>
</div>
</section>
</footer>



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
