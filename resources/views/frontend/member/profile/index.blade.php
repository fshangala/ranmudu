@extends('frontend.layouts.member_panel')
@section('panel_content')
    @php // $members = \App\User::find(Auth::user()->id); @endphp
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

body{
    font-family: 'Roboto', sans-serif;
}
* {
    margin: 0;
    padding: 0;
}
i {
    margin-right: 10px;
}

/*------------------------*/
input:focus,
button:focus,
.form-control:focus{
    outline: none;
    box-shadow: none;
}
.form-control:disabled, .form-control[readonly]{
    background-color: #fff;
}
/*----------step-wizard------------*/
.d-flex{
    display: flex;
}
.justify-content-center{
    justify-content: center;
}
.align-items-center{
    align-items: center;
}

/*---------signup-step-------------*/
.bg-color{
    background-color: #333;
}
.signup-step-container{
    padding: 150px 0px;
    padding-bottom: 60px;
}




    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard > div.wizard-inner {
            position: relative;
    margin-bottom: 50px;
    text-align: center;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 75%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 15px;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    border-radius: 50%;
    background: #fff;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 16px;
    color: #0e214b;
    font-weight: 500;
    border: 1px solid #ddd;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
        background: #0db02b;
    color: #fff;
    border-color: #0db02b;
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}
.wizard .nav-tabs > li.active > a i{
    color: #0db02b;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: red;
    transition: 0.1s ease-in-out;
}



.wizard .nav-tabs > li a {
    width: 30px;
    height: 30px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
    background-color: transparent;
    position: relative;
    top: 0;
}
.wizard .nav-tabs > li a i{
    position: absolute;
    top: -15px;
    font-style: normal;
    font-weight: 400;
    white-space: nowrap;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
    font-weight: 700;
    color: #000;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 20px;
}


.wizard h3 {
    margin-top: 0;
}
.prev-step,
.next-step{
    font-size: 13px;
    padding: 8px 24px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
}
.next-step{
    background-color: #0db02b;
}
.skip-btn{
    background-color: #cec12d;
}
.step-head{
    font-size: 20px;
    text-align: center;
    font-weight: 500;
    margin-bottom: 20px;
}
.term-check{
    font-size: 14px;
    font-weight: 400;
}
.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 40px;
    margin-bottom: 0;
}
.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 40px;
    margin: 0;
    opacity: 0;
}
.custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: 40px;
    padding: .375rem .75rem;
    font-weight: 400;
    line-height: 2;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: 38px;
    padding: .375rem .75rem;
    line-height: 2;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: inherit;
    border-radius: 0 .25rem .25rem 0;
}
.footer-link{
    margin-top: 30px;
}
.all-info-container{

}
.list-content{
    margin-bottom: 10px;
}
.list-content a{
    padding: 10px 15px;
    width: 100%;
    display: inline-block;
    background-color: #f5f5f5;
    position: relative;
    color: #565656;
    font-weight: 400;
    border-radius: 4px;
}
.list-content a[aria-expanded="true"] i{
    transform: rotate(180deg);
}
.list-content a i{
    text-align: right;
    position: absolute;
    top: 15px;
    right: 10px;
    transition: 0.5s;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #fdfdfd;
}
.list-box{
    padding: 10px;
}
.signup-logo-header .logo_area{
    width: 200px;
}
.signup-logo-header .nav > li{
    padding: 0;
}
.signup-logo-header .header-flex{
    display: flex;
    justify-content: center;
    align-items: center;
}
.list-inline li{
    display: inline-block;
}
.pull-right{
    float: right;
}
/*-----------custom-checkbox-----------*/
/*----------Custom-Checkbox---------*/
input[type="checkbox"]{
    position: relative;
    display: inline-block;
    margin-right: 5px;
}
input[type="checkbox"]::before,
input[type="checkbox"]::after {
    position: absolute;
    content: "";
    display: inline-block;   
}
input[type="checkbox"]::before{
    height: 16px;
    width: 16px;
    border: 1px solid #999;
    left: 0px;
    top: 0px;
    background-color: #fff;
    border-radius: 2px;
}
input[type="checkbox"]::after{
    height: 5px;
    width: 9px;
    left: 4px;
    top: 4px;
}
input[type="checkbox"]:checked::after{
    content: "";
    border-left: 1px solid #fff;
    border-bottom: 1px solid #fff;
    transform: rotate(-45deg);
}
input[type="checkbox"]:checked::before{
    background-color: #18ba60;
    border-color: #18ba60;
}




#uploadLazzyImage {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}


@media (max-width: 767px){
    .sign-content h3{
        font-size: 40px;
    }
    .wizard .nav-tabs > li a i{
        display: none;
    }
    .signup-logo-header .navbar-toggle{
        margin: 0;
        margin-top: 8px;
    }
    .signup-logo-header .logo_area{
        margin-top: 0;
    }
    .signup-logo-header .header-flex{
        display: block;
    }
}
.career_field{}
.carrer_other{
    display: none;
}

    </style>

    <section class="signup-step-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                </li>
                                <!-- <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                </li> -->
                            </ul>
                        </div>
                        @php
                            $present_address      = \App\Models\Address::where('type','present')->where('user_id',$member->id)->first();
                            $present_country_id   = !empty($present_address->country_id) ? $present_address->country_id : "";
                            $present_state_id     = !empty($present_address->state_id) ? $present_address->state_id : "";
                            $present_city_id      = !empty($present_address->city_id) ? $present_address->city_id : "";
                            $present_postal_code  = !empty($present_address->postal_code) ? $present_address->postal_code : "";
                        @endphp
                        @php
                            $permanent_address      = \App\Models\Address::where('type','permanent')->where('user_id',$member->id)->first();
                            $permanent_country_id   = !empty($permanent_address->country_id) ? $permanent_address->country_id : "";
                            $permanent_state_id     = !empty($permanent_address->state_id) ? $permanent_address->state_id : "";
                            $permanent_city_id      = !empty($permanent_address->city_id) ? $permanent_address->city_id : "";
                            $permanent_postal_code  = !empty($permanent_address->postal_code) ? $permanent_address->postal_code : "";
                        @endphp
                        @php
                            $member_religion_id   = !empty($member->spiritual_backgrounds->religion_id) ? $member->spiritual_backgrounds->religion_id : "";
                            $member_ethnicity_id   = !empty($member->spiritual_backgrounds->ethnicity_id) ? $member->spiritual_backgrounds->ethnicity_id : "";
                            $member_caste_id      = !empty($member->spiritual_backgrounds->caste_id) ? $member->spiritual_backgrounds->caste_id : "";
                            $member_sub_caste_id  = !empty($member->spiritual_backgrounds->sub_caste_id) ? $member->spiritual_backgrounds->sub_caste_id : "";
                        @endphp
                        @php
                            $partner_religion_id   = !empty($member->partner_expectations->religion_id) ? $member->partner_expectations->religion_id : "";
                            $partner_caste_id      = !empty($member->partner_expectations->caste_id) ? $member->partner_expectations->caste_id : "";
                            $partner_sub_caste_id  = !empty($member->partner_expectations->sub_caste_id) ? $member->partner_expectations->sub_caste_id : "";
                            $partner_country_id    = !empty($member->partner_expectations->preferred_country_id) ? $member->partner_expectations->preferred_country_id : "";
                            $partner_state_id      = !empty($member->partner_expectations->preferred_state_id) ? $member->partner_expectations->preferred_state_id : "";
                        @endphp
                        @php 
                        $all_education=\Illuminate\Support\Facades\DB::table('education_career')->where('type','education')->get();
                       // $all_fields=\Illuminate\Support\Facades\DB::table('education_career')->where('type','field')->get();
                        $all_careers=\Illuminate\Support\Facades\DB::table('education_career')->where('type','career')->get();
                        $get_selected_education_career=\Illuminate\Support\Facades\DB::table('selected_education_career')->where('user_id',Auth::user()->id)->get();
                         //  $s_education=$get_selected_education_career['type']=="education"
                        foreach($get_selected_education_career as $i){
                          if($i->type=='education')
                            $s_education=$i->education_career_id;
                           // else if($i->type=='field')
                           // $s_field=$i->education_career_id;
                            else 
                            $s_career=$i->education_career_id;
                            $s_career_detail=$i->carrer_detail;

                        }

                        

                        @endphp
                        <!-- <form role="form" action="index.html" class="login-box"> -->
                            <div class="tab-content" id="main_form">
                                <div class="tab-pane " role="tabpanel" id="step2">
                                    <div class="show-step-2 form-group text-danger p-0 ml-2">

                                    </div>
                                    <!-- <h4 class="text-center">Step 1</h4> -->
                                   

                            
                            <!-- <form action="{{ route('member.introduction.update', $member->member->id) }}" method="POST"> -->
                                <!-- @csrf -->
                                <div class="form-group row">
                                    <label class="col-md-12 col-form-label">{{translate('Introduction')}}</label>
                                    <div class="col-md-12">
                                        <textarea type="text" name="introduction" id="introduction" class="form-control" rows="4" placeholder="{{translate('Introduction')}}" required>{{ $member->member->introduction }}</textarea>
                                    </div>
                                </div>
                                <!-- <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
                                </div> -->
                            <!-- </form> -->
                            <!-- @if(get_setting('member_education_section') == 'on')
                            @include('frontend.member.profile.education.index')
                            @endif -->
                <form action="{{ route('education-career.store') }}" method="POST" id="education_career_form">
                    
                    @csrf
                    <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Education and Careers')}}</h5>
                    </div>
                    <input type="text" hidden name="data_updation" value="data_updation">
                        <div class="form-group row">
                                <div class="col-md-6">
                             <label class="col-md-12 col-form-label">{{translate('Education')}}</label>
                             <div class="col-12 form-group">
                             <select  class="form-control aiz-selectpicker" name="education_input" id="education" data-live-search="true">
                                 <option  disabled selected>select education</option>
                                @foreach($all_education as $key=>$edu)
                                  <option @if(!empty($s_education)) @if($s_education == $edu->id) selected @endif @endif value="{{$edu->id}}">{{$edu->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                </div>
                                <!-- <div class="col-6">
                             <label class="col-md-12 col-form-label">{{translate('Education Field')}}</label>
                             <div class="col-12 form-group">
                             <select  class="form-control aiz-selectpicker" name="edu_field" id="edu_field">
                                 <option  disabled selected>select field</option>
                             
                                </select>
                                </div>
                             </div> -->
                             <div class="col-md-6">
                             <label class="col-md-12 col-form-label">{{translate('Career')}}</label>
                             <div class="col-12 form-group">
                             <select  class="form-control aiz-selectpicker" id="career_field" name="career_field" data-live-search="true" onchange="showOthrCarrerDetail()">
                                 <option  disabled selected>select career</option>
                                @foreach($all_careers as $keys=>$edu)
                                  <option  @if(!empty($s_career)) @if($s_career == $edu->id) selected @endif @endif value="{{$edu->id}}">{{$edu->name}}</option>
                                @endforeach
                                </select>
                                </div>
                             </div>

                             <div class="col-md-6 carrer_other" >
                                 <label class="col-md-12 col-form-label">{{translate('carrer detail')}}</label>
                                 <div class="col-12 form-group">
                                    <input type="text" name="carrer_detail" value="{{ !empty($s_career_detail) ? $s_career_detail : "" }}" class="form-control" placeholder="{{translate('carrer detail')}}" required>
                                </div>
                            </div>


                         </div>
                    </div>
                    <!-- <button type="submit">Add</button> -->
                </form>
                 <!-- Career -->     
   
                            <!-- @if(get_setting('member_career_section') == 'on')
                                @include('frontend.member.profile.career.index')
                            @endif -->
                            @if(get_setting('member_physical_attributes_section') == 'on')
                                @include('frontend.member.profile.physical_attributes')
                            @endif
                            @if(get_setting('member_spiritual_and_social_background_section') == 'on')
                                @include('frontend.member.profile.spiritual_backgrounds')
                            @endif

                            <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                        <!-- <li> <button type="submit" onclick="submit_single_form(`{{ route('member.introduction.update', $member->member->id) }}`,{introduction:$('#introduction').val(),_token:'{{csrf_token()}}'},2)" class="btn btn-primary btn-sm"><span id="button_text_2">{{translate('save')}}</span> <span id="button_spinner_2" style="display: none;" class=" loading">
                                     <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                     {{ translate('saving...') }}
                                        </span></button> </li> -->
                                        <li> <button type="submit"  onclick="counts=0;submit_single_form(`{{ route('member.introduction.update', $member->member->id) }}`,{_token:'{{csrf_token()}}',introduction:$('#introduction').val()},2,'',1,4);submit_single_form(`{{ route('physical-attribute.update', $member->id) }}`,$('#physical_attribute_form').serialize(),2,'',1,4);submit_single_form(`{{ route('spiritual_backgrounds.update', $member->id) }}`,$('#spirtual_background_from').serialize(),2,'next_step',1,4);submit_single_form(`{{ route('education-career.store') }}`,$('#education_career_form').serialize(),2,'',1,4,next=3); checkValidityOfMemberProfile();" class="btn btn-primary  btn-lg"><span id="button_text_2">{{translate('Next')}}</span> <span id="button_spinner_2" style="display: none;" class=" loading">
                                     <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                     {{ translate('saving...') }}
                                    </span></button> </li>
                                        <!-- <li><button type="button" class="default-btn next-step">Continue</button></li> -->
                                    </ul>
                                   
                                </div>
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                
                                <div class="show-step-1 form-group text-danger p-0 ml-2">

                                </div>  
                                    <!-- <h4 class="text-center">Step 2</h4> -->
                                    <!-- <div class="row"> -->
                                    @include('frontend.member.profile.basic_info')
                                   {{-- @if(get_setting('member_residency_information_section') == 'on')
                                             @include('frontend.member.profile.residency_information')
                                     @endif --}}
                                     @if(get_setting('member_present_address_section') == 'on')
                                                 @include('frontend.member.profile.present_address')
                                                @endif
                                    @if(get_setting('member_language_section') == 'on')
                                        @include('frontend.member.profile.language')
                                    @endif
                                    @if(get_setting('member_life_style_section') == 'on')
                                         @include('frontend.member.profile.lifestyle')
                                    @endif
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 1 *</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City / Town *</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country *</label> 
                                            <select name="country" class="form-control" id="country">
                                                <option value="NG" selected="selected">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="KP">North Korea</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                            </select>
                                        </div>
                                    </div>
                                     -->
                                    
                                    
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Registration No.</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div>-->
                                   <!-- </div> -->
                                     
                                    
                                   <ul class="list-inline pull-right">
                                       <li> <button type="submit"  onclick="counts=0;submit_single_form(`{{ route('member.basic_info_update', $member->id) }}`,$('#basic_info_form').serialize(),3,'',1,5);submit_single_form(`{{ route('user.change.email') }}`,{email:$('#email_field').val(),_token:'{{csrf_token()}}'},3,'',1,5);submit_single_form(`{{ route('member.language_info_update', $member->id) }}`,$('#language-form').serialize(),3,'',1,5);submit_single_form(`{{ route('address.update', $member->id) }}`,$('#present_address_form').serialize(),3,'',1,5);submit_single_form(`{{ route('lifestyles.update', $member->id) }}`,$('#lifestyle-form').serialize(),3,'next_step',1,5); checkValidityOfMemberProfile();" class="btn btn-primary  btn-lg"><span id="button_text_1">{{translate('Next')}}</span> <span id="button_spinner_1" style="display: none;" class=" loading">
                                     <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                     {{ translate('saving...') }}
                                    </span></button> </li>
                                        <!-- <li><button type="button"  class="default-btn  next-step text-white">Continue to next step</button></li> -->
                                        
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <!-- <h4 class="text-center">Step 3</h4> -->
                                    <div class="show-step-3 form-group text-danger p-0 ml-2">

                                    </div>
                                     
                                    @if(get_setting('member_astronomic_information_section') == 'on')
                                        @include('frontend.member.profile.astronomic_information')
                                    @endif
                                    @if(get_setting('member_family_information_section') == 'on')
                                        @include('frontend.member.profile.family_information')
                                    @endif
                                    @if(get_setting('member_partner_expectation_section') == 'on')
                                        @include('frontend.member.profile.partner_expectation')
                                    @endif
                                   

                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Name *</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Demo</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Inout</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Information</label> 
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile">Select file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number *</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Input Number</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div> -->
                                       <!-- </div> -->
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                        <li> <button type="submit"  onclick="counts=0;submit_single_form(`{{ route('astrologies.update', $member->id) }}`,$('#astrologist-form').serialize(),3,'',1,3);submit_single_form(`{{ route('families.update', $member->id) }}`,$('#family-info-form').serialize(),3,'',1,3);submit_single_form(`{{ route('partner_expectations.update', $member->id) }}`,$('#partner-expetation-form').serialize(),3,'next_step',1,3);checkValidityOfMemberProfile();" class="btn btn-primary ml-2 mr-2"><span id="button_text_3">{{translate('Next')}}</span> <span id="button_spinner_3" style="display: none;" class=" loading">
                                     <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                                     {{ translate('saving...') }}
                                    </span></button> </li>
                                        <!-- <li><button type="button" class="default-btn next-step">Continue</button></li> -->
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <!-- <h4 class="text-center">Step 4</h4> -->

                                    <div class="all-info-container">
                                        @php 
                                        $packages = App\Models\Package::where('active', '1')->get();
                                        @endphp
          
                     <div class="row">               <!-- <div class="aiz-carousel" data-items="4" data-xl-items="3" data-md-items="3" data-sm-items="1" data-dots='true' data-infinite='true' data-autoplay='true'> -->
            @foreach ($packages as $key => $package)
            <div class="col-md-4 col-sm-12 p-0"  style="width:fit-content" >
            <!-- <div class="card-body"> -->
                    <div class="overflow-hidden shadow-none border-right">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <img class="mw-100 mx-auto mb-4" src="{{ uploaded_asset($package->image) }}" height="130">
                                <h5 class="mb-3 h5 fw-600">{{$package->name}}</h5>
                            </div>
                            <ul class="list-group list-group-raw fs-15 mb-5">
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ $package->express_interest }} {{ translate('Express Interests') }}
                                </li>
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ $package->photo_gallery }} {{ translate('Gallery Photo Upload') }}
                                </li>
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ $package->contact }} {{ translate('Contact Info View') }}
                                </li>
                                @if(get_setting('profile_picture_privacy') == 'only_me')
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ $package->profile_image_view }} {{ translate('Profile Image View') }}
                                </li>
                                @endif
                                @if(get_setting('gallery_image_privacy') == 'only_me')
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ $package->gallery_image_view }} {{ translate('Gallery Image View') }}
                                </li>
                                @endif
                                <li class="list-group-item py-2 text-line-through">
                                    @if( $package->auto_profile_match == 0 )
                                        <i class="las la-times text-danger mr-2"></i>
                                        <del class="opacity-60">{{ translate('Show Auto Profile Match') }}</del>
                                    @else
                                        <i class="las la-check text-success mr-2"></i>
                                        {{ translate('Show Auto Profile Match') }}
                                    @endif
                                </li>
                            </ul>
                            <div class="mb-5 text-dark  text-center">
                                @if ($package->id == 1)
                                    <span class=" fw-300 lh-1 mb-0" style="font-size: 50px;">{{ translate('Free') }}</span>
                                @else
                                    <span class=" fw-300 lh-1 mb-0" style="font-size: 50px;">{{single_price($package->price)}}</span>
                                @endif
                                <span class="text-secondary d-block">{{$package->validity}} {{translate('Days')}}</span>
                            </div>
                            <div class="text-center">
                                @if ($package->id != 1)
                                    @if(Auth::check())
                                        <a href="{{ route('package_payment_methods', encrypt($package->id)) }}" type="submit" class="btn btn-primary" >{{translate('Purchase This Package')}}</a>
                                    @else
                                        <button type="submit" onclick="loginModal()" class="btn btn-primary" >{{translate('Purchase This Package')}}</button>
                                    @endif
                                @else
                                    <a href="javascript:void(0);" class="btn btn-light" ><del>{{translate('Purchase This Package')}}</del></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            @endforeach
            </div>    
                                        
        <!-- </div> -->
                                        <!-- <div class="list-content">
                                            <a href="#listone" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Permanent Address <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listone">
                                                <div class="list-box">
                                                @if(get_setting('member_permanent_address_section') == 'on')
                                                         @include('frontend.member.profile.permanent_address')
                                                 @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <a href="#listtwo" data-toggle="collapse" aria-expanded="false" aria-controls="listtwo">Present Address <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listtwo">
                                                <div class="list-box">
                                              
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="list-content">
                                            <a href="#listthree" data-toggle="collapse" aria-expanded="false" aria-controls="listthree">Residency Information<i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listthree">
                                                <div class="list-box">
                                                @if(get_setting('member_residency_information_section') == 'on')
                                                    @include('frontend.member.profile.residency_information')
                                                @endif

                                                </div>
                                            </div>
                                        </div> -->
                                       
                                    </div>
                                      <div>
<a href="/dashboard" class="btn btn-primary" style="text-align:center" >Purchase Later</a>
</div>
                                    <!-- <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" class="default-btn next-step">Finish</button></li>
                                    </ul> -->
                                </div>
                                <div class="clearfix"></div>
                            
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>	
   <!--   <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Introduction')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('member.introduction.update', $member->member->id) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">{{translate('Introduction')}}</label>
                    <div class="col-md-10">
                        <textarea type="text" name="introduction" class="form-control" rows="4" placeholder="{{translate('Introduction')}}" required>{{ $member->member->introduction }}</textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
                </div>
            </form>
        </div>
    </div> -->

    <!-- Email Change -->
  <!--   <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Change your email')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('user.change.email') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <label>{{ translate('Your Email') }}</label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="{{ translate('Your Email')}}" name="email" value="{{ Auth::user()->email }}" />
                          <div class="input-group-append">
                             <button type="button" class="btn btn-outline-secondary new-email-verification">
                                 <span class="d-none loading">
                                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                     {{ translate('Sending Email...') }}
                                 </span>
                                 <span class="default">{{ translate('Verify') }}</span>
                             </button>
                          </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Update')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <!-- Basic Information -->

    <!-- Present Address -->


    <!-- Education -->


    <!-- Career -->


    <!-- Physical Attributes -->


    <!-- Language -->


    <!-- Hobbies  -->
    <!--    @if(get_setting('member_hobbies_and_interests_section') == 'on')
      @include('frontend.member.profile.hobbies_interest')
    @endif -->

    <!-- Personal Attitude & Behavior -->
   <!--     @if(get_setting('member_personal_attitude_and_behavior_section') == 'on')
      @include('frontend.member.profile.attitudes_behavior')
    @endif -->

    <!-- Residency Information -->


    <!-- Spiritual & Social Background -->


    <!-- Life Style -->
 <!--    @if(get_setting('member_life_style_section') == 'on')
      @include('frontend.member.profile.lifestyle')
    @endif -->

    <!-- Astronomic Information  -->


    <!-- Permanent Address -->
    @php
//        $permanent_address      = \App\Models\Address::where('type','permanent')->where('user_id',$member->id)->first();
//        $permanent_country_id   = !empty($permanent_address->country_id) ? $permanent_address->country_id : "";
//        $permanent_state_id     = !empty($permanent_address->state_id) ? $permanent_address->state_id : "";
//        $permanent_city_id      = !empty($permanent_address->city_id) ? $permanent_address->city_id : "";
 //       $permanent_postal_code  = !empty($permanent_address->postal_code) ? $permanent_address->postal_code : "";
    @endphp


    <!-- Family Information -->


    <!-- Partner Expectation -->


@endsection

@section('modal')
    @include('modals.create_edit_modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function(){
         get_states_by_country_for_present_address();
         get_cities_by_state_for_present_address();
         get_states_by_country_for_permanent_address();
         get_cities_by_state_for_permanent_address();
         get_castes_by_religion_for_member();
         get_sub_castes_by_caste_for_member();
         get_castes_by_religion_for_partner();
         get_sub_castes_by_caste_for_partner();
         get_states_by_country_for_partner();
         showOthrCarrerDetail();
    });

    function showOthrCarrerDetail(){
        var selectedText = $( "#career_field option:selected" ).text().toLowerCase();
        if(selectedText=='other'){
            $(".carrer_other").css({ 'display' : 'block'});
        }else{
            $(".carrer_other").css({ 'display' : 'none' });
        }
    }
    // For Present address
    function get_states_by_country_for_present_address(){
        var present_country_id = $('#present_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:present_country_id}, function(data){
                $('#present_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#present_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#present_state_id > option").each(function() {
                    if(this.value == '{{$present_state_id}}'){
                        $("#present_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_present_address();
            });
        }

    function get_cities_by_state_for_present_address(){
		var present_state_id = $('#present_state_id').val();
    		$.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:present_state_id}, function(data){
    		    $('#present_city_id').html(null);
    		    for (var i = 0; i < data.length; i++) {
    		        $('#present_city_id').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		    $("#present_city_id > option").each(function() {
    		        if(this.value == '{{$present_city_id}}'){
    		            $("#present_city_id").val(this.value).change();
    		        }
    		    });

    		    AIZ.plugins.bootstrapSelect('refresh');
    		});
    	}

    $('#present_country_id').on('change', function() {
  	    get_states_by_country_for_present_address();
  	});

    $('#present_state_id').on('change', function() {
  	    get_cities_by_state_for_present_address();
  	});

    // For permanent address
    function get_states_by_country_for_permanent_address(){
        var permanent_country_id = $('#permanent_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:permanent_country_id}, function(data){
                $('#permanent_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_state_id > option").each(function() {
                    if(this.value == '{{$permanent_state_id}}'){
                        $("#permanent_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_permanent_address();
            });
    }

    function get_cities_by_state_for_permanent_address(){
        var permanent_state_id = $('#permanent_state_id').val();
            $.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:permanent_state_id}, function(data){
                $('#permanent_city_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_city_id > option").each(function() {
                    if(this.value == '{{$permanent_city_id}}'){
                        $("#permanent_city_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#permanent_country_id').on('change', function() {
        get_states_by_country_for_permanent_address();
    });

    $('#permanent_state_id').on('change', function() {
        get_cities_by_state_for_permanent_address();
    });

    // get castes and subcastes For member
    function get_castes_by_religion_for_member(){
        var member_religion_id = $('#member_religion_id').val();
            $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:member_religion_id}, function(data){
                $('#member_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_caste_id > option").each(function() {
                    if(this.value == '{{$member_caste_id}}'){
                        $("#member_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_member();
            });
        }

    function get_sub_castes_by_caste_for_member(){
        var member_caste_id = $('#member_caste_id').val();
            $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:member_caste_id}, function(data){
                $('#member_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_sub_caste_id > option").each(function() {
                    if(this.value == '{{$member_sub_caste_id}}'){
                        $("#member_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#member_religion_id').on('change', function() {
        get_castes_by_religion_for_member();
    });

    $('#member_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_member();
    });

    // get castes and subcastes For partner
    function get_castes_by_religion_for_partner(){
        var partner_religion_id = $('#partner_religion_id').val();
            $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:partner_religion_id}, function(data){
                $('#partner_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_caste_id > option").each(function() {
                    if(this.value == '{{$partner_caste_id}}'){
                        $("#partner_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_partner();
            });
        }

    function get_sub_castes_by_caste_for_partner(){
        var partner_caste_id = $('#partner_caste_id').val();
            $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:partner_caste_id}, function(data){
                $('#partner_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_sub_caste_id > option").each(function() {
                    if(this.value == '{{$partner_sub_caste_id}}'){
                        $("#partner_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#partner_religion_id').on('change', function() {
        get_castes_by_religion_for_partner();
    });

    $('#partner_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_partner();
    });

    // For partner address
    function get_states_by_country_for_partner(){
        var partner_country_id = $('#partner_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:partner_country_id}, function(data){
                $('#partner_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_state_id > option").each(function() {
                    if(this.value == '{{$partner_state_id}}'){
                        $("#partner_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#partner_country_id').on('change', function() {
        get_states_by_country_for_partner();
    });

    //  education Add edit , status change
    function education_add_modal(id){
       $.post('{{ route('education.create') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function education_edit_modal(id){
        $.post('{{ route('education.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_education_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('education.update_education_present_status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
 //               location.reload();
             AIZ.plugins.notify('success', 'saved');
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }


    //  Career Add edit , status change
    function career_add_modal(id){
       $.post('{{ route('career.create') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function career_edit_modal(id){
        $.post('{{ route('career.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_career_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('career.update_career_present_status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
 //               location.reload();
               AIZ.plugins.notify('success', 'saved');
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }

    $('.new-email-verification').on('click', function() {
        $(this).find('.loading').removeClass('d-none');
        $(this).find('.default').addClass('d-none');
        var email = $("input[name=email]").val();

        $.post('{{ route('user.new.verify') }}', {_token:'{{ csrf_token() }}', email: email}, function(data){
            data = JSON.parse(data);
            $('.default').removeClass('d-none');
            $('.loading').addClass('d-none');
            if(data.status == 2)
                AIZ.plugins.notify('warning', data.message);
            else if(data.status == 1)
                AIZ.plugins.notify('success', data.message);
            else
                AIZ.plugins.notify('danger', data.message);
        });
    });

    $(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });
   

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});
 function next_step(){
        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);
    }
function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});

function submit_full_form(){
    $.post("{{ route('member.basic_info_update', $member->id) }}",$('#basic_info_form').serialize(),function(data,status){
    $.post("{{ route('member.introduction.update', $member->member->id) }}",{introduction:$('#introduction').val(),_token:'{{csrf_token()}}'},function(data,status){
         $.post("{{ route('user.change.email') }}",{email:$('#email_field').val(),_token:'{{csrf_token()}}'},function(data,status){
        //     $.post('',{},function(data,status){
        //         $.post('',{},function(data,status){
        //             $.post('',{},function(data,status){
        
        //             })
        //         })
        //     })
         })
      })
    })
}
//  save forms per submit---------------------------------------------------------
let counts=0;
        function submit_single_form(url,data,button,fun,count,total,next=0){
          //  alert(button);
            $('button').prop('disabled',true);
            $('#button_text_'+button).hide();
            $('#button_spinner_'+button).show();
            $.post(url,data,function(data,status){
                checkValidityOfMemberProfile();
               console.log(data);
               // alert($.parseJSON(data).response);
         //   alert(data);
           // alert(status);
           if(data.code==='error'){
            AIZ.plugins.notify('danger', data.message+' '+data.page);
           }
           else if(data.code==='success'){
             //  alert(total);
             
            
             setTimeout(function(){
                counts=counts+count;
               // alert(counts);
                if(total==counts && $('.show-step-'+button).text().trim().length===0){
                   next_step();
               }
             },1000);
             
               
             //alert(counts);
               
               // AIZ.plugins.notify('success', data.message+' '+data.page);
                $("html, body").animate({ scrollTop: 0 }, "slow");
             //  if(fun != undefined && fun !='') window[fun]();
             if (next > 0){
                window.location.assign(`#step${next}`)
             }
            
           }
       
                $('button').prop('disabled',false);
                $('#button_text_'+button).show();
                $('#button_spinner_'+button).hide();
            })
        }
//  save forms per submit ends---------------------------------------------------------
// step 1 form submition ---------------------------------------------------------------

    //   function step1_submit(){
    //     $('button').prop('disabled',true);
    //         $('#button_text_1').hide();
    //         $('#button_spinner_1').show();
    //         $.post("",,function(data,status){
    //             if(status==='success'){
    //                 $.post("",,function(data,status){
    //                     if(status==='success'){
    //                         $.post("",,function(data,status){
    //                             if(status==='success'){
    //                                 $.post("",,function(data,status){
    //                                         if(status==='success'){

    //                                         }
    //                                         else 
    //                                         AIZ.plugins.notify('danger', 'Something went wrong in');
    //                                     })
    //                             }
    //                             else 
    //                             AIZ.plugins.notify('danger', 'Something went wrong in');
    //                         })
    //                     }
    //                     else 
    //                     AIZ.plugins.notify('danger', 'Something went wrong in');
    //                 })
    //             }
    //             else 
    //             AIZ.plugins.notify('danger', 'Something went wrong in');
    //         })
    //   }

// step 1 form end -----------------------------------------------------------------
$('#image_form').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
              //  console.log(data[0]);
              //  console.log('{{url("/public")}}/'+data[0]);
                $('.selected-files').val(data[1]);
                $('#imageResult').attr('src','{{url("/public")}}/'+data[0]);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));
    checkValidityOfMemberProfile();
    function checkValidityOfMemberProfile(){
            // alert('working');
            $.get('{{url("profile-validate")}}',function(data){
                if(data==1){
           //         window.location.href=url;
           $('.show-step-2').html('');
                  $('.show-step-3').html('');
                 $('.show-step-1').html('');
                }
                else {
                   // $('.validationModel').modal('show');
                  // alerthtml('');
                  $('.show-step-2').html(data);
                  $('.show-step-3').html(data);
                 $('.show-step-1').html(data);
                
                  appendTextinsteps('.show-step-1','.step-1');
                  appendTextinsteps('.show-step-2','.step-2');
                  appendTextinsteps('.show-step-3','.step-3');
               
                }
     //alert(data);
    //console.log(data);
 })
        }
function appendTextinsteps(class1,class2){
    var obj = $(class1+' '+ class2).text().split('.');
          var string='';
          for(var i=0;i<obj.length;i++){
              string= string+obj[i]+'<br>';
              console.log(string);
          }
        
          $(class1).text('');
          $(class1).html(string);
       
          string='';
}

        
        var isPhoneShown = true,
        countryData = window.intlTelInputGlobals.getCountryData(),
        input = document.querySelector("#phone-code");
        var countryIso2;
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if(country.dialCode == '<?= $member->country_code ?>'){
                countryIso2 = country.iso2;
            }
        }




        var iti = intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                if(countryIso2){
                    callback(countryIso2);
                }else{
                    var countryCode = (resp && resp.country) ? resp.country : "us";
                    callback(countryCode);
                }
                
            });
            setTimeout(function() { 
                $('input[name=phone]').val('<?= $member->phone ?>');
            }, 1000);
        },
        separateDialCode: true,
        utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
        onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if(selectedCountryData.iso2 == 'bd'){
                    return "01xxxxxxxxx";
                }
            return selectedCountryPlaceholder;
        }
    });


    input.addEventListener("countrychange", function(e) {
        // var currentMask = e.currentTarget.placeholder;
        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);
    });
   
   $phone = '<?= $member->phone ?>';
    $email = '<?= $member->email ?>';
    
    if($phone) {
        setTimeout(function() { 
            $('input[name=phone]').prop('readonly', true);
        }, 2000);
    }
    if($email) {
       setTimeout(function() { 
            $('input[name=email]').prop('readonly', true);
        }, 2000);
    }
</script>
@endsection
