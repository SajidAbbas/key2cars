 <!--  ------------------Lists----------------------------->
                  <div class="tab-pane active" id="list" id="cars-list">
                  <div class="col-sm-12"></div>
                  @foreach($all_accessories as $a_a)
                  <div class="col-sm-12 border m-bottom-20 " style="background:#FFFFFF;">
                    <div class=" col-xs-4">
                      <div id="content-slider" class="clr hidden-xs">
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
                      <img src="{{URL::asset('images'.$img->url)}}" alt="" id="i-{{$count++}}" class="hidden-lg hidden-md hidden-sm mobile-list-img"> </div>
                    <div class="col-xs-8"><a href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}">
                      <h2 class="pull-left mobileh2">{{$a_a->title}} for Sale</h2>
                      </a>
                      <h2 class="pull-right mobileh2">PKR {{$a_a->price}}</h2>
                      <div class="clear m-bottom-10"></div>
                      <p class="p-top-20 mobile-city pull-left"><i class="fa fa-map-marker"></i>&nbsp; {{$a_a->city}}</p>
                      <a class="pull-right btn-more mobile-button hidden-lg hidden-md hidden-sm" href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}"  style="text-decoration:none;">View More</a>
                      <div class="clearfix"></div>
                      <div class="pull-left col-sm-8 col-xs-12 row" >
                        <h4 class="col-xs-4 mobileh4">{{$a_a->condition}}</h4>
                        <h4 class="col-xs-4 mobileh4">{{$a_a->category}}</h4>
                        <h4 class="col-xs-4 mobileh4">{{$a_a->sub_category}}</h4>
                      </div>
                      <div class="clear"></div>
                      <p class="pull-left p-top-20 hidden-xs">Last Updated: {{$updated_date[$a_a->id]}}</p>
                      <a class="pull-right btn-more hidden-xs" href="{{Route('/GetAccessoryDetails', ['id' => $a_a->id])}}"  style="text-decoration:none;">View More</a> </div>
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
         
          <input type="hidden" id="link" name="link" value=" {{$all_accessories->links()}}"/>