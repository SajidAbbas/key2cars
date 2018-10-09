@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | News</title>
@endsection

@section('cssblock')

<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('username')
{{Auth::user()->name}}
@endsection


@section('content')

<div class="content-header clearfix">
<h1 class="pull-left">
Add New News
</h1>
<div class="pull-right">
<button type="submit" name="save"  onclick="submitForm()" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save
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
              <li class="active"><a href="#tab_1" data-toggle="tab">Basic Information</a></li>   
            </ul>
            <div class="tab-content">
                
              <div class="tab-pane active" id="tab_1">
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
                 
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           <form  method="post" id="form" action="{{ route('insertNews')}}" enctype = "multipart/form-data" class="form-horizontal">
           {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                  </div>
                </div>
                
                

                                   
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" class="form-control select2">
                   <option value="" selected disabled>Type</option>
                   @foreach($type as $t)
                   <option value="{{$t->id}}">{{$t->title}}</option>

                   @endforeach
                  </select>
                      </div>
                </div>
                  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Manufacture</label>
                    <div class="col-sm-10">
                  <select name="make" id="make" class="form-control select2">
                   <option value="" selected disabled>Make</option>
                   
                  </select>
                      </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Model</label>
                    <div class="col-sm-10">
                  <select name="model" id="model" class="form-control select2">
                   <option value="" selected disabled>Model</option>
                   
                  </select>
                      </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Model Version</label>
                    <div class="col-sm-10">
                  <select name="model_version" id="model_version" class="form-control select2">
                   <option value="" selected disabled>Model Version</option>
                   
                  </select>
                      </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                   <div class="col-sm-10">
                     <div class="fr-view" >
                 <textarea name="news_description"></textarea>
                     </div>
                   </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label class="col-sm-2 control-label">Images</label>
                   <div class="col-sm-10">
                     <span class="btn btn-primary fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Images</span>
                    <input type="file" name="images[]" id="img" multiple>
                </span>
                   </div>
                </div>
                  
                  <div class="input_fields_wrap" >
                      
                      <button class="add_field_button btn btn-success fileinput-button " style="width:200px;margin-left: 300px;">Add New Section</button><br><br>
                      <div>
                      <div class="form-group">
                 <label for="Title" class="col-sm-2 control-label">Title</label>
                 <div class="col-sm-10">
                     <input type="text" class="form-control" name="heading[]" id="title" placeholder="Title">
                 </div>
             </div><div class="form-group">
                 <label class="col-sm-2 control-label">Description</label>
                 <div class="col-sm-10">
                     <div class="fr-view">
                         <textarea name="description[]"></textarea>
                     </div>
                 </div>
             </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-10">
                            <span class="btn btn-primary fileinput-button">
                                <i class="glyphicon glyphicon-plus">
                                    
                                </i>
                                <span>Add Images</span>
                                <input type="file" name="section_img[]" id="img">
                            </span>
                        </div>
                    </div>
                    <a href="#" class="remove_field">Remove</a>

                      
                   </div>
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
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        
     </section>

@endsection


@section('jsblock')
<script>
function submitForm()
{
  
  $('#form').submit();
}

</script>

<script>
$(function() {
    $('#type').change(function() {
        var data = { 'type': $(this).val() };

        $.get('/getMakeByType', data, function (data) {
           var model = $('#make');
                    model.empty();
                    
                      model.append("<option value='' disabled selected>" + 'Make' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.brand + "</option>");
                    });
        });
    });
});

////////Model Dropdown Update/////


    $('#make').change(function() {
        var data = { 'make': $(this).val() };
       
        $.get('/getModelByManufactureAdmin', data, function (data) {
           var model = $('#model');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + 'Model' + "</option>");
 
                     
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
                    
                      model.append("<option value='' disabled selected>" + 'Model Version' + "</option>");
 
                    
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });



$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
$(wrapper).append('<div><br><div class="form-group"><label for="vehicalTitle" class="col-sm-2 control-label">Title</label><div class="col-sm-10"><input type="text" class="form-control" name="heading[]" id="title" placeholder="Title"></div></div><div class="form-group"><label class="col-sm-2 control-label">Description</label><div class="col-sm-10"><div class="fr-view"><textarea name="description[]"></textarea></div></div></div><div class="form-group"><label class="col-sm-2 control-label">Images</label><div class="col-sm-10"><span class="btn btn-primary fileinput-button"><i class="glyphicon glyphicon-plus"></i><span>Add Images</span><input type="file" name="section_img[]" id="img" ></span></div></div><a href="#" class="remove_field">Remove</a>'); //add input box
        $(".bdpk").datepicker(
{
  dateFormat: "dd-mm-yy"
});
		}
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


</script>


<!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor.-->
    <script> $(function() { $('textarea').froalaEditor() }); </script> 
@endsection

