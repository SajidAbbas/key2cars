@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Vehicle Type</title>
@endsection

@section('cssblock')

<link rel="stylesheet" href="{{URL ::asset('bootstrap/css/styles.css')}}">

@endsection

@section('username')
{{Auth::user()->name}}
@endsection

@section('content')
 <div class="content-header clearfix">
       <h1 class="pull-left">Edit Vehicle Type</h1>
       <div class="pull-right">
           <button type="submit" name="save" onclick="submitForm()" class="btn bg-blue">
               <i class="fa fa-floppy-o"></i>Save
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
              <li class="active"><a href="#tab_1" data-toggle="tab"> Vehicle Type</a></li>                
            </ul>
              
            @foreach($data as $d)
            <form id="form" method="post" action="{{Route('updateVehicleType')}}" enctype="multipart/form-data"  >
             {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{$d->id}}">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="panel-group">
                <div class="panel penel-default">
                <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                        <div class="label-wrapper">
                            <label class="control-label" for="Name" title="">Title</label>
                            <div class="ico-help" title="The manufacturer's name.">
                                <i class="fa fa-question-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-required">
                            <input class="form-control text-box single-line" data-val-required="Please provide a name." id="title" name="title" type="text" value="{{$d->title}}">
                            <div class="input-group-btn"><span class="required">*</span></div>
                        </div>
                        <span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="label-wrapper"><label class="control-label" for="PictureId" title="">Picture</label>
                                <div class="ico-help" title="The manufacturer picture.">
                                <i class="fa fa-question-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                 @if($d->icon_url=='/vehicleType/default.png')
                  @else
                                    <div  class="uploaded-image">
                                        <img src="{{URL :: asset('images'.$d->icon_url) }}">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div  class="upload-image-button pull-left margin-t-5">
                                        <div class="qq-uploader-selector qq-uploader">                            
                <div class="qq-upload-button-selector qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;">
                    <div>Update Image</div>
                     <input type="file" class="form-control" name="file" id="file" placeholder="logo" required style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                </div>                    
                <ul class="qq-upload-list-selector qq-upload-list"></ul>
                                        </div>
                                    </div>
                                    @if($d->icon_url=='/vehicleType/default.png')
                                <div class="remove-image-button pull-left margin-t-5" >
                                   <a href="{{Route('removeVehicleTypeImage',['_id'=>$d->id])}}"      style="pointer-events: none; cursor: default;" > <span class="btn bg-red">Remove picture</span></a>
                                   </div>
                                   @else
                                   <div class="remove-image-button pull-left margin-t-5" >
                                   <a href="{{Route('removeVehicleTypeImage',['_id'=>$d->id])}}"      > <span class="btn bg-red">Remove picture</span></a>



                                   @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>
                </div>
                </div>
                
                </from>
           @endforeach
              <!-- /.tab-pane -->    
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        </div> 
     </section>
@endsection


@section('jsblock')

<script>
function submitForm()
{
  
  $('#form').submit();
}

</script>


@endsection