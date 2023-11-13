<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Astrology;
use App\Models\Attitude;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Package;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Religion;
use App\Models\Ethnicity;

use App\Models\Caste;
use App\Models\ChatThread;
use App\Models\Education;
use App\Models\ExpressInterest;
use App\Models\Family;
use App\Models\SubCaste;
use App\Models\MemberLanguage;
use App\Models\FamilyValue;
use App\Models\GalleryImage;
use App\Models\HappyStory;
use App\Models\Hobby;
use App\Models\IgnoredUser;
use App\Models\Lifestyle;
use App\Models\MaritalStatus;
use App\Models\OnBehalf;
use App\Models\PackagePayment;
use App\Models\PartnerExpectation;
use App\Models\PhysicalAttribute;
use App\Models\ProfileMatch;
use App\Models\Recidency;
use App\Models\ReportedUser;
use App\Models\Shortlist;
use App\Models\SpiritualBackground;
use App\Models\Staff;
use App\Models\Wallet;
use App\Models\User;
use Hash;
use Validator;
use Redirect;
use Auth;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;
	   

use App\Upload;
use Storage;
use Image;
use Illuminate\Support\Facades\File; 								 

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:show_members'])->only('index');
        $this->middleware(['permission:create_member'])->only('create');
        $this->middleware(['permission:edit_member'])->only('edit');
        $this->middleware(['permission:delete_member'])->only('destroy');
        $this->middleware(['permission:view_member_profile'])->only('show');
        $this->middleware(['permission:block_member'])->only('block');
        $this->middleware(['permission:approve_member'])->only('approve');
        $this->middleware(['permission:update_member_package'])->only('package_info');
        $this->middleware(['permission:login_as_member'])->only('login');
        $this->middleware(['permission:deleted_member_show'])->only('deleted_members');
        $this->middleware(['permission:show_unapproved_profile_picrures'])->only('unapproved_profile_pictures');
        $this->middleware(['permission:approve_profile_picrures'])->only('approve_profile_image');

																										 
        $this->rules = [
            'first_name'        => ['required', 'max:255'],
            'last_name'         => ['required', 'max:255'],
            'email'             => ['max:255', 'unique:users,email'],
            'gender'            => ['required'],
            'date_of_birth'     => ['required'],
            'on_behalf'         => ['required'],
            'package'           => ['required'],
            'password'          => ['min:8', 'required_with:confirm_password', 'same:confirm_password'],
            'confirm_password'  => ['min:8'],

        ];

        $this->messages = [
            'first_name.required'       => translate('First name is required'),
            'first_name.max'            => translate('Max 255 characters'),
            'last_name.required'        => translate('First name is required'),
            'last_name.max'             => translate('Max 255 characters'),
            'email.max'                 => translate('Max 255 characters'),
            'email.unique'              => translate('Email Should be unique'),
            'gender.required'           => translate('Gender is required'),
            'date_of_birth.required'    => translate('Gender is required'),
            'on_behalf.required'        => translate('On behalf is required'),
            'package.required'          => translate('Package is required'),
            'password.min'              => translate('Minimum 8 characters'),
            'password.required_with'    => translate('Password and Confirm password are required'),
            'password.same'             => translate('Password and Confirmed password did not matched'),
            'confirm_password.min'      => translate('Minimum 8 characters'),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        CoreComponentRepository::instantiateShopRepository();
        CoreComponentRepository::initializeCache();

        $sort_search  = null;
        $members      = User::latest()->where('user_type', 'member')->where('membership', $id);

        if ($request->has('search')) {
            $sort_search  = $request->search;
            $members  = $members->where('code', $sort_search)->orwhere('first_name', 'like', '%' . $sort_search . '%')->orWhere('last_name', 'like', '%' . $sort_search . '%');
        }

        $members = $members->paginate(10);
        return view('admin.members.index', compact('members', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->rules;
        $messages = $this->messages;
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            flash(translate('Something went wrong'))->error();
            return Redirect::back()->withErrors($validator);
        }

        if ($request->email == null && $request->phone == null) {
		 
            flash(translate('Email and Phone both can not be null.'))->error();
            return back();
        }

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if (User::where('email', $request->email)->first() != null) {
                flash(translate('Email or Phone already exists.'))->error();
                return back();
            }
		 
        } elseif (User::where('phone', '+' . $request->country_code . $request->phone)->first() != null) {
							 
            flash(translate('Phone already exists.'))->error();
            return back();
        }

        $user               = new user;
        $user->user_type    = 'member';
        $user->code         = unique_code();
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->password     = Hash::make($request->password);
        $user->photo        = $request->photo;
        $user->email        = $request->email;
        if ($request->phone != null) {
            $user->phone        = '+' . $request->country_code . $request->phone;
																	 
        }
        if ($request->member_verification == 1) {
            $user->email_verified_at     = date('Y-m-d h:m:s');
        }
        if ($user->save()) {
            $member                             = new Member;
            $member->user_id                    = $user->id;
            $member->gender                     = $request->gender;
            $member->on_behalves_id             = $request->on_behalf;
            $member->birthday                   = date('Y-m-d', strtotime($request->date_of_birth));

            $package                                = Package::where('id', $request->package)->first();
            $member->current_package_id             = $package->id;
            $member->remaining_interest             = $package->express_interest;
            $member->remaining_photo_gallery        = $package->photo_gallery;
            $member->remaining_contact_view         = $package->contact;
            $member->remaining_profile_image_view    = $package->profile_image_view;
            $member->remaining_gallery_image_view   = $package->gallery_image_view;
            $member->auto_profile_match             = $package->auto_profile_match;
            $member->package_validity               = Date('Y-m-d', strtotime($package->validity . " days"));
            $membership                             = $package->id == 1 ? 1 : 2;
            $member->save();

            $user_update                = User::findOrFail($user->id);
            $user_update->membership    = $membership;
            $user_update->save();

            // Account opening email to member
            if ($user->email != null  && env('MAIL_USERNAME') != null && (get_email_template('account_oppening_email', 'status') == 1)) {
			 
                EmailUtility::account_oppening_email($user->id, $request->password);
            }

            // Account Opening SMS to member
            if ($user->phone != null && addon_activation('otp_system') && (get_sms_template('account_opening_by_admin', 'status') == 1)) {
			 
                SmsUtility::account_opening_by_admin($user, $request->password);
            }

            flash('New member has been added successfully')->success();
            return redirect()->route('members.index', $membership);
        }

        flash('Sorry! Something went wrong.')->error();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::findOrFail($id);
        return view('admin.members.view', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member             = User::findOrFail(decrypt($id));
        $countries          = Country::where('status', 1)->get();
        $states             = State::all();
        $cities             = City::all();
        $religions          = Religion::all();
        $castes             = Caste::all();
        $sub_castes         = SubCaste::all();
        $family_values      = FamilyValue::all();
        $marital_statuses   = MaritalStatus::all();
        $on_behalves        = OnBehalf::all();
        $languages          = MemberLanguage::all();

        return view('admin.members.edit.index', compact('member', 'countries', 'states', 'cities', 'religions', 'castes', 'sub_castes', 'family_values', 'marital_statuses', 'on_behalves', 'languages'));
    }


    public function introduction_edit(Request $request)
    {
        $member = User::findOrFail($request->id);
        return view('admin.members.edit_profile_attributes.introduction', compact('member'));
    }

    public function introduction_update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->introduction = $request->introduction;
        if ($member->save()) {
																													
            flash('Member introduction info has been updated successfully')->success();
            return back();
        }
			 
																														
 
        flash('Sorry! Something went wrong.')->error();
        return back();
    }

    public function basic_info_update(Request $request, $id)
    {
        $this->rules = [
            'first_name'    => ['required', 'max:255'],
            'last_name'     => ['required', 'max:255'],
            'gender'        => ['required'],
            'date_of_birth' => ['required'],
            'on_behalf'     => ['required'],
            'marital_status' => ['required'],
        ];
        $this->messages = [
            'first_name.required'             => translate('First Name is required'),
            'first_name.max'                  => translate('Max 255 characters'),
            'last_name.required'              => translate('Last Name is required'),
            'last_name.max'                   => translate('Max 255 characters'),
																							
            'gender.required'                 => translate('Gender is required'),
            'date_of_birth.required'          => translate('Date Of Birth is required'),
            'on_behalf.required'              => translate('On Behalf is required'),
            'marital_status.required'         => translate('Marital Status is required'),


        ];

        $rules = $this->rules;
        $messages = $this->messages;
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            flash(translate('Something went wrong'))->error();
            return Redirect::back()->withErrors($validator);
        }
        if ($request->email == null && $request->phone == null) {
            flash(translate('Email and Phone number both can not be null. '))->error();
            return back();
        }

	  
			
		
        $user               = User::findOrFail($request->id);
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;

        if (get_setting('profile_picture_approval_by_admin') && $request->photo != $user->photo && auth()->user()->user_type == 'member') {
            $user->photo_approved = 0;
        }
        $user->photo        = $request->photo;
        $user->phone        = $request->phone;
        $user->save();

								
													  
		 
		
								
																
																			  
		 
					  
        $member                     = Member::where('user_id', $request->id)->first();
        $member->gender             = $request->gender;
        $member->on_behalves_id     = $request->on_behalf;
        $member->birthday           = date('Y-m-d', strtotime($request->date_of_birth));
        $member->marital_status_id  = $request->marital_status;
        $member->children           = $request->children;

        if ($member->save()) {
																												 
            flash('Member basic info  has been updated successfully')->success();
            return back();
        }
																													
        flash('Sorry! Something went wrong.')->error();
        return back();
    }

	 
    public function language_info_update(Request $request, $id)
    {
        $member                     = Member::where('user_id', $request->id)->first();
											
																			   
        $member->mothere_tongue     = $request->mothere_tongue;
			 
																													 

        $member->known_languages    = $request->known_languages;

        if ($member->save()) {
		 
            flash('Member language info has been updated successfully')->success();
																											 

            return back();

        }
																												

        flash('Sorry! Something went wrong.')->error();

        return back();
    }

    public function approve(Request $request)
    {
        $member             = User::findOrFail($request->member_id);
        $member->approved   = 1;
        if ($member->save()) {

            // Account approval email send to members
            if ($member->email != null && get_email_template('account_approval_email', 'status')) {
			 
                EmailUtility::account_approval_email($member);
            }


            // Account Approval SMS send to member
            if ($member->phone && addon_activation('otp_system') && get_sms_template('account_approval', 'status')) {
			 
                SmsUtility::account_approval($member);
            }

            flash('Member Approved')->success();
            return redirect()->route('members.index', $member->membership);
        } else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }
    }

    public function deleted_members(Request $request)
    {
        $sort_search        = null;
        $deleted_members    = User::onlyTrashed()->where('permanently_delete', 0);
       
        if ($request->has('search')) {
            $sort_search  = $request->search;
            $deleted_members  = $deleted_members->where(function ($query) use ($sort_search){
                $query->where('code', $sort_search)
                    ->orwhere('first_name', 'like', '%' . $sort_search . '%')->orWhere('last_name', 'like', '%' . $sort_search . '%');
            });
        }
        $deleted_members = $deleted_members->paginate(10);
        return view('admin.members.deleted_members', compact('deleted_members', 'sort_search'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $membership = $user->membership;
        if (User::destroy($id)) {
            flash('Member has been added to the deleted member list')->success();
            return redirect()->route('members.index', $membership);
        } else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }
    }

    public function restore_deleted_member($id)
    {
        if (User::withTrashed()->where('id', $id)->restore()) {
            flash('Member has been restored successfully')->success();
            return redirect()->route('deleted_members');
        } else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }
    }
    public function member_permanemtly_delete($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->permanently_delete = 1;
        if ($user->save()) {
            flash('Member permanently deleted successfully')->success();
            return redirect()->route('deleted_members');
        } else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }
    }

    public function package_info(Request $request)
    {
        $member = Member::where('user_id', $request->id)->first();
        return view('admin.members.package_modal', compact('member'));
    }

    public function get_package(Request $request)
    {
        $member_id = $request->id;
        $packages  = Package::where('active', 1)->get();
        return view('admin.members.get_package', compact('member_id', 'packages'));
    }

    public function package_do_update(Request $request, $id)
    {

        $member                                 = Member::where('id', $id)->first();
        $package                                = Package::where('id', $request->package_id)->first();
        $member->current_package_id             = $package->id;
        $member->remaining_interest             = $member->remaining_interest + $package->express_interest;
        $member->remaining_photo_gallery        = $member->remaining_photo_gallery + $package->photo_gallery;
        $member->remaining_contact_view         = $member->remaining_contact_view + $package->contact;
        $member->remaining_profile_image_view    = $member->remaining_profile_image_view + $package->profile_image_view;
        $member->remaining_gallery_image_view   = $member->remaining_gallery_image_view + $package->gallery_image_view;

        $member->auto_profile_match         = $package->auto_profile_match;
        $member->package_validity           = date('Y-m-d', strtotime($member->package_validity . ' +' . $package->validity . 'days'));
        $membership                         = $package->id == 1 ? 1 : 2;

        if ($member->save()) {
            $user                = User::where('id', $member->user_id)->first();
            $user->membership    = $membership;
            if ($user->save()) {
                flash(translate('Member package has been updated successfully'))->success();
                return redirect()->route('members.index', $membership);
            }
        }
        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function member_wallet_balance_update(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        $wallet                   = new Wallet;
        $wallet->user_id          = $user->id;
        $wallet->amount           = $request->wallet_amount;
        $wallet->payment_method   = $request->payment_option;
        $wallet->payment_details  = '';
        $wallet->save();

        if ($request->payment_option == 'added_by_admin') {
            $user->balance = $user->balance + $request->wallet_amount;
        } elseif ($request->payment_option == 'deducted_by_admin') {
            $user->balance = $user->balance - $request->wallet_amount;
        }
																
																	
		 

        if ($user->save()) {
            flash(translate('Wallet Balance Updated Successfully'))->success();
            return back();
        } else {
            flash(translate('Something Went Wrong!'))->error();
            return back();
        }
			 
															 
						
		 

    }

    public function block(Request $request)
    {
        $user           = User::findOrFail($request->member_id);
        $user->blocked  = $request->block_status;
        if ($user->save()) {
            $member                 = Member::where('user_id', $user->id)->first();
            $member->blocked_reason = !empty($request->blocking_reason) ? $request->blocking_reason : "";
            if ($member->save()) {

                flash($user->blocked == 1 ? translate('Member Blocked !') : translate('Member Unblocked !'))->success();
                return back();
            }
        }
        flash('Sorry! Something went wrong.')->error();
        return back();
    }

    public function blocking_reason(Request $request)
    {
        $blocked_reason = Member::where('user_id', $request->id)->first()->blocked_reason;
        return $blocked_reason;
    }

    // Login by admin as a Member
    public function login($id)
    {
        $user = User::findOrFail(decrypt($id));
        auth()->login($user, true);

        return redirect()->route('dashboard');
    }

    // Member Profile settings Frontend
    public function profile_settings()
    {
        $member             = User::findOrFail(Auth::user()->id);
        $countries          = Country::where('status', 1)->get();
										 
										
        $religions          = Religion::all();
   
	  $ethnicities        = Ethnicity::all();
        $castes             = Caste::all();
											
        $family_values      = FamilyValue::all();
        $marital_statuses   = MaritalStatus::all();
        $on_behalves        = OnBehalf::all();
        $languages          = MemberLanguage::all();
										   
																																																				 
	 
									 

        return view('frontend.member.profile.index', compact('member', 'countries', 'religions', 'castes', 'family_values', 'marital_statuses', 'on_behalves', 'languages', 'ethnicities'));
																												   
		
																						   
    }
								 
														
				  
																	   
																	   
		
				   
																			   
																		   
		
																		

								
																   
														  
	   

										 
																							 
																					   
																										
														 
																		  
		 

										
																						   
																					 
																									   
														
																		 
		 

																
					  
	 
   
													 
																		  
									   
																			
																																		
				  
																				
	 
	 

    public function unapproved_profile_pictures()
    {
        $users = User::where('user_type', 'member')->where('photo_approved', 0)->latest()->paginate(10);
        return view('admin.members.unapproved_member_profile_pictures', compact('users'));
    }

    public function approve_profile_image(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->photo_approved = 1;
        if ($user->save()) {

																	  
				
														  
										 
									   
										
																													
												 

																															  
			 
								 
						  
			 
            flash(translate('Profile Picture Approved Successfully'))->success();
            return 1;
        }
        return 0;
    }
															 
											   
								 
								  
							
							
												   
															  
															
			 
			   
																	   
				
														   
										 
									   
										
																									 
												   

																															  
			 
								 
						  
			 
																				 
					 
		 
				 
	 
						 
										 

																		 
																					   
																   
																				   
											
		 
												   
																			
	 
																   
												   
									
								
																			 
						 
			 
					 
		 
    // Change Password
    public function change_password()
    {
        return view('frontend.member.password_change');
    }

    public function password_update(Request $request, $id)
    {
        $rules = [
            'old_password'      => ['required'],
            'password'          => ['min:8', 'required_with:confirm_password', 'same:confirm_password'],
            'confirm_password'  => ['min:8'],
        ];

        $messages = [
            'old_password.required'     => translate('Old Password is required'),
            'password.required_with'    => translate('Password and Confirm password are required'),
            'password.same'             => translate('Password and Confirmed password did not matched'),
            'confirm_password.min'      => translate('Max 8 characters'),
        ];

        $validator  = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            flash(translate('Sorry! Something went wrong'))->error();
            return Redirect::back()->withErrors($validator);
        }

        $user = User::findOrFail($id);

        if (Hash::check($request->old_password, $user->password)) {
	   
            $user->password = Hash::make($request->password);
            $user->save();
            flash(translate('Passwoed Updated successfully.'))->success();
            return redirect()->route('member.change_password');
	   
        } else {
	   
            flash(translate('Old password do not matched.'))->error();
            return back();
        }
    }

    public function update_account_deactivation_status(Request $request)
    {
        $user = Auth::user();
        $user->deactivated = $request->deacticvation_status;
        $deacticvation_msg = $request->deacticvation_status == 1 ? translate('deactivated') : translate('reactivated');
        if ($user->save()) {
		 
            flash(translate('Your account ') . $deacticvation_msg . translate(' successfully!'))->success();
            return redirect()->route('dashboard');
        }
        flash(translate('Something Went Wrong!'))->error();
        return back();
    }
    public function account_delete(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $user->member ?  $user->member->delete() : '';
            Address::where('user_id', $user->id)->delete();
            Education::where('user_id', $user->id)->delete();
            Career::where('user_id', $user->id)->delete();
            PhysicalAttribute::where('user_id', $user->id)->delete();
            Hobby::where('user_id', $user->id)->delete();
            Attitude::where('user_id', $user->id)->delete();
            Recidency::where('user_id', $user->id)->delete();
            Lifestyle::where('user_id', $user->id)->delete();
            Astrology::where('user_id', $user->id)->delete();
            Family::where('user_id', $user->id)->delete();
            PartnerExpectation::where('user_id', $user->id)->delete();
            SpiritualBackground::where('user_id', $user->id)->delete();
            PackagePayment::where('user_id', $user->id)->delete();
            HappyStory::where('user_id', $user->id)->delete();
            Staff::where('user_id', $user->id)->delete();
            Shortlist::where('user_id', $user->id)->delete();
            IgnoredUser::where('user_id', $user->id)->delete();
            ReportedUser::where('user_id', $user->id)->delete();
            GalleryImage::where('user_id', $user->id)->delete();
            ExpressInterest::where('user_id', $user->id)->delete();
            ProfileMatch::where('user_id', $user->id)->delete();
            ChatThread::where('sender_user_id', auth()->user()->id)->orWhere('receiver_user_id', auth()->user()->id)->delete();
            User::destroy(auth()->user()->id);
            flash(translate('Your account has deleted successfully!'))->success();
            auth()->guard()->logout();
        }
        flash(translate('Something Went Wrong!'))->error();
        return back();
    }
}
