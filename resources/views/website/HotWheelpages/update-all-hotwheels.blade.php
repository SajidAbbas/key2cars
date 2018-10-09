 @foreach($all_vehicles as $a_v)
 <div class="col-sm-3 m-top-20">
    <div class="port_item xs-m-top-30 border" style=" background:#FFFFFF;">
                            <div class="port_img"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$a_v->url)}}" alt="">
                            </div>
                            <div class="port_caption m-top-10 car-info" >
                              <h3 ><a href="{{Route('/GetHotWheelDetails', ['id' => $a_v->id])}}">{{$a_v->title}}</a></h3>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
@foreach($images_size[$a_v->id] as $img)
                              <div class="pull-left"><a href="{{Route('/GetHotWheelDetails', ['id' => $a_v->id])}}"><i class="fa fa-image"> {{$img->size}}</i></a></div>
@endforeach
                              <div class="pull-right"><i class="fa fa-star-full"></i><i class="fa fa-star-full"></i><i class="fa fa-star-full"></i><i class="fa fa-star-full"></i><i class="fa fa-star-half-full"></i></div>
                              
                              
                               </div>
                          </div>
 </div>
     @endforeach
     <input type="hidden" value="{{$all_vehicles->links()}}" id="link">