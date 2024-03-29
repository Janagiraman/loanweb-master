@extends('layouts.back-office')

@section('breadcrum')
    Applicant Details

@stop

@section('main-content')
<div class="content">
{{-- {{ dd($input) }} --}}
    <form action="{{ url('back-office/eligibilities/eligibility') }}" method="post">
        @csrf
        <input type="hidden" name="companyType"  value="{{ $input['company'] }}">
        <input type="hidden" name="cibilScore"  value="{{ $input['cibilScore'] }}">
        @if ($input['noOfApplicants'] == 1)
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 1</h5>
                    </div>
                    <input type="hidden" name="applicant1" id="" value="1">
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                               

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross / Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome1" class="form-control str_convert" id="gross_income" placeholder="Gross Income">
                                            <label for="gross_income_txt" id="gross_income_txt"> </label>
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome1" class="form-control str_convert" id="net_salary" placeholder="Net Income">
                                            <label for="net_salary_txt" id="net_salary_txt"> </label>
                                        </div>
                                    </div>
                                @endif --}}


                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr1" class="form-control str_convert" id="rental_itr1" placeholder="Rental Income">
                                        <label for="rental_itr1_txt" id="rental_itr1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr1" id="rental_non_itrl1" class="form-control str_convert" placeholder="Rental Income 2">
                                        <label for="rental_non_itrl1_txt" id="rental_non_itrl1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT1" id="variable_overtime" class="form-control str_convert" placeholder="Variable Overtime">
                                        <label for="variable_overtime_txt" id="variable_overtime_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat1" id="fixed_incentive_qtr" class="form-control str_convert" placeholder="FIXED INCENTIVES QUARTERLY">
                                        <label for="fixed_incentive_qtr_txt" id="fixed_incentive_qtr_txt"> </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat1" id="variable_incentive_quat1" class="form-control str_convert" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                        <label for="variable_incentive_quat1_txt" id="variable_incentive_quat1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf1" id="variable_incentive_half1" class="form-control str_convert" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                        <label for="variable_incentive_half1_txt" id="variable_incentive_half1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear1" id="variable_incentive_year1" class="form-control str_convert" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                        <label for="variable_incentive_year1_txt" id="variable_incentive_year1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Interest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend1" id="interest_dividend1" class="form-control str_convert" placeholder="Income from Interest / Dividend">
                                        <label for="interest_dividend1_txt" id="interest_dividend1_txt"> </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant1" class="form-control" placeholder="Age of applicant" value="{{ $input['age'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome1" id="agricultural_income1" class="form-control str_convert" placeholder="AGRICULTURAL INCOME">
                                        <label for="agricultural_income1_txt" id="agricultural_income1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New1" id="lic_50new1" class="form-control str_convert" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                        <label for="lic_50new1_txt" id="lic_50new1_txt"> </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew1" id="lic_100_renew" class="form-control str_convert" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                        <label for="lic_100_renew_txt" id="lic_100_renew_txt"> </label>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources1" id="other_sources1" class="form-control str_convert" placeholder="Other Income">
                                        <label for="other_sources1_txt" id="other_sources1_txt"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans1" id="all_loans1" class="form-control str_convert" placeholder="Any loans">
                                            <label for="all_loans1_txt" id="all_loans1_txt"> </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills1" id="credit_card_bill1" class="form-control str_convert" placeholder="Credit Card Emi">
                                            <label for="credit_card_bill1_txt" id="credit_card_bill1_txt"> </label>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
        @elseif ($input['noOfApplicants'] == 2)
            
            <input type="hidden" name="applicant2" id="" value="2">
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Aplicant 1</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome1" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome1" class="form-control" placeholder="Net Income">
                                        </div>
                                    </div>
                                @endif --}}


                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT1" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat1" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear1" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Interest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend1" class="form-control" placeholder="Income from Interest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant1" class="form-control" placeholder="Age of applicant" value="{{ $input['age'] }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome1" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources1" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills1" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Aplicant 2</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                @endif --}}

                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr2" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr2" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT2" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat2" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear2" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Interest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend2" class="form-control" placeholder="Income from Interest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant2" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome2" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources2" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans2" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills2" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
        @else
            <input type="hidden" name="applicant3" id="" value="3">
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Aplicant 1</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome1" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome1" class="form-control" placeholder="Net Income">
                                        </div>
                                    </div>
                                @endif --}}


                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT1" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat1" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear1" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Interest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend1" class="form-control" placeholder="Income from Interest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant1" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome1" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources1" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills1" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Aplicant 2</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                @endif --}}

                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr2" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr2" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT2" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat2" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear2" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Interest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend2" class="form-control" placeholder="Income from Interest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant2" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome2" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources2" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans2" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills2" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Aplicant 3</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome3" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group ">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome3" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                @endif --}}

                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr3" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr3" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT3" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat3" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat3" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf3" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear3" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Interest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend3" class="form-control" placeholder="Income from Interest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant3" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome3" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New3" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew3" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources3" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans3" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills3" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
        @endif
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Other Details</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Other Details </legend>

                                @if ($input['cibilScore'] > 800 || $input['company'] != '' || $input['buyCompany'] != '')

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rate Of Interest</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="rateOfInterest" value="{{$input['interest']}}"  class="form-control" placeholder="Rate Of Interest">
                                        </div>
                                    </div>

                                @else

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rate Of Interest</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="rateOfInterest" value="9.15"  class="form-control" placeholder="Rate Of Interest">
                                        </div>
                                    </div>

                                @endif


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Loan Tenure</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="loanTenure" class="form-control" placeholder="Loan Tenure">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Cost Of The Property</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="costOfProperty" id="cost_of_property" class="form-control str_convert" placeholder="Cost Of The Property">
                                        <label for="cost_of_property_txt" id="cost_of_property_txt"> </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Loan Amount Requested</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="loanRequested" id="loan_required" class="form-control str_convert" placeholder="Loan Amount Requested">
                                        <label for="loan_required_txt" id="loan_required_txt"> </label>

                                    </div>
                                </div>

                            </fieldset>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Proceed <i class="icon-paperplane ml-2"></i></button>
                            </div>
                          

                        </div>
                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>



    </form>
    <button class="btn btn-secondary" onclick="window.history.back();">Go Back</button>
</div>
@endsection
@section('custom-script')


<script>

   $(".str_convert").on('keyup',function(){
         var selectId = $(this).attr('id');
         var textVal = convertNumberToWords($(this).val());
         $("#"+selectId+'_txt').text(textVal);
        
     })
</script>

@endsection

