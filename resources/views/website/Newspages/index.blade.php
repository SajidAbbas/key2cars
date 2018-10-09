@extends('websiteMasterView')

@section('title')
   News & Reviews   | Key2Cars
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
        <!--Google Font link-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

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
        
        
        <!-- JS includes -->

        <script src="{{URL::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/vendor/bootstrap.min.js')}}"></script>

        
       



        <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
        <script src="{{URL::asset('assets/js/main.js')}}"></script>

    

    <link href="{{URL::asset('assets/news/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
	<link href="{{URL::asset('assets/news/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{URL::asset('assets/news/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/news/js/index_used_cars.js')}}" type="text/javascript"></script>
<script src="{{URL ::asset('plugins/select2/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
   
@endsection

 
@section('content')
      <!--End off Navigation -->
      
       <div class="" id="main-container">
       
           @if($featured_news)
      <section class="reletive">
          @foreach($featured_news_images as $img)
  <img style="width:100%;" class="" src="{{URL::asset('images'.$img->url)}}">
  
  @endforeach
  
  
  <div class="absolute bg-transparant">
  <div class="container">
  <h4 class="text-center text-white">Key2Car Latest</h4>
  <h1 class="text-center text-white">{{$featured_news->title}}</h1>
  <a class="read center-block text-center" href="{{Route('/GetNewsDetails', ['id' => $featured_news->id])}}">Read</a>
  </div>
     
  
  </div>
  </section>
           @endif
    <section class="hidden-xs search-bg m-top-20">
  <div class="container">
    <div class="" style="position: relative;">
      <div id="top-search-heading" class="head pull-left">
       
       <!-- <p>With thousand of cars,we have just the right one for you</p>-->
      </div>
            
        <div class="clear"></div>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:26%;left:50%;padding:2px; no-repeat scroll center center #FF"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>
    
<div class="" tabindex="0">
  <div id="used-cars">
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
      
      <li class="home-chzn"  style="width:25%;">
        <select  name="make" id="make" class="select2 c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" selected="selected" disabled="disabled">Car Make</option>
            @foreach($make as $m)
            <option  class="pr-text" value="{{$m->brand_id}}" >{{$m->brand}}</option>
            @endforeach
           
        </select>
      </li>
      
      <li class="home-chzn" style="width:25%;">
        <select  name="model" id="model" class="select2 c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" selected="selected" disabled="disable">Car Model</option>
           
        </select>
      </li>
                  
      <li class="home-chzn" style="width:25%;">
        <select  name="model_version" id="model_version" class="chzn-select c-form__select" tabindex="1" >
            <option  class="pr-text" value="-1" selected="selected" >model Version</option>
            
            
        </select>
      </li>
      
      <li class="home-chzn" style="width:25%;">
          <button style="margin:0;" class="read pull-right text-center"  onclick="submitForm()">Search</button>
      </li>
      
    </ul>
  </div>
  
</div>

 

      
    </div>
  </div>
</section>
	<section>
  <div class="container m-bottom-60">
      <div id="result">
      @foreach($all_news as $a_n)
  <div class="col-sm-3 m-top-20">
                          <div class="port_item xs-m-top-30 border">
                            <div class="port_img"> <a href="{{Route('/GetNewsDetails', ['id' => $a_n->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$a_n->url)}}" alt=""></a>
                            </div>
                            <div class="port_caption m-top-10 car-info">
                              <h3 ><a href="{{Route('/GetNewsDetails', ['id' => $a_n->id])}}">{{$a_n->title}}</a></h3>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
                              <p class="pull-left" style="margin-top: 5px;">{{$a_n->make}} {{$a_n->model}} {{$a_n->model_version}}</p>
                              <a href="{{Route('/GetNewsDetails', ['id' => $a_n->id])}}" class="btn-more pull-right"  style="text-decoration:none;">Read More</a>
                              <div class="clear"></div>
                               </div>
                          </div>
                        </div>
      
      @endforeach
      </div>
      
      <div class="clear"></div>
  <div data-pjax-enable style="margin-top: 10px;">
                  <ul class="pagination search-pagi" id="paginate">
                    {{$all_news->links()}}
                  </ul>
                 
                </div>
  
  
 
  </div>
  </section> 
	<div class="clear"></div>
</div>

  
  @endsection



@section('jsblock')
<script>
    ////////Model Dropdown Update/////


    $('#make').change(function() {
        var data = { 'make': $(this).val(),'vehicle_id':1};
       
        $.get('/getModelByManufacture', data, function (data) {
           var model = $('#model');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + 'Model' + "</option>");
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });


////////Model_Version Dropdown Update/////


    $('#model').change(function() {
        var data = { 'model': $(this).val() };
        

        $.get('/getModelVersionByModel', data, function (data) {
           var model = $('#model_version');
                    model.empty();
                    
                      model.append("<option value='' disabled selected>" + 'Model Version' + "</option>");
 
                    
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });

  
  function submitForm(){
      $('#wait').show();
     
      
      var data={make:$("#make").val(),model:$("#model").val(),model_version:$("#model_version").val()};
      $.get('/updateAllNews', data, function (data) {
       console.log(data);
        if(data==="")
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