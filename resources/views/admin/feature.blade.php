@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Feature</title>

@endsection

@section('username')
{{Auth::user()->name}}
@endsection
@section('content')
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Features
</h1>
<div class="pull-right">
<a href="{{ route('addFeature') }}" class="btn bg-blue">
<i class="fa fa-plus-square"></i>
Add new
</a>

<button type="button" id="delete-selected" onclick="checkSelectedCheckbox()" class="btn bg-red">
<i class="fa fa-trash-o"></i>
Delete (selected)
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default" style="padding: 40px;">
        <div class="box-body" text-align="center">
        <form method="post" action="{{ route('serachFeature')}}">
         {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
            <div class="input-group input-group-md">
                <td>    <select class="form-control select2" name="type" style="width: 100%;"  >
                  <option selected="selected" disabled value="">Vehicle Type</option>
                  <option value="0">All</option>
                  @foreach($type as $t)
                  <option value="{{$t->id}}">{{$t->title}}</option>
                 @endforeach
                </select></td>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search" aria-hidden="true"></i>  Search</button>
                    </span>
              </div>
       </div>
            </div>
            </form>
        </div>
        <!-- /.box-body -->
        </div>
        
      <!-- /.box -->
      <div class="row">
      <div class="col-md-12 alert alert-danger"  id="error" style="display: none;" >
      </div>
      </div>
        <div class="row">
       <div class="col-md-12">
                   <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table class="table table-bordered">
                <tr>
                  <th style="width: 80px; text-align: center;"></th>    
                  <th style="width: 80px; text-align: center;">S#</th>                 
                  <th style="width: 120px;">Vehicle Type</th>
                  <th style="width: 140px; text-align: center;">Logo</th>       
                  <th>Feature Name</th>                     
                  <th style="width: 100px">Edit</th>
                </tr>
                <?php $serial=1;?>
                @foreach($data as $d)
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"  id="check_list" name="check_list" value="{{$d->id}}" ></td>    
                  <td style="text-align: center; vertical-align: middle">{{$serial}}</td>                  
                  <td style=" vertical-align: middle">{{$d->type}}</td>                  
                  <td style="text-align: center;"><img src="{{ URL::asset('/images'.$d->icon_url)}}"  style="width:40px;height:40px;"></td>
                  <td style=" vertical-align: middle">{{$d->title}}</td>   
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editFeature', ['id' => $d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                </tr>
                <?php $serial++;?>
                @endforeach
                
                
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
               {{$data->links()}}
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
        
     </section>
    <!-- /.content -->
  @endsection


  @section('jsblock')
  <script>
function deleteRecord(ids)
  {
  
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': ids };
        $.get('deleteFeatures', data, function (data) {
         
          
          if(data==1)
          {
            location.reload();
          }
          else
          {
            document.getElementById('error').style.display = 'block';
      document.getElementById('error').innerHTML = 'Error in query!';
       $('#error').delay(2000).fadeOut();
          }
          });
        },
        cancel: function (val) {
           
        }
    }
});
  
    
    
  }

function checkSelectedCheckbox()
{
  var check_ids = [];
   $.each($("input[name='check_list']:checked"), function(){            
                check_ids.push($(this).val());
            });
    if(check_ids.length==0)
    {
      document.getElementById('error').style.display = 'block';
      document.getElementById('error').innerHTML = 'please check any row!';
       $('#error').delay(2000).fadeOut();

    } 
         else  
          deleteRecord(check_ids);
         // alert("selected IDS :"+check_ids.length);

            
}




</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

  });
</script>
     @endsection
    
