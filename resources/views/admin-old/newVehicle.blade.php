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
<!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Ads
</h1>
<div class="pull-right">
<a href="{{Route('addNewVehicle')}}" class="btn bg-blue">
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
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 50px; text-align: center;"><input type="checkbox"></th>    
                  <th style="width: 50px; text-align: center;">S#</th>
                  <th style="text-align: center;"> Images</th>
                  <th > Ads ID</th> 
                   <th > Vehicle Type</th> 
                  <th > Title</th>
                  
                  <th style="width: 20px"> Featured</th>    
                  <th style="width: 40px"> Edit</th>
                  <th style="width: 40px"> View</th>
                  <th style="width:40px"> Make Feature</th>
                </tr>
                <?php $serial=1;?>
                @foreach($data as $d)
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"  id="check_list" name="check_list" value="{{$d->id}}" ></td> 
                  <td style="text-align: center; vertical-align: middle">{{$serial}}</td>    
                  <td style="text-align: center;"><img  class="img" src="{{URL::asset('images'.$d->url)}}"  style="width:60px;height:60px;"></td>
                  <td style=" vertical-align: middle">{{$d->id}}</td>   
                  <td style=" vertical-align: middle">{{$d->type}}</td>
                  <td style=" vertical-align: middle">{{$d->title}}</td>    
                  
                 <td  style=" vertical-align: middle">
                  @if($d->featured==1)
                  <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                  @else 
                  <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                  @endif
                  

                  </td>

                 
                  
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="{{Route('editNewVehicle',['id'=>$d->id])}}"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailNewVehicle',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>

                

                  @if($d->featured==1)
                 <td style="vertical-align: middle"><a class="btn btn-primary" onclick="featureVehicle({{$d->id}})" disabled="disabled"> Feature</a></td>
                  @else 
               <td style="vertical-align: middle"><a class="btn btn-primary" onclick="featureVehicle({{$d->id}})" > Feature</a></td>
                  @endif
                
                  

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




</script>

@endsection