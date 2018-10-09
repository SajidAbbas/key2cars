@extends('adminShopView')
 
@section('title')
<title>Discount | K2C</title>
@endsection

@section('cssblock')
<link href='{{asset('/dist/css/touchspin.css')}}' rel="stylesheet">

@endsection

@section('jsblock')
<srcipt src='{{asset('/dist/js/touchspin.js')}}' type='text/javascript'></srcipt>
<script type="text/javascript">
    $(document).ready(function() {
       
        $("#UsePercentage").click(toggleUsePercentage);
        
        toggleUsePercentage();
        
    });

    


    function toggleUsePercentage() {
        if ($('#UsePercentage').is(':checked')) {
            
            $('#pnlMaximumDiscountAmount').show();
            document.getElementById('discountLabel').innerHTML="Discount Percentage";
        } else {
            document.getElementById('discountLabel').innerHTML="Discount Amount";
            $('#pnlMaximumDiscountAmount').hide();
        }
    }

    

    


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

@section('content')


<div class="content-header clearfix">
<h1 class="pull-left">
Add a new discount
<small>
<i class="fa fa-arrow-circle-left"></i>
<a href="{{route('discount')}}">back to discount list</a>
</small>
</h1>
<div class="pull-right">
    <button type="button" name="save" onclick='submitForm()' class="btn bg-blue">
<i class="fa fa-floppy-o"></i>
Save
</button>

</div>
</div>
 
<section class="content">
<div class="form-horizontal">
<div id="discount-edit" class="nav-tabs-custom">
    <input id="selected-tab-name" name="selected-tab-name" type="hidden" value="">
        
    </input>
    <ul class="nav-tabs nav">
        <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Discount info</a></li>
        </ul>
    <form id="form" class="form-horizontal " method="POST" action="{{ route('insertNewDiscount') }}" enctype = "multipart/form-data" >
                        {{ csrf_field() }}
    <div class="tab-content"><div class="active tab-pane" id="tab-info">

<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body">
<div class="form-group">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="Name">Name</label><div title='The name of the discount.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<div class='input-group input-group-required'>
    <input class="form-control text-box single-line" style='width:50%' id="Name" name="name" type="text" value="{{old('name')}}" /></div>
 @if ($errors->has('name'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
    <span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="DiscountTypeId">Discount type</label><div title='The type of discount.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<select class="form-control select2"  style='width:50%'  id="DiscountTypeId" name="discount_type">
    <option value="{{\App\ShopDiscount::order_discount}}">Assigned to order total</option>
<option value="{{\App\ShopDiscount::product_discount}}">Assigned to products</option>
<option value="{{\App\ShopDiscount::category_discount}}">Assigned to categories</option>

</select>
<span class="field-validation-valid" data-valmsg-for="DiscountTypeId" data-valmsg-replace="true"></span>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="UsePercentage">Use percentage</label><div title='Determines whether to apply a percentage discount to the order/SKUs. If not enabled, a set value is discounted.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
    @if(old('is_percentage')=="1")
     <input class="check-box"  id="UsePercentage" name="is_percentage" checked type="checkbox" value="1" />
    <script>toggleUsePercentage();</script>
     @else
    <input class="check-box"  id="UsePercentage" name="is_percentage"  type="checkbox" value="1" />
    @endif
<span class="field-validation-valid" data-valmsg-for="UsePercentage" data-valmsg-replace="true"></span>
</div>
</div>

<div class="form-group" id="pnlDiscountAmount">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="DiscountAmount" id='discountLabel'>Discount Amount</label><div title='The discount amount to apply to the order/SKUs.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<input type="number" class='form-control' style='width:50%' id="DiscountAmount" name="discount" value="{{old('discount')}}" />
 @if ($errors->has('discount'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
<span class="field-validation-valid" data-valmsg-for="DiscountAmount" data-valmsg-replace="true"></span>
</div>
</div>
<div class="nested-setting">

<div class="form-group" id="pnlMaximumDiscountAmount">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="MaximumDiscountAmount">Maximum discount amount</label><div title='Maximum allowed discount amount. Leave empty to allow any discount amount. If you&#39;re using &quot;Assigned to products&quot; discount type, then it&#39;s applied to each product separately.' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<input type="number" class='form-control' style='width:50%'  id="MaximumDiscountAmount" name="max_discount_amount" value="{{old('max_discount_amount')}}" />
 @if ($errors->has('max_discount_amount'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('max_discount_amount') }}</strong>
                                    </span>
                                @endif
<span class="field-validation-valid" data-valmsg-for="MaximumDiscountAmount" data-valmsg-replace="true"></span>
</div>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="StartDateUtc">Start date</label><div title='The start of the discount period in Coordinated Universal Time (UTC).' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<input  class='form-control' style='width:50%' type='date' name="start_date" value='{{old('start_date')}}'/>
@if ($errors->has('start_date'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
<span class="field-validation-valid" data-valmsg-for="StartDateUtc" data-valmsg-replace="true"></span>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="EndDateUtc">End date</label><div title='The end of the discount period in Coordinated Universal Time (UTC).' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<input  class='form-control' style='width:50%' type='date' name="end_date" value='{{old('end_date')}}' />
@if ($errors->has('end_date'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
<span class="field-validation-valid" data-valmsg-for="EndDateUtc" data-valmsg-replace="true"></span>
</div>
</div>
    
    <div class="form-group advanced-setting">
<div class="col-md-3">
<div class="label-wrapper"><label class="control-label" for="Status">Status</label><div title='Status' class='ico-help'><i class='fa fa-question-circle'></i></div></div>
</div>
<div class="col-md-9">
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="status" autocomplete="off" value='1' checked>Active
  </label>
  <label class="btn btn-primary ">
    <input type="radio" name="status"  autocomplete="off" value='0' > InActive
  </label>
  
</div></div>
</div>



</div>
</div>
</div></div>
      
 
       </div></div>
</div>
</section>
    
    
</form>
@endsection


