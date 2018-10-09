@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')
<title>Dealer</title>

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
Dealer # {{$data->id}}
</h1>
<div class="pull-right">
<button type="submit" name="save"  onclick="submitForm()" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
UPDATE
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Update INFO</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           <form  method="post" id="form" action="{{route('updateDealer')}}" enctype = "multipart/form-data" class="form-horizontal">
           {{ csrf_field() }}
              <div class="box-body">
                  <input type="hidden" name="id" value="{{$data->id}}">
                                
               <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="title" placeholder="Name" value="{{$data->name}}">
                  </div>
                </div>
                  
                 <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Short Description</label>

                  <div class="col-sm-10">
                    <textarea name="short_description"><?php echo $data->short_description;?></textarea>  </div></div>
                </div>
                  
                  <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea name="description"><?php echo $data->description;?></textarea>  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Phone Number</label>

                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" value="{{$data->number}}" name="number" id="title" placeholder="Phone Number">
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" value="{{$data->address}}" placeholder="Address">
                  </div>
                </div>
                   <div class="form-group">
                  <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                  <select name="city" class="form-control select2">
                   <option value="" selected disabled></option>
                   @foreach($city as $c)
                   @if($data->city_id==$c->id)
                   <option value="{{$c->id}}" selected="selected">{{$c->title}}</option>
                   @else
                     <option value="{{$c->id}}">{{$c->title}}</option>
                   @endif
                 

                   @endforeach
                  </select>
                      </div>
                </div>
           <div class="form-group">
                                <div class="col-sm-10">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Logo</label>
                  @if($data->img_url=="")
                  @else
                                    <div  class="uploaded-image" style="margin-left:90px;">
                                        <img src="{{URL ::asset('images'.$data->img_url)}}">
                                    </div>
                                    @endif
                                </div>
                            </div>
                  
           <div class="form-group">
                  <label for="iconURL" class="col-sm-2 control-label">Update Logo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="file" placeholder="logo">
                  </div>
                </div>
           
           <div class="form-group">
                  <label for="iconURL" class="col-sm-2 control-label">Featured</label>
                  @if($data->featured==1)
                  <div class="col-sm-10">
                      
                    <input type="radio"  name="featured" value="1" checked> YES
                  </div>
                  <div class="col-sm-10">
                    <input type="radio" name="featured" value="0"> NO
                  </div>
                  @else
                  <div class="col-sm-10">
                      
                    <input type="radio"  name="featured" value="1"> YES
                  </div>
                  <div class="col-sm-10">
                    <input type="radio"  checked name="featured" value="0"> NO
                  </div>
                  
                  @endif
                </div>
           
            <div class="form-group">
                  <label for="iconURL" class="col-sm-2 control-label">Status</label>
                  @if($data->active==1)
                  <div class="col-sm-10">
                    <input type="radio"  name="status" checked value="1" > Active
                  </div>
                  <div class="col-sm-10">
                    <input type="radio"  name="status" value="0"> InActive
                  </div>
                  @else
                   <div class="col-sm-10">
                    <input type="radio"  name="status" value="1" > Active
                  </div>
                  <div class="col-sm-10">
                    <input type="radio"  checked name="status" value="0"> InActive
                  </div>
                  
                  @endif
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
<!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor.-->
    <script> $(function() { $('textarea').froalaEditor() }); </script> 

@endsection

