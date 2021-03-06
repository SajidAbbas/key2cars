@extends('websiteMasterView')

@section('title')
Car for Sale in Pakistan|Key2Cars
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
  <!--<li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
  
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

<!--<div class="" id="main-container">
  <form class="form-horizontal hidden-lg hidden-xs hidden-md hidden-sm" id="searchForm" method="post" action="http://localhost:8000/Cars/Serach#result" role="form">
    <h2 style="text-align:center;">Find Cars for Sale in Pakistan</h2>
    <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-left:0;">
      <div class="row">
        <select class="quick-search c-form__select pointer" name="make" id="make">
          <option class="pr-text " value="-1">Car Make</option>
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
          <option value="-1" selected="">Car Model</option>
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
        <input type="checkbox" value="2" checked="checked" name="condition" id="condition" class="c-form__checkbox pull-left pointer">
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
</div>-->
<!--<div class="" id="main-container">
  <section class="search-main hidden-xs search-form">
    <div class="container">
    <div class="search-main " style="position: relative; background: none">
    <div id="top-search-heading" class="head">
      <h1>Find featured cars for sale in Pakistan</h1>
      <p style="color: grey">View our featured cars.</p>
    </div>
    <div class="" tabindex="0">
    <div id="used-cars">
    <form method="post" action="{{route('searchFeaturedCarsByAllFilters')}}#result"" >
      {{ csrf_field() }}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
        <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" name="make" id="make" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" >Car Make</option>
            <optgroup label="Popular Brands ">
            @foreach($make as $m)
            @if($m->popular==1)
            
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            
            @endif
            @endforeach
             </optgroup>
            <optgroup label="Other Brands ">
            @foreach($make as $m)
             @if($m->popular==0)
            
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            
            @endif
            @endforeach
             </optgroup>
          </select>
        </li>
        <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important; height: 40px;" name="model" id="model" class="c-form__select"  >
            ;
            
            <option   value="-1" >Car Model</option>
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
        <input type="checkbox" value="{{\App\VehicleType::Any}}" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left" >
        <label class="checkbox pull-left" style="margin-right: 24px;">Any</label>
        <input type="checkbox" value="{{\App\VehicleType::New_Vehicle}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left" >
        <label class="checkbox pull-left" style="margin-right: 24px;">New </label>
        <input type="checkbox"  value="{{\App\VehicleType::Almost_New_Vehicle}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left">
        <label class="checkbox pull-left" style="margin-right: 24px;"> Almost New</label>
        <input type="checkbox"  value="{{\App\VehicleType::Used_Vehicle}}" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left">
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
            <select style="background:#FFFFFF !important; height: 40px;" class="c-form__select" name="city_area" id="city_area"  tabindex="1" >
              <i class="fa fa fa-angle-down pull-right"></i>
              <option   value=""  disabled="disabled">City Area</option>
            </select>
          </li>
          <li class="nomargin">
            <legend class="nomargin">Transmission</legend>
          </li>
          <li class="nomargin">
            <legend class="nomargin">Mileage</legend>
          </li>
          <li>
            <select id="transmission" name="transmission" class="chzn-select c-form__select">
              <option value="" disabled="disabled" >All Transmission Types</option>
              
  @foreach($transmissions as $t)


              <option value="{{$t->id}}">{{$t->title}}</option>
              
@endforeach
<i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
          <li>
            <select class="c-form__select_48" name="mileage_fr" id="mileage_fr" style="width: 48%;">
              <option value="" disabled="disabled">From</option>
              <option value="10000">10,000 km</option>
              <option value="20000">20,000 km</option>
              <option value="30000">30,000 km</option>
            </select>
            <select class="c-form__select_48 pull-right" name="mileage_to" id="mileage_to" style="width: 48%;">
              <option value="" disabled="disabled">To</option>
              <option value="10000">10,000 km</option>
              <option value="20000">20,000 km</option>
            </select>
          </li>
        </ul>
        <ul class="search-fields search-fields3 clearfix">
          <li class="nomargin">
            <legend class="nomargin">Engine Details</legend>
          </li>
          <li class="nomargin">
            <legend class="nomargin">Engine Capacity</legend>
          </li>
          <li class="nomargin">
            <legend class="nomargin">Year</legend>
          </li>
          <li>
            <select style="background:#FFFFFF !important;" name="engine_type" id="engine_type" class="chzn-select c-form__select" tabindex="1">
              <option  class="pr-text" value="" disabled="disabled"  >All Engine Types</option>
              
             @foreach($engine_types as $e_t)
        
              <option value="{{$e_t->id}}">{{$e_t->title}}</option>
              
        @endforeach
            <i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
          <li>
            <select class="c-form__select_48" name="capacity_fr" id="capacity_fr" style="width: 48%;">
              <option value="" disabled="disabled">From</option>
              <option value="600">600 cc</option>
              <option value="800">800 cc</option>
            </select>
            <select class="c-form__select_48 pull-right" name="capacity_to" id="capacity_to" style="width: 48%;" >
              <option value="" disabled="disabled">To</option>
              <option value="600">600 cc</option>
              <option value="800">800 cc</option>
              <option value="1000">1,000 cc</option>
              <option value="1200">1,200 cc</option>
              <option value="1400">1,400 cc</option>
            </select>
          </li>
          <li>
            <select class="c-form__select_48" id="year_fr" name="year_fr" style="width: 48%;">
              <option value="" disabled="disabled">From</option>
              
@foreach($model_year as $m_y)

              <option value="{{$m_y->id}}">{{$m_y->year}}</option>
              
@endforeach

	
            </select>
            <select class="c-form__select_48 pull-right"  id="year_to" name="year_to" style="width: 48%;">
              <option value="" disabled="disabled">To</option>
              
@foreach($model_year as $m_y)

              <option value="{{$m_y->id}}">{{$m_y->year}}</option>
              
@endforeach


            </select>
          </li>
        </ul>
        <legend class="nomargin">Other Details</legend>
        <ul class="search-fields search-fields3 clearfix">
          <li>
            <select style="background:#FFFFFF !important;" name="body_type" id="body_type" class="chzn-select c-form__select" tabindex="1">
              <option  class="pr-text" value=""disabled="disabled" >All body types</option>
              
             @foreach($body_types as $b_t)
        
              <option value="{{$b_t->id}}">{{$b_t->title}}</option>
              
        @endforeach
            <i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
          <li>
            <select class="chzn-select c-form__select"  name="color" id="color">
              <option value="" disabled="disabled" >Color</option>
              
 @foreach($colors as $c)

              <option value="{{$c->id}}">{{$c->title}}</option>
              
@endforeach
 <i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
          <li>
            <select name="reg_city" id="reg_city" class="chzn-select c-form__select">
              <option value="" disabled="disabled"  >Registration City</option>
              <option value="unregistered">Un-Registered</option>
              
        
        @foreach($reg_cities as $c)
        
              <option value="{{$c->id}}">{{$c->title}}</option>
              
       @endforeach
        <i class="fa fa fa-angle-down pull-right"></i>
            </select>
          </li>
        </ul>
        <ul class="search-fields search-fields3 clearfix">
          <li>
            <select id="assembly" name="assembly" class="chzn-select c-form__select">
              <option value="" disabled="disabled" >All Assembly Types</option>
              
@foreach($assemblies as $a)


              <option value="{{$a->id}}">{{$a->title}}</option>
              
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
  </section>
</div>-->
<section>
  <div class="container">
    <div class="used-car-search-results">
      <h1>Featured  Cars By City | Make <span style="font-weight: normal;"></span></h1>
      <div class="related_searches primary-lang" data-pjax-enable>
        <hr class="mb0" />
        <div class="p15 fs12">
          <ul class="list-unstyled nomargin row generic-light-grey">
            @foreach($city_vehicles_count as $c_v_c)
            <li class="col-md-3"> <a  href="{{Route('/FeaturedCarsByCity', ['id' => $c_v_c->id])}}#result" id="{{$c_v_c->id}}" title="Cars for sale in {{$c_v_c->title}}">Cars {{$c_v_c->title}}</a> ({{$c_v_c->size}}) </li>
            @endforeach
          </ul>
        </div>
        <hr class="nomargin"/>
        <div class="p15 fs12">
          <ul class="list-unstyled nomargin row generic-light-grey" >
            @foreach($manufacture_featured_cars as $m_f_c)
            <li class="col-md-3"> <a href="{{Route('/FeaturedCarsByManufacture', ['id' => $m_f_c->id])}}#result" id="{{$m_f_c->id}}" title="{{$m_f_c->title}} Cars for sale in Pakistan">{{$m_f_c->title}} Cars</a> ({{$m_f_c->size}}) </li>
            @endforeach
          </ul>
        </div>
        <hr class="nomargin"/>
      </div>
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
                      <div class="range-filter clearfix" >
                        <input list="l-price" name="l-price" class="rng-hintify" id="price_fr" name="price_fr" placeholder="From" type="text" value="" />
                        <datalist id="l-price">
                          <option value="200,000">
                          <option value="400,000">
                          <option value="600,000">
                          <option value="800,000">
                          <option value="1,000,000">
                          <option value="1,200,000">
                          <option value="1,400,000">
                          <option value="1,600,000">
                          <option value="1,800,000">
                          <option value="2,000,000"> 
                        </datalist>
                        <input list="h-price" name="h-price" class="rng-hintify" maxlength="10" id="price_to" name="price_to" placeholder="To" type="text" value="" />
                        <datalist id="h-price">
                          <option value="400,000">
                          <option value="600,000">
                          <option value="800,000">
                          <option value="1,000,000">
                          <option value="1,200,000">
                          <option value="1,400,000">
                          <option value="1,600,000">
                          <option value="1,800,000">
                          <option value="2,000,000">
                          <option value="2,200,000">
                          <option value="2,500,000">
                          <option value="3,000,000"> 
                        </datalist>
                        <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequest()" />
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
                        <input class="btn btn-primary pull-left" data-alias="yr" data-max-text="Later" data-min-text="Earlier" data-name="year" id="yr-go" name="commit" type="submit" value="Go" onclick="filterRequest()" />
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message13">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Condition </p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message13" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled has-picture-new" onchange="filterRequest()">
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox"  id="condition_filter" name="condition_filter" value="{{\App\VehicleType::New_Vehicle}}" class="pull-left" >
                            &nbsp;&nbsp;New<span class="pull-right count"></span>
                            </input>
                          </label>
                        </li>
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox"  id="condition_filter" name="condition_filter" value="{{\App\VehicleType::Almost_New_Vehicle}}" class="pull-left" >
                            &nbsp;&nbsp;Almost New<span class="pull-right count"></span>
                            </input>
                          </label>
                        </li>
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox"  id="condition_filter" name="condition_filter" value="{{\App\VehicleType::Used_Vehicle}}" class="pull-left" >
                            &nbsp;&nbsp;Used<span class="pull-right count"></span>
                            </input>
                          </label>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
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
                        @foreach($manufacture_cars as $m_f_c)
                        <li title="{{$m_f_c->title}} Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a   title="{{$m_f_c->title}} Cars for Sale in Pakistan">
                            <input type="checkbox"  id="manufacture" name="manufacture" value="{{$m_f_c->id}}" >
                            {{$m_f_c->title}} <span class="pull-right count">{{$m_f_c->size}}</span> </a> </label>
                          </input>
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
                        
                        @if($checked[0]=="city"&&$checked[1]==$c_v_c->id)
                        <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                          <label class="filter-check clearfix"> <a   title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                            <input type="checkbox" id="city" name="city" checked="checked" value="{{$c_v_c->id}}" >
                            {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label>
                          </input>
                        </li>
                        @else
                        <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                          <label class="filter-check clearfix"> <a   title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                            <input type="checkbox" id="city" name="city" value="{{$c_v_c->id}}" >
                            {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label>
                          </input>
                        </li>
                        @endif
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
                          <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox" id="reg_city" name="reg_city" value="{{$r_c->id}}" >
                            {{$r_c->title}} <span class="pull-right count">{{$r_c->size}}</span> </a> </label>
                          </input>
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
                      <div class="range-filter clearfix" >
                        <input list="milage-start" name="milage-start"  class="rng-hintify"  id="mileage_fr" maxlength="10" name="mileage_fr" placeholder="From" type="text" value="" />
                        <datalist id="milage-start">
                          <option value="0">
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
                        <input class="btn btn-primary pull-left" data-alias="ml" data-max-text="More" data-min-text="Less" data-name="mileage (km)" id="ml-go" name="commit" type="submit" value="Go" onclick="filterRequest()"/>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message8">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Transmission</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message8" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($transmissions as $t)
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox" id="transmission" name="transmission" value="{{$t->id}}" >
                            {{$t->title}} <span class="pull-right count">{{$t->size}}</span> </a> </label>
                          </input>
                        </li>
                        @endforeach
                      </ul>
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
                          <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox" id="enginetype" name="enginetype" value="{{$e_t->id}}"  >
                            {{$e_t->title}} <span class="pull-right count">{{$e_t->size}}</span> </a> </label>
                          </input>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message10">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Assembly</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message10" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($assemblies as $a)
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox" id="assembly" name="assembly" value="{{$a->id}}" >
                            {{$a->title}}<span class="pull-right count">{{$a->size}}</span> </a> </label>
                          </input>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message11">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Engine Capacity (cc)</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message11" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <div class="range-filter clearfix">
                        <input list="cc-start" name="cc-start" class="rng-hintify"  id="capacity_fr" maxlength="10" name="capacity_fr" placeholder="From" type="text" value="" />
                        <datalist id="cc-start">
                          <option value="600">
                          <option value="700">
                          <option value="800">
                          <option value="900">
                          <option value="1000">
                          <option value="1100">
                          <option value="1200">
                          <option value="1300">
                          <option value="1400">
                          <option value="1500">
                          <option value="1600">
                          <option value="1700">
                          <option value="1800"> 
                        </datalist>
                        <input list="cc-end" name="cc-end" class="rng-hintify"  id="capacity_to" maxlength="10" name="capacity_to" placeholder="To" type="text" value="" />
                        <datalist id="cc-end">
                          <option value="600">
                          <option value="700">
                          <option value="800">
                          <option value="900">
                          <option value="1000">
                          <option value="1100">
                          <option value="1200">
                          <option value="1300">
                          <option value="1400">
                          <option value="1500">
                          <option value="1600">
                          <option value="1700">
                          <option value="1800"> 
                        </datalist>
                        <input class="btn btn-primary pull-left" data-alias="ec" data-max-text="More" data-min-text="Less" data-name="engine capacity (cc)" id="ec-go" name="commit" type="submit" value="Go" onclick="filterRequest()" />
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message12">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Color</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message12" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($colors as $c)
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox" id="color" name="color" value="{{$c->id}}">
                            {{$c->title}}<span class="pull-right count">{{$c->size}}</span> </a> </label>
                          </input>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message13">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Body Type </p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message133" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message133" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled has-picture-new" onchange="filterRequest()">
                        @foreach($body_types as $b_t)
                        @if($checked[0]=="bodyType"&&$checked[1]==$b_t->id)
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox"  checked="checked" id="bodytype" name="bodytype" value="{{$b_t->id}}" class="pull-left" >
                            {{$b_t->title}}<span class="pull-right count">{{$b_t->size}}</span>
                            </input>
                            </a> </label>
                        </li>
                        @else
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                            <input type="checkbox"  id="bodytype" name="bodytype" value="{{$b_t->id}}" class="pull-left" >
                            {{$b_t->title}}<span class="pull-right count">{{$b_t->size}}</span>
                            </input>
                            </a> </label>
                        </li>
                        @endif
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
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
            <div class="panel panel-primary update-panel" >
              <div class="panel-heading">
                <h3 class="panel-title col-xs-3 mobileh2 hidden-xs" style="margin-top: 5px;">Search Results</h3>
                <div class=" panel-title pull-left hidden-lg hidden-md hidden-sm">
                  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#filter" style="padding:5px !important "> Filter</button>
                  <div id="filter" class="collapse col-xs-12">
                    <div class=" used-car-refine-search ">
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
                                  <input class="btn btn-primary refine-go" type="button" onclick="filterRequestM()" value="Go" />
                              
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f2">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Price Range</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f2" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix" >
                                  <input list="l-price" name="l-price" class="rng-hintify" id="price_fr" name="price_fr_m" placeholder="From" type="text" value="" />
                                  <datalist id="l-price">
                                    <option value="200,000">
                                    <option value="400,000">
                                    <option value="600,000">
                                    <option value="800,000">
                                    <option value="1,000,000">
                                    <option value="1,200,000">
                                    <option value="1,400,000">
                                    <option value="1,600,000">
                                    <option value="1,800,000">
                                    <option value="2,000,000"> 
                                  </datalist>
                                  <input list="h-price" name="h-price" class="rng-hintify" maxlength="10" id="price_to_m" name="price_to" placeholder="To" type="text" value="" />
                                  <datalist id="h-price">
                                    <option value="400,000">
                                    <option value="600,000">
                                    <option value="800,000">
                                    <option value="1,000,000">
                                    <option value="1,200,000">
                                    <option value="1,400,000">
                                    <option value="1,600,000">
                                    <option value="1,800,000">
                                    <option value="2,000,000">
                                    <option value="2,200,000">
                                    <option value="2,500,000">
                                    <option value="3,000,000"> 
                                  </datalist>
                                  <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequestM()" />
                                  <div class="clearfix"></div>
                                  <div id="pr_hint"></div>
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f3">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Year</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f3" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
                                  <input class="btn btn-primary pull-left" data-alias="yr" data-max-text="Later" data-min-text="Earlier" data-name="year" id="yr-go" name="commit" type="submit" value="Go" onclick="filterRequestM()" />
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f4">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Condition </p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f4" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled has-picture-new" onchange="filterRequestM()">
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox"  id="condition_filter_m" name="condition_filter_m" value="{{\App\VehicleType::New_Vehicle}}" class="pull-left" >
                                      <span class=" count">&nbsp;&nbsp;New</span>
                                      </input>
                                    </label>
                                  </li>
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox"  id="condition_filter_m" name="condition_filter_m" value="{{\App\VehicleType::Almost_New_Vehicle}}" class="pull-left" >
                                      <span class=" count">&nbsp;&nbsp;Almost New</span>
                                      </input>
                                    </label>
                                  </li>
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox"  id="condition_filter_m" name="condition_filter_m" value="{{\App\VehicleType::Used_Vehicle}}" class="pull-left" >
                                      <span class=" count">&nbsp;&nbsp;Used</span>
                                      </input>
                                    </label>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f5">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Make</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f5" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($manufacture_cars as $m_f_c)
                                  <li title="{{$m_f_c->title}} Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a   title="{{$m_f_c->title}} Cars for Sale in Pakistan">
                                      <input type="checkbox"  id="manufacture_m" name="manufacture_m" value="{{$m_f_c->id}}" >
                                      {{$m_f_c->title}} <span class="pull-right count">{{$m_f_c->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f6">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">City</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f6" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            
                            <div id="f6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($city_vehicles_count as $c_v_c)
                                  
                                  @if($checked[0]=="city"&&$checked[1]==$c_v_c->id)
                                  <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                    <label class="filter-check clearfix"> <a   title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                      <input type="checkbox" id="city_m" name="city_m" checked="checked" value="{{$c_v_c->id}}" >
                                      {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @else
                                  <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                    <label class="filter-check clearfix"> <a   title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                      <input type="checkbox" id="city_m" name="city_m" value="{{$c_v_c->id}}" >
                                      {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endif
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f7">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Registration City</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f7" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($reg_cities as $r_c)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox" id="reg_city_m" name="reg_city_m" value="{{$r_c->id}}" >
                                      {{$r_c->title}} <span class="pull-right count">{{$r_c->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f8">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Mileage (Km)</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f8" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix" >
                                  <input list="milage-start" name="milage-start"  class="rng-hintify"  id="mileage_fr_m" maxlength="10" name="mileage_fr" placeholder="From" type="text" value="" />
                                  <datalist id="milage-start">
                                    <option value="0">
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
                                  <input list="milage-end" name="milage-end" class="rng-hintify" id="mileage_to_m" maxlength="10" name="mileage_to" placeholder="To" type="text" value="" />
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
                                  <input class="btn btn-primary pull-left" data-alias="ml" data-max-text="More" data-min-text="Less" data-name="mileage (km)" id="ml-go" name="commit" type="submit" value="Go" onclick="filterRequestM()"/>
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f9">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Transmission</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f9" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($transmissions as $t)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox" id="transmission" name="transmission_m" value="{{$t->id}}" >
                                      {{$t->title}} <span class="pull-right count">{{$t->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f10">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Engine Type</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f10" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($engine_types as $e_t)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox" id="enginetype_m" name="enginetype_m" value="{{$e_t->id}}"  >
                                      {{$e_t->title}} <span class="pull-right count">{{$e_t->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f11">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Assembly</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f11" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($assemblies as $a)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox" id="assembly_m" name="assembly_m" value="{{$a->id}}" >
                                      {{$a->title}}<span class="pull-right count">{{$a->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f12">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Engine Capacity (cc)</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f12" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix">
                                  <input list="cc-start" name="cc-start" class="rng-hintify"  id="capacity_fr_m" maxlength="10" name="capacity_fr" placeholder="From" type="text" value="" />
                                  <datalist id="cc-start">
                                    <option value="600">
                                    <option value="700">
                                    <option value="800">
                                    <option value="900">
                                    <option value="1000">
                                    <option value="1100">
                                    <option value="1200">
                                    <option value="1300">
                                    <option value="1400">
                                    <option value="1500">
                                    <option value="1600">
                                    <option value="1700">
                                    <option value="1800"> 
                                  </datalist>
                                  <input list="cc-end" name="cc-end" class="rng-hintify"  id="capacity_to_m" maxlength="10" name="capacity_to" placeholder="To" type="text" value="" />
                                  <datalist id="cc-end">
                                    <option value="600">
                                    <option value="700">
                                    <option value="800">
                                    <option value="900">
                                    <option value="1000">
                                    <option value="1100">
                                    <option value="1200">
                                    <option value="1300">
                                    <option value="1400">
                                    <option value="1500">
                                    <option value="1600">
                                    <option value="1700">
                                    <option value="1800"> 
                                  </datalist>
                                  <input class="btn btn-primary pull-left" data-alias="ec" data-max-text="More" data-min-text="Less" data-name="engine capacity (cc)" id="ec-go" name="commit" type="submit" value="Go" onclick="filterRequestM()" />
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f13">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Color</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f13" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($colors as $c)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox" id="color_m" name="color_m" value="{{$c->id}}">
                                      {{$c->title}}<span class="pull-right count">{{$c->size}}</span> </a> </label>
                                    </input>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f14">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Body Type </p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f14" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled has-picture-new" onchange="filterRequestM()">
                                  @foreach($body_types as $b_t)
                                  @if($checked[0]=="bodyType"&&$checked[1]==$b_t->id)
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox"  checked="checked" id="bodytype_m" name="bodytype_m" value="{{$b_t->id}}" class="pull-left" >
                                      {{$b_t->title}}<span class="pull-right count">{{$b_t->size}}</span>
                                      </input>
                                      </a> </label>
                                  </li>
                                  @else
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                                      <input type="checkbox"  id="bodytype" name="bodytype_m" value="{{$b_t->id}}" class="pull-left" >
                                      {{$b_t->title}}<span class="pull-right count">{{$b_t->size}}</span>
                                      </input>
                                      </a> </label>
                                  </li>
                                  @endif
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
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
              <div class="clear"></div>
              <div id="wait" style="display:none;z-index: 9999;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>
                Loading..</div>
              <div class="panel-body update-box" >
                <div class="tab-content" id="paginate_result"> 
                  
                  <!--  ------------------Lists----------------------------->
                  <div class="tab-pane  active" id="list" id="cars-list">
                       @if($all_cars->isEmpty())
                <h3 style="text-align: center">No result found.</h3>
                @endif
                  <div class="col-sm-12"></div>
                  @foreach($all_cars as $a_c)
                  <div class="col-sm-12 border m-bottom-20" style="background: white;">
                    <div class=" col-xs-4">
                      <div id="content-slider" class="clr hidden-xs">
                        <div class="wrap-slider clr"> <br>
                          
                          <!-- 	========================Thumbnail ControlNav======================================    -->
                          <?php $count=1;?>
                          @foreach($images[$a_c->id] as $img)
                          <input type="radio" id="a-{{$count++}}" name="a">
                          @endforeach
                          <nav id="main">
                            <?php $count=1;?>
                            @foreach($images[$a_c->id] as $img)
                            <label for="a-{{$count++}}" class="first"></label>
                            @endforeach </nav>
                          <!-- 	==============================================================    -->
                          <nav id="control">
                            <?php $count=1;?>
                            @foreach($images[$a_c->id] as $img)
                            <label for="a-{{$count++}}"></label>
                            @endforeach 
                            <!-- <label for="a-5" class="first"></label> --> 
                          </nav>
                          <!-- 	==============================================================    --> 
                          
                          <!-- 	IMAGE NAVIGATION pic -->
                          <?php $count=1;$index=10;?>
                          @foreach($images[$a_c->id] as $img) <span id="b-{{$count}}" class="th" tabindex="{{$index++}}"> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}"> </span> @endforeach 
                          
                          <!-- ______________IMAGES_________________________________________ -->
                          
                          <div class="slider">
                            <div class="inset">
                              <?php $count=1;?>
                              @foreach($images[$a_c->id] as $img)
                              <figure> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="f"> </figure>
                              @endforeach </div>
                          </div>
                        </div>
                      </div>
                      <img class="hidden-lg hidden-md hidden-sm row mobile-list-img" src="{{URL::asset('images'.$a_c->url)}}" alt="" id="i-{{$count++}}"> </div>
                    <div class="col-xs-8"><a href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_c->manufacture}} {{$a_c->model}} {{$a_c->model_version}}</h2>
                      </a>
                      <h2 class="pull-right mobileh2">PKR {{$a_c->price}}</h2>
                      <div class="clear m-bottom-10"></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_c->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a>
                      <div class="clearfix"></div>
                      <div class="pull-left col-sm-8 col-xs-12 row" style="border-bottom:1px solid #E8E8E8;">
                        <h4 class="col-xs-6 mobileh4">@if($a_c->condition==\App\VehicleType::New_Vehicle)
                          New
                          @elseif($a_c->condition==\App\VehicleType::Almost_New_Vehicle)
                          Almost New
                          @else
                          Used
                          @endif</h4>
                        <h4  class="col-xs-4 mobileh4">{{$a_c->year}}</h4>
                        <h4  class="col-xs-2 mobileh4">{{$a_c->mileage}}Km</h4>
                      </div>
                      <div class="pull-left col-sm-8 col-xs-12 row">
                        <h4 class="col-xs-6 mobileh4">{{$a_c->engine_type}}</h4>
                        <h4 class="col-xs-4 mobileh4">{{$a_c->engine_capacity}}CC</h4>
                        <h4 class="col-xs-2 mobileh4">{{$a_c->transmission}}</h4>
                      </div>
                      <br>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_c->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                  @endforeach </div>
                
                <!--  ------------------Grids----------------------------->
                <div class="tab-pane " id="grid" id="cars-grid">
                     @if($all_cars->isEmpty())
                <h3 style="text-align: center">No result found.</h3>
                @endif
                <div class="col-sm-12"></div>
                @foreach($all_cars as $a_c)
                <div class="col-sm-4 col-xs-12 m-top-20">
                  <div class="port_item border">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"><a href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$a_c->url) }}" alt="" /></a> @if($a_c->featured==1)
                        <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                        @endif </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}">{{$a_c->manufacture}} {{$a_c->model}} {{$a_c->model_version}}&nbsp; {{$a_c->year}}</a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$a_c->price}}</span></h6>
                        @if($a_c->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($a_c->condition==\App\VehicleType::Almost_New_Vehicle)
                        <h6>Condition: Almost New</h6>
                        @else
                        <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right">
                          <h6><i class="fa fa-map-marker"></i>&nbsp; {{$a_c->city}}</h6>
                        </div>
                        <a href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
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
               @if($all_cars->lastPage()!=1)
        <div data-pjax-enable id="p_l">
          <ul class="pagination search-pagi" id="paginate">
            {{$all_cars->links()}}
          </ul>
        </div>
               @else
               <div data-pjax-enable id="p_l" style="display: none">
          <ul class="pagination search-pagi" id="paginate">
            {{$all_cars->links()}}
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
      $.get('/getModelByMake', data, function (data) {
        var model = $('#model');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Car Model' + "</option>");
        
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
                    
  
                   $.each(data, function(index, element) {
                     //alert(element.title);
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                        
                    });
                   
        });
    });
});
  
  
  
  
  
  function filterRequest()
  {
    $('#wait').show();
   var city = [];
   $.each($("input[name='city']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
   
 var condition=[];
   $.each($("input[name='condition_filter']:checked"), function(){            
                condition.push($(this).val());
            });//alert("reg_city :"+reg_city.length);

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
  

   var transmission=[];
   $.each($("input[name='transmission']:checked"), function(){            
                transmission.push($(this).val());
            });//alert("transmission :"+transmission.length);
   

   var assembly=[];
   $.each($("input[name='assembly']:checked"), function(){            
                assembly.push($(this).val());
            });//alert("assembly :"+assembly.length);
   
   var color=[];
   $.each($("input[name='color']:checked"), function(){            
                color.push($(this).val());
            });//alert("color :"+color.length);
   

   var bodytype=[];
   $.each($("input[name='bodytype']:checked"), function(){            
                bodytype.push($(this).val());
            });//alert("bodytype :"+bodytype.length);
   

   var enginetype=[];
   $.each($("input[name='enginetype']:checked"), function(){            
                enginetype.push($(this).val());
            });//alert("enginetype :"+enginetype.length);
   

   var price_fr=$("#price_fr").val();
   var price_to=$("#price_to").val();

   var year_fr=$("#year_fr").val();
   var year_to=$("#year_to").val();

   var capacity_fr=$("#capacity_fr").val();
   var capacity_to=$("#capacity_to").val();

   var mileage_fr=$("#mileage_fr").val();
   var mileage_to=$("mileage_to").val();
   
   var sort_price=$('#sort_price').val();
   var name=$("#name").val();


   var data = {'name':name,'sort_price':sort_price,'city': city,'condition':condition,'reg_city':reg_city,'manufacture':manufacture,'transmission':transmission,'assembly':assembly,'enginetype':enginetype,'color':color,'model':model,'bodytype':bodytype,'price_fr':price_fr,'price_to':price_to,'year_fr':year_fr,'year_to':year_to,'capacity_fr':capacity_fr,'capacity_to':capacity_to,'mileage_fr':mileage_fr,'mileage_to':mileage_to};


   $.get('/updateCars', data, function (data) {
       console.log(data);
        if(data==="")
        { document.getElementById("paginate_result").innerHTML="No cars found";
            $('#wait').hide();
        }
        
        else
        {
        document.getElementById("paginate_result").innerHTML = data;
        
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
      if(document.getElementById("link").value!="")
        {
            document.getElementById('p_l').style.display='block';
        }  
        
            $('#wait').hide();
    }
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   
      
    

  }
  
   function filterRequestM()
  {
    $('#wait').show();
   var city = [];
   $.each($("input[name='city_m']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
   
 var condition=[];
   $.each($("input[name='condition_filter_m']:checked"), function(){            
                condition.push($(this).val());
            });//alert("reg_city :"+reg_city.length);

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
  

   var transmission=[];
   $.each($("input[name='transmission_m']:checked"), function(){            
                transmission.push($(this).val());
            });//alert("transmission :"+transmission.length);
   

   var assembly=[];
   $.each($("input[name='assembly_m']:checked"), function(){            
                assembly.push($(this).val());
            });//alert("assembly :"+assembly.length);
   
   var color=[];
   $.each($("input[name='color_m']:checked"), function(){            
                color.push($(this).val());
            });//alert("color :"+color.length);
   

   var bodytype=[];
   $.each($("input[name='bodytype_m']:checked"), function(){            
                bodytype.push($(this).val());
            });//alert("bodytype :"+bodytype.length);
   

   var enginetype=[];
   $.each($("input[name='enginetype_m']:checked"), function(){            
                enginetype.push($(this).val());
            });//alert("enginetype :"+enginetype.length);
   

   var price_fr=$("#price_fr_m").val();
   var price_to=$("#price_to_m").val();

   var year_fr=$("#year_fr_m").val();
   var year_to=$("#year_to_m").val();

   var capacity_fr=$("#capacity_fr_m").val();
   var capacity_to=$("#capacity_to_m").val();

   var mileage_fr=$("#mileage_fr_m").val();
   var mileage_to=$("mileage_to_m").val();
   
   var sort_price=$('#sort_price_m').val();
   var name=$("#name_m").val();


   var data = {'name':name,'sort_price':sort_price,'city': city,'condition':condition,'reg_city':reg_city,'manufacture':manufacture,'transmission':transmission,'assembly':assembly,'enginetype':enginetype,'color':color,'model':model,'bodytype':bodytype,'price_fr':price_fr,'price_to':price_to,'year_fr':year_fr,'year_to':year_to,'capacity_fr':capacity_fr,'capacity_to':capacity_to,'mileage_fr':mileage_fr,'mileage_to':mileage_to};


   $.get('/updateCars', data, function (data) {
       console.log(data);
        if(data==="")
        { document.getElementById("paginate_result").innerHTML="No cars found";
            $('#wait').hide();
        }
        
        else
        {
        document.getElementById("paginate_result").innerHTML = data;
        
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
        if(document.getElementById("link").value!="")
        {
            document.getElementById('p_l').style.display='block';
        }  
        
            $('#wait').hide();
    }
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
        
        window.location.href="#paginate_result";
      });


   
      
    

  }
</script> 
@endsection