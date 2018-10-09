@extends('websiteMasterView')

@section('title')
Bike for Sale in Pakistan | Key2Cars
@endsection


@section('icons')
<div class="pull-left" style="margin-left:70px">
  <ul class="list-inline hidden-sm hidden-xs" id="">
    <li class=""><a class="car" href="{{Route('carIndexPage')}}"></a></li>
    <li class=""><a class="bike-active"  href="{{Route('bike')}}"></a></li>
    <li class=""><a class="accessories"  href="{{Route('/accessory')}}"></a></li>
    <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
    <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
    <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
    <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
    
  </ul>
</div>
<ul class="center-block hidden-sm hidden-lg hidden-md " id="">
  <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="car" href="{{Route('carIndexPage')}}"></a></li>
  <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="bike-active"  href="{{Route('bike')}}"></a></li>
  <li class="col-xs-4"><a  style="padding: 17px; margin: 0" class="accessories"  href="{{Route('/accessory')}}"></a></li>
  <li class="col-xs-4"><a class="tractor"  href="{{Route('/farms')}}"></a></li>
  <li class="col-xs-4"><a class="bus"  href="{{Route('/buses')}}"></a></li>
  <li class="col-xs-4"><a class="truck"  href="{{Route('/trucks')}}"></a></li>
  <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
  
</ul>
@endsection


@section('cssblock')
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/ribbon.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/iconfont.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/bootsnav.css')}}">

<!-- index css -->

<link rel="stylesheet" href="{{URL::asset('assets/car/css/style.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/car/css/bootstrap.css')}}">

<!--Theme custom css -->
<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
<!--<link rel="stylesheet" href="assets/css/colors/maron.css">--> 

<!--Theme Responsive css--> 

<!-- JS includes --> 

<script src="{{URL::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script> 
<script src="{{URL::asset('assets/js/vendor/bootstrap.min.js')}}"></script> 
<script src="{{URL::asset('assets/js/plugins.js')}}"></script> 
<script src="{{URL::asset('assets/js/main.js')}}"></script>
<link href="{{URL::asset('assets/car/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->

<link href="{{URL::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />
<script src="{{URL::asset('assets/car/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script> 
<script src="{{URL::asset('assets/car/js/index_used_cars.js')}}" type="text/javascript"></script> 
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

<!--End off Navigation -->

<!--div class="" id="main-container">
  <form class="form-horizontal hidden-lg hidden-md hidden-sm" id="searchForm" method="post" action="http://localhost:8000/Cars/Serach#result" role="form">
    <h2 style="text-align:center;">Find Motorbikes for Sale in Pakistan</h2>
    <p style="text-align:center;">Find new &amp; used motorbikes for sale</p>
    <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-left:0;">
      <div class="row">
        <select class="quick-search c-form__select pointer" name="make" id="make">
          <option class="pr-text " value="-1">Bike Make</option>
          <optgroup label="Popular Brands " style=" color:#9b9b9b;">
          <option class="pr-text" value="1">Honda</option>
          <option class="pr-text" value="3">BMW</option>
          </optgroup>
          <optgroup label="Other Brands " style=" color:#9b9b9b;">
          <option class="pr-text" value="4">Toyota</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div class="form-group pull-right col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-right:0;">
      <div class=" row">
        <select class="quick-search c-form__select pointer" name="model" id="model">
          <option value="-1" selected="">Bike Model</option>
        </select>
      </div>
    </div>
    <div class="clear"></div>
    <div class="form-group">
      <div class="col-md-12">
        <select class="quick-search c-form__select pointer" name="city" id="city">
          <option value="-1" selected="selected">City</option>
          <option value="-1">All Cities</option>
          <optgroup label="Popular Cities" style=" color:#9b9b9b;">
          <option class="pr-text" value="35">Islamabad</option>
          <option class="pr-text" value="1">Lahore</option>
          <option class="pr-text" value="2">Rawalpindi</option>
          </optgroup>
          <optgroup label="Other Brands " style=" color:#9b9b9b;">
          <option class="pr-text" value="21">Bahawalnagar</option>
          <option class="pr-text" value="5">Bahawalpur</option>
          <option class="pr-text" value="25">Bhalwal</option>
          <option class="pr-text" value="32">Chakwal</option>
          <option class="pr-text" value="31">Charsada</option>
          <option class="pr-text" value="14">Chiniot</option>
          <option class="pr-text" value="24">Chishtian</option>
          <option class="pr-text" value="28">Dera Ismail Khan</option>
          <option class="pr-text" value="9">Gujrat</option>
          <option class="pr-text" value="3">Hyderabad</option>
          <option class="pr-text" value="16">Jhelum</option>
          <option class="pr-text" value="15">Kamoke</option>
          <option class="pr-text" value="10">Kasur</option>
          <option class="pr-text" value="17">Khanewal</option>
          <option class="pr-text" value="20">Khanpur</option>
          <option class="pr-text" value="23">Khuzdar</option>
          <option class="pr-text" value="18">Kohat</option>
          <option class="pr-text" value="13">Mingora</option>
          <option class="pr-text" value="22">Muridke</option>
          <option class="pr-text" value="29">Nowshera</option>
          <option class="pr-text" value="4">Peshawar</option>
          <option class="pr-text" value="11">Sahiwal</option>
          <option class="pr-text" value="8">Shekhupura</option>
          <option class="pr-text" value="19">Shikarpur</option>
          <option class="pr-text" value="6">Sialkot</option>
          <option class="pr-text" value="7">Sukkur</option>
          <option class="pr-text" value="27">Tando Adam</option>
          <option class="pr-text" value="33">Tando Allahyar</option>
          <option class="pr-text" value="34">Turbat</option>
          <option class="pr-text" value="12">Wah Cantonment</option>
          <option class="pr-text" value="30">Wazirabad</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <input type="checkbox" value="0" checked="checked" name="condition" id="condition" class="c-form__checkbox pull-left pointer">
        <label class="checkbox pull-left" style="margin-right:10px">Any</label>
        <input type="checkbox" value="1" checked="checked" name="condition" id="condition" class="c-form__checkbox pull-left pointer">
        <label class="checkbox pull-left" style="margin-right:10px">New </label>
        <!--<input type="checkbox" value="2" checked="checked" name="condition" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left" style="margin-right:10px"> Almost New</label>
        <input type="checkbox" value="3" checked="checked" name="condition" id="condition" class="c-form__checkbox pull-left pointer">
        <label class="checkbox pull-left" style="margin-right:0px">Used </label>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="row">
        <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
      </div>
    </div>
  </form>
</div-->
<div class="" id="main-container">
  <!--section class="search-main hidden-xs search-form">
    <div class="container">
    <div class="search-main " style="position: relative;background: none">
    <div id="top-search-heading" class="head">
      <h1>Find Motorbikes for sale in Pakistan</h1>
      <p>Find new &amp; used motorbikes for sale</p>
    </div>
    <div class="" tabindex="0">
    <div id="used-cars">
    <form method="post" action="{{route('searchBikesByAllFilters')}}#result" >
      {{ csrf_field() }}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
        <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" name="make" id="make" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" >Bike Make</option>
            <optgroup label="Popular Brands ">
            @foreach($manufacture as $m)
            @if($m->popular==1)
            
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            
            @endif
            @endforeach
             </optgroup>
            <optgroup label="Other Brands ">
            @foreach($manufacture as $m)
             @if($m->popular==0)
            
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            
            @endif
            @endforeach
             </optgroup>
          </select>
        </li>
        <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;height: 40px;" name="model" id="model" class="c-form__select pointer"  >
            <option   value="-1" >Bike Model</option>
          </select>
        </li>
        <li class="range-widget" style="width:25%;">
          <div id="pr-range-filter" tabindex="3" class="pos-rel pr-range-large c-form__select"> <span class="pr-text">Price Range</span> <i class="fa pull-right"></i>
            <div class="pr-range" style="display:none;">
              <div class="pr-range-container ">
                <div class="pr-input-container clearfix"   >
                  <div class="pr-input">
                    <input id="pr_from" name="price_fr" placeholder="Min" tabindex="4" type="text" />
                    lacs </div>
                  <div class="pr-input">
                    <input id="pr_to" name="price_to" placeholder="Max" tabindex="5" type="text"  />
                    lacs </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" data-placeholder="City" name="city" id="city"  class="chzn-select" tabindex="1" >
            <option   value="-1" selected="selected" >City</option>
            <option   value="-1"><b>All Cities</b></option>
            <optgroup label="Popular Cities">
            @foreach($city as $c)
            @if($c->popular==1)
            
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            
            @endif
            @endforeach
             </optgroup>
            <optgroup label="Other Brands ">
            @foreach($city as $c)
             @if($c->popular==0)
            
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            
            @endif
            @endforeach
             </optgroup>
          </select>
        </li>
      </ul>
      <li style="margin-top: 10px;list-style: none;">
        <input type="checkbox" value="{{\App\VehicleType::Any}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left pointer" >
        <label class="checkbox pull-left" style="margin-right: 24px;">Any</label>
        <input type="checkbox" value="{{\App\VehicleType::New_Vehicle}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left pointer" >
        <label class="checkbox pull-left" style="margin-right: 24px;">New </label>
        <input type="checkbox"  value="{{\App\VehicleType::Used_Vehicle}}" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left pointer">
        <label class="checkbox pull-left" style="margin-right: 24px;">Used </label>
      </li>
      <div class="clearfix"></div>
      </div>
      </div>
      <div style="margin:0;padding:0;display:inline">
        <input name="utf8" type="hidden"  />
      </div>
      <div id="more_option_detail" class="clearfix" style="display:none;">
        <ul class="search-fields search-fields3 mt30 clearfix">
          <li class="nomargin">
            <legend class="nomargin " id="city_area_heading" style="display:block !important;"> City Area</legend>
            <select style="background:#FFFFFF !important;" class="c-form__select pointer" name="city_area" id="city_area"  tabindex="1" >
              <i class="fa fa fa-angle-down pull-right"></i>
              <option   value=""  disabled="disabled">City Area</option>
            </select>
          </li>
          <li class="nomargin">
            <legend class="nomargin">Registration City</legend>
          </li>
          <li class="nomargin">
            <legend class="nomargin">Year</legend>
          </li>
          <li>
            <select name="reg_city" id="reg_city" class="chzn-select c-form__select">
              <option value="" disabled="disabled"  >Registration City</option>
              <option value="unregistered">Un-Registered</option>
              
        
        @foreach($reg_city as $c)
        
              <option value="{{$c->id}}">{{$c->title}}</option>
              
       @endforeach
        <i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
          <li class="home-chzn form-inline" style="width:15%;">
            <select class="chzn-select c-form__select_48 pointer" id="year_fr" name="year_fr" style="width:20% !important;">
              <option value="" disabled="disabled">From</option>
              
@foreach($model_year as $m_y)

              <option value="{{$m_y->id}}">{{$m_y->year}}</option>
              
@endforeach

	
            </select>
          </li>
          <li class="home-chzn form-inline" style="width:15%;">
            <select class="chzn-select c-form__select_48 pointer"  id="year_to" name="year_to" style="width:20% !important;">
              <option value="" disabled="disabled">To</option>
              
@foreach($model_year as $m_y)

              <option value="{{$m_y->id}}">{{$m_y->year}}</option>
              
@endforeach


            </select>
          </li>
        </ul>
        <ul class="search-fields search-fields3 clearfix">
          <legend class="nomargin">Other Details</legend>
          <li>
            <select style="background:#FFFFFF !important;" name="engine_type" id="engine_type" class="chzn-select c-form__select" tabindex="1">
              <option  class="pr-text" value="" disabled="disabled"  >All Engine Types</option>
              
             @foreach($engine_type as $e_t)
        
              <option value="{{$e_t->id}}">{{$e_t->title}}</option>
              
        @endforeach
            <i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
        </ul>
      </div>
      <script>
    $('.search-fields select,.search-fields input').val('');
    function scrollIntoViewIfNeeded(selector,scroll_top){
      if(jQuery(selector).position()){
        if(jQuery(selector).position().top < jQuery(window).scrollTop()){
          //scroll up
          jQuery('html,body').animate({scrollTop: scroll_top!=undefined ? scroll_top : jQuery(selector).position().top}, 500);
        }
        else if(jQuery(selector).position().top + jQuery(selector).height() > jQuery(window).scrollTop() + (window.innerHeight || document.documentElement.clientHeight)){
          //scroll down
          jQuery('html,body').animate({scrollTop:jQuery(selector).position().top - (window.innerHeight || document.documentElement.clientHeight) + jQuery(selector).height() + 40}, 500);
        }
      }
    }
    function moreAdvanceOptions(link, fire_event){
      var all_cars = $("#used-home-adv-search-btn"), search_row= $("#search-row");
      if ($('#more_option_detail').is(':visible')) {
        $("#search-overlay").hide();
        scrollIntoViewIfNeeded(".search-classified",0);
      }
      else{
        $("#search-overlay").show();
        $('#more_option_detail').css("overflow", "visible");
      }
      $('#more_option_detail').slideToggle('slow', function() {
        if ($(this).is(':visible')) {
          if(fire_event)
            trackEvents('CarSearch', 'MoreSearchOptions', 'From - UsedHome');
          link.html("Less Search Options <i class='fa fa-angle-up'></i>").attr('style', 'margin-top: 15px !important;');
          all_cars.css("margin-top","15px");
          scrollIntoViewIfNeeded(".search-classified");
          $('#more_option_detail').css("overflow", "visible");
        } else {
          link.html("More Search Options <i class='fa fa-angle-down'></i>").attr('style', '');
          all_cars.css("margin-top","5px");
        }

      });
    }
    $(function(){
      $('#more_option').click(function(){
          moreAdvanceOptions($(this), true);
      });
      
    });

  </script>
      <div class="search-functions clearfix nomargin">
        <div class="pull-left"> <a href="javascript:void(0);" id="more_option" class="more_option"> More Search Options <i class="fa fa-angle-down"></i> </a> </div>
        <div id="search-row" class="pull-right">
          <button type="submit" class="btn btn-danger btn-lg btn-block"  id="home-search-btn" tabindex="6"> Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
        </div>
      </div>
      </div>
      </div>
    </form>
  </section-->
  
  
  @if(!$new_bikes->isEmpty()) 
  <section id="product" class=" product  clearfix">
    <div class="container">
      <div class="main_product ">
        <div class="fix">
          <h2 class="text-uppercase">Featured Bikes for Sale</h2>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
         
          <ol class="carousel-indicators hidden-lg hidden-md hidden-sm">
            <?php $total_products = 0; ?>
            <?php $number=0;?>
            @foreach($new_bikes as $n_b)
            
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
          <div class="carousel-inner" role="listbox" > @foreach($new_bikes as $n_b)
            
            
            @if($count==1)
            <div class="item active"> @endif
              
              @if(($count%5==0)&&($count!=1))
              <div class="item"> @endif
                <div class="col-sm-3 ">
                  <div class="port_item xs-m-top-30 border bg-white">
                    <div class="port_img"><a href="{{Route('/GetBikeDetails', ['id' => $n_b->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$n_b->url) }}" alt="" /></a> @if($n_b->featured==1)
                      <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                      @endif </div>
                    <div class="port_caption m-top-10 car-info">
                      <h3 ><a href="{{Route('/GetBikeDetails', ['id' => $n_b->id])}}">{{$n_b->manufacture}} {{$n_b->model}} &nbsp; {{$n_b->year}}</a></h3>
                      <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$n_b->price}}</span></h6>
                      @if($n_b->condition==\App\VehicleType::New_Vehicle)
                      <h6>Condition: New</h6>
                      @elseif($n_b->condition==\App\VehicleType::Almost_New_Vehicle)
                      <h6>Condition: Almost New</h6>
                      @else
                      <h6>Condition: Used</h6>
                      @endif
                      <div class="pull-right">
                        <h6><i class="fa fa-map-marker"></i>&nbsp; {{$n_b->city}}</h6>
                      </div>
                      <a href="{{Route('/GetBikeDetails', ['id' => $n_b->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                      <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                    </div>
                  </div>
                </div>
                @if($count%4==0&&($count!=1)) </div>
              @endif
              <?php $count++; ?>
              @endforeach
              
              @if(($count-1)%4!=0||($count-1)==1) </div>
            @endif </div>
          
         
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
     
    </div>
   
  </section>
  
  @endif
</div>
<section>
  <div class="container m-top-10">
    <div class="used-car-search-results">
      <div class="col-sm-3 hidden-xs"><img src="{{URL::asset('assets/car/images/bikead1.png')}}"></div>
      <div class="col-sm-9 hidden-xs">
        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500"> 
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?php $count=0;?>
            @foreach($most_featured_cars as $m_f_c)
            
            @if($count==0)
            <div class="item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4"><img src="{{URL::asset('images'.$m_f_c->url)}}" class="img-responsive"></div>
                  <div class="col-md-8">
                    <h2>{{$m_f_c->title}}</h2>
                    <p> <?php echo $m_f_c->description;?> </p>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="item">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4"><img src="{{URL::asset('images'.$m_f_c->url)}}" class="img-responsive"></div>
                  <div class="col-md-8">
                    <h2>{{$m_f_c->title}}</h2>
                    <p> <?php echo $m_f_c->description;?> </p>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <?php $count=1;?>
            @endforeach 
            
            <!-- End Item --> 
          </div>
          <!-- End Carousel Inner -->
          <div class="controls">
            <ul class="nav">
              <?php $count=0;?>
              @foreach($most_featured_cars as $m_f_c)
              <li data-target="#custom_carousel" data-slide-to="{{$count++}}" class=""><a href="#"><img style="width:50px" src="{{URL::asset('images'.$m_f_c->url)}}"><small>{{$m_f_c->title}}</small></a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <!-- End Carousel --> 
      </div>
      <div class="clearfix"></div>
      <div class="clear m-bottom-20"></div>
      <div class="search-page-new m-bottom-40">
        <div class="row"> 
          
          <!---- FILTERS----->
          
          <div class="col-md-3 used-car-refine-search hidden-xs">
            <div class="sidebar-filters">
              <div class="filter-panel-new box" data-pjax-enable>
                <input id="selected_city_slug" name="selected_city_slug" type="hidden" />
                <div class="accordion" id="sidebar">
                  <div class="accordion-group search-filter-heading">
                    <div class="accordion-heading"> <a class="accordion-toggle">Quick Search:</a> </div>
                  </div>
                    <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message0">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Search by Keyword</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message0" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                     
                        <input class="pr35" id="name" name="name" placeholder="e.g. Honda in Lahore" type="text" />
                        <input class="btn btn-primary refine-go" type="button" onclick="filterRequest()" value="Go" />
                      
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message1">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Price Range</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message1" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <div class="range-filter clearfix">
                        <input list="l-price" name="l-price" class="rng-hintify" id="price_fr" name="price_fr" placeholder="From" type="text" value="" />
                        <datalist id="l-price">
                          <option value="20,000">
                          <option value="30,000">
                          <option value="45,000">
                          <option value="60,000">
                          <option value="80,000">
                          <option value="90,000">
                          <option value="100,000">
                          <option value="120,000">
                          <option value="140,000">
                          <option value="160,000"> 
                        </datalist>
                        <input list="h-price" name="h-price" class="rng-hintify" maxlength="10" id="price_to" name="price_to" placeholder="To" type="text" value="" />
                        <datalist id="h-price">
                          <option value="25,000">
                          <option value="30,000">
                          <option value="45,000">
                          <option value="60,000">
                          <option value="80,000">
                          <option value="90,000">
                          <option value="100,000">
                          <option value="120,000">
                          <option value="140,000">
                          <option value="200,000"> 
                        </datalist>
                        <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequest()"/>
                        <div class="clearfix"></div>
                        <div id="pr_hint"></div>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message3">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Year</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message3" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <div class="range-filter clearfix">
                        <input list="year-start" name="year-start" class="rng-hintify"  id="year_fr" maxlength="10" name="year_fr" placeholder="From" type="text" value="" />
                        <datalist id="year-start">
                          <option value="2001">
                          <option value="2002">
                          <option value="2003">
                          <option value="2004">
                          <option value="2005">
                          <option value="2006">
                          <option value="2007">
                          <option value="2008">
                          <option value="2009">
                          <option value="2010">
                          <option value="2011">
                          <option value="2012">
                          <option value="2013">
                          <option value="2014">
                          <option value="2015">
                          <option value="2016">
                          <option value="2017"> 
                        </datalist>
                        <input list="year-end" name="year-end" class="rng-hintify"  id="year_to" maxlength="10" name="year_to" placeholder="To" type="text" value="" />
                        <datalist id="year-end">
                          <option value="2002">
                          <option value="2003">
                          <option value="2004">
                          <option value="2005">
                          <option value="2006">
                          <option value="2007">
                          <option value="2008">
                          <option value="2009">
                          <option value="2010">
                          <option value="2011">
                          <option value="2012">
                          <option value="2013">
                          <option value="2014">
                          <option value="2015">
                          <option value="2016">
                          <option value="2017">
                          <option value="2018"> 
                        </datalist>
                        <input class="btn btn-primary pull-left"  name="commit" type="submit" value="Go" onclick="filterRequest()"/>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message4">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Make</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message4" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($manufacture_featured_bikes as $m_f_b)
                        <li title="{{$m_f_b->title}} Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a href="#"  title="{{$m_f_b->title}} Cars for Sale in Pakistan">
                            <input type="checkbox"  id="manufacture" name="manufacture" value="{{$m_f_b->id}}" />
                            {{$m_f_b->title}} <span class="pull-right count">{{$m_f_b->size}}</span> </a> </label>
                        </li>
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message44">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Model</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message44" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message44" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($model_bikes as $m_b)
                        <li title="{{$m_b->title}} Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a href="#"  title="{{$m_b->title}} Cars for Sale in Pakistan">
                            <input type="checkbox"  id="manufacture" name="model" value="{{$m_b->id}}" />
                            {{$m_b->title}} <span class="pull-right count">{{$m_b->size}}</span> </a> </label>
                        </li>
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message5">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">City</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message5" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($city_vehicles_count as $c_v_c)
                        <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                          <label class="filter-check clearfix"> <a href="#"  title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                            <input type="checkbox" id="city" name="city" value="{{$c_v_c->id}}" />
                            {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label>
                        </li>
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message6">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Registration City</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message6" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($reg_cities as $r_c)
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a href="#" rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox" id="reg_city" name="reg_city" value="{{$r_c->id}}" />
                            {{$r_c->title}} <span class="pull-right count">{{$r_c->size}}</span> </a> </label>
                        </li>
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message7">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Mileage (Km)</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message7" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <div class="range-filter clearfix">
                        <input list="milage-start" name="milage-start"  class="rng-hintify"  id="mileage_fr" maxlength="10" name="mileage_fr" placeholder="From" type="text" value="" />
                        <datalist id="milage-start">
                          <option value="0">
                          <option value="500">
                          <option value="1,000">
                          <option value="10,000">
                          <option value="20,000">
                          <option value="30,000">
                          <option value="40,000">
                          <option value="50,000">
                          <option value="60,000">
                          <option value="70,000">
                          <option value="80,000">
                          <option value="90,000">
                          <option value="100,000">
                          <option value="110,000">
                          <option value="120,000">
                          <option value="130,000">
                          <option value="140,000">
                          <option value="150,000"> 
                        </datalist>
                        <input list="milage-end" name="milage-end" class="rng-hintify" id="mileage_to" maxlength="10" name="mileage_to" placeholder="To" type="text" value="" />
                        <datalist id="milage-end">
                          <option value="1,000">
                          <option value="10,000">
                          <option value="20,000">
                          <option value="30,000">
                          <option value="40,000">
                          <option value="50,000">
                          <option value="60,000">
                          <option value="70,000">
                          <option value="80,000">
                          <option value="90,000">
                          <option value="100,000">
                          <option value="110,000">
                          <option value="120,000">
                          <option value="130,000">
                          <option value="140,000">
                          <option value="150,000">
                          <option value="250,000"> 
                        </datalist>
                        <input class="btn btn-primary pull-left" data-alias="ml" data-max-text="More" data-min-text="Less" data-name="mileage (km)" id="ml-go" name="commit" type="submit" value="Go" onclick= "filterRequest()"/>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message9">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Engine Type</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message9" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($engine_types as $e_t)
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a href="#" title="Cars for Sale in Pakistan">
                            <input type="checkbox" name="enginetype" value="{{$e_t->id}}"/>
                            {{$e_t->title}} <span class="pull-right count">{{$e_t->size}}</span> </a> </label>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!---END FILTERS------> 
          
          <!--      Only show on mobile with Dropdown        --> 
          
          <!-- Message body	-->
          
          <div class="col-md-9 search-listing pull-right " id="result">
            <div class="panel panel-primary  update-panel">
              <div class="panel-heading">
                <h3 class="panel-title col-xs-3 mobileh2 hidden-xs" style="margin-top: 5px;">Search Results</h3>
                <div class=" panel-title pull-left hidden-lg hidden-md hidden-sm">
                  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#filter" style="padding:5px !important "> Filter</button>
                  <div id="filter" class="collapse col-xs-12">
                    <div class="used-car-refine-search hidden-sm hidden-md hidden-lg">
                      <div class="sidebar-filters">
                        <div class="filter-panel-new box" data-pjax-enable>
                          <input id="selected_city_slug" name="selected_city_slug" type="hidden" />
                          <div class="accordion" id="sidebar">
                            <div class="accordion-group search-filter-heading">
                              <div class="accordion-heading"> <a class="accordion-toggle pull-left">Quick Search:</a>
                                <button type="button" class="btn btn-default pull-right" data-toggle="collapse" data-target="#filter" style="padding:5px !important "> Done</button>
                              </div>
                            </div>
                              <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f1">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Search by Keyword</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f1" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                               
                                  <input class="pr35" id="name_m" name="name_m" placeholder="e.g. Honda in Lahore" type="text" />
                                  <input class="btn btn-primary refine-go" type="button" onclick="filterRequestM()"  value="Go" />
                               
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f1">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Price Range</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f1" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix">
                                  <input list="l-price" name="l-price" class="rng-hintify" id="price_fr_m" name="price_fr" placeholder="From" type="text" value="" />
                                  <datalist id="l-price">
                                    <option value="20,000">
                                    <option value="30,000">
                                    <option value="45,000">
                                    <option value="60,000">
                                    <option value="80,000">
                                    <option value="90,000">
                                    <option value="100,000">
                                    <option value="120,000">
                                    <option value="140,000">
                                    <option value="160,000"> 
                                  </datalist>
                                  <input list="h-price" name="h-price" class="rng-hintify" maxlength="10" id="price_to_m" name="price_to" placeholder="To" type="text" value="" />
                                  <datalist id="h-price">
                                    <option value="25,000">
                                    <option value="30,000">
                                    <option value="45,000">
                                    <option value="60,000">
                                    <option value="80,000">
                                    <option value="90,000">
                                    <option value="100,000">
                                    <option value="120,000">
                                    <option value="140,000">
                                    <option value="200,000"> 
                                  </datalist>
                                  <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequestM()"/>
                                  <div class="clearfix"></div>
                                  <div id="pr_hint"></div>
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f2">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Year</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f2" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix">
                                  <input list="year-start" name="year-start" class="rng-hintify"  id="year_fr_m" maxlength="10" name="year_fr" placeholder="From" type="text" value="" />
                                  <datalist id="year-start">
                                    <option value="2001">
                                    <option value="2002">
                                    <option value="2003">
                                    <option value="2004">
                                    <option value="2005">
                                    <option value="2006">
                                    <option value="2007">
                                    <option value="2008">
                                    <option value="2009">
                                    <option value="2010">
                                    <option value="2011">
                                    <option value="2012">
                                    <option value="2013">
                                    <option value="2014">
                                    <option value="2015">
                                    <option value="2016">
                                    <option value="2017"> 
                                  </datalist>
                                  <input list="year-end" name="year-end" class="rng-hintify"  id="year_to_m" maxlength="10" name="year_to" placeholder="To" type="text" value="" />
                                  <datalist id="year-end">
                                    <option value="2002">
                                    <option value="2003">
                                    <option value="2004">
                                    <option value="2005">
                                    <option value="2006">
                                    <option value="2007">
                                    <option value="2008">
                                    <option value="2009">
                                    <option value="2010">
                                    <option value="2011">
                                    <option value="2012">
                                    <option value="2013">
                                    <option value="2014">
                                    <option value="2015">
                                    <option value="2016">
                                    <option value="2017">
                                    <option value="2018"> 
                                  </datalist>
                                  <input class="btn btn-primary pull-left"  name="commit" type="submit" value="Go" onclick="filterRequestM()"/>
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f3">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Make</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f3" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($manufacture_featured_bikes as $m_f_b)
                                  <li title="{{$m_f_b->title}} Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a href="#"  title="{{$m_f_b->title}} Cars for Sale in Pakistan">
                                      <input type="checkbox"  id="manufacture_m" name="manufacture_m" value="{{$m_f_b->id}}" />
                                      {{$m_f_b->title}} <span class="pull-right count">{{$m_f_b->size}}</span> </a> </label>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f4">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Model</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f4" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($model_bikes as $m_b)
                                  <li title="{{$m_b->title}} Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a href="#"  title="{{$m_b->title}} Cars for Sale in Pakistan">
                                      <input type="checkbox"  id="model_m" name="model_m" value="{{$m_b->id}}" />
                                      {{$m_b->title}} <span class="pull-right count">{{$m_b->size}}</span> </a> </label>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f5">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">City</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f5" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($city_vehicles_count as $c_v_c)
                                  <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                    <label class="filter-check clearfix"> <a href="#"  title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                      <input type="checkbox" id="city_m" name="city_m" value="{{$c_v_c->id}}" />
                                      {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f6">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Registration City</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f6" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($reg_cities as $r_c)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a href="#" rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox" id="reg_city_m" name="reg_city_m" value="{{$r_c->id}}" />
                                      {{$r_c->title}} <span class="pull-right count">{{$r_c->size}}</span> </a> </label>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f7">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Mileage (Km)</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f7" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix">
                                  <input list="milage-start"   class="rng-hintify"  id="mileage_fr_m" maxlength="10" name="mileage_fr_m" placeholder="From" type="text" value="" />
                                  <datalist id="milage-start">
                                    <option value="0">
                                    <option value="500">
                                    <option value="1,000">
                                    <option value="10,000">
                                    <option value="20,000">
                                    <option value="30,000">
                                    <option value="40,000">
                                    <option value="50,000">
                                    <option value="60,000">
                                    <option value="70,000">
                                    <option value="80,000">
                                    <option value="90,000">
                                    <option value="100,000">
                                    <option value="110,000">
                                    <option value="120,000">
                                    <option value="130,000">
                                    <option value="140,000">
                                    <option value="150,000"> 
                                  </datalist>
                                  <input list="milage-end"  class="rng-hintify" id="mileage_to_m" maxlength="10" name="mileage_to_m" placeholder="To" type="text" value="" />
                                  <datalist id="milage-end">
                                    <option value="0">
                                    <option value="500">
                                    <option value="1,000">
                                    <option value="10,000">
                                    <option value="20,000">
                                    <option value="30,000">
                                    <option value="40,000">
                                    <option value="50,000">
                                    <option value="60,000">
                                    <option value="70,000">
                                    <option value="80,000">
                                    <option value="90,000">
                                    <option value="100,000">
                                    <option value="110,000">
                                    <option value="120,000">
                                    <option value="130,000">
                                    <option value="140,000">
                                    <option value="150,000">
                                    <option value="250,000"> 
                                  </datalist>
                                  <input class="btn btn-primary pull-left" data-alias="ml" data-max-text="More" data-min-text="Less" data-name="mileage (km)" id="ml-go" name="commit" type="button" value="Go" onclick= "filterRequestM()"/>
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f8">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Engine Type</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f8" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($engine_types as $e_t)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a href="#" title="Cars for Sale in Pakistan">
                                      <input type="checkbox" name="enginetype_m" value="{{$e_t->id}}"/>
                                      {{$e_t->title}} <span class="pull-right count">{{$e_t->size}}</span> </a> </label>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <select class="col-xs-3 hidden-xs" style="color: gray; margin-top:0; padding:3px; margin-left:5px" name="sort_price" id="sort_price" onchange="filterRequest()">
                  <option vlaue="-1">Sort By price</option>
                  <option value="0">Low to High</option>
                  <option value="1">High to Low</option>
                </select>
                <select class="col-xs-3 mobileh2 mobileh2 hidden-lg hidden-md hidden-sm" style="color: gray; margin-top:0; padding:3px; margin-left:5px" name="sort_price" id="sort_price_m" onchange="filterRequestM()">
                  <option vlaue="-1">Sort By price</option>
                  <option value="0">Low to High</option>
                  <option value="1">High to Low</option>
                </select>
                <span class=" pull-right"> 
                <!-- Tabs -->
                <ul class="nav panel-tabs" style="bottom:0;">
                  <li class="active mobileh2"><a class="white-tab" href="#list" data-toggle="tab"><i class="fa fa-th-list"></i> List</a></li>
                  <li class=" mobileh2"><a  class="white-tab" href="#grid" data-toggle="tab"><i class="fa fa-th-large"></i> Grid</a></li>
                </ul>
                </span>
                <div class="clearfix"></div>
              </div>
              <div id="wait" style="display:none;    z-index: 9999;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>
                Loading..</div>
              <div class="panel-body update-box" style="background: #f5f5f5;">
                <div class="tab-content" id="bikes"> 
                  
                  <!--  ------------------Lists----------------------------->
                  <div class="tab-pane active" id="list" id="cars-list">
                       @if($all_bikes->isEmpty())
                <h3 style="text-align: center">No result found.</h3>
                @endif
                  <div class="col-sm-12"></div>
                  @foreach($all_bikes as $a_b)
                  <div class="col-sm-12 border m-bottom-20 " style="background: #ffffff !important;">
                    <div class=" col-xs-4">
                      <div id="content-slider" class="clr hidden-xs" >
                        <div class="wrap-slider clr"> <br>
                          
                          <!-- 	========================Thumbnail ControlNav======================================    -->
                          <?php $count=1;?>
                          @foreach($images[$a_b->id] as $img)
                          <input type="radio" id="a-{{$count++}}" name="a">
                          @endforeach
                          <nav id="main">
                            <?php $count=1;?>
                            @foreach($images[$a_b->id] as $img)
                            <label for="a-{{$count++}}" class="first"></label>
                            @endforeach </nav>
                          <!-- 	==============================================================    -->
                          <nav id="control">
                            <?php $count=1;?>
                            @foreach($images[$a_b->id] as $img)
                            <label for="a-{{$count++}}"></label>
                            @endforeach 
                            <!-- <label for="a-5" class="first"></label> --> 
                          </nav>
                          <!-- 	==============================================================    --> 
                          
                          <!-- 	IMAGE NAVIGATION pic -->
                          <?php $count=1;$index=10;?>
                          @foreach($images[$a_b->id] as $img) <span id="b-{{$count}}" class="th" tabindex="{{$index++}}"> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}"> </span> @endforeach 
                          
                          <!-- ______________IMAGES_________________________________________ -->
                          
                          <div class="slider">
                            <div class="inset">
                              <?php $count=1;?>
                              @foreach($images[$a_b->id] as $img)
                              <figure> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="f"> </figure>
                              @endforeach </div>
                          </div>
                        </div>
                      </div>
                          <img class="hidden-lg hidden-md hidden-sm row mobile-list-img" src="{{URL::asset('images'.$a_b->url)}}" alt="" id="i-{{$count++}}" > </div>
                   
                   
                    <div class="col-xs-8"><a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_b->manufacture}} {{$a_b->model}} </h2>
                      </a>
                      <h2 class="pull-right mobileh2">{{$a_b->price}}</h2>
                      <div class="clear m-bottom-10"></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_b->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}"  style="text-decoration:none;">View More</a>
                        <div class="clearfix"></div>
                      <div class="pull-left col-xs-8 col-xs-12 row" style="border-bottom:1px solid #E8E8E8;">
                        <h4 class="col-xs-6 mobileh4">@if($a_b->condition==\App\VehicleType::New_Vehicle)
                          New
                          @elseif($a_b->condition==\App\VehicleType::Almost_New_Vehicle)
                          Almost New
                          @else
                          Used
                          @endif</h4>
                        <h4  class="col-xs-4 mobileh4">{{$a_b->model_year}}</h4>
                        <h4  class="col-xs-2 mobileh4">{{$a_b->mileage}} Km</h4>
                      </div>
                      <div class="pull-left col-xs-8 col-xs-12 row   ">
                        <h4 class="col-xs-6 mobileh4">{{$a_b->engine_type}}</h4>
                      </div>
                      <br>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_b->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                  @endforeach </div>
                
                <!--  ------------------Grids----------------------------->
                <div class="tab-pane row" id="grid" id="cars-grid">
                     @if($all_bikes->isEmpty())
                <h3 style="text-align: center">No result found.</h3>
                @endif
                <div class="col-sm-12"></div>
                @foreach($all_bikes as $a_b)
                <div class="col-sm-4 col-xs-12 m-top-20">
                  <div class="port_item border">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"><a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$a_b->url) }}" alt="" /></a> @if($a_b->featured==1)
                        <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                        @endif </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}">{{$a_b->manufacture}} {{$a_b->model}}&nbsp; {{$a_b->model_year}}</a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$a_b->price}}</span></h6>
                        @if($a_b->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($a_b->condition==\App\VehicleType::Almost_New_Vehicle)
                        <h6>Condition: Almost New</h6>
                        @else
                        <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right">
                          <h6><i class="fa fa-map-marker"></i>&nbsp; {{$a_b->city}}</h6>
                        </div>
                        <a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach </div>
                 
            </div>
          </div>
        </div>
        <div id="ad-in-search-bottom" class="tlc">
          <div  class="m-top-20"> </div>
        </div>
               @if($all_bikes->lastPage()!=1)
        <div data-pjax-enable id="p_l">
          <ul class="pagination search-pagi" id="paginate">
            {{$all_bikes->links()}}
          </ul>
        </div>
               @else
               <div data-pjax-enable id="p_l" style="display: none">
          <ul class="pagination search-pagi" id="paginate">
            {{$all_bikes->links()}}
          </ul>
        </div>
               
               @endif
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
    
    //////////////////////update model////////////////////////
  /////////////////////////////////////////////////////////
$(function () {
    $('#make').change(function () {
     
      var data = {'make': $(this).val()};
      $.get('/getBikeModelByMake', data, function (data) {
        var model = $('#model');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Bike Model' + "</option>");
        
        $.each(data, function (index, element) {
            console.log(element);
          model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
      });
    });
  });
  
  $(function() {
    $('#city').change(function() {
        var data = { 'city': $(this).val() };
        
        $.get('/getAreaByCity', data, function (data) {
           var model = $('#city_area');
                   model.empty();
                    model.append("<option value='' disabled selected>" + 'City Area' + "</option>");
        
                   $.each(data, function(index, element) {
                     //alert(element.title);
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                        
                    });
                   
        });
    });
});
  

  
  
   function filterRequest()
  {
    
    $('wait').show();
   var city = [];
   $.each($("input[name='city']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
   

   var reg_city=[];
   $.each($("input[name='reg_city']:checked"), function(){            
                reg_city.push($(this).val());
            });//alert("reg_city :"+reg_city.length);
   

   var manufacture=[];
   $.each($("input[name='manufacture']:checked"), function(){            
                manufacture.push($(this).val());
            });//alert("manufacture :"+manufacture.length);
   

   var model=[];
   $.each($("input[name='model']:checked"), function(){            
                model.push($(this).val());
            });//alert("model :"+model.length);
  

   

   var enginetype=[];
   $.each($("input[name='enginetype']:checked"), function(){            
                enginetype.push($(this).val());
            });//alert("enginetype :"+enginetype.length);
   

   var price_fr=$("#price_fr").val();
   var price_to=$("#price_to").val();

   var year_fr=$("#year_fr").val();
   var year_to=$("#year_to").val();

  
   var mileage_fr=$("#mileage_fr").val();
   var mileage_to=$("#mileage_to").val();
   
   var sort_price=$("#sort_price").val();
   var name=$("#name").val();


   var data = {'name':name,'sort_price':sort_price,'city': city,'reg_city':reg_city,'manufacture':manufacture,'enginetype':enginetype,'model':model,'price_fr':price_fr,'price_to':price_to,'year_fr':year_fr,'year_to':year_to,'mileage_fr':mileage_fr,'mileage_to':mileage_to};


   $.get('/updateAllBikes', data, function (data) {
        
        document.getElementById("bikes").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
       if(document.getElementById("link").value!="")
        {
            document.getElementById('p_l').style.display='block';
        } 
        $('#wait').hide();
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   }
   
   function filterRequestM()
  {
    
    $('wait').show();
   var city = [];
   $.each($("input[name='city_m']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
   

   var reg_city=[];
   $.each($("input[name='reg_city_m']:checked"), function(){            
                reg_city.push($(this).val());
            });//alert("reg_city :"+reg_city.length);
   

   var manufacture=[];
   $.each($("input[name='manufacture_m']:checked"), function(){            
                manufacture.push($(this).val());
            });//alert("manufacture :"+manufacture.length);
   

   var model=[];
   $.each($("input[name='model_m']:checked"), function(){            
                model.push($(this).val());
            });//alert("model :"+model.length);
  

   

   var enginetype=[];
   $.each($("input[name='enginetype_m']:checked"), function(){            
                enginetype.push($(this).val());
            });//alert("enginetype :"+enginetype.length);
   

   var price_fr=$("#price_fr_m").val();
   var price_to=$("#price_to_m").val();

   var year_fr=$("#year_fr_m").val();
   var year_to=$("#year_to_m").val();

  
   var mileage_fr=$("#mileage_fr_m").val();
   var mileage_to=$("#mileage_to_m").val();
   
   var sort_price=$("#sort_price_m").val();
    var name=$("#name_m").val();


   var data = {'name':name,'sort_price':sort_price,'city': city,'reg_city':reg_city,'manufacture':manufacture,'enginetype':enginetype,'model':model,'price_fr':price_fr,'price_to':price_to,'year_fr':year_fr,'year_to':year_to,'mileage_fr':mileage_fr,'mileage_to':mileage_to};


   $.get('/updateAllBikes', data, function (data) {
        
        document.getElementById("bikes").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
       if(document.getElementById("link").value!="")
        {
            document.getElementById('p_l').style.display='block';
        } 
        $('#wait').hide();
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
        
        window.location.href="#bikes";
      });


   }
 

</script> 
@endsection