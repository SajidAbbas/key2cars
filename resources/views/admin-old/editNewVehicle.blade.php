@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)
@section('title')
<title>Admin | City</title>
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Details</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
            <form  method="post" id="form" action="{{ route('updateNewVehicle')}}"  enctype = "multipart/form-data" class="form-horizontal" autocomplete="off">
             {{ csrf_field() }}
              <div class="box-body">
                  @foreach($data as $d)
                  <input type="hidden" name="id" value="{{$d->id}}">
                  
             <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" class="form-control">
                      <option value="{{$d->type_id}}" selected >{{$d->type}}</option>
                   @foreach($type as $t)
                   @if($t->id != $d->type_id)
                   <option value="{{$t->id}}">{{$t->title}}</option>
                   @endif

                   @endforeach
                  </select>
                      </div>
                </div>
             
                <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label" >Title</label>

                  <div class="col-sm-10">
                      <input type="text" value="{{$d->title}}" class="form-control"  name="title" id="title" placeholder="Title">
                  </div>
                </div>
                  
                 
                  
                   <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Short Description:</label>
               <div class="fr-view">
                 <textarea name="short_description" maxlength="200"> <?php echo $d->short_description;?></textarea>
 
</div>
                
              </div>
            </div>
          </div>
          <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Description:</label>
               <div class="fr-view">
                 <textarea name="description"><?php echo $d->description;?></textarea>
 
</div>
                
              </div>
            </div>

          </div>
                   <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Specification:</label>
               <div class="fr-view">
                 <textarea name="specification"><?php echo $d->specification;?></textarea>
 
</div>
                
              </div>
            </div>

          </div>
                   <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Features:</label>
               <div class="fr-view">
                 <textarea name="features"><?php echo $d->features;?></textarea>
 
</div>
                
              </div>
            </div>

          </div>
                  
                   <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Colors:</label>
               <div class="fr-view">
                 <textarea name="colors"><?php echo $d->colors;?></textarea>
 
</div>
                
              </div>
            </div>

          </div>
                  
                  <div class="row">
                      @foreach($images as $img)
                      <div class="col-md-12">
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
                  @endforeach

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
          <!-- /.row -->
              </div>
              <!-- /.tab-pane --> 
            </div>
            <!-- /.tab-content -->
          </div>
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
</script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor.-->
    <script> $(function() { $('textarea').froalaEditor() }); </script> 

    @endsection