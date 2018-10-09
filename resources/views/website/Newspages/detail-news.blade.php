@extends('websiteMasterView')

@section('title')
News Detail  | Key2Cars
@endsection


@section('icons')
<div class="pull-left" style="margin-left:70px">
          <ul class="list-inline hidden-sm hidden-xs" id="">
              <li class=""><a class="car" href="{{Route('carIndexPage')}}"></a></li>
            <li class=""><a class="bike"  href="{{Route('bike')}}"></a></li>
            <li class=""><a class="truck"  href="{{Route('/trucks')}}"></a></li>
          <!--  <li class=""><a class="buses"  href="{{Route('/sellBus')}}"></a></li>-->
            <li class=""><a class="tractor"  href="{{Route('/farms')}}"></a></li>
            <li class=""><a class="bus"  href="{{Route('/buses')}}"></a></li>
            <li class=""><a class="accessories"  href="{{Route('/accessory')}}"></a></li>
            
          </ul>
        </div>



@endsection

@section('cssblock')

		
        <!--Google Font link-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

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

    

    <link href="{{URL::asset('assets/news/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
	<link href="{{URL::asset('assets/news/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


    <script src="{{URL::asset('assets/news/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/news/js/index_used_cars.js')}}" type="text/javascript"></script>

    
@endsection

  

@section('content')
        
      <!--End off Navigation -->
          
<div id="mycarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
 <!-- <ol class="carousel-indicators">
    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
    <li data-target="#mycarousel" data-slide-to="1"></li>
    <li data-target="#mycarousel" data-slide-to="2"></li>
    <li data-target="#mycarousel" data-slide-to="3"></li>
    <li data-target="#mycarousel" data-slide-to="4"></li>
  </ol>-->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="height:500px; background-size:100%;">
      
      @foreach($image as $img)
    <div class="item" style="height:500px; background-size:100%;" >
        <img class="img-responsive" src="{{URL::asset('images'.$img->url)}}" data-color="lightblue" alt="First Image">
        <div class="carousel-caption banner-text " style="bottom:137px;">
            @foreach($result as $r)
            <h1 class="m-bottom-20">{{$r->title}}</h1>
            @endforeach
        </div>
    </div>
      @endforeach
      
   
  </div>

  <!-- Controls -->
  <div class="container">
  <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
    <i class="fa fa-angle-left" style=" color:#FFFFFF; "></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
    <i class="fa fa-angle-right center" style="color:#FFFFFF;"></i>
    <span class="sr-only">Next</span>
  </a>
</div></div>
<script>
    var $item = $('.carousel .item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 6000,
  pause: "false"
});
</script>

<section class="container m-bottom-20" style="padding:0 0px 5px 10px; margin-top:20px; background:#FFFFFF">
<div class="col-xs-8 ">
    @foreach($result as $r)
<h2 style="text"> {{$r->make}} {{$r->model}} {{$r->model_version}}</h2><hr>
<h2>Admin Reviews</h2>
<span class="rating generic-orange fs12 "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </span><br>
<br>

<?php echo $r->description;?>
@endforeach

<!--================================================Right Panel============================================-->




 <form accept-charset="UTF-8" action="#" class="nomargin" method="get" >
      <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden"  /></div>
    <div id="more_option_detail" class="clearfix" style="display:none;">
  <hr>
  <div class="col-xs-8">

<h2>Admin More Reviews </h2>
<span class="rating generic-orange fs12 "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </span><br>
<br>
<p>No proper finshing. Quilty controler failed. Without quality checking they are launched of Suzuki Mehran. I m not satisfied on quality. Very ruff Mehran. I proof it. No compromise on quality. Plz c...</p>
<p>No proper finshing. Quilty controler failed. Without quality checking they are launched of Suzuki Mehran. I m not satisfied on quality. Very ruff Mehran. I proof it. No compromise on quality. Plz c...</p>
<p>No proper finshing. Quilty controler failed. Without quality checking they are launched of Suzuki Mehran. I m not satisfied on quality. Very ruff Mehran. I proof it. No compromise on quality. Plz c...</p>
<p>No proper finshing. Quilty controler failed. Without quality checking they are launched of Suzuki Mehran. I m not satisfied on quality. Very ruff Mehran. I proof it. No compromise on quality. Plz c...</p>
</div>
  <div class=" col-xs-4">
  <div id="content-slider" class="clr">
		<div class="wrap-slider clr">	
		
<!-- 	========================Thumbnail ControlNav======================================    -->			
			<input type="radio" id="a-1" name="a">			
			<input type="radio" id="a-2" name="a">			
			<input type="radio" id="a-3" name="a">
			<input type="radio" id="a-4" name="a">
			
			<nav id="main">
          <label for="a-1" class="first"></label>
          <label for="a-2" class="first"></label>
          <label for="a-3" class="first"></label>
          <label for="a-4" class="first"></label>
          <!-- <label for="a-5" class="first"></label> -->
			</nav>
<!-- 	==============================================================    -->
			<nav id="control">
          <label for="a-1"></label>
          <label for="a-2"></label>
          <label for="a-3"></label>
          <label for="a-4"></label>
          
			</nav>
<!-- 	==============================================================    -->

				<!-- 	IMAGE NAVIGATION pic -->
			<span id="b-1" class="th" tabindex="10">
				<img src="images/featured-4.jpg" alt="" id="p-1">
				
			</span>

			<span id="b-2" class="th" tabindex="11">
				<img src="images/featured-3.jpg" alt="" id="p-2">
				
			</span>			

			<span id="b-3" class="th" tabindex="12">
				<img src="images/featured-2.jpg" alt="" id="p-3">
				
			</span>

			<span id="b-4" class="th" tabindex="13">
				<img src="images/featured-1.jpg" alt="" id="p-4">
				
			</span>
			
			<!-- ______________IMAGES_________________________________________ -->						

			<div class="slider">
				<div class="inset">
					<figure>
						<img src="images/featured-4.jpg" alt="" id="i-1" class="f">
					</figure>
					<figure>
						<img src="images/featured-3.jpg" alt="" id="i-2" class="f">						
					</figure>
					<figure>
						<img src="images/featured-2.jpg" alt="" id="i-3" class="f">						
					</figure>
					<figure>
						<img src="images/featured-1.jpg" alt="" id="i-4" class="f">						
					</figure>
				</div>
			</div>					

		</div>		
	</div>
</div>
<div class="clear"></div>
 
</div>
  
 <script>
    $('.search-fields select,.search-fields input').val('');
    function scrollIntoViewIfNeeded(selector,scroll_top){
      if(jQuery(selector).position()){
        if(jQuery(selector).position().top < jQuery(window).scrollTop()){
          //scroll up
          jQuery('html,body').animate({scrollTop: scroll_top!=undefined ? scroll_top : jQuery(selector).position().top}, 500);
        }
        else if(jQuery(selector).position().top + jQuery(selector).height() > jQuery(window).scrollTop() + (window.innerHeight || document.documentElement.clientHeight)){
          //scroll down
          jQuery('html,body').animate({scrollTop:jQuery(selector).position().top - (window.innerHeight || document.documentElement.clientHeight) + jQuery(selector).height() + 40}, 500);
        }
      }
    }
    function moreAdvanceOptions(link, fire_event){
      var all_cars = $("#used-home-adv-search-btn"), search_row= $("#search-row");
      if ($('#more_option_detail').is(':visible')) {
        $("#search-overlay").hide();
        scrollIntoViewIfNeeded(".search-classified",0);
      }
      else{
        $("#search-overlay").show();
        $('#more_option_detail').css("overflow", "visible");
      }
      $('#more_option_detail').slideToggle('slow', function() {
        if ($(this).is(':visible')) {
          if(fire_event)
            trackEvents('CarSearch', 'MoreSearchOptions', 'From - UsedHome');
          link.html("Less View Reviews Option <i class='fa fa-angle-up'></i>").attr('style', 'margin-top: 15px !important;');
          all_cars.css("margin-top","15px");
          scrollIntoViewIfNeeded(".search-classified");
          $('#more_option_detail').css("overflow", "visible");
        } else {
          link.html("View More Reviews <i class='fa fa-angle-down'></i>").attr('style', '');
          all_cars.css("margin-top","5px");
        }

      });
    }
    $(function(){
      $('#more_option').click(function(){
          moreAdvanceOptions($(this), true);
      });
      
    });

  </script>  
</form>

<div class="pull-left p-bottom-20 m-top-20">
          <a href="javascript:void(0);" id="more_option" class="more_option">
            View More Reviews <i class="fa fa-angle-down"></i>
          </a>
        </div>

<div class="clear"></div>
<hr>
<h1>Owners Reviews</h1>
<hr><br>

@foreach($owner_reviews as $own_rev)
 <h2>{{$own_rev->name}}</h2>
<span class="rating generic-orange fs12 "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i> </span><br>
<br>
<p>{{$own_rev->reviews}}</p>
<div class="clear"></div>

<hr>
@endforeach

 

</div>
<div class=" col-xs-4">
    <img style="width:100%; margin:10px 0;" src="{{URL::asset('assets/news/images/car1.jpg')}}"/>
    
    <h2>Important Links</h2>
    <ul>
        @foreach($important_links as $imp)
    <li><a href="{{Route('/GetCarDetails', ['id' => $imp->id])}}">{{$imp->manufacture}} {{$imp->model}} {{$imp->model_version}}</a></li><br>
    
    @endforeach
    </ul>
</div>
<div class="clear"></div>

</section>

@endsection


@section('jsblock')

@endsection
