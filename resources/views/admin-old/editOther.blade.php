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
Update Ads
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
            @foreach($result as $r)
            <form  method="post" id="form" action="{{ route('updateOther')}}"   enctype = "multipart/form-data" autocomplete="off">
             {{ csrf_field() }}
            <div class="tab-content">
             <input type="hidden" name="id" value="{{$r->id}}">
             <input type="hidden" name="vehicle_id" value="{{$vehicle_id}}">

              <div class="tab-pane active" id="tab_1">
                  <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <select name="city" id="city"  class="form-control select2" style="width: 100%;">
                <option selected="selected"  value="{{$r->city_id}}">{{$r->city}}</option>
                @foreach($city as $c)
                  
                  @if($c->title!=$r->city)
                  
                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
             <!-- <div>  
            <div id="ddlSocial"></div>  
        </div>  -->
              <!-- /.form-group -->
              <div class="form-group">
                <label>City Area</label>
                <select name="city_area" id="city_area"  class="form-control select2" style="width: 100%;">
                  <option selected="selected"  value="{{$r->city_area_id}}">{{$r->city_area}}</option>
                  
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Model Year</label>

                <select name="year" id="year"  class="form-control select2" style="width: 100%;">
                <option selected="selected"   value="{{$r->model_year_id}}">{{$r->model_year}}</option>
                
                @foreach($year as $y)
                  @if($y->year!=$r->model_year)
                  <option value="{{$y->id}}">{{$y->year}}</option>
                  @endif
                  @endforeach
                  
                </select>
              </div>
             

              <div class="form-group">
                <label>Manufacturer</label>

                <select name="make" id="make"  class="form-control select2" style="width: 100%;">
                <option selected="selected"   value="{{$r->manufacture_id}}">{{$r->manufacture}}</option>
                
             
                </select>
              </div>

                <div class="form-group">
                <label>Model</label>
                <select name="model" id="model"  class="form-control select2" style="width: 100%;">
                  <option selected="selected"   value="{{$r->model_id}}">{{$r->model}}</option>
                
                </select>
              </div>

               <div class="form-group">
                <label>Model Version</label>
                <select name="model_version" id="model_version"  class="form-control select2" style="width: 100%;">
                  <option selected="selected"   value="{{$r->model_version_id}}">{{$r->model_version}}</option>
                
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Registration City</label>
                <select name="reg_city" id="reg_city"  class="form-control select2" style="width: 100%;">
                <option selected="selected"   value="{{$r->reg_city_id}}">{{$r->reg_city}}</option>
                @foreach($reg_city as $r_c)
                  @if($r_c->title!=$r->reg_city)
                  
                  <option value="{{$r_c->id}}">{{$r_c->title}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                  <label>Mileage (km)</label>
                  <input type="number" name="mileage" class="form-control" value="{{$r->mileage}}">
                </div> 
               <div class="form-group">
                  <label>Seats </label>
                  <input type="number" name="seat" class="form-control" value="{{$r->seat}}">
                </div> 
              <div class="form-group">
                  <label>Price (Rs)</label>
                  <input type="number" name="price"  class="form-control" value="{{$r->price}}">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Ad Description</label>
                  <textarea class="form-control" name="description" rows="4" >{{$r->description}}</textarea>
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
                <select name="engine_type"  class="form-control select2"  style="width: 100%;">
                <option selected="selected"   value="{{$r->engine_id}}">{{$r->engine}}</option>
                
                   @foreach($engine_type as $e_t)
                   @if($e_t!=$r->engine)
                  <option value="{{$e_t->id}}">{{$e_t->title}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Engine Capacity</label>
                <input name="engine_capacity" type="number" class="form-control" value="{{$r->engine_capacity}}" >
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Transmission</label>
                <select name="transmission" class="form-control select2"  style="width: 100%;">
                <option selected="selected"   value="{{$r->transmission_id}}">{{$r->transmission}}</option>
                
                @foreach($transmission as $t)
                @if($t->title!=$r->transmission)
                   <option value="{{$t->id}}">{{$t->title}}</option>
                   @endif
                  @endforeach
                </select>
              </div> 
                <div class="form-group">
                <label>Assembly</label>
                <select name="assembly" class="form-control select2"  style="width: 100%;">
                   <option selected="selected"   value="{{$r->assembly_id}}">{{$r->assembly}}</option>
                
                @foreach($assembly as $a)
                @if($a->title!=$r->assembly)
                   <option value="{{$a->id}}">{{$a->title}}</option>
                   @endif
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
                   
                   @if(in_array($f->title,$feature_result))
                        <input type="checkbox" name="feature[]" class="flat-green" value="{{$f->id}}" checked="checked">&emsp;<strong>{{$f->title}}</strong>
                        @else
                  <input type="checkbox" name="feature[]" class="flat-green" value="{{$f->id}}">&emsp;<strong>{{$f->title}}</strong>
                  @endif
                
                       </div>
                       @if($count%2==0&&$count!=0)
                        </div>
              </div>
              @endif
              <?php $count++;?>
              @endforeach
             
             @if(($count-1)%2!=0||(($count-1)==0))
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


          




              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3" style="padding: 50px;">
                <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                    <?php $count=0;?>

                    @foreach($images_result as $img)

                      @if($count==0)
                      <img class="img-responsive" src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                    </div>
                    <!-- /.col -->
                    @elseif($count==1)
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                           </div>
                        <!-- /.col -->
                        @else
                        <div class="col-sm-6">
                          <img class="img-responsive" src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                         
                        </div>
                        @endif
                        <?php $count++;?>
                        @endforeach
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->




                       <br><br><br>
                       <div class="row">
             <div class="col-lg-7">
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Thumbnail</span>
                    <input type="fil</div>
                    </div>e" name="file" id="file">
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
                  <input type="text" name="name" class="form-control" value="{{$r->seller_name}}">
                </div>
                <!-- /.input group -->
              </div>  
                
                 <div class="form-group">
                <label>Email</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="email" class="form-control" value="{{$r->email}}">
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
                  <input type="text" name="number" class="form-control" value="{{$r->number}}">
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
             @endforeach
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




////////Model Dropdown Update/////

$(function() {
    $('#make').change(function() {
        var data = { 'make': $(this).val(),'vehicle_id':3 };
        

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

</script>

@endsection

