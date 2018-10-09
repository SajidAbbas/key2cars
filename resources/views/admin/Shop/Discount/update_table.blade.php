
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
		
		<th  style="text-align:center" ><b>Edit</b></th>
                </tr>
		</thead> 
            <tbody>
                @foreach($discounts as $a_d)
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
		
		 <td style="text-align:center"> <a class="btn btn-default" href="{{route('editDiscount',['id'=>$a_d->id])}}">
                    <i class="fa fa-pencil-square-o"></i>Edit</a></td> 
                    
                </tr>
			@endforeach
            </tbody>
           
        
        </table>

@if(!$discounts->isEmpty())
No Record found.
@endif