@extends('websiteSellFormView')

@section('title')
Post Hot Wheel| Key2Cars
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
    a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

a:hover {
    background-color: #ddd;
    color: black;
}

.previous {
    background-color: #f1f1f1;
    color: black;
}

.next {
    background-color: #4CAF50;
    color: white;
}

.round {
    border-radius: 50%;
}
    
</style>

<link href="{{URL::asset('assets/car/css/fonts-base64-woff-526e95592dcd6c550525b4d98d7d2546.css')}}" media="screen" rel="stylesheet" type="text/css" />
<!--script src="js/top_javascript-4c1cf070410b188168ccc1759df8f669.js" type="text/javascript"></script-->

  

<!-- jQuery 2.2.3 -->
<script src="{{URL ::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL ::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL ::asset('plugins/select2/select2.full.min.js') }}"></script>

<script src="{{URL::asset('assets/car/js/ajaxform.js')}}" type="text/javascript"></script>

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
 <section class="content">
     <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom" style="height:439px; padding-left: 10px; padding-bottom: 10px; padding-right:10px;">
          
             <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('assets/car/images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>
           
            <ul class="nav nav-tabs">
              <li class="active" ><a href="#tab_1" data-toggle="tab"><strong> Basic Information</strong></a></li>
              <li ><a href="#tab_2"  data-toggle="tab"><strong> Pictures</strong></a></li>
              <li ><a href="#tab_3"  data-toggle="tab"><strong> Contact Information</strong></a></li>    
            </ul>
           
              <form   id="form"  method="post" enctype = "multipart/form-data" autocomplete="off" >
             {{ csrf_field() }}
            
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="tab-content">

           

              <div class="tab-pane active" id="tab_1">
                  <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label>City</label>
                <select name="city" id="city" data-placeholder="City" class="form-control select2" >
                <option selected="selected" disabled="disabled" value=""></option>
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
                <select name="city_area" id="city_area" data-placeholder="City Area" class="form-control select2" style="width: 100%;">
                  <option selected="selected"></option>
                  
                </select>
              </div>
              
          
              <!-- /.form-group -->
               <div class="form-group">
                <label>Vehicle Type</label>

                <select name="type" id="type" data-placeholder="Type" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                  <option value="{{\App\VehicleType::Car}}">Car</option>
                  <option value="{{\App\VehicleType::Bike}}">Bike</option>
                  
                  
                </select>
              </div>
              
                  <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Manufacture</label>

                <select name="make" id="make" data-placeholder="Manufacture" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
               
                  
                </select>
              </div>
              
               <div class="form-group">
                <label>Model</label>

                <select name="model" id="model" data-placeholder="Model" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
               
                  
                </select>
              </div>

          
              
            
              
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Ad Description</label>
                  <textarea class="form-control" name="description" rows="4" placeholder="Describe your car..."></textarea>
                </div>
                
               
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
              </div>
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2" style="padding: 50px;">
                  <div class="row">
             <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Thumbnail</span>
                    <input type="file" name="file" id="file">
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
             <div class="tab-pane" id="tab_3">
              <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Seller Name</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" name="name" class="form-control" >
                </div>
                <!-- /.input group -->
              </div>  
                <!-- phone mask -->
           
                
                <div class="form-group">
                <label>Email</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" name="email" class="form-control" >
                </div><br>
              </div>
                   <div class="form-group">
                <label>Mobile Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="number" class="form-control" >
                </div>
              </div> 
                
                <div class="input-group">
                    <input type="hidden" name="code" id="code">
                     <input type="hidden" name="id" id="id">
                     <input type="button" value="Submit" class="upload btn btn-primary btn-lg " />
                    
                </div>
                <!-- /.input group -->
              
            </div>
            <!-- /.col -->
          </div>      
              </div>
              <!-- /.tab-pane -->  
            </form>
            </div>
            
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
  $(function () {
    $('#type').change(function () {
     
      var data = {'type': $(this).val()};
      $.get('/getMakeByType', data, function (data) {
        var model = $('#make');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Make' + "</option>");
        
        $.each(data, function (index, element) {
            
          model.append("<option value='" + element.brand_id + "'>" + element.brand + "</option>");
        });
      });
    });
  });
 
 
 $(function () {
    $('#make').change(function () {
     
      var data = {'make': $(this).val(),'type':$("#type").val()};
      $.get('/getModelByMakeHotWheel', data, function (data) {
        var model = $('#model');
        model.empty();
        model.append("<option value='' disabled selected>" + 'Car Model' + "</option>");
        
        $.each(data, function (index, element) {
           
          model.append("<option value='" + element.id + "'>" + element.title + "</option>");
        });
      });
    });
  });
  
  $(function() {
    $('#city').change(function() {
        var data = { 'city': $(this).val() };
        
        $.get('/getAreaByCity', data, function (data) {
           var model = $('#city_area');
                   model.empty();
                    
  
                   $.each(data, function(index, element) {
                     //alert(element.title);
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                        
                    });
                   
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
    console.log(data);
    $.ajax({
            url:'/insertHotWheel',
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
          swal("Verification code sent successfully.");
                    }
        var id=$("#id").val();
        data={'id':id};
        $.get('/sendVerificationCodeHotWheel', data, function (data) {
                       
                    
                });
       
    }
    
    function validateCode()
    {
        var code=$("#code").val();
        var v_code=$("#v_code").val();
        if(code==v_code)
        {
            $("#myModal").modal('hide');
           // swal ( "Congratulation" ,  "Your ad submit successfully." ,  "success" );
            verifiedAd();
            
            setTimeout(function(){
                swal({title:"Congratulation!",
                    text:"Your ad submit succesfully.",
                    type: "success"
                },function(){
                    window.location="{{url('/')}}";
                });
            },1000);
                        
            
          //  window.location = "{{ url('/') }}";
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
            url:'/verifiedAdHotWheel',
            type:'GET',
            data:data,
            success:function(data){
               
            }
        });
        
    }






$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });


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





    $('#category').change(function() {
        var data = { 'category': $(this).val() };
       
        $.get('/getSubCategoryByCategory', data, function (data) {
           var model = $('#sub_category');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + '' + "</option>");
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });


        
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
