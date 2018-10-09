@extends('websiteMasterView')


@section('title')
Bike Dealers |  Key2Cars
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
   <div class="container">
  <section>
 
  <div class=" col-xs-12 bg-white border" style="margin:10px 0">
  <div class="col-xs-4"><img src="{{asset('images/'.$dealer_info->img_url)}}" class="img-responsive"/></div>
  <div class="col-xs-8"><h2>{{$dealer_info->name}}</h2>
  <p><?php echo $dealer_info->short_description;?></p><br>
  <h4>Why {{$dealer_info->name}}</h4>
  <p><?php echo $dealer_info->description;?> </p><br>
</div>
  </div>  
  
  </section>
  <section>
  <div class="col-md-9 search-listing ">
             <div class="panel panel-primary  " style="border:none; box-shadow:none;">
                
                <div class="panel-body" style=" padding:0; background:#f7f8f9;">
                    <div class="tab-content">
                    
           <!--  ------------------Lists----------------------------->
                        <div class="tab-pane active hidden-xs" id="list">
                        <div class="col-sm-12"></div>
                      @foreach($dealer_bikes as $a_c)
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
                      <img class="hidden-lg hidden-md hidden-sm row mobile-list-img" src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" > </div>
                    <div class="col-xs-8 "><a href="{{Route('/GetBikeDetails', ['id' => $a_c->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_c->manufacture}} {{$a_c->model}}</h2>
                      </a>
                      <h2 class="pull-right mobileh2">PKR {{$a_c->price}}</h2>
                      <div class="clear m-bottom-10 "></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_c->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route('/GetBikeDetails', ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a>
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
                        <h4 class="col-xs-4 mobileh4">{{$a_c->engine_capacity}}CC</h4>
                        
                      </div>
                      <br>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_c->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route('/GetBikeDetails', ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                  @endforeach
                        
                        
                        
                        
                        
                        </div>
                        
                        
         <!--  ------------------Grids----------------------------->
                      
         <div style='float: right'>
             {{$dealer_bikes->links()}}
         </div>
                    </div>
                </div>
            </div>
            </div>
            
  <div class="col-sm-6 col-md-3 border" style=" background:white; padding:3px;  margin-bottom: 10px;" >
  <div style=" background:white"><iframe 
  width="280" 
  height="500" 
  frameborder="0" 
  scrolling="no" 
  marginheight="0" 
  marginwidth="0" 
  src="https://maps.google.com/maps?q={{$lat}},{{$long}}&hl=es;z=14&amp;output=embed"
 >
 </iframe>
  </div>
  <div style=" background:white"><h4><i class="fa fa-map-marker"></i> Address:</h4>
  <p>{{$dealer_info->address}}, {{$dealer_info->city->title}}</p><br>

<h4><i class="fa fa-phone"></i> Phone:  {{$dealer_info->number}}</h4>
  <br>
</div>
  </div>
  </section>
  
</div>
@endsection


@section('jsblock')
   
 @endsection