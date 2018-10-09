@foreach($featured_bikes as $f_b)

      <div class="col-sm-4 m-bottom-20">
                          <div class="port_item xs-m-top-30 border">
                            <div class="port_img"> <a href="{{Route('/GetBikeDetails', ['id' => $f_b->id])}}"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="{{URL::asset('images'.$f_b->url)}}" alt=""></a>
                              <div class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                            <div class="port_caption m-top-10 car-info">
                              <h3 ><a href="{{Route('/GetBikeDetails', ['id' => $f_b->id])}}">{{$f_b->manufacture}} {{$f_b->model}}<span style="color:#223b7b">&nbsp; {{$f_b->year}}</span></a></h3>
                              <h6 class=""><i class="fa fa-map-marker"></i>&nbsp; {{$f_b->city}}</h6>
                              <h5 class="pull-left" style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_b->price}}</span></h5>
                              <h5 class="pull-right">Condition: {{$f_b->condition}}</h5>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
                              <a href="{{Route('/GetBikeDetails', ['id' => $f_b->id])}}" class="btn-more pull-right"  style="text-decoration:none;">View More</a>
                              
                              <div class="clear"></div>
                               </div>
                          </div>
                        </div>
                        @endforeach
      

                       <input type="hidden" id="link" name="link" value=" {{$featured_bikes->links()}}"/>