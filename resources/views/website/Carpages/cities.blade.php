@extends('websiteMasterView')


@section('title')
Car for Sale in Pakistan |Key2Cars
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






    </div>
  

@endsection


@section('jsblock')
<script>
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
                   
        });
    });
});

$(function () {
    $('#make').change(function () {
       
      var data = {'make': $(this).val()};
      $.get('/getModelByMake', data, function (data) {
          var model=$('#model');
        
       //  model.append("<div id='make_chzn' class='chzn-container chzn-container-single' style='width:276px;'><a href='javascript:void(0)' class='chzn-single' tabindex='1'><div><b></b></div></a><div class='chzn-drop' style='left: -9000px; width: 274px; top: 39px;'><div class='chzn-search'><input type='text' autocomplete='off' tabindex='-1' style='width: 232px;'></div><ul class='chzn-results'><li id='make_chzn_o_0' class='active-result pr-text' style=''>Car Make</li>");
        
        $.each(data, function (index, element) {
            console.log(data);
          // model.append("<li id='make_chzn_o_2' class='active-result group-option pr-text result-selected' style=''>Honda</li>");
          
        //  $('ul.chzn-results').append('<li class="active-result">' + item.name + '</li>');


          model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
       // model.append("</ul></div></div> ");
      });
    });
  });
  
  $(function () {
    $('#model').change(function () {
       
      var data = {'model': $(this).val()};
      $.get('/getModelVersionByModel', data, function (data) {
        var model = $('#version');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Car Version' + "</option>");
        
         model.append("<div id='make_chzn' class='chzn-container chzn-container-single' style='width:276px;'><a href='javascript:void(0)' class='chzn-single' tabindex='1'><div><b></b></div></a><div class='chzn-drop' style='left: -9000px; width: 274px; top: 39px;'><div class='chzn-search'><input type='text' autocomplete='off' tabindex='-1' style='width: 232px;'></div><ul class='chzn-results'><li id='make_chzn_o_0' class='active-result pr-text' style=''>Car Make</li>");
        
        $.each(data, function (index, element) {
           model.append("<li id='make_chzn_o_2' class='active-result group-option pr-text result-selected' style=''>Honda</li>");

         // model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
        model.append("</ul></div></div> ");
      });
    });
  });
</script>
   
  

@endsection