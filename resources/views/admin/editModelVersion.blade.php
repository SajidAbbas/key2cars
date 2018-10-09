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

<div class="content-header clearfix">
<h1 class="pull-left">
Update ModelVersion
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Edit ModelVersion</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           <form  method="post" id="form" action="{{route('updateModelVersion')}}" enctype = "multipart/form-data" class="form-horizontal">
           @foreach($result as $r)
           {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                 <input type="hidden" name="id" value="{{$r->id}}">

                  <label for="vehicalTitle" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$r->title}}">
                  </div>
                </div>
                
                

                                   
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Model</label>
                    <div class="col-sm-10">
                  <select name="model" id="model" class="form-control select2">
                   <option value="{{$r->model_id}}" selected >{{$r->model}}</option>
                    @foreach($model as $m)
                    @if($m->title==$r->model)

                   @else
                   <option value="{{$m->id}}">{{$m->title}}</option>
                   @endif
                   @endforeach
                  </select>
                      </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Year</label>
                    <div class="col-sm-10">
                  <select name="year" id="year" class="form-control select2">
                   <option value="{{$r->year_id}}" selected >{{$r->year}}</option>
                    @foreach($year as $y)
                   @if($y->year==$r->year)

                   @else
                   <option value="{{$y->id}}">{{$y->year}}</option>
                   @endif
                   @endforeach
                  
                  
                  </select>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                </div>

              </div>
              @endforeach
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

@endsection


@section('jsblock')
<script>
function submitForm()
{
  
  $('#form').submit();
}

</script>


@endsection

