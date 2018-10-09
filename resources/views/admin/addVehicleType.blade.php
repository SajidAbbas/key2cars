@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)


@section('title')

<title>Admin | VehicleType </title>

@endsection


@section('username')
{{Auth::user()->name}}
@endsection

@section('cssblock')

     <link rel="stylesheet" href="{{URL :: asset('bootstrap/css/upload-files.css') }}">
 


@endsection





@section('content')

    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Add Vehicle Type
</h1>
<div class="pull-right">
<button type="submit" name="save" onclick="submitForm()" class="btn bg-blue">
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Add Vehicle Type</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
            <form  method="post" id="form" action="{{Route('insertVehicleType')}}" enctype = "multipart/form-data" class="form-horizontal">
             {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                  </div>
                </div>               
                <div class="form-group">
                  <label for="iconURL" class="col-sm-2 control-label">Logo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="file" placeholder="logo" required>
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


@endsection