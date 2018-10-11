@extends('websiteMasterView')


@section('title')
Home  | key2cars
@endsection


@section('cssblock')
<!--Google Font link-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/css/slick/slick.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/ribbon.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/iconfont.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/bootsnav.css')}}">

<!-- xsslider slider css -->

<!--Theme custom css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
<!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

<!--Theme Responsive css-->
<link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.css')}}" />
<script src="{{ URL::asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script> 
<script src="{{ URL::asset('assets/js/vendor/bootstrap.min.js')}}"></script> 
<!--script src="{{ URL::asset('assets/js/owl.carousel.min.js')}}"></script--> 
<script src="{{ URL::asset('assets/js/jquery.magnific-popup.js')}}"></script> 
<script src="{{ URL::asset('assets/js/jquery.easing.1.3.js')}}"></script> 
<script src="{{ URL::asset('assets/css/slick/slick.js')}}"></script> 
<script src="{{ URL::asset('assets/css/slick/slick.min.js')}}"></script> 
<script src="{{ URL::asset('assets/js/jquery.collapse.js')}}"></script> 
<!--<script src="{{ URL::asset('assets/js/bootsnav.js')}}"></script> -->
<script src="{{ URL::asset('assets/js/plugins.js')}}"></script> 
<script src="{{ URL::asset('assets/js/main.js')}}"></script>

	<link href="{{ URL::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{ URL::asset('assets/car/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/car/js/index_used_cars.js')}}" type="text/javascript"></script>

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


@section('icons')

<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="accessories"  href="{{Route('/accessory')}}"></a></li>
             <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
             <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
           
            
            
            
          </ul>
    
    
        </div>

<ul class="center-block hidden-sm hidden-lg hidden-md " id="">
    <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="car" href="{{Route('carIndexPage')}}"></a></li>
            <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="bike"  href="{{Route('bike')}}"></a></li>
             <li class="col-xs-4"><a  style="padding: 17px; margin: 0" class="accessories"  href="{{Route('/accessory')}}"></a></li>
             <li class="col-xs-4"><a class="tractor"  href="{{Route('/farms')}}"></a></li>
            <li class="col-xs-4"><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class="col-xs-4"><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
            
           
            
          </ul>

@endsection



@section('content')  
  <!--banner Sections-->
      <section class=" bg-banner">
  <div class="container">
    <div class="bg-form col-sm-6" style="position: relative;">
      <div id="top-search-heading" class="head pull-left">
        <h2>Find Cars for Sale in Pakistan</h2>
       <!-- <p>With thousand of cars,we have just the right one for you</p>-->
      </div>
        <div class="clear"></div>
<div class="" tabindex="0">
  <div id="used-cars">
       <form  id="searchForm"  method="post" action="{{Route('/SearchHomeForm')}}#result" role="form">
         {{ csrf_field() }}
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
     
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
         
      <li class="home-chzn" style="width:49%;">
          <select style="background:#FFFFFF !important;" name="make" id="make" onchange="updateModel($(this).val())" class="chzn-select c-form__select" tabindex="1">
             <option  class="pr-text " value="-1" >Car Make</option>
             <optgroup label="Popular Brands " style=" color:#9b9b9b;">
            @foreach($manufacture as $m)
            @if($m->popular==1)
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            @endif
            @endforeach
             </optgroup>
              <optgroup label="Other Brands " style=" color:#9b9b9b;">
            @foreach($manufacture as $m)
             @if($m->popular==0)
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            @endif
            @endforeach
             </optgroup>
        </select>
      </li>
      
      <li class="home-chzn " style="width:49%; float:right">
        <select style="background:#FFFFFF !important;" name="model" id="model"  class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" selected >Car Model</option>
            
        </select>
      </li>
            
      <li class="range-widget" style="width:100%; ">
        <div id="pr-range-filter" tabindex="3" class="pos-rel pr-range-large c-form__select" style="border: solid 1px #cccccc;">
          <span class="pr-text" onclick="myFunction()" style="padding: 10px 368px 11px 0;">Price Range</span>
          <i class="fa pull-right"></i>
          <div class="pr-range" id="myDIV" style="display:none; z-index:9">
            <div class="pr-range-container ">
              <div class="pr-input-container clearfix"   >
                <div class="pr-input">
                  <input id="pr_from" name="pr_from" placeholder="Min" tabindex="4" type="text" value="" />lacs
                </div>
                <div class="pr-input">
                  <input id="pr_to" name="pr_to" placeholder="Max" tabindex="5" type="text" value="" />lacs
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      
      
      <li class="home-chzn" style="width:100%; ">
        <select style="" name="city" id="city" class="chzn-select c-form__select" tabindex="1" >
           
             <option   value="-1" selected="selected" ><b>All Cities</b></option>
             <optgroup label="Popular Cities" style=" color:#9b9b9b;">
            @foreach($cities as $c)
            @if($c->popular==1)
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            @endif
            @endforeach
             </optgroup>
              <optgroup label="Other Cities" style=" color:#9b9b9b;">
            @foreach($cities as $c)
             @if($c->popular==0)
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            @endif
            @endforeach
             </optgroup>
            
        </select>
      </li>
    </ul>
    
    <div class="form-group row">
        <div class="col-md-12">
        <input type="checkbox" style="cursor: pointer" checked="checked" value="{{\App\VehicleType::Any}}" name="condition[]" id="condition" class="c-form__checkbox pull-left" > 
        <label class="checkbox pull-left home-check" style="">Any</label> 
       <input type="checkbox" style="cursor: pointer" checked="checked" value="{{\App\VehicleType::New_Vehicle}}" name="condition[]" id="condition" class="c-form__checkbox pull-left" >   
       <label class="checkbox pull-left home-check" style="">New </label>
       <input type="checkbox" style="cursor: pointer" checked="checked" value="{{\App\VehicleType::Almost_New_Vehicle}}" name="condition[]" id="condition" class="c-form__checkbox pull-left"> 
       <label class="checkbox pull-left home-check" style=""> Almost New</label>
       <input type="checkbox" style="cursor: pointer" checked="checked" value="{{\App\VehicleType::Used_Vehicle}}" name="condition[]" id="condition" class="c-form__checkbox pull-left"> 
       <label class="checkbox pull-left home-check" style="margin-right:0; "> Used </label>
      </div>
      <div class="clearfix"></div>
      </div>
        
        <div class="col-sm-12">
          <div class="row">
            <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
          </div>
        </div>  
  </div>
</div>     
</form>
    </div>
  </div>
</section>
 
 
 <!-- <div style="position:relative; margin-top:10px;" class="search-background"> 
      <div class=" col-xs-12 well-searchbox">
    <div class="col-sm-5 col-xs-12 bg-form">
      <form class="form-horizontal " id="searchForm"  method="post" action="{{Route('/SearchHomeForm')}}#result" role="form">
         {{ csrf_field() }}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 style="text-align:center;">Find Cars for Sale in Pakistan</h2>
        <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-5 " style="margin-left:0;">
          <div class="row ">
           <select class="quick-search chzn-select  pointer" >
               <option  class="pr-text " value="-1" >Car Make</option>
             <optgroup label="Popular Brands " style=" color:#9b9b9b;">
            @foreach($manufacture as $m)
            @if($m->popular==1)
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            @endif
            @endforeach
             </optgroup>
              <optgroup label="Other Brands " style=" color:#9b9b9b;">
            @foreach($manufacture as $m)
             @if($m->popular==0)
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            @endif
            @endforeach
             </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group pull-right col-lg-12  col-md-12 col-sm-12 col-xs-5 " style="margin-right:0;">
          <div class=" row">
           <select class="quick-search chzn-select pointer" >
              <option value="-1"  selected>Car Model</option>
            </select>
          </div>
        </div>
        <div class="clear"></div>
        <ul>
        <li class=" hidden-xs">
     <input type="text" placeholder="Min Price" class="quick-search price-input" name="price_fr" id="price_fr" value="" style="width: 48%;"/>
     <input type="text" placeholder="Max Price" class="quick-search price-input pull-right" name="price_to" value="" id="price_to" style="width: 48%;"/>
    </li>
        </ul>
        <div class="form-group">
          <div class="col-md-12">
            <select class="quick-search chzn-select pointer" >
              <option   value="-1" selected="selected" >City</option>
             <option   value="-1"><b>All Cities</b></option>
             <optgroup label="Popular Cities" style=" color:#9b9b9b;">
            @foreach($cities as $c)
            @if($c->popular==1)
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            @endif
            @endforeach
             </optgroup>
              <optgroup label="Other Brands " style=" color:#9b9b9b;">
            @foreach($cities as $c)
             @if($c->popular==0)
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            @endif
            @endforeach
             </optgroup>
            </select>
          </div>
        </div>
        
        <div class="form-group">
        <div class="col-md-12">
        <input type="checkbox" value="{{\App\VehicleType::Any}}" checked="checked" value="any" name="condition" id="condition" class="c-form__checkbox pull-left pointer" > 
        <label class="checkbox pull-left">Any</label> 
       <input type="checkbox" value="{{\App\VehicleType::New_Vehicle}}" checked="checked"  name="condition" id="condition" class="c-form__checkbox pull-left pointer" >   
       <label class="checkbox pull-left">New </label>
       <input type="checkbox"  value="{{\App\VehicleType::Almost_New_Vehicle}}" checked="checked"  name="condition" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left"> Almost New</label>
       <input type="checkbox"  value="{{\App\VehicleType::Used_Vehicle}}" checked="checked" name="condition" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left">Used </label>
      </div>
      </div>
        
        <div class="col-sm-12">
          <div class="row">
           <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
         </div>
        </div>
      </form>
      </div>
      </div>
            
      
    </div>-->
  
  
  <!--            
<div id="fixed-button"><a href="#"><img src="assets/images/sell-car.jpg"></a></div>--> 
  
  
  
  <!--  Featured Cars Section-->
  <section id="product" class="product bg-grey title-padding">
    <div class="container">
      <div class="main_product">
        <div class="text-center fix">
          <h2 class="">Featured Ads</h2>
        </div>
        <div class="text-right fix">
          <a href="{{route('/allFeaturedAds')}}"><h6 class="" style="color:#4691e1;">View all featured ads </h6></a>
        </div>
        <div id="carousel-example-generic" class="carousel slide  title-padding" data-ride="carousel" style="padding-top:5px;"> 
          <!-- Indicators -->
         <ol class="carousel-indicators hidden">

                    <?php $total_products = 0; ?>
                    <?php $number=0;?>
                   

                    @foreach($featured_Ads as $f_a)

                    @if($total_products==0)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}" class="active"></li>

                    @elseif(($total_products%4==0)&&($total_products!=0))
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}"></li>
                    @endif
                    <?php $total_products++; ?>
                    @endforeach
                </ol>
          
          <!-- Wrapper for slides -->
          <?php $count = 1; ?> 
                <div class="carousel-inner feature-moblie mobile-mar" role="listbox" style="margin-left:-15px;">
                    @foreach($featured_Ads as $f_a)


                    @if($count==1)
                    <div class="item active">
                    <div class="container">
                    <div class="">
                    @endif

                    @if(($count%5==0)&&($count!=1))
                      <div class="item">
                      <div class="container">
                      <div class="">
                        @endif
                        <?php $id=$f_a['id'];?>


                  <div class="col-sm-3">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="{{Route($f_a['href'], ['id' => $id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$f_a['image']) }}" alt="" /></a><div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div> </div>
                      <div class="port_caption m-top-10 car-info">
                          <a href="{{Route($f_a['href'], ['id' => $id])}}"><h3 >{{$f_a['title']}}</h3></a>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_a['price']}}</span></h6>
                       @if($f_a['condition']==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($f_a['condition']==\App\VehicleType::Almost_New_Vehicle)
                         <h6>Condition: Almost New</h6>
                        @else
                         <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; {{$f_a['location']}}</h6></div>
                        <a href="{{ROUTE($f_a['href'], ['id' => $id])}}" class="btn-more"  style="text-decoration:none;">View More</a>
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>-->
                      </div>
                    </div>
                  </div>

                   @if($count%4==0&&($count!=0)) 
                  
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <?php $count++; ?>
                                @endforeach

                                @if(($count-1)%4!=0||($count-1)==1)  
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>
                  
                  
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i style="margin-top: 18px;" class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i style="margin-top: 18px;" class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
      <!-- End off row --> 
    </div>
    <!-- End off container --> 
  </section>
  <!-- End off Featured Cars Section-->
  <!-- End off Featured Cars Section--> 
  
  <!--Ads Section-->
  <section id="features" class="features bg-grey title-padding">
    <div class="container">
      <div class="col-xs-12">
        <div class="main_features fix roomy-20">
          <div class="col-sm-10"> 
           
            <div class="row"><a href="{{route('/sellCar')}}"><img style="width:100%;" src="{{URL::asset('assets/images/car.gif')}}"></a></div>
          </div>
          <div class="col-sm-2 hidden-xs ">
            <div class="features_item ad-certified-car bg-white">
              <a href="{{route('carCertfiedPage')}}" class="text-center"> <img class="img-responsive center-block" src="{{ URL::asset('assets/images/key2cars-certified.png')}}"><br>
               <p class="text-center"> View Certified Cars </p></a>
            </div>
          </div>
        </div>
      </div>
      <!-- End off row --> 
    </div>
    <!-- End off container --> 
  </section>
  <!-- End off ads Section--> 
  
  
  <!--Featured Shops ad Section-->
  <section id="business" class="business bg-grey title-padding">  
  <div class="text-center fix">
          <h2 class="">Key2Cars Shop</h2>

          <h4> Our Products</h4>
        </div>
      <div class="container">
      <div class="carousel slide media-carousel" id="media">
        <div class="carousel-inner">
        
          <div class="item  active">
            <div class="row">
            
              
              <div class="col-sm-4">
                <div class="thumbnail"> <img src="assets/images/accessories-1.jpg" alt="" class="img-responsive">
                  <div class="caption">
                    <h4 class="pull-right">Dala</h4>
                    <h4 style="color:#223b7b;"><a href="#">Accessories Shop</a></h4>
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
              
              <div class="col-sm-4 hidden-xs">
                <div class="thumbnail"> <img src="assets/images/accessories-2.jpg" alt="" class="img-responsive">
                  <div class="caption">
                    <h4 class="pull-right">Car</h4>
                    <h4 ><a  href="#">Accessories Shop</a></h4>
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
              
              <div class="col-sm-4 hidden-xs">
                <div class="thumbnail"> <img src="assets/images/accessories-2.jpg" alt="" class="img-responsive">
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
          <div class="item">
          	<div class="row">
              <div class="col-sm-4">
                <div class="thumbnail"> <img src="assets/images/accessories-1.jpg" alt="" class="img-responsive">
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
              
              <div class="col-sm-4 hidden-xs">
                <div class="thumbnail"> <img src="assets/images/accessories-2.jpg" alt="" class="img-responsive">
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
              
              <div class="col-sm-4 hidden-xs">
                <div class="thumbnail"> <img src="assets/images/accessories-2.jpg" alt="" class="img-responsive">
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
          <div class="item">
          	<div class="row">
              <div class="col-sm-4">
                <div class="thumbnail"> <img src="assets/images/accessories-1.jpg" alt="" class="img-responsive">
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
              
              <div class="col-sm-4 hidden-xs">
                <div class="thumbnail"> <img src="assets/images/accessories-2.jpg" alt="" class="img-responsive">
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
              
              <div class="col-sm-4 hidden-xs">
                <div class="thumbnail"> <img src="assets/images/accessories-2.jpg" alt="" class="img-responsive">
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
        </div>
        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
        <a data-slide="next" href="#media" class="right carousel-control">›</a>
      </div>    
      
      <script>
      $(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});
      </script>                      
    </div>
  </section>
  <!-- End off Featured Car ad section -->
  
  
  
  <!--Featured Dealers section-->
  @if(!$dealer->isEmpty())
  <section class="product bg-grey ">
    <div class="container">
      <div class="main_product roomy-20">
        <div class=" text-center fix">
          <h2 class="">Featured Dealers</h2>
          
          <div class="container">
                <div class="row">
                  @foreach($dealer as $d)
                  <div class="col-xs-12 col-sm-3">
                    <div class="port_item xs-m-top-10">
                      <div class="port_img"> <img src="{{ URL::asset('images'.$d->img_url)}}" alt="" />
                        <div class="port_overlay text-center"> <a href="{{ URL::asset('images'.$d->img_url)}}" class="popup-img">+</a> </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  
                  
                </div>
              </div>
          
        </div>
        
      </div>
      <!-- End off row --> 
    </div>
    <!-- End off container --> 
  </section>
  @endif
  <!-- End off Featured Dealers section --> 
  
  <!--Used Cars by city-->
  @if(!$city_vehicles_count->isEmpty())
  <section class="business bg-grey  p-top-20 p-bottom-40">
    <div class="container ">
      <div class="main_product col-xs-12">
      
      <div class=" text-center fix">
                  <h2 class=" ">Cars by City</h2>
                </div>
      
        <table class="table bg-white">
          <tbody>
            <tr>
              <td class="" style="border-top:none;">
                  <?php $have_data = false;?>
                  
                  
                  @foreach($city_vehicles_count as $c_v_c)
                  @if($c_v_c->popular==1)
                  @if($have_data == false)
                   <div class="col-xs-12 m-top-20"><h4 style="color:gray;">Popular Cities</h4></div>  
                   <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-home" >
                   <?php $have_data = true; ?>
                  @endif
                  <li class="col-md-3"> <a style="" href="{{Route('/getCarsByCity', ['id' => $c_v_c->id])}}#result" id="{{$c_v_c->id}}" title="Cars for Sale in {{$c_v_c->title}}">
                    <h4>Cars {{$c_v_c->title}}</h4>
                    {{$c_v_c->size}}+  Cars </a> </li>
                    @endif
                    @endforeach

                 
                @if($have_data == true)
                </ul>
                   @endif
                   
                  <?php $have_data = false;?>
               
                  @foreach($city_vehicles_count as $c_v_c)
                  @if($c_v_c->popular==0 )
                  @if($have_data == false)
                   <div class="col-xs-12 m-top-20"><h4 style="color:gray;">Others Cities</h4></div>  
                   <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-home" >
                       <?php $have_data = true; ?>
                       @endif
                  
                  <li class="col-md-3"> <a style="" href="{{Route('/getCarsByCity', ['id' => $c_v_c->id])}}#result" id="{{$c_v_c->id}}" title="Cars for Sale in {{$c_v_c->title}}">
                    <h4>Cars {{$c_v_c->title}}</h4>
                    {{$c_v_c->size}}+  Cars </a> </li>
                    @endif
                    @endforeach

                 
                  @if($have_data == true)
                </ul>
                   @endif
              
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- End off row --> 
    </div>
    <!-- End off container --> 
  </section>
  @endif
  <!--End of Used cars by city--> 
  <!--Call to  action section-->
  <section id="action" class="action bg-primary roomy-40  hidden-xs  p-top-50" style="padding-top:30px">
    <div class="container">
      <div class="row">
        <div class="maine_action">
          <div class="col-md-8">
            <div class="action_item text-center">
              <h2 class="text-white">Post Your New Ad Here</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="action_btn text-left sm-text-center"> <a href=""  data-toggle="modal" data-target="#ad-type" class="btn btn-default">Post New Ad</a> </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </section>
  <!-- End off Call to action section --> 








@endsection
<!-- JS includes --> 

@section('jsblock')


<script>
  //////////////////////update model////////////////////////
  /////////////////////////////////////////////////////////

    function updateModel(make){
      var data = {'make':make};
      
      $.get('/getModelByMake', data, function (data) {
          
        $("#model").empty(); 
        $('#model').append("<option value='-1'  selected>" + 'Car Model' + "</option>");
         $('#model').append("<optgroup label='Popular Models' style='color:#9b9b9b;'>");
         
       
        $.each(data, function (index, element) {
           if(element.popular==1)
           {
                $("#model").append("<option value='" + element.id + "'>" + element.title + "</option>");
           }
           });
           $('#model').append("</optgroup>");
           
           $('#model').append("<optgroup label='Other  Models' style='color:#9b9b9b;'>");
          
          $.each(data, function (index, element) {
           if(element.popular==0)
           {
                $("#model").append("<option value='" + element.id + "'>" + element.title + "</option>");
           }
           });
             $('#model').append("</optgroup>");
             
         $("#model").trigger("chosen:updated");
        $("#model").trigger("liszt:updated");
      });
    }
  

//////////////////////update Search button////////////////////////////////
//////////////////////////////////////////////////////////////////////
$('#searchForm').change(function() {
    var condition = [];
   $.each($("input[name='condition']:checked"), function(){            
                condition.push($(this).val());
            });//alert("city :"+city.length);
  var data = {'make': $('#make').val(),'model':$('#model').val(),'price_to':$('#pr_to').val(),'price_fr':$('#pr_from').val(),'city':$('#city').val(),'condition':condition};

console.log(data);
   $.get('updateSearchButton', data, function (data) {
       
        var model = $('#searchbutton');
        model.empty();
        
        $.each(data, function (index, element) {
          model.append("Search "+element.size+" cars");
        });
      });
  
});


var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
/*
$("#price_fr").keyup(function(){
    num=$("#price_fr").val();
    
    if((num = num.toString()).length < 4) return 'null';
   

    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lac ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    alert(str);

});

$("#price_to").keyup(function(){
    num=$("#price_to").val();
   

    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lac ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    alert(str);

});
*/

</script>
<div class="modal fade Featured-cars m-top-10" id="ad-type">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> <a href="#" data-dismiss="modal" class="class pull-right"><span class="fa fa-close"></span></a>
        <h3 class="modal-title text-center">Post an Ad</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-12 product_content">
           <div class="col-xs-4 text-center m-bottom-20 box-shadow"><a href="{{Route('/sellCar')}}"><img src="{{URL::asset('assets/images/car-top-hover.png')}}"/><br>
Sell my Car</a></div>

		  <div class="col-xs-4 text-center m-bottom-20 box-shadow"><a href="{{Route('sellBike')}}"><img src="{{URL::asset('assets/images/bike-top-hover.png')}}"/><br>
Sell my Bike</a></div>

		  <div class="col-xs-4 text-center m-bottom-20 box-shadow"><a href="{{Route('/sellTruck')}}"><img src="{{URL::asset('assets/images/truck-top-hover.png')}}"/><br>
Sell my Truck</a></div>

          <div class="col-xs-4 text-center m-bottom-20 box-shadow"><a href="{{Route('/sellBus')}}"><img src="{{URL::asset('assets/images/bus-top-hover.png')}}"/><br>
Sell my Bus</a></div>

          <div class="col-xs-4 text-center m-bottom-20 box-shadow"><a href="{{Route('/sellFarm')}}"><img src="{{URL::asset('assets/images/tractor-top-hover.png')}}"/><br>
Sell my Farm</a></div>

          <div class="col-xs-4 text-center m-bottom-20 box-shadow"><a href="{{Route('/sellAccessory')}}"><img src="{{URL::asset('assets/images/accessories-top-hover.png')}}"/><br>
Sell my Accessories</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>


@endsection


