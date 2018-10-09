@extends('websiteMasterView')

@section('title')
Heavy Machinery for Sale in Pakistan 	|	Key2Cars
@endsection


@section('cssblock')

        <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/css/ribbon.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootsnav.css')}}">

        <!-- index css -->
        
        <link rel="stylesheet" href="{{URL::asset('assets/others/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/others/css/bootstrap.css')}}">



        <!--Theme custom css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
       
        
        <!-- JS includes -->

        <script src="{{URL::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/vendor/bootstrap.min.js')}}"></script>

        
        <script src="{{URL::asset('assets/js/bootsnav.js')}}"></script>



        <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
        <script src="{{URL::asset('assets/js/main.js')}}"></script>

    

    <link href="{{URL::asset('assets/others/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
	<link href="{{URL::asset('assets/others/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{URL::asset('assets/others/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/others/js/index_used_cars.js" type="text/javascript')}}"></script>

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
            
      
    @if(count($featured_machinery)>0)
<section id="product" class=" product well clearfix">
    <div class="container">
      <div class="main_product ">
        <div class="fix">
          <h2 class="text-uppercase">Featured Farms for Sale</h2>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators -->
          <ol class="carousel-indicators hidden-lg hidden-md hidden-sm">
               <?php $total_products = 0; ?>
                    <?php $number=0;?>
                    @foreach($featured_machinery as $f_m)

                    @if($total_products==0)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}" class="active"></li>

                    @elseif(($total_products%4==0)&&($total_products!=0))
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}"></li>
                    @endif
                    <?php $total_products++; ?>
                    @endforeach
           
          </ol>
          
          <!-- Wrapper for slides -->
         <!-- Wrapper for slides -->
           <?php $count = 1; ?> 
          <div class="carousel-inner" role="listbox" >
           @foreach($featured_machinery as $f_m)


                    @if($count==1)
                    <div class="item active">
                    
                    @endif

                    @if(($count%5==0)&&($count!=1))
                      <div class="item">
                      
                        @endif
                <div class="col-sm-3 ">
                          <div class="port_item xs-m-top-30 border">
                            <div class="port_img"> <a href="{{Route('/GetMachianryDetails', ['id' => $f_m->id])}}"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="{{URL::asset('images'.$f_m->url)}}" alt="" /></a>
                              <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                            <div class="port_caption m-top-10 car-info">
                              <h3 ><a href="{{Route('/GetMachinaryDetails', ['id' => $f_m->id])}}">{{$f_m->manufacture}} {{$f_m->model}} <span style="color:#223b7b">&nbsp; {{$f_m->year}}</span></a></h3>
                              <h6 class=""><i class="fa fa-map-marker"></i>&nbsp; {{$f_m->city}}</h6>
                              <h5 class="pull-left" style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_m->price}}</span></h5>
                              <h5 class="pull-right">Condition: {{$f_m->condition}}</h5>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
                              <a href="{{Route('/GetMachinaryDetails', ['id' => $f_m->id])}}" class="btn-more pull-right" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More</a>
                              
                              <div class="clear"></div>
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


@endif
<div class="container">  <img class="img-responsive m-top-10 m-bottom-10" style="width:100%;" src="{{URL::asset('assets/others/images/ad.gif')}}"/> </div>
    
  
	 

<section>
    <div class="container"> 
      <div class="used-car-search-results" >
        

        
        <div class="search-page-new">
          <div class="row">
            <div class="col-md-3 used-car-refine-search">
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
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message0" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                    <div id="message0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <form id="search_key_form" >
                            <input class="pr35" id="q" name="q" placeholder="e.g. Honda in Lahore" type="text" />
                            <input class="btn btn-primary refine-go" type="submit" value="Go" />
                          </form>
                    </div>
                </div>
                    
               
                   
                    
                <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message1">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Price Range</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message1" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                <div id="message1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="range-filter clearfix" >
                            <input class="rng-hintify" id="price_fr" name="price_fr" placeholder="From" type="text" value="" />
                            <input class="rng-hintify" maxlength="10" id="price_to" name="price_to" placeholder="To" type="text" value="" />
                            <input class="btn btn-primary pull-left" name="commit" type="submit" value="Go" onclick="filterRequest()" />
                            <div class="clearfix"></div>
                            <div id="pr_hint"></div>
                          </div>
                    </div>
                </div>
                    
                    
                    
                    <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message3">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Year</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message3" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                <div id="message3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="range-filter clearfix">
                            <input class="rng-hintify"  id="year_fr" maxlength="10" name="year_fr" placeholder="From" type="text" value="" />
                            <input class="rng-hintify"  id="year_to" maxlength="10" name="year_to" placeholder="To" type="text" value="" />
                            <input class="btn btn-primary pull-left" data-alias="yr" data-max-text="Later" data-min-text="Earlier" data-name="year" id="yr-go" name="commit" type="submit" value="Go" onclick="filterRequest()" />
                          </div>
                    </div>
                </div>
                    
             <div class="panel">
                <div class="panel-heading top-bar" role="tab" id="open-message13">
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Condition </p>
                    </div>
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message13" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul class="list-unstyled has-picture-new" onchange="filterRequest()">
                          
                            <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix">
                             
                              <input type="checkbox"  id="condition" name="condition" value="used" class="pull-left" >
                              
                              &nbsp;&nbsp;Used<span class="pull-right count"></span></input>
                            
                              </label>
                            </li>
                            
                             <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix">
                             
                              <input type="checkbox"  id="condition" name="condition" value="new" class="pull-left" >
                              
                              &nbsp;&nbsp;New<span class="pull-right count"></span></input>
                              
                             
                              </label>
                            </li>
                            
                             <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix">
                             
                              <input type="checkbox"  id="condition" name="condition" value="almost new" class="pull-left" >
                              
                              &nbsp;&nbsp;Almost new<span class="pull-right count"></span></input>
                              
                             
                              </label>
                            </li>
                           
                           
                           
                          </ul>
                          <div class="clearfix"></div>
                    </div>
                </div>
                    
                    
                    
                     <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message4">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Make</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message4" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       <ul class="list-unstyled " onchange="filterRequest()">
                            @foreach($manufacture_buses as $m_b)
              
             
                            <li title="{{$m_b->title}} Cars for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a   title="{{$m_b->title}} Cars for Sale in Pakistan">
                                <input type="checkbox"  id="manufacture" name="manufacture" value="{{$m_b->id}}" >
                                {{$m_b->title}} <span class="pull-right count">{{$m_b->size}}</span> </a> </label></input>
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
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message5" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
            
                   <div id="message5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul class="list-unstyled " onchange="filterRequest()">
                             
                             @foreach($city_vehicles_count as $c_v_c)
                             
                             
                            <li title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                              <label class="filter-check clearfix"> <a   title="Cars for Sale in {{$c_v_c->title}}, Pakistan">
                                <input type="checkbox" id="city" name="city" value="{{$c_v_c->id}}" >
                                {{$c_v_c->title}} <span class="pull-right count">{{$c_v_c->size}}</span> </a> </label></input>
                            </li>
                          
                             @endforeach
                            
                          </ul>
                       <div class="clearfix"></div>
                    </div>
                </div>
                    
                    
                    
                    
                    <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message6">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Registration City</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message6" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       <ul class="list-unstyled " onchange="filterRequest()">
                            @foreach($reg_cities as $r_c)
                            <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                <input type="checkbox" id="reg_city" name="reg_city" value="{{$r_c->id}}" >
                                {{$r_c->title}} <span class="pull-right count">{{$r_c->size}}</span> </a> </label></input>
                            </li>
                            @endforeach
                            
                          </ul>
                       <div class="clearfix"></div>
                    </div>
                </div>
                    
                    
                    
                    <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message7">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Mileage (Km)</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message7" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       <div class="range-filter clearfix" >
                            <input class="rng-hintify"  id="mileage_fr" maxlength="10" name="mileage_fr" placeholder="From" type="text" value="" />
                            <input class="rng-hintify" id="mileage_to" maxlength="10" name="mileage_to" placeholder="To" type="text" value="" />
                            <input class="btn btn-primary pull-left" data-alias="ml" data-max-text="More" data-min-text="Less" data-name="mileage (km)" id="ml-go" name="commit" type="submit" value="Go" onclick="filterRequest()"/>
                          </div>
                    </div>
                </div>
                    
                    
                    
                    <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message8">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Transmission</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message8" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       <ul class="list-unstyled " onchange="filterRequest()">
                            @foreach($transmissions as $t)
                            <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                <input type="checkbox" id="transmission" name="transmission" value="{{$t->id}}" >
                                {{$t->title}} <span class="pull-right count">{{$t->size}}</span> </a> </label></input>
                            </li>
                            @endforeach
                            
                          </ul>
                    </div>
                </div>
                    
                    
                    
                    <div class="panel">
               
                <div class="panel-heading top-bar" role="tab" id="open-message9">
                    
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Engine Type</p>
                    </div>
                            
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message9" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                            
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul class="list-unstyled " onchange="filterRequest()">

                            @foreach($engine_types as $e_t)
                            <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a rel=nofollow title="Cars for Sale in Pakistan">
                                <input type="checkbox" id="enginetype" name="enginetype" value="{{$e_t->id}}"  >
                                {{$e_t->title}} <span class="pull-right count">{{$e_t->size}}</span> </a> </label></input>
                            </li>
                            @endforeach
                            
                          </ul>
                    </div>
                </div>
                    
                    
                    
                    <div class="panel">
                <div class="panel-heading top-bar" role="tab" id="open-message10">
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Assembly</p>
                    </div>
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message10" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul class="list-unstyled " onchange="filterRequest()">
                            @foreach($assemblies as $a)
                            <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix"> <a  rel=nofollow title="Cars for Sale in Pakistan">
                                <input type="checkbox" id="assembly" name="assembly" value="{{$a->id}}" >
                                {{$a->title}}<span class="pull-right count">{{$a->size}}</span> </a> </label></input>
                            </li>
                            @endforeach
                            
                          </ul>
                    </div>
                </div>
                    
                    
                    
                    <div class="panel">
                <div class="panel-heading top-bar" role="tab" id="open-message11">
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Engine Capacity (cc)</p>
                    </div>
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message11" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                       <div class="range-filter clearfix">
                            <input class="rng-hintify"  id="capacity_fr" maxlength="10" name="capacity_fr" placeholder="From" type="text" value="" />
                            <input class="rng-hintify"  id="capacity_to" maxlength="10" name="capacity_to" placeholder="To" type="text" value="" />
                            <input class="btn btn-primary pull-left" data-alias="ec" data-max-text="More" data-min-text="Less" data-name="engine capacity (cc)" id="ec-go" name="commit" type="submit" value="Go" onclick="filterRequest()" />
                          </div>
                    </div>
                </div>
                    
                   
                    
                   
                    
                    <div class="panel">
                <div class="panel-heading top-bar" role="tab" id="open-message13">
                    <div class="col-md-10 col-xs-10">
                        <p class="panel-title">Body Type </p>
                    </div>
                    <div class="col-md-2 col-xs-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#message133" aria-expanded="false" aria-controls="message">
                        <span class="glyphicon  glyphicon-plus fa fa-plus-square"></span></a>
                    </div>
                </div>
            </div>
             <!-- Message body  --> 
                   <div id="message133" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul class="list-unstyled has-picture-new" onchange="filterRequest()">
                            @foreach($body_types as $b_t)
                           
                             <li title="Cars for Sale in Pakistan">
                              <label class="filter-check clearfix">
                              <a rel=nofollow title="Cars for Sale in Pakistan">
                              <input type="checkbox"  id="bodytype" name="bodytype" value="{{$b_t->id}}" class="pull-left" >
                              {{$b_t->title}}<span class="pull-right count">{{$b_t->size}}</span></input>
                              
                              </a>
                              </label>
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
            <div class="col-md-9 search-listing pull-right">
              <div>
                    <div class="m-bottom-20 hidden-xs"> 
                      <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500"> 
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                          <div class="item active">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-3"><img src="{{URL::asset('assets/others/images/machinery.jpg')}}" class="img-responsive"></div>
                                <div class="col-md-9">
                                  <h2>Featured AD 1</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-3"><img src="{{URL::asset('assets/others/images/machinery.jpg')}}" class="img-responsive"></div>
                                <div class="col-md-9">
                                  <h2>Featured AD 2</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-3"><img src="{{URL::asset('assets/others/images/machinery.jpg')}}" class="img-responsive"></div>
                                <div class="col-md-9">
                                  <h2>Featured AD 4</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-3"><img src="{{URL::asset('assets/others/images/machinery.jpg')}}" class="img-responsive"></div>
                                <div class="col-md-9">
                                  <h2>Featured AD 3</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Item --> 
                        </div>
                        <!-- End Carousel Inner -->
                        <div class="controls">
                          <ul class="nav">
                            <li data-target="#custom_carousel" data-slide-to="0" class=""><a href="#"><img style="width:50px" src="{{URL::asset('assets/others/images/machinery.jpg')}}"><small>Featured AD 1</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="1"><a href="#"><img style="width:50px" src="{{URL::asset('assets/others/images/machinery.jpg')}}"><small>Featured AD 2</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="2"><a href="#"><img style="width:50px" src="{{URL::asset('assets/others/images/machinery.jpg')}}"><small>Featured AD 3</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="3"><a href="#"><img style="width:50px" src="{{URL::asset('assets/others/images/machinery.jpg')}}"><small>Featured AD 4</small></a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- End Carousel --> 
                    </div>
                 
                    <div class="row">
                      <div class="col-md-12" id="machinery">
                          @foreach($all_machinery as $a_m)
                       <div class="col-sm-4 m-bottom-20">
                          <div class="port_item xs-m-top-30 border">
                            <div class="port_img"> <a href="{{Route('/GetMachineryDetails', ['id' => $a_m->id])}}"><img class="img-responsive " data-toggle="modal" data-target="#Featured-cars" src="{{URL::asset('images'.$a_m->url)}}" alt=""></a>
                            @if($a_m->featured==1)
                              <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                              @endif
                           
                            </div>
                            <div class="port_caption m-top-10 car-info">
                              <h3 ><a href="{{Route('/GetMachineryDetails', ['id' => $a_m->id])}}">{{$a_m->manufacture}} {{$a_m->model}} <span style="color:#223b7b">&nbsp; {{$a_m->year}}</span></a></h3>
                              <h6 class=""><i class="fa fa-map-marker"></i>&nbsp; {{$a_m->city}}</h6>
                              <h5 class="pull-left" style="color:#ff4436">PKR <span style="color:#ff4436">{{$a_m->price}}</span></h5>
                              <h5 class="pull-right">Condition: {{$a_m->condition}}</h5>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
                              <a href="{{Route('/GetMachineryDetails', ['id' => $a_m->id])}}" class="btn-more pull-right"  style="text-decoration:none;">View More</a>
                              
                              <div class="clear"></div>
                               </div>
                          </div>
                        </div>
                      @endforeach
                  
                      </div>
                    </div>
               
             
                <div id="ad-in-search-bottom" class="tlc">
                  <div  class="m-top-20"> </div>
                </div>
                <div data-pjax-enable>
                  <ul class="pagination search-pagi" id="paginate">
                  {{$all_machinery->links()}}
                  </ul>
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
  
@endsection


@section('jsblock')
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
  function filterRequest()
  {
    
   var city = [];
   $.each($("input[name='city']:checked"), function(){            
                city.push($(this).val());
            });//alert("city :"+city.length);
   
 var condition=[];
   $.each($("input[name='condition']:checked"), function(){            
                condition.push($(this).val());
            });//alert("reg_city :"+reg_city.length);

   var reg_city=[];
   $.each($("input[name='reg_city']:checked"), function(){            
                reg_city.push($(this).val());
            });//alert("reg_city :"+reg_city.length);
   

   var manufacture=[];
   $.each($("input[name='manufacture']:checked"), function(){            
                manufacture.push($(this).val());
            });//alert("manufacture :"+manufacture.length);
   

   var model=[];
   $.each($("input[name='model']:checked"), function(){            
                model.push($(this).val());
            });//alert("model :"+model.length);
  

   var transmission=[];
   $.each($("input[name='transmission']:checked"), function(){            
                transmission.push($(this).val());
            });//alert("transmission :"+transmission.length);
   

   var assembly=[];
   $.each($("input[name='assembly']:checked"), function(){            
                assembly.push($(this).val());
            });//alert("assembly :"+assembly.length);
   
   

   var bodytype=[];
   $.each($("input[name='bodytype']:checked"), function(){            
                bodytype.push($(this).val());
            });//alert("bodytype :"+bodytype.length);
   

   var enginetype=[];
   $.each($("input[name='enginetype']:checked"), function(){            
                enginetype.push($(this).val());
            });//alert("enginetype :"+enginetype.length);
   

   var price_fr=$("#price_fr").val();
   var price_to=$("#price_to").val();

   var year_fr=$("#year_fr").val();
   var year_to=$("#year_to").val();

   var capacity_fr=$("#capacity_fr").val();
   var capacity_to=$("#capacity_to").val();

   var mileage_fr=$("#mileage_fr").val();
   var mileage_to=$("mileage_to").val();


   var data = {'city': city,'condition':condition,'reg_city':reg_city,'manufacture':manufacture,'transmission':transmission,'assembly':assembly,'enginetype':enginetype,'model':model,'bodytype':bodytype,'price_fr':price_fr,'price_to':price_to,'year_fr':year_fr,'year_to':year_to,'capacity_fr':capacity_fr,'capacity_to':capacity_to,'mileage_fr':mileage_fr,'mileage_to':mileage_to};


   $.get('/updateAllMachinery', data, function (data) {
       
        if(data==="")
        { document.getElementById("machinery").innerHTML="No cars found";}
        
        else
        {
        document.getElementById("machinery").innerHTML = data;
        document.getElementById("paginate").innerHTML=document.getElementById("link").value;
    }
        /*$.each(data, function (index, element) {
       document.getElementById("cars").innerHTML = element;
        });*/
      });


   
      
    

  }
</script>

  
@endsection