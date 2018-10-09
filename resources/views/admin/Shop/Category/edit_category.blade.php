@extends('layouts.master') 


@section('title')
Edit Category  | Affordable Store
@endSection


@section('css')
@endsection


@section('content')
 
    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Update Categories
</h1>
<div class="pull-right">
<button type="button" onclick="submitForm()" name="save" class="btn bg-blue">
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
              <form id="form" class="form-horizontal" method="POST" action="{{ route('updateCategory') }}" enctype = "multipart/form-data" >
                        {{ csrf_field() }}
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><b>Details</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
     <div class="row">
            <div class="col-md-12">
         <!-- Horizontal Form -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                    <input type='hidden' name='id' value='{{$category->id}}'>
                  <label for="code" class="col-sm-2 control-label">Category Title</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" placeholder="Category Title" value="{{$category->name}}">
                  @if ($errors->has('name'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>  <br>
				
                                
                                <div class="form-group">
                  <label for="Title" class="col-sm-2 control-label">Category Description</label>
                  <div class="col-sm-6">
                      <textarea id="summernote" class="form-control" name="description" >{{$category->description}}</textarea>
                  @if ($errors->has('description'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                  </div>
                                </div> <br>
                                
                                 <div class="form-group">
                  <label for="Title" class="col-sm-2 control-label">Parent Category</label>
                  <div class="col-sm-4">
                      <select class='select2' style='width:200px' name='parent_id'>
                             <option value=''>None</option>
                          
                          
                          @foreach($all_categories as $a_c)
    @if($category->parent_id==$a_c["id"])
    <option value="{{$a_c["id"]}}" selected>{{$a_c["name"]}}</option>
    @else
     <option value="{{$a_c["id"]}}" >{{$a_c["name"]}}</option>
    @endif
   
    @if($a_c["child"])
    @foreach($a_c["child"] as $a_c_c_1)
     @if($category->parent_id==$a_c_c_1["id"])
     <option value="{{$a_c_c_1["id"]}}" selected>{{$a_c["name"]}} >> {{$a_c_c_1["name"]}}</option>
      @else
      <option value="{{$a_c_c_1["id"]}}">{{$a_c["name"]}} >> {{$a_c_c_1["name"]}}</option>
       @endif
       
     @if($a_c_c_1["child"])
    @foreach($a_c["child"] as $a_c_c_2)
     @if($category->parent_id==$a_c_c_2["id"])
     <option value="{{$a_c_c_2["id"]}}" selected>{{$a_c["name"]}} >> {{$a_c_c_1["name"]}} >> {{$a_c_c_2["name"]}}</option>
   @else
    <option value="{{$a_c_c_2["id"]}}">{{$a_c["name"]}} >> {{$a_c_c_1["name"]}} >> {{$a_c_c_2["name"]}}</option>
  
     @endif
     
     @endforeach
     @endif
    
     @endforeach
     @endif
     
     @endforeach
                      </select>
                  </div>
                                </div> <br>
                                
                                 <div class="form-group">
                  <label for="Title" class="col-sm-2 control-label">Tag</label>
                  <div class="col-sm-4">
                      <select class='select2' style='width:200px' name='ribbon_id'>
                             <option value=''>None</option>
                          @foreach($ribbons as $r)
                          @if($category->ribbon)
                          @if($category->ribbon->id==$r->id)
                          <option value='{{$r->id}}' selected>{{$r->name}}</option>
                          @else
                           <option value='{{$r->id}}'>{{$r->name}}</option>
                          @endif
                          @else
                          <option value='{{$r->id}}'>{{$r->name}}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>
                                </div> <br>
                                
                  
				<div class="form-group">
				<label class="col-sm-2 control-label">Shown in Home Page</label>
                  <div class="col-sm-4 ">
				 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                     
                                     @if($category->shown_homepage==1)
  <label class="btn btn-primary active">
    <input type="radio" name="shown_homepage"  autocomplete="off" value='1' checked>Yes
  </label>
                                  
  <label class="btn btn-primary">
    <input type="radio" name="shown_homepage"  autocomplete="off" value='0'> No
  </label>
                                     @else
                                     
                                     <label class="btn btn-primary ">
    <input type="radio" name="shown_homepage"  autocomplete="off" value='1' >Yes
  </label>
                                  
  <label class="btn btn-primary active">
    <input type="radio" name="shown_homepage"  autocomplete="off" value='0' checked> No
  </label>
                                     
                                     @endif
  
</div>
                       @if ($errors->has('shown_homepage'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('shown_homepage') }}</strong>
                                    </span>
                                @endif
				  </div>
                                </div><br>
				<div class="form-group">
				<label class="col-sm-2 control-label">Include in Top Menu</label>
                  <div class="col-sm-4">
				  	 <div class="btn-group btn-group-toggle" data-toggle="buttons">
  
                                              @if($category->shown_nav==1)
                                             
                                             <label class="btn btn-primary active">
    <input type="radio" name="shown_nav"  autocomplete="off" value='1' checked>Yes
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="shown_nav"  autocomplete="off" value='0'> No
  </label>
                                              @else 
                                              
                                                <label class="btn btn-primary ">
                                                    <input type="radio" name="shown_nav"  autocomplete="off" value='1'> Yes
  </label>
  <label class="btn btn-primary active">
    <input type="radio" name="shown_nav"  autocomplete="off" value='0' checked> No
  </label>
                                              @endif
  
</div>
                       @if ($errors->has('shown_nav'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('shown_nav') }}</strong>
                                    </span>
                                @endif
				  </div>
                                </div><br>
                                
                                <div class="form-group">
				<label class="col-sm-2 control-label">Featured</label>
                  <div class="col-sm-4">
				 	 <div class="btn-group btn-group-toggle" data-toggle="buttons">
  
                                             @if($category->featured==1)
                                             <label class="btn btn-primary active">
    <input type="radio" name="featured" autocomplete="off" value='1'checked >Yes
  </label>
  <label class="btn btn-primary ">
    <input type="radio" name="featured"  autocomplete="off" value='0' > No
  </label>
  @else 
     <label class="btn btn-primary ">
    <input type="radio" name="featured" autocomplete="off" value='1' >Yes
  </label>
  <label class="btn btn-primary active">
    <input type="radio" name="featured"  autocomplete="off" value='0' checked> No
  </label>
  @endif
</div>
                       @if ($errors->has('featured'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('featured') }}</strong>
                                    </span>
                                @endif
				  </div>
                                </div><br>
				
				
                                
                                <div class="form-group">
				<label  class="col-sm-2 control-label">Update Image</label>
               <div class="col-sm-4">
                   <img src='{{asset($category->img_url->thumbnail->url)}}'><br>
                   <input type="file" name="img_url" id="img_url" class="form-control"></div>    
                @if ($errors->has('img_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('img_url') }}</strong>
                                    </span>
                                @endif
               
              </div>
                                <br>
                                
                                 <div class="form-group">
				<label  class="col-sm-2 control-label">Update Banner</label>
               <div class="col-sm-4">
                   <img src='{{asset($category->banner_img->thumbnail->url)}}'><br>
                   <input type="file" name="banner_img" id="banner_img" class="form-control"></div>    
                @if ($errors->has('banner_img'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banner_img') }}</strong>
                                    </span>
                                @endif
               
              </div>
                                <br>
                                <div class="form-group">
                  <label for="code" class="col-sm-2 control-label">Display Order</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="display_order" placeholder="Display Order" value="{{$category->display_order}}">
                  @if ($errors->has('display_order'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('display_order') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>  <br>
                
                <div class="form-group">
                  <label for="Title" class="col-sm-2 control-label">Discount</label>
                  <div class="col-sm-4">
                      <select class='select2' style='width:200px' name='discount_id'>
                             <option value=''>None</option>
                          @foreach($discounts as $d)
                          @if($category->discount_id==$d->id)
                          <option value='{{$d->id}}' selected>{{$d->name}}</option>
                          @else
                           <option value='{{$d->id}}'>{{$d->name}}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>
                                </div> <br>
                
                <div class="form-group">
				<label class="col-sm-2 control-label">Published</label>
                  <div class="col-sm-4">
				  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                      @if($category->published==1)
  <label class="btn btn-primary active">
    <input type="radio" name="published" autocomplete="off" value='1' checked>Yes
  </label>
  <label class="btn btn-primary ">
    <input type="radio" name="published"  autocomplete="off" value='0' > No
  </label>
  @else
   <label class="btn btn-primary ">
    <input type="radio" name="published" autocomplete="off" value='1' >Yes
  </label>
  <label class="btn btn-primary active">
    <input type="radio" name="published"  autocomplete="off" value='0' checked> No
  </label>
  
  @endif
</div>
                       @if ($errors->has('published'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('published') }}</strong>
                                    </span>
                                @endif
				  </div>
                                </div><br>
				
             </div>   
           
          <!-- /.box -->
                </div>
        </div>
          <!-- /.row -->
              </div>
               </form>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
      <!-- END CUSTOM TABS -->
        
     </section>
    <!-- /.content -->
  
 
    
    @endsection
    
    
    @section('js')
    
    <script>
        
         $(document).ready(function() {
     $('#summernote').summernote({
        height: 200
      });
      
      
});
        
   function submitForm()
        {
            setFormSubmitting();
            $('#form').submit();
        }
        
     var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; };

window.onload = function() {
    window.addEventListener("beforeunload", function (e) {
        if (formSubmitting) {
            return undefined;
        }

        var confirmationMessage = 'It looks like you have been editing something. '
                                + 'If you leave before saving, your changes will be lost.';

        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
    });
};
        </script>
        
    @endsection