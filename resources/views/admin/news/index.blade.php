@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | News</title>
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
Auto News
</h1>
<div class="pull-right">
<a href="{{Route('addNews')}}" class="btn bg-blue">
<i class="fa fa-plus-square"></i>
Add new
</a>

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
              <h3 class="box-title">Latest news</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                     
                  <th style="width: 20px">ID</th>
                 
                  <th style="width: 100px" >Title</th>                    
                  <th style="width: 60px">Make</th>
                  <th style="width: 60px">Model</th>
                  <th style="width: 60px">Model Version</th>
                 
                  <th style="width: 60px">Featured</th>
                  <th style="width: 20px">Active</th>    
                 
                  <th style="width: 20px">View</th>
                  <th style="width:20px">Action</th>
                  <th style="width:20px">Action</th>
                </tr>
              
                @foreach($data as $d)
                <tr>
                  <td style=" vertical-align: middle">{{$d->id}}</td>
                  <td style=" vertical-align: middle">{{$d->title}}</td>    
                  <td style=" vertical-align: middle">{{$d->make}}</td>    
                  
                  <td style=" vertical-align: middle">{{$d->model}}</td> 
                  <td style=" vertical-align: middle">{{$d->model_version}}</td>
                 
                  
                   <td style=" vertical-align: middle">
                  @if($d->isFeatured==0)
                  <span class="label label-danger">No</span>
                  @else
                  <span class="label label-success">Yes</span>
                  @endif
                  </td>
                  <td  style=" vertical-align: middle">
                  @if($d->isActive==1)
                  <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                  @else 
                  <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                  @endif
                  
                  </td>
                  
                  
                  
                 
                  <td style="vertical-align: middle"><a class="btn btn-default" href="{{Route('detailNews',['id'=>$d->id])}}"><i class="fa fa-eye"></i> View</a></td>

                 
                    

                  @if($d->isFeatured==1)
                 <td style="vertical-align: middle"><a class="btn btn-primary" onclick="removeFeaturedNews({{$d->id}})" >Remove Featured</a></td>
                  @else 
               <td style="vertical-align: middle"><a class="btn btn-primary" onclick="featuredNews({{$d->id}})" >Make Feature</a></td>
                  @endif
                
                   @if($d->isActive==1)
                 <td style="vertical-align: middle"><a class="btn btn-primary" onclick="inActiveNews({{$d->id}})" >Make InActive</a></td>
                  @else 
               <td style="vertical-align: middle"><a class="btn btn-primary" onclick="activeNews({{$d->id}})" >Make Active</a></td>
                  @endif
                  

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

function removeFeaturedNews(id)
{
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': id};
        $.get('/removeFeaturedNews', data, function (data) {
          
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
function featuredNews(id)
{
   
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': id};
        $.get('/FeaturedNews', data, function (data) {
          
          if(data==1)
          {
            location.reload();
          }
          else
          {
            document.getElementById('error').style.display = 'block';
            document.getElementById('error').innerHTML = data;
           $('#error').delay(5000).fadeOut();
            }
            });
        },
        cancel: function (val) {
           
        }
    }
});
    
}
function inActiveNews(id)
{
     $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': id};
        $.get('/inActiveNews', data, function (data) {
          
          if(data==1)
          {
            location.reload();
          }
          else
          {
            document.getElementById('error').style.display = 'block';
            document.getElementById('error').innerHTML = data;
           $('#error').delay(2000).fadeOut();
            }
            });
        },
        cancel: function (val) {
           
        }
    }
});
    
    
}
function activeNews(id)
{
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': id};
        $.get('/activeNews', data, function (data) {
          
          if(data==1)
          {
            location.reload();
          }
          else
          {
            document.getElementById('error').style.display = 'block';
            document.getElementById('error').innerHTML = data;
           $('#error').delay(2000).fadeOut();
            }
            });
        },
        cancel: function (val) {
           
        }
    }
});
    
}


</script>

@endsection