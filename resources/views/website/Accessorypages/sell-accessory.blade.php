@extends('websiteSellFormView')

@section('title')
Accessories in Pakistan - Buy and Sell Second Hand Accessories | Key2Cars
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

        <div class=" col-xs-12 ad-padding">
        <h1 class="">Sell Your Accessories</h1>
        <p class="">It's Easy...It's Simple.. & Yes It's FREE</p>
        </div>
        <div class="clearfix"></div>
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
  
         <div class="row p-top-40">   
        <div class="col-md-10">
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading" style="border-color: #ffffff; padding-bottom:0">
                            <ul class="nav nav-tabs">
                                <li id="l1" class="active"><a class="tab" href="#tab1primary" data-toggle="tab">Accessory Information</a></li>
                                <li id="l2"><a class="tab" href="#tab3primary" data-toggle="tab">Pictures</a></li>
                                <li id="l3"><a class="tab" href="#tab4primary" data-toggle="tab">Contact Informaton</a></li>
                            </ul>
                    </div>
                    
                     <form   id="form"   enctype = "multipart/form-data" autocomplete="off" >
             {{ csrf_field() }}
            
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1primary">
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
             
             
              <div class="form-group">
                <label>City Area</label>
                <select name="city_area" id="city_area" data-placeholder="City Area" class="form-control select2" style="width: 100%;">
                  <option selected="selected"></option>
                  
                </select>
              </div>
              
              
              <div class="form-group">
                <label>Category</label>

                <select name="category" id="category" data-placeholder="Category" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($category as $c)
                  
                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endforeach
                  
                </select>
              </div>
              

            

                <div class="form-group">
                <label>Sub Category</label>
                <select name="sub_category" id="sub_category" data-placeholder="Sub Category" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" value=""></option>
                
                </select>
              </div>

               
              
              
            </div>

            <div class="col-md-6">
            
              <div class="form-group">
                  <label>Price (Rs)</label>
                  <input type="number" name="price" min="1"  class="form-control" >
                </div>
                
                 <div class="form-group">
                <label>Condition</label>

                <select name="condition" id="condition" data-placeholder="Condition" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                 
                  <option value="new">New</option>
                  <option value="used">Used</option>
                  
                </select>
              </div>
                
                
                
                <div class="form-group">
                  <label>Ad Description</label>
                  <textarea class="form-control" name="description" rows="4" placeholder="Describe your car..."></textarea>
                </div>
                
               
             
             
            </div>
            
            
          </div>
          
          <div class="clearfix"></div>
      <a class="btn btn-primary pull-right" onclick="document.getElementById('l2').classList.add('active');document.getElementById('l1').classList.remove('active'); return false;" href="#tab3primary" data-toggle="tab">Next <i class="fa fa-chevron-right"></i></a>
                            </div>
                            
                            <div class="tab-pane fade" id="tab3primary">
                            <div class="tab-pane active" id="tab_3" style="padding: 50px;min-height: 400px">
                       <div class="row">
             <div class="col-lg-7">
               
               
                <span class="btn btn-success fileinput-button"  style="margin-bottom:8px;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Thumbnail</span>
                    <input type="file" name="file" id="file">
                </span>
                
                <span class="btn btn-primary fileinput-button"  style="margin-bottom:8px;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Images</span>
                    <input type="file" name="img[]" id="img" multiple>
                </span>
                
                <span class="btn btn-primary fileinput-button" style="margin-bottom:8px;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Video(optional)</span>
                    <input type="file" name="video" id="video">
                </span>
                
                
                
                <span class="fileupload-process"></span>
            </div>
            </div>
            
                  </div>
                  <div class="clearfix"></div>
           <a class="pull-left btn btn-default" onclick="document.getElementById('l1').classList.add('active');document.getElementById('l2').classList.remove('active'); return false;" href="#tab1primary" data-toggle="tab"><i class="fa fa-chevron-left"></i> Previous </i></a>
          <a class="pull-right btn btn-primary" onclick="document.getElementById('l3').classList.add('active');document.getElementById('l2').classList.remove('active'); return false;" href="#tab4primary" data-toggle="tab">Next <i class="fa fa-chevron-right"></i></a>
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
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <!-- /.input group -->
                  </div>  
                    
                    <div class="form-group">
                    <label>Email</label>
    
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                      <input type="email" name="email" id="email" class="form-control">
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
                        <input type="numeric" minlength="11" maxlength="11" id="number" name="number" class="form-control">
                    </div><br>
                    
                    <!-- /.input group -->
                  </div> 
                </div>
                      </form>
                <!-- /.col -->
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
        <a class="pull-Left btn btn-default" onclick="document.getElementById('l2').classList.add('active');document.getElementById('l3').classList.remove('active'); return false;" href="#tab3primary" data-toggle="tab"><i class="fa fa-chevron-left"></i> Previous </a>
                            </div>
                        </div>
                    </div>
                             </div>
                             </div>
                             
        <div class="col-md-2 hidden-xs">
            <a class="" style="padding:0" href="#"><img class="img-responsive" src="{{URL::asset('assets/car/images/ad1.jpg')}}" alt=""/></a>
            </div>
            </div><div class="clear"></div>
        </div>
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
        <div class="col-sm-6 "><img class="img-responsive" src="{{URL::asset('assets/car/images/policy.jpg')}}" alt=""/><br>
        </div>
        </div>
        
        </div>





@endsection


@section('jsblock')
<script>
 


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
            url:'/insertAccessory',
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
        $.get('/sendVerificationCodeAccessory', data, function (data) {
                       
                    
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
            url:'/verifiedAdAccessory',
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
