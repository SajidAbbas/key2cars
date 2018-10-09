@extends('websiteMasterView')

@section('title')
New Vehicle for Sale in Pakistan | Key2Cars
@endsection


@section('icons')

<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car-active" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="accessories"  href="{{Route('/accessory')}}"></a></li>
             <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
             <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
           
            
            
            
          </ul>
    
    
        </div>

<ul class="center-block hidden-sm hidden-lg hidden-md " id="">
    <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="car-active" href="{{Route('carIndexPage')}}"></a></li>
            <li class="col-xs-4"><a style="padding: 15px; margin: 0" class="bike"  href="{{Route('bike')}}"></a></li>
             <li class="col-xs-4"><a  style="padding: 17px; margin: 0" class="accessories"  href="{{Route('/accessory')}}"></a></li>
             <li class="col-xs-4"><a class="tractor"  href="{{Route('/farms')}}"></a></li>
            <li class="col-xs-4"><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class="col-xs-4"><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
            
           
            
          </ul>

@endsection

@section('cssblock')
   <!--Google Font link-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/ribbon.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootsnav.css')}}">

        <!-- index css -->
        
        <link rel="stylesheet" href="{{URL::asset('assets/car/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/car/css/bootstrap.css')}}">



        <!--Theme custom css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        
        <!-- JS includes -->

        <script src="{{URL::asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/vendor/bootstrap.min.js')}}"></script>

        
        



        <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
        <script src="{{URL::asset('assets/js/main.js')}}"></script>

    

    <link href="{{URL::asset('assets/car/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
  <link href="{{URL::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{URL::asset('assets/car/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/car/js/index_used_cars.js')}}" type="text/javascript"></script>

  
  @endsection
  
  @section('content')
  

<div class="mt10" id="main-container"> <span itemscope="" itemtype="http://schema.org/Car">
  <section>
      @foreach($data as $d)
    <div class="container"> <span style="display:none;" itemprop="name">{{$d->title}}</span>
      <h1 class="mt10">{{$d->title}} Overview &amp; Price</h1>
      <div class="well p40 mb40">
        <div class="row">
          <div class="col-md-4">
            <div class="col-md-9 nopad"> <span>
              <label class="generic-green mb5">PKR <strong class="fs22">{{$d->price}}</strong></label>
              </span> <br>
<!--<a href="/new-cars/on-road-price?version=vx-euro-ii" class="btn btn-link-outline fs12" onclick="trackEvents('OnRoadPrice', 'From - Version', 'Suzuki Mehran VX Euro II');">Get On Road Price</a>
              <div class="mt30 mb30 text-center"> <a href="javascript:void;" data-target="#dibModal" data-toggle="modal" class="btn btn-primary btn-block fs12" onclick="trackEvents('CarFinance','GetThisCarFinanced', 'From - VersionPage');">GET THIS CAR FINANCED</a> 
              </div>-->
             <!-- <div id="dibModal" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog dib-model">
                  <div class="modal-content" id="modal-content">
                    <form accept-charset="UTF-8" action="/car-loan-calculator/new-car/detail/" class="form-horizontal nomargin" id="car-finance-lead" method="get">
                      <div style="margin:0;padding:0;display:inline">
                        <input name="utf8" type="hidden" value="✓">
                      </div>
                      <input id="authenticity_token" name="authenticity_token" type="hidden" value="Lor7xDTfYnlcMkq5N0ntOTsa07ap/+EXU0hyZRE5WDo=">
                      <input id="check_for_newsletter" name="check_for_newsletter" type="hidden" value="">
                      <div class="modal-body" style="max-height: none;">
                        <button type="button" class="close close-lg" data-dismiss="modal" aria-hidden="true"></button>
                        
                        
                       
                      </div>
                    </form>
                    <script>


    $(document).ready(function(){
        $('#finance-lead-details-btns').hide();
    });

        $('#city_for_finance').on('change',function(){
            $('#car_finance_lead_city').val($(this).val());
            $('#finance-lead-details-btns').show();
        });
        $('#city_for_finance, #version').on('change',function(){
            showOrHideFinanceControls();
            $('#finance-lead-details-btns').show();
        });
        $('#version').on('change',function(){
            $('#car_finance_lead_version_id').val($(this).val())
            //$('#finance-lead-details-btns').hide();
        });

        showOrHideFinanceControls();
        function showOrHideFinanceControls(){
            if ($('#city_for_finance').val() && $('#version').val()){
               $('#finance-calc-and-controls, div.apply-finance-actions').show();
                $('#finance-lead-details-btns').show();
                }
            else {
                $('#finance-calc-and-controls, div.apply-finance-actions').hide();
            }
        }



    $('form#car-finance-lead').on('change',function(){
        if ( $('.finance-sliders').is(':visible') ){
            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize() + '&format=js' + '&ga_label=From - VersionPage', // serializes the form's elements.
                dataType: 'script',
                success: function(data){ eval(data);}
            });
        }
    });

    $('button#submit-finance-lead').on('click',function(){
        var form = $(this).closest('form');
        if ( $(form).parsley().validate() ){
            $(form).attr('action','/car-loan-calculator/').attr('method','post')
                trackEvents('CarFinance','FormSubmitDone', 'From - VersionPage');
        }
    });

    $('button.apply-finance').on('click',function(e){
        e.preventDefault();
        $('#car_finance_lead_car_loan_id').val($(this).data('loanId'));
        $('div#finance-contact-details, div#submit-finance-lead-btns').show();
        $('div#finance-newcar-dropdowns, div.finance-sliders, div#finance-lead-details-btns').hide();
    });

    $('a#change-finance-details').on('click',function(e){
        e.preventDefault();
        $('div#finance-newcar-dropdowns, div.finance-sliders, div#finance-lead-details-btns').show();
        $('div#finance-contact-details, div#submit-finance-lead-btns').hide();
    });

</script> 
                  </div>
                </div>
              </div>-->
            </div>
            <!--<div class="clearfix" style="clear:both;"> <span class="rating generic-orange fs12 " id="review-Version"> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </span>
             </div>
            <div class="mb10 fs12"> <a href="/new-cars/suzuki/mehran/reviews/" id="reviewcount_vx-euro-ii">110 Reviews</a> | <a href="/new-cars/reviews/new/?ManID=41&amp;ModelID=62&amp;VersionID=640" class="ga-Version-write-review" ga-label="vx-euro-ii">Write a Review</a> </div>-->
          </div>
          <div class="col-md-8 vehicle-intro generation-slider pos-rel">
                            
              <div id="content-slider" class="clr">
		<div class="wrap-slider clr">	
		<br>
		
<!-- 	========================Thumbnail ControlNav======================================    -->	
                 <?php $count =1;?>
                    @foreach($images as $img)
			<input type="radio" id="a-{{$count++}}" name="a" >	
                        @endforeach
			
			
			<nav id="main">
                <?php $count =1;?>
                    @foreach($images as $img)
                        <label for="a-{{$count++}}" class="first"></label>
                    @endforeach
         
         
			</nav>
<!-- 	==============================================================    -->
			<nav id="control">
                            <?php $count =1;?>
                    @foreach($images as $img)
                           <label for="a-{{$count++}}" ></label>
                    @endforeach
         
			</nav>
<!-- 	==============================================================    -->

				<!-- 	IMAGE NAVIGATION pic -->
                                 <?php $count =1;$index=10;?>
                    @foreach($images as $img)
			<span id="b-{{$count}}" class="th" tabindex="{{$index++}}">
				<img src="{{URL::asset('images'.$img->url )}}" alt="" id="p-{{$count++}}">
				
			</span>
                    @endforeach

			
			
			<!-- ______________IMAGES_________________________________________ -->						

			<div class="slider">
				<div class="inset">
                                    <?php $count =1;?>
                                          @foreach($images as $img)

					<figure>
					  
						<img src="{{URL::asset('images'.$img->url) }}" alt="" id="i-{{$count++}}" class="f">						
					</figure>

					@endforeach				
				</div>
			</div>					

		</div>		
	</div>
             
          </div>
        </div>
      </div>
    </div>
  </section>
 <section>
 <div class="container">
 <ul class="engine-specs list-unstyled mb40">
        <li>
          <div> <span class="icon mileage"></span> <span>MILEAGE (KM/LITER)</span> <strong itemprop="fuelEfficiency" itemscope="">
            <meta itemprop="minValue" content="13">
            <meta itemprop="maxValue" content="18">
            {{$d->mileage}} </strong> </div>
        </li>
        <li>
          <div> <span class="icon transmission"></span> <span>City </span> <strong itemprop="vehicleTransmission">{{$d->city}} <span></span></strong> </div>
        </li>
        <li>
          <div> <span class="icon fuel-type"></span> <span>Fuel Type</span> <strong itemprop="fuelType">{{$d->engine_type}}</strong> </div>
        </li>
        <li>
          <div> <span class="icon engine"></span> <span>Engine</span> <strong itemprop="vehicleEngine" itemscope="">{{$d->engine_capacity}} cc</strong> </div>
        </li>
      </ul>
      </div>
      </section>
  <section>
    <div class="container">
      <h2>Colors</h2>
      <div class="well" style="text-align: center">
          <div style="padding: 10px"> <?php echo $d->colors;?></div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        
           
        <div class="col-md-6 container">
      <h2> Specification</h2>
      <div class=" well " style="text-align: center">
          <div style="padding: 10px"> <?php echo $d->specification;?></div>
      </div>
     </div>
         
         
          
        <div class=" col-md-6 container" >
      <h2> Features</h2>
      <div class=" well " style="text-align: center">
          <div style="padding: 10px"><?php echo $d->features;?></div>
      </div>
     </div>
      </div>
    </div>
  </section>
  </span>
  <section>
    <div class="container">
      <h2> Description</h2>
      <div class="well " style="text-align: center">
          <div style="padding: 10px"><?php echo $d->description;?></div>
      </div>
     </div>
  </section>
  @endforeach
  
  
  @if(!$related_ads->isEmpty())
  <section id="product" class=" product bg-grey title-padding">
    <div class="container">
      <div class="main_product row">
        <div class="text-center fix">
          <h2 class="" >Related Ads</h2>
        </div>
         
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          
          <ol class="carousel-indicators hidden-lg hidden-md hidden-sm hidden-xs">
             <?php $total_products = 0; ?>
                    <?php $number=0;?>
                    @foreach($related_ads as $r_a)

                    @if($total_products==0)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}" class="active"></li>

                    @elseif(($total_products%4==0)&&($total_products!=0))
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}"></li>
                    @endif
                    <?php $total_products++; ?>
                    @endforeach
          </ol>
          
          
          <?php $count = 1; ?> 
          <div class="carousel-inner " role="listbox" >
            @foreach($related_ads as $r_a)


                    @if($count==1)
                    <div class="item active">
                    
                    @endif

                    @if(($count%5==0)&&($count!=1))
                      <div class="item">
                      
                        @endif

            
                  <div class="col-sm-3 m-bottom-60">
                    <div class="port_item xs-m-top-30 border bg-white">
                      <div class="port_img"> <a href="{{Route('/GetCarDetails', ['id' => $r_a->id])}}"><img class="img-responsive rel-featured" src="{{URL::asset('images'.$r_a->url)}}" alt="" /></a> 
                      
                       </div>
                      <div class="port_caption m-top-10 car-info">
                        <h3 ><a href="{{Route('/GetCarDetails', ['id' => $r_a->id])}}">{{$r_a->manufacture}} {{$r_a->model}} {{$r_a->model_version}}<span style="color:#223b7b">&nbsp; {{$r_a->year}}</span></a></h3>
                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$r_a->price}}</span></h6>
                       @if($r_a->condition==\App\VehicleType::New_Vehicle)
                        <h6>Condition: New</h6>
                        @elseif($r_a->condition==\App\VehicleType::Almost_New_Vehicle)
                         <h6>Condition: Almost New</h6>
                        @else
                         <h6>Condition: Used</h6>
                        @endif
                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; {{$r_a->city}}</div>
                        <a href="{{Route('/GetCarDetails', ['id' => $r_a->id])}}" class="btn-more"  style="text-decoration:none;">View More</a>
                      </div>
                    </div>
                  </div>
                  
                  @if($count%4==0&&($count!=1))  
                                        
                                </div>
                                @endif
                                <?php $count++; ?>
                                @endforeach

                                @if(($count-1)%4!=0)  
                                        
                                </div>
                                @endif
          </div>
          
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> </div>
      </div>
    </div>
  </section>
  @endif
  
</div>





@endsection



@section('jsblock')
<script>
    $(function(){
      var make= $('#UsedManID').val();
      if (make) {
        updateModels('car',make, $('#UsedModelID'), 'All Models'); reloadChosen('#UsedModelID');
        updateVersion('car',$('#UsedModelID').val(), make, $('#UsedVersionID'), 'All Versions');reloadChosen('#UsedVersionID');
      }
      $(".search-main").bind('keydown',function(e) {
        if(e.which === 13 && $(".chzn-single-with-drop").length==0 &&!$("select").is(":focus")) {
            $('.search-main #used-cars-search-btn').click();
        }
      });
    });
  </script> 
<script type="text/javascript">
    $(function(){
      if($('#carSliderWrapper #slider').length > 0){
        var carSlider = $('#carSliderWrapper #slider').bxSlider({
          infiniteLoop: true,
          auto: false,
          autoControls: false,
          autoHover: true,
          speed:1000,
          pause: 10000,
          pager:false,
          nextSelector: '.slider-next',
          prevSelector: '.slider-prev',
          nextText: '<i class="fa fa-chevron-right"></i>',
          prevText: '<i class="fa fa-chevron-left"></i>',
          onSlideBefore: function(slide){
              lazyLoadSliderImages(slide,'.lazy-car-slider')
          }
        });
        var first_slide_images = carSlider.getCurrentSlideElement().find('.lazy-car-slider')
        applyImagesLazyLoad(first_slide_images);
      }
    });
  </script> 
<script>
      var fetch_f_ads=true;
      $(function(){
        if($('#slider1').length > 0){
          $('#slider1').bxSlider({
            auto: false,
            autoControls: false,
            autoHover: true,
            speed:1000,
            pause: 10000,
            pager:false,
            nextSelector: '.slider1-next',
            prevSelector: '.slider1-prev',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>',
          });
        }
      });
    </script> 
<script>
        $(document).ready(function() {
            $('.bxSlider').each(function(i,slider){
                $(slider).bxSlider({
                    infiniteLoop: false,
                    hideControlOnEnd: true,
                    auto: false,
                    autoControls: false,
                    autoHover: true,
                    speed: 1000,
                    pause: 10000,
                    minSlides: 4,
                    maxSlides: 4,
                    pager: false,
                    nextSelector: $(slider).attr('data-link-next'),
                    prevSelector: $(slider).attr('data-link-prev'),
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    prevText: '<i class="fa fa-chevron-left"></i>',
                });
            });
            slideShowContent(this);
            applyImagesLazyLoad();
        });
    </script> 
<script>
      $('.nav-dropdown-menu').on('mouseover', function() {
        $(this).parent().addClass('open');
      });
      $('.nav-dropdown-menu').on('mouseout', function() {
        $(this).parent().removeClass('open');
      });
      $(document).ready(function (){ $('#navbar_static_top').attr('data-offset-top', $('.advertisement').innerHeight() + $('.header').innerHeight());

      $("#user-menu,#lang-menu").click(function(e){
        $(this).toggleClass("open");
          e.stopPropagation();
      });

      });
    </script> 
<script>$(document).on('click', '.panel-heading span.fa-plus', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapse')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapse');
    	$this.removeClass('fa-plus').addClass('fa-minus');
       
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapse');
         $this.removeClass('fa-minus').addClass('fa-plus');
    }
});</script>
@endsection