@foreach($cars as $f_c)
                        <div class="col-sm-4 col-xs-12 m-top-20">
                          <div class="port_item border">
                            <div class="port_img"> <a href="#"><img class="img-responsive rel-featured" data-toggle="modal" data-target="#Featured-cars" src="{{URL::asset('images'.$f_c->url)}}" alt="" /></a>
                              <div  class="absolute-featured"> <i class="fa fa-star"></i> FEATURED </div>
                            </div>
                            <div class="port_caption m-top-10 car-info">
                              <h3 data-toggle="modal" data-target="#Featured-cars"><a href="#">{{$f_c->manufacture}} {{$f_c->model}} {{$f_c->model_version}}<span style="color:#223b7b">&nbsp; {{$f_c->year}}</span></a></h3>
                              <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$f_c->price}}</span></h6>
                              <h6>Condition: {{$f_c->condition}}</h6>
                              <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; {{$f_c->city}}</div>
                              <a href="" class="btn-more" data-toggle="modal" data-target="#Featured-cars" style="text-decoration:none;">View More{{$f_c->id}}</a> </div>
                          </div>
                        </div>
                        @endforeach

                       <input type="hidden" id="link" name="link" value=" {{$cars->links()}}"/>