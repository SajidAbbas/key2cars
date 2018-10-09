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
                  <th style="width: 50px; text-align: center;">S#</th>
                  <th> Images</th>
                  <th> User ID</th>
                   <th> Title</th>
                  <th> Make</th>
                  <th> Model</th>
                  
                                 
                  <th style="width: 40px"> Status</th>
                   
                  <th style="width: 40px"> View</th>
                  <th style="width: 160px; text-align: center;"> Action</th>   
                </tr>
                <?php $serial=0;?>
                @foreach($data as $d)

                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"  id="check_list" name="check_list" value="{{$d->id}}" ></td> 
                  <td style="text-align: center; vertical-align: middle">{{$serial}}.</td>    
                  <td style="text-align: center;"><img src="{{URL::asset('images'.$d->url)}}"  style="width:60px;height:60px;"></td>
                  <td style=" vertical-align: middle">{{$d->user_id}}</td>
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
        $.get('/updateRequestHotWheel', data, function (data) {
          
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
        $.get('/deleteHotWheelModerator', data, function (data) {
          
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