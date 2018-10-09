@extends('layout')

@section('title')
<title>New Car</title>
 <link rel="icon" type="image/png" href="{{URL::asset('images/favicon.png')}}">
@endsection

@section('cssblock')

 <!--Google Font link-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">

        <link rel="stylesheet" href="{{URL::asset('frontend/css/custom.css')}}">
		<link rel="stylesheet" href="{{URL::asset('frontend/css/ribbon.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/css/bootsnav.css')}}">

        <!-- xsslider slider css -->



        <!--Theme custom css -->
        <link rel="stylesheet" href="{{URL::asset('frontend/css/style.css')}}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        
       
    

    <link href="{{URL::asset('frontend/usedCar/css/custom.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
 
	<link href="{{URL::asset('frontend/usedCar/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />


   



@endsection
        

 @section('content')

      <section>
  <div class="container">
    
      <img src="images/ad.gif" style=" width:100%;"/>
      
    
   
<form accept-charset="UTF-8" action="https://www.pakwheels.com/used-cars" class="form-horizontal ga-used-car-form" data-parsley-validate="" enctype="multipart/form-data" id="submitAnad" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="3xHnqVmUEMMUw1A+M0l3GTwAbkVIaHWnql0t3HZYHVQ=" /></div>
  

  <div class="well linked-fields pos-rel">


    	<div class="mb20 connect-fb-sell text-center clearfix">
    <a href="https://www.pakwheels.com/oauth/facebook?rdback=true" class="btn btn-social facebook mr30" id="connect-facebook" onclick="trackEvents('Facebook', 'ConnectFacebook', 'From - CarSellForm')" ><i class="fa fa-facebook"></i> Connect with Facebook</a>Sell car faster and at higher price by showing your trusted seller status
    <a href="javascript:void(0);" class="close pullright" onclick="$('.connect-fb-sell').fadeOut('slow'); trackEvents('Facebook', 'CloseFacebookConnect', 'From - CarSellForm')"></a>
	</div>

    
    <fieldset class="nomargin sell-form">
      <legend class="nomargin noborder">Car Information
        <span class="col-md-offset-4 sell-mandatory">(All fields marked with <label>*</label> are mandatory)</span>
      </legend>

        <div class="icn-bikes sell-icon">Want to sell your bike? <a href="../used-bikes/new.html" rel="nofollow">Click here</a></div>

      
        
<div class="form-group mt20">
  <label class="col-md-4" for="city"> <span id="city_label_id"> City </span><span class="text-error">*</span></label>
  <div class="col-md-8">

    <select class="ad_listing_city_id chzn-select filterable-select prefilled" data-parsley-error-container="#city-error-message" data-parsley-error-message="Enter city name" data-parsley-required="true" data-parsley-trigger="change" data-title="City" id="used_car_ad_listing_attributes_city_id" name="used_car[ad_listing_attributes][city_id]" onchange="updateCityArea(this, $(&#x27;.ad_listing_city_area_id&#x27;),&#x27;City Area&#x27;); reloadChosen(&#x27;#used_car_ad_listing_attributes_city_area_id&#x27;);; $(&#x27;#used_car_reg_city_id&#x27;).val(this.value); reloadChosen(&#x27;#used_car_reg_city_id&#x27;);" quick-change="#used_car_ad_listing_attributes_city_area_id"><option value="">City</option>
<optgroup label="Popular Cities"><option value="410">Lahore</option>

</optgroup>
<optgroup label="Other Cities">
	<option value="2">Abdul Hakeem</option>
</optgroup>
</select>
    <p class="nomargin" id="city-error-message"></p>
  </div>
</div>


<div id="city-area-dropdown" class="form-group" style="display:none">
  <label class="col-md-4" for="city_area"> City Area</label>
  <div class="col-md-8">
    <select class="ad_listing_city_area_id chzn-select " data-native-menu="true" data-parsley-pattern="*" data-parsley-trigger="change" id="used_car_ad_listing_attributes_city_area_id" name="used_car[ad_listing_attributes][city_area_id]"><option value="">City Area</option>
</select>
  </div>
</div>
      
          <!-- Modal for select Make/Model/Version-->


<script src="js/used_car_selection_popup-5c5c1455b303e7642af14672be297d2a.js" type="text/javascript"></script>


<div id="get-car-name" class="modal get-car-name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<div class="modal-dialog" style="width:902px;">
    <div class="modal-content">    
  <div class="modal-body clearfix">
    <div class="col col-3 cat-selection makes pull-left active">
      <div class="header-car-info arrow-right">Make</div>
      <div class="form-group nomargin">
        <ul class="fs14 get-listing make-listings">
        <li class="heading"><h4>Popular</h4></li>

            <li class="make" data-make="41" id="make_41"><a  href="#">Suzuki <i class="fa fa-angle-right"></i></a></li>
           
          <li class="heading"><h4>Others</h4></li>

            <li class="make" data-make="66" id="make_66"><a  href="#">Adam <i class="fa fa-angle-right"></i></a></li>
           
        </ul>
      </div>
    </div>
    <div class="col col-3 cat-selection models pull-left">
      <div class="header-car-info arrow-right">Model</div>
      <div class="form-group nomargin">

            <ul class="model-listings fs14 get-listing models_for_41" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="62" id="model_62"><a  href="#">Mehran <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="856" id="model_856"> <a href="#">Aerio <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_42" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="118" id="model_118"><a  href="#">Corolla <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="630" id="model_630"> <a href="#">86 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_14" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="2" id="model_2"><a  href="#">Civic <i class="fa fa-angle-right"></i></a></li>
                

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="615" id="model_615"> <a href="#">Accord Tourer <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_8" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="305" id="model_305"><a  href="#">Mira <i class="fa fa-angle-right"></i></a></li>
           

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="589" id="model_589"> <a href="#">Atrai Wagon <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_30" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="847" id="model_847"><a  href="#">Dayz <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="174" id="model_174"> <a href="#">120 Y <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_66" style="display:none">


                  <li class="model" data-model="527" id="model_527"> <a href="#">Boltoro <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_50" style="display:none">


                  <li class="model" data-model="530" id="model_530"> <a href="#">Giulietta <i class="fa fa-angle-right"></i></a></li>
                 
            </ul>
            <ul class="model-listings fs14 get-listing models_for_53" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="381" id="model_381"><a  href="#">A4 <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="531" id="model_531"> <a href="#">A1 <i class="fa fa-angle-right"></i></a></li>
               

            </ul>
            <ul class="model-listings fs14 get-listing models_for_103" style="display:none">


                  <li class="model" data-model="893" id="model_893"> <a href="#">10 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_88" style="display:none">


                  <li class="model" data-model="519" id="model_519"> <a href="#">Continental Gt <i class="fa fa-angle-right"></i></a></li>
                  <li class="model" data-model="475" id="model_475"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_3" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="202" id="model_202"><a  href="#">7 Series <i class="fa fa-angle-right"></i></a></li>
                 

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="539" id="model_539"> <a href="#">1 Series <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_54" style="display:none">


                  <li class="model" data-model="941" id="model_941"> <a href="#">Century <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_4" style="display:none">


                  <li class="model" data-model="810" id="model_810"> <a href="#">Cts <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_68" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="544" id="model_544"><a  href="#">Chitral <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="282" id="model_282"> <a href="#">Kalash <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_69" style="display:none">


                  <li class="model" data-model="281" id="model_281"> <a href="#">QQ <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_5" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="376" id="model_376"><a  href="#">Joy <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="377" id="model_377"> <a href="#">Aveo <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_56" style="display:none">


                  <li class="model" data-model="227" id="model_227"> <a href="#">300 C <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_55" style="display:none">


                  <li class="model" data-model="226" id="model_226"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_45" style="display:none">


                  <li class="model" data-model="117" id="model_117"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_7" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="154" id="model_154"><a  href="#">Racer <i class="fa fa-angle-right"></i></a></li>
                 

                <li class="heading"><h4>Others</h4></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_96" style="display:none">


                  <li class="model" data-model="711" id="model_711"> <a href="#">Xj6 <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_57" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="255" id="model_255"><a  href="#">120 Y <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="868" id="model_868"> <a href="#">1000 <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_102" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="755" id="model_755"><a  href="#">Rustom <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="947" id="model_947"> <a href="#">C37 <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_52" style="display:none">


                  <li class="model" data-model="902" id="model_902"> <a href="#">Brothers <i class="fa fa-angle-right"></i></a></li>
                

            </ul>
            <ul class="model-listings fs14 get-listing models_for_93" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="685" id="model_685"><a  href="#">X-PV <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="690" id="model_690"> <a href="#">Besturn <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_75" style="display:none">


                  <li class="model" data-model="845" id="model_845"> <a href="#">California <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_11" style="display:none">


                  <li class="model" data-model="800" id="model_800"> <a href="#">1100 <i class="fa fa-angle-right"></i></a></li>
               
            </ul>
            <ul class="model-listings fs14 get-listing models_for_58" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="229" id="model_229"><a  href="#">Other <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="741" id="model_741"> <a href="#">Anglia <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_77" style="display:none">


                  <li class="model" data-model="783" id="model_783"> <a href="#">Ck <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_13" style="display:none">


                  <li class="model" data-model="98" id="model_98"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_101" style="display:none">


                  <li class="model" data-model="750" id="model_750"> <a href="#">Xml6532 <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_100" style="display:none">


                  <li class="model" data-model="732" id="model_732"> <a href="#">Convertible <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_99" style="display:none">


                  <li class="model" data-model="720" id="model_720"> <a href="#">Avenger <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_72" style="display:none">


                  <li class="model" data-model="325" id="model_325"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_78" style="display:none">


                  <li class="model" data-model="372" id="model_372"> <a href="#">H1 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_16" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="91" id="model_91"><a  href="#">Santro <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="898" id="model_898"> <a href="#">Elantra <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_18" style="display:none">


                  <li class="model" data-model="837" id="model_837"> <a href="#">Como <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_108" style="display:none">



            </ul>
            <ul class="model-listings fs14 get-listing models_for_19" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="797" id="model_797"><a  href="#">S Type <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="903" id="model_903"> <a href="#">Xj6 <i class="fa fa-angle-right"></i></a></li>
                

            </ul>
            <ul class="model-listings fs14 get-listing models_for_20" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="101" id="model_101"><a  href="#">Other <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="895" id="model_895"> <a href="#">Bj212 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_106" style="display:none">


                  <li class="model" data-model="821" id="model_821"> <a href="#">M715 <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_21" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="86" id="model_86"><a  href="#">Classic <i class="fa fa-angle-right"></i></a></li>
                 

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="134" id="model_134"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_107" style="display:none">


                  <li class="model" data-model="849" id="model_849"> <a href="#">Riva <i class="fa fa-angle-right"></i></a></li>
                  
            </ul>
            <ul class="model-listings fs14 get-listing models_for_87" style="display:none">


                  <li class="model" data-model="441" id="model_441"> <a href="#">Aventador <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_23" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="291" id="model_291"><a  href="#">Defender <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="672" id="model_672"> <a href="#">Discovery 4 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_24" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="211" id="model_211"><a  href="#">RX Series <i class="fa fa-angle-right"></i></a></li>
                 

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="208" id="model_208"> <a href="#">Es Series <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_59" style="display:none">


                  <li class="model" data-model="230" id="model_230"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_104" style="display:none">


                  <li class="model" data-model="912" id="model_912"> <a href="#">GranTurismo <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_92" style="display:none">


                  <li class="model" data-model="579" id="model_579"> <a href="#">Rocket <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_26" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="254" id="model_254"><a  href="#">RX8 <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="889" id="model_889"> <a href="#">1300 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_27" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="215" id="model_215"><a  href="#">C Class <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="871" id="model_871"> <a href="#">200 T <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_60" style="display:none">


                  <li class="model" data-model="723" id="model_723"> <a href="#">Midget <i class="fa fa-angle-right"></i></a></li>
                  <li class="model" data-model="231" id="model_231"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_28" style="display:none">


                  <li class="model" data-model="470" id="model_470"> <a href="#">Cooper <i class="fa fa-angle-right"></i></a></li>
                  <li class="model" data-model="107" id="model_107"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_29" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="142" id="model_142"><a  href="#">Lancer <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="785" id="model_785"> <a href="#">Carisma <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_89" style="display:none">


                  <li class="model" data-model="715" id="model_715"> <a href="#">Mini <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_85" style="display:none">



            </ul>
            <ul class="model-listings fs14 get-listing models_for_61" style="display:none">


                  <li class="model" data-model="717" id="model_717"> <a href="#">442 <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_31" style="display:none">


                  <li class="model" data-model="816" id="model_816"> <a href="#">Corsa <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_46" style="display:none">


                  <li class="model" data-model="126" id="model_126"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_32" style="display:none">


                  <li class="model" data-model="177" id="model_177"> <a href="#">205 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_62" style="display:none">


                  <li class="model" data-model="814" id="model_814"> <a href="#">Duster <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_33" style="display:none">


                  <li class="model" data-model="702" id="model_702"> <a href="#">Bonneville <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_70" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="313" id="model_313"><a  href="#">Cayenne <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="308" id="model_308"> <a href="#">Boxster <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_80" style="display:none">


                  <li class="model" data-model="406" id="model_406"> <a href="#">Gen 2 <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_49" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="558" id="model_558"><a  href="#">Vogue <i class="fa fa-angle-right"></i></a></li>
                  

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="576" id="model_576"> <a href="#">Evoque <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_35" style="display:none">


                  <li class="model" data-model="113" id="model_113"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_98" style="display:none">



            </ul>
            <ul class="model-listings fs14 get-listing models_for_65" style="display:none">


                  <li class="model" data-model="244" id="model_244"> <a href="#">Family Van <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_67" style="display:none">


                  <li class="model" data-model="263" id="model_263"> <a href="#">Metro <i class="fa fa-angle-right"></i></a></li>
                  <li class="model" data-model="265" id="model_265"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_86" style="display:none">



            </ul>
            <ul class="model-listings fs14 get-listing models_for_64" style="display:none">


                  <li class="model" data-model="234" id="model_234"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_74" style="display:none">


                  <li class="model" data-model="351" id="model_351"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>
                

            </ul>
            <ul class="model-listings fs14 get-listing models_for_39" style="display:none">


                  <li class="model" data-model="114" id="model_114"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_79" style="display:none">


                  <li class="model" data-model="394" id="model_394"> <a href="#">Smart Fortwo <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_90" style="display:none">


                  <li class="model" data-model="763" id="model_763"> <a href="#">Double Cabin <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_94" style="display:none">


                  <li class="model" data-model="707" id="model_707"> <a href="#">Mpv <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_71" style="display:none">


                  <li class="model" data-model="318" id="model_318"> <a href="#">Chairman <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_40" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="503" id="model_503"><a  href="#">Pleo <i class="fa fa-angle-right"></i></a></li>
                 

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="599" id="model_599"> <a href="#">Brz <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_95" style="display:none">


                  <li class="model" data-model="708" id="model_708"> <a href="#">Herald <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_73" style="display:none">


                  <li class="model" data-model="340" id="model_340"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>

            </ul>
            <ul class="model-listings fs14 get-listing models_for_43" style="display:none">
                <li class="heading"><h4>Popular</h4></li>

                  <li class="model" data-model="300" id="model_300"><a  href="#">Beetle <i class="fa fa-angle-right"></i></a></li>
                 

                <li class="heading"><h4>Others</h4></li>
                  <li class="model" data-model="932" id="model_932"> <a href="#">Amarok <i class="fa fa-angle-right"></i></a></li>
                  

            </ul>
            <ul class="model-listings fs14 get-listing models_for_51" style="display:none">


                  <li class="model" data-model="160" id="model_160"> <a href="#">Other <i class="fa fa-angle-right"></i></a></li>
                 

            </ul>
            <ul class="model-listings fs14 get-listing models_for_105" style="display:none">


                  <li class="model" data-model="822" id="model_822"> <a href="#">M38 <i class="fa fa-angle-right"></i></a></li>

            </ul>
      </div>
    </div>
    <div class="col col-3 cat-selection versions pull-left">
      <div class="header-car-info arrow-right">Version <span>(Optional)</span></div>
      <div class="form-group nomargin version-listings-outer">
        <ul class="fs14 get-listing version-listings">
        </ul>
      </div>
    </div>

  </div>
  <div class="modal-footer">
    <button class="btn btn-primary submit-button" data-dismiss="modal" disabled>done</button>
  </div>
</div>
    </div>
  </div>
          <div class="form-group mt20">
            <label class="col-md-4" for="model_year"> Model Year<span class="text-error">*</span></label>
            <div class="col-md-8">
              <select data-parsley-error-message="Please select model year" data-parsley-required="true" data-parsley-trigger="change" id="used_car_model_year" name="used_car[model_year]" onchange="updateGroupedVersions($(&#x27;#used_car_car_model_id&#x27;).val(), $(&#x27;#used_car_model_year&#x27;).val(), $(&#x27;#grouped_versions&#x27;), &#x27;Version&#x27;,&#x27;#used_car_car_version_id&#x27;,&#x27;#used_car_car_model_generation_id&#x27;,true);clearAutoFilledValues();">

              	<option value="">Year</option>
              	<option value='2017'  >2017</option>
              	<option value='2016'  >2016</option>
              	<option value='2015'  >2015</option>
              	<option value='2014'  >2014</option>
              	<option value='2013'  >2013</option>
              	<option value='2012'  >2012</option>
              </select>
            </div>
          </div>          
          <div class="form-group">
            <label class="col-md-4" for="make">Car Info<span class="text-error">*</span></label>
            <div class="col-md-8 car-select-parent">
              <input id="car_selector" name="car_selector" placeholder="Make/Model/Version" type="text" value="" />
              <i class="fa fa-check-circle input-success-icon generic-green"></i><i class="fa fa-exclamation-circle input-failure-icon generic-red"></i>
                <!-- <div class="generic-red" id="car_selector_error"></div> -->
              <ul class="parsley-errors-list">
                 <li id="car_selector_error"></li>
               </ul>
              <input class="apply-parsley" data-parsley-error-message="Car Make is Required" data-parsley-errors-container="#car_selector_error" data-parsley-required="true" data-parsley-trigger="change" id="used_car_car_manufacturer_id" name="used_car[car_manufacturer_id]" type="hidden" />
              <input class="apply-parsley" data-parsley-error-message="Car Model is Required" data-parsley-errors-container="#car_selector_error" data-parsley-required="true" data-parsley-trigger="change" id="used_car_car_model_id" name="used_car[car_model_id]" type="hidden" />
              <input class="apply-parsley" id="used_car_car_version_id" name="used_car[car_version_id]" type="hidden" />
              <input id="used_car_car_model_generation_id" name="used_car[car_model_generation_id]" type="hidden" />
            </div>
          </div>
          
      	<div class="well well-blue ad-policy">
  <h5>Key2Cars Ad Publishing Policy</h5>
  <ul class="list-unstyled listing fs12">
    <li><i class="fa fa-caret-right"></i> We don&#x27;t allow duplicates of same ad.</li>
    <li><i class="fa fa-caret-right"></i> We don&#x27;t allow Non custom vehicle ads</li>
    <li><i class="fa fa-caret-right"></i> We don&#x27;t allow promotional messages that are not relevant to the ad</li>
    <li><i class="fa fa-caret-right"></i> We don&#x27;t allow ads of Bank leased vehicles at below market price</li>
  </ul>
</div>
    </fieldset>
      <fieldset class="nomargin">
        <input id="used_car_ad_listing_attributes_category_id" name="used_car[ad_listing_attributes][category_id]" type="hidden" value="24" />
        <input id="used_car_ad_listing_attributes_step" name="used_car[ad_listing_attributes][step]" type="hidden" value="0" />
        
        <div class="form-group">
            <label class="col-md-4" for="registration_city">Registration City</label>
            <div class="col-md-8">
              <select class="chzn-select" id="used_car_reg_city_id" name="used_car[reg_city_id]"><option value="">Registration City</option>
<optgroup label="Un-Registered"><option value="">Un-Registered</option></optgroup><optgroup label="Popular Cities"><option value="410">Lahore</option>

</optgroup>
<optgroup label="Other Cities">
	<option value="2">Abdul Hakeem</option>
</optgroup></select>
            </div>
          </div>
        <div class="form-group">
          <label class="col-md-4" for="hpi_mileage"> Mileage<span class="text-error">*</span> <span id="mileage_unit">(km)</span></label>
          <div class="col-md-8">
            <input data-parsley-error-message="Enter valid mileage (1-1000000)" data-parsley-pattern="^([1-9][0-9]{0,5}|1000000)$" data-parsley-range="[1, 1000000]" data-parsley-required="true" data-parsley-trigger="change" id="mileage_text" maxlength="6" name="mileage_text" placeholder="Mileage" type="text" value="" />
            <p class="mileage hide nomargin generic-blue-light fs12"></p>
            <input class="car_mileage" id="used_car_mileage" name="used_car[mileage]" type="hidden" value="" />
          </div>
        </div>

          <div class="form-group">
            <label class="col-md-4" for="exterior_color"> Exterior Color<span class="text-error">*</span></label>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <select class="chzn-select" data-parsley-error-message="Select valid exterior color" data-parsley-required="true" data-parsley-trigger="change" id="used_car_exterior_color" name="used_car[exterior_color]" onchange="exteriorColorChange();"><option value="">Exterior Color</option>
<option value="Beige">Beige &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:beige&#x27;&gt;&lt;/strong&gt;</option>
<option value="Black">Black &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:black&#x27;&gt;&lt;/strong&gt;</option>
<option value="Blue">Blue &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:blue&#x27;&gt;&lt;/strong&gt;</option>
<option value="Bronze">Bronze &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:#CD7F32&#x27;&gt;&lt;/strong&gt;</option>
<option value="Brown">Brown &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:brown&#x27;&gt;&lt;/strong&gt;</option>
<option value="Burgundy">Burgundy &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:#800020&#x27;&gt;&lt;/strong&gt;</option>
<option value="Gold">Gold &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:gold&#x27;&gt;&lt;/strong&gt;</option>
<option value="Green">Green &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:green&#x27;&gt;&lt;/strong&gt;</option>
<option value="Grey">Grey &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:grey&#x27;&gt;&lt;/strong&gt;</option>
<option value="Indigo">Indigo &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:indigo&#x27;&gt;&lt;/strong&gt;</option>
<option value="Magenta">Magenta &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:magenta&#x27;&gt;&lt;/strong&gt;</option>
<option value="Maroon">Maroon &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:maroon&#x27;&gt;&lt;/strong&gt;</option>
<option value="Orange">Orange &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:orange&#x27;&gt;&lt;/strong&gt;</option>
<option value="Pink">Pink &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:pink&#x27;&gt;&lt;/strong&gt;</option>
<option value="Purple">Purple &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:purple&#x27;&gt;&lt;/strong&gt;</option>
<option value="Red">Red &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:red&#x27;&gt;&lt;/strong&gt;</option>
<option value="Silver">Silver &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:silver&#x27;&gt;&lt;/strong&gt;</option>
<option value="Turquoise">Turquoise &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:turquoise&#x27;&gt;&lt;/strong&gt;</option>
<option value="White">White &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:white&#x27;&gt;&lt;/strong&gt;</option>
<option value="Yellow">Yellow &lt;strong class=&#x27;pull-right chzn-color&#x27; style=&#x27;background-color:yellow&#x27;&gt;&lt;/strong&gt;</option>
<option value="Unlisted">Unlisted </option></select>
                </div>
                <div class="col-md-4">
                  <input data-parsley-trigger="change" id="used_car_optional_color" maxlength="30" name="used_car[optional_color]" placeholder="e.g. Metallic Grey" size="30" style="display:none;" type="text" />
                </div>
              </div>
            </div>
          </div>
        <div class="form-group">
  <label class="col-md-4" for="price"> Price<span class='text-error'>*</span> <span>(Rs.)</span></label>
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-6">
        <input data-parsley-error-message="Enter valid Price" data-parsley-pattern="^(([1-9][0-9,]{4,}))$" data-parsley-required="true" data-parsley-trigger="change" id="price_formatted" maxlength="9" name="price_formatted" onkeyup="updateAmountInWords(&#x27;#price_formatted&#x27;, &#x27;.ad_listing_price&#x27;, &#x27;.amountInWords&#x27;);" placeholder="Price" type="text" value="" />
            <input class="ad_listing_price" id="used_car_ad_listing_attributes_price" name="used_car[ad_listing_attributes][price]" type="hidden" value="" />

        <p class="amountInWords nomargin generic-blue-light fs12" style="display:none"></p>
      </div>
      
    </div>
  </div>
</div>




<div id="EvaluatePriceModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

      </div>
    </div>
  </div>
</div>





        <div class="form-group mt30">
    <label class="col-md-4 nopad" for="description">Ad Description <span class="text-error">*</span></label>
    <div class="col-md-6 description-box" data-url="description_suggestion">
      <div class="text-right fs10" style="margin-top: -20px;"><span id="remaining_chars_info" class="p15 ptb0 remaining-char">Remaining Characters <strong>995</strong></span></div>
    <textarea class="character-count ad_listing_description" cols="40" columns="50" data-parsley-error-message="This value is required" data-parsley-pattern-message="Please remove any mobile or phone number from comments." data-parsley-pattern="^(?:(?![0-9]{3}[- ]*[0-9]{7})(.|\n|\r))*$" data-parsley-remote-validator="validateDescription" data-parsley-remote="1" data-parsley-required="true" data-parsley-trigger="change" id="used_car_ad_listing_attributes_description" maxlength="995" name="used_car[ad_listing_attributes][description]" onblur="return updateTextAreaCount(this, event,&#x27;plus&#x27;,&#x27;.ad_listing_description&#x27;,995, &#x27;#remaining_chars_info&#x27;); if(this.value==&#x27;&#x27;){this.style.fontStyle=&#x27;italic&#x27;;this.style.color=&#x27;#7f7f7f&#x27;;this.value=&#x27;enter text&#x27;;}" onchange="$(&#x27;.parsley-errorField&#x27;).remove();" onfocus="if(this.value==&#x27;enter text&#x27;){this.value=&#x27;&#x27;;this.style.color=&#x27;#333&#x27;;this.style.fontStyle=&#x27;normal&#x27;}" onkeydown="return updateTextAreaCount(this, event,&#x27;plus&#x27;,&#x27;.ad_listing_description&#x27;,995, &#x27;#remaining_chars_info&#x27;);" onkeypress="return updateTextAreaCount(this, event,&#x27;plus&#x27;,&#x27;.ad_listing_description&#x27;,995, &#x27;#remaining_chars_info&#x27;);" onkeyup="return updateTextAreaCount(this, event,&#x27;plus&#x27;,&#x27;.ad_listing_description&#x27;,995, &#x27;#remaining_chars_info&#x27;);" onpaste="return updateTextAreaCount(this, event,&#x27;plus&#x27;,&#x27;.ad_listing_description&#x27;,995, &#x27;#remaining_chars_info&#x27;);" placeholder="Describe Your car: 
Example: Alloy rim, first owner, genuine parts, maintained by authorized workshop, excellent mileage, original paint etc." rows="6">
</textarea>
     
  </div>
</div>
  <script>
    addValidatorToField('.ad_listing_description', 'https://www.pakwheels.com/checkspam', 'validateDescription');
  </script>

      </fieldset>

      <fieldset id='aditional-information' style="display:none;">
        <legend class="show-on-demand">Additional Information</legend>
        <div class="slide-on-demand" style="display:;" >
          <div id="engine_details" >
            <div class="form-group">
              <label class="col-md-4" for="engine_type"> Engine Type<span class="text-error">*</span></label>
              <div class="col-md-8">
                <select data-parsley-error-message="Please select engine type" data-parsley-required="true" data-parsley-trigger="change" id="used_car_engine_type" name="used_car[engine_type]"><option value="">Engine Type
      <option value='CNG'  >CNG</option>
      <option value='Diesel'  >Diesel</option>
      <option value='Hybrid'  >Hybrid</option>
      <option value='LPG'  >LPG</option>
      </option><option value='Petrol'  >Petrol</option></select>
              </div>
            </div>
            <div class="form-group" id="div_capacity">
              <label class="col-md-4" for="engine_capacity"> Engine Capacity<span class="text-error">*</span> <span>(cc)</span></label>
              <div class="col-md-8">
                <input data-parsley-error-message="Enter valid engine capacity, e.g. 1800" data-parsley-pattern="^[0-9]+$" data-parsley-range="[110, 15000]" data-parsley-required="true" data-parsley-trigger="change" id="used_car_engine_capacity" maxlength="5" minlength="3" name="used_car[engine_capacity]" placeholder="Engine Capacity (cc)" size="5" type="text" />
              </div>
            </div>
          
            <div class="form-group">
              <label class="col-md-4" for="transmission"> Transmission<span class="text-error">*</span></label>
              <div class="col-md-8">
                <select data-parsley-error-message="Please select transmission" data-parsley-required="true" data-parsley-trigger="change" id="used_car_transmission" name="used_car[transmission]"><option value="">Transmission</option>
<option value="Manual">Manual</option>
<option value="Automatic">Automatic</option></select>
              </div>
            </div>
          
            <div class="form-group">
              <label class="col-md-4" for="assembly"> Assembly<span class="text-error">*</span></label>
              <div class="col-md-8">
                <select data-parsley-error-message="Please select assembly" data-parsley-required="true" data-parsley-trigger="change" id="used_car_assembly" name="used_car[assembly]"><option value="">Assembly</option>
      <option value='Local'  >Local</option>
      <option value='Imported'  >Imported</option></select>
              </div>
            </div>


          </div>  
            <div class="form-group">
              <label class="col-md-4" for="features">Features</label>
              <div class="col-md-8 mt5">
                <ul id="feature_lists" class="list-unstyled list-inline nomargin">
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[abs]" type="hidden" value="0" /><input id="used_car_abs" name="used_car[abs]" type="checkbox" value="1" /> ABS</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[air_bags]" type="hidden" value="0" /><input id="used_car_air_bags" name="used_car[air_bags]" type="checkbox" value="1" /> Air Bags</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[air_conditioning]" type="hidden" value="0" /><input id="used_car_air_conditioning" name="used_car[air_conditioning]" type="checkbox" value="1" /> Air Conditioning</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[alloy_rims]" type="hidden" value="0" /><input id="used_car_alloy_rims" name="used_car[alloy_rims]" type="checkbox" value="1" /> Alloy Rims</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[cd_player]" type="hidden" value="0" /><input id="used_car_cd_player" name="used_car[cd_player]" type="checkbox" value="1" /> CD Player</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[cassette_player]" type="hidden" value="0" /><input id="used_car_cassette_player" name="used_car[cassette_player]" type="checkbox" value="1" /> Cassette Player</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[cool_box]" type="hidden" value="0" /><input id="used_car_cool_box" name="used_car[cool_box]" type="checkbox" value="1" /> Cool Box</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[cruise_control]" type="hidden" value="0" /><input id="used_car_cruise_control" name="used_car[cruise_control]" type="checkbox" value="1" /> Cruise Control</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[dvd_player]" type="hidden" value="0" /><input id="used_car_dvd_player" name="used_car[dvd_player]" type="checkbox" value="1" /> DVD Player</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[am_fm_radio]" type="hidden" value="0" /><input id="used_car_am_fm_radio" name="used_car[am_fm_radio]" type="checkbox" value="1" /> AM/FM Radio</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[immobilizer_key]" type="hidden" value="0" /><input id="used_car_immobilizer_key" name="used_car[immobilizer_key]" type="checkbox" value="1" /> Immobilizer Key</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[keyless_entry]" type="hidden" value="0" /><input id="used_car_keyless_entry" name="used_car[keyless_entry]" type="checkbox" value="1" /> Keyless Entry</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[navigation_system]" type="hidden" value="0" /><input id="used_car_navigation_system" name="used_car[navigation_system]" type="checkbox" value="1" /> Navigation System</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[power_locks]" type="hidden" value="0" /><input id="used_car_power_locks" name="used_car[power_locks]" type="checkbox" value="1" /> Power Locks</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[power_mirrors]" type="hidden" value="0" /><input id="used_car_power_mirrors" name="used_car[power_mirrors]" type="checkbox" value="1" /> Power Mirrors</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[power_steering]" type="hidden" value="0" /><input id="used_car_power_steering" name="used_car[power_steering]" type="checkbox" value="1" /> Power Steering</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[power_windows]" type="hidden" value="0" /><input id="used_car_power_windows" name="used_car[power_windows]" type="checkbox" value="1" /> Power Windows</label></li>
                  <li class="col-md-4"><label class="show mt0"><input name="used_car[sun_roof]" type="hidden" value="0" /><input id="used_car_sun_roof" name="used_car[sun_roof]" type="checkbox" value="1" /> Sun Roof</label></li>
                </ul>
              </div>
            </div>
          
          
        </div>
        
      </fieldset>
        
  <legend>Upload Photos</legend>
  <div class="upload-image-hint form-group" id="img_upload_tr">
    <label class="col-md-4">Photos<span class="text-error"></span> </label>
    <div class="col-md-8">
      <div id="plupload_uploader" class="clearfix">
        <div id="img_upload" >
          <div id="moreUploads">
            <span id="uploadify_limit_reached" class="uploadify_help pull-right" onclick="$(this).hide(); $('#uploadify_limit_help').fadeIn(500);">
              <img alt="Error-msg-arrow" src="../../wsa2.pakwheels.com/assets/error-msg-arrow-44fdb1d2522ee92c4d83a54fd63919e0.png" />
              Sorry, you have reached the maximum number of pictures allowed.
            </span>
            <div id="container">
              <a id="pickfiles" class="pickfiles text-center" href="javascript:" style="display:inline-block;">SELECT FILES</a>
              <p id="pickfiles" class="pickfiles text-center" href="javascript:" onclick="$('#uploadify_limit_help').hide(); $('#uploadify_limit_reached').fadeIn(500);" style="display:none;">SELECT FILES</p>
              <div id="filelist">
              </div>
            </div>
            <div id="clear"></div>
          </div>
          <div class="clear"></div>
          <p class="hint">Photos should be in &quot;jpeg, jpg, png, gif&quot; format only.<br />
            You can select and upload multiple photos at the same time</p>
        </div>
        <div class="clear"></div>
      </div>
      
        <input id="used_car_ad_listing_attributes_pictures_attributes_0_pictures_ids" name="used_car[ad_listing_attributes][pictures_attributes][0][pictures_ids]" type="hidden" />
      <div id="simple_uploader" style="display:none;">
        <div id="moreUploads" class="ad_forms">

  
    <div id="div0" class="" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_1_picture" name="used_car[ad_listing_attributes][pictures_attributes][1][picture]" type="file" />
    </div>

    <div id="div1" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_2_picture" name="used_car[ad_listing_attributes][pictures_attributes][2][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(1);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div2" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_3_picture" name="used_car[ad_listing_attributes][pictures_attributes][3][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(2);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div3" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_4_picture" name="used_car[ad_listing_attributes][pictures_attributes][4][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(3);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div4" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_5_picture" name="used_car[ad_listing_attributes][pictures_attributes][5][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(4);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div5" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_6_picture" name="used_car[ad_listing_attributes][pictures_attributes][6][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(5);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div6" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_7_picture" name="used_car[ad_listing_attributes][pictures_attributes][7][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(6);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div7" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_8_picture" name="used_car[ad_listing_attributes][pictures_attributes][8][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(7);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div8" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_9_picture" name="used_car[ad_listing_attributes][pictures_attributes][9][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(8);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div9" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_10_picture" name="used_car[ad_listing_attributes][pictures_attributes][10][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(9);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div10" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_11_picture" name="used_car[ad_listing_attributes][pictures_attributes][11][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(10);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div11" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_12_picture" name="used_car[ad_listing_attributes][pictures_attributes][12][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(11);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div12" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_13_picture" name="used_car[ad_listing_attributes][pictures_attributes][13][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(12);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div13" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_14_picture" name="used_car[ad_listing_attributes][pictures_attributes][14][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(13);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div14" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_15_picture" name="used_car[ad_listing_attributes][pictures_attributes][15][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(14);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div15" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_16_picture" name="used_car[ad_listing_attributes][pictures_attributes][16][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(15);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div16" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_17_picture" name="used_car[ad_listing_attributes][pictures_attributes][17][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(16);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div17" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_18_picture" name="used_car[ad_listing_attributes][pictures_attributes][18][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(17);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div18" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_19_picture" name="used_car[ad_listing_attributes][pictures_attributes][19][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(18);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>

    <div id="div19" class="hide" >
      <input id="used_car_ad_listing_attributes_pictures_attributes_20_picture" name="used_car[ad_listing_attributes][pictures_attributes][20][picture]" type="file" />
        <a id='cat_rmv_btn' href='javascript:removePictureField(19);'><img alt="Cross_icon" src="../../wsa2.pakwheels.com/assets/cross_icon-c971550db2174e1054d7cbb50d3a6c44.gif" style="margin-top: 10px;" /></a>
    </div>
  <div id="clear"></div>
</div>
<div class="clear"></div>
<div id="moreUploadsLink" class="ad_forms">
  <p id="add_another" class="ad_forms ">
    <a href="javascript:addPictureField();">Add Another Picture</a>
  </p>
  <p class="hint">Photos should be in &quot;jpeg, jpg, png, gif&quot; format only.</p>
</div>
<div class="clear"></div>
      </div>
    </div>


  </div>



      <fieldset>
        <legend>Contact Information</legend>
<div id="contact_seller_div">
    

    <div class="form-group">
      <label class="col-md-4 prefill" for="display_name"> Seller Name<span class="text-error">*</span></label>
      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input class="prefilled" data-parsley-error-message="Enter valid name" data-parsley-errors-container="#error-name-number" data-parsley-length="[3, 100]" data-parsley-pattern="^[A-Za-z ]{3,100}$" data-parsley-required="true" data-parsley-trigger="change" id="used_car_ad_listing_attributes_display_name" maxlength="100" name="used_car[ad_listing_attributes][display_name]" placeholder="Seller Name" size="30" type="text" />
        </div>
        <div id="error-name-number"></div>
      </div>
    </div>

    
      <input id="user_email" name="user[email]" type="hidden" />
</div>

<div class="form-group">
  <label class="col-md-4" for="phone_number"> Mobile Number<span class="text-error">*</span></label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-th"></i></span>
      <input class="ad-mobile-number prefilled" data-parsley-error-message="Enter a valid mobile number." data-parsley-errors-container="#error-mobile-number" data-parsley-pattern="^03[0-9]{9}$" data-parsley-required="true" data-parsley-trigger="change" id="used_car_ad_listing_attributes_phone" maxlength="12" name="used_car[ad_listing_attributes][phone]" placeholder="Mobile Number" size="30" type="text" />
    </div>
    <div id="error-mobile-number"></div>
  </div>
</div>

<div class="hide">
  <input id="used_car_ad_listing_attributes_date_expired" maxlength="100" name="used_car[ad_listing_attributes][date_expired]" size="100" type="text" value="45" />
</div>


<input id="used_car_ad_listing_attributes_scraped_id" name="used_car[ad_listing_attributes][scraped_id]" type="hidden" />
<input id="used_car_ad_listing_attributes_scraped_type" name="used_car[ad_listing_attributes][scraped_type]" type="hidden" />
<input id="scraped_category" name="scraped_category" type="hidden" />
      </fieldset>


      
      <fieldset>
        <div class="form-group sell-btn-main">
          <div class="col-md-offset-4 col-md-8">
            <button type="submit" class="btn btn-primary btn-lg fs16" id="submit_form" onclick="trackEvents('CarSure','CertifyMycarDone','From - CarSureHome')">SUBMIT &amp; CONTINUE</button>
          </div>
        </div>
      </fieldset>


  </div>
</form>
    <div id="duplicate_ads_alert" ></div>


  </div>
</section>
  
@endsection



@section('jsblock')

 <!-- JS includes -->

        <script src="{{URL::asset('frontend/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{URL::asset('frontend/js/vendor/bootstrap.min.js')}}"></script>

        
        <script src="{{URL::asset('frontend/js/bootsnav.js')}}"></script>



        <script src="{{URL::asset('frontend/js/plugins.js')}}"></script>
        <script src="{{URL::asset('frontend/js/main.js')}}"></script>
        <script src="{{URL::asset('frontend/usedCar/js/top_javascript-4c1cf070410b188168ccc1759df8f669.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('frontend/usedCar/js/index_used_cars.js')}}" type="text/javascript"></script>
 <script>
    // Custom example logic
  var uploader = null;
  var maxFileSize = 20;
  var busy=false;
  var number_regex = /^(\d+)$/;
  var formSubmitRequest = false;
    var upload_id='#used_car_ad_listing_attributes_pictures_attributes_0_pictures_ids';


  function page_unload_function()
  {
    if(!formSubmitRequest && $("#submitAnad").serialize() !=  form_serial_before_submit)
      return "All information that you have added will be lost"; 
  }
    
    window.onbeforeunload = page_unload_function;

  $(function() {
    form_serial_before_submit = $("#submitAnad").serialize();
    uploader = new plupload.Uploader({
      runtimes : 'gears,html5,flash,silverlight,browserplus',
      browse_button : 'pickfiles',
      container : 'container',
      max_file_size : '7mb',
      url : 'https://www.pakwheels.com/multi_file_uploader/ad_listing',
      flash_swf_url: "/assets/plupload/js/Moxie.swf",
      silverlight_xap_url : '/assets/plupload/js/plupload.silverlight.xap',
      filters : [
        {title : "Image files", extensions : "jpg,gif,png,jpeg"}
      ],
      resize : {width : 1000, height : 750, quality : 70},
      return_file_data: true,
      init : {
        FilesAdded: function(up, files, response) {
          var file_count = files.length;
          var upload_file_size = file_count + $('.filelist_container input.hidden-val').length;
          plupload.each(files, function(file) {
            if (upload_file_size > maxFileSize ) {
              file_count--;
              if((upload_file_size - file_count) > maxFileSize ) {
                up.removeFile(file);
                $('#uploadify_limit_help').hide();
                $('#uploadify_limit_reached').fadeIn(500);
              } else {
                busy=true;
                $('#filelist').append(generate_filelist_container_field(file));
              }
            }
            else{
              busy=true;
              $('#filelist').append(generate_filelist_container_field(file));
            }
          });
        if (upload_file_size >= maxFileSize) {
          if($('#add-files').length > 0){
            $('#add-files').hide();
          }
          else{
            $('a#pickfiles').hide();
            $('p#pickfiles').show();
          }
        }
        up.refresh();
        up.start();
      },
      FilesRemoved: function(up, files) {
        $('#'+files[0].id).remove();
        var upload_file_size = $('.filelist_container input.hidden-val').length;
        if (upload_file_size < maxFileSize) {
          if($('#add-files').length > 0){
            $('#add-files').show();
          }
          else{
            $('p#pickfiles').hide();
            $('a#pickfiles').show();
          }
          $('#uploadify_limit_reached').hide();
          $('#uploadify_limit_help').fadeIn(500);
        }
        up.refresh();
      },

      FileUploaded: function(up, file, response) {
        var my_file = $.parseJSON(response.response);
        if( number_regex.test(my_file.id) ) {
          $('#' + file.id + " .hidden-val").val(my_file.id);
          $('#rotate_' + file.id).val("0");
          showImagePreview(file);
        }
      },

      UploadComplete: function(up, files) {
        busy=false;
        if( formSubmitRequest ){
          $('#submitAnad').submit();
        }
      }
    }
  });
  uploader.bind('Init', function(up, params) {
    if($('#simple_uploader').length > 0){
      $('#simple_uploader').remove();
    }
    $('#plupload_uploader').show();
  });

  uploader.init();

      function showImagePreview( file ) {
          var image = $( new Image() );
          var preloader = new mOxie.Image();
          preloader.onload = function() {
              preloader.downsize( 300, 300 );
              image.prop( "src", preloader.getAsDataURL() );
              $('#' + file.id + ' #img_' + file.id).attr('src', preloader.getAsDataURL());
          };
          preloader.load( file.getSource() );
      }

  });
  $(document).ready(function() {
  uploaded_pictures_array = [];
  scraped_pictures =  [];
  if(uploader && uploader!=null && uploader.runtime != ''){
    if($('#simple_uploader').length > 0){
      $('#simple_uploader').hide();
    }
    $('#plupload_uploader').show();
  }
  else{
    if($('#simple_uploader').length > 0){
      $('#plupload_uploader').hide();
      $('#simple_uploader').show();
    }
  }

  $("#submit_form").click(function() {
    if( busy ) {
      formSubmitRequest = true;
      alert('Waiting for images to be uploaded');
      return false;
    }
    if($("#submitAnad").parsley().isValid('',false) == true)
      formSubmitRequest = true;     
  });

  $("#submitAnad").submit(function() {
    // disable submit button to avoid duplicate ads.
    $("#submit_form").attr('disabled', 'disabled');
    
    $(upload_id).val('');
    var cnt = uploaded_pictures_array.length;
    $('.filelist_container .hidden-val').map(function() {
      if ($(this).nextAll('.rotate-hidden').length == 1 && $(this).nextAll('.rotate-hidden').val().length > 1)
        uploaded_pictures_array[cnt] = $(this).val() + "." + $(this).nextAll('.rotate-hidden').val();
      else
        uploaded_pictures_array[cnt] = $(this).val();
      cnt++;
    });
    $(upload_id).val(uploaded_pictures_array.join("|"));
  });

  $("#filelist").disableSelection();
  $("#filelist").sortable({
    placeholder: "filelist-sortable-container",
    axis: true,
    exclude: '#add-files',
    cancel: "#add-files",
    opacity: 0.7
  });

  });

  function generate_filelist_container_field(file) {
    return '<div class="filelist_container" id="' + file.id + '"><div class="image_container"><img id="img_'+ file.id +'" src="/assets/ajax-loader.gif" style="max-width: 80px; max-height: 60px;" /></div><input type="hidden" class="hidden-val" /><input type="hidden" class="rotate-hidden" id="rotate_'+ file.id +'"/>' +
      '<a href="javascript:" onclick="if (confirm(\'Are you sure you want to remove this picture?\')) {uploader.removeFile('+file.id+');}"><img src="/assets/cancel_uploadify.png" border="0"></a>\n\
              <a href="javascript:" onclick="rotate_image(\''+ file.id +'\','+1+')" class="rotate" style="right: 8px;"><i class="fa fa-repeat"></i></a>' +
      '<a href="javascript:" onclick="rotate_image(\''+ file.id +'\','+0+')" class="rotate" style="left: 8px;"><i class="fa fa-undo"></i></a>' +
      '<div class="cb"></div><span></span></div>';
  }
  function rotate_image(fileId,rotate_direction) {
    if ($("#rotate_"+fileId).val().length == 0)
      $("#rotate_"+fileId).val("0");
    var rotate =  parseInt($("#rotate_"+fileId).val());
    if (rotate_direction == 0)
      rotate = rotate - 90;
    else
      rotate = rotate + 90;
    $("#img_"+fileId).css("transform","rotate("+rotate+"deg)");
    $("#img_"+fileId).css("-ms-transform","rotate("+rotate+"deg)");
    $("#img_"+fileId).css("-webkit-transform","rotate("+rotate+"deg)");
    $("#rotate_"+fileId).val(rotate);
  }
  </script>
  <script>
    function getcurrentvalue()
    {
        var select_user_value = $("#user_value").val();
        var user_value_updated = $("#user_id").val(select_user_value);
        return user_value_updated;
    }


    $(document).ready(exteriorColorChange);
    $(document).ready(function() {
      window.ParsleyConfig = { excluded:  'input:hidden:not(.apply-parsley),input[type=button], input[type=submit], input[type=reset]' };
      $('#grouped_versions').on('change',function(){
        var value = $(this).val();
        clearAutoFilledValues();
        if ( value ) {
          var v_arr = value.split(',');
          $('#used_car_car_version_id').val(v_arr[0]);
          $('#used_car_car_model_generation_id').val(v_arr[1] ? v_arr[1] : '');
          $('#used_car_car_version_id').trigger('change');
        }
      });

      if($('#used_car_car_model_id').val()!='') {
        updateGroupedVersions($('#used_car_car_model_id').val(), $('#used_car_model_year').val(), $('#grouped_versions'), 'Version','#used_car_car_version_id','#used_car_car_model_generation_id')
        $('#aditional-information').show();
      }
        gaInitErrorEventsFor('UsedCars');

      $('#used_car_car_model_id').on('change', function(){
        $('.ajax-search-loader').show();
        setTimeout(function() { $(".ajax-search-loader").hide(); }, 500);
        $('#aditional-information').show();
      });
      $('#used_car_car_version_id').change(function(){
        var version_detail_path = 'get_version_details';
        version_detail_path = "/used_cars/get_version_details/" + $('#used_car_car_version_id').val()+ "?generation_id="+$('#used_car_car_model_generation_id').val();
        if ($('#used_car_car_version_id').val() != "" && $('#used_car_car_model_generation_id').val() != "") {
              setUsedCarFieldsFromVersion(version_detail_path, true);
        }
      });
      $('#mileage_mi').unbind('click');
    });
  </script>

  <script>
    var ids_to_check=["used_car_exterior_color","used_car_car_manufacturer_id","used_car_car_model_id","used_car_model_year","used_car_car_version_id","used_car_ad_listing_attributes_phone"];
    add_event_for_duplicate_check(ids_to_check);
    allow_make_model_change=true;

    $(function(){
      $('#mileage_text').on('keyup focusout',function(){
        updateAmountInWords('#mileage_text', '.car_mileage', '.mileage');
      });
    })

    $(function(){
        var city_ele = '#used_car_ad_listing_attributes_city_id', model_ele = '#used_car_car_model_id',
                year_ele = '#used_car_model_year', make_ele = '#used_car_car_manufacturer_id';
        $([city_ele,model_ele,year_ele].join(',')).on('change',function () {
            var city_text = $(city_ele + ' option:selected').text(), city_val = $(city_ele + ' option:selected').val(),
                    make_id = $(make_ele).val(), model_id = $(model_ele).val(), year = $(year_ele).val();
            if ( make_id == '' ) return

            if ( city_val && (make_id || model_id) && year )
              $('.sell-car-package').show();

            var make_obj = get_vehicle_make_obj('car',make_id)

            if ( make_obj.carsure_enabled && make_obj.models[model_id].carsure_enabled &&
                    ["Lahore", "Karachi", "Islamabad", "Rawalpindi", "Abottabad", "Faisalabad", "Hyderabad"].indexOf(city_text) >= 0 && year >= 1992 ){
                $('.center-align-package').hide();
                $('.show_individual_case').removeClass('hide').show();
            }
            else
            {
              ($('.show_individual_case').find('input[checked]')).attr('checked', false);
              $('.show_individual_case').hide();
              $('.center-align-package').show();
              $('#request_carsure').attr('checked', false);
            }
        });
    });
    function clearAutoFilledValues(){
        $('#engine_details').find('input:not([type=radio]), select').val('');
        $('#engine_details').find('input[type=radio]').prop('checked',false);
        $('#feature_lists').find('input, checkbox').prop('checked',false);
    }

    function toggleImportedCarFields(){
      if($('#used_car_assembly').val() == "Imported")
        $('#imported-car-fields').show();
      else{
        $('#imported-car-fields').hide();
      }
    }

    // load js or jquery code based on a/b test 
    $(document).ready(function(){
        $('#used_car_model_year').change(function(){
          if($(this).val()){$("#car_selector").siblings('.parsley-errors-list').html('');}
        });
        $('#get-car-name').on('hidden.bs.modal',function(){
          
          if($("#used_car_car_manufacturer_id").val() && $("#used_car_car_model_id").val() ){
            $("#car_selector").siblings(".parsley-errors-list").first().html('');
          }
          if($("#used_car_car_manufacturer_id").val() && $("#used_car_car_model_id").val()==""){
            $("#car_selector").siblings(".parsley-errors-list").first().html('<li class="parsley-custom-error-message">'+ 'please select car model'+ '</li>');
          }
        });
        $.listen('parsley:form:validated', function(obj){
          if($("#used_car_car_manufacturer_id").val()=="" && $("#used_car_car_model_id").val()==""){
            if($('#car_selector').parsley().destroy){
              $('#car_selector').parsley().destroy()
            }
            $("#car_selector").siblings(".parsley-errors-list").first().html('<li class="parsley-custom-error-message">'+ 'please select car info'+ '</li>');
            $(".car-select-parent").addClass('input-failure');
          }
          if($("#used_car_car_manufacturer_id").val() && $("#used_car_car_model_id").val() ){
            $("#car_selector").siblings(".parsley-errors-list").first().html('');
          }
          if($("#used_car_car_manufacturer_id").val() && $("#used_car_car_model_id").val()==""){
            $("#car_selector").siblings(".parsley-errors-list").first().html('<li class="parsley-custom-error-message">'+ 'please select car model'+ '</li>');
          }
        });

        $('#used_car_assembly').on("change", function(){ toggleImportedCarFields(); })

      
        validate_prefilled_values();

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


  

    <script>var om_load_jquery = false;</script>
    <div id="om-dxawge5rc65nrwtv-holder"></div>

  
    <script>
      $(document).ready(function(){
        $('form [data-parsley-required="true"]:not(:hidden),form #aditional-information select:hidden,form #aditional-information #used_car_engine_capacity,form #grouped_versions,form .chzn-container').after('<i class="fa fa-check-circle input-success-icon generic-green"></i><i class="fa fa-exclamation-circle input-failure-icon generic-red"></i>');
      });
    </script>
        


@endsection