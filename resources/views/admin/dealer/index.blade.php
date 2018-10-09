@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Dealer</title>
@endsection

@section('cssblock')

@section('username')
{{Auth::user()->name}}
@endsection



@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
  

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
              <h3 class="box-title"> Dealers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                 
                  <th > Dealer ID</th>
                  <th style="text-align: center;"> Image</th>
                  
                  <th > Name</th>                    
                  <th > Address</th>
                  <th > Category</th>
                  <th > Status</th>
                 
                  <th style="width:40px">Manage</th>
                </tr>
              
                @foreach($data as $d)
                <tr>
                   <td style=" vertical-align: middle">{{$d->id}}</td>
                  <td style="text-align: center;"><img  class="img" src="{{URL::asset('images'.$d->img_url)}}"  style="width:60px;height:60px;"></td>
                  
                  <td style=" vertical-align: middle">{{$d->name}}</td>    
                  <td style=" vertical-align: middle">{{$d->address}}</td>    
                  
                  <td style=" vertical-align: middle">
                  {{$category[$d->id]}}
                  </td> 
                  
                 
                  
                   <td style=" vertical-align: middle">
                  @if($d->active==0)
                  <span class="label label-danger">InActive</span>
                  @else
                  <span class="label label-success">Active</span>
                  @endif
                  </td>
                 
                 <td style="vertical-align: middle"><a class="btn btn-primary" href="{{Route('dealerDetail',['id'=>$d->id])}}" > Manage Account</a></td>
                 
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



@endsection