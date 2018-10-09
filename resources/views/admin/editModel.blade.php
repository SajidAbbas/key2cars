@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Model</title>
@endsection

@section('cssblock')
@endsection

@section('username')
{{Auth::user()->name}}
@endsection


@section('content')

<div class="content-header clearfix">
<h1 class="pull-left">
Update Model
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Edit Model</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           <form  method="post" id="form" action="{{ Route('updateModel')}}" enctype = "multipart/form-data" class="form-horizontal">
           {{ csrf_field() }}
              <div class="box-body">
              @foreach($data as $d)
                <div class="form-group">
                <input type="hidden" name="id" value="">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Title</label>
                  <input type="hidden" name="id" value="{{$d->id}}">

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="{{$d->title}}" placeholder="Title">
                  </div>
                </div>
                
                

                                   
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" class="form-control select2">
                   <option value="{{$d->type_id}}" selected >{{$d->type}}</option>
                   @foreach($type as $t)

                   @if($t->title==$d->type)

                   @else
                   <option value="{{$t->id}}">{{$t->title}}</option>
                   @endif

                   @endforeach
                  </select>
                      </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Body  Type</label>
                    <div class="col-sm-10">
                  <select name="body_type" id="body_type" class="form-control select2">
                   <option value="{{$d->body_id}}" selected >{{$d->body_type}}</option>
                   @foreach($body_type as $b)

                   @if($b->title==$d->body_type)

                   @else
                   <option value="{{$b->id}}">{{$b->title}}</option>
                   @endif

                   @endforeach
                  </select>
                      </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Manufacturer</label>
                    <div class="col-sm-10">
                  <select name="make" id="make" class="form-control select2">
                   <option value="{{$d->manufacture_id}}" selected >{{$d->make}}</option>
                  
                  
                  
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

<script>
$(function() {
    $('#type').change(function() {
        var data = { 'type': $(this).val() };
        $.get('/getMakeByType', data, function (data) {
           var model = $('#make');
                    model.empty();
                    
                      model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.brand + "</option>");
                    });
        });
    });
});



</script>
@endsection

