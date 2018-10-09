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




@endsection

@section('content')



<!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Ads
</h1>
<div class="pull-right">
<a href="{{Route('addVehicle')}}" class="btn bg-blue">
<i class="fa fa-plus-square"></i>
Add new
</a>
<div class="btn-group">
<button type="button" class="btn btn-success">
<i class="fa fa-download"></i>
Export
</button>
<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">&nbsp;</span>
</button>
<ul class="dropdown-menu" role="menu">
<li>
<button type="submit" name="exportxml-all">
<i class="fa fa-file-code-o"></i>
Export to XML (all found)
</button>
</li>
<li>
<button type="button" id="exportxml-selected">
<i class="fa fa-file-code-o"></i>
Export to XML (selected)
</button>
</li>
<li class="divider"></li>
<li>
<button type="submit" name="exportexcel-all">
<i class="fa fa-file-excel-o"></i>
Export to Excel (all found)
</button>
</li>
<li>
<button type="button" id="exportexcel-selected">
<i class="fa fa-file-excel-o"></i>
Export to Excel (selected)
</button>
</li>
</ul>
</div>
<button type="button" name="importexcel" class="btn bg-olive" data-toggle="modal" data-target="#importexcel-window">
<i class="fa fa-upload"></i>
Import
</button>
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
        <form method="post" action="{{route('serachVehicle')}}">
        {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <table class="table table-bordered">
      <div class="input-group input-group-lg">
          <td><input type="text" class="form-control" name="model" placeholder="Model"></td>
          
          
          <td><select class="form-control select2" name="city" style="width: 100%;";  >
                  <option selected="selected" disabled="disabled">All Cities</option>
                  @foreach($city as $c)

                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endforeach
                </select></td>
                <td style="text-align: middle"><input type="checkbox" name="all"><strong>&nbsp;&nbsp;ALL</strong></td><td style="text-align: center;"><span class="input-group-btn"><button type="submit" class="btn btn-info btn-flat">Search</button></span></td>

          </tr>
            </div>
          
        </table>
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
              <h3 class="box-title"> Vehicle</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-color: #ecf0f5">
                
                @foreach($data as $d)
                
                
                <div class="col-sm-12 border m-bottom-20 " style="margin-top: 20px; background-color: white">
                 <div class="col-sm-3">
                      <img class="img-responsive" src="{{asset('images'.$d->url)}}" alt="Photo">
                    </div>
					<div class="col-sm-8">
                            <div><h2 class="pull-left">{{$d->manufacture}} {{$d->model}}</h2></a>
                        <h2 class="pull-right">PKR {{$d->price}}</h2>
                        <div class="clear m-bottom-10"></div>
                        <div class="pull-left col-xs-8" style="border-bottom:1px solid #E8E8E8;"> <h4 class="col-xs-3">2017</h4><h4 class="col-xs-4">{{$d->city}}</h4></div>
                        
                        <div class="pull-left col-xs-8"><h4 class="col-xs-3">Honda</h4> <h4 class="col-xs-3">1</h4> <h4 class="col-xs-3">12</h4></div><br>
                        
                     
			@if($d->vehicle_type=="Car")
                  <a class="btn btn-default"  style="margin-top: 85px;margin-left: 247px;" href="{{Route('editVehicle',['id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                 
                  <a class="btn btn-default" style="margin-top: 66px;" href="{{Route('detailVehicle',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a>

                  @elseif($d->vehicle_type=="Bike")
                 <a class="btn btn-default" style="margin-top: 85px;margin-left: 247px;" href="{{Route('editBike',['id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                 
                  <a class="btn btn-default" style="margin-top: 66px;" href="{{Route('detailBike',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a>


                  @else
                  <a class="btn btn-default"  style="margin-top: 85px;margin-left: 247px;" href="{{Route('editOther',['vehicle_id'=>$d->vehicle_id,'id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                
                  <a class="btn btn-default" style="margin-top: 66px;" href="{{Route('detailOther',['vehicle_id'=>$d->vehicle_id,'id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a>

                  @endif			
                      
                        </div>
						</div>						
                </div>
                
                
                 @endforeach
                <!--
              <table class="table table-bordered">
                <tr>
                  <th style="width: 50px; text-align: center;"><input type="checkbox"></th>    
                  <th > Ads ID</th>
                  <th style="text-align: center;"> Images</th>
                                    
                  <th > Type</th>
                  <th > Model</th>
                 
                  <th > Price</th>
                  <th style="width: 20px"> Number Verified</th>
                  
                  <th style="width: 20px"> Featured</th>  
                  <th>Status</th>
                  <th style="width: 40px"> Edit</th>
                  <th style="width: 40px"> View</th>
                  <th style="width:40px"> Action</th>
                </tr>
               
                @foreach($data as $d)
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"  id="check_list" name="check_list" value="{{$d->id}}" ></td> 
                   <td style=" vertical-align: middle">{{$d->id}}</td> 
                  <td style="text-align: center;"><img  class="img" src="{{URL::asset('images'.$d->url)}}"  style="width:60px;height:60px;"></td>
                    
                  <td style=" vertical-align: middle">{{$d->vehicle_type}}</td>    
                  
                  <td style=" vertical-align: middle">{{$d->model}}</td> 
                  
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
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailVehicle',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>

                  @elseif($d->vehicle_type=="Bike")
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editBike',['id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailBike',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>


                  @else
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editOther',['vehicle_id'=>$d->vehicle_id,'id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailOther',['vehicle_id'=>$d->vehicle_id,'id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>

                  @endif
                  
                  

                  <td style="vertical-align: middle">
                  @if($d->featured==1)
                 <a class="btn btn-primary" onclick="featureVehicle({{$d->id}})" disabled="disabled"> Feature</a>
                  @else 
              <a class="btn btn-primary" onclick="featureVehicle({{$d->id}})" > Feature</a>
                  @endif
                
                  @if($d->isVerified==1)
                <a class="btn btn-primary" onclick="featureVehicle({{$d->id}})" disabled="disabled"> Number Verify</a>
                  @else 
               <a class="btn btn-primary" onclick="verifyCode({{$d->id}})" > Number Verify</a>
                  @endif
                
                  </td>  
                
                </tr>
             
                @endforeach
               
              </table>-->
                
               
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

@section('username')
{{Auth::user()->name}}
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
        $.get('/featureVehicle', data, function (data) {
          
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
        $.get('deleteVehicle', data, function (data) {
          
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

function verifyCode(id)
{
     sendCode(id);
     $('#myModal').modal({backdrop: 'static', keyboard: false});  
   
    
}

function sendCode(id)
    {
        
        data={'id':id};
        $.get('/sendVerificationCode', data, function (data) {
                       
                        swal("Successfully Code Send!");
                   
                    
                });
       
    }
    
    function validateCode()
    {
        var code=$("#code").val();
        var v_code=$("#v_code").val();
        if(code==v_code)
        {
            $("#myModal").modal('hide');
            swal ( "Congratulation" ,  "Your Ad Successfully Submitted!" ,  "success" );
            verifiedAd();
            location.reload();
        }
        else
        {
           // $("#myModal").modal('hide');
             swal ( "Oops" ,  "Wrong Code!" ,  "error" );
             //$("#myModal").modal();
        }
        
    }
    function verifiedAd()
    {
        var id=$("#id").val();
        $.ajax({
            url:'/verifiedAd',
            type:'GET',
            data:id,
            success:function(data){
               
            }
        });
        
    }

</script>


 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title" style="text-align:center;">Number Verification Proccess</h2>
        </div>
        <div class="modal-body">
          <p>Enter the Verification Code you received on your mobile phone. </p>
          <input type="text" class="form-control" style="width:200px" name="v_code" id="v_code"/>
          Have'nt received yet?<strong> <a href="javascript:sendCode(1);" style="color:blue;">RESEND</a></strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="validateCode()">Submit</button>
        </div>
      </div>
      
    </div>
  </div>


@endsection