@extends('websiteMasterView')


@section('title')
Car for Sale in Pakistan 	|	Key2Cars
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
  


<div class="" id="main-container">
  <section id="product" class=" product well clearfix">
    <div class="container">
      <div class="main_product ">
        <div class="fix">
          <h2 class="text-uppercase">Featured Shops For Accessories</h2>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators -->
          <ol class="carousel-indicators hidden">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox" >
            <div class="item active">
              <div class="col-sm-3">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop2.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Car</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Truck</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Truck</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-sm-3">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop2.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Car</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Truck</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Truck</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-sm-3">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Car</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Truck</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              <div class="col-sm-3 hidden-xs">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive rel-featured">
                  <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                  <div class="caption">
                    <h4 class="pull-right">Truck</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
      <!-- End off row --> 
    </div>
    <!-- End off container --> 
  </section>
    
    <div class="container"> <img class="img-responsive m-top-10 m-bottom-10" style="width:100%;" src="{{URL::asset('assets/shop/images/ad.gif')}}"/> </div>
  
  <section>
    <div class="container">
      <div class="used-car-search-results" data-pjax-container>
        <div class="search-page-new">
          <div class="row">
            <div class="col-md-3 used-car-refine-search">
              <div class="sidebar-filters">
                <div class="filter-panel-new box" data-pjax-enable>
                  <input id="selected_city_slug" name="selected_city_slug" type="hidden" />
                  <div class="accordion" id="sidebar">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9 search-listing pull-right">
              <div>
                
                <div class="row">
                  <div class="col-md-12">
                    
                    <div class="col-sm-4">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive ">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              		
                    <div class="col-sm-4">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive ">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              
              		<div class="col-sm-4">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive ">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              		
                    <div class="col-sm-4">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive ">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              
              		<div class="col-sm-4">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive ">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              		
                    <div class="col-sm-4">
                <div class="thumbnail"> <img src="{{URL::asset('assets/shop/images/shop1.jpg')}}" alt="" class="img-responsive ">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4><a href="#">Accessories Shop</a></h4>
                    <p><i class="fa fa-map-marker"></i> Exagic Near Clock Tower Phase7 Bahria Town Rawalpindi.</p>
                    <p><i class="fa fa-mobile"></i> 0333 111 2233</p>
                    <p>
                    <div class="ratings">
                      <p> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> (15 reviews) </p>
                    </div>
                    </p>
                  </div>
                  <div class="space-ten"></div>
                  <div class="btn-ground text-center">
                    <button style="width:100%;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#Shop">More Detail</button>
                  </div>
                  <div class="space-ten"></div>
                </div>
              </div>
              
                    
                  </div>
                </div>
                <div id="ad-in-search-bottom" class="tlc">
                  <div  class="m-top-20"> </div>
                </div>
                <div data-pjax-enable>
                 
                </div>
                
                <!-- TODO: discuss with usman ali about reviews count and car model instance variable --> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
  @endsection

  
  
  @section('jsblock')
<script>
    $(function(){
      var make= $('#UsedManID').val();
      if (make) {
        updateModels('car',make, $('#UsedModelID'), 'All Models'); reloadChosen('#UsedModelID');
        updateVersion('car',$('#UsedModelID').val(), make, $('#UsedVersionID'), 'All Versions');reloadChosen('#UsedVersionID');
      }
      $(".search-main").bind('keydown',function(e) {
        if(e.which === 13 && $(".chzn-single-with-drop").length==0 &&!$("select").is(":focus")) {
            $('.search-main #used-cars-search-btn').click();
        }
      });
    });
  </script> 
<script type="text/javascript">
    $(function(){
      if($('#carSliderWrapper #slider').length > 0){
        var carSlider = $('#carSliderWrapper #slider').bxSlider({
          infiniteLoop: true,
          auto: false,
          autoControls: false,
          autoHover: true,
          speed:1000,
          pause: 10000,
          pager:false,
          nextSelector: '.slider-next',
          prevSelector: '.slider-prev',
          nextText: '<i class="fa fa-chevron-right"></i>',
          prevText: '<i class="fa fa-chevron-left"></i>',
          onSlideBefore: function(slide){
              lazyLoadSliderImages(slide,'.lazy-car-slider')
          }
        });
        var first_slide_images = carSlider.getCurrentSlideElement().find('.lazy-car-slider')
        applyImagesLazyLoad(first_slide_images);
      }
    });
  </script> 
<script>
      var fetch_f_ads=true;
      $(function(){
        if($('#slider1').length > 0){
          $('#slider1').bxSlider({
            auto: false,
            autoControls: false,
            autoHover: true,
            speed:1000,
            pause: 10000,
            pager:false,
            nextSelector: '.slider1-next',
            prevSelector: '.slider1-prev',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>',
          });
        }
      });
    </script> 
<script>
        $(document).ready(function() {
            $('.bxSlider').each(function(i,slider){
                $(slider).bxSlider({
                    infiniteLoop: false,
                    hideControlOnEnd: true,
                    auto: false,
                    autoControls: false,
                    autoHover: true,
                    speed: 1000,
                    pause: 10000,
                    minSlides: 4,
                    maxSlides: 4,
                    pager: false,
                    nextSelector: $(slider).attr('data-link-next'),
                    prevSelector: $(slider).attr('data-link-prev'),
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    prevText: '<i class="fa fa-chevron-left"></i>',
                });
            });
            slideShowContent(this);
            applyImagesLazyLoad();
        });
    </script> 
<script>
      $('.nav-dropdown-menu').on('mouseover', function() {
        $(this).parent().addClass('open');
      });
      $('.nav-dropdown-menu').on('mouseout', function() {
        $(this).parent().removeClass('open');
      });
      $(document).ready(function (){ $('#navbar_static_top').attr('data-offset-top', $('.advertisement').innerHeight() + $('.header').innerHeight());

      $("#user-menu,#lang-menu").click(function(e){
        $(this).toggleClass("open");
          e.stopPropagation();
      });

      });
    </script> 
<script>var om_load_jquery = false;</script>
<div id="om-dxawge5rc65nrwtv-holder"></div>
<script>
      $(window).load(function(){
        var dxawge5rc65nrwtv,dxawge5rc65nrwtv_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){dxawge5rc65nrwtv_poll(function(){if(window['om_loaded']){if(!dxawge5rc65nrwtv){dxawge5rc65nrwtv=new OptinMonsterApp();return dxawge5rc65nrwtv.init({u:"10331.222818",staging:0,dev:0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n, o.async=true, o.src="#",o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;dxawge5rc65nrwtv=new OptinMonsterApp();dxawge5rc65nrwtv.init({u:"10331.222818",staging:0,dev:0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");
      });
    </script> 

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript">
      $(window).on("load", function() {
        var f=document.getElementsByTagName('script')[0],
            j=document.createElement('script');j.async=true;j.src=
            '../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570bb55ad090476b';f.parentNode.insertBefore(j,f);
      });
    </script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
@endsection
