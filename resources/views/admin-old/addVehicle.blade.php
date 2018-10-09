@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | ModelVersion</title>
@endsection

@section('cssblock')
@endsection


@section('username')
{{Auth::user()->name}}
@endsection

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Ads
</h1>
<div class="pull-right">
<button type="submit" name="save" onclick="submitForm()" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save 
</button>
<button type="submit" name="save-continue" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save and Continue Edit
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
          
             
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><strong> Car Information</strong></a></li>
              <li><a href="#tab_2" data-toggle="tab"><strong> Additional Information</strong></a></li>
              <li><a href="#tab_3" data-toggle="tab"><strong> Pictures</strong></a></li>
              <li><a href="#tab_4" data-toggle="tab"><strong> Contact Informaton</strong></a></li>    
            </ul>
            <form  method="post" id="form" action="{{ route('insertVehicle')}}"   enctype = "multipart/form-data" autocomplete="off">
             {{ csrf_field() }}
            <div class="tab-content">
             

              <div class="tab-pane active" id="tab_1">
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
                <label>Model Year</label>

                <select name="year" id="year" data-placeholder="Year" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($year as $y)
                  
                  <option value="{{$y->id}}">{{$y->year}}</option>
                  @endforeach
                  
                </select>
              </div>
              <!-- text input -->
               <div class="form-group">
                <label>Vehicle Type</label>

                <select name="type" id="type" data-placeholder="Vehicle Type" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($type as $t)
                  
                  <option value="{{$t->id}}">{{$t->title}}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <label>Manufacturer</label>

                <select name="make" id="make" data-placeholder="Manufacturer" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
             
                </select>
              </div>

                <div class="form-group">
                <label>Model</label>
                <select name="model" id="model" data-placeholder="Model" class="form-control select2" style="width: 100%;">
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
                <select name="reg_city" id="reg_city" data-placeholder="City" class="form-control select2" style="width: 100%;">
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
                <label>Exterior Color</label>
                <select name="color" class="form-control select2" data-placeholder="Exterior Color" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                

                @foreach($color as $c)

                  <option value="{{$c->id}}">{{$c->title}}</option>
                  
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label>Price (Rs)</label>
                  <input type="number" name="price"  class="form-control" >
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
              <div class="tab-pane" id="tab_2">
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
              <!-- /.form-group -->
              <div class="form-group">
                <label>Engine Capacity</label>
                <input name="engine_capacity" type="number" class="form-control" >
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Transmission</label>
                <select name="transmission" class="form-control select2" data-placeholder="Transmission" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                
                @foreach($transmission as $t)
                   <option value="{{$t->id}}">{{$t->title}}</option>
                  @endforeach
                </select>
              </div> 
                <div class="form-group">
                <label>Assembly</label>
                <select name="assembly" class="form-control select2" data-placeholder="Assembly" style="width: 100%;">
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
                        
                  <input type="checkbox" name="feature[]" class="flat-green" value="{{$f->id}}">&emsp;<strong>{{$f->title}}</strong>
                
                       </div>
                       @if($count%2==0&&$count!=0)
                        </div>
              </div>
              @endif
              <?php $count++;?>
              @endforeach
             
             @if(($count-1)%2!=0)
             </div>
              </div>
              @endif

                       
                       
                  
              <!-- /.form-group -->
               
              
              
             
               
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <br>

          <div class="form-group">
                <label class="col-xs-2"  >Condition(optional)</label>
                    <div class="col-sm-2">                       
                  <input type="checkbox"    id="checkbox"  >              
                       </div>
              </div> <br>    
          <!-- /.row -->
                  <div id="collapseTwo"  style="display:none;">
                    <div class="box-body">
                     @foreach($condition_detail as $con_detail)
                <div class="form-group col-md-3">

                <label class="col-xs-4 control-label"><?=str_replace('_', ' ',$con_detail->title)?></label>
                <div class="col-xs-7">
               
                <select class="form-control select2" name="{{$con_detail->title}}" style="width: 100%;">
                <option value="-1" selected="selected" disabled="disabled">NONE</option>
                 @foreach($condition_detail_value as $con_detail_val)   
                  <option  value="{{$con_detail_val->id}}">{{$con_detail_val->title}}</option>
                  @endforeach
                </select>
                </div>     
              </div>
              @endforeach
                         
                    </div>
                  </div> 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3" style="padding: 50px;">
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
             <div class="tab-pane" id="tab_4">
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
                <label>Mobile Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="number" class="form-control" >
                </div>
                <!-- /.input group -->
              </div> 
            </div>
            <!-- /.col -->
          </div>      
              </div>
              <!-- /.tab-pane -->  
           
            </div>
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

@endsection


@section('jsblock')

<script src="{{URL ::asset('js/ddslick.min.js')}}"></script>

<script>
function submitForm()
{
  
  $('#form').submit();
}
$('#checkbox').change(function(){
            if(this.checked){
    document.getElementById('collapseTwo').style.display='block';
            }
            else
            {
              document.getElementById('collapseTwo').style.display='none';

            }
        });
    
/////////Area Dropdown update
$(function() {
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
});


////////Manufacturer Dropdown Update/////

$(function() {
    $('#type').change(function() {
        var data = { 'type': $(this).val() };
        

        $.get('/getManufactureByType', data, function (data) {
           var model = $('#make');
                    model.empty();
                    
                      model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.brand + "</option>");
                    });
        });
    });
});


////////Model Dropdown Update/////

$(function() {
    $('#make').change(function() {
        var data = { 'make': $(this).val() };
        

        $.get('/getModelByManufacture', data, function (data) {
           var model = $('#model');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });
});

////////Model_Version Dropdown Update/////

$(function() {
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
});
/*
var url="{{asset('images/color/1.png')}}";

$(function () {  
            var ddlData = [  
            {  
                text: "Facebook",  
                value: 1,  
                description: "Facebook",  
                imageSrc: url  
            },  
            {  
                text: "Twitter",  
                value: 2,  
                description: "Twitter",  
                imageSrc: "Social/twitter.png"  
            },  
            {  
                text: "LinkedIn",  
                value: 3,  
                description: "LinkedIn",  
                imageSrc: "color/1.png"  
            },  
            {  
                text: "Google+",  
                value: 3,  
                description: "Google+",  
                imageSrc: "Social/GooglePlus2.jpg"  
            },  
            {  
                text: "c-SharpCorner",  
                value: 4,  
                description: "A Community For Professional",  
                imageSrc: "Social/cSharp.png"  
            }  
            ];  
            $('#ddlSocial').ddslick({  
                data: ddlData,  
                width: 300,  
                imagePosition: "left",  
                onSelected: function (selectedData) {  
                    //Write your logic on Selection index change.                      
                }  
            });  
        });  

*/
</script>

@endsection

