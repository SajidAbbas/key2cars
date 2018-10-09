<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        @yield('title')
       
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        
      

        @yield('cssblock')





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
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->

         <!-- Navigation -->
            <nav class="navbar navbar-default bootsnav">
                <div class="navbar-top bg-blue" style="margin-bottom:5px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="navbar-callus text-left sm-text-center">
                                    <ul class="list-inline select" style="margin-bottom:0;">
                                        <li>
                                        <select style="width:100%;height:30px;" id="select" >
                                        <option value="English">English</option>
                                        <option value="Urdu">Urdu</option>
                                        <option value="Chinies">Chinies</option>
                                        </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="navbar-socail text-right sm-text-center">
                                    <ul class="list-inline" style="margin-bottom:0;">
                                        <li><a href="">My Account</a></li>|
                                        <li><a href="">Sign Up</a></li>|
                                        <li><a href="">Log In</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="container">
                <div class="row">
                <div class="pull-left"><a href="index.html"><img class="w-80" alt="logo" src="{{ URL::asset('images/logo.png') }}"/></a></div>
                <div class="pull-right">
                <ul class="list-inline" id="logo-right">
                
                <li><a href="#"><img class="w-80" src="{{ URL::asset('images/facebook.png') }}"/></a></li>
                <li><a href="#"><img class="w-80" src="{{ URL::asset('images/Google-Plus.png') }}"/></a></li>
                <li><a href="#"><img class="w-80" src="{{ URL::asset('images/Linkedin.png') }}"/></a></li>
                <li><a href="#"><img class="w-80" src="{{ URL::asset('images/Twitter.png') }}"</a></li>
                <li><a class="btn-add" href="{{route('addNewCar')}}"><img class="w-80"  src="{{ URL::asset('images/btn-post.png') }}"/></a></li>
                </ul>
                
                </div>
                </div>
                
                </div>

                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->


                <div class="bg-blue ">
                <div class="container"> 
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div> 

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- End Header Navigation -->

                     <!-- navbar menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" style="margin-right : -26px;">
                            
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Used Cars </a>
                              <ul class="dropdown-menu">
                                <li><a href="{{route('usedCar')}}"><i class="fa fa-search"></i> &nbsp; &nbsp;Find Used cars<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find your next car</small></a></li>
                                <li><a href="#"><i class="fa fa-star"></i> &nbsp; &nbsp;Featured Used cars<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Browse your next car</small></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> &nbsp; &nbsp;Sell your car<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Post a free ad & sell your car faster</small></a></li>
                                <li><a href="#"><i class="fa fa-book"></i> &nbsp; &nbsp;Used car dealers<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find used cars dealers in Pakistan</small></a></li>
                                <li><a href="#"><i class="fa fa-certificate"></i> &nbsp; &nbsp;Key2cars certified<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find key2cars certified cars</small></a></li>
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">New Cars</a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-search"></i> &nbsp; &nbsp;Find New cars<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find new cars dealers</small></a></li>
                                <li><a href="#"><i class="fa fa-columns"></i> &nbsp; &nbsp;Car Comparison<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Compare cars & find their difference</small></a></li>
                              </ul>
                            </li>
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bikes</a>
                              <ul class="dropdown-menu">
                                 <li><a href="#"><i class="fa fa-search"></i> &nbsp; &nbsp;Find used bikes<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find your dreamed bike</small></a></li>
                                <li><a href="#"><i class="fa fa-star"></i>&nbsp; &nbsp;Featured used bikes<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Browse our featured bike</small></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>&nbsp; &nbsp;Sell your bike<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Post a free ad & sell your bike faster</small></a></li>
                              </ul>
                            </li>
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Accessories</a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-search"></i>&nbsp; &nbsp;Find Accessories<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Find new & used cars parts</small></a></li>
                                <li><a href="#"><i class="fa fa-star"></i>&nbsp; &nbsp;Featured Accessories<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Browse featured accessories</small></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>&nbsp; &nbsp;Sell Accessories/Parts<br><small>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Browse featured accessories</small></a></li>
                              </ul>
                            </li>                  
                            <li><a href="#shop">Shop</a></li>
                            <li><a href="#features">Forum</a></li>
                            <li><a href="#business">Auto News</a></li>
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Others
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-truck"></i>&nbsp; &nbsp;Trucks</a></li>
                                <li><a href="#"><i class="fa fa-truck"></i>&nbsp; &nbsp;Farm</a></li>
                                <li><a href="#"><i class="fa fa-industry"></i>&nbsp; &nbsp;Heavy Machinary</a></li>
                                <li><a href="#"><i class="fa fa-bus"></i>&nbsp; &nbsp;Buses</a></li>
                              </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div> 
                </div>

            </nav> <!--End off Navigation -->
            <div class="content">
            
            <!--banner Sections-->        
            
           @yield('content')

</div>
<!--Footer section-->
             <!--Footer section-->
           <div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
              <div class="col-md-3">
                <ul class="nomargin footer-links list-unstyled" id="footer-Make">
                  <li><h5>Cars By Make</h5></li>                  
                  <li><a href="#" id="footer_Daihatsu" title="Daihatsu Cars for Sale">Daihatsu Cars for Sale</a></li>
                  <li><a href="#" id="footer_Honda" title="Honda Cars for Sale">Honda Cars for Sale</a></li>                  
                  <li><a href="#" id="footer_Hyundai" title="Hyundai Cars for Sale">Hyundai Cars for Sale</a></li>                  
                  <li><a href="#" id="footer_Mitsubishi" title="Mitsubishi Cars for Sale">Mitsubishi Cars for Sale</a></li>
                  <li><a href="#" id="footer_Suzuki" title="Suzuki Cars for Sale">Suzuki Cars for Sale</a></li>
                  <li><a href="#" id="footer_Toyota" title="Toyota Cars for Sale">Toyota Cars for Sale</a></li>
                  <li><a href="#" id="footer_BMW" title="BMW Cars for Sale">BMW Cars for Sale</a></li>
                  <li><a href="#" id="footer_Nissan" title="Nissan Cars for Sale">Nissan Cars for Sale</a></li>
                  <li><a href="#" id="footer_Mercedes" title="Mercedes Cars for Sale">Mercedes Cars for Sale</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <ul class="nomargin footer-links list-unstyled" id="footer-City">
                  <li><h5>Cars By City</h5></li>
                    <li><a href="#" id="footer_Lahore" title="Cars for Sale in Lahore">Cars in Lahore</a></li>
                    <li><a href="#" id="footer_Karachi" title="Cars for Sale in Karachi">Cars in Karachi</a></li>
                    <li><a href="#" id="footer_Islamabad" title="Cars for Sale in Islamabad">Cars in Islamabad</a></li>
                    <li><a href="#" id="footer_Rawalpindi" title="Cars for Sale in Rawalpindi">Cars in Rawalpindi</a></li>
                    <li><a href="#" id="footer_Peshawar" title="Cars for Sale in Peshawar">Cars in Peshawar</a></li>
                    <li><a href="#" id="footer_Multan" title="Cars for Sale in Multan">Cars in Multan</a></li>
                    <li><a href="#" id="footer_Faisalabad" title="Cars for Sale in Faisalabad">Cars in Faisalabad</a></li>
                    <li><a href="#" id="footer_Gujranwala" title="Cars for Sale in Gujranwala">Cars in Gujranwala</a></li>
                    <li><a href="#" id="footer_Bahawalpur" title="Cars for Sale in Bahawalpur">Cars in Bahawalpur</a></li>
                </ul>
              </div>

          <div class="col-md-3">
            <ul class="nomargin footer-links list-unstyled">
              <li><h5>Explore Key2Cars</h5></li>
              
              <li><a href="#" title="Used Cars">Used Cars</a></li>
              
              <li><a href="#" title="Used Bikes">Used Bikes</a></li>
              
              <li><a href="#" title="New Cars">New Cars</a></li>
              
              <li><a href="#" rel="nofollow" title="Cool Rides">Cool Rides</a></li>
              
              <li><a href="#" rel="nofollow" title="Membership Cards">Membership Cards</a></li>

              <li><a href="#" rel="nofollow" title="Forums">Forums</a></li>

              <li><a href="#" rel="nofollow" title="Key2Cars Autoshow">Autoshow</a></li>

              <li><a href="#" title="Sitemap">Sitemap</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nomargin footer-links list-unstyled">

              <li><h5>key2cars.com</h5></li>

              <li><a href="#" rel="nofollow" title="About key2cars.com">About key2cars.com</a></li>
              
              <li><a href="#" rel="nofollow" title="Our Products">Our Products</a></li>

              <li><a href="#"nofollow" title="Advertise With Us">Advertise With Us</a></li>

              <li><a href="#" rel="nofollow" title="How To Pay">How To Pay</a></li>

              <li><a href="#" rel="nofollow" title="FAQs">FAQs</a></li>

              <li><a href="#" rel="nofollow" title="k2c Shop">K2C Shop</a></li>

              <li><a href="#" rel="nofollow" title="Careers">Careers</a></li>

              <li><a href="#" rel="nofollow" title="Contact Us">Contact Us</a></li>

            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 footer-social">
        <form id="subscribe_newsletter" class="form-horizontal newsletter-subscription">
          <h5>Subscribe to our Newsletter</h5>
          <div id="newsletter-message" style="display:none; font-size: 14px; color: #999999;"></div>
          <div class="form-fields">
            <input type="text" id="email" name="email" placeholder="name@email.com" style="width: 100%;" />
            <button type="submit" class="btn btn-xs">Subscribe</button>
            <div class="error-message" style="color:red;"></div>
          </div>
        </form>
        <div>

          <h5>Follow Us</h5>
          <ul class="list-unstyled list-inline networks">
            <li>
              <a href="#" class="twitter" rel="nofollow" target="_blank" title="Follow Us On Twitter"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <a href="#" class="facebook" rel="nofollow" target="_blank" title="Follow Us On Facebook"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
              <a href="#" class="googleplus" rel="nofollow" target="_blank" title="Follow Us On Google Plus"><i class="fa fa-google-plus"></i></a>
            </li>
            <li>
              <a href="#" class="instagram" rel="nofollow" target="_blank" title="Follow Us On Instagram"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
              <a href="#" class="youtube" rel="nofollow" target="_blank" title="Follow Us On Youtube"><i class="fa fa-youtube"></i></a>

            </li>
          </ul>
        </div>
      </div>
    </div>
    
        <div class="row mt20">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-3">
                <ul class='nomargin footer-links list-unstyled' id='footer-category'><li><h5>Cars by Category</h5></li><li><a href="#" title="Jeep for sale in Pakistan">Jeep</a></li><li><a href="#" title="Sports Cars for sale in Pakistan">Sports Cars</a></li><li><a href="#" title="Hybrid Cars for Sale in Pakistan">Hybrid Cars</a></li><li><a href="#" title="Japanese Used Cars for Sale in Pakistan">Japanese Cars</a></li><li><a href="#" title="Luxury Cars for sale in Pakistan">Luxury Cars</a></li><li><a href="#" title="Imported Cars for Sale in Pakistan">Imported Cars</a></li><li><a href="#" title="Automatic Cars for Sale in Pakistan">Automatic Cars</a></li><li><a href="#" title="Diesel Cars for Sale in Pakistan">Diesel Cars</a></li></ul>
              </div>
              <div class="col-md-3">
                <ul class='nomargin footer-links list-unstyled' id='footer-body_type'><li><h5>Cars by Body Type</h5></li><li><a href="#" title="Hatchback Cars for sale in Pakistan">Hatchback Cars</a></li><li><a href="#" title="Sedan Cars for sale in Pakistan">Sedan Cars</a></li><li><a href="#" title="SUV Cars for sale in Pakistan">SUV</a></li><li><a href="#" title="Mini Van Cars for sale in Pakistan">Mini Van</a></li><li><a href="#" title="Micro Van Cars for sale in Pakistan">Micro Van</a></li><li><a href="#" title="Crossover Cars for sale in Pakistan">Crossover</a></li><li><a href="#" title="Station Wagon Cars for sale in Pakistan">Station Wagon Cars</a></li><li><a href="used-cars/4x4/107784.html" title="4x4 Cars for sale in Pakistan">4x4</a></li></ul> 
              </div>
              <div class="col-md-3">
                <ul class='nomargin footer-links list-unstyled' id='footer-color'><li><h5>Cars by Color</h5></li><li><a href="#" title="White Cars for sale in Pakistan">White Cars</a></li><li><a href="#" title="Silver Cars for sale in Pakistan">Silver Cars</a></li><li><a href="#" title="Black Cars for sale in Pakistan">Black Cars</a></li><li><a href="#" title="Grey Cars for sale in Pakistan">Grey Cars</a></li><li><a href="#" title="Blue Cars for sale in Pakistan">Blue Cars</a></li><li><a href="#" title="Red Cars for sale in Pakistan">Red Cars</a></li><li><a href="#" title="Green Cars for sale in Pakistan">Green Cars</a></li><li><a href="#" title="Gold Cars for sale in Pakistan">Gold Cars</a></li></ul>
              </div>                
            </div>
          </div>
        </div>

    <hr class="dark" />
    <div class="mobile-app-badge text-center">
        <h4><a href="#" class="generic-white">Download Mobile Apps</a></h4>
        <ul class="nav nav-pills nav-app-badges">
          <li><a href="#" rel="nofollow" target="_blank" title="Key2Cars iOS App"><i class="fa fa-apple"></i></a></li>
          <li><a href="#" rel="nofollow" target="_blank" title="Key2Cars Android App"><i class="fa fa-play"></i></a></li>
          <li><a href="#" rel="nofollow" target="_blank" title="Key2Cars Windows App"><i class="fa fa-windows"></i></a></li>
        </ul>
    </div>

    <hr class="dark" />

    <div class="copyright footer-links mt30">

        <ul class="list-unstyled list-inline text-center our-partners">
          <li class="title">OUR PARTNERS:</li>
          <li><a href="http://exagic.com/" target="_blank">Exagic</a></li>
          <li><a href="http://exagic.com/" target="_blank">Exagic</a></li>
          <li><a href="http://exagic.com/" target="_blank">Exagic</a></li>
        </ul>

      Copyright &copy 2003 - 2017 Key2Cars (Pvt) Ltd. - All Rights Reserved.<br />
      <a href="main/terms.html" rel="nofollow" title="Terms of Service">Terms of Service</a>&nbsp;|&nbsp;
      <a href="privacy-policy.html" rel="nofollow" title="Privacy Policy">Privacy Policy</a>
    </div>

    <p class="copyright mt5">
            Reproduction of material from any Key2Cars.com pages without permission is strictly prohibited.
    </p>
  </div>
 </div>
          <!-- End off Footer section -->





        </div>

        <!-- JS includes -->
        
       @yield('jsblock')

    </body>
</html>
