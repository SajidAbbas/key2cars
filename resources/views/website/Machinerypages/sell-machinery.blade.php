@extends('websiteMasterView')

@section('title')
Used Cars in Pakistan - Buy and Sell Second Hand Cars  | Key2Cars
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

<style>
    .upload-image-preview img{
    width: 200px;
    height:  200px;
}
</style>


<link href="{{URL::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!--script src="js/top_javascript-4c1cf070410b188168ccc1759df8f669.js" type="text/javascript"></script-->

<!-- jQuery 2.2.3 -->
<script src="{{URL ::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL ::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!--script src="{{URL::asset('assets/car/js/index_used_cars.js')}}" type="text/javascript"></script-->

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
 <section class="content" >
       <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom" style="height: 550px; padding-left: 10px; padding-bottom: 10px">
          
               <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>
           
             
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><strong> Car Information</strong></a></li>
              <li><a href="#tab_2" data-toggle="tab"><strong> Additional Information</strong></a></li>
              <li><a href="#tab_3" data-toggle="tab"><strong> Pictures</strong></a></li>
              <li><a href="#tab_4" data-toggle="tab"><strong> Contact Informaton</strong></a></li>    
            </ul>
           
                <form   id="form"   enctype = "multipart/form-data" autocomplete="off" >
             {{ csrf_field() }}
            
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="tab-content">
             

              <div class="tab-pane active" id="tab_1">
                  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <select name="city" id="city" data-placeholder="City" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value="" required></option>
                @foreach($city as $c)
                  
                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endforeach
                </select>
              </div>
             <!-- <div>  
            <div id="ddlSocial"></div>  
        </div>  -->
              <!-- /.form-group -->
              <div class="form-group">
                <label>City Area</label>
                <select name="city_area" id="city_area" data-placeholder="City Area"  class="form-control chzn-select" style="width: 100%;">
                  <option selected="selected"></option>
                  
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Model Year</label>

                <select  name="year" id="year" data-placeholder="Year" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($year as $y)
                  
                  <option value="{{$y->id}}">{{$y->year}}</option>
                  @endforeach
                  
                </select>
              </div>
              <!-- text input -->
               

              <div class="form-group">
                <label>Manufacturer</label>

                <select  name="make" id="make" data-placeholder="Manufacturer" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                @foreach($make as $m)
                  
                  <option value="{{$m->id}}">{{$m->title}}</option>
                  @endforeach
             
                </select>
              </div>

                <div class="form-group">
                <label>Model</label>
                <select  name="model" id="model" data-placeholder="Model" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" value=""></option>
                
                </select>
              </div>

               <div class="form-group">
                <label>Model Version</label>
                <select name="model_version" id="model_version" data-placeholder="Model Version" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" value=""></option>
                
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Registration City</label>
                <select  name="reg_city" id="reg_city" data-placeholder="City" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                @foreach($reg_city as $r)
                  
                  <option value="{{$r->id}}">{{$r->title}}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                  <label>Mileage (km)</label>
                  <input type="number" name="mileage" class="form-control" >
                </div> 
              
                <div class="form-group">
                  <label>Seats</label>
                  <input type="number" name="seat" class="form-control" >
                </div> 
                
              <div class="form-group">
                  <label>Price (Rs)</label>
                  <input  type="number" id="price" name="price"  class="form-control" >
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Ad Description</label>
                  <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe your car..."></textarea>
                </div>
                
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                   <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Engine Type</label>
                <select name="engine_type" id="engine_type" data-placeholder="Engine Type" class="form-control select2"  style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                   @foreach($engine_type as $e_t)
                  <option value="{{$e_t->id}}">{{$e_t->title}}</option>
                  @endforeach
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Engine Capacity</label>
                <input name="engine_capacity" id="engine_capacity" type="number" class="form-control" >
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Transmission</label>
                <select name="transmission" id="transmission" class="form-control select2" data-placeholder="Transmission" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($transmission as $t)
                   <option value="{{$t->id}}">{{$t->title}}</option>
                  @endforeach
                </select>
              </div> 
                <div class="form-group">
                <label>Assembly</label>
                <select name="assembly" id="assembly" class="form-control select2" data-placeholder="Assembly" style="width: 100%;">
                   <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($assembly as $a)
                   <option value="{{$a->id}}">{{$a->title}}</option>
                  @endforeach
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
               <div class="box-header">
              <h3 class="box-title"><strong>Features</strong></h3>
            </div>
              
               <?php $count=0;?>
               @foreach($feature as $f)

               
               @if($count%3==0)
                <div class="form-group">
                   <div class="row">
                  @endif
                   <div class="col-md-4">
                        
                  <input type="checkbox" id="feature" name="feature[]" class="flat-green" value="{{$f->id}}">&emsp;<strong>{{$f->title}}</strong>
                
                       </div>
                       @if($count%2==0&&$count!=0)
                        </div>
              </div>
              @endif
              <?php $count++;?>
              @endforeach
             
             @if((($count-1)%2!=0)||(($count-1)==0))
             </div>
              </div>
              @endif

                       
                       
                  
              <!-- /.form-group -->
               
              
              
             
               
              <!-- /.form-group -->
              <div class="form-group">
                 <div class="box-header">
              <h3 class="box-title"><strong>Reviews</strong></h3>
            </div>
                  <textarea class="form-control" id="review" name="review" rows="4" placeholder="Rate your car..."></textarea>
                </div>
            </div>
               
              
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <br>

         
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3" style="padding: 50px;">
                  <div class="row">
             <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Thumbnail</span>
                    <div class="upload-image">
                     <div class="upload-image-preview"></div>
                   <input  type="file" name="file" id="file">
                   
                    </div>
                </span>
                
                <span class="btn btn-primary fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Images</span>
                    <input type="file" name="img[]" id="img" multiple>
                </span>
                
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            </div>
              </div>
              <!-- /.tab-pane -->
             <div class="tab-pane" id="tab_4">
              <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Seller Name</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                    <input required type="text" name="name" class="form-control" >
                </div>
                <!-- /.input group -->
              </div>  
                
                <div class="form-group">
                <label>Email</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="email" name="email" class="form-control" >
                </div>
                <!-- /.input group -->
              </div>  
                <!-- phone mask -->
              <div class="form-group">
                <label>Mobile Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                    <input required type="text" name="number" class="form-control" >
                </div><br>
                
                <!-- /.input group -->
              </div> 
            </div>
            <!-- /.col -->
          </div>      
                 <div >
                    <input type="hidden" name="code" id="code">
                     <input type="hidden" name="id" id="id">
                     <input type="button" value="Submit" class="upload btn btn-primary btn-lg " />
                    
                </div>
            </div>
              </div>
              <!-- /.tab-pane -->  
            
         </form>

            <!-- /.tab-content -->
          
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        
        <div class="row">
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
     </section>
  
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




////////Model Dropdown Update/////


    $('#make').change(function() {
        var data = { 'make': $('#make').val(),'vehicle_id':3 };
       
        $.get('/getModelByManufacture', data, function (data) {
           var model = $('#model');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + '' + "</option>");
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });


////////Model_Version Dropdown Update/////


    $('#model').change(function() {
        var data = { 'model': $(this).val() };
        

        $.get('/getModelVersionByModel', data, function (data) {
           var model = $('#model_version');
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
            url:'/insertMachinery',
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
                        $('.print-error-msg').delay(3000).fadeOut();
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
