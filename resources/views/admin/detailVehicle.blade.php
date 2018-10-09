@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)


@section('title')

<title>Admin | VehicleType</title>

@endsection

@section('username')
{{Auth::user()->name}}
@endsection

@section('cssblock')

     <link rel="stylesheet" href="{{URL :: asset('bootstrap/css/styles.css') }}">
 

@endsection





@section('content')

    <div class="content-header clearfix">
<h1 class="pull-left">
Ads Detail
</h1>
<div class="pull-right">
<button type="submit" name="save" class="btn bg-red">
<i class="fa fa-trash-o"></i>
Delete
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">
        
                <div class="form-horizontal">
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><strong> Car Information</strong></a></li>
              <li><a href="#tab_2" data-toggle="tab"><strong> Additional Information</strong></a></li>
              <li><a href="#tab_3" data-toggle="tab"><strong> Pictures</strong></a></li>
              <li><a href="#tab_4" data-toggle="tab"><strong> Contact Informaton</strong></a></li>    
            </ul>
              
            @foreach($result as $r)
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <div class="panel-group">
                      <div class="panel panel-default">
                      <div class="panel-body">
            
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">User ID</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->user_id}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Ads ID</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->id}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Manufcturer</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->manufacture}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Model</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->model}}</div>
                  </div>
              </div>
               <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Model Version</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->model_version}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">City</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->city}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">City Area</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->city_area}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Price </label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">Rs. {{$r->price}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Featured </label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                  @if($r->featured==0)
                      <div class="form-text-row"><span class="glyphicon glyphicon-remove" style="color:red;"></span></div>
                      @else
                       <div class="form-text-row"><span class="glyphicon glyphicon-ok" style="color:green;"></span></div>
                       @endif
                  </div>
              </div>

      </div>
                            
          </div>
                   <div class="panel panel-default">
                      <div class="panel-body">
              
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Model Year</label>
                        <div class="ico-help">
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->model_year}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Registration City</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->reg_city}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Mileage</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->mileage}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Exterior Color</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->color}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Short Description </label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->description}}</div>
                  </div>
              </div>              
      </div>
                            
          </div>
                    
                      </div>
                </div>
              <!-- /.tab-pane -->
           <div class="tab-pane" id="tab_2">
                  <div class="panel-group">
                      <div class="panel panel-default">
                      <div class="panel-body">
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Engine Type</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->engine}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Engine Capacity</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->engine_capacity}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Transmission</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->transmission}}</div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Assembly</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->assembly}}</div>
                  </div>
              </div>              
      </div>
                            
          </div>
             
         <div class="panel panel-default">
                      <div class="panel-body">
              <div class="form-group">
                  <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label" for="BillingAddress" title="">Features</label>
                        <div class="ico-help" title="Billing address info."><i class="fa fa-question-circle"></i></div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <table class="table table-hover table-bordered" style="max-width: 150px;">
                        <tbody>
                        @foreach($feature as $f)
                            <tr>
                            <td><img src="{{URL::asset('images'.$f->url)}}"/></td>
                            <td>{{$f->title}}</td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                      </table>
                  </div>
               </div>             
      </div>
                            
          </div> 
          <div class="panel panel-default">
                      <div class="panel-body">
              <div class="form-group">
                  <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label" for="BillingAddress" title="">Condition Details</label>
                        <div class="ico-help" title="Billing address info."><i class="fa fa-question-circle"></i></div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <table class="table table-hover table-bordered" style="max-width: 150px;">
                        <tbody>
                        @foreach($condition as $c)
                            <tr>
                            <td><strong><?=str_replace('_', ' ', $c->condition_detail)?></strong></td>
                            <td>{{$c->condition_detail_value}}</td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                      </table>
                  </div>
               </div>             
      </div>
                            
          </div>                
                      </div>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3" style="padding: 50px;">
                 <div class="post">
                 
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                    <?php $count=0;?>

                    @foreach($image as $img)

                      @if($count==0)
                      <img class="img-responsive " src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                    </div>
                    <!-- /.col -->
                    @elseif($count==1)
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive " src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                           </div>
                        <!-- /.col -->
                        @else
                        <div class="col-sm-6">
                          <img class="img-responsive " src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                         
                        </div>
                        @endif
                        <?php $count++;?>
                        @endforeach
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                </div>
              </div>
              <!-- /.tab-pane -->
             <div class="tab-pane" id="tab_4">
                <div class="panel-group">
                      <div class="panel panel-default">
                      <div class="panel-body">
              <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Seller Name</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->seller_name}}</div>
                  </div>
              </div>
                <div class="form-group">
                <div class="col-md-3">
                    <div class="label-wrapper">
                        <label class="control-label">Contact No</label>
                        <div class="ico-help" >
                        <i class="fa fa-question-circle"></i>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                      <div class="form-text-row">{{$r->number}}</div>
                  </div>
              </div>          
                   </div>
                    </div>
                </div>
            </div>
              <!-- /.tab-pane -->    
            </div>
            <!-- /.tab-content -->
            @endforeach
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        </div> 
     </section>

@endsection



@section('jsblock')




@endsection