 @foreach($all_machinery as $a_m)
                       <div class="col-sm-4 m-bottom-20">
                          <div class="port_item xs-m-top-30 border">
                            <div class="port_img"> <a href="{{Route('/GetMachineryDetails', ['id' => $a_m->id])}}"><img class="img-responsive "  src="{{URL::asset('images'.$a_m->url)}}" alt=""></a>
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

                        <input type="hidden" id="link" name="link" value=" {{$all_machinery->links()}}"/>