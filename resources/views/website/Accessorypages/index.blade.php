@extends('websiteMasterView')

@section('title')
Find Accessories |  Key2Cars
@endsection

@section('icons')

<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="accessories-active"  href="{{Route('/accessory')}}"></a></li>
             <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
             <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
           
            
            
            
          </ul>
    
    
        </div>

<ul class="center-block hidden-sm hidden-lg hidden-md " id="">
    <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="car" href="{{Route('carIndexPage')}}"></a></li>
            <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="bike"  href="{{Route('bike')}}"></a></li>
             <li class="col-xs-4"><a  style="padding: 17px; margin: 0" class="accessories-active"  href="{{Route('/accessory')}}"></a></li>
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

<link href="{{URL::asset('assets/accessory/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />
<script src="{{URL::asset('assets/accessory/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/accessory/js/index_used_cars.js')}}" type="text/javascript"></script>
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

<form class="form-horizontal hidden-lg hidden-md hidden-sm" style="text-align: center" id="searchForm" method="post" action="{{Route('/searchAccessory')}}" role="form">
                      {{ csrf_field() }}

        <h2 style="text-align:center;">Find Accessories for Sale in Pakistan</h2>
        <div class="form-group   col-xs-12 " style="margin-left:0;">
          <div class="row">
          <select name="category[]"  id="category_m" class=" chzn-select c-form__select pointer" style="width:100%;" >
        <option value="" selected="selected" disabled="disabled">Categories </option>
      @foreach($categories as $c)
        <option value="{{$c->id}}" >{{$c->title}}</option>
        @endforeach
    </select>
          </div>
        </div>
        <div class="form-group col-xs-12 " style="margin-right:0;">
          <div class=" row">
            <select name="sub_cateogry[]"  id="sub_category_m" class=" chzn-select c-form__select pointer" style="width:100%;" >
        <option value="" selected="selected" disabled="disabled">Sub Categories </option>
      
    </select>
          </div>
        </div>
        
        <div class="clear"></div>
        
        <div class="form-group">
          <div class="col-xs-12">
            <select style="background:#FFFFFF !important;" data-placeholder="City" name="city[]" id="city_m"  class="chzn-select c-form__select pointer" tabindex="1" >
             <option   value="" selected="selected" disabled="disabled" >City</option>
             <option   value=""><b>All Cities</b></option>
             <optgroup label="Popular Cities">
            @foreach($cities as $c)
            @if($c->popular==1)
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            @endif
            @endforeach
             </optgroup>
              <optgroup label="Other Brands ">
            @foreach($cities as $c)
             @if($c->popular==0)
            <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
            @endif
            @endforeach
             </optgroup>
             
        
        </select>
          </div>
        </div>
       
        
        <div class="col-sm-12">
          <div class="row">
           <button style="width:100%;" type="submit" id="searchbutton" class="btn btn-danger">Search</button>
         </div>
        </div>
      </form>
      
      

<section class="search-main hidden-xs search-form">
         <form method="post" action="{{Route('/searchAccessory')}}">
            {{ csrf_field() }}
             
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="container">
   <div class=" mb20" style="position: relative;">
     <div id="top-search-heading" class="head">
       <h1>Car Accessories | Auto Parts for Sale </h1>
       <p>lights, tyres, alloys &amp; more</p>
     </div>
     <form action="#" class="form-horizontal nomargin" >
       <ul class="search-fields search-fields3 clearfix mt20">
 <li>
   <select name="category[]"  id="category" class="accessory_city chzn-select c-form__select pointer" style="width:100%;" >
       <option value="" selected="selected" disabled="disabled">Categories e.g (tyres, exterior, etc)</option>
     @foreach($categories as $c)
       <option value="{{$c->id}}" >{{$c->title}}</option>
       @endforeach
   </select>
 </li><li>
   <select name="sub_cateogry[]"  id="sub_category" class="accessory_city chzn-select c-form__select pointer" style="width:100%;" >
       <option value="" selected="selected" disabled="disabled">Sub Categories e.g (alloy wheels, guards, etc)</option>
     
   </select>
 </li>
  <li class="home-chzn" style="width:33%;" >
        <select style="background:#FFFFFF !important;" data-placeholder="City" name="city[]" id="city"  class="chzn-select c-form__select pointer" tabindex="1" >
            <option   value=""selected="selected" disabled="disabled">City</option>
            <option   value=""><b>All Cities</b></option>
            <optgroup label="Popular Cities">
           @foreach($cities as $c)
           @if($c->popular==1)
           <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
           @endif
           @endforeach
            </optgroup>
             <optgroup label="Other Brands ">
           @foreach($cities as $c)
            @if($c->popular==0)
           <option  class="pr-text" value="{{$c->id}}" >{{$c->title}}</option>
           @endif
           @endforeach
            </optgroup>
           
       
       </select>
     </li>

</ul>
       <div class="search-functions clearfix mt10">
         <button type="submit" class="btn btn-danger btn-large pull-right" id="ad-listings-search-btn">  Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
       </div>
     </form>
   </div>
 </div>
         </form>
</section> 








<section>
  <div class="container hidden-xs m-top-10">
    <div class="">      
        <div class="">
            <a href="{{route('/sellAccessory')}}"> <img style="width:100%;" src="{{URL::asset('assets/images/accessories.gif')}}" class="img-responsive"/>
            </a> </div>
    </div>
  </div>
</section>

  <section id="product" class=" product">
    <div class="container">
      <div class="main_product m-top-40 bg-grey">
        <div class="fix">
          <h2 class="text-uppercase">Featured Accessories for Sale</h2>
        </div>
        <div id="carousel-example-generic" class="carousel slide row" data-ride="carousel"> 
          <!-- Indicators -->
          <ol class="carousel-indicators hidden-lg hidden-md hidden-sm hidden-xs">
             <?php $total_products = 0; ?>
                    <?php $number=0;?>
                   

                    @foreach($featured_accessories as $f_a)

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
          <div class="carousel-inner bg-grey" role="listbox" >
            @foreach($featured_accessories as $f_a)


                    @if($count==1)
                    <div class="item active">
                    
                    @endif

                    @if(($count%5==0)&&($count!=1))
                      <div class="item">
                      
                        @endif

            
                  <div class="col-sm-3 m-bottom-60">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="{{Route('/GetAccessoryDetails', ['id' => $f_a->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$f_a->url)}}" alt="" /></a> 
                       <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                       </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetAccessoryDetails', ['id' => $f_a->id])}}">{{$f_a->title}} </a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_a->price}}</span></h6>
                        <h6>Condition: {{$f_a->condition}}</h6>
                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; {{$f_a->city}}</div>
                        <a href="{{Route('/GetAccessoryDetails', ['id' => $f_a->id])}}" class="btn-more"  style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  
                  @if($count%4==0&&($count!=1))  
                                        
                                </div>
                                @endif
                                <?php $count++; ?>
                                @endforeach

                                @if(($count-1)%4!=0||($count-1)==1)  
                                        
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

  <section>
    <div class="container">  
      <h2>Browse Accessories By City</h2>
      <table class="table table-bordered well mb40"> 
        <tbody> 
          <tr>
            <td class="ptb0">
              <ul class="used-city-list list-unstyled clearfix mb0" id="accessories-browse-by-city">
                  @foreach($city_accessories as $c_a)
                <li class="col-md-4">
                  <a href="{{Route('/getAccessoriesByCity', ['id' => $c_a->id])}}" id="ct_lahore" title="Accessories for Sale in {{$c_a->title}}">
                  <h3>{{$c_a->title}}</h3>
                  {{$c_a->size}} accessories listed
</a>                </li>
               @endforeach
              </ul>
            </td> 
          </tr>
        </tbody> 
      </table>
    </div>
  </section>

@endsection

@section('jsblock')

<script>
 $('#category').change(function() {
     
        var data = { 'category': $(this).val() };
       
        $.get('/getSubCategoryByCategory', data, function (data) {
           var model = $('#sub_category');
                    model.empty();
                    
                     model.append("<option value='' selected='selected' disabled='disabled'>"+'Sub Categories e.g (alloy wheels, guards, etc)'+"</option>");
      
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
                    
                      $("#sub_category").trigger("chosen:updated");
        $("#sub_category").trigger("liszt:updated");
        });
    });

</script>

@endsection