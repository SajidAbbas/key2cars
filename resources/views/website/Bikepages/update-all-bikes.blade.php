         
          <!--  ------------------Lists----------------------------->
                  <div class="tab-pane active" id="list" id="cars-list">
                      @if($all_bikes->isEmpty())
                <h3 style="text-align: center">No result found.</h3>
                @endif
                  <div class="col-sm-12"></div>
                  @foreach($all_bikes as $a_b)
                  <div class="col-sm-12 border m-bottom-20 " style="background: #ffffff !important;">
                    <div class=" col-xs-4">
                      <div id="content-slider" class="clr hidden-xs" >
                        <div class="wrap-slider clr"> <br>
                          
                          <!-- 	========================Thumbnail ControlNav======================================    -->
                          <?php $count=1;?>
                          @foreach($images[$a_b->id] as $img)
                          <input type="radio" id="a-{{$count++}}" name="a">
                          @endforeach
                          <nav id="main">
                            <?php $count=1;?>
                            @foreach($images[$a_b->id] as $img)
                            <label for="a-{{$count++}}" class="first"></label>
                            @endforeach </nav>
                          <!-- 	==============================================================    -->
                          <nav id="control">
                            <?php $count=1;?>
                            @foreach($images[$a_b->id] as $img)
                            <label for="a-{{$count++}}"></label>
                            @endforeach 
                            <!-- <label for="a-5" class="first"></label> --> 
                          </nav>
                          <!-- 	==============================================================    --> 
                          
                          <!-- 	IMAGE NAVIGATION pic -->
                          <?php $count=1;$index=10;?>
                          @foreach($images[$a_b->id] as $img) <span id="b-{{$count}}" class="th" tabindex="{{$index++}}"> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="p-{{$count++}}"> </span> @endforeach 
                          
                          <!-- ______________IMAGES_________________________________________ -->
                          
                          <div class="slider">
                            <div class="inset">
                              <?php $count=1;?>
                              @foreach($images[$a_b->id] as $img)
                              <figure> <img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="f"> </figure>
                              @endforeach </div>
                          </div>
                        </div>
                      </div>
                          <img class="hidden-lg hidden-md hidden-sm row mobile-list-img" src="{{URL::asset('images'.$a_b->url)}}" alt="" id="i-{{$count++}}" > </div>
                   
                   
                    <div class="col-xs-8"><a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_b->manufacture}} {{$a_b->model}} </h2>
                      </a>
                      <h2 class="pull-right mobileh2">{{$a_b->price}}</h2>
                      <div class="clear m-bottom-10"></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_b->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}"  style="text-decoration:none;">View More</a>
                        <div class="clearfix"></div>
                      <div class="pull-left col-xs-8 col-xs-12 row" style="border-bottom:1px solid #E8E8E8;">
                        <h4 class="col-xs-6 mobileh4">@if($a_b->condition==\App\VehicleType::New_Vehicle)
                          New
                          @elseif($a_b->condition==\App\VehicleType::Almost_New_Vehicle)
                          Almost New
                          @else
                          Used
                          @endif</h4>
                        <h4  class="col-xs-4 mobileh4">{{$a_b->model_year}}</h4>
                        <h4  class="col-xs-2 mobileh4">{{$a_b->mileage}} Km</h4>
                      </div>
                      <div class="pull-left col-xs-8 col-xs-12 row   ">
                        <h4 class="col-xs-6 mobileh4">{{$a_b->engine_type}}</h4>
                      </div>
                      <br>
                      <div class="clear"></div>
                      <p class=" pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_b->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}"  style="text-decoration:none;">View More</a> </div>
                  </div>
                  @endforeach </div>
                
                <!--  ------------------Grids----------------------------->
                <div class="tab-pane row" id="grid" id="cars-grid">
                     @if($all_bikes->isEmpty())
                <h3 style="text-align: center">No result found.</h3>
                @endif
                <div class="col-sm-12"></div>
                @foreach($all_bikes as $a_b)
                <div class="col-sm-4 col-xs-12 m-top-20">
                  <div class="port_item border">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"><a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}"><img class="img-responsive rel-featured"  src="{{ URL ::asset('images'.$a_b->url) }}" alt="" /></a> @if($a_b->featured==1)
                        <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                        @endif </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}">{{$a_b->manufacture}} {{$a_b->model}}&nbsp; {{$a_b->model_year}}</a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$a_b->price}}</span></h6>
                        @if($a_b->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($a_b->condition==\App\VehicleType::Almost_New_Vehicle)
                        <h6>Condition: Almost New</h6>
                        @else
                        <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right">
                          <h6><i class="fa fa-map-marker"></i>&nbsp; {{$a_b->city}}</h6>
                        </div>
                        <a href="{{Route('/GetBikeDetails', ['id' => $a_b->id])}}" class="btn-more"  style="text-decoration:none;">View More</a> 
                        <!--<div class="featured-ribbon ribbon"> <i class="fa fa-star"></i>FEATURED </div>--> 
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach </div>
                         <input type="hidden" id="link" name="link" value=" {{$all_bikes->links()}}"/>