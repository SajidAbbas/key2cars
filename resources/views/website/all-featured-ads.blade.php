@extends('websiteMasterView')

@section('title')
Car for Sale in Pakistan|Key2Cars
@endsection

@section('icons')

<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car-active" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike-active"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="accessories-active"  href="{{Route('/accessory')}}"></a></li>
             <li class=""><a class="tractor-active"  href="{{Route('/farms')}}"></a></li>
             <li class=""><a class="bus-active"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="truck-active"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
           
            
            
            
          </ul>
    
    
        </div>

<ul class="center-block hidden-sm hidden-lg hidden-md " id="">
    <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="car-active" href="{{Route('carIndexPage')}}"></a></li>
            <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="bike-active"  href="{{Route('bike')}}"></a></li>
             <li class="col-xs-4"><a  style="padding: 17px; margin: 0" class="accessories-active"  href="{{Route('/accessory')}}"></a></li>
             <li class="col-xs-4"><a class="tractor-active"  href="{{Route('/farms')}}"></a></li>
            <li class="col-xs-4"><a class="bus-active"  href="{{Route('/buses')}}"></a></li>
            <li class="col-xs-4"><a class="truck-active"  href="{{Route('/trucks')}}"></a></li>
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
        
      
<section>
    <div class="container"> 
      <div class="used-car-search-results">
      <h1>Featured  Ads By City <span style="font-weight: normal;"></span></h1>
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
               
                <div class="panel-heading top-bar" role="tab" id="open-message4">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Categories</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message4" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       <ul class="list-unstyled " onchange="filterRequest()">
                           
              
             
                            <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a   title="Cars for Sale in Pakistan">
                                <input type="checkbox"  id="manufacture" name="category" value="{{App\VehicleType::Car}}" >
                                Cars <span class="pull-right count">{{$car_size}}</span> </a> </label></input>
                            </li>
                             <li title="Bikes for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a   title="Bikes for Sale in Pakistan">
                                <input type="checkbox"  id="manufacture" name="category" value="{{App\VehicleType::Bike}}" >
                                Bikes <span class="pull-right count">{{$bike_size}}</span> </a> </label></input>
                            </li>
                            
                             <li title="Farm for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a   title="Farm for Sale in Pakistan">
                                <input type="checkbox"  id="manufacture" name="category" value="{{App\VehicleType::Farm}}" >
                                Farm <span class="pull-right count">{{$farm_size}}</span> </a> </label></input>
                            </li>
                            <li title="Buses for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a   title="Buses for Sale in Pakistan">
                                <input type="checkbox"  id="manufacture" name="category" value="{{App\VehicleType::Bus}}" >
                                Buses <span class="pull-right count">{{$bus_size}}</span> </a> </label></input>
                            </li>
                            <li title="Trucks for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a   title="Trukcs for Sale in Pakistan">
                                <input type="checkbox"  id="manufacture" name="category" value="{{App\VehicleType::Truck}}" >
                                Trucks <span class="pull-right count">{{$truck_size}}</span> </a> </label></input>
                            </li>
                             
                            
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
                    <h3 class="panel-title col-xs-3 mobileh2" style="margin-top: 5px;">Search Results</h3>
                    <select class="col-xs-3 mobileh2" style="color: gray" name="sort_price" id="sort_price" onchange="filterRequest()">
                        <option vlaue="-1">Sort By price</option>
                        <option value="0">Low to High</option>
                         <option value="1">High to Low</option>
                    </select>
                    <span class=" pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs" style="bottom:0;">
                            <li class="active mobileh2"><a href="#list" data-toggle="tab"><i class="fa fa-th-list"></i> List</a></li>
                            <li class="mobileh2"><a href="#grid" data-toggle="tab"><i class="fa fa-th-large"></i> Grid</a></li>
                             
                           
                        </ul>
                    </span>
                    <div class="clr"></div>
                </div>
                 <div class="clear"></div>
                 <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;z-index: 9999;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>
           
                <div class="panel-body update-box" >
                    <div class="tab-content" id="paginate_result">
                    
           <!--  ------------------Lists----------------------------->
                        <div class="tab-pane  active" id="list" id="cars-list">
                        <div class="col-sm-12"></div>
                        
                        @foreach($featured_Ads as $a_c)
                        
                        <div class="col-sm-12 border m-bottom-20" style="background: white;">
                            
                        <div class=" col-xs-4">
                        <div id="content-slider" class="clr hidden-xs">
		<div class="wrap-slider clr">	
		<br>
	
<!-- 	========================Thumbnail ControlNav======================================    -->
                     <?php $count=1;?>
                      @foreach($images[$a_c->id] as $img)
			<input type="radio" id="a-{{$count++}}" name="a">	
                        @endforeach
			
			
			<nav id="main">
                            <?php $count=1;?>
                      @foreach($images[$a_c->id] as $img)
          <label for="a-{{$count++}}" class="first"></label>
          @endforeach
			</nav>
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
                      @foreach($images[$a_c->id] as $img)
			<span id="b-{{$count}}" class="th" tabindex="{{$index++}}">
				<img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}">
				
			</span>
                      
                      @endforeach

			
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
                      <img class="hidden-lg hidden-md hidden-sm row mobile-list-img" src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" > </div>
                    <div class="col-xs-8 "><a href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_c->manufacture}} {{$a_c->model}} </h2>
                      </a>
                      <h2 class="pull-right mobileh2">PKR {{$a_c->price}}</h2>
                      <div class="clear m-bottom-10 "></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_c->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a>
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
                      <div class="pull-left  col-sm-8 col-xs-12 row">
                        <h4 class="col-xs-6 mobileh4">{{$a_c->engine_type}}</h4>
                       
                      </div>
                      <br>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_c->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                        
                        @endforeach
                        
                        
                        
                       
                       
                  		
                        </div>
                        
                       
         <!--  ------------------Grids----------------------------->
                        <div class="tab-pane " id="grid" id="cars-grid" >
                        <div class="col-sm-12"></div>
                        
                       @foreach($featured_Ads as $a_c)

                       <div class="col-sm-4 col-xs-12 m-top-20">
                  <div class="port_item border">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"><a href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$a_c->url) }}" alt="" /></a> @if($a_c->featured==1)
                        <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                        @endif </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}">{{$a_c->manufacture}} {{$a_c->model}} &nbsp; {{$a_c->year}}</a></h3>
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
                        <a href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                      </div>
                    </div>
                  </div>
                </div>
                        
                        @endforeach
                  		 
                        
                        
                        </div>
                       
                    </div>
                </div>
            </div>
            <div id="ad-in-search-bottom" class="tlc">
                  <div  class="m-top-20"> </div>
                </div>
                <div data-pjax-enable>
                  <ul class="pagination search-pagi" id="paginate">
                    {{$featured_Ads->links()}}
                  </ul>
                 
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
    
   
  
  
  function filterRequest()
  {
    $('#wait').show();
   var category= [];
   $.each($("input[name='category']:checked"), function(){            
                category.push($(this).val());
            });//alert("city :"+city.length);
   
 var sort_price=$("#sort_price").val();
   var data = {'category':category,'sort':sort_price};


   $.get('/updateFeaturedAds', data, function (data) {
       console.log(data);
        if(data==="")
        { document.getElementById("paginate_result").innerHTML="No cars found";
            $('#wait').hide();
        }
        
        else
        {
        document.getElementById("paginate_result").innerHTML = data;
        
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
        
    }
    $('#wait').hide();
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   
      
    

  }
</script>
@endsection