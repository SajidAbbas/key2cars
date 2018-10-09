@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')
<title> Admin | ADS/POST</title>
@endsection

@section('cssblock')



@endsection

@section('username')
{{Auth::user()->name}}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Ads
</h1>
<div class="pull-right">
<a href="../pages/addForm.html" class="btn bg-blue">
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
<button type="button" id="delete-selected" class="btn bg-red">
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
      <table class="table table-bordered">
      <div class="input-group input-group-lg">
          <td><input type="text" class="form-control" placeholder="Make or Model"></td>
          <td><input type="text" class="form-control" data-toggle="collapse" data-target="#demo">
          <div class="collapse" id="demo">
              <div class="box-body" >
              <div class="row margin">
                <div class="col-md-12">
                  <input id="range_1" type="text" name="range_1" value="">
                </div>
              </div>
            </div>
              </div>
          </td>
          
          <td><select class="form-control select2" style="width: 100%;";  >
                  <option selected="selected">All Cities</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select></td><td style="text-align: center;"><span class="input-group-btn"><button type="button" class="btn btn-info btn-flat">Search</button></span></td>
          </tr>
            </div>
          
        </table>
       
        </div>
        <!-- /.box-body -->
        </div>
        
      <!-- /.box -->
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
                  <th> Images</th>
                  <th> User ID</th>
                  <th> Ads ID</th>                    
                  <th> Title</th>
                  <th> Model</th>
                  <th> City</th>
                  <th> Price</th>
                  <th style="width: 20px"> Featured</th>    
                  <th style="width: 40px"> Edit</th>
                  <th style="width: 40px"> View</th>
                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"></td> 
                  <td style="text-align: center; vertical-align: middle">1.</td>    
                  <td style="text-align: center;"><img src="../images/1.jpg"  style="width:60px;height:60px;"></td>
                  <td style=" vertical-align: middle">12</td>
                  <td style=" vertical-align: middle">3</td>    
                  <td style=" vertical-align: middle">Honda</td> 
                  <td style=" vertical-align: middle">City</td>
                  <td style=" vertical-align: middle">Islamabad</td>
                  <td style=" vertical-align: middle">Rs. 12 lac</td>
                  <td  style=" vertical-align: middle"><span class="glyphicon glyphicon-remove" style="color:red;"></span></td>
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"></td> 
                  <td style="text-align: center; vertical-align: middle">2.</td>    
                  <td style="text-align: center;"><img src="../images/1.jpg"  style="width:60px;height:60px;"></td>
                  <td style=" vertical-align: middle">12</td>
                  <td style=" vertical-align: middle">3</td>    
                  <td style=" vertical-align: middle">Honda</td> 
                  <td style=" vertical-align: middle">City</td>
                  <td style=" vertical-align: middle">Islamabad</td>
                  <td style=" vertical-align: middle">Rs. 12 lac</td>
                  <td  style=" vertical-align: middle"><span class="glyphicon glyphicon-ok" style="color: green;"></span></td>
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"></td>
                  <td style="text-align: center; vertical-align: middle">3.</td>    
                  <td style="text-align: center;"><img src="../images/1.jpg"  style="width:60px;height:60px;"></td>
                  <td style=" vertical-align: middle">12</td>
                  <td style=" vertical-align: middle">3</td>    
                  <td style=" vertical-align: middle">Honda</td> 
                  <td style=" vertical-align: middle">City</td>
                  <td style=" vertical-align: middle">Islamabad</td>
                  <td style=" vertical-align: middle">Rs. 12 lac</td>
                  <td  style=" vertical-align: middle"><span class="glyphicon glyphicon-remove" style="color: red"></span></td>
                  <td style=" vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle"><input type="checkbox"></td>
                  <td style="text-align: center; vertical-align: middle">4.</td>    
                  <td style="text-align: center;"><img src="../images/1.jpg"  style="width:60px;height:60px;"></td>
                  <td style=" vertical-align: middle">12</td>
                  <td style=" vertical-align: middle">3</td>    
                  <td style=" vertical-align: middle">Honda</td> 
                  <td style=" vertical-align: middle">City</td>
                  <td style=" vertical-align: middle">Islamabad</td>
                  <td style=" vertical-align: middle">Rs. 12 lac</td>
                  <td  style=" vertical-align: middle"><span class="glyphicon glyphicon-ok" style="color: green;"></span></td>
                <td style=" vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                  <td style="vertical-align: middle"><a class="btn btn-default" href="#"><i class="fa fa-eye"></i> View</a></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
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