<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Key2Cars</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ URL::asset('images/favicon.png') }}">

        <!--Google Font link-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

        
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        

        <!-- xsslider slider css -->

     <!--  <link rel="stylesheet" href="{{ URL::asset('css/slick/slick.css') }}">
        
        <link rel="stylesheet" href="{{ URL::asset('css/slick/slick-theme.css') }}">-->
         <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}"> 
        <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootsnav.css') }}">



        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}" />

        <script src="{{ URL::asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
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
                                    <ul class="list-inline select">
                                        <li>
                                        <select>
                                        <option value="English">English</option>
                                        <option value="Urdu">Urdu</option>
                                        <option value="Chinies">Chinies</option>
                                        </select>
                                        </li>
                                        <li>Curency: &nbsp;
                                         <select>
                                        <option value="USD">USD</option>
                                        <option value="PKR">PKR</option>
                                        <option value="Takka">Takka</option>
                                        </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="navbar-socail text-right sm-text-center">
                                    <ul class="list-inline">
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
                <li><a class="btn-add" href="#"><img class="w-80" src="{{ URL::asset('images/btn-post.png') }}"/></a></li>
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
                        <ul class="nav navbar-nav navbar-right">
                            
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Used Car </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Find Used cars</a></li>
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Featured Used cars</a></li>
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Sell your car</a></li>
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Used car dealers</a></li>
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Key2cars certified</a></li>
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">New Car</a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Find New cars</a></li>
                                <li><a href="#"><i class="fa fa-car"></i> &nbsp; &nbsp;Car Comparison</a></li>
                              </ul>
                            </li>
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bikes</a>
                              <ul class="dropdown-menu">
                                 <li><a href="#"><i class="fa fa-motorcycle"></i> &nbsp; &nbsp;Find used bikes</a></li>
                                <li><a href="#"><i class="fa fa-motorcycle"></i>&nbsp; &nbsp;Featured used bikes</a></li>
                                <li><a href="#"><i class="fa fa-motorcycle"></i>&nbsp; &nbsp;Sell your bike</a></li>
                              </ul>
                            </li>
                            
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Accessories</a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-cogs"></i>&nbsp; &nbsp;Find Accessories</a></li>
                                <li><a href="#"><i class="fa fa-star-o"></i>&nbsp; &nbsp;Featured</a></li>
                              </ul>
                            </li>
	               
                            <li><a href="#features">Forum</a></li>
                            <li><a href="#business">Motors News</a></li>
                            
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
            
           <div style="position:relative; overflow:hidden" class="search-background">
            <img src="{{URL ::asset('images/banner-957x374.jpg') }}">
        
            <div class="well-searchbox">
                <form class="form-horizontal" role="form">
                    <h2>New &amp; Used Cars</h2>

                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="quick-search" placeholder="Country">
                                <option value="">Car Make</option>
                                <option value="">Car Make 2</option>
                                <option value="">Car Make 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="quick-search" placeholder="Province">
                                <option value="">Car Model</option>
                                <option value="">Car Model 2</option>
                                <option value="">Car Model 3</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="quick-search" placeholder="Category">
                                <option value="">Price</option>
                                <option value="">Les Than 20 Lac</option>
                                <option value="">More Than 30 Lac</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="quick-search" placeholder="City">
                                <option value="">City</option>
                                <option value="">Lahore</option>
                                <option value="">Karachi</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="col-sm-12">
                    <div class="row">
                        <button style="width:100%;" type="submit" class="btn btn-primary">Search</button>
                    </div>
                    </div>
                </form>
            </div>
            </div>
            
<!--            
<div id="fixed-button"><a href="#"><img src="assets/images/sell-car.jpg"></a></div>-->

            <!--Ads Section-->
            <section id="features" class="features bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="main_features fix roomy-70">
                            <div class="col-sm-10">
                              <!--  <div class="features_item sm-m-top-30 bg-white">
                                    
                                    <div class="f_item_text">
                                        <ul class="ad-listing">
                                        <li><span style="font-weight:bold; color:#223b7b;"><img src="assets/images/listing.jpg"> &nbsp;Post an Ad for Free:</span> Post your car’s ad for free in 30 seconds.</li>
                                        <li><span style="font-weight:bold; color:#223b7b;"><img src="assets/images/listing.jpg"> &nbsp;Thousands of genuine buyers:</span> Get authentic offers from verified buyers.</li>
                                        <li><span style="font-weight:bold; color:#223b7b;"><img src="assets/images/listing.jpg"> &nbsp;Sell Faster: </span>Sell your car faster than others at a better price.</li>
                                        </ul>
                                    </div>
                                    <div class="pull-right"><a href="#"><img class="img-responsive" src="assets/images/sell-car.jpg"/></a></div>
                                </div>-->
                              <div class="row"><a href="#"><img style="width:100%;" src="{{URL:: asset('images/ad.gif') }}"></a></div>  
                                
                                
                            </div>
                            
                            <div class="col-sm-2 ">
                                <div class="features_item ad-certified-car bg-white">
                                    
                                        <p class="text-center"><a href="#" class="text-center "> <img class="img-responsive" src="{{URL:: asset('images/add-certified.jpg') }}"><br>
                                        View Certified Cars
                                        </a></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off ads Section-->
            
          <!--  Featured Cars Section-->
            <section id="product" class="product">
                <div class="container">
                    <div class="main_product roomy-40">
                        <div class="head_title text-center fix">
                            <h2 class="text-uppercase">Featured Cars</h2>
                        </div>

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox" style="width:102%">
                                <div class="item active">
                                    <div class="container">
                                        <div class="">
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img class="img-responsive" src="{{ URL:: asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img class="img-responsive" src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img class="img-responsive" src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img class="img-responsive" src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img src="{{URL ::asset('images/Car1.jpg') }}" alt="" />
                                                       
                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>Toyota Corolla</h3>
                                                        <h6>RS: <span style="color:#223b7b">18,1200</span></h6>
                                                        <h6>Condition: Used</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; Islamabad</div>
                                                        <a href="" class="btn-more">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section>
          <!-- End off Featured Cars Section-->

            <!--Featured Car ad Section-->
            <section id="business" class="business bg-grey roomy-70">
                <div class="container">
                    <div class="row">
                        <div class="main_business">
                            <div class="col-md-6">
                                <div class="business_slid">
                                    <div class="slid_shap bg-grey"></div>
                                    <div class="business_items text-center">
                                        <div class="business_item">
                                            <div class="business_img">
                                                <img src="{{ URL ::asset('images/about-img1.jpg') }}" alt="" />
                                            </div>
                                        </div>

                                        <div class="business_item">
                                            <div class="business_img">
                                                <img src="{{ URL ::asset('images/about-img1.jpg') }}" alt="" />
                                            </div>
                                        </div>

                                        <div class="business_item">
                                            <div class="business_img">
                                                <img src="{{ URL ::asset('images/about-img1.jpg') }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase">Naver buy a Used Car Without CARSURE</h2>
                                    <ul>
                                        <li><i class="fa fa-arrow-circle-right"></i> 2016 Model in Red color</li>
                                        <li><i class="fa  fa-arrow-circle-right"></i> 8/10 Condition Engine</li>
                                        <li><i class="fa  fa-arrow-circle-right"></i> Luxury Interior and Cooling</li>
                                    </ul>
                                    <p class="m-top-20">Our Carsure Experts Inspect the Car on Over 200 Checkpoints so
You Get Complete Satisfaction and Peace of mind before Buying.</p>

                                    <div class="business_btn">
                                        <a href="" class="btn btn-primary m-top-20">SCHEDULE CARSURE INSPECTION</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End off Featured Car ad section -->


            <!--Featured Dealers section-->
            <section id="product" class="product">
                <div class="container">
                    <div class="main_product roomy-80">
                        <div class="head_title text-center fix">
                            <h2 class="text-uppercase">Featured Dealers</h2>
                        </div>

                        <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic2" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic2" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img1.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img1.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img2.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img2.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img3.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img3.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img4.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img4.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img1.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img1.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img2.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img2.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img3.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img3.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img4.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img4.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img1.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img1.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img2.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img2.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img3.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img3.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL :: asset('images/work-img4.jpg') }}" alt="" />
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL :: asset('images/work-img4.jpg') }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Featured Dealers section -->

            <!--Call to  action section-->
            <section id="action" class="action bg-primary roomy-40">
                <div class="container">
                    <div class="row">
                        <div class="maine_action">
                            <div class="col-md-8">
                                <div class="action_item text-center">
                                    <h2 class="text-white text-uppercase">Post Your New Ad Here</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="action_btn text-left sm-text-center">
                                    <a href="" class="btn btn-default">Post New Ad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End off Call to  action section -->

</div>
<!--Footer section-->
            <footer id="contact" class="footer bg-black p-top-80">
                
                <div class="container">
                    <div class="row">
                        <div class="widget_area">
                            <div class="col-md-3">
                                <div class="widget_item widget_about">
                                    <h5 class="text-white">About Us</h5>
                                    <p class="m-top-20">Lorem ipsum dolor sit amet consec tetur adipiscing elit 
                                        nulla aliquet pretium nisi in cursus 
                                        maecenas nec eleifen.</p>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-location-arrow"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Location</h6>
                                            <p>
                                                123 suscipit ipsum nam auctor
                                                mauris dui, ac sollicitudin mauris,
                                                Bandung</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-phone"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Phone :</h6>
                                            <p>+1 2345 6789</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-envelope-o"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Email Address :</h6>
                                            <p>youremail@mail.com</p>
                                        </div>
                                    </div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-3">
                                <div class="widget_item widget_latest sm-m-top-50">
                                    <h5 class="text-white">Latest News</h5>
                                    <div class="widget_latst_item m-top-30">
                                        <div class="item_icon"><img src="{{ URL::asset('images/ltst-img-1.jpg') }}" alt="" /></div>
                                        <div class="widget_latst_item_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                            <a href="">21<sup>th</sup> July 2016</a>
                                        </div>
                                    </div>
                                    <div class="widget_latst_item m-top-30">
                                        <div class="item_icon"><img src="{{ URL::asset('images/ltst-img-2.jpg') }}" alt="" /></div>
                                        <div class="widget_latst_item_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                            <a href="">21<sup>th</sup> July 2016</a>
                                        </div>
                                    </div>
                                    <div class="widget_latst_item m-top-30">
                                        <div class="item_icon"><img src="{{ URL::asset('images/ltst-img-3.jpg') }}" alt="" /></div>
                                        <div class="widget_latst_item_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                            <a href="">21<sup>th</sup> July 2016</a>
                                        </div>
                                    </div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-3">
                                <div class="widget_item widget_service sm-m-top-50">
                                    <h5 class="text-white">Important Links</h5>
                                    <ul class="m-top-20">
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i>Delivery Info</a></li>
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i>Terms &amp; Conditions</a></li>
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> Afiliates</a></li>
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> Brands</a></li>
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> Wish List</a></li>
                                    </ul>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-3">
                                <div class="widget_item widget_newsletter sm-m-top-50">
                                    <h5 class="text-white">Newsletter</h5>
                                    <form class="form-inline m-top-30">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter you Email">
                                            <button type="submit" class="btn text-center"><i class="fa fa-arrow-right"></i></button>
                                        </div>

                                    </form>
                                    <div class="widget_brand m-top-40">
                                        <a href="index.html" class="text-uppercase"> <img class="img-responsive" src="{{URL:: asset('images/f-logo.png') }}"></a>
                                    </div>
                                    <ul class="list-inline m-top-20">
                                        <li>-  <a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href=""><i class="fa fa-behance"></i></a></li>
                                        <li><a href=""><i class="fa fa-dribbble"></i></a>  - </li>
                                    </ul>

                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->
                        </div>
                    </div>
                </div>
                <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
                    <div class="col-md-12">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            &copy; 2017 Key 2 Cars All Rights are Reserved.
                        </p>
                    </div>
                </div>
            </footer> <!-- End off Footer section -->




        </div>

        <!-- JS includes -->

        <script src="{{ URL::asset('js/vendor/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>

      <script src="{{ URL:: asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ URL:: asset('js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ URL:: asset('js/jquery.easing.1.3.js') }}"></script>
       <!-- <script src="{{ URL:: asset('css/slick/slick.js') }}"></script>
        <script src="{{ URL:: asset('css/slick/slick.min.js') }}"></script>
        --><script src="{{ URL:: asset('js/jquery.collapse.js') }}"></script>
        <script src="{{ URL:: asset('js/bootsnav.js') }}"></script>



        

    </body>
</html>
