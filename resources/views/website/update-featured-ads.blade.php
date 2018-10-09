    <!--  ------------------Lists----------------------------->
                        <div class="tab-pane  active" id="list" id="cars-list">
                        <div class="col-sm-12"></div>
                        
                        @foreach($featured_Ads as $a_c)
                        
                        <div class="col-sm-12 border m-bottom-20" style="background: white;">
                            
                        <div class=" col-xs-4">
                        <div id="content-slider" class="clr hidden-xs">
		<div class="wrap-slider clr">	
		<br>
	
<!-- 	========================Thumbnail ControlNav======================================    -->
                     <?php $count=1;?>
                      @foreach($images[$a_c->id] as $img)
			<input type="radio" id="a-{{$count++}}" name="a">	
                        @endforeach
			
			
			<nav id="main">
                            <?php $count=1;?>
                      @foreach($images[$a_c->id] as $img)
          <label for="a-{{$count++}}" class="first"></label>
          @endforeach
			</nav>
<!-- 	==============================================================    -->
			<nav id="control">
                             <?php $count=1;?>
                      @foreach($images[$a_c->id] as $img)
          <label for="a-{{$count++}}"></label>
         @endforeach
          <!-- <label for="a-5" class="first"></label> -->
			</nav>
<!-- 	==============================================================    -->

				<!-- 	IMAGE NAVIGATION pic -->
                                <?php $count=1;$index=10;?>
                      @foreach($images[$a_c->id] as $img)
			<span id="b-{{$count}}" class="th" tabindex="{{$index++}}">
				<img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}">
				
			</span>
                      
                      @endforeach

			
			<!-- ______________IMAGES_________________________________________ -->						

			 <div class="slider">
                            <div class="inset">
                              <?php $count=1;?>
                              @foreach($images[$a_c->id] as $img)
                              <figure> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="f"> </figure>
                              @endforeach </div>
                          </div>
                        </div>
                      </div>
                      <img class="hidden-lg hidden-md hidden-sm row mobile-list-img" src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" > </div>
                    <div class="col-xs-8 "><a href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_c->manufacture}} {{$a_c->model}} </h2>
                      </a>
                      <h2 class="pull-right mobileh2">PKR {{$a_c->price}}</h2>
                      <div class="clear m-bottom-10 "></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_c->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a>
                      <div class="clearfix"></div>
                      <div class="pull-left col-sm-8 col-xs-12 row" style="border-bottom:1px solid #E8E8E8;">
                        <h4 class="col-xs-6 mobileh4">@if($a_c->condition==\App\VehicleType::New_Vehicle)
                          New
                          @elseif($a_c->condition==\App\VehicleType::Almost_New_Vehicle)
                          Almost New
                          @else
                          Used
                          @endif</h4>
                        <h4  class="col-xs-4 mobileh4">{{$a_c->year}}</h4>
                        <h4  class="col-xs-2 mobileh4">{{$a_c->mileage}}Km</h4>
                      </div>
                      <div class="pull-left  col-sm-8 col-xs-12 row">
                        <h4 class="col-xs-6 mobileh4">{{$a_c->engine_type}}</h4>
                       
                      </div>
                      <br>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_c->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                        
                        @endforeach
                        
                        
                        
                       
                       
                  		
                        </div>
                        
                       
         <!--  ------------------Grids----------------------------->
                        <div class="tab-pane " id="grid" id="cars-grid" >
                        <div class="col-sm-12"></div>
                        
                       @foreach($featured_Ads as $a_c)

                       <div class="col-sm-4 col-xs-12 m-top-20">
                  <div class="port_item border">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"><a href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$a_c->url) }}" alt="" /></a> @if($a_c->featured==1)
                        <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                        @endif </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetCarDetails', ['id' => $a_c->id])}}">{{$a_c->manufacture}} {{$a_c->model}} &nbsp; {{$a_c->year}}</a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$a_c->price}}</span></h6>
                        @if($a_c->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($a_c->condition==\App\VehicleType::Almost_New_Vehicle)
                        <h6>Condition: Almost New</h6>
                        @else
                        <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right">
                          <h6><i class="fa fa-map-marker"></i>&nbsp; {{$a_c->city}}</h6>
                        </div>
                        <a href="{{Route($href[$a_c->id], ['id' => $a_c->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                      </div>
                    </div>
                  </div>
                </div>
                        
                        @endforeach
                  		 
                        
                        
                        </div>
                 
         <input type="hidden"  id="link" value="{{$featured_Ads->links()}}">