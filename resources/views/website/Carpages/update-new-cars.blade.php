

@if($vehicle->isEmpty())
<div style="min-height: 300px;">
<b>No result found.</b>
</div>
@else


        <div class="search-page-new">
          <div class="row">
            
            <div class="col-md-12 search-listing ">
              <div>
                    
                  <div class="row">
                      <div class="col-md-12">
                        @foreach($vehicle as $v)
                     
                        <div class="col-sm-3 col-xs-12 m-top-20">
                          <div class="port_item border" style="background:#FFFFFF;">
                            <div class="port_img"> <a href="{{Route('/GetNewVehicleDetails', ['id' => $v->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$v->url)}}" alt="" /></a>
                            </div>
                          <div class="port_caption m-top-10 car-info">
                            <h3><a href="{{Route('/GetNewVehicleDetails', ['id' => $v->id])}}" style="padding:1px; display:block;">{{$v->title}}</a></h3><hr>
                            <h4><?php echo $v->short_description;?></h3><hr>
                           <div class="clear"></div>
                             </div>
                          </div>
                        </div>
                        
                       @endforeach
                       
                     
                        
                        
                       
                       
                      </div>
                    </div>
               <br>

             
                <div id="ad-in-search-bottom" class="tlc">
                  <div  class="m-top-20"> </div>
                </div>
                
                
                <!-- TODO: discuss with usman ali about reviews count and car model instance variable --> 
              </div>
            </div>
          </div>
        </div>
      

@endif