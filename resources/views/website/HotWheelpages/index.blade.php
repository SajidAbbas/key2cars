@extends('websiteMasterView')

@section('title')
Hot Wheels  | Key2Cars
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

<link rel="stylesheet" href="{{URL ::asset('plugins/select2/select2.min.css') }}">

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
<script src="{{URL ::asset('plugins/select2/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
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
    <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:26%;left:50%;padding:2px; no-repeat scroll center center #FF"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>
               
        
        <h2 style="text-align:center;">Find Hot Wheel for Sale in Pakistan</h2>
        <div class="form-group pull-left col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-left:0;">
          <div class="row">
           <select style="background:#FFFFFF !important;" name="type" id="type_m" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" >Type</option>
            <i class="fa fa fa-angle-down pull-right"></i>
            <optgroup label="">
              <option value="{{\App\VehicleType::Car}}">Car</option>
              <option value="{{\App\VehicleType::Bike}}">Bike</option>
            </optgroup>
            
        </select>
          </div>
        </div>
        <div class="form-group pull-right col-lg-12  col-md-12 col-sm-12 col-xs-12 " style="margin-right:0;">
          <div class=" row">
          <select style="background:#FFFFFF !important;" name="make" id="make_m" class="chzn-select c-form__select" tabindex="1" >
           
            <option  class="pr-text" value="-1" > Make</option>
            <i class="fa fa fa-angle-down pull-right"></i>
                   
        </select>
          </div>
        </div>
        
        <div class="clear"></div>
        
        <div class="form-group">
          <div class="col-md-12">
             <select style="background:#FFFFFF !important;" name="model" id="model_m" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" >Model</option>
            <i class="fa fa fa-angle-down pull-right"></i>
            
        </select>
          </div>
        </div>
        
        
        
        <div class="col-sm-12">
          <div class="row">
           <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="submitFormM()" id="home-search-btn" tabindex="6">  Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
       </div>
        </div>
     
               
    <section class="search-main hidden-xs">
  <div class="container">
    <div class="search-main " style="position: relative;">
      <div id="top-search-heading" class="head pull-left">
        <h1>Search Hot Wheels</h1>
       <!-- <p>With thousand of cars,we have just the right one for you</p>-->
      </div>
            
        <div class="clear"></div>

<div class="" tabindex="0">
  <div id="used-cars">
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
      
         <li class="home-chzn">
        <select style="background:#FFFFFF !important;" name="type" id="type" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" >Type</option>
            <i class="fa fa fa-angle-down pull-right"></i>
            <optgroup label="">
              <option value="{{\App\VehicleType::Car}}">Car</option>
              <option value="{{\App\VehicleType::Bike}}">Bike</option>
            </optgroup>
            
        </select>
      </li>
      <li class="home-chzn" >
        <select style="background:#FFFFFF !important;" name="make" id="make" class="chzn-select c-form__select" tabindex="1" >
           
            <option  class="pr-text" value="-1" > Make</option>
            <i class="fa fa fa-angle-down pull-right"></i>
                   
        </select>
      </li>
      
      <li class="home-chzn">
        <select style="background:#FFFFFF !important;" name="model" id="model" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" >Model</option>
            <i class="fa fa fa-angle-down pull-right"></i>
            
        </select>
      </li>
            
      
      
      
     
    </ul>
  </div>
  
</div>

 

      <div class="search-functions clearfix nomargin">
        
        <div id="search-row" class="pull-right">
          <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="submitForm()" id="home-search-btn" tabindex="6">  Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
        </div>  
      </div>
    </div>
  </div>
</section>
                             
 <section class="p-top-20  m-bottom-20">
 <div class="container" id="result">
     @foreach($all_vehicles as $a_v)
 <div class="col-sm-3 m-top-20">
    <div class="port_item xs-m-top-30 border" style=" background:#FFFFFF;">
                            <div class="port_img"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$a_v->url)}}" alt="">
                            </div>
                            <div class="port_caption m-top-10 car-info" >
                              <h3 ><a href="{{Route('/GetHotWheelDetails', ['id' => $a_v->id])}}">{{$a_v->title}}</a></h3>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
@foreach($images_size[$a_v->id] as $img)
                              <div class="pull-left"><a href="{{Route('/GetHotWheelDetails', ['id' => $a_v->id])}}"><i class="fa fa-image"> {{$img->size}}</i></a></div>
@endforeach
                              <div class="pull-right"><i class="fa fa-star-full"></i><i class="fa fa-star-full"></i><i class="fa fa-star-full"></i><i class="fa fa-star-full"></i><i class="fa fa-star-half-full"></i></div>
                              
                              
                               </div>
                          </div>
 </div>
     @endforeach
    
     
 
 </div>
      <div data-pjax-enable>
                  <ul class="pagination search-pagi" id="paginate">
                    {{$all_vehicles->links()}}
                  </ul>
                 
                </div>
 </section> 
<a href="{{Route('/post-hotwheel')}}" class="sell-bar-fixed" target="_blank" > <span class="sell-icons"><i class="fa fa-car"></i> </span>Post Car </a>
   
	<div class="clear"></div>
</div>

  
  @endsection





  @section('jsblock')
  
  <script>
  $(function () {
    $('#type').change(function () {
     
      var data = {'type': $(this).val()};
      $.get('/getMakeByType', data, function (data) {
        var model = $('#make');
        model.empty();
        model.append("<option value='' disabled selected>" + ' Make' + "</option>");
        
        $.each(data, function (index, element) {
          //  console.log(element);
            
          model.append("<option value='" + element.brand_id + "'>" + element.brand + "</option>");
        });
        $("#make").trigger("chosen:updated");
        $("#make").trigger("liszt:updated");
      });
    });
  });
 
 
 $(function () {
    $('#make').change(function () {
     
      var data = {'make': $(this).val(),'type':$("#type").val()};
      $.get('/getModelByMakeHotWheel', data, function (data) {
        var model = $('#model');
        model.empty();
        model.append("<option value='' disabled selected>" + ' Model' + "</option>");
        
        $.each(data, function (index, element) {
           
          model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
        $("#model").trigger("chosen:updated");
        $("#model").trigger("liszt:updated");
      });
    });
  });
  
  
  
  function submitForm()
  {
       $('#wait').show();
  

   var type=$("#type").val();
   var make=$("#make").val();

   var model=$("#model").val();
   


   var data = {'type':type,'make':make,'model':model};


   $.get('/updateAllHotWheels', data, function (data) {
      
        if(data=="")
        { document.getElementById("result").innerHTML="No cars found";
        $('#wait').hide();}
        
        else
        {
        document.getElementById("result").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
        $('#wait').hide();
    }
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   
      
    
  }
  
  
  
  
  </script>
  
  
  <script>
      //Mobile Version
      $(function () {
    $('#type_m').change(function () {
     
      var data = {'type': $(this).val()};
      $.get('/getMakeByType', data, function (data) {
        var model = $('#make_m');
        model.empty();
        model.append("<option value='' disabled selected>" + ' Make' + "</option>");
        
        $.each(data, function (index, element) {
          //  console.log(element);
            
          model.append("<option value='" + element.brand_id + "'>" + element.brand + "</option>");
        });
        $("#make_m").trigger("chosen:updated");
        $("#make_m").trigger("liszt:updated");
      });
    });
  });
 
 
 $(function () {
    $('#make_m').change(function () {
     
      var data = {'make': $(this).val(),'type':$("#type_m").val()};
      $.get('/getModelByMakeHotWheel', data, function (data) {
        var model = $('#model_m');
        model.empty();
        model.append("<option value='' disabled selected>" + ' Model' + "</option>");
        
        $.each(data, function (index, element) {
           
          model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
        $("#model_m").trigger("chosen:updated");
        $("#model_m").trigger("liszt:updated");
      });
    });
  });
  
  
  
  function submitFormM()
  {
       $('#wait').show();
  

   var type=$("#type_m").val();
   var make=$("#make_m").val();

   var model=$("#model_m").val();
   


   var data = {'type':type,'make':make,'model':model};


   $.get('/updateAllHotWheels', data, function (data) {
      
        if(data=="")
        { document.getElementById("result").innerHTML="No cars found";
        $('#wait').hide();}
        
        else
        {
        document.getElementById("result").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
        $('#wait').hide();
    }
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   
      
    
  }
  
      
      
      
      </script>
      
  @endsection