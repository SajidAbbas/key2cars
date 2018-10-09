@extends('websiteMasterView')

@section('title')
New Car for Sale in Pakistan | Key2Cars
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
   <!--Google Font link-->
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
        <div class="hidden-lg hidden-md hidden-sm " style="text-align: center">
        <h2 style="text-align:center;">Find Cars for Sale in Pakistan</h2>
        <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-left:0;">
          <div class="row">
            <select style="background:#FFFFFF !important;" name="make" id="make_mobile" class="chzn-select" tabindex="1" >
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
           <select class="chzn-select" name="model" id="model_mobile">
              <option value="-1" selected="">Car Model</option>
            </select>
          </div>
        </div>
        
        <div class="clear"></div>
        
        
        
        
        
        <div class="col-sm-12">
          <div class="row">
           <button style="width:100%;" type="button" id="searchbutton" onclick="return submitFormMobile();" class="btn btn-danger">Search</button>
         </div>
        </div>
     
        </div>
        
    <section class="search-main  search-form hidden-xs" >
  <div class="container">
    <div class="search-main " style="position: relative;background: none;">
      <div id="top-search-heading" class="head">
        <h1>Find new cars in Pakistan</h1>
        <p>Search New Cars by make and model</p>
      </div>
<div class="" tabindex="0">
  <div id="used-cars">
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
       
      <li class="home-chzn" style="width:35%;">
        <select style="background:#FFFFFF !important;" name="make" id="make" class="chzn-select" tabindex="1" >
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
      
      <li class="home-chzn" style="width:35%;">
          <select style="background:#FFFFFF !important; height: 40px;" name="model" id="model" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >Car Model</option>
            
        </select>
      </li>
      <li style="width:20%;" class="pull-right">
           <button type="button" class="btn btn-danger btn-lg btn-block" onclick="return submitForm();"  tabindex="6">  Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
       
          
      </li>      
     
       
    </ul>
  </div>
</div>

    </div>
  </div>
</section>
 	
  
  
  <div class="m-top-10" id=""></div>
            
<!--    <div class="container">  <img class="img-responsive m-top-10 m-bottom-10" style="width:100%;" src="images/car.gif"/> </div>
-->                            

<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <!--<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>-->

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="{{URL::asset('assets/car/images/new-car.jpg')}}" alt="car" width="100%" height="100%">
          <div class="carousel-caption banner-text ">
            <h1 class="m-bottom-20">New Cars</h1>
            <p>Find out if your car qualifies for one of the many scrappage schemes currently available, and how much you could save.</p>
          </div>
        </div>

        <div class="item">
          <img src="{{URL::asset('assets/car/images/new-car.jpg')}}" alt="Chania" width="100%" height="100%">
          <div class="carousel-caption banner-text ">
            <h1 class="m-bottom-20">New Cars</h1>
            <p>Find out if your car qualifies for one of the many scrappage schemes currently available, and how much you could save.</p>
          </div>
        </div>
        <div class="item">
          <img src="{{URL::asset('assets/car/images/new-car.jpg')}}" alt="Chania" width="100%" height="100%">
          <div class="carousel-caption banner-text ">
            <h1 class="m-bottom-20">New Cars</h1>
            <p>Find out if your car qualifies for one of the many scrappage schemes currently available, and how much you could save.</p>
          </div>
        </div>
        <div class="item">
          <img src="{{URL::asset('assets/car/images/new-car.jpg')}}" alt="Chania" width="100%" height="100%">
          <div class="carousel-caption banner-text ">
            <h1 class="m-bottom-20">New Cars</h1>
            <p>Find out if your car qualifies for one of the many scrappage schemes currently available, and how much you could save.</p>
          </div>
        </div>

    

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="fa fa-chevron-circle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>




<section>
    <div class="container"> 
    		<div class="title-padding">
            <div class="pull-left"><h4>Upcoming</h4></div>
            <!--div class="pull-right"><a href="#">Read More</a></div-->
            <div class="clearfix"></div>
            </div>
      <div class="used-car-search-results" id="result" data-pjax-container>
        <div class="search-page-new">
          <div class="row">
            
            <div class="col-md-12 search-listing ">
              <div>
                    
                  <div class="row">
                      <div class="col-md-12">
                        @foreach($vehicle as $v)
                     
                        <div class="col-sm-3 col-xs-12 m-top-20">
                          <div class="port_item border" style="background:#FFFFFF;">
                            <div class="port_img"> <a href="{{Route('/GetNewVehicleDetails', ['id' => $v->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$v->url)}}" alt="" /></a>
                            </div>
                          <div class="port_caption m-top-10 car-info">
                            <h3><a href="{{Route('/GetNewVehicleDetails', ['id' => $v->id])}}" style="padding:1px; display:block;">{{$v->title}}</a></h3><hr>
                            <div ><?php echo $v->short_description;?></div><hr>
                           <div class="clear"></div>
                             </div>
                          </div>
                        </div>
                        
                       @endforeach
                       
                     
                        
                        
                       
                       
                      </div>
                    </div>
               <br>

             
                <div id="ad-in-search-bottom" class="tlc">
                  <div  class="m-top-20">{{$vehicle->links()}}</div>
                </div>
                
                
                <!-- TODO: discuss with usman ali about reviews count and car model instance variable --> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    









    </div>                      
	 
</div>
    


  
@endsection



@section('jsblock')
<script>
   
    $('#make').change(function () {
      
      var data = {'make': $(this).val()};
      $.get('/getModelByMake', data, function (data) {
     
        $("#model").empty(); 
        $('#model').append("<option value='-1'  selected>" + 'Car Model' + "</option>");
         $('#model').append("<optgroup label='Popular Models'>");
       
        
        $.each(data, function (index, element) {
            
        if(element.popular==1)
           {
                $("#model").append("<option value='" + element.id + "'>" + element.title + "</option>");
           }
           });
           
           
           $('#model').append("</optgroup>");
           
           $('#model').append("<optgroup label='Other  Models'>");
          
          $.each(data, function (index, element) {
              
           if(element.popular==0)
           {
                $("#model").append("<option value='" + element.id + "'>" + element.title + "</option>");
           }
           });
             $('#model').append("</optgroup>");
             
      //   $("#model").trigger("chosen:updated");
        $("#model").trigger("liszt:updated");
        });
      });
   
    
    
    ////////////////mobile////////////////
    
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
    </script>

    <script>
        
        function submitForm()
        {
            if($('#make').val()==-1 || $('#model').val()==-1)
            {
              swal('Please select both make and model');
                return false;
            }
            else
            {
                 var data = {'make': $('#make').val(),'model':$('#model').val(),'type':{{\App\VehicleType::Car}}};
      $.get('/getNewVehiclesByMakeAndModel', data, function (data) {
     
       
       
        
        $.each(data, function (index, element) {
            
            document.getElementById('result').innerHTML=data;
      window.location.hash = '#result';
      
           });
            });
        }
        
    }
        
        function submitFormMobile()
        {
            if($('#make_mobile').val()==-1 || $('#model_mobile').val()==-1)
            {
              swal('Please select both make and model');
                return false;
            }
            else
            {
                 var data = {'make': $('#make_mobile').val(),'model':$('#model_mobile').val(),'type':{{\App\VehicleType::Car}}};
      $.get('/getNewVehiclesByMakeAndModel', data, function (data) {
     
       
       
        
        $.each(data, function (index, element) {
            
            document.getElementById('result').innerHTML=data;
      
          window.location.hash = '#result';
           });
            });
        }
        
    }
        
    
        </script>
  

@endsection