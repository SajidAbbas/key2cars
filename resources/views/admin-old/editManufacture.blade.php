@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Manufacture</title>

@endsection

@section('cssblock')
@endsection


@section('username')
{{Auth::user()->name}}
@endsection

@section('content')

<div class="content-header clearfix">
<h1 class="pull-left">
Update Manufacturer
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Edit Manufacturer</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           <form  method="post" id="form" action="{{ route('updateManufacture')}}" enctype = "multipart/form-data" class="form-horizontal">
           {{ csrf_field() }}
              <div class="box-body">
              @foreach($result as $r)
              <input type="hidden" name="id" value="{{$r->id}}">
                             <div class="form-group">
                  <label class="col-sm-2 control-label">Brand</label>
                    <div class="col-sm-10">
                  <select name="brand" id="brand" class="form-control select2">
                  
                   <option value="{{$r->brand_id}}" selected >{{$r->brand}}</option>
                 
                   @foreach($brand as $b)
                   @if($b->title==$r->brand)

                   @else
                   <option value="{{$b->id}}">{{$b->title}}</option>
                   @endif

                   @endforeach
                     @endforeach
                  </select>
                      </div>
                </div>


                
               
                                
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" class="form-control select2">
                  @foreach($result as $r)
                   <option value="{{$r->type_id}}" selected >{{$r->type}}</option>
                   @endforeach
                   @foreach($type as $t)
                   @if($t->title==$r->type)

                   @else
                   <option value="{{$t->id}}">{{$t->title}}</option>
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

