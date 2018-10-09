@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Feature</title>
@endsection

@section('cssblock')
<link rel="stylesheet" href="{{URL ::asset('bootstrap/css/styles.css')}}">

@endsection


@section('username')
{{Auth::user()->name}}
@endsection

@section('content')

<div class="content-header clearfix">
<h1 class="pull-left">
Add Feature
</h1>
<div class="pull-right">
<button type="submit" name="save"  onclick="submitForm()" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save
</button>

</div>
</div>

    <!-- Main content -->
    <section class="content">
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"> Add Feature</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           <form  method="post" id="form" action="{{ route('updateFeature')}}" enctype = "multipart/form-data" class="form-horizontal">

           @foreach($result as $r)
           {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Title</label>

                  <input type="hidden" name="id" value="{{$r->id}}">
              

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$r->title}}">
                  </div>
                </div>
               
                

                                   
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" class="form-control select2">
                   <option value="{{$r->type_id}}" selected >{{$r->type}}</option>
                   @foreach($type as $t)
                  @if($t->title==$r->type)
                   @else
                   <option value="{{$t->id}}">{{$t->title}}</option>
                   @endif

                   @endforeach
                  </select>
                      </div>
                </div>

                
                <div class="form-group">
                                <div class="col-sm-10">
                  <label for="vehicalTitle" class="col-sm-2 control-label">Logo</label>
                  @if($r->icon_url=='/feature/default.png')
                  @else
                                    <div  class="uploaded-image" style="margin-left:90px;">
                                        <img src="{{URL ::asset('images'.$r->icon_url)}}">
                                    </div>
                                    @endif
                                </div>
                            </div>

                  <div class="form-group" style="margin-left:75px;">
                <div class="col-sm-10">                    
                                    <div  class="upload-image-button pull-left margin-t-5">
                                        <div class="qq-uploader-selector qq-uploader">                            
                <div class="qq-upload-button-selector qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;">
                    <div>Upload a file</div>
                    <input  type="file" name="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                </div>                    
                <ul class="qq-upload-list-selector qq-upload-list"></ul>
                                        </div>
                                    </div>

                                @if($r->icon_url=='/feature/default.png')
                                <div class="remove-image-button pull-left margin-t-5" >
                                   <a href="{{Route('removeFeatureImage',['_id'=>$r->id])}}"      style="pointer-events: none; cursor: default;" > <span class="btn bg-red">Remove picture</span></a>
                                   </div>
                                   @else
                                   <div class="remove-image-button pull-left margin-t-5" >
                                   <a href="{{Route('removeFeatureImage',['_id'=>$r->id])}}"      > <span class="btn bg-red">Remove picture</span></a>
                                   


                                   @endif
                            </div>
                    </div>
                    </div>



                    <div class="form-group">
                  <div class="col-sm-10">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                </div>

              </div>
              @endforeach
              
            </form>
          <!-- /.box -->
                </div>
       


        <div class="row">
            <div class="col-md-6">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
          <!-- /.row -->
              </div>
              <!-- /.tab-pane --> 
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        
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

