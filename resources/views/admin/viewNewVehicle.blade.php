@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')
<title>Admin | New Vehicle</title>
@endsection

@section('username')
{{Auth::user()->name}}
@endsection
@section('cssblock')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endsection


@section('content')
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
New Vehicle
</h1>

</div>

    <!-- Main content -->
    <section class="content">
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"> Details</a></li>   
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-6">
         <!-- Horizontal Form -->
            <!-- form start -->
           @foreach($data as $d)
              <div class="box-body">
                  
                  <div class="row">
                <div class="form-group">
                  <label for="vehicalTitle" class="col-sm-2 control-label" >Title</label>

                  <div class="col-sm-10">
                    {{$d->title}}
                  </div>
                </div>
                  
              </div>   
                  <br>
                  
                  <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Vehicle  Type</label>
                    <div class="col-sm-10">
                  {{$d->type}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                   <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Manufacture</label>
                    <div class="col-sm-10">
                  {{$d->make}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                   <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Model</label>
                    <div class="col-sm-10">
                  {{$d->model}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                  <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Engine Type</label>
                    <div class="col-sm-10">
                  {{$d->engine_type}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                  <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Engine Capacity</label>
                    <div class="col-sm-10">
                  {{$d->engine_capacity}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                  <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                  {{$d->price}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                   <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Mileage</label>
                    <div class="col-sm-10">
                  {{$d->mileage}}
                      </div>
                </div>
                  </div>
                  <br>
                  
                  <div class="row">
             <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        @if($d->status==1)
                  Published
                  @else
                  Unpublished 
                  @endif
                      </div>
                </div>
                  </div>
                  <br>
                 
              
                   <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Short Description:</label>
              <?php echo $d->short_description;?>
                
              </div>
            </div>
          </div>
<br>
          <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Description:</label>
<?php echo $d->description;?>
               
                
              </div>
            </div>

          </div><br>
          
          <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Specification:</label>
<?php echo $d->specification;?>
               
                
              </div>
            </div>

          </div><br>
          
          <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>features:</label>
<?php echo $d->features;?>
               
                
              </div>
            </div>

          </div><br>
                  
          <div class="row">

              <div class="col-md-12">
              <div class="form-group">
                <label>Colors:</label>
<?php echo $d->colors;?>
               
                
              </div>
            </div>

          </div><br>
                   <div class="row margin-bottom">
                    <div class="col-sm-6">
                    <strong> Images:</strong>
                    <?php $count=0;?>

                    @foreach($images as $img)

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
                                   
                 

                @endforeach
              </div>
          
          <!-- /.box -->
                </div>
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
    <!-- /.content -->
@endsection
 


@section('jsblock')
<script>
function submitForm()
{
  
  $('#form').submit();
}
</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor.-->
    <script> $(function() { $('textarea').froalaEditor() }); </script> 

    @endsection