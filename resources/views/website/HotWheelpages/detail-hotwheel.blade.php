@extends('websiteMasterView')

@section('title')
Hot Wheels | Key2Cars
@endsection

@section('icons')
<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
            <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
            <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="accessories"  href="{{Route('/accessory')}}"></a></li>
            
          </ul>
        </div>



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
          

  	
  
    <div class="" id="main-container">
            
    <div class="container">  <img class="img-responsive m-top-10 m-bottom-10" style="width:100%;" src="{{URL::asset('images/ad.gif')}}"/> </div>

  <section>
    <div class="container">
      
      <div class="row ad-listing-template mt10" itemprop="itemOffered" itemscope="" itemtype="http://schema.org/Car">
       
        <div class="col-md-10 col-md-offset-1">
            
            <div class="">
             @foreach($data as $d)
             <div class="" style="padding:15px 30px; background:#F5F5F5; border-bottom:1px solid #DFDFDF;" >
              <div class="pull-left">
              <h1 itemprop="name">{{$d->title}}</h1>
              </div>
              <div class="pull-right">
              <h1 itemprop="name">{{$d->make}} {{$d->model}}</h1>              
              </div>
              <div class="clear"></div>
              </div> 
             
              <div id="content-slider" class="clr">
		<div class="wrap-slider clr">	
		<br>
		
<!-- 	========================Thumbnail ControlNav======================================    -->
                        <?php $count=1;?>
                    @foreach($images as $img)

			<input type="radio" id="a-{{$count++}}" name="a" >	
                        @endforeach
			
			
			<nav id="main">
                             <?php $count=1;?>
                    @foreach($images as $img)
          <label for="a-{{$count++}}" class="first"></label>
         @endforeach
          <!-- <label for="a-5" class="first"></label> -->
			</nav>
<!-- 	==============================================================    -->
			<nav id="control">
                             <?php $count=1;?>
                    @foreach($images as $img)
          <label for="a-{{$count++}}" ></label>
         @endforeach
          
			</nav>
<!-- 	==============================================================    -->

				<!-- 	IMAGE NAVIGATION pic -->
                                 <?php $count=1;$index=10;?>
                    @foreach($images as $img)
			<span id="b-{{$count}}" class="th" tabindex="{{$index++}}">
                            <img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}">
				 
			</span>
                    @endforeach

					

			

			
			<!-- ______________IMAGES_________________________________________ -->						

			<div class="slider">
				<div class="inset">
                                     <?php $count=1;?>
                    @foreach($images as $img)

					<figure>
					     
						<img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="f">						
					</figure>

					@endforeach
									
				</div>
			</div>					

		</div>		
	</div><br>


              
              

              
                <div class="col-xs-12 bg-white" style="padding:0px 30px 20px; margin-bottom:20px;">
                <div class="col-xs-6 p-top-10"><h5>Ride Owner</h5>
                <h2>Muhammad Nadeem</h2>
                <h4><i class="fa fa-mobile"> {{$d->number}}</i></h4>
                </div>
                
                </div>
                
                <div class="col-xs-12 bg-white" style="padding:0px 30px 20px; margin-bottom:20px;">
                <h2 class="ad-detail-heading mt30">What's Cool About My Vehicle</h2>
                        <div class="primary-lang">{{$d->description}}
                        </div>
                </div>
                

            </div>
            @endforeach

<div class="clearfix"></div>
            

        </div>
      </div>
    </div>
  </section>
  
  
    
    </div>

@endsection




@section('jsblock')
@endsection