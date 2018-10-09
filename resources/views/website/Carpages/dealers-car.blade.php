@extends('websiteMasterView')


@section('title')
Car Dealers |Key2Cars
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
  <form class="form-horizontal hidden-lg  hidden-md hidden-sm" style="text-align: center" id="searchForm" method="post" action="{{route('searchCarDealers')}}#result" role="form">
         {{csrf_field()}}
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
         <select style="background:#FFFFFF !important; height: 40px;" name="model" id="model_mobile" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >Car Model</option>
            
        </select>
          </div>
        </div>
        
        <div class="clear"></div>
        
        <div class="form-group">
          <div class="col-md-12">
               <select style="background:#FFFFFF !important; height: 40px;" name="city" id="city_mobile" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >City</option>
             <optgroup label="Popular Brands ">
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
        <div class="col-md-12">
        <select style="background:#FFFFFF !important; height: 40px;" name="category" id="category_mobile" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >Category</option>
            <option  class="pr-text" value="{{\App\VehicleType::New_Vehicle}}" >New car dealers</option>
            <option  class="pr-text" value="{{\App\VehicleType::Used_Vehicle}}" >Used car dealers</option>
            
        </select> </div>
      </div>
        
        <div class="col-sm-12">
          <div class="row">
           <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
         </div>
        </div>
      </form>
  </div>
  
  <section class="search-main  search-form hidden-xs ">
  <div class="container">
    <div class="search-main " style="position: relative;background: none;">
      <div id="top-search-heading" class="head">
        <h1>Find cars dealer in Pakistan</h1>
        <p>Find a dealer in your city to buy a car</p>
      </div>
          
<form class="form-horizontal "  method="post" action="{{route('searchCarDealers')}}#result" role="form">
  {{csrf_field()}}
<div class="" tabindex="0">
  <div id="used-cars">
   <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
    
      <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" name="make" id="make" class="chzn-select"  tabindex="1" >
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
    
      
      <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" name="model" id="model" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >Car Model</option>
            
        </select>
          
      </li>
           
       <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" name="city" id="city" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >City</option>
             <optgroup label="Popular Brands ">
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
           
       <li class="home-chzn" style="width:25%;">
          <select style="background:#FFFFFF !important;" name="category" id="category" class="chzn-select"  >;
            <option  class="pr-text" value="-1" >Category</option>
            <option  class="pr-text" value="{{\App\VehicleType::New_Vehicle}}" >New car dealers</option>
            <option  class="pr-text" value="{{\App\VehicleType::Used_Vehicle}}" >Used car dealers</option>
            
        </select>
      </li>
            
     
     
    </ul>
  </div>
</div>

    
      

      <div class="search-functions clearfix nomargin">
        
        <div id="search-row" class="pull-right">
          <button type="submit" class="btn btn-danger btn-lg btn-block"  id="home-search-btn" tabindex="6">  Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
        </div>  
      </div>
    </form>
    </div>
  </div>
</section>
         
         
      <section class="container">
          <a href="{{route('/sellCar')}}" target="_blank">  <img style="width:100%;" alt="" class="img-responsive center-block m-bottom-10" src="{{URL::asset('assets/images/car.gif')}}"/></a>
      </section>
            
      <div class="mt10 " id="main-container">
      
      <section>
      
      <!--<div class="container hidden-xs">
        <br>
<h2>New Featured Cars For Sale</h2>
    <div class="accordian">
    <ul>
		<li>
			<div class="image_title">
				<a href="#">New Featured Car Ads</a>
			</div> 
			<a href="#">
				<img src="images/featured-4.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Sell Your Featured Cars</a>
			</div>
			<a href="#">
				<img src="images/featured-3.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Buy Your Cars</a>
			</div>
			<a href="#">
				<img src="images/featured-2.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Deal Here Featured Cars</a>
			</div>
			<a href="#">
				<img src="images/featured-1.jpg"/>
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Featured Cars</a>
			</div>
			<a href="#">
				<img src="images/featured-5.jpg"/>
			</a>
		</li>
        <li>
			<div class="image_title">
				<a href="#">Featured Cars</a>
			</div>
			<a href="#">
				<img src="images/featured-6.jpg"/>
			</a>
		</li>
        <li>
			<div class="image_title">
				<a href="#">Featured Cars</a>
			</div>
			<a href="#">
				<img src="images/featured-3.jpg"/>
			</a>
		</li>
	</ul>
</div>
      
    </div>-->  
          
      </section>    
          
<section id='result'>  
  <div class="container">
    <div class="used-car-search-results">

      <div class="search-page-new">
        <div class="row">
          
          <div class="col-md-3 used-car-refine-search dealer-refine-search pos-rel">
          <div class="sidebar-filters">
            
            <div class="box">
              <div class="filter-panel-new">
                <div class="accordion" id="sidebar">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse_search_key_keyword">
                        <i class="fa fa-caret-down"></i>Search By Name
                      </a>
                    </div>

                    <div id="collapse_search_key_keyword" class="accordion-body collapse in">
                      <div class="accordion-inner">
                        
                          <input  name="name" id="name" placeholder="e.g Ali Motors" type="text" value="" style="padding-right:42px;" />

                          <input class="btn btn-primary refine-go" type="submit" onclick="filterRequest()" value="Go">
                       
                      </div>
                    </div>

                      <div class="accordion-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse_carsure">
                          <i class="fa fa-caret-down"></i>Dealer Type
                        </a>
                      </div>

                      <div id="collapse_carsure" class="accordion-body collapse in">
                        <div class="accordion-inner">
                          <ul>

                              <li>
                                  <label class="filter-check">
                                  <input type="checkbox" title="Carsure Dealer" >
                                      <a href="#" rel="nofollow"> Key2Car Certified dealers</a>
                                  </label>
                              </li>

                              

                            </ul>
                        </div>
                      </div>

                  </div>

                  <div class="accordion-group">
                    <div class="accordion-heading"> <a class="accordion-toggle " data-toggle="collapse" href="#collapse_1"> <i class="fa fa-caret-down"></i>Search By City </a> </div>
                    <div id="collapse_1" class="accordion-body collapse in">
                      <div class="accordion-inner">
                          <ul  id="dealers_cities_filter" onchange="filterRequest()" style="overflow: hidden;height: 250px;padding-bottom: 15px">
                         @foreach($city_dealers as $c_d)
                          <li>
                            <label class="filter-check">
                              <input type="checkbox" id="city_filter" name="city_filter" value="{{$c_d->id}}" title="Dealers in {{$c_d->title}}" />
                              <a href="#" rel="nofollow"> {{$c_d->title}}</a>

                              <span class="pull-right count">{{$c_d->size}}</span>
                            </label>
                          </li>
                          @endforeach
                        </ul>
                        <!--<div class="text-right" id="show_more_link">
                          <a href="javascript:void(0);" onclick="$('#show_more_link').hide();$('#show_less_link').show();$('#dealers_cities_filter').animate({height: actual_height_for_write_up},500);">
                            Show More <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>-->
                       <!-- <div class="text-right" id="show_less_link" style="display: none">
                          <a href="javascript:void(0);" onclick="$('#show_less_link').hide();$('#show_more_link').show();$('#dealers_cities_filter').animate({height: '250px'},500);">
                            Show Less <i class="fa fa-chevron-up"></i>
                          </a>
                        </div>-->
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>

          </div>
          
          

          
          
          <div id="wait" style="display:none;z-index: 9999;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>
                Loading..</div>

          <div class="col-md-9 dealer-search-listing" id='paginate_result' >
            <h1>Car Trader &amp; Dealers in Pakistan</h1>
                <div>
                  <ul class="list-unstyled search-results dealer-listing">
                             
	<div class="">
    	<!-- BEGIN PRODUCTS -->

        @if($dealer_cars->isEmpty())
        <h3 style='text-align: center; color:red;margin-top: 20px;'> No Record Found</h3>
        @endif
        
      @foreach($dealer_cars as $d_c)
      <div class="col-sm-12 border m-bottom-20" style="background:#FFFFFF;">
                        <div class=" col-xs-4">
                        <img src="{{URL::asset('images'.$d_c->img_url)}}" class="img-responsive imgM"/>
                        </div>
      <div class="col-xs-8">
                        
                        <h2 >{{$d_c->name}}</h2>
                        <div class="pull-left col-xs-8 row" >
                        <div class="ratings  clear">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-half-o"></i>
                  </div>
                             <p class=""><?php echo $d_c->short_description;?></p>
                         <p class=""><i class="fa fa-map-marker"></i>&nbsp; {{$d_c->address}}.</p>
                        
                        <p class="m-top-10 "><i class=" fa fa-info-circle"></i> Dealer Details..... </p>
                        </div>
                        <div class="pull-right col-xs-4"><img src="{{URL::asset('assets/images/key2cars-certified.png')}}"></div>
                        <br>
                        <div class="clear"></div>
                        <p class=" pull-left p-top-20"><i class=" fa fa-phone"></i> {{$d_c->number}}</p>
                        <a class="pull-right btn-more" href="{{route('carDealerDetailPage',['id'=>$d_c->id])}}"  style="text-decoration:none;">View More</a>
                        </div>
        </div>
  		
      @endforeach
  		
  		<!-- END PRODUCTS -->
	</div>
    </li>
                                

                  </ul>
             
                  <div data-pjax-enable><ul class="pagination search-pagi">
                    {{$dealer_cars->links()}}
  
  </div>
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
    
  
        
        
        
        
    $(function(){
        $(".filter-check a,.filter-uncheck a").each(function() {
            if ($("#dealer_name").val().length > 0) {
                prev_href = $(this).attr("href");
                if(prev_href.indexOf("?") != -1)
                  $(this).attr("href",prev_href+"&"+$("#dealer_name").attr("name")+"="+$("#dealer_name").val());
                else
                  $(this).attr("href",prev_href+"?"+$("#dealer_name").attr("name")+"="+$("#dealer_name").val());
            }
        });
      $(".filter-check a").live("click",function(){
        var checkbox = $(this).parent().children("input[type=checkbox]");
        if(!checkbox.is(':checked'))
          checkbox.attr('checked','checked');
      });
      $(".filter-uncheck a").live("click",function(){
        var checkbox = $(this).parent().children("input[type=checkbox]");
        if(checkbox.is(':checked'))
          checkbox.removeAttr('checked');
      });
      $(".filter-check input[type=checkbox]").live("change",function(){
        var link = $(this).parent().children("a");
        if($(this).is(':checked') && link.get(0))
          link.get(0).click();
      });
      $(".filter-uncheck input[type=checkbox]").live("change",function(){
        var link = $(this).parent().children("a");
        if(!$(this).is(':checked') && link.get(0))
          link.get(0).click();
      });
        var element = $('#dealers_cities_filter');
        var curHeight = element.height();
        actual_height_for_write_up = element.css('height', 'auto').height();
        element.height(curHeight);
        if(curHeight+5>=actual_height_for_write_up){
            $('#show_more_link').hide();
            element.css('height', 'auto');
        }
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
      
      function filterRequest()
  {
      
      $('#wait').show();
    
   var city = [];
   $.each($("input[name='city_filter']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
   
   var name=$("#name").val();


   var data = {'name':name,'city':city};

console.log(data);

   $.get('/updateDealers', data, function (data) {
       
        console.log(data);
        document.getElementById("paginate_result").innerHTML = data;
        
        
        $('#wait').hide();
    
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   
      
    

  }
    </script>


  

 
  
   
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
 @endsection