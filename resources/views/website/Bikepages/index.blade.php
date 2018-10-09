@extends('websiteMasterView')

@section('title')
Used Bikes in Pakistan - Buy and Sell Second Hand Bikes | Key2Cars
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

        <!--Google Font link-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

        <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/ribbon.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootsnav.css')}}">

        <!-- xsslider slider css -->



        <!--Theme custom css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        
        <!-- JS includes -->

        <script src="{{URL::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/vendor/bootstrap.min.js')}}"></script>

        
       


        <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
        <script src="{{URL::asset('assets/js/main.js')}}"></script>

    

    <link href="{{URL::asset('assets/bike/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
  <link href="{{URL::asset('assets/bike/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{URL::asset('assets/bike/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/bike/js/index_used_cars.js')}}" type="text/javascript"></script>

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
            
     <form style="text-align: center" class="form-horizontal hidden-lg hidden-md hidden-sm" id="searchForm" method="post"  action="{{route('searchBikesByAllFilters')}}#result" role="form">
         {{ csrf_field() }}
        <h2 style="text-align:center;">Find Motorbikes for Sale in Pakistan</h2>
        
        <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-left:0;">
          <div class="row">
           <select style="background:#FFFFFF !important;" name="make" id="make_mobile" class="chzn-select c-form__select" tabindex="1" >
             <option  class="pr-text" value="-1" >Bike Make</option>
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
          </div>
        </div>
        <div class="form-group pull-right col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-right:0;">
          <div class=" row">
           <select style="background:#FFFFFF !important;" name="model" id="model_mobile" class="chzn-select c-form__select pointer"  >
            <option   value="-1" >Bike Model</option>
            
        </select>
          </div>
        </div>
        
        <div class="clear"></div>
        
        <div class="form-group">
          <div class="col-md-12">
             <select style="background:#FFFFFF !important;" data-placeholder="City" name="city" id="city_mobile"  class="chzn-select" tabindex="1" >
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
            <div class="col-md-12" style="margin-left: 60px;">
        <input type="checkbox" value="0" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left pointer"> 
        <label class="checkbox pull-left" style="margin-right:10px">Any</label> 
       <input type="checkbox" value="1" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left pointer">   
       <label class="checkbox pull-left" style="margin-right:10px">New </label>
       
       <input type="checkbox" value="3" checked="checked" name="condition[]" id="condition" class="c-form__checkbox pull-left pointer"> 
       <label class="checkbox pull-left" style="margin-right:0px">Used </label>
      </div>
      </div>
        
        <div class="col-sm-12">
          <div class="row">
           <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
         </div>
        </div>
      </form>
        
<section class="search-main hidden-xs search-form">
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
        <select style="background:#FFFFFF !important;height: 40px;" name="model" id="model" class="chzn-select c-form__select pointer"  >
            <option   value="-1" >Bike Model</option>
            
        </select>
      </li>
     
   
            
      <li class="range-widget" style="width:25%;">
        <div id="pr-range-filter" tabindex="3" class="pos-rel pr-range-large c-form__select">
          <span class="pr-text">Price Range</span>
          <i class="fa pull-right"></i>
          <div class="pr-range" style="display:none;">
            <div class="pr-range-container ">
              <div class="pr-input-container clearfix"   >
                <div class="pr-input">
                  <input id="pr_from" name="price_fr" placeholder="Min" tabindex="4" type="text" />Thousands
                </div>
                <div class="pr-input">
                  <input id="pr_to" name="price_to" placeholder="Max" tabindex="5" type="text"  />Thousands
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      
      
      <li class="home-chzn" style="width:25%;">
         <select style="background:#FFFFFF !important;" data-placeholder="City" name="city" id="city"  class="chzn-select c-form__select" tabindex="1" >
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

    
     
       <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden"  /></div>
    <div id="more_option_detail" class="clearfix" style="display:none;">
  
  
  <ul class="search-fields search-fields3 mt30 clearfix">
    <li class="nomargin">
      <legend class="nomargin " id="city_area_heading" style="display:block !important;">
      City Area</legend>
      <select style="background:#FFFFFF !important;" class="chzn-select c-form__select pointer" name="city_area" id="city_area"  tabindex="1" >
        
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
        
        
        
        
       @if(!$featured_bikes->isEmpty()) 
<section id="product" class=" product">
    <div class="container">
      <div class="main_product m-top-40 bg-grey row">
        <div class="fix">
          <h2 class="text-uppercase">Featured Bikes for Sale</h2>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators -->
          <ol class="carousel-indicators hidden-lg hidden-md hidden-sm hidden">
             <?php $total_products = 0; ?>
                    <?php $number=0;?>
                   

                    @foreach($featured_bikes as $f_b)

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
          <div class="carousel-inner" role="listbox" >
            @foreach($featured_bikes as $f_b)


                    @if($count==1)
                    <div class="item active">
                    
                    @endif

                    @if(($count%5==0)&&($count!=1))
                      <div class="item">
                      
                        @endif

            
                  <div class="col-sm-3 m-bottom-60">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="{{Route('/GetBikeDetails', ['id' => $f_b->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$f_b->url)}}" alt="" /></a> 
                       <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                       </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetBikeDetails', ['id' => $f_b->id])}}">{{$f_b->manufacture}} {{$f_b->model}} <span style="color:#223b7b">&nbsp; {{$f_b->year}}</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_b->price}}</span></h6>
                       @if($f_b->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($f_b->condition==\App\VehicleType::Almost_New_Vehicle)
                         <h6>Condition: Almost New</h6>
                        @else
                         <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; {{$f_b->city}}</div>
                        <a href="{{Route('/GetBikeDetails', ['id' => $f_b->id])}}" class="btn-more"  style="text-decoration:none;">View More</a>
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
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
      <!-- End off row --> 
    </div>
    <!-- End off container --> 
  </section>
       @endif
       

<div class="container"><a href="{{route('sellBike')}}"> <img style="width:100%; margin-bottom:10px " alt="" class="img-responsive center-block m-bottom-10" src="{{URL::asset('assets/images/bike.gif')}}"/></a></div>
  
  <!--<section class="well clearfix hidden-xs">
  <div class="container">
    <h2>
      Popular Used Bikes by Makes &amp; Models
        <div class="btn-group bx-pager-btn">
          <span class="slider1-prev btn"></span>
          <span class="slider1-next btn"></span>
        </div>
    </h2>
    <div id="browse-by-brand_used-cars" dir="ltr">
      <div id="slider1" style="overflow: hidden;">
             <ul class="vehicle-model-0">
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading ">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class=""><img src="images/rp.jpg"/></div>
                    <h3 class="nomargin">Road Prince</h3>
                  </a>
                </li>
                  <li><a  href="toyota-corolla/688.html" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">Robinson 150</a></li>
                  <li><a  href="toyota-vitz/781.html" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">RP 110</a></li>
                  <li><a  href="toyota-aqua/38077.html" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">RP 70</a></li>
                  <li><a  href="toyota-prado/38678.html" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">Wego 150</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class=""><img src="images/ravi.jpg"/></div>
                    <h3 class="nomargin">Ravi</h3>

                  </a>
                </li>
                  <li><a  href="suzuki-mehran/661.html" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Humsafar 70</a></li>
                  <li><a  href="suzuki-cultus/660.html" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">Humsafar Plus</a></li>
                  <li><a  href="suzuki-alto/658.html" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">Piaggio Storm 125</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="hyundai/15.html" id="amk_hyundai" title="Hyundai Cars in Pakistan">
                    <div class=""><img src="images/unique.jpg"/></div>
                    <h3 class="nomargin">Unique</h3>

                  </a>
                </li>
                  <li><a  href="hyundai-santro/668.html" id="amd_Hyundai,Santro" title="Hyundai Santro For Sale in Pakistan">UD 100</a></li>
                  <li><a  href="hyundai-shehzore/696.html" id="amd_Hyundai,Shehzore" title="Hyundai Shehzore For Sale in Pakistan">UD 125</a></li>
                  <li><a  href="hyundai-excel/695.html" id="amd_Hyundai,Excel" title="Hyundai Excel For Sale in Pakistan">UD 70</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class=""><img src="images/kawasak.jpg"/></div>
                    <h3 class="nomargin">Kawasak</h3>

                  </a>



                </li>
                  <li><a  href="suzuki-mehran/661.html" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Eliminator ZL 750</a></li>
                  <li><a  href="suzuki-cultus/660.html" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">ER-6n</a></li>
                  <li><a  href="suzuki-alto/658.html" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">GTO 100</a></li>
                  <li><a  href="suzuki-bolan/693.html" id="amd_Suzuki,Bolan" title="Suzuki Bolan For Sale in Pakistan">GTO 110</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class=""><img src="images/honda.jpg"/></div>
                    <h3 class="nomargin">Honda</h3>
                  </a>
                </li>
                  <li><a  href="toyota-corolla/688.html" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">50cc</a></li>
                  <li><a  href="toyota-vitz/781.html" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">CB 150F</a></li>
                  <li><a  href="toyota-aqua/38077.html" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">CB 180</a></li>
                  <li><a  href="toyota-prado/38678.html" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">CB 350</a></li>
              </ul>
              
             
            </ul>
            
             <ul class="vehicle-model-0">
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading ">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class=""><img src="images/rp.jpg"/></div>
                    <h3 class="nomargin">Road Prince</h3>
                  </a>
                </li>
                  <li><a  href="toyota-corolla/688.html" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">Robinson 150</a></li>
                  <li><a  href="toyota-vitz/781.html" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">RP 110</a></li>
                  <li><a  href="toyota-aqua/38077.html" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">RP 70</a></li>
                  <li><a  href="toyota-prado/38678.html" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">Wego 150</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class=""><img src="images/ravi.jpg"/></div>
                    <h3 class="nomargin">Ravi</h3>

                  </a>
                </li>
                  <li><a  href="suzuki-mehran/661.html" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Humsafar 70</a></li>
                  <li><a  href="suzuki-cultus/660.html" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">Humsafar Plus</a></li>
                  <li><a  href="suzuki-alto/658.html" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">Piaggio Storm 125</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="hyundai/15.html" id="amk_hyundai" title="Hyundai Cars in Pakistan">
                    <div class=""><img src="images/unique.jpg"/></div>
                    <h3 class="nomargin">Unique</h3>

                  </a>
                </li>
                  <li><a  href="hyundai-santro/668.html" id="amd_Hyundai,Santro" title="Hyundai Santro For Sale in Pakistan">UD 100</a></li>
                  <li><a  href="hyundai-shehzore/696.html" id="amd_Hyundai,Shehzore" title="Hyundai Shehzore For Sale in Pakistan">UD 125</a></li>
                  <li><a  href="hyundai-excel/695.html" id="amd_Hyundai,Excel" title="Hyundai Excel For Sale in Pakistan">UD 70</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class=""><img src="images/kawasak.jpg"/></div>
                    <h3 class="nomargin">Kawasak</h3>

                  </a>



                </li>
                  <li><a  href="suzuki-mehran/661.html" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Eliminator ZL 750</a></li>
                  <li><a  href="suzuki-cultus/660.html" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">ER-6n</a></li>
                  <li><a  href="suzuki-alto/658.html" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">GTO 100</a></li>
                  <li><a  href="suzuki-bolan/693.html" id="amd_Suzuki,Bolan" title="Suzuki Bolan For Sale in Pakistan">GTO 110</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class=""><img src="images/honda.jpg"/></div>
                    <h3 class="nomargin">Honda</h3>
                  </a>
                </li>
                  <li><a  href="toyota-corolla/688.html" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">50cc</a></li>
                  <li><a  href="toyota-vitz/781.html" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">CB 150F</a></li>
                  <li><a  href="toyota-aqua/38077.html" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">CB 180</a></li>
                  <li><a  href="toyota-prado/38678.html" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">CB 350</a></li>
              </ul>
              
             
            </ul>
            
             <ul class="vehicle-model-0">
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading ">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class=""><img src="images/rp.jpg"/></div>
                    <h3 class="nomargin">Road Prince</h3>
                  </a>
                </li>
                  <li><a  href="toyota-corolla/688.html" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">Robinson 150</a></li>
                  <li><a  href="toyota-vitz/781.html" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">RP 110</a></li>
                  <li><a  href="toyota-aqua/38077.html" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">RP 70</a></li>
                  <li><a  href="toyota-prado/38678.html" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">Wego 150</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class=""><img src="images/ravi.jpg"/></div>
                    <h3 class="nomargin">Ravi</h3>

                  </a>
                </li>
                  <li><a  href="suzuki-mehran/661.html" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Humsafar 70</a></li>
                  <li><a  href="suzuki-cultus/660.html" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">Humsafar Plus</a></li>
                  <li><a  href="suzuki-alto/658.html" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">Piaggio Storm 125</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="hyundai/15.html" id="amk_hyundai" title="Hyundai Cars in Pakistan">
                    <div class=""><img src="images/unique.jpg"/></div>
                    <h3 class="nomargin">Unique</h3>

                  </a>
                </li>
                  <li><a  href="#" id="amd_Hyundai,Santro" title="Hyundai Santro For Sale in Pakistan">UD 100</a></li>
                  <li><a  href="#" id="amd_Hyundai,Shehzore" title="Hyundai Shehzore For Sale in Pakistan">UD 125</a></li>
                  <li><a  href="#" id="amd_Hyundai,Excel" title="Hyundai Excel For Sale in Pakistan">UD 70</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class=""><img src="images/kawasak.jpg"/></div>
                    <h3 class="nomargin">Kawasak</h3>

                  </a>



                </li>
                  <li><a  href="#" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Eliminator ZL 750</a></li>
                  <li><a  href="#" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">ER-6n</a></li>
                  <li><a  href="#" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">GTO 100</a></li>
                  <li><a  href="#" id="amd_Suzuki,Bolan" title="Suzuki Bolan For Sale in Pakistan">GTO 110</a></li>
              </ul>
              <ul class="make-list list-unstyled col-sm-3 col-xs-6 hidden-xs">
                <li class="heading">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class=""><img src="images/honda.jpg"/></div>
                    <h3 class="nomargin">Honda</h3>
                  </a>
                </li>
                  <li><a  href="#" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">50cc</a></li>
                  <li><a  href="#" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">CB 150F</a></li>
                  <li><a  href="#" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">CB 180</a></li>
                  <li><a  href="#" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">CB 350</a></li>
              </ul>
              
             
            </ul>
            
          
            
      </div>
    </div>
  </div>
</section>-->
  
  <section class="hidden-xs col-xs-12">
  <div class="container">
  <h2 class="text-center">
      Popular Bikes by Make &amp; Model
      </h2>
  <div class="col-xs-12 bg-white">
    
        <div class="btn-group bx-pager-btn">
          <span class="slider1-prev btn"></span>
          <span class="slider1-next btn"></span>
        </div>
    
    <div id="browse-by-brand_used-cars" dir="ltr">
      <div id="slider1" style="overflow: hidden;">
             <ul class="vehicle-model-0">

              @foreach($make_model as $m_m)
              <ul class="make-list list-unstyled col-sm-3 col-xs-6">
                <li class="heading ">
                  <a href="{{Route('/getBikesByManufacture',['id' => $m_m[1]])}}" id="amk_toyota" title="{{$m_m[0]}} bikes in Pakistan">
                    <div class=""><img src="{{URL::asset('images'.$m_m[2])}}" alt="no image" width="100" height="100" /></div>
                    <h3 class="nomargin">{{$m_m[0]}}</h3>
                  </a>
                </li>
                @foreach($m_m[3] as $m)

                  <li><a  href="{{Route('/getBikesByModel',['id' => $m->id])}}" id="amd_Toyota,Corolla" title="{{$m->title}} For Sale in Pakistan">{{$m->title}} </a>
                  </li>
                  @endforeach

              </ul>
              @endforeach

              
             
            </ul>
            
          
            
      </div>
    </div>
  </div>
  </div><!-- container -->
</section ><div class="clearfix"></div>
   @if(!$city_bikes->isEmpty())
    <section class="business bg-grey  p-top-40 p-bottom-40">
    <div class="container ">
     <h2 class="text-center p-top-20">Bikes by City</h2>
      <div class="main_product ">
          <table class="table bg-white" style="padding: 20px;">
          <tbody>
            <tr>
              <td class="" style="border-top:none;"><div class="text-center fix">
                 
                </div>
                    <?php $have_data = false;?>
                  
                  @foreach($city_bikes as $c_v_c)
                  @if($c_v_c->popular==1)
                  @if($have_data == false)
                   <div class="col-xs-12 m-top-20"><h4 style="color:gray;">Popular Cities</h4></div>  
                   <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-home" >
                   <?php $have_data = true; ?>
                  @endif
                  <li class="col-md-3"> <a style="" href="{{Route('/getBikesByCity', ['id' => $c_v_c->id])}}#result" id="{{$c_v_c->id}}" title="Bikes for Sale in {{$c_v_c->title}}">
                    <h4>Cars {{$c_v_c->title}}</h4>
                    {{$c_v_c->size}}+  Bikes </a> </li>
                    @endif
                    @endforeach

                 
                @if($have_data == true)
                </ul>
                   @endif
                   
                  <?php $have_data = false;?>
               
                  @foreach($city_bikes as $c_v_c)
                  @if($c_v_c->popular==0 )
                  @if($have_data == false)
                   <div class="col-xs-12 m-top-20"><h4 style="color:gray;">Others Cities</h4></div>  
                   <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-home" >
                       <?php $have_data = true; ?>
                       @endif
                  
                  <li class="col-md-3"> <a style="" href="{{Route('/getBikesByCity', ['id' => $c_v_c->id])}}#result" id="{{$c_v_c->id}}" title="Bikes for Sale in {{$c_v_c->title}}">
                    <h4>Cars {{$c_v_c->title}}</h4>
                    {{$c_v_c->size}}+  Bikes </a> </li>
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


<section class="m-top-30 m-bottom-30 ">
<div class="container">
<div class="col-sm-4"><a href="#"><img src="{{URL::asset('assets/bike/images/bikead1.png')}}" class=" center-block m-bottom-20" alt=""></a></div>

<div class="col-sm-4"><a href="#"><img src="{{URL::asset('assets/bike/images/bikead2.png')}}" class="center-block m-bottom-20" alt=""></a></div>

<div class="col-sm-4"><a href="#"><img src="{{URL::asset('assets/bike/images/bikead3.png')}}" class="center-block m-bottom-20" alt=""></a></div>
</div>
</section>


    


    </div>
  
</div>
@endsection

<!--Footer section-->




@section('jsblock')

<script>
    
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
         $("#model").trigger("chosen:updated");
        $("#model").trigger("liszt:updated");
      });
    });
  });
  
  $(function () {
    $('#make_mobile').change(function () {
     
      var data = {'make': $(this).val()};
      $.get('/getBikeModelByMake', data, function (data) {
        var model = $('#model_mobile');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Bike Model' + "</option>");
        
        $.each(data, function (index, element) {
            console.log(element);
          model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
         $("#model_mobile").trigger("chosen:updated");
        $("#model_mobile").trigger("liszt:updated");
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
                    
                     $("#city_area").trigger("chosen:updated");
        $("#city_area").trigger("liszt:updated");
                   
        });
    });
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
  @endsection