@extends('websiteMasterView')

@section('title')
<title>Used Cars in Pakistan</title>
   <link rel="icon" type="image/png" href="{{URL::asset('images/favicon.png')}}">

@endsection
@section('cssblock')

<!--Google Font link-->
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

        <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('frontend/css/ribbon.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootsnav.css')}}">

        <!-- xsslider slider css -->

        
 <script src="{{ URL::asset('frontend/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/bootsnav.js')}}"></script>



        <script src="{{ URL::asset('frontend/js/plugins.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/main.js')}}"></script>
        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css')}}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ URL::asset('frontend/usedCar/css/custom.css')}}" />        
        <link rel="stylesheet" href="{{ URL::asset('frontend/usedCar/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" />

        <script src="{{ URL::asset('frontend/usedCar/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}"></script>
        <script src="{{ URL::asset('frontend/usedCar/js/index_used_cars.js')}}"></script>
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
            
      
      <section class="search-main mb40">
  <div class="container">
    <div class="search-main " style="position: relative;">
      <div id="top-search-heading" class="head">
        <h1>Find Used Cars in Pakistan</h1>
        <p>With thousand of cars,we have just the right one for you</p>
      </div>
          
<form method="post" action="{{route('searchUsedVehiclesByAllFilters')}}" >
   {{ csrf_field() }}
              
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
<div class="" tabindex="0">
  <div id="used-cars">
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
      <li class="home-autocomplete-field">
        <input  id="make" name="make" placeholder="Car Make or Model" ><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
        <input type="hidden" name="UsedManID" id="UsedManID" value="">
        <input type="hidden" name="UsedModelID" id="UsedModelID" onchange="updateVersion('car', $('#UsedModelID').val(), $('#UsedManID').val(), $('#UsedVersionID')); reloadChosen('#UsedVersionID');" value="">
      </li>
      <li class="range-widget">
        <div id="pr-range-filter" tabindex="3" class="pos-rel pr-range-large">
          <span class="pr-text">Price Range</span>
          <i class="fa fa-sort-down pull-right"></i>
          <div class="pr-range" style="display:none;">
            <div class="pr-range-container ">
              <div class="pr-input-container clearfix">
                <div class="pr-input">
                  <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input id="price_fr" name="price_fr" placeholder="Min" tabindex="4" type="text" value="" class="tt-input" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-0"></div></div></span>lacs
                </div>
                <div class="pr-input">
                  <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input id="price_to" name="price_to" placeholder="Max" tabindex="5" type="text" value="" class="tt-input" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-1"></div></div></span>lacs
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="home-chzn">
        <select style="background:#FFFFFF !important;" name="city" id="city" class="chzn-select" tabindex="1" onchange="return get_city_areas(this)">
            <option value="" disabled="disabled">All Cities</option>
            @foreach($city as $c)
            <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach
        </select>
      </li>
    </ul>
  </div>
</div>

    
   
      <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
    <div id="more_option_detail" class="clearfix" style="display:none;">
  
  
  <ul class="search-fields search-fields3 mt30 clearfix">
    <li class="nomargin">
      <legend class="nomargin" id="city_area_heading" style="display:block !important;">
      City Area</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Versions</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Year</legend>
    </li>
    <li class="nomargin" id="city_area_control" style="display:block !important;">
      <select name="city_area" id="city_area" class="chzn-container chzn-container-single chzn-container-active" style="display:block !important;">
        <option selected="selected" value="">
        Select City Area</option>
      </select>
    </li>
    
    <li>
      <select name="version" id="version" class="chzn-select">
        <option value="">All Versions</option>
      </select>
    </li>
    <li>
      <select id="YearFrom" name="YearFrom" style="width: 48%;">
<option value="" disabled="disabled">From</option>
@foreach($model_year as $m_y)
<option value="{{$m_y->id}}">{{$m_y->year}}</option>
@endforeach
</select>

      <select class="pull-right" id="YearTo" name="YearTo" style="width: 48%;">
<option value="" disabled="disabled">To</option>
@foreach($model_year as $m_y)
<option value="{{$m_y->id}}">{{$m_y->year}}</option>
@endforeach
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
      <legend class="nomargin">Mileage</legend>
    </li>    
    <li>
      <select id="engine_type" name="engine_type"><option value="">All Engine Types</option>
        @foreach($engine_type as $e_t)
        <option value="{{$e_t->id}}">{{$e_t->title}}</option>
        @endforeach
</select>
    </li>
    <li>
      <select name="capacity_fr" id="capacity_fr" style="width: 48%;">
        <option value="">From</option>
          <option value="600">600 cc</option>
          <option value="800">800 cc</option>
          <option value="1000">1,000 cc</option>
          <option value="1200">1,200 cc</option>
          <option value="1400">1,400 cc</option>
          <option value="1600">1,600 cc</option>
          <option value="1800">1,800 cc</option>
          <option value="2000">2,000 cc</option>
          <option value="4000">4,000 cc</option>
          <option value="6000">6,000 cc</option>
          <option value="8000">8,000 cc</option>
          <option value="10000">10,000 cc</option>
      </select>
      <select name="capacity_to" id="capacity_to" style="width: 48%;" class="pull-right">
        <option value="">To</option>
          <option value="600">600 cc</option>
          <option value="800">800 cc</option>
          <option value="1000">1,000 cc</option>
          <option value="1200">1,200 cc</option>
          <option value="1400">1,400 cc</option>
          <option value="1600">1,600 cc</option>
          <option value="1800">1,800 cc</option>
          <option value="2000">2,000 cc</option>
          <option value="4000">4,000 cc</option>
          <option value="6000">6,000 cc</option>
          <option value="8000">8,000 cc</option>
          <option value="10000">10,000 cc</option>
      </select>
    </li>
    <li>
      <select name="mileage_fr" id="mileage_fr" style="width: 48%;">
        <option value="">From</option>
          <option value="10000">10,000 km</option>
          <option value="20000">20,000 km</option>
          <option value="30000">30,000 km</option>
          <option value="40000">40,000 km</option>
          <option value="50000">50,000 km</option>
          <option value="60000">60,000 km</option>
          <option value="70000">70,000 km</option>
          <option value="80000">80,000 km</option>
          <option value="90000">90,000 km</option>
          <option value="100000">100,000 km</option>
          <option value="125000">125,000 km</option>
          <option value="150000">150,000 km</option>
          <option value="175000">175,000 km</option>
          <option value="200000">200,000 km</option>
      </select>
      <select name="mileage_to" id="mileage_to" style="width: 48%;" class="pull-right">
        <option value="">To</option>
          <option value="10000">10,000 km</option>
          <option value="20000">20,000 km</option>
          <option value="30000">30,000 km</option>
          <option value="40000">40,000 km</option>
          <option value="50000">50,000 km</option>
          <option value="60000">60,000 km</option>
          <option value="70000">70,000 km</option>
          <option value="80000">80,000 km</option>
          <option value="90000">90,000 km</option>
          <option value="100000">100,000 km</option>
          <option value="125000">125,000 km</option>
          <option value="150000">150,000 km</option>
          <option value="175000">175,000 km</option>
          <option value="200000">200,000 km</option>
      </select>
    </li>
  </ul>
  <legend class="nomargin">Other Details</legend>
  <ul class="search-fields search-fields3 clearfix">
    <li>
      <select id="body_type" name="body_type"><option value="">All body types</option>
        @foreach($body_type as $b_t)
        <option value="{{$b_t->id}}">{{$b_t->title}}</option></select>
        @endforeach
    </li>
    <li>
      <select name="color" id="color">
        <option value="">All body colors</option>
        @foreach($color as $c)
<option value="{{$c->id}}">{{$c->title}}</option>
@endforeach
      </select>
    </li>
     <li>
      <select name="RegCity" id="RegCity" class="chzn-select">
        <option value="">Registered in any city</option>
        <option value="unregistered">Un-Registered</option>

        @foreach($city as $c)
        <option value="{{$c->id}}">{{$c->title}}</option>
       @endforeach
      </select>
    </li>
  </ul>
  <ul class="search-fields search-fields3 clearfix">
    <li>
      <select id="assembly" name="assembly"><option value="">All Assembly Types</option>
        @foreach($assembly as $a)

<option value="{{$a->id}}">{{$a->title}}</option>
@endforeach

</select>
    </li>
    <li>
      <select id="transmission" name="transmission"><option value="">All Transmission Types</option>
        @foreach($transmission as $t)

<option value="{{$t->id}}">{{$t->title}}</option>
@endforeach

</select>
    </li>
    <li>
      <select id="carsure" name="carsure"><option value="Certification">Select Certification</option>
<option value="carsure">CarSure Inspected Cars</option></select>
    </li>
  </ul>
  <legend class="nomargin">Ad Properties</legend>
  <ul class="search-fields search-fields3 clearfix">
    <li>
      <select id="picture">
        <option value="0">Ads with and without pictures</option>
        <option value="1">Ads with pictures only</option>
      </select>
    </li>
    <li>
      <select id="ads_type">
        <option value="Seller">All Seller Types</option>
        <option value="2">Dealers only</option>
        <option value="1">Private sellers only</option>
      </select>
    </li>
    <li>
      <select id="featured">
        <option value="Types">All Ad Types</option>
        <option value="1">Featured Ads Only</option>
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
          link.html("Less Search Options <i class='fa fa-caret-up'></i>").attr('style', 'margin-top: 15px !important;');
          all_cars.css("margin-top","15px");
          scrollIntoViewIfNeeded(".search-classified");
          $('#more_option_detail').css("overflow", "visible");
        } else {
          link.html("More Search Options <i class='fa fa-caret-down'></i>").attr('style', '');
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
            More Search Options <i class="fa fa-caret-down"></i>
          </a>
        </div>
        <div id="search-row" class="pull-right">
          <button type="submit" class="btn btn-danger btn-lg btn-block" id="home-search-btn" tabindex="6"><i class="fa fa-search" ></i> Search</button>
        </div>  
      </div>
    </div>
  </div>
</form>
</section>



  <section>
    <div class="container">
      <h2>
        Featured Used Cars for Sale
        <div class="btn-group btn-group-sm bx-pager-btn pull-right">
          <span class="slider-prev btn"></span>
          <span class="slider-next btn"></span>
        </div>
      </h2>

      <div id="carSliderWrapper">
        <div id="slider_container" class="two-row-slider clearfix" dir="ltr">
          <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 290px;"><div id="slider" style="max-height: 290px; overflow: hidden; width: 615%; position: relative; transition-duration: 0s; transform: translate3d(-1170px, 0px, 0px);">
            <?php $count=0;?>
            @foreach($featured as $f)
            @if($count%4==0)
            <ul class="list-unstyled recent-vehicle-list extended car-featured-used-home car-slide-3 bx-clone" style="float: left; list-style: none; position: relative; width: 1170px;">
            @endif

      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="toyota-hilux-2011-for-sale-in-karachi-2180373.html">
                  <img alt="New" class="lazy-car-slider pic" src="{{URL::asset('images'.$f->url)}}" title="for Sale">
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="toyota-hilux-2011-for-sale-in-karachi-2180373.html" rel="nofollow">{{$f->manufacture}} {{$f->model}} {{$f->year}}</a></h3>
            <div class="generic-green">
              PKR {{$f->price}}
            </div>
            <div class="generic-grey">{{$f->city}}</div>
          </div>
        </span>
</li>   


@if($count%3==0&&$count!=0)

 </ul>

 @endif
 <?php $count++;?>
 @endforeach

 @if(($count-1)%3!=0)

</ul>
@endif
              </div></div><div class="bx-controls"></div></div>
        </div>
        <div id="type-featured-used-home" class="clear-link">
          <a href="search/-/featured_1/index.html" class="more-link" rel="nofollow">View all featured used cars</a>
        </div>
      </div>
    </div>
  </section>
  
  
  <section class="well clearfix">
  <div class="container">
    <h2>
      Popular Used Cars by Makes &amp; Models
        <div class="btn-group bx-pager-btn">
          <span class="slider1-prev btn"></span>
          <span class="slider1-next btn"></span>
        </div>
    </h2>
    <div id="browse-by-brand_used-cars" dir="ltr">
      <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 374px;"><div id="slider1" style="overflow: hidden; width: 515%; position: relative; transition-duration: 0s; transform: translate3d(-1150px, 0px, 0px);">
        <?php $count=0;?>
        @foreach($make_model as $m_m)
        @if($count%5==0)
        <ul class="vehicle-model-2 bx-clone" style="float: left; list-style: none; position: relative; width: 1150px;">
          @endif

          
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="{{--route('searchVehiclesByMake',['col'=>'brands','make_id'=>$m_m[1]])--}}"  title="{{$m_m[1]}} Cars in Pakistan">
                    <img src="{{URL::asset('images'.$m_m[2])}}" width="100px" height="100px">
                    <!--div class="pw-make-80 kia"></div-->
                    <h3 class="nomargin">{{$m_m[0]}}</h3>

                  </a>
                </li>
                @foreach($m_m[3] as $m)
                  <li><a href="{{--route('searchVehiclesByModel',['col'=>'models','model_id'=>$m->id])--}}" id="amd_KIA,Classic" title="{{$m->title}} For Sale in Pakistan">{{$m->title}}</a></li>
                  @endforeach
                  
              </ul>
             
             
              @if($count%4==0&&$count!=0) 
            </ul>
            @endif
            <?php $count++;?>
            @endforeach

    @if(($count-1)%3!=0)

</ul>
@endif        
            


            </div></div><div class="bx-controls"></div></div>
    </div>
  </div><!-- container -->
</section>


<section>
  <div class="container">
    
    <h2>CarSure Inspection</h2>
    
    
    
    
    
    <div class=" carsure-marketing-banner nomargin mb40">
      <div class="row text-center">
        <div class="col-md-6 left-panel">
          <h3 class="mb15 mt25 fs18">Never buy a Used Car without <span class="carsure-logo-medium"></span></h3>
          <p class="mb20">Our CarSure experts inspect the car on over 200 checkpoints so you get complete satisfaction and peace of mind before buying.</p>
          <a href="../carsure/new.html" id="carsure-request-usedcar" class="fs14 btn btn-info mb15">Schedule CarSure Inspection</a><br>
          <a href="../products/carsure.html" id="certify-car-used-car" class="fs14">Learn More <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="col-md-6">
          <img alt="CarSure Checklist Points" src="images/carsure.png">
        </div>
      </div>
    </div>

  </div>
</section>



    <section class="well clearfix">
  <div class="container">
    <h2>Used Cars By Type</h2>
      <div>
        <div class="cards">

          <ul class="list-unstyled">
            @foreach($body_type as $b_t)

              <li>
                <a href="{{--route('searchVehiclesByBodyType',['col'=>'vehicle_body_types','type_id'=>$b_t->id])--}}" class="show" data-category-name=""  title="{{$b_t->title}} for sale in Pakistan">
                    <img alt="Jeep for sale in Pakistan" src="{{URL::asset('images'.$b_t->icon)}}" width="50px" height="50px">
                    <h3 class="nomargin mt10 car_name">{{$b_t->title}}</h3>
                   
                    <div class="generic-grey">{{$b_t->size}}+ Cars Listed</div>
</a>              </li>
@endforeach
                

             
          </ul>

        </div>
      </div>
  </div>
</section>

  
  <!--Used Cars by city-->


  <section>
    <div class="container">      
      <h2>Used Cars by City</h2>
      <table style="background:none;" class="table"> 
        <tbody> 
          <tr>
            <td class="ptb0">
              <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-car">
                 @foreach($city_size as $c)
                  <li class="col-md-3">
                    <a href="{{--route('searchVehiclesByCity',['col'=>'cities','city_id'=>$c->id])--}}" id="{{$c->id}}" title="Cars for Sale in {{$c->title}}">
                      <h3>Cars {{$c->title}}</h3>
                      {{$c->size}} Used Cars
</a>                  </li>
            @endforeach
                
              </ul>
            </td>
          </tr>
        </tbody> 
      </table>
    </div>
  </section>

               



<!--Featured Dealers section-->
            <section id="product" class="product">
                <div class="container">
                    <div class="main_product roomy-50">
                        
                            <h2 class="text-uppercase">Featured Dealers</h2>
                      

                        <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            

                             <ol class="carousel-indicators">

                            <?php $total_products=0;?>
                            <?php $number=0;?>

                            @foreach($dealer as $d)

                            @if($total_products==0)
                                <li data-target="#carousel-example-generic2" data-slide-to="{{$number++}}" class="active"></li>

                                @elseif(($total_products%3==0)&&($total_products!=3))
                                <li data-target="#carousel-example-generic2" data-slide-to="{{$number++}}"></li>
                                @endif
                                <?php $total_products++;?>
                                @endforeach
                            </ol>

                            <!-- Wrapper for slides -->

                            <?php $count=0;?> 
                            <div class="carousel-inner" role="listbox" style="width:102%">
                                @foreach($dealer as $d)

                                
                            @if($count==0)
                                <div class="item active">
                                    <div class="container">
                                        <div class="">
                            @endif


                             @if(($count%4==0)&&($count!=0))
                                <div class="item">
                                    <div class="container">
                                        <div class="row">

                            @endif
                            
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30">
                                                    <div class="port_img">
                                                        <img src="{{ URL ::asset('images'.$d->img_url) }}" alt="" />
                                                        <label style="margin-left:100px; "><strong>{{$d->name}}</strong></label>
                                                        <div class="port_overlay text-center">
                                                            <a href="{{ URL ::asset('images'.$d->img_url) }}" class="popup-img">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                                     
                            @if(($count)%3==0&&($count!=0))  
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <?php $count++;?>
                                @endforeach


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
                 <div class="clear-link">
            <a href="dealers/index.html" class="more-link">View All Dealers</a>
          </div>
            </section><!-- End off Featured Dealers section -->
         






    </div>
@endsection



@section('jsblock')

        <script src="{{ URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{ URL::asset('frontend/css/slick/slick.js')}}"></script>
        <script src="{{ URL::asset('frontend/css/slick/slick.min.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/jquery.collapse.js')}}"></script>


      
  
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
   

      /////////Area Dropdown update
$(function() {
    $('#city').change(function() {
        var data = { 'city': $(this).val() };
        

        $.get('/getAreaByCity', data, function (data) {
           var model = $('#city_area');
                    model.empty();
                    
                    //  model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });
});
  

   </script>


@endsection