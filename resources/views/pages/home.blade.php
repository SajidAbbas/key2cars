@extends('layout')

@section('title')
<title>Home</title>
@endsection
@section('cssblock')

<!--Google Font link-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

<link rel="stylesheet" href="{{ URL::asset('frontend/css/slick/slick.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/ribbon.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/animate.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/iconfont.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/bootsnav.css')}}">

<!-- xsslider slider css -->



<!--Theme custom css -->
<link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css')}}">
<!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

<!--Theme Responsive css-->
<link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive.css')}}" />

<script src="{{ URL::asset('frontend/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
@endsection


@section('content')

<div style="position:relative; overflow:hidden" class="search-background">
    <img src="{{URL :: asset('images/banner-957x374.jpg') }}">

    <div class="well-searchbox">
        <form class="form-horizontal" method="post" action="{{route('searchindexform')}}" role="form">
            {{ csrf_field() }}
            <h2 style="text-align:center;">Used Cars in Pakistan</h2>

            <div class="form-group">
                <div class="col-md-12">
                    <select id="make" name="make" class="quick-search" >
                        <option value="" disabled selected>Car Make</option>
                        @foreach($manufacture as $d)
                        <option value="{{$d->brand_id}}">{{$d->brand}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <select id="model" name="model" class="quick-search" placeholder="Province">
                        <option value="" disabled selected>Car Model</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <select class="quick-search" name="price" placeholder="Category">
                        <option value="">Price</option>
                        <option value="1">Les Than 20 Lac</option>
                        <option value="2">More Than 20 Lac</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <select id="city" name="city" class="quick-search" placeholder="City">
                        <option value="" disabled selected>Car City</option>
                        @foreach($city as $d)
                        <option value="{{$d->id}}">{{$d->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="row">
                    <button style="width:100%;" type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--            
<div id="fixed-button"><a href="#"><img src="assets/images/sell-car.jpg"></a></div>-->

<!--Ads Section-->
<section id="features" class="features bg-grey">
    <div class="container">
        <div class="row">
            <div class="main_features fix roomy-70">
                <div class="col-sm-10">
                    <!--  <div class="features_item sm-m-top-30 bg-white">
                          
                          <div class="f_item_text">
                              <ul class="ad-listing">
                              <li><span style="font-weight:bold; color:#223b7b;"><img src="assets/images/listing.jpg"> &nbsp;Post an Ad for Free:</span> Post your car’s ad for free in 30 seconds.</li>
                              <li><span style="font-weight:bold; color:#223b7b;"><img src="assets/images/listing.jpg"> &nbsp;Thousands of genuine buyers:</span> Get authentic offers from verified buyers.</li>
                              <li><span style="font-weight:bold; color:#223b7b;"><img src="assets/images/listing.jpg"> &nbsp;Sell Faster: </span>Sell your car faster than others at a better price.</li>
                              </ul>
                          </div>
                          <div class="pull-right"><a href="#"><img class="img-responsive" src="assets/images/sell-car.jpg"/></a></div>
                      </div>-->
                    <div class="row"><a href="#"><img style="width:100%;" src="{{URL :: asset('images/ad.gif')}}"></a></div>  


                </div>

                <div class="col-sm-2 ">
                    <div class="features_item ad-certified-car bg-white">

                        <p class="text-center"><a href="#" class="text-center "> <img class="img-responsive" src="{{ URL :: asset('images/add-certified.jpg') }}"><br>
                                View Certified Cars
                            </a></p>
                    </div>
                </div>
            </div>
        </div><!-- End off row -->
    </div><!-- End off container -->
</section><!-- End off ads Section-->

<!--  Featured Cars Section-->
<section id="product" class="product">
    <div class="container">
        <div class="main_product roomy-40">
            <div class="head_title text-center fix">
                <h2 class="text-uppercase">Featured Cars for Sale</h2>
            </div>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">

                    <?php $total_products = 0; ?>
                    <?php $number = 0; ?>

                    @foreach($data as $d)

                    @if($total_products==0)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}" class="active"></li>

                    @elseif(($total_products%3==0)&&($total_products!=3))
                    <li data-target="#carousel-example-generic" data-slide-to="{{$number++}}"></li>
                    @endif
                    <?php $total_products++; ?>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->

                <?php $count = 0; ?> 
                <div class="carousel-inner" role="listbox" style="width:102%">
                    @foreach($data as $d)


                    @if($count==0)
                    <div class="item active">
                        <div class="container">
                            <div class="">
                                @endif


                                @if(($count%4==0)&&($count!=0))
                                <div class="item">
                                    <div class="container">
                                        <div class="row">

                                            @endif
                                            <div class="col-sm-3">
                                                <div class="port_item xs-m-top-30 border">
                                                    <div class="port_img">
                                                        <img class="img-responsive" src="{{ URL ::asset('images'.$d['image']) }}" alt="" />

                                                    </div>
                                                    <div class="port_caption m-top-10 car-info">
                                                        <h3>{{$d['title']}}<span style="color:#223b7b">&nbsp; </span></h3>
                                                        <h6 style="color:#ff4436">PKR <span style="color:#ff4436">{{$d['price']}}</span></h6>
                                                        <h6>Condition: {{$d['condition']}}</h6>
                                                        <div class="pull-right"><i class="fa fa-map-marker"></i>&nbsp; {{$d['location']}}</div>
                                                        <a href="" class="btn-more">View More</a>

                                                        <div class="featured-ribbon" style="margin-left:157px; margin-top:-269px;">
                                                            <i class="fa fa-star"></i>FEATURED
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            @if(($count)%3==0&&($count!=0))  
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <?php $count++; ?>
                                @endforeach

                                @if(($count-1)%3==0)  
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>


                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
                </section>
                <!-- End off Featured Cars Section-->

                <!--Featured Car ad Section-->
                <section id="business" class="business bg-grey roomy-70">
                    <div class="container">
                        <div class="row">
                            <div class="main_business">
                                <div class="col-md-6">
                                    <div class="business_slid">
                                        <div class="slid_shap bg-grey"></div>
                                        <div class="business_items text-center">
                                            <div class="business_item">
                                                <div class="business_img">
                                                    <img src="{{ URL ::asset('images/about-img1.jpg') }}" alt="" />
                                                </div>
                                            </div>

                                            <div class="business_item">
                                                <div class="business_img">
                                                    <img src="{{ URL ::asset('images/about-img1.jpg') }}" alt="" />
                                                </div>
                                            </div>

                                            <div class="business_item">
                                                <div class="business_img">
                                                    <img src="{{ URL ::asset('images/about-img1.jpg') }}" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="business_item sm-m-top-50">
                                        <h2 class="text-uppercase">Never buy a Used Car Without CARSURE</h2>
                                        <ul>
                                            <li><i class="fa fa-arrow-circle-right"></i> 2016 Model in Red color</li>
                                            <li><i class="fa  fa-arrow-circle-right"></i> 8/10 Condition Engine</li>
                                            <li><i class="fa  fa-arrow-circle-right"></i> Luxury Interior and Cooling</li>
                                        </ul>
                                        <p class="m-top-20">Our Carsure Experts Inspect the Car on Over 200 Checkpoints so
                                            You Get Complete Satisfaction and Peace of mind before Buying.</p>

                                        <div class="business_btn">
                                            <a href="" class="btn btn-primary m-top-20">SCHEDULE CARSURE INSPECTION</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- End off Featured Car ad section -->


                <!--Featured Dealers section-->
                <section id="product" class="product">
                    <div class="container">
                        <div class="main_product roomy-50">
                            <div class="head_title text-center fix">
                                <h2 class="text-uppercase">Featured Dealers</h2>
                            </div>

                            <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->


                                <ol class="carousel-indicators">

                                    <?php $total_products = 0; ?>
                                    <?php $number = 0; ?>

                                    @foreach($dealer as $d)

                                    @if($total_products==0)
                                    <li data-target="#carousel-example-generic2" data-slide-to="{{$number++}}" class="active"></li>

                                    @elseif(($total_products%3==0)&&($total_products!=3))
                                    <li data-target="#carousel-example-generic2" data-slide-to="{{$number++}}"></li>
                                    @endif
                                    <?php $total_products++; ?>
                                    @endforeach
                                </ol>

                                <!-- Wrapper for slides -->

                                <?php $count = 0; ?> 
                                <div class="carousel-inner" role="listbox" style="width:102%">
                                    @foreach($dealer as $d)


                                    @if($count==0)
                                    <div class="item active">
                                        <div class="container">
                                            <div class="">
                                                @endif


                                                @if(($count%4==0)&&($count!=0))
                                                <div class="item">
                                                    <div class="container">
                                                        <div class="row">

                                                            @endif

                                                            <div class="col-sm-3">
                                                                <div class="port_item xs-m-top-30">
                                                                    <div class="port_img">
                                                                        <img src="{{ URL ::asset('images'.$d->img_url) }}" alt="" />
                                                                        <label style="margin-left:100px; "><strong>{{$d->name}}</strong></label>
                                                                        <div class="port_overlay text-center">
                                                                            <a href="{{ URL ::asset('images'.$d->img_url) }}" class="popup-img">+</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            @if(($count)%3==0&&($count!=0))  
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <?php $count++; ?>
                                                @endforeach


                                            </div>


                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>

                                            <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div><!-- End off row -->
                                </div><!-- End off container -->
                                </section><!-- End off Featured Dealers section -->

                                <!--Used Cars by city-->
                                <section id="product" class="business bg-grey roomy-70">
                                    <div class="container">
                                        <div class="main_product">

                                            <table class="table well" style="background-color: #ffffff; width: 119%; margin-left: -105px;">

                                                <tbody>

                                                    <tr>

                                                        <td class="ptb0 row">
                                                            <div class="head_title text-center fix">
                                                                <h2 class="text-uppercase"><br>Used Cars by City</h2>
                                                            </div>
                                                            <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-home" style="margin-left:103px">
                                                                @foreach($city_size as $c)
                                                                <li class="col-md-3">
                                                                    <a href="#" id="{{$c->id}}" title="Cars for Sale in Lahore">
                                                                        <h3>Cars {{$c->title}}</h3>
                                                                        {{$c->size}} Used Cars
                                                                    </a>                  </li>
                                                                @endforeach





                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody> 
                                            </table>
                                        </div><!-- End off row -->
                                    </div><!-- End off container -->
                                </section>
                                <!--End of Used cars by city-->
                                <!--Call to  action section-->
                                <section id="action" class="action bg-primary roomy-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="maine_action">
                                                <div class="col-md-8">
                                                    <div class="action_item text-center">
                                                        <h2 class="text-white text-uppercase">Post Your New Ad Here</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="action_btn text-left sm-text-center">
                                                        <a href="" class="btn btn-default">Post New Ad</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section><!-- End off Call to  action section -->
                                @endsection



                                @section('jsblock')
                                <script src="{{ URL::asset('frontend/js/vendor/jquery-1.11.2.min.js')}}"></script>
                                <script src="{{ URL::asset('frontend/js/vendor/bootstrap.min.js')}}"></script>

                                <script src="{{ URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
                                <script src="{{ URL::asset('frontend/js/jquery.magnific-popup.js')}}"></script>
                                <script src="{{ URL::asset('frontend/js/jquery.easing.1.3.js')}}"></script>
                                <script src="{{ URL::asset('frontend/css/slick/slick.js')}}"></script>
                                <script src="{{ URL::asset('frontend/css/slick/slick.min.js')}}"></script>
                                <script src="{{ URL::asset('frontend/js/jquery.collapse.js')}}"></script>
                                <script src="{{ URL::asset('frontend/js/bootsnav.js')}}"></script>



                                <script src="{{ URL::asset('frontend/js/plugins.js')}}"></script>
                                <script src="{{ URL::asset('frontend/js/main.js')}}"></script>







                                <script>
                                $(function () {
                                    $('#make').change(function () {

                                        var data = {'make': $(this).val()};
                                        $.get('getModelByMake', data, function (data) {
                                            var model = $('#model');

                                            model.empty();

                                            model.append("<option value='' disabled selected>" + 'Car Model' + "</option>");

                                            $.each(data, function (index, element) {
                                                model.append("<option value='" + element.id + "'>" + element.title + "</option>");
                                            });
                                        });
                                    });
                                });



                                </script>




                                @endsection