@extends('websiteSellFormView')

@section('title')
Used Bikes in Pakistan - Buy and Sell Second Hand Bikes | Key2Cars
@endsection



@section('cssblock')
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
<!--link rel="stylesheet" href="../../assets/css/ribbo/css/custom.css'n.css"-->
<link rel="stylesheet" href="{{URL::asset('assets/css/iconfont.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/bootsnav.css')}}">

<link rel="stylesheet" href="{{URL::asset('assets/car/css/select2.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/car/css/AdminLTE.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/car/css/upload-files.css')}}">




<link href="{{URL::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!--script src="js/top_javascript-4c1cf070410b188168ccc1759df8f669.js" type="text/javascript"></script-->

  

<!-- jQuery 2.2.3 -->
<script src="{{URL ::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL ::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL ::asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
@endsection


@section('content')

<div class="container">

        <div class=" col-xs-12 ad-padding ">
        <h1 class="">Sell Your Bike</h1>
        <p class="">It's Easy...It's Simple.. & Yes It's FREE</p>
        </div>
        <div class="clearfix"></div>
<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

         <div class="row p-top-40">   
        <div class="col-md-10 ">
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading tab-heading" style="border-color: #ffffff; padding-bottom:0">
                            <ul class="nav nav-tabs">
                                <li id="l1" class="active"><a class="tab" href="#tab1primary" data-toggle="tab">Bike Information</a></li>
                                <li id="l2"><a class="tab" href="#tab2primary" data-toggle="tab">Additional Information</a></li>
                                <li id="l3"><a class="tab" href="#tab3primary" data-toggle="tab">Pictures</a></li>
                                <li id="l4" ><a class="tab" href="#tab4primary" data-toggle="tab">Contact Informaton</a></li>
                            </ul>
                    </div>
                    
                     <form   id="form"   enctype = "multipart/form-data" autocomplete="off" >
             {{ csrf_field() }}
            <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>
             
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1primary">
                          
                  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <select name="city" id="city" data-placeholder="City" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                @foreach($city as $c)
                  
                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endforeach
                </select>
              </div>
             
              <div class="form-group">
                <label>City Area</label>
                <select name="city_area" id="city_area" data-placeholder="City Area" class="form-control select2" style="width: 100%;">
                  <option selected="selected"></option>
                  
                </select>
              </div>
              
              
              <div class="form-group">
                <label>Model Year</label>

                <select name="year" id="year" data-placeholder="Year" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($year as $y)
                  
                  <option value="{{$y->id}}">{{$y->year}}</option>
                  @endforeach
                  
                </select>
              </div>
              

              <div class="form-group">
                <label>Manufacturer</label>

                <select name="make" id="make" data-placeholder="Manufacturer" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                 @foreach($make as $m)
                  
                  <option value="{{$m->brand_id}}">{{$m->brand}}</option>
                  @endforeach
                
             
                </select>
              </div>

                <div class="form-group">
                <label>Model</label>
                <select name="model" id="model" data-placeholder="Model" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" value=""></option>
                
                </select>
              </div>

               
              
              
            </div>
           
           
            <div class="col-md-6">
            <div class="form-group">
                <label>Registration City</label>
                <select name="reg_city" id="reg_city" data-placeholder="City" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                @foreach($reg_city as $r)
                  
                  <option value="{{$r->id}}">{{$r->title}}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                  <label>Mileage (km)</label>
                  <input type="numeric" name="mileage" min="1" class="form-control" >
                </div> 
              
              <div class="form-group">
                  <label>Price (Rs)</label>
                  <input type="number" name="price" min="1"   class="form-control" >
                </div>
                
                
                <div class="form-group">
                  <label>Ad Description</label>
                  <textarea class="form-control" name="description" rows="4" placeholder="Describe your car..."></textarea>
                </div>
              
              
            </div>
            
            
          </div>
          
          
      <div class="clearfix"></div>
      <a class="btn btn-primary pull-right" onclick="document.getElementById('l2').classList.add('active');document.getElementById('l1').classList.remove('active'); return false;" href="#tab2primary" data-toggle="tab">Next <i class="fa fa-chevron-right"></i></a>
                            </div>
                            
                            <div class="tab-pane fade" id="tab2primary" style='min-height:400px;'>
                            
                   <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Engine Type</label>
                <select name="engine_type" data-placeholder="Engine Type" class="form-control select2"  style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                   @foreach($engine_type as $e_t)
                  <option value="{{$e_t->id}}">{{$e_t->title}}</option>
                  @endforeach
                </select>
              </div>
              

             
            </div>
            
            <div class="col-md-6">
               <div class="box-header">
              <h3 class="box-title"><strong>Features</strong></h3>
            </div>
              
                 <?php $count=0;$cl=true;?>
               @foreach($feature as $f)

               
               @if($count%3==0)
                <div class="form-group">
                   <div class="row">
                       <?php $cl=false;?>
                  @endif
                   <div class="col-md-4">
                        
                  <input type="checkbox" style="cursor: pointer" id="feature" name="feature[]" class="flat-green" value="{{$f->id}}">&emsp;<strong>{{$f->title}}</strong>
                
                       </div>
                       @if(($count+1)%3==0&&$count!=0)
                        </div>
              </div>
               <?php $cl=true;?>
              @endif
              <?php $count++;?>
              @endforeach
             
             @if($cl==false)
             </div>
              </div>
              @endif
              
                            </div>
                        </div>

                    
                       
              <div class="clearfix"></div>
            <a class="pull-left btn btn-default" onclick="document.getElementById('l1').classList.add('active');document.getElementById('l2').classList.remove('active'); return false;" style='margin-top: 287px;' href="#tab1primary" data-toggle="tab"><i class="fa fa-chevron-left"></i> Previous </i></a>
            <a class="btn btn-primary pull-right" onclick="document.getElementById('l3').classList.add('active');document.getElementById('l2').classList.remove('active'); return false;" style='margin-top: 287px;' href="#tab3primary" data-toggle="tab">Next <i class="fa fa-chevron-right"></i></a>    
              
              
            </div>
            
            
          
                            
                            <div class="tab-pane fade" id="tab3primary">
                            <div class="tab-pane active" id="tab_3" style="padding: 50px;min-height:400px">
                      <div class="">
             <div class="col-lg-12">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button" style="margin-bottom:8px;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Thumbnail</span>
                    <input type="file" name="file" id="file">
                </span>
                
                <span class="btn btn-primary fileinput-button" style="margin-bottom:8px;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Images</span>
                    <input type="file" name="img[]" id="img" multiple>
                </span>
                <span class="btn btn-primary fileinput-button" style="margin-bottom:8px;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Video(optional)</span>
                    <input type="file" name="video" id="video">
                </span>
                
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            </div>
                  </div>
                  
                  <div class="clearfix"></div>
           <a class="pull-left btn btn-default" onclick="document.getElementById('l2').classList.add('active');document.getElementById('l3').classList.remove('active'); return false;" href="#tab2primary" data-toggle="tab"><i class="fa fa-chevron-left"></i> Previous </i></a>
          <a class="pull-right btn btn-primary" onclick="document.getElementById('l4').classList.add('active');document.getElementById('l3').classList.remove('active'); return false;" href="#tab4primary" data-toggle="tab">Next <i class="fa fa-chevron-right"></i></a>
                            </div>
                            
                            <div class="tab-pane fade" id="tab4primary">
                            <div class="tab-pane active" id="tab_4">
                  		<div class="">
            <div class="col-md-6">
            <div class="form-group">
                <label>Seller Name</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" name="name" class="form-control" >
                </div>
                
                
              </div>  
                
                <div class="form-group">
                <label>Email</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="email" name="email" id="email" class="form-control" >
                </div>
                
                
              </div>  
               
               
              <div class="form-group">
                <label>Mobile Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="numeric" maxlength="11" name="number" class="form-control" >
                </div><br>
                
               
               
              </div> 
            </div>
            
                                </form>
          </div>   
                     <div class="clear"></div>
                     <div class="col-xs-12 row" style="margin-bottom:10px">
                         <input type="hidden" name="code" id="code">
                         <input type="hidden" name="id" id="id">
                         <input type="button" value="Submit" class="upload btn btn-primary btn-lg ">
                        <!-- <button   class="btn btn-primary btn-lg " onclick="submitForm()" type="submit" >Submit</button>
                        -->
                    </div>
                </div>
                <div class="clearfix"></div>
        <a class="pull-Left btn btn-default" onclick="document.getElementById('l3').classList.add('active');document.getElementById('l4').classList.remove('active'); return false;" href="#tab3primary" data-toggle="tab"><i class="fa fa-chevron-left"></i> Previous </a>
                            </div>
                            
                            <div class="">
            <div class="col-md-6">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
                        </div>
                        </div>
         
          
          
        
         
                 
              
                            </div>
                        
                        
                    </div> 
                    
        <div class="col-md-2 hidden-xs">
            <a href="#"><img class="img-responsive" src="{{URL::asset('assets/car/images/bikead1.png')}}" alt=""/></a><br>
<a href="#"><img class="img-responsive" src="{{URL::asset('assets/car/images/bikead2.png')}}" alt=""/></a><br>
<a href="#"><img class="img-responsive" src="{{URL::asset('assets/car/images/bikead3.png')}}" alt=""/></a>
            </div>
                             </div>
                             
 
                             
       
            <div class="clear"></div>
      
<br>       
<div class="container " >
        <div class="col-xs-12" style="padding:15px 0; background:#FFFFFF; margin-bottom:30px">
        <div class="col-sm-6 pull-left">
        <h2>Ad Publishing Policy</h2><hr><br>
        <ul>
        <li><i class="fa fa-hand-o-right"></i> We don't allow duplicates of same ad.</li>
        <li><i class="fa fa-hand-o-right"></i> We don't allow Non custom vehicle ads</li>
        <li><i class="fa fa-hand-o-right"></i> We don't allow promotional messages that are not relevant to the ad</li>
        <li><i class="fa fa-hand-o-right"></i> We don't allow ads of Bank leased vehicles at below market price</li>
        </ul>
        </div>
        <div class="col-sm-6"><img class="img-responsive" src="{{URL::asset('assets/car/images/policy.jpg')}}" alt=""/><br>
        </div>
        </div>
        
        </div>
        
</div>

@endsection


@section('jsblock')
<script>

    
/////////Area Dropdown update

    $('#city').change(function() {
        var data = { 'city': $(this).val() };
       
        

        $.get('/getAreaByCity', data, function (data) {
           var model = $('#city_area');
                    model.empty();
                    
                    //  model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
  
});





    $('#make').change(function() {
        var data = { 'make': $(this).val() };
       
        $.get('/getBikeModelByManufacture', data, function (data) {
           var model = $('#model');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + '' + "</option>");
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });


        


/////////////SUBMIT FORM/////////////////////////

$(document).ready(function () { 
        $('body').on('click', '.upload', function(){
            
            $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
     
    
    var data = new FormData($('#form')[0]);
    $.ajax({
            url:'/insertBike',
            type:'POST',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:data,
            success:function(data){
                console.log(data);
               if($.isEmptyObject(data.error)){
                   document.getElementById("id").value=data.id;
                   document.getElementById("code").value=data.code;
                   sendCode(0);
                   
                   $('#myModal').modal({backdrop: 'static', keyboard: false});  
	                }else{
	           printErrorMsg(data.error);
                                
	                }
            }
        });
        
    });
    }); 
    
   function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
                      //  $('.print-error-msg').delay(3000).fadeOut();
		}
                
                
    function sendCode(flag)
    {
        if(flag==1){
          swal("Successfully Code Send!");
                    }
        var id=$("#id").val();
        data={'id':id};
        $.get('/sendVerificationCode', data, function (data) {
                       
                    
                });
       
    }
    
    function validateCode()
    {
        var code=$("#code").val();
        var v_code=$("#v_code").val();
        if(code==v_code)
        {
            $("#myModal").modal('hide');
            swal ( "Congratulation" ,  "Your Ad Successfully Submitted!" ,  "success" );
            verifiedAd();
            window.location = "{{ url('/') }}";
        }
        else
        {
           // $("#myModal").modal('hide');
             swal ( "Oops" ,  "Wrong Code!" ,  "error" );
             //$("#myModal").modal();
        }
        
    }
    function verifiedAd()
    {
       
        var data={'id':$("#id").val()};
        $.ajax({
            url:'/verifiedAd',
            type:'GET',
            data:data,
            success:function(data){
               
            }
        });
        
    }
</script>



 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title" style="text-align:center;">Number Verification Proccess</h2>
        </div>
        <div class="modal-body">
          <p>Enter the Verification Code you received on your mobile phone. </p>
          <input type="text" class="form-control" style="width:200px" name="v_code" id="v_code"/>
          Have'nt received yet?<strong> <a href="javascript:sendCode(1);" style="color:blue;">RESEND</a></strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="validateCode()">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection
