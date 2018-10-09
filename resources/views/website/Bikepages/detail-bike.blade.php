@extends('websiteMasterView')



@section('title')
Bike for Sale in Pakistan   | Key2Cars
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

    @endsection
  
  @section('content')
  
  
    <div class="" id="main-container">
            
    <div class="container">  <img class="img-responsive m-top-10 m-bottom-10" style="width:100%;" src="{{URL::asset('assets/images/bike.gif')}}"/> </div>

  <section>
    @foreach($data as $d)
    <div class="container">
      
      <div class="row ad-listing-template mt10" itemprop="itemOffered" itemscope="" itemtype="http://schema.org/Car">

        <div class="col-md-8">
            
            <div class="well">
<div  class="detail-title" style="" >
              <div class="pull-left col-sm-6">
              <h1 itemprop="name"  class="mobileh1">{{$d->manufacture}} {{$d->model}}  {{$d->model_year}}</h1>
             
              <p class="detail-sub-heading">
                <a href="#" target="_blank"><i class="fa fa-map-marker"></i> {{$d->city}}</a> 
              </p>
              </div>
              <div class="col-sm-6 hidden-xs">
              <h1 itemprop="name" style="float:right;">PKR: {{$d->price}}</h1>              
              </div>
              <div class="clear"></div>
               <div class=" hidden-lg hidden-md hidden-sm">
              <h1 itemprop="name" style="padding-left:10px; font-size:1.2em; float:left; text-align:left">PKR: {{$d->price}}</h1>              
              </div>
              <div class="clear"></div>
            </div>
   
              
              
              <!--//////////////////////NEW GALERY/////////////////////////////////////////-->    
              
              <div id="content-slider" class="clr">
		<div class="wrap-slider clr">	
		<br>
		
<!-- 	========================Thumbnail ControlNav======================================    -->	
                 <?php $count =1;?>
                    @foreach($images as $img)
			<input type="radio"  class="hidden-xs" id="a-{{$count++}}" name="a" >	
                        @endforeach
			
			
			<nav id="main" class="hidden-xs">
                <?php $count =1;?>
                    @foreach($images as $img)
                        <label for="a-{{$count++}}" class="first"></label>
                    @endforeach
         
         
			</nav>
<!-- 	==============================================================    -->
			<nav id="control" >
                            <?php $count =1;?>
                    @foreach($images as $img)
                           <label for="a-{{$count++}}" ></label>
                    @endforeach
         
			</nav>
<!-- 	==============================================================    -->

				<!-- 	IMAGE NAVIGATION pic -->
                                 <?php $count =1;$index=10;?>
                    @foreach($images as $img)
			<span id="b-{{$count}}" class="th" tabindex="{{$index++}}">
				<img src="{{URL::asset('images'.$img->url )}}" alt="" id="p-{{$count++}}">
				
			</span>
                    @endforeach

			
			
			<!-- ______________IMAGES_________________________________________ -->						

			<div class="slider">
				<div class="inset">
                                    <?php $count =1;?>
                                          @foreach($images as $img)

					<figure>
					  
						<img src="{{URL::asset('images'.$img->url) }}" alt="" id="i-{{$count++}}" class="f">						
					</figure>

					@endforeach				
				</div>
			</div>					

		</div>		
	</div>
              
              
              
              
              
              
              
              <div class="clear clearfix"></div>
              
            <!--////////////////END//////////////////////-->
            <div class="clear mobile-bottom" ></div>
              
                <table width="100%" class="table table-bordered text-center table-engine-detail fs16">
                  <tbody>
                    <tr>
                      <td>
                        <span class="engine-icon year"><i class="fa fa-calendar"></i></span>
                        <p itemprop="dateVehicleFirstRegistered">{{$d->model_year}}</p>
                      </td>
                      <td>
                        <span class="engine-icon millage"><i class="fa fa-tachometer "></i></span>
                        <p itemprop="mileageFromOdometer">{{$d->mileage}} km</p>
                      </td>
                      <td>
                        <span class="engine-icon millage"><i class="fa fa-flask"></i></span>
                        <p itemprop="mileageFromOdometer">{{$d->engine}}</p>
                      </td>
                     
                    </tr>
                  </tbody>
                </table>
                
                
                <div class="row">
      <div class="col-md-12">
            <div class="panel with-nav-tabs panel-primary" style="    margin-bottom: -19px;">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab3default" data-toggle="tab">Seller's Comments</a></li>
                            <li ><a href="#tab1default" data-toggle="tab">Overviews</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Car features</a></li>
                            
                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab1default">
                        
                        <ul class="list-unstyled ul-featured clearfix">
                  
                  <li class="ad-data">Registered City</li>
                  <li>{{$d->reg_city}}</li>

                  
                  
                  
                  <li class="ad-data">Last Updated:</li>
                  <li>{{$updated_date[$d->id]}}</li>
                
                  <li class="ad-data">Ad Ref #</li>
                  <li>{{$d->id}}</li>

                </ul>
                        
                        </div>
                        
                        
                        <div class="tab-pane fade" id="tab2default">
                        
                        <h2 class="ad-detail-heading mt30">Car features</h2>
                        <ul class="list-unstyled car-feature-list nomargin">
                          @foreach($feature as $f)
                          <li><img src="{{ URL ::asset('images'.$f->url) }}">{{$f->title}}</li>

                          @endforeach
                            
                        </ul>
                        <div class="clearfix"></div>
                        
                        </div>
                        
                        <div class="tab-pane active" id="tab3default">
                        
                        <h2 class="ad-detail-heading mt30">Seller's Comments</h2>
                        <div class="primary-lang">
                          {{$d->description}}
                          <label class="detail-tip show">Mention Key2Car.com when calling Seller to get a good deal</label>
                        
                        </div>
                        
                        </div>
                        
                         
                        
                    </div>
                </div>
            </div>
        </div>
        
  </div>

            </div>

<div class="clearfix"></div>
            

        </div>
        
        <div class="col-md-4 sidebar-ab" style="z-index:32;"> <!-- z-index is 32, bcoz of feature ads "Feature" tag -->


            <div class="well well-sm">
                <div class="row">
                    
                    <div class="">
                    <img src="{{URL::asset('assets/car/images/Certified-couple.jpg')}}" alt="" class="center-block img-rounded img-responsive" />
                    
                        <h2>
                            {{$d->seller_name}}</h2>
                        <small><cite ><i class="fa fa-map-marker"></i>
                         {{$d->city}}, Pakistan </cite></small><hr>
                        <h3>
                            <i class="fa fa-envelope-o"></i> {{$d->email}}</h3>
                           <hr>
                           <h3> <i class="fa fa-phone"></i> {{$d->number}}</h3>
                        
                    </div>
                </div>
            </div>
        
 

  <div class="well mb10 mt20">
  
  <h2 class="text-left">Safety tips for transaction</h2>
  <ol class="m-l-15">
    <li>Use a safe location to meet seller</li>
    <li>Avoid cash transactions</li>
    <li>Beware of unrealistic offers</li>
  </ol>
    
</div>

     



</div>
  
      </div>
    </div>
    @endforeach
  </section>
    
      <section>
  <div class="container">
     <h2 class="text-uppercase">Similar Bikes Ads</h2>
     <div class="row">
            
            	  @foreach($related_bikes as $r_b)
                        
                   <div class="col-sm-3 ">
                          <div class="port_item xs-m-top-30 border bg-white">
                           <div class="port_img"><a href="{{Route('/GetBikeDetails', ['id' => $r_b->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$r_b->url) }}" alt="" /></a>
                       @if($r_b->featured==1)
                              <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            @endif
                              </div>
                           <div class="port_caption m-top-10 car-info">
                           <h3 ><a href="{{Route('/GetBikeDetails', ['id' => $r_b->id])}}">{{$r_b->manufacture}} {{$r_b->model}} &nbsp; {{$r_b->year}}</a></h3>
                             <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$r_b->price}}</span></h6>
                       @if($r_b->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($r_b->condition==\App\VehicleType::Almost_New_Vehicle)
                         <h6>Condition: Almost New</h6>
                        @else
                         <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right"><h6><i class="fa fa-map-marker"></i>&nbsp; {{$r_b->city}}</h6></div>
                        <a href="{{Route('/GetBikeDetails', ['id' => $r_b->id])}}" class="btn-more"  style="text-decoration:none;">View More</a>
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>-->
                      </div>
                          </div>
                        </div>
                  
                         
                  @endforeach
                  
                 
                  
                  
            </div> <br>
<br>

  </div>
  </section>
    
    </div>

@endsection


@section('jsblock')

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  
 

 @endsection
