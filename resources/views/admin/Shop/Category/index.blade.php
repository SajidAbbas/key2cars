@extends('adminShopView')

@section('title')

Categories | Affordables Store
@endsection



@section('content')

    <!-- Content Header (Page header) -->
  <div class="content-header clearfix">
<h1 class="pull-left">
Categories
</h1>
<div class="pull-right">
<a href="{{route('addNewCategory')}}" class="btn bg-blue">
<i class="fa fa-plus-square"></i>
Add new
</a>

<button type="button" id="delete-selected" onclick="checkSelectedCheckbox()" class="btn bg-red">
<i class="fa fa-trash-o"></i>
Delete (selected)
</button>
</div>
</div>

    <!-- Main content -->
    <section class="content">
	
	
        <div id="message" style="display:none; color:green; text-align: center" ><h3><strong>New Category Added Successfully</strong></h3></div>
        
        <div class="form-horizontal">
        <div class="panel-group" style="margin-bottom: 40px;">
        <div class="panel panel-default">
        <div class="panel-body" style="margin-bottom: 66px;">
            <div >
        <table id="example" class="table table-striped table-bordered" cellspacing="0" style="margin-top: 40px">
            
        <thead >
		<tr >
		<th  style="text-align:center; width:20px" ></th>
                <th>Display Order</th>
                <th  >Image</th>
		
		<th  >Category Name</th>
                <th  >Category Description</th>
		<th  >parent Category</th>
		
               
                <th>Discount</th>
		<th  >Status</th>
		<th  style="text-align:center" >Edit</th></tr>
		</thead> 
            <tbody>
                @foreach($all_categories as $a_c)
            <tr >
                
                <td style="text-align:center" ><input type="checkbox" style="cursor:pointer" name="check_list" value="{{$a_c->id}}"></td>
                <td>{{$a_c->display_order}}</td>
                 <td style="text-align: center;" >  <div ><img style="cursor: pointer" class="images" src="{{asset($a_c->img_url->icon->url)}}"  data-zoom-image="{{asset($a_c->img_url->large->url)}}"  >  </div> </td>				
               <td >{{$a_c->name}}</td>
                <td ><?php echo $a_c->description;?></td>
               
                   @if($a_c->parent_category!=null)
                   
                    <td>{{$a_c->parent_category->name}}</td>
                  @else
                   <td>None</td>
                  @endif
               
                
                
               
                <td>{{$a_c->discount["name"]}}</td>
                @if($a_c->published==1)
                <td ><span class="grid-report-item  green">Published</span></td>
                @else
                <td ><span class="grid-report-item  red ">UnPublished</span></td>
                @endif
               
               	
                <td style="text-align:center"> <a class="btn btn-default" href="{{route('editCategory',['id'=>$a_c->id])}}">
                    <i class="fa fa-pencil-square-o"></i>Edit</a></td> 
             </tr>
             @endforeach
			
            </tbody>
           
        
        </table>
        </div>
        </div>    
        </div>
            </div>
        </div>
     </section>
    <!-- /.content -->

  
@endsection

@section('js')

@if(session()->has('message'))
   
       <script> swal('{{session()->get("message")}}'); </script>
  
@endif
 <script>
function deleteRecord(ids)
  {
  
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': ids };
      console.log(ids);
      
        $.get('deleteCategories', data, function (data) {
         
           document.getElementById('message').style.display = 'block';
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = '<strong><h2>Categories Deleted Successfully!</h2></strong>';
       $('#message').delay(3000).fadeOut();
       
       location.reload();
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
      document.getElementById('message').style.display = 'block';
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = '<strong><h2>please check any row!</h2></strong>';
       $('#message').delay(3000).fadeOut();

    } 
         else  
          deleteRecord(check_ids);
         // alert("selected IDS :"+check_ids.length);

            
}


 $('.images').elevateZoom();


</script>

@endsection

