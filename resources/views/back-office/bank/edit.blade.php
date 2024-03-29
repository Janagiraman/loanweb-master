@extends('layouts.back-office')
@section('parent_link')
    <a href="{{ route('back-office.banks') }}" class="breadcrumb-item"> Banks </a>
@endsection
@section('breadcrum')
    Edit Bank
@stop
@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add Bank
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.bank.update', $bank->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Bank Name</label> 
                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" required value="{{ $bank->bank_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ltv1">LTV1</label>
                                <input type="num" class="form-control" id="ltv1" name="ltv1" required value="{{ $bank->ltv1 }}">
                            </div>
                        </div>

                        <div class="form-row">
                           
                            <div class="form-group col-md-6">
                                <label for="ltv2">LTV2</label>
                                <input type="num" class="form-control" id="ltv2" name="ltv2" required value="{{ $bank->ltv2 }}">
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ltv3">LTV3</label>
                                <input type="num" class="form-control" id="ltv3" name="ltv3" required value="{{ $bank->ltv3 }}">
                               
                            </div>
                        </div>
                        <div class="field_wrapper" id="add-group">
                        @if($bank->cibilSettings)
                          
                            @foreach($bank->cibilSettings as $key => $cibil)
                            
                                <input type="hidden" name="old_occupation[]" value="{{ $cibil->occupation_id }}" />
                                <input type="hidden" name="old_cibil_setting_id[]" value="{{ $cibil->id }}" />
                                <div class="cibil-for-occupation">
                                     <div class="field-group">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                        <label for="occupation_id">Occupation</label>
                                                        <select name="occupation_id[]" id="occupation_id" class="form-control" required>
                                                            <option value="">Select Occupation</option>
                                                            @foreach ($occupations as $occupation)
                                                                    <option @if($cibil->occupation_id == $occupation->id ) selected  @endif value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-row">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>LTV1</th>
                                                            <th>LTV2</th>
                                                            <th>LTV3</th>
                                                        </tr>
                                                        
                                                        @foreach($cibil->cibilDetails as $detail)
                                                            
                                                            <tr>
                                                               
                                                               <td>{{ ucwords($detail->name) }}
                                                               <input type="hidden" name="old_{{$detail->name.'_'.$key}}" value="{{ $detail->id }}" />
                                                               </td>
                                                                @for($i=1; $i < 4; $i++)
                                                                    @php
                                                                    $ltv = 'ltv'.$i;
                                                                    @endphp
                                                                <td>
                                                                     
                                                                     <input type="text" name="{{$detail->name.'_'.$key}}[]" value="{{ $detail->$ltv }}">
                                                                </td>
                                                                @endfor
                                                            </tr>
                                                        @endforeach
                                                      
                                                       
                                                    </table>
                                            </div>
                                        </div>
                                        <div class="remove-sec"><a href="javascript:void(0);" id="{{$key}}" class="remove_button">Remove</a></div>
                                    </div>
                            @endforeach
                        @endif
                        </div>
                        <input type="hidden" name="removed_id" id="removed_id" />
                        <div class="form-row add-more-lnk-sec">
                                <input type="hidden" name="add_more_count" id="add_more_count" value="{{ count($bank->cibilSettings)-1 }}" />
                                <a href="#" class="add-more-link" id="add-more"> <i class="fa fa-plus" aria-hidden="true"></i> Add Other Occupation</a>
                                <!-- <input type="button" id="add-more" value="Add More Applicant" class="form-control" /> -->

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    var wrapper = $('.field_wrapper');
    $("#add-more").click(function(e){
        e.preventDefault();
        var currentVal = $("#add_more_count").val();
        
        var incVal = parseInt(currentVal) + parseInt(1);
        $("#add_more_count").val(incVal);
        var maxField = 10; //Input fields increment limitation
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({              
                    url: "/back-office/bank/add-more-cibil",
                    type: "POST",
                    data: { incVal: incVal },
                    success: function( response ) {
                        $(wrapper).append(response.data)
                    }
        });
        
    })
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
       
        var appendId = $(this).attr('id');
        if($('#removed_id').val() !=''){
            var appendId = ','+$(this).attr('id');
        }
        $('#removed_id').val($('#removed_id').val()+appendId);
        $(this).parent().parent('div').remove();
        $(this).remove(); //Remove field html
       
        //x--; //Decrement field counter
    });
})
</script>
<style>
.form-row.add-more-lnk-sec {
    float: right;
    
    text-decoration: none;
    background-color: antiquewhite;
    padding: 2px;
    border-radius: 18px;
    padding: 2px 10px;
    
}
.form-row.add-more-lnk-sec a{
    color: green !important;
}
a.remove_button, .remove_button_edit {
    color: red;
    background-color: antiquewhite;
    padding: 2px 5px;
    border-radius: 14px;
   
}
.remove-sec {
    text-align: center;
    
}
</style>

@endsection

@section('custom-script')

@endsection
