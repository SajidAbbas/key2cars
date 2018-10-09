 @foreach($all_news as $a_n)
  <div class="col-sm-3 m-top-20">
                          <div class="port_item xs-m-top-30 border">
                            <div class="port_img"> <a href="{{Route('/GetNewsDetails', ['id' => $a_n->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$a_n->url)}}" alt=""></a>
                            </div>
                            <div class="port_caption m-top-10 car-info">
                              <h3 ><a href="{{Route('/GetNewsDetails', ['id' => $a_n->id])}}">{{$a_n->title}}</a></h3>
                              <div style="border-bottom:1px solid #DFDFDF; margin-bottom:10px;" class="clear"></div>
                              <p class="pull-left" style="margin-top: 5px;">{{$a_n->make}} {{$a_n->model}} {{$a_n->model_version}}</p>
                              <a href="{{Route('/GetNewsDetails', ['id' => $a_n->id])}}" class="btn-more pull-right"  style="text-decoration:none;">Read More</a>
                              <div class="clear"></div>
                               </div>
                          </div>
                        </div>
      
      @endforeach
      
      <input type="hidden" name="link" id="link" value="{{$all_news->links()}}">