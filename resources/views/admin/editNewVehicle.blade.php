@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)
@section('title')
<title>Admin | New Vehicle</title>
@endsection

@section('cssblock')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('username')
{{Auth::user()->name}}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
 New Vehicle
</h1>
<div class="pull-right">
<button type="submit" name="save"  onclick="submitForm()" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Update
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Add Area</a></li>   
            </ul>
            <div class="tab-content">
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
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-8">
                      
         <!-- Horizontal Form -->
            <!-- form start -->
            <form  method="post" id="form" action="{{ route('updateNewVehicle')}}"  enctype = "multipart/form-data" class="form-horizontal" autocomplete="off">
             {{ csrf_field() }}
              <div class="box-body">
                 
                  @foreach($data as $d)
                   <input type="hidden" name="id" value="{{$d->id}}">
                  <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label" >Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="title" id="title" value="{{$d->title}}" placeholder="Title">
                  </div>
                </div>
             <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" class="select2 form-control">
                   <option value="" selected disabled></option>
                   @foreach($type as $t)
                   @if($d->type_id==$t->id)
                   <option selected value="{{$t->id}}">{{$t->title}}</option>
                   @else
                   <option value="{{$t->id}}">{{$t->title}}</option>
                   @endif

                   @endforeach
                  </select>
                      </div>
                </div>
                  
                    <div class="form-group">
                  <label class="col-sm-2 control-label">Manufacture</label>
                    <div class="col-sm-10">
                  <select name="make" id="make" class="select2 form-control">
                   <option value="{{$d->make_id}}" selected >{{$d->make}}</option>
                  
                  </select>
                      </div>
                </div>
                  
                    <div class="form-group">
                  <label class="col-sm-2 control-label">Model</label>
                    <div class="col-sm-10">
                  <select name="model" id="model" class="select2 form-control">
                   <option value="{{$d->model_id}}" selected >{{$d->model}}</option>
                   
                  </select>
                      </div>
                </div>
                  
                  
             
                 <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label" >Price</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="price" id="price" value="{{$d->price}}" placeholder="Price">
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label" >Mileage</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$d->mileage}}" name="mileage" id="mileage" placeholder="Mileage">
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Engine Type</label>
                    <div class="col-sm-10">
                  <select name="engine_type" id="engine_type" class="select2 form-control">
                   <option value="{{$d->engine_type_id}}" selected >{{$d->engine_type}}</option>
                   
                  </select>
                      </div>
                </div>
                  
                   <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label" >Engine Capacity</label>

                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" value="{{$d->engine_capacity}}"  name="engine_capacity" id="engine_capacity" placeholder="Engine CC">
                  </div>
                </div>
                  
                   <div class="form-group">
                  <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                  <select name="city" id="city" class="select2 form-control">
                   <option value="" selected disabled></option>
                   @foreach($city as $c)
                   @if($d->city_id==$c->id)
                   <option value="{{$c->id}}" selected>{{$c->title}}</option>
                   @else
                     <option value="{{$c->id}}">{{$c->title}}</option>
                   @endif
   
                   

                   @endforeach
                  </select>
                      </div>
                </div>
                  
                 
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Short Description:</label>
                    <div class="col-sm-10">
                 <textarea name="short_description" maxlength="200">{{$d->short_description}}</textarea>
                      </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                 <textarea name="description">{{$d->description}}</textarea>
                      </div>
                </div>
                  
             <div class="form-group">
                  <label class="col-sm-2 control-label">Specification:</label>
                    <div class="col-sm-10">
                <textarea name="specification">{{$d->specification}}</textarea>
                      </div>
                </div>
                  
                   <div class="form-group">
                  <label class="col-sm-2 control-label">Features :</label>
                    <div class="col-sm-10">
                <textarea name="features">{{$d->features}}</textarea>
                      </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Colors  :</label>
                    <div class="col-sm-10">
                <textarea name="colors">{{$d->colors}}</textarea>
                      </div>
                </div>
                  
                   <div class="form-group">
                  <label class="col-sm-2 control-label">status  :</label>
                    <div class="col-sm-10">
                        @if($d->status==1)
                        <input type="radio" name="status" value="1" checked>Published
                         <input type="radio" name="status" value="0" style="margin-left: 20px">UnPublished
                    @else
                     <input type="radio" name="status" value="1" >Published
                         <input type="radio" name="status" value="0" checked style="margin-left: 20px">UnPublished
                   
                    @endif
                    </div>
                </div>
                  
                  
        @endforeach
                   <div class="row">
                      @foreach($images as $img)
                      <div class="col-md-4">
                          <img src="{{URL::asset('images'.$img->url)}}" width="200px" height="200px">&nbsp;&nbsp;
                      </div>
                       @endforeach
                      </div>
                  

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
                                   
              </div>        
         
      

                <div class="form-group">
                  <div class="col-sm-10">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                </div>
              </div>
            </form>
          <!-- /.box -->
                </div>
        </div>

  
          <!-- /.row -->
              </div>
              <!-- /.tab-pane --> 
            </div>
            <!-- /.tab-content -->
        
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        
     </section>
    <!-- /.content -->
@endsection
 


@section('jsblock')
<script>
function submitForm()
{
  
  $('#form').submit();
}

$(function() {
    $('#type').change(function() {
        var data = { 'type': $(this).val() };
        $.get('/getEngineByType', data, function (data) {
           var model = $('#engine_type');
                    model.empty();
                    
                      model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
                    
                    $('#engine_type').select2();
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
                        model.append("<option value='"+ element.brand_id +"'>" + element.brand + "</option>");
                    });
        });
    });
});


////////Model Dropdown Update/////

$(function() {
    $('#make').change(function() {
        var data = { 'make': $(this).val(),'vehicle_id':$('#type').val() };
        

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
</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor.-->
    <script> $(function() { $('textarea').froalaEditor() }); </script> 

    @endsection