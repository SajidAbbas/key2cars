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
        
         <link rel="stylesheet" href="{{URL ::asset('assets/css/style.css')}}">
        
        <link rel="stylesheet" href="{{URL ::asset('assets/car/css/style.css')}}">
        <link rel="stylesheet" href="{{URL ::asset('assets/car/css/bootstrap.css')}}">



        <!--Theme custom css -->
      
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
    
        <form class="form-horizontal hidden-lg hidden-md hidden-sm" style="text-align: center" id="searchForm" method="post"  action="{{route('searchCarsByAllFilters')}}#result" role="form">
       
   {{ csrf_field() }}
        <h2 style="text-align:center;">Find Cars for Sale in Pakistan</h2>
        <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-left:0;">
          <div class="row">
          <select style="background:#FFFFFF !important;" name="make" id="make_mobile" class="chzn-select c-form__select" tabindex="1" >
             <option  class="pr-text" value="-1" >Car Make</option>
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
          </div>
        </div>
        <div class="form-group pull-right col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-right:0;">
          <div class=" row">
           <select style="background:#FFFFFF !important; height: 40px;" name="model" id="model_mobile" class="chzn-select c-form__select pointer" >;
            <option   value="-1" >Car Model</option>
            
        </select>
          </div>
        </div>
        
        <div class="clear"></div>
        
        <div class="form-group">
          <div class="col-md-12">
           <select style="background:#FFFFFF !important;" data-placeholder="City" name="city"  class="chzn-select" tabindex="1" >
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
          </div>
        </div>
        
        <div class="form-group">
        <div class="col-md-12">
        <input type="checkbox" value="{{\App\VehicleType::Any}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left pointer" > 
        <label class="checkbox pull-left" style="margin-right: 10px;">Any</label> 
       <input type="checkbox" value="{{\App\VehicleType::New_Vehicle}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left pointer" >   
       <label class="checkbox pull-left" style="margin-right: 10px;">New </label>
       <input type="checkbox"  value="{{\App\VehicleType::Almost_New_Vehicle}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left" style="margin-right: 10px;"> Almost New</label>
       <input type="checkbox"  value="{{\App\VehicleType::Used_Vehicle}}" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left" style="margin-right: 10px;">Used </label>
      
        
      </div>
      </div>
        
        <div class="col-sm-12">
          <div class="row">
           <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
         </div>
        </div>
      </form>
     
         <section class="search-main hidden-xs  search-form">
  <div class="container">
    <div class="search-main " style="position: relative; background: none">
      <div id="top-search-heading" class="head">
        <h1>Find cars for sale in Pakistan</h1>
       
      </div>
          

<div class="" tabindex="0">
  <div id="used-cars">
       <form method="post" action="{{route('searchCarsByAllFilters')}}#result" >
   {{ csrf_field() }}
              
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
        <li class="home-chzn" style="width:25%;">
        <select style="background:#FFFFFF !important;" name="make" id="make" class="chzn-select c-form__select" tabindex="1" >
             <option  class="pr-text" value="-1" >Car Make</option>
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
        <select style="background:#FFFFFF !important; height: 40px;" name="model" id="model" class="chzn-select c-form__select pointer" >;
            <option   value="-1" >Car Model</option>
            
        </select>
      </li>
     
   
            
      <li class="range-widget" style="width:25%;">
        <div id="pr-range-filter" tabindex="3" class="pos-rel pr-range-large ">
          <span class="pr-text">Price Range</span>
          <i class="fa pull-right"></i>
          <div class="pr-range" style="display:none;">
            <div class="pr-range-container ">
              <div class="pr-input-container clearfix"   >
                <div class="pr-input">
                  <input id="pr_from" name="price_fr" placeholder="Min" tabindex="4" type="text" />lacs
                </div>
                <div class="pr-input">
                  <input id="pr_to" name="price_to" placeholder="Max" tabindex="5" type="text"  />lacs
                </div>
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
       <input type="checkbox"  value="{{\App\VehicleType::Almost_New_Vehicle}}" checked="checked"  name="condition[]" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left" style="margin-right: 24px;"> Almost New</label>
       <input type="checkbox"  value="{{\App\VehicleType::Used_Vehicle}}" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left" style="margin-right: 24px;">Used </label>
      
        
    </li>
    <div class="clearfix"></div>
  </div>
</div>

    
     
       <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden"  /></div>
    <div id="more_option_detail" class="clearfix" style="display:none;">
  
  
  <ul class="search-fields search-fields3 mt30 clearfix">
    <li class="nomargin">
      <legend class="nomargin " id="city_area_heading" style="display:block !important;">
      City Area</legend>
      <select style="background:#FFFFFF !important; height: 40px;" class="chzn-select c-form__select pointer" name="city_area" id="city_area"  tabindex="1" >
          <i class="fa fa fa-angle-down pull-right"></i>
          <option   value=""  disabled="disabled">City Area</option>
        
        </select>
    </li>
  
    
    <li class="nomargin">
      <legend class="nomargin">Transmission</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Version</legend>
    </li>
 
   
     <li>
        <select id="transmission" name="transmission" class="chzn-select c-form__select"><option value="" disabled="disabled" >All Transmission Types</option>
  @foreach($transmissions as $t)

<option value="{{$t->id}}">{{$t->title}}</option>
@endforeach
<i class="fa fa fa-angle-down pull-right"></i>
        </select>
    </li>
    
     <li class="home-chzn" >
        <select style="background:#FFFFFF !important; height: 40px;" name="version" id="version" class="chzn-select c-form__select pointer" >;
            <option   value="-1" >Car Version</option>
            
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
    <li class="home-chzn" style="width:16.8%;">
      <select class="chzn-select c-form__select_48 pointer" name="capacity_fr" id="capacity_fr" style="width: 48%;">
        <option value="" disabled="disabled">From</option>
          
                  <option value="600">600 cc</option>
                  <option value="800">800 cc</option>
                  <option value="1000">1000 cc</option>
                  <option value="1200">1200 cc</option>
                  <option value="1400">1400 cc</option>
                  <option value="1600">1600 cc</option>
                  <option value="1800">1800 cc</option>
                  <option value="2000">2000 cc</option>
                  <option value="4000">4000 cc</option>
                  <option value="6000">6000 cc</option>
                  <option value="8000">8000 cc</option>
                  <option value="10000">10,000 cc</option>
                  
               
      </select>
    </li>
    <li class="home-chzn" style="width:16.5%;">
      <select class="chzn-select c-form__select_48 pointer" name="capacity_to" id="capacity_to" style="width: 48%;" >
          <option value="" disabled="disabled">To</option>
         
                  <option value="600">600 cc</option>
                  <option value="800">800 cc</option>
                  <option value="1000">1000 cc</option>
                  <option value="1200">1200 cc</option>
                  <option value="1400">1400 cc</option>
                  <option value="1600">1600 cc</option>
                  <option value="1800">1800 cc</option>
                  <option value="2000">2000 cc</option>
                  <option value="4000">4000 cc</option>
                  <option value="6000">6000 cc</option>
                  <option value="8000">8000 cc</option>
                  <option value="10000">10,000 cc</option>
                  
                
      </select>
    </li>
     <li class="home-chzn" style="width:16.8%;">
    <select class="chzn-select c-form__select_48 pointer" id="year_fr" name="year_fr" style="width: 48%;">
<option value="" disabled="disabled">From</option>
@foreach($model_year as $m_y)
<option value="{{$m_y->id}}">{{$m_y->year}}</option>
@endforeach

	</select>

     </li>
     <li class="home-chzn" style="width:16.5%;">
      <select class=" chzn-select c-form__select_48 pointer"  id="year_to" name="year_to" style="width: 48%;">
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
        <select id="assembly" name="assembly" class="chzn-select c-form__select"><option value="" disabled="disabled" >All Assembly Types</option>
@foreach($assemblies as $a)

<option value="{{$a->id}}">{{$a->title}}</option>
@endforeach
<i class="fa fa fa-angle-down pull-right"></i>
        </select>
    </li>
    
     <li class="home-chzn" style="width:16.8%;">
      <select class="chzn-select c-form__select_48 pointer" name="mileage_fr" id="mileage_fr" >
        <option value="" disabled="disabled">Mileage From</option>
          <option value="10000">10,000 km</option>
          <option value="20000">20,000 km</option>
          <option value="30000">30,000 km</option>
          <option value="10000">40,000 km</option>
          <option value="20000">50,000 km</option>
          <option value="30000">60,000 km</option>
          <option value="10000">70,000 km</option>
          <option value="20000">80,000 km</option>
          <option value="30000">90,000 km</option>
      </select>
         
     </li>
  <li class="home-chzn" style="width:16.5%;">
      <select class="chzn-select c-form__select_48 pointer" name="mileage_to" id="mileage_to" >
        <option value="" disabled="disabled"> Mileage To</option>
          <option value="10000">10,000 km</option>
          <option value="20000">20,000 km</option>
          <option value="30000">30,000 km</option>
          <option value="10000">40,000 km</option>
          <option value="20000">50,000 km</option>
          <option value="30000">60,000 km</option>
          <option value="10000">70,000 km</option>
          <option value="20000">80,000 km</option>
          <option value="30000">90,000 km</option>
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
        <div class="pull-left">
          <a href="javascript:void(0);" id="more_option" class="more_option">
            More Search Options <i class="fa fa-angle-down"></i>
          </a>
        </div>
        <div id="search-row" class="pull-right">
          <button type="submit" class="btn btn-danger btn-lg btn-block"  id="home-search-btn" tabindex="6">  Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
        </div>  
      </div>
    </div>
  </div>
</form>
</section>
        
   


@if(!$featured_vehicles)
<section id="product" class=" product bg-grey title-padding">
    <div class="container">
      <div class="main_product row">
        <div class="text-center fix">
          <h2 class="" >Featured Cars</h2>
        </div>
          <div class="text-right fix">
          <a href="{{route('carFeaturedPage')}}"><h6 class="" style="color:#4691e1;">View all featured Cars </h6></a>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          
          <ol class="carousel-indicators hidden-lg hidden-md hidden-sm hidden-xs">
             <?php $total_products = 0; ?>
                    <?php $number=0;?>
                    @foreach($featured_vehicles as $f_v)

                    @if($total_products==0)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}" class="active"></li>

                    @elseif(($total_products%4==0)&&($total_products!=0))
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}"></li>
                    @endif
                    <?php $total_products++; ?>
                    @endforeach
          </ol>
          
          
          <?php $count = 1; ?> 
          <div class="carousel-inner " role="listbox" >
            @foreach($featured_vehicles as $f_v)


                    @if($count==1)
                    <div class="item active">
                    
                    @endif

                    @if(($count%5==0)&&($count!=1))
                      <div class="item">
                      
                        @endif

            
                  <div class="col-sm-3 m-bottom-60">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="{{Route('/GetCarDetails', ['id' => $f_v->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$f_v->url)}}" alt="" /></a> 
                       <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                       </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetCarDetails', ['id' => $f_v->id])}}">{{$f_v->manufacture}} {{$f_v->model}} {{$f_v->model_version}}<span style="color:#223b7b">&nbsp; {{$f_v->year}}</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_v->price}}</span></h6>
                       @if($f_v->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($f_v->condition==\App\VehicleType::Almost_New_Vehicle)
                         <h6>Condition: Almost New</h6>
                        @else
                         <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; {{$f_v->city}}</div>
                        <a href="{{Route('/GetCarDetails', ['id' => $f_v->id])}}" class="btn-more"  style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  
                  @if($count%4==0&&($count!=1))  
                                        
                                </div>
                                @endif
                                <?php $count++; ?>
                                @endforeach

                                @if(($count-1)%4!=0)  
                                        
                                </div>
                                @endif
          </div>
          
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
    </div>
  </section>
@endif
  
  <!--  Featured Cars Section--  Asad Code  >
  <!--section id="product" class="product bg-grey title-padding">
    <div class="container">
      <div class="main_product">
        <div class="text-center fix">
          <h2 class="">Featured Cars</h2>
        </div>
        <div class="text-right fix">
          <a href="#"><h6 class="" style="color:#4691e1;">View all featured Cars </h6></a>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          
          <ol class="carousel-indicators hidden">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>
          
        
          <div class="carousel-inner" role="listbox" style="margin-left:-15px;">
            <div class="item">
              <div class="container">
                  <div class="col-sm-3 ">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="item active">
              <div class="container">
                  <div class="col-sm-3 ">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="item">
              <div class="container">
                  <div class="col-sm-3 ">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 hidden-xs">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="assets/images/about-img1.jpg" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">Toyota Corolla<span style="color:#223b7b">&nbsp; 2014</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">18,1200</span></h6>
                        <h6>Condition: Used</h6>
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; Islamabad</h6></div>
                        <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          
       
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
     
    </div>
   
  </section-->
  
  
  
  
  <section class="m-top-30 m-bottom-20 bg-grey">
<div class="container">
<div class="col-sm-4 m-bottom-20"><a href="{{route('/searchNewCars')}}"><img src="{{URL::asset('assets/car/images/ad1.png')}}" class=" center-block img-responsive" alt=""/></a></div>

<div class="col-sm-4 m-bottom-20"><a href="{{route('/sellCar')}}"><img src="{{URL::asset('assets/car/images/ad2.png')}}" class="center-block img-responsive" alt=""/></a></div>

<div class="col-sm-4 m-bottom-20"><a href="{{route('carDealerPage')}}"><img src="{{URL::asset('assets/car/images/ad3.png')}}" class="center-block img-responsive" alt=""/></a></div>
</div>
</section>
	 <section class="bg-grey">
     
    <div class="container ">
    <div class="col-xs-12 bg-white">      
      <h2 style="text-align: center;">Cars by City</h2>
      <table style="background:none;" class="table"> 
        <tbody> 
          <tr>
            <td class="ptb0">
              <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-car">
                  @foreach($city_vehicles_count as $c_v_c)
                  <li class="col-md-4 row"> <a href="{{Route('/getCarsByCity', ['id' => $c_v_c->id])}}" id="{{$c_v_c->id}}" title="Cars for Sale in {{$c_v_c->title}}">
                    <h3>Cars {{$c_v_c->title}}</h3>
                    {{$c_v_c->size}}+  Cars </a> </li>
                    @endforeach
                
              </ul>
            </td>
          </tr>
        </tbody> 
      </table>
    </div>
    </div>
  </section>


    <section  class="hidden-xs bg-grey">
  <div class="container m-top-20 ">
  <div class="col-xs-12 bg-white"> 
      <h2 style="text-align: center;">Cars By Body Type</h2><hr>
      <div>
        <div class="cards">

          <ul class="list-unstyled">
            @foreach($body_type as $b_t)

              <li>
                <a  href="{{Route('/getCarsByBodyType', ['id' => $b_t->id])}}#result" id="{{$c_v_c->id}}" class="show" title="Saloon Cars for sale in Pakistan">
                    <div class="type" ></div> <!--<img alt="Saloon Cars for sale in Pakistan" width="100px" height="50px" src="{{URL::asset('images'.$b_t->icon)}}" />-->
                    <h3 class="nomargin mt10 car_name">{{$b_t->title}}</h3>
                    <div class="generic-green">Starting from  {{$b_t->min_price}}</div>
                    <div class="generic-grey">{{$b_t->size}}+ Cars Listed</div>
</a>              </li>

          @endforeach
                

              
                
          </ul>

        </div>
      </div>
  </div>
  </div>
</section>



<!--Featured Dealers section-->
@if(!$dealer->isEmpty())
  <section class="product bg-grey m-bottom-20">
    <div class="container">
      <div class="main_product ">
        <div class=" text-center fix">
          <h2 class="">Featured Dealers</h2>
          
          <div class="row">
                <div class="row">
                  @foreach($dealer as $d)
                  <div class="col-xs-12 col-sm-3 ">
                    <div class="port_item xs-m-top-30">
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





    </div>
  

@endsection


@section('jsblock')
<script>
$(function() {
    $('#city').change(function() {
        var data = { 'city': $(this).val() };
         var model = $('#city_area');
                   model.empty();
                    model.append("<option value='' disabled selected>" + 'City Area' + "</option>");
         
        $.get('/getAreaByCity', data, function (data) {
          
  
                   $.each(data, function(index, element) {
                     //alert(element.title);
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                        
                    });
                   
                    $("#city_area").trigger("chosen:updated");
        $("#city_area").trigger("liszt:updated");
        });
    });
});

$(function () {
    $('#make').change(function () {
       
      var data = {'make': $(this).val()};
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
    });
  });
  
  $(function () {
    $('#make_mobile').change(function () {
       
      var data = {'make': $(this).val()};
     $.get('/getModelByMake', data, function (data) {
          
        $("#model_mobile").empty(); 
        $('#model_mobile').append("<option value='-1'  selected>" + 'Car Model' + "</option>");
         $('#model_mobile').append("<optgroup label='Popular Models' style='color:#9b9b9b;'>");
         
       
        $.each(data, function (index, element) {
           if(element.popular==1)
           {
                $("#model_mobile").append("<option value='" + element.id + "'>" + element.title + "</option>");
           }
           });
           $('#model_mobile').append("</optgroup>");
           
           $('#model_mobile').append("<optgroup label='Other  Models' style='color:#9b9b9b;'>");
          
          $.each(data, function (index, element) {
           if(element.popular==0)
           {
                $("#model_mobile").append("<option value='" + element.id + "'>" + element.title + "</option>");
           }
           });
             $('#model_mobile').append("</optgroup>");
             
         $("#model_mobile").trigger("chosen:updated");
        $("#model_mobile").trigger("liszt:updated");
      });
    });
  });
  
  $(function () {
    $('#model').change(function () {
       
        var model = $('#version');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Car Version' + "</option>");
      var data = {'model': $(this).val()};
      $.get('/getModelVersionByModel', data, function (data) {
       
        
          $.each(data, function(index, element) {
                     //alert(element.title);
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                        
                    });
        $("#version").trigger("chosen:updated");
        $("#version").trigger("liszt:updated");
      });
    });
  });
</script>
   
  

@endsection