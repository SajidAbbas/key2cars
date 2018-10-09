@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | ADS/POST</title>
@endsection

@section('cssblock')


@section('username')
{{Auth::user()->name}}
@endsection

@endsection

@section('content')
 <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Moderator
</h1>
<div class="pull-right">

<button type="button" id="delete-selected" onclick="checkSelectedCheckbox()" class="btn bg-red">
<i class="fa fa-trash-o"></i>
Delete (selected)
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
       <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Ads</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
      <div class="col-md-12 alert alert-danger"  id="error" style="display: none;" >
      </div>
      </div>
            <div class="box-body">
              <table class="table table-bordered" id="example">
                <tr>
                  <th style="width: 50px; text-align: center;"><input type="checkbox" id="selectAll" title="Select All"></th>    
                  <th> User ID</th> 
                  <th> Images</th>
                                   
                  <th> Vehicle Type</th>
                  <th> Model</th>
                  
                  <th> City</th>
                  <th> Price</th>
                  <th> Number Verified</th>
                  <th style="width: 20px"> Featured</th>                 
                  <th style="width: 40px"> Status</th>
                    <th style="width: 40px"> Edit</th>
                  <th style="width: 40px"> View</th>
                  <th style="width: 160px; text-align: center;"> Action</th>   
                </tr>
               
                @foreach($data as $d)

                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"  id="check_list" name="check_list" value="{{$d->id}}" ></td> 
                  <td style=" vertical-align: middle">{{$d->user_id}}</td>
                  <td style="text-align: center;"><img src="{{URL::asset('images'.$d->url)}}"  style="width:60px;height:60px;"></td>
                  
                     
                  <td style=" vertical-align: middle">{{$d->vehicle_type}}</td> 
                  <td style=" vertical-align: middle">{{$d->model}}</td>
                  
                  <td style=" vertical-align: middle">{{$d->city}}</td>
                  <td style=" vertical-align: middle">Rs. {{$d->price}}</td>
                   <td  style=" vertical-align: middle">
                  @if($d->isVerified==1)
                  <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                  @else 
                  <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                  @endif
                  </td>
                  
                  
                  <td  style=" vertical-align: middle">
                  @if($d->featured==1)
                  <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                  @else 
                  <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                  @endif
                  </td>
                  <td style=" vertical-align: middle">
                  @if($d->status=="denied")
                  <span class="label label-danger">{{$d->status}}</span>
                  @elseif($d->status=="pending")
                  <span class="label label-primary">{{$d->status}}</span>
                  @else
                  <span class="label label-success">{{$d->status}}</span>
                  @endif
                  </td>
                   @if($d->vehicle_type=="Car")
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editVehicle',['id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                 
                  @elseif($d->vehicle_type=="Bike")
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editBike',['id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  
                  @else
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editOther',['vehicle_id'=>$d->vehicle_id,'id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  @endif
                  
                  @if($d->vehicle_type=="Car")
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailVehicle',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>
                  @elseif($d->vehicle_type=="Bike")
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailBike',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>
                  @else
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailOther',['vehicle_id'=>$d->vehicle_id,'id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>


                  @endif
                  <td style=" vertical-align: middle">
                     @if($d->status=="pending")
                   <button  type="button" class="btn btn-success btn-sm" onclick="updateRequest({{$d->id}},'approved')" >Approved</button>
                   <button type="button" class="btn btn-danger btn-sm" onclick="updateRequest({{$d->id}},'denied')" >Denied</button>
                   @elseif($d->status=="denied")
                   <button  type="button" class="btn btn-success btn-sm" onclick="updateRequest({{$d->id}},'approved')" >Approved</button>
                   <button type="button" class="btn btn-danger btn-sm" onclick="updateRequest({{$d->id}},'denied')" disabled="disabled" >Denied</button>
                   @else 
                   <button  type="button" class="btn btn-success btn-sm" onclick="updateRequest({{$d->id}},'approved')" disabled="disabled" >Approved</button>
                   <button  id="request" type="button" class="btn btn-danger btn-sm" onclick="updateRequest({{$d->id}},'denied')"  >Denied</button>
                   @endif

                  </td>


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


function updateRequest(id,val)
{
  

  $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'value': val,'id':id };
        $.get('/updateRequest', data, function (data) {
          
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
        $.get('/deleteVehicleModerator', data, function (data) {
          
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






    
        $(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#example').prop('checked', false);
    } else {
        $('input[type="checkbox"]', '#example').prop('checked', true);
    }
    $(this).toggleClass('allChecked');
  })
});
        
</script>

@endsection