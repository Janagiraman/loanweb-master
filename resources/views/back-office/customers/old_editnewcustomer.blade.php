@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/newleads') }}" class="breadcrumb-item"> New Leads </a>
@endsection


@section('breadcrum')
    Edit customer ( {{ $customer->cust_name }} )
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit customer ( {{ $customer->cust_name }} )
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.customers.updatenewcustomer', $customer->id) }}" method="post" id="edit_new_cust_form">
                        @csrf
                        {{ method_field('PUT') }}
                            <div class="form-row">
                        
                                <div class="form-group col-md-6">
                                    <label for="cust_email">Builder Name</label>
                                    <input type="text" class="form-control @error('builder_name') is-invalid @enderror" id="builder_name" name="builder_name" required value="{{  $customer->builder_name }}">
                                    @error('builder_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                        <label for="cust_email">Project Name</label>
                                        <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{  $customer->project_name }}">
                                        @error('project_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cust_email">Buying Flat / Door no</label>
                                    <input type="text" class="form-control @error('buying_door_no') is-invalid @enderror" id="buying_door_no" name="buying_door_no" required value="{{ $customer->buying_door_no }}">
                                    @error('buying_door_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="property_cost">Total Cost(Property Cost)</label>
                                    <input type="number" class="form-control"  name="property_cost" id="property_cost" required="required"  value="{{ old('property_cost') ?? $customer->property_cost }} " autocomplete="no-fill">
                                    <label for="property_cost_txt" id="property_cost_txt"> </label>
                                    @error('property_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mmr_payable">MMR Payable</label>
                                    <input type="number" class="form-control" id="mmr_payable" name="mmr_payable"  value="{{ old('mmr_payable') ?? $customer->mmr_payable }}" autocomplete="no-fill">
                                    <label for="mmr_payable_txt" id="mmr_payable_txt"> </label>
                                    @error('mmr_payable')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cust_pincode">MMR Paid</label>
                                    <input type="number" class="form-control" id="mmr_paid" name="mmr_paid"  value="{{ old('mmr_paid') ?? $customer->mmr_paid }}">
                                    <label for="mmr_paid_txt" id="mmr_paid_txt"> </label>
                                    @error('mmr_paid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bank_id">Bank</label>
                                    <select name="bank_id" id="bank_id" class="form-control" required>
                                        <option value="">Select Bank</option>
                                        @foreach ($banks as $bank)
                                            @if( $customer->bank_id  == $bank->id )
                                                <option value="{{ $bank->id }}" selected> {{ $bank->bank_name }} </option>
                                            @else
                                                <option value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bank_id">Branch</label>
                                    <input class="form-control" type="text" id="bank_branch" name="bank_branch" />
                                </div>
                            </div>
                        

                          

                        <label> <h2> Primary Applicant </h2></label>
                        <div class="secondary-applicants">
                           <div class="field-group">
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label for="cust_name">Customer Name</label>
                                    <input type="hidden" name="secondary_id[]" value="{{ $customer->id }}" />
                                    <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="cust_name" name="secondary_cust_name[]" required value="{{ $customer->cust_name }}" autocomplete="no-fill">
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="secondary_occupation_id">Customer Occupation</label>
                                    <select name="secondary_occupation_id[]" id="occupation_id" class="form-control" required>
                                        <option value="">Select Occupation</option>
                                        @foreach ($occupations as $occupation)
                                            @if( $customer->occupation_id  == $occupation->id )
                                                <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                            @else
                                                <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="cust_email">E-Mail</label>
                                    <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="cust_email" name="secondary_cust_email[]" required value="{{ $customer->cust_email }}" autocomplete="no-fill">
                                    @error('cust_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cust_phone">Phone Number</label>
                                    <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="secondary_cust_phone[]" required value="{{ $customer->cust_phone }}" autocomplete="no-fill">
                                    @error('cust_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                       
                            <div class="form-row">
                            
                                <div class="form-group col-md-6">
                                    <label for="cust_address">Customer Address</label>
                                    <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="secondary_cust_address[]    " required cols="30" rows="5" autocomplete="no-fill">{{ old('cust_address') ?? $customer->cust_address }}</textarea>
                                    @error('cust_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label for="cust_city">City</label>
                                            <input type="text" class="form-control" id="cust_city" name="secondary_cust_city[]" required value="{{ old('cust_city') ?? $customer->cust_city }}" autocomplete="no-fill">
                                            @error('cust_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row py-3">
                                    <div class="form-group col-md-12">
                                    <label for="cust_pincode">Pincode</label>
                                    <input type="text" class="form-control" id="cust_pincode" name="secondary_cust_pincode[]" required value="{{ old('cust_pincode') ?? $customer->cust_pincode }}" autocomplete="no-fill">
                                    @error('cust_pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                    </div>
                                </div>
                           
                            </div>
                            

                            <div id="secondary-appointment-section" class="secondary">
                            <h4>Schedule an appointment</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="appointment_date" id="datepicker" >
									</div>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_time">Time</label>
                                    <select name="appointment_time" id="appointment_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                    @error('appointment_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type_of_appointment">Appointment Type</label>
                                    <select name="type_of_appointment" id="type_of_appointment" class="form-control">
                                        <option value="">Select Appointment Type</option>
                                        @foreach ($typeofappointments as $type)
                                            <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                            
                        </div>
                              <!-- <a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a> -->
                        </div>
                        @if($secondary_applicants)
                        @foreach($secondary_applicants as $secondary_applicant)
                        <div class="secondary-applicants-edit">
                           <div class="field-group">
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label for="cust_name">Customer Name</label>
                                    <input type="hidden" name="secondary_id[]" value="{{ $secondary_applicant->id }}" />
                                    <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="cust_name" name="secondary_cust_name[]" required value="{{ $secondary_applicant->name }}" autocomplete="no-fill">
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="secondary_occupation_id">Customer Occupation</label>
                                    <select name="secondary_occupation_id[]" id="occupation_id" class="form-control" required>
                                        <option value="">Select Occupation</option>
                                        @foreach ($occupations as $occupation)
                                            @if( $secondary_applicant->occupation_id  == $occupation->id )
                                                <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                            @else
                                                <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="cust_email">E-Mail</label>
                                    <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="cust_email" name="secondary_cust_email[]" required value="{{ $secondary_applicant->email }}" autocomplete="no-fill">
                                    @error('cust_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cust_phone">Phone Number</label>
                                    <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="secondary_cust_phone[]" required value="{{ $secondary_applicant->phone }}" autocomplete="no-fill">
                                    @error('cust_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                       
                            <div class="form-row">
                            
                                <div class="form-group col-md-6">
                                    <label for="cust_address">Customer Address</label>
                                    <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="secondary_cust_address[]    " required cols="30" rows="5" autocomplete="no-fill">{{ old('cust_address') ?? $secondary_applicant->address }}</textarea>
                                    @error('cust_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label for="cust_city">City</label>
                                            <input type="text" class="form-control" id="cust_city" name="secondary_cust_city[]" required value="{{ old('cust_city') ?? $secondary_applicant->city }}" autocomplete="no-fill">
                                            @error('cust_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row py-3">
                                    <div class="form-group col-md-12">
                                    <label for="cust_pincode">Pincode</label>
                                    <input type="text" class="form-control" id="cust_pincode" name="secondary_cust_pincode[]" required value="{{ old('cust_pincode') ?? $secondary_applicant->zipcode }}" autocomplete="no-fill">
                                    @error('cust_pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                    </div>
                                </div>
                           
                              </div>
                            </div>
                            <div class="remove-sec"><a href="javascript:void(0);" class="remove_button_edit">Remove</a></div>
                            
                        </div>
                        @endforeach
                        @endif
                        
                

                          
                        <div class="field_wrapper" id="add-group"></div>
                        <div class="form-row add-more-lnk-sec">
                                <a href="#" class="add-more-link" id="add-more"> <i class="fa fa-plus" aria-hidden="true"></i> Add More Applicants</a>
                                <!-- <input type="button" id="add-more" value="Add More Applicant" class="form-control" /> -->
                        </div>

                          



                           
                        

                     
                       
                        <!-- <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                   
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>&#43;</span> Two Applicant
                                        </button>
                                    </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                       <table class="table table-borderless"> 
                                             <tr>
                                                  <td>
                                                       <label for="cust_name">Customer Name</label>
                                                       <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="two_cust_name" name="twoapplicant[name]" required value="">
                                                  </td>
                                                  <td>
                                                       <label for="cust_phone">Phone Number</label>
                                                       <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="two_cust_phone" name="twoapplicant[phone]" required value="">
                                                  </td>
                                                  <td>
                                                        <label for="cust_email">E-Mail</label>
                                                        <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="two_cust_email" name="twoapplicant[email]" required value="">
                                                  </td>
                                             </tr> 
                                             <tr>
                                                   <td>
                                                        <label for="occupation_id">Customer Occupation</label>
                                                        <select name="twoapplicant[occupation_id]" id="two_occupation_id" class="form-control" required>
                                                            <option value="">Select Occupation</option>
                                                            @foreach ($occupations as $occupation)
                                                                @if( $customer->occupation_id  == $occupation->id )
                                                                    <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                                                @else
                                                                    <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                   </td>
                                                   <td>
                                                         <label for="cust_city">City</label>
                                                         <input type="text" class="form-control" id="two_cust_city" name="twoapplicant[city]" required value="">
                                                   </td>
                                                   <td>
                                                         <label for="cust_pincode">Pincode</label>
                                                         <input type="text" class="form-control" id="two_cust_pincode" name="twoapplicant[pincode]" required value="">
                                                   </td>
                                             </tr>
                                             <tr>
                                                <td colspan="3">
                                                        <label for="cust_address" id="lbl-cust-address">Customer Address
                                                            <span class="same-address">
                                                                    <input class="form-check-input" type="checkbox" value="" id="two-applicant-same-add">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Same as above address
                                                                    </label>
                                                            </span>
                                                        </label> 
                                                        
                                                        <textarea class="form-control" id="two_cust_address" placeholder="1234 Main St" name="twoapplicant[address]" required cols="30" rows="3"></textarea>
                                                </td>
                                             </tr>
                                       </table>
                                       <div id="two-appointment-section" class="twoapplicant">
                                        <h4>Schedule an appointment</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <p>Date Of Appointment</p>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="primary[appointment_date]" id="two-datepicker" >
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="appointment_time">Time</label>
                                                <select name="primary[appointment_time]" id="two_appointment_time" class="form-control">
                                                    <option value="">Select Time</option>
                                                    @foreach ($timeslots as $time)
                                                        <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                                    @endforeach
                                                </select>
                                                @error('appointment_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div  class="form-row ">
                                            <div class="form-group col-md-6">
                                                <label for="two_type_of_appointment">Appointment Type</label>
                                                <select name="primary[type_of_appointment]" id="two_type_of_appointment" class="form-control">
                                                    <option value="">Select Appointment Type</option>
                                                    @foreach ($typeofappointments as $type)
                                                        <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="two_appointment_agent">Agent Name</label>
                                                <select name="primary[appointment_agent]" id="two_appointment_agent" class="form-control"></select>
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                      
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>&#43;</span> Three Applicant
                                        </button>
                                       
                                    </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <table class="table table-borderless"> 
                                             <tr>
                                                  <td>
                                                       <label for="cust_name">Customer Name</label>
                                                       <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="three_cust_name" name="threeapplicant[name]" required value="">
                                                  </td>
                                                  <td>
                                                       <label for="cust_phone">Phone Number</label>
                                                       <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="three_cust_phone" name="threeapplicant[phone]" required value="">
                                                  </td>
                                                  <td>
                                                        <label for="cust_email">E-Mail</label>
                                                        <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="three_cust_email" name="threeapplicant[email]" required value="">
                                                  </td>
                                             </tr>
                                             <tr>
                                                   <td>
                                                        <label for="occupation_id">Customer Occupation</label>
                                                        <select name="threeapplicant[occupation_id]" id="three_occupation_id" class="form-control" required>
                                                            <option value="">Select Occupation</option>
                                                            @foreach ($occupations as $occupation)
                                                                @if( $customer->occupation_id  == $occupation->id )
                                                                    <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                                                @else
                                                                    <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                   </td>
                                                   <td>
                                                         <label for="cust_city">City</label>
                                                         <input type="text" class="form-control" id="three_cust_city" name="threeapplicant[city]" required value="">
                                                   </td>
                                                   <td>
                                                         <label for="cust_pincode">Pincode</label>
                                                         <input type="text" class="form-control" id="three_cust_pincode" name="threeapplicant[pincode]" required value="">
                                                   </td>
                                             </tr>
                                             <tr>
                                                <td colspan="3">
                                                        <label for="cust_address" id="lbl-cust-address">Customer Address
                                                            <span class="same-address">
                                                                    <input class="form-check-input" type="checkbox" value="" id="three-applicant-same-add">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Same as above address
                                                                    </label>
                                                            </span>
                                                        </label> 
                                                        
                                                        <textarea class="form-control" id="three_cust_address" placeholder="1234 Main St" name="threeapplicant[address]" required cols="30" rows="3"></textarea>
                                                </td>
                                             </tr>
                                       </table>
                                       <div id="three-appointment-section" class="threeapplicant">
                                        <h4>Schedule an appointment</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <p>Date Of Appointment</p>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="secondary[appointment_date]" id="three-datepicker" >
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="three_appointment_time">Time</label>
                                                <select name="secondary[appointment_time]" id="three_appointment_time" class="form-control">
                                                    <option value="">Select Time</option>
                                                    @foreach ($timeslots as $time)
                                                        <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                                    @endforeach
                                                </select>
                                                @error('appointment_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div  class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="three_type_of_appointment">Appointment Type</label>
                                                <select name="secondary[type_of_appointment]" id="three_type_of_appointment" class="form-control">
                                                    <option value="">Select Appointment Type</option>
                                                    @foreach ($typeofappointments as $type)
                                                        <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="three_appointment_agent">Agent Name</label>
                                                <select name="secondary[appointment_agent]" id="three_appointment_agent" class="form-control"></select>
                                            </div>

                                        </div>
                                    </div>


                                    </div>
                                    </div>
                                </div>
                        </div> -->
                        

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input interested-check" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                    <label class="form-check-label " for="interested">
                                        Interested in loan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input interested-check" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" id="self-funding" name="self-funding" value="{{ old('self-funding') ?? 1 }}">
                                    <label class="form-check-label" for="self-funding">
                                        Self Funding
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input interested-check" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" id="not-interested" name="not-interested" value="{{ old('not-interested') ?? 1 }}">
                                    <label class="form-check-label" for="interested">
                                       Not Interested 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div  class="form-row not-interested">
                            <div class="form-group col-md-6">
                                <label>Reason for Not Interested</label>
                                <textarea name="reason_not_interest" id="reason_not_interest" width="100%"> </textarea>
                            </div>
                        </div>

                        <div id="appointment-section" class="interested">
                            <h4>Schedule an appointment</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="appointment_date" id="datepicker" >
									</div>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_time">Time</label>
                                    <select name="appointment_time" id="appointment_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                    @error('appointment_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type_of_appointment">Appointment Type</label>
                                    <select name="type_of_appointment" id="type_of_appointment" class="form-control">
                                        <option value="">Select Appointment Type</option>
                                        @foreach ($typeofappointments as $type)
                                            <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="update_newcustomer">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('custom-script')

<script>

    $(document).ready(function(){

        $("#two-applicant-same-add").click(function(){
            if ($(this).is(":checked")) {
               /// var cust_addres = $("#cust_address").val();
                $("#two_cust_address").val($("#cust_address").val());
                $("#two-appointment-section").hide();
            }else{
                $("#two_cust_address").val('');
                $("#two-appointment-section").show();
            }

        });
        $("#three-applicant-same-add").click(function(){
            if ($(this).is(":checked")) {
               /// var cust_addres = $("#cust_address").val();
                $("#three_cust_address").val($("#cust_address").val());
                $("#three-appointment-section").hide();
            }else{
                $("#three_cust_address").val('');
                $("#three-appointment-section").show();
            }

        });


        if ($('#interested').is(":checked")) {
            $("#appointment-section").show();
        } else {
            $("#appointment-section").hide();
        }
        $("#interested").click(function () {
            if ($(this).is(":checked")) {
                $("#appointment-section").show();
            } else {
                $("#appointment-section").hide();
            }
        });

        $("#not-interested").click(function(){
            if($(this).prop('checked') == true){
                $(".not-interested").show();
            }else{
                $(".not-interested").hide();
            }
        })

        $("#property_cost").keyup();
        $("#mmr_payable").keyup();
        $("#mmr_paid").keyup();

    });



    $("#appointment_time").change(function(){
        var date = $("#datepicker").val();
        var time = $("#appointment_time").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data.length);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent").html(selectOptions);
                    }

                }
            });
        }
    });
    $("#two_appointment_time").change(function(){
        var date = $("#two-datepicker").val();
        var time = $("#two_appointment_time").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data.length);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#two_appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#two_appointment_agent").html(selectOptions);
                    }

                }
            });
        }
    });

    $("#three_appointment_time").change(function(){
        var date = $("#three-datepicker").val();
        var time = $("#three_appointment_time").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data.length);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#three_appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#three_appointment_agent").html(selectOptions);
                    }

                }
            });
        }
    });

    $("#update_newcustomer").click(function(){

        if ($('#interested').is(":checked")) {
            var date = $("#datepicker").val();
            var time = $("#appointment_time").val();
            var appoint_type = $("#type_of_appointment").val();
            var agent = $("#appointment_agent").val();
            var occupation = $("#occupation_id").val();

            if(date == ""){
                alert("Select Date");
            }
            if(time == ""){
                alert("Select Time");
            }
            if(appoint_type == ""){
                alert("Select Appointment Type");
            }
            if (agent == "") {
                alert("Select Agent to assign");
            }
            if (occupation == "") {
                alert("Select Occupation of the Customer");
            }

            if(date != "" && time != "" && appoint_type != "" && agent != "" && occupation != ""){
                $("#edit_new_cust_form").submit();
            }
        } else {
            $("#edit_new_cust_form").submit();
        }

    })

    $('input[type="checkbox"]').on('change', function() {
       
        var current_id = $(this).attr('id');
        $('input[type="checkbox"]').each(function(){
           
           if(current_id != $(this).attr('id')){
               $("."+$(this).attr('id')).hide();
           }
        })
       
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });

    $('#appointment_time').focus(function() {
       
        var selectedDate = $("#datepicker").val();
        var myDate = new Date(selectedDate);
        var today = new Date();
        
              
        // if(today == myDate){
        //     alert('yes');

        // }
        // var current_date = date('d M, Y')
        // alert(current_date);
    });

    var wrapper = $('.field_wrapper');
    $("#add-more").click(function(e){
        e.preventDefault();
        var maxField = 10; //Input fields increment limitation
        var fieldHTML = $(".secondary-applicants .field-group").clone().append('<div class="remove-sec"><a href="javascript:void(0);" class="remove_button">Remove</a></div> <hr>');
       
        fieldHTML.find('input').val('');
        fieldHTML.find('textarea').val('');
        var x = 1; 
        $(wrapper).append(fieldHTML);

       

    })
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
       
        $(this).parent().parent('div').remove();
        $(this).remove(); //Remove field html
        x--; //Decrement field counter
    });

    $('.remove_button_edit').on('click',function(e){
        e.preventDefault();
       
        $(this).parent().parent('div').remove();
        $(this).remove(); //Remove field html
        x--; //Decrement field counter
    });


     $("#property_cost").on('keyup',function(){
         var textVal = convertNumberToWords($(this).val());
         $("#property_cost_txt").text(textVal);
        
     })
     $("#mmr_payable").on('keyup',function(){
         var textVal = convertNumberToWords($(this).val());
         $("#mmr_payable_txt").text(textVal);
        
     })
     $("#mmr_paid").on('keyup',function(){
         var textVal = convertNumberToWords($(this).val());
         $("#mmr_paid_txt").text(textVal);
        
     })

     $('input[type="text"]').prop('autocomplete',"no-fill");

    
    

</script>

<style>
#reason_not_interest{
    width:100%;
   
}
.not-interested{
    
    display:none;
}
.interested{
    display:none;
}
span.same-address {
    margin-left: 10%;
}
label#lbl-cust-address {
    width: 100%;
}
#two-appointment-section div#two-datepicker_root {
    margin-top: -410px;
}
div#two-appointment-section {
    padding: 23px;
}
#three-appointment-section div#three-datepicker_root {
    margin-top: -410px;
}
div#three-appointment-section {
    padding: 23px;
}
.form-row.add-more-lnk-sec {
    float: right;
    
    text-decoration: none;
    background-color: antiquewhite;
    padding: 2px;
    border-radius: 18px;
    padding: 2px 10px;
    /* margin-top: -30px; */
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
    /* margin-top: -19px; */
}
</style>

@endsection
