

@if(Auth::user()->role_id==App\Role::Admin) 
<?php $layout="adminMasterView";?>
@else 
<?php $layout="clientMasterView";?>
@endif
@extends($layout)

@section('title')

<title>Admin | Accessory</title>
@endsection

@section('cssblock')
@endsection

@section('username')
{{Auth::user()->name}}
@endsection


@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Update Accessory
</h1>
<div class="pull-right">
<button type="submit" name="save" onclick="submitForm()" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save 
</button>
<button type="submit" name="save-continue" class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save and Continue Edit
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">
      <!-- /.box -->
          <!-- START CUSTOM TABS -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom" style="height:500px;">
          
          
              @foreach($result as $r)
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><strong> Accessory Information</strong></a></li>
              <li><a href="#tab_3" data-toggle="tab"><strong> Pictures</strong></a></li>
              <li><a href="#tab_4" data-toggle="tab"><strong> Contact Informaton</strong></a></li>    
            </ul>
            <form  method="post" id="form" action="{{ route('/updateAccessory')}}"   enctype = "multipart/form-data" autocomplete="off">
             {{ csrf_field() }}
            <div class="tab-content">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="hidden" name="id" value="{{$r->id}}"

              <div class="tab-pane active" id="tab_1">
                  <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{$r->title}}" class="form-control">
              </div>
              <div class="form-group">
                <label>City</label>
                <select name="city" id="city" data-placeholder="City" class="form-control select2" >
                <option selected="selected"  value="{{$r->city_id}}">{{$r->city}}</option>
                @foreach($city as $c)
                  
                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endforeach
                </select>
              </div>
             <!-- <div>  
            <div id="ddlSocial"></div>  
        </div>  -->
              <!-- /.form-group -->
              <div class="form-group">
                <label>City Area</label>
                <select name="city_area" id="city_area" data-placeholder="City Area" class="form-control select2" style="width: 100%;">
                  <option selected="selected" value="{{$r->city_area_id}}">{{$r->city_area}}</option>
                  
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Category</label>

                <select name="category" id="category" data-placeholder="Category" class="form-control select2" style="width: 100%;">
                <option selected="selected"  value="{{$r->category_id}}">{{$r->category}}</option>
                
                @foreach($category as $c)
                  
                  <option value="{{$c->id}}">{{$c->title}}</option>
                  @endforeach
                  
                </select>
              </div>
              

            

                <div class="form-group">
                <label>Sub Category</label>
                <select name="sub_category" id="sub_category" data-placeholder="Sub Category" class="form-control select2" style="width: 100%;">
                  <option selected="selected"  value="{{$r->sub_category_id}}">{{$r->sub_category}}</option>
                
                </select>
              </div>

               
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            
              <div class="form-group">
                  <label>Price (Rs)</label>
                  <input type="number" name="price"  value="{{$r->price}}" class="form-control" >
                </div>
                
                 <div class="form-group">
                <label>Condition</label>

                <select name="condition" id="condition" data-placeholder="Condition" class="form-control select2" style="width: 100%;">
                <option selected="selected" disabled="disabled" value=""></option>
                 
                  <option value="new">New</option>
                  <option value="used">Used</option>
                  
                </select>
              </div>
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Ad Description</label>
                  <textarea class="form-control" name="description" rows="4" placeholder="Describe your car...">{{$r->description}}</textarea>
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
              </div>
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3" style="padding: 50px;">
                  
                  <div class="row">
                      <div class="row margin-bottom">
                           @foreach($image as $img)
                    <div class="col-sm-6">
                    <img class="img-responsive " src="{{URL::asset('images'.$img->url)}}" alt="Photo">
                    </div>
                           @endforeach

                   

                 
                      
                    
                     
                      @if($r->video_url!==null)
                      <video width="320" height="240" controls>  
                        <source src="{{URL::asset('upload/vehicle/'.$r->video_url)}}" type="video/mp4">  

                        </video>
                      @endif
                      </div>
                  </div>
                  <div class="row">
             <div >
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Thumbnail</span>
                    <input type="file" name="file" id="file">
                </span>
                
                <span class="btn btn-primary fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Images</span>
                    <input type="file" name="img[]" id="img" multiple>
                </span>
                
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            </div>
              </div>
              <!-- /.tab-pane -->
             <div class="tab-pane" id="tab_4">
              <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Seller Name</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                    <input type="text" name="name" value="{{$r->seller_name}}" class="form-control" >
                </div>
                <!-- /.input group -->
              </div>  
                <!-- phone mask -->
              <div class="form-group">
                <label>Mobile Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="number" value="{{$r->number}}" class="form-control" >
                </div><br>
                <div class="input-group">
                  <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                </div>
                <!-- /.input group -->
              </div> 
            </div>
            <!-- /.col -->
          </div>      
              </div>
              <!-- /.tab-pane -->  
           
            </div>
             </form>
            <!-- /.tab-content -->
           
            @endforeach
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
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
        
     </section>

@endsection


@section('jsblock')

<script src="{{URL ::asset('js/ddslick.min.js')}}"></script>

<script>
function submitForm()
{
  $('#form').submit();
}
$('#checkbox').change(function(){
            if(this.checked){
    document.getElementById('collapseTwo').style.display='block';
            }
            else
            {
              document.getElementById('collapseTwo').style.display='none';

            }
        });
    
/////////Area Dropdown update
$(function() {
    $('#city').change(function() {
        var data = { 'city': $(this).val() };
        

        $.get('/getAreaByCity', data, function (data) {
           var model = $('#city_area');
                    model.empty();
                    
                    //  model.append("<option value='' disabled selected>" + '' + "</option>");
 
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });
});

$('#category').change(function() {
        var data = { 'category': $(this).val() };
       
        $.get('/getSubCategoryByCategory', data, function (data) {
           var model = $('#sub_category');
                    model.empty();
                    
                     model.append("<option value='' disabled selected>" + '' + "</option>");
 
                     
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                    });
        });
    });

</script>

@endsection

