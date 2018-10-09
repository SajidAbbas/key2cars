@extends('websiteMasterView')

@section('title')
Accessories for Sale in Pakistan |Key2Cars
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

<!--End off Navigation -->

<div class="" id="main-container">
<div class="" id="main-container">
<!--section class="search-main hidden-xs">
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
        <select name="category[]"  id="category" class="accessory_city chzn-select c-form__select" style="width:100%;" >
          <option value="" selected="selected" disabled="disabled">Categories e.g (tyres, exterior, etc)</option>
          
      @foreach($categories as $c)
        
          <option value="{{$c->id}}" >{{$c->title}}</option>
          
        @endforeach
    
        </select>
      </li>
      <li>
        <select name="sub_cateogry[]"  id="sub_category" class="accessory_city chzn-select c-form__select" style="width:100%;" >
          <option value="" selected="selected" disabled="disabled">Sub Categories e.g (alloy wheels, guards, etc)</option>
        </select>
      </li>
      <li >
        <select  name="city[]" id="city" class="accessory_city chzn-select c-form__select" size="1"  style="width:100%;">
          <option value="" selected="selected" disabled="disabled">All Cities</option>
          
            @foreach($cities as $c)
            
          <option value="{{$c->id}}">{{$c->title}}</option>
          
            @endforeach
        
        </select>
      </li>
    </ul>
    <div class="search-functions clearfix mt10">
      <button type="submit" class="btn btn-primary btn-large pull-right" id="ad-listings-search-btn"> Search &nbsp; &nbsp; <i class="fa fa-search-plus"></i></button>
    </div>
  </form>
  </div>
  </div>
  </form>
</section-->
<section id="product" class=" product  clearfix">
  <div class="container">
    <div class="main_product ">
      <div class="fix">
        <h2 class="text-uppercase">Featured Accessories for Sale</h2>
      </div>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-lg hidden-md hidden-sm">
          <?php $total_products = 0; ?>
          <?php $number=0;?>
          @foreach($new_accessories as $n_a)
          
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
        <div class="carousel-inner" role="listbox" > @foreach($new_accessories as $n_a)
          
          
          @if($count==1)
          <div class="item active"> @endif
            
            @if(($count%5==0)&&($count!=1))
            <div class="item"> @endif
              <div class="col-sm-3 ">
                <div class="port_item xs-m-top-30 border bg-white">
                  <div class="port_img"><a href="{{Route('/GetAccessoryDetails', ['id' => $n_a->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$n_a->url) }}" alt="" /></a> @if($n_a->featured==1)
                    <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                    @endif </div>
                  <div class="port_caption m-top-10 car-info">
                    <h3 ><a href="{{Route('/GetAccessoryDetails', ['id' => $n_a->id])}}">{{$n_a->title}}</a></h3>
                    <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$n_a->price}}</span></h6>
                    <h6>Condition: {{$n_a->condition}}</h6>
                    <div class="pull-right">
                      <h6><i class="fa fa-map-marker"></i>&nbsp; {{$n_a->city}}</h6>
                    </div>
                    <a href="{{Route('/GetAccessoryDetails', ['id' => $n_a->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                    <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                  </div>
                </div>
              </div>
              @if($count%4==0&&($count!=1)) </div>
            @endif
            <?php $count++; ?>
            @endforeach
            
            @if(($count-1)%4!=0||($count-1)==1) </div>
          @endif </div>
        
        <!-- Controls --> 
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
    </div>
    <!-- End off row --> 
  </div>
  <!-- End off container --> 
</section>
</div>
<section class="m-top-10">
  <div class="container">
    <div class="used-car-search-results">
      <div class="col-sm-3 hidden-xs"><img src="{{URL::asset('assets/car/images/ad1.jpg')}}"></div>
      <div class="col-sm-9 hidden-xs">
        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500"> 
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?php $count=0;?>
            @foreach($most_featured_cars as $m_f_c)
            
            @if($count==0)
            <div class="item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4"><img src="{{URL::asset('images'.$m_f_c->url)}}" class="img-responsive"></div>
                  <div class="col-md-8">
                    <h2>{{$m_f_c->title}}</h2>
                    <p> <?php echo $m_f_c->description;?> </p>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="item">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4"><img src="{{URL::asset('images'.$m_f_c->url)}}" class="img-responsive"></div>
                  <div class="col-md-8">
                    <h2>{{$m_f_c->title}}</h2>
                    <p> <?php echo $m_f_c->description;?> </p>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <?php $count=1;?>
            @endforeach 
            
            <!-- End Item --> 
          </div>
          <!-- End Carousel Inner -->
          <div class="controls">
            <ul class="nav">
              <?php $count=0;?>
              @foreach($most_featured_cars as $m_f_c)
              <li data-target="#custom_carousel" data-slide-to="{{$count++}}" class=""><a href="#"><img style="width:50px" src="{{URL::asset('images'.$m_f_c->url)}}"><small>{{$m_f_c->title}}</small></a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <!-- End Carousel --> 
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
                    <div class="panel-heading top-bar" role="tab" id="open-message0">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Search by Keyword</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message0" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body	-->
                  <div id="message0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                    
                        <input class="pr35" id="name" name="name" placeholder="e.g. Honda in Lahore" type="text" />
                        <input class="btn btn-danger refine-go" type="button"  onclick="filterRequest()" value="Go" />
                     
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message1">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Price Range</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message1" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body	-->
                  <div id="message1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <div class="range-filter clearfix">
                        <input list="l-price" name="l-price" class="rng-hintify" id="price_fr" name="price_fr" placeholder="From" type="text" value="" />
                        <datalist id="l-price">
                          <option value="20,000">
                          <option value="30,000">
                          <option value="45,000">
                          <option value="60,000">
                          <option value="80,000">
                          <option value="90,000">
                          <option value="100,000">
                          <option value="120,000">
                          <option value="140,000">
                          <option value="160,000"> 
                        </datalist>
                        <input list="h-price" name="h-price" class="rng-hintify" maxlength="10" id="price_to" name="price_to" placeholder="To" type="text" value="" />
                        <datalist id="h-price">
                          <option value="25,000">
                          <option value="30,000">
                          <option value="45,000">
                          <option value="60,000">
                          <option value="80,000">
                          <option value="90,000">
                          <option value="100,000">
                          <option value="120,000">
                          <option value="140,000">
                          <option value="200,000"> 
                        </datalist>
                        <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequest()" />
                        <div class="clearfix"></div>
                        <div id="pr_hint"></div>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message13">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Condition </p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message13" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body  -->
                  <div id="message13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled has-picture-new" onchange="filterRequest()">
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox"  id="condition" name="condition" value="used" class="pull-left" >
                            Used<span class="pull-right count"></span>
                            </input>
                          </label>
                        </li>
                        <li title="Cars for Sale in Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox"  id="condition" name="condition" value="new" class="pull-left" >
                            New<span class="pull-right count"></span>
                            </input>
                          </label>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message4">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Category</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message4" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body	-->
                  <div id="message4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($featured_category_accessories as $f_c_a)
                        <li title="{{$f_c_a->title}} Parts Sale in Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox" name="category" id="category" value="{{$f_c_a->id}}"/>
                            {{$f_c_a->title}}<span class="pull-right count">{{$f_c_a->size}}</span> </label>
                        </li>
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="panel-heading top-bar" role="tab" id="open-message5">
                      <div class="col-md-10 col-xs-10">
                        <p class="panel-title">City</p>
                      </div>
                      <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message5" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                    </div>
                  </div>
                  <!-- Message body	-->
                  <div id="message5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <ul class="list-unstyled " onchange="filterRequest()">
                        @foreach($featured_city_accessories as $f_c_a)
                        <li title=" Sale in {{$f_c_a->title}}, Pakistan">
                          <label class="filter-check clearfix">
                            <input type="checkbox" name="city" value="{{$f_c_a->id}}" id="city"/>
                            {{$f_c_a->title}} <span class="pull-right count">{{$f_c_a->size}}</span> </label>
                        </li>
                        @endforeach
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
            <div class="panel panel-primary update-panel ">
              <div class="panel-heading">
                <h3 class="panel-title col-xs-3 mobileh2 hidden-xs" style="margin-top: 5px;">Search Results</h3>
                <div class=" panel-title pull-left hidden-lg hidden-md hidden-sm">
                  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#filter" style="padding:5px !important "> Filter</button>
                  <div id="filter" class="collapse col-xs-12">
                    <div class="used-car-refine-search hidden-sm hidden-md hidden-lg">
                      <div class="sidebar-filters">
                        <div class="filter-panel-new box" data-pjax-enable>
                          <input id="selected_city_slug" name="selected_city_slug" type="hidden" />
                          <div class="accordion" id="sidebar">
                            <div class="accordion-group search-filter-heading">
                              <div class="accordion-heading"> <a class="accordion-toggle pull-left">Quick Search:</a>
                                <button type="button" class="btn btn-default pull-right" data-toggle="collapse" data-target="#filter" style="padding:5px !important "> Done</button>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f1">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Search by Keyword</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f1" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body	-->
                            <div id="f1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                               
                                  <input class="pr35" id="name_m" name="name_m" placeholder="e.g. Honda in Lahore" type="text" />
                                  <input class="btn btn-danger refine-go" onchange="filterRequestM()" type="button" value="Go" />
                                
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f2">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Price Range</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f2" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body	-->
                            <div id="f2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="range-filter clearfix">
                                  <input list="l-price" name="l-price" class="rng-hintify" id="price_fr_m" name="price_fr" placeholder="From" type="text" value="" />
                                  <datalist id="l-price">
                                    <option value="20,000">
                                    <option value="30,000">
                                    <option value="45,000">
                                    <option value="60,000">
                                    <option value="80,000">
                                    <option value="90,000">
                                    <option value="100,000">
                                    <option value="120,000">
                                    <option value="140,000">
                                    <option value="160,000"> 
                                  </datalist>
                                  <input list="h-price" name="h-price" class="rng-hintify" maxlength="10" id="price_to_m" name="price_to" placeholder="To" type="text" value="" />
                                  <datalist id="h-price">
                                    <option value="25,000">
                                    <option value="30,000">
                                    <option value="45,000">
                                    <option value="60,000">
                                    <option value="80,000">
                                    <option value="90,000">
                                    <option value="100,000">
                                    <option value="120,000">
                                    <option value="140,000">
                                    <option value="200,000"> 
                                  </datalist>
                                  <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequestM()" />
                                  <div class="clearfix"></div>
                                  <div id="pr_hint"></div>
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f3">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Condition </p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f3" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body  -->
                            <div id="f3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled has-picture-new" onchange="filterRequestM()">
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox"  id="condition_m" name="condition_m" value="used" class="pull-left" >
                                      <span class=" count"> Used</span>
                                      </input>
                                    </label>
                                  </li>
                                  <li title="Cars for Sale in Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox"  id="condition_m" name="condition_m" value="new" class="pull-left" >
                                      <span class=" count"> New</span>
                                      </input>
                                    </label>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f4">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">Category</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f4" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body	-->
                            <div id="f4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($featured_category_accessories as $f_c_a)
                                  <li title="{{$f_c_a->title}} Parts Sale in Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox" name="category_m" id="category_m" value="{{$f_c_a->id}}"/>
                                      <span class=" count">{{$f_c_a->title}}</span><span class="pull-right count">{{$f_c_a->size}}</span> </label>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading top-bar" role="tab" id="open-f5">
                                <div class="col-md-10 col-xs-10">
                                  <p class="panel-title">City</p>
                                </div>
                                <div class="col-md-2 col-xs-2"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#f5" aria-expanded="false" aria-controls="message"> <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a> </div>
                              </div>
                            </div>
                            <!-- Message body	-->
                            <div id="f5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <ul class="list-unstyled " onchange="filterRequestM()">
                                  @foreach($featured_city_accessories as $f_c_a)
                                  <li title=" Sale in {{$f_c_a->title}}, Pakistan">
                                    <label class="filter-check clearfix">
                                      <input type="checkbox" name="city_m" value="{{$f_c_a->id}}" id="city_m"/>
                                      <span class=" count">{{$f_c_a->title}}</span> <span class="pull-right count">{{$f_c_a->size}}</span> </label>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <select class="col-xs-3 mobileh2 hidden-xs" style="color: gray; margin-top:0; padding:3px; margin-left:5px" name="sort_price" id="sort_price" onchange="filterRequest()">
                  <option vlaue="-1">Sort By price</option>
                  <option value="0">Low to High</option>
                  <option value="1">High to Low</option>
                </select>
                <select class="col-xs-3 mobileh2 hidden-lg hidden-md hidden-sm" style="color: gray; margin-top:0; padding:3px; margin-left:5px" name="sort_price" id="sort_price_m" onchange="filterRequestM()">
                  <option vlaue="-1">Sort By price</option>
                  <option value="0">Low to High</option>
                  <option value="1">High to Low</option>
                </select>
                <span class=" pull-right"> 
                <!-- Tabs -->
                <ul class="nav panel-tabs" style="bottom:0;">
                  <li class="active mobileh2"><a class="white-tab" href="#list" data-toggle="tab"><i class="fa fa-th-list"></i> List</a></li>
                  <li class=" mobileh2"><a  class="white-tab" href="#grid" data-toggle="tab"><i class="fa fa-th-large"></i> Grid</a></li>
                </ul>
                </span>
                <div class="clearfix"></div>
              </div>
              <div id="wait" style="display:none;z-index: 9999;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>
                Loading..</div>
              <div class="panel-body">
                <div class="tab-content" id="accessory"> 
                  
                  <!--  ------------------Lists----------------------------->
                  <div class="tab-pane  active" id="list" id="cars-list">
                  <div class="col-sm-12"></div>
                  @foreach($all_accessories as $a_a)
                  <div class="col-sm-12 border m-bottom-20 update-box">
                    <div class=" col-xs-4">
                      <div id="content-slider" class="clr">
                        <div class="wrap-slider clr"> <br>
                          
                          <!-- 	========================Thumbnail ControlNav======================================    -->
                          <?php $count=1;?>
                          @foreach($images[$a_a->id] as $img)
                          <input type="radio" id="a-{{$count++}}" name="a">
                          @endforeach
                          <nav id="main">
                            <?php $count=1;?>
                            @foreach($images[$a_a->id] as $img)
                            <label for="a-{{$count++}}" class="first"></label>
                            @endforeach </nav>
                          <!-- 	==============================================================    -->
                          <nav id="control">
                            <?php $count=1;?>
                            @foreach($images[$a_a->id] as $img)
                            <label for="a-{{$count++}}"></label>
                            @endforeach 
                            <!-- <label for="a-5" class="first"></label> --> 
                          </nav>
                          <!-- 	==============================================================    --> 
                          
                          <!-- 	IMAGE NAVIGATION pic -->
                          <?php $count=1;$index=10;?>
                          @foreach($images[$a_a->id] as $img) <span id="b-{{$count}}" class="th" tabindex="{{$index++}}"> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}"> </span> @endforeach 
                          
                          <!-- ______________IMAGES_________________________________________ -->
                          
                          <div class="slider">
                            <div class="inset">
                              <?php $count=1;?>
                              @foreach($images[$a_a->id] as $img)
                              <figure> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="f"> </figure>
                              @endforeach </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-8"><a href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}">
                      <h2 class="pull-left">{{$a_a->title}}  for Sale</h2>
                      </a>
                      <h2 class="pull-right">PKR {{$a_a->price}}</h2>
                      <div class="clear m-bottom-10"></div>
                      <p class="p-top-20"><i class="fa fa-map-marker"></i>&nbsp; {{$a_a->city}}</p>
                      <div class="pull-left col-xs-8" style="border-bottom:1px solid #E8E8E8;">
                        <h4 class="col-xs-3">{{$a_a->condition}}</h4>
                        <h4 class="col-xs-3">{{$a_a->category}}</h4>
                        <h4 class="col-xs-3">{{$a_a->sub_category}}</h4>
                      </div>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20">Last Updated: {{$updated_date[$a_a->id]}}</p>
                      <a class="pull-right btn-more" href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                  @endforeach </div>
                
                <!--  ------------------Grids----------------------------->
                <div class="tab-pane " id="grid" id="cars-grid">
                <div class="col-sm-12"></div>
                @foreach($all_accessories as $a_a)
                <div class="col-sm-4 col-xs-12 m-top-20">
                  <div class="port_item border">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"><a href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$a_a->url) }}" alt="" /></a> @if($a_a->featured==1)
                        <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                        @endif </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}">{{$a_a->title}} </a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$a_a->price}}</span></h6>
                        <h6>Condition: {{$a_a->condition}}</h6>
                        <div class="pull-right">
                          <h6><i class="fa fa-map-marker"></i>&nbsp; {{$a_a->city}}</h6>
                        </div>
                        <a href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach </div>
            </div>
          </div>
        </div>
        <div id="ad-in-search-bottom" class="tlc">
          <div  class="m-top-20"> </div>
        </div>
              @if($all_accessories->lastPage()!=1)
        <div data-pjax-enable id="p_l">
          <ul class="pagination search-pagi" id="paginate">
              {{ $all_accessories->link() }}
          </ul>
        </div>
               @else
               <div data-pjax-enable id="p_l" style="display: none">
          <ul class="pagination search-pagi" id="paginate">
              
          </ul>
        </div>
              @endif
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
    
    //////////////////////update model////////////////////////
  /////////////////////////////////////////////////////////
 $('#category').change(function() {
     
        var data = { 'category': $(this).val() };
       
        $.get('/getSubCategoryByCategory', data, function (data) {
           var model = $('#sub_category');
                    model.empty();
                    
                     model.append("<option value='' selected='selected' disabled='disabled'>"+'Sub Categories e.g (alloy wheels, guards, etc)'+"</option>");
      
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });
  
  $(function() {
    $('#city').change(function() {
        var data = { 'city': $(this).val() };
        
        $.get('/getAreaByCity', data, function (data) {
           var model = $('#city_area');
                   model.empty();
                    
  
                   $.each(data, function(index, element) {
                     //alert(element.title);
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                        
                    });
                   
        });
    });
});
  

  
  
  function filterRequest()
  {
      $('#wait').show();
    
   var city = [];
   $.each($("input[name='city']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
            
   var condition=[];
   $.each($("input[name='condition']:checked"), function(){            
                condition.push($(this).val());
             
            });//alert("reg_city :"+reg_city.length);

  

   var category=[];
   $.each($("input[name='category']:checked"), function(){            
                category.push($(this).val());
            });//alert("manufacture :"+manufacture.length);
   

  
  
   var price_fr=$("#price_fr").val();
   var price_to=$("#price_to").val();
   var sort_price=$("#sort_price").val();
   var name=$("#name").val();

   var data = {'sort_price':sort_price,'name':name,'city': city,'condition':condition,'category':category,'price_fr':price_fr,'price_to':price_to};


   $.get('/updateAllAccessories', data, function (data) {
       // console.log(data);
        document.getElementById("accessory").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
        $('#wait').hide();
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
         if(document.getElementById("link").value!="")
        {
            document.getElementById('p_l').style.display='block';
        }  
      });


   
      

  }
  
   
  function filterRequestM()
  {
      $('#wait').show();
    
   var city = [];
   $.each($("input[name='city_m']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
            
   var condition=[];
   $.each($("input[name='condition_m']:checked"), function(){            
                condition.push($(this).val());
             
            });//alert("reg_city :"+reg_city.length);

  

   var category=[];
   $.each($("input[name='category_m']:checked"), function(){            
                category.push($(this).val());
            });//alert("manufacture :"+manufacture.length);
   

  
  
   var price_fr=$("#price_fr_m").val();
   var price_to=$("#price_to_m").val();
   var sort_price=$("#sort_price").val();
   var name_m=$("#name_m").val();
   

   var data = {'sort_price':sort_price,'name':name_m,'city': city,'condition':condition,'category':category,'price_fr':price_fr,'price_to':price_to};


   $.get('/updateAllAccessories', data, function (data) {
        
        document.getElementById("accessory").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
        $('#wait').hide();
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
         if(document.getElementById("link").value!="")
        {
            document.getElementById('p_l').style.display='block';
        }  
        
        window.location.href="#accessory";
      });


   
      

  }

</script> 
@endsection