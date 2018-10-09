@extends("adminShopView")

@section('title')
<title>Discount | K2C</title>
@endsection

@section('content')

<div class="content-header clearfix">
<h1 class="pull-left">
Discounts
</h1>
<div class="pull-right">
<a class="btn bg-blue" href="{{route('addNewDiscount')}}">
<i class="fa fa-plus-square"></i>
Add new
</a>
    <button type="button" id="delete-selected" onclick="checkSelectedCheckbox()" class="btn bg-red">
<i class="fa fa-trash-o"></i>
Delete (selected)
</button>
</div>
</div>
<section class="content">
    <div id="wait" style="background-color: white;z-index: 122;display:none;width:89px;height:109px;position:absolute;top:35%;left:50%;padding:2px;"><img src="{{URL::asset('images/demo_wait.gif')}}" width="64" height="64" /><br>Loading..</div>

      <div id="message" style="display:none; color:green; text-align: center" ><h3><strong>Discount Added Successfully</strong></h3></div>
      
<div class="form-horizontal">
<div class="panel-group">
<div class="panel panel-default panel-search">
<div class="panel-body">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="SearchDiscountName">Discount name</label><div title='Search by discount name.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-8">
<input class="form-control text-box single-line" id="SearchDiscountName" name="SearchDiscountName" type="text"  />
</div>
</div>

<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="SearchDiscountTypeId">Discount type</label><div title='Search by discount type.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-8">
<select class="form-control select2" data-val="true" data-val-required="The Discount type field is required." id="SearchDiscountType" name="SearchDiscountType">
    <option selected="selected" value="">All</option>
<option value="{{\App\ShopDiscount::order_discount}}">Assigned to order total</option>
<option value="{{\App\ShopDiscount::product_discount}}">Assigned to products</option>
<option value="{{\App\ShopDiscount::category_discount}}">Assigned to categories</option>

</select>
</div>
</div>
<div class="form-group">
<div class="col-md-8 col-md-offset-4">
<button type="button" id="search-discounts"  class="btn btn-primary btn-search">
<i class="fa fa-search"></i>
Search
</button>
</div>
</div>
</div>
</div>
</div>
</div>
    <div id="message" style="display:none; color:green; text-align: center" ><h3><strong>Discount Added Successfully</strong></h3></div>

<div class="panel panel-default">
<div class="panel-body">
<div id="discounts-grid"></div>
<div id="table">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" style="margin-top: 40px">
            
        <thead >
		<tr >
                    <th  style="text-align:center; width:20px" ></th>
                    <th><b>Name</b></th>
                <th  ><b>Discount Type</b></th>
		<th  ><b>Discount</b></th>
                <th><b>Max Discount Amount</b></th>
                <th  ><b>Start Date</b></th>
                <th  ><b>End Date</b></th>
		
                <th><b>Times Used</b></th>	
                <th><b>Status</b></th>
		
		<th  style="text-align:center" ><b>Edit</b></th>
                </tr>
		</thead> 
            <tbody>
                @foreach($all_discounts as $a_d)
                <tr>
                    <td  style="text-align:center; width:20px" ><input type="checkbox" style="cursor:pointer" name="check_list" value="{{$a_d->id}}"></td>
                <td>{{$a_d->name}}</td>
                @if($a_d->discount_type==\App\ShopDiscount::category_discount)
                 <td  >Assigned to Category</td>
                 
                 @elseif($a_d->discount_type==\App\ShopDiscount::product_discount)
                 <td  >Assigned to Product</td>
                 @else
                 <td  >Assigned to total Order</td>
                 @endif
                
		@if($a_d->is_percentage==1)
		<td>{{$a_d->discount}} %</td>
                <td>{{$a_d->max_discount_amount}}</td>
                @else 
                <td>{{$a_d->discount}}</td>
                <td></td>
                @endif
                
                <td  >{{$a_d->start_date}}</td>
		<td  >{{$a_d->end_date}}</td>
		
                <td>{{$a_d->times_used}}</td>
                
                @if($a_d->status==1)
                <td ><span class="grid-report-item  green">Active</span></td>
                @else
                <td ><span class="grid-report-item  red ">InActive</span></td>
                @endif
		
		 <td style="text-align:center"> <a class="btn btn-default" href="{{route('editDiscount',['id'=>$a_d->id])}}">
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


@endsection


@section('jsblock')
@if(session()->has('message'))
   
       <script> swal('{{session()->get("message")}}'); </script>
  
@endif

<script>
    
     $('#search-discounts').click(function(){
            $("#wait").show();
            setTimeout(function () {
    $("#wait").hide()
}, 500);


    var data = {'name': $("#SearchDiscountName").val(),'discount':$("#SearchDiscountType").val()};
    
      $.get('/searchDiscounts', data, function (data) {
        
           document.getElementById('table').innerHTML=data;
         $('#example').DataTable();
      });
  });
      
function deleteRecord(ids)
  {
  
    $.confirm({
    title: 'Are You Sure!..',
    content: "You won't be able to revert this!",
    buttons: {
        confirm: function () {
      var data = { 'id': ids };
      console.log(ids);
      
        $.get('deleteDiscounts', data, function (data) {
         
           document.getElementById('message').style.display = 'block';
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = '<strong><h2>Discount Deleted Successfully!</h2></strong>';
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

            
         }</script>
@endsection


