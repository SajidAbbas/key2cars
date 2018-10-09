 <h1>Car Trader &amp; Dealers in Pakistan</h1>
                <div>
                  <ul class="list-unstyled search-results dealer-listing">
                             
	<div class="">
    	<!-- BEGIN PRODUCTS -->

        @if($dealer_cars->isEmpty())
        <h3 style='text-align: center; color:red;margin-top: 20px;'> No Record Found</h3>
        @endif
        
      @foreach($dealer_cars as $d_c)
      <div class="col-sm-12 border m-bottom-20" style="background:#FFFFFF;">
                        <div class=" col-xs-4">
                        <img src="{{URL::asset('images'.$d_c->img_url)}}" class="img-responsive imgM"/>
                        </div>
      <div class="col-xs-8">
                        
                        <h2 >{{$d_c->name}}</h2>
                        <div class="pull-left col-xs-8 row" >
                        <div class="ratings  clear">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-half-o"></i>
                  </div>
                             <p class=""><?php echo $d_c->short_description;?></p>
                         <p class=""><i class="fa fa-map-marker"></i>&nbsp; {{$d_c->address}}.</p>
                        
                        <p class="m-top-10 "><i class=" fa fa-info-circle"></i> Dealer Details..... </p>
                        </div>
                        <div class="pull-right col-xs-4"><img src="{{URL::asset('assets/images/key2cars-certified.png')}}"></div>
                        <br>
                        <div class="clear"></div>
                        <p class=" pull-left p-top-20"><i class=" fa fa-phone"></i> {{$d_c->number}}</p>
                        <a class="pull-right btn-more" href="{{route('carDealerDetailPage',['id'=>$d_c->id])}}"  style="text-decoration:none;">View More</a>
                        </div>
        </div>
  		
      @endforeach
  		
  		<!-- END PRODUCTS -->
	</div>
    </li>
                                

                  </ul>
             
                  <div data-pjax-enable><ul class="pagination search-pagi">
                    {{$dealer_cars->links()}}
  
  </div>
                </div>