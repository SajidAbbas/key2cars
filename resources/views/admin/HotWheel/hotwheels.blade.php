@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | ADS/HotWheel</title>
@endsection

@section('cssblock')

@section('username')
{{Auth::user()->name}}
@endsection



@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Ads Hotwheel
</h1>
<div class="pull-right">
   <!--
<a href="{{Route('addAccessory')}}" class="btn bg-blue">
<i class="fa fa-plus-square"></i>
Add new
</a>
-->

<button type="button" id="delete-selected" onclick="checkSelectedCheckbox()" class="btn bg-red">
<i class="fa fa-trash-o"></i>
Delete (selected)
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">

      
        
      <!-- /.box -->
       <div class="row">
      <div class="col-md-12 alert alert-danger"  id="error" style="display: none;" >
      </div>
      </div>
        <div class="row">
       <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Hot Wheel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 50px; text-align: center;"><input type="checkbox"></th>    
                  <th > User ID</th>
                  <th style="text-align: center;"> Images</th>
                  
                  <th > Title</th>                    
                  <th > Make</th>
                  <th > Model</th>
                 
                  <th > Status</th>
                 
                  
                  <th style="width: 40px"> View</th>
                 
                </tr>
              
                @foreach($data as $d)
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"  id="check_list" name="check_list" value="{{$d->id}}" ></td> 
                   <td style=" vertical-align: middle">{{$d->user_id}}</td>
                  <td style="text-align: center;"><img  class="img" src="{{URL::asset('images'.$d->url)}}"  style="width:60px;height:60px;"></td>
                  
                  <td style=" vertical-align: middle">{{$d->title}}</td>    
                  <td style=" vertical-align: middle">{{$d->make}}</td>    
                  
                  <td style=" vertical-align: middle">{{$d->model}}</td> 
                 
                   <td style=" vertical-align: middle">
                  @if($d->status=="denied")
                  <span class="label label-danger">{{$d->status}}</span>
                  @elseif($d->status=="pending")
                  <span class="label label-primary">{{$d->status}}</span>
                  @else
                  <span class="label label-success">{{$d->status}}</span>
                  @endif
                  </td>
                 
                  
                 
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailHotWheel',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>

                 


               
                  

                </tr>
               
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


@endsection



@section('jsblock')

    

<script type="text/javascript">

function featureVehicle(id)
  {
  
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': id};
        $.get('/featureAccessory', data, function (data) {
          
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


function deleteRecord(ids)
  {
  
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': ids };
        $.get('/deleteAccessories', data, function (data) {
          
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

@endsection