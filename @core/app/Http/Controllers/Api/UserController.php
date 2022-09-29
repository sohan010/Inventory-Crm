<?php

namespace App\Http\Controllers\Api;


use App\Cause;
use App\CauseLogs;
use App\Country;
use App\EventAttendance;
use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\SupportTicket;
use App\User;
use App\UserFollow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email|max:191',
            'password' => 'required',
        ]);

        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ])->setStatusCode(422);
        }
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'message' => __('invalid Email'),
            ])->setStatusCode(422);
        }
        
        $user = User::select('id', 'email', 'password')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => __('Invalid Email or Password')
            ])->setStatusCode(422);
        } else {
            $token = $user->createToken(Str::slug(get_static_option('site_title', 'zaika')) . 'api_keys')->plainTextToken;

            return response()->json([
                'users' => $user,
                'token' => $token,
            ]);
        }
    }

    //social login
    public function socialLogin(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
        ]);
        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ])->setStatusCode(422);
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'message' => __('invalid Email'),
            ])->setStatusCode(422);
        }
        $username = $request->isGoogle === 0 ?  'fb_'.Str::slug($request->displayName) : 'gl_'.Str::slug($request->displayName);
        $user = User::select('id', 'email', 'username')
            ->where('email', $request->email)
            ->Orwhere('username', $username)
            ->first();

        if (is_null($user)) {
            $user = User::create([
                    'name' => $request->displayName,
                    'email' => $request->email,
                    'username' => $username,
                    'password' => Hash::make(\Str::random(8)),
                    'google_id' => $request->isGoogle === 1 ? $request->id : null,
                    'facebook_id' => $request->isGoogle === 0 ? $request->id : null
            ]);
        } 
        
        $token = $user->createToken(Str::slug(get_static_option('site_title', 'fundorex')) . 'api_keys')->plainTextToken;
        return response()->success([
            'users' => $user,
            'token' => $token,
        ]);
    }

    //register api
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'full_name' => 'required|max:191',
            'email' => 'required|email|unique:users|max:191',
            'username' => 'required|unique:users|max:191',
            'password' => 'required|min:6|max:191',
            'country' => 'required',
//            'country_code' => 'required',
             'state' => 'nullable',
//            'terms_conditions' => 'required',
        ]);
        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ]);
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'message' => __('invalid Email'),
            ])->setStatusCode(422);;
        }

            $user = User::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'username' => $request->username,
                'country' => $request->country,
                'city' => $request->city,
                'password' => Hash::make($request->password),
            ]);

            if (!is_null($user)) {
                $token = $user->createToken(Str::slug(get_static_option('site_title', 'fundorex')) . 'api_keys')->plainTextToken;
                return response()->json([
                    'users' => $user,
                    'token' => $token,
                ]);
            }

        return response()->json([
            'message' => __('Something Went Wrong'),
        ])->setStatusCode(422);
    }

    // send otp
    public function sendOTPSuccess(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'user_id' => 'required|integer',
            'email_verified' => 'required|integer',
        ]);
        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ])->setStatusCode(422);
        }
        
        if(!in_array($request->email_verified,[0,1])){
            return response()->json([
                'message' => __('email verify code must have to be 1 or 0'),
            ])->setStatusCode(422);
        }
        
        $user = User::where('id', $request->user_id)->update([
            'email_verified' =>  $request->email_verified
        ]);
         
         if(is_null($user)){
            return response()->json([
                'message' => __('Something went wrong, plese try after sometime,'),
            ])->setStatusCode(422);
         }
         
        return response()->json([
            'message' => __('Email Verify Success'),
        ]);
    }   
    
     public function sendOTP(Request $request)
    {


        $validate = Validator::make($request->all(),[
            'email' => 'required',
        ]);
        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ])->setStatusCode(422);
        }
        $otp_code = sprintf("%d", random_int(1234, 9999));
        $user_email = User::where('email', $request->email)->first();

        if (!is_null($user_email)) {
            try {
                $message_body = __('Here is your otp code') . ' <span class="verify-code">' . $otp_code . '</span>';
                Mail::to($request->email)->send(new BasicMail([
                    'subject' => __('Your OTP Code'),
                    'message' => $message_body
                ]));
            } catch (\Exception $e) {
                return response()->json([
                    'message' => $e->getMessage(),
                ])->setStatusCode(422);
            }

            return response()->json([
                'email' => $request->email,
                'otp' => $otp_code,
            ]);
            
        }
        
        return response()->json([
            'message' => __('Email Does not Exists'),
        ])->setStatusCode(422);

    }

    //reset password
    public function resetPassword(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ])->setStatusCode(422);
        }
        $email = $request->email;
        $user = User::select('email')->where('email', $email)->first();
        if (!is_null($user)) {
            User::where('email', $user->email)->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'message' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => __('Email Not Found'),
            ])->setStatusCode(422);
        }
    }

    //logout
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => __('Logout Success'),
        ]);
    }

    //User Profile
    public function profile(){
         $user_id = auth('sanctum')->user();

        $user = User::select('id','name','email','phone','image','zipcode','city','country','address')
        ->where('id',$user_id->id)->first();
        $image_url = null;
        if(!empty($user->image)){
            $img_details = get_attachment_image_by_id($user->image);
            $image_url = $img_details['img_url'] ?? null;
        }
        $user->image = $image_url ?  : null;

        return response()->json([
            'user_details' => $user
        ]);
    }

//    change password after login
    public function changePassword(Request $request){
        $validate = Validator::make($request->all(),[
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
        ]);
        if ($validate->fails()){
            return response()->json([
                'validation_errors' => $validate->messages()
            ])->setStatusCode(422);
        }

        $user = User::select('id','password')->where('id', auth('sanctum')->user()->id)->first();
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => __('Current Password is Wrong'),
            ])->setStatusCode(422);
        }
        User::where('id',auth('sanctum')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return response()->json([
            'current_password' => $request->current_password,
            'new_password' => $request->new_password,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth('sanctum')->user();
        $user_id = auth('sanctum')->user()->id;

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,id,'.$request->user_id,
            'phone' => 'nullable|string|max:191',
            'state' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'address' => 'nullable|string',
        ], [
            'name.' => __('name is required'),
            'email.required' => __('email is required'),
            'email.email' => __('provide valid email'),
        ]);


        if($request->file('file')){
            MediaHelper::insert_media_image($request);
            $last_image_id = DB::getPdo()->lastInsertId();
        }

        User::find($user_id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'image' => $last_image_id ?? $user->image,
                'phone' => $request->phone,
                'state' => $request->state,
                'city' => $request->city,
                'country' => $request->country,
                'address' => $request->address,
            ]
        );

        return response()->json(['success' => true]);
    }


    public function country_list()
    {
        $country = Country::select('id', 'name')->orderBy('name', 'asc')->get();
        return response()->json([
            'countries' => $country
        ]);
    }


    public function dashboard(){
        $user = auth('sanctum')->user();
        $event_attendances = EventAttendance::where('user_id', $user->id)->count();
        $donation = CauseLogs::where('user_id',$user->id)->count();
        $campaigns = Cause::where('user_id',$user->id)->count();
        $total_reward_points = CauseLogs::where('user_id', $user->id)->sum('reward_point');

        return response()->json([
            'events_booked' => $event_attendances,
            'total_donation' => $donation,
            'total_campaigns' => $campaigns,
            'total_reward_points' => $total_reward_points,
        ]);
    }

    public function user_donations(){

        $user = auth('sanctum')->user();
        $donations = CauseLogs::with('cause:id,title')
                        ->select('id','status','cause_id','amount','payment_gateway','created_at')
                        ->where('user_id',$user->id)->orderBy('id', 'DESC')->paginate(10)->withQueryString();

        return response()->json([
            'donations' => $donations,
        ]);
    }

    public function followed_user_campaigns(){

        $user = auth('sanctum')->user();
        $campaign_owner_user = UserFollow::where(['follow_status' => 'follow','user_id'=> $user->id, 'user_type'=>'user'])
            ->orWhere(['user_type'=>'admin'])->get();

        $admin_ids = $campaign_owner_user->filter(function($item){
            return $item->user_type === 'admin' && $item->follow_status == 'follow' ;
        })->pluck('campaign_owner_id');

        $user_ids = $campaign_owner_user->filter(function($item){
            return $item->user_type === 'user' && $item->follow_status == 'follow' ;
        })->pluck('campaign_owner_id');

        $all_follower_donations = Cause::select('id','user_id','admin_id')->where(['status' => 'publish'])
            ->where('admin_id',current($admin_ids))
            ->orWhere('user_id',current($user_ids))
            ->distinct('admin_id')
            ->distinct('user_id')
            ->get()->unique('admin_id')->unique('user_id') ?? [];

        $user_data = $all_follower_donations->map(function($item){
            $user = '';
            if($item->created_by === 'user'):
                $user = optional($item->user);
            else:
                $user = optional($item->admin);
            endif;
            return $user->name ?? '';
        });

        return response()->json([
            'followed_user_name' => $user_data ?? '',
            'followed_user_campaigns' => count($all_follower_donations) ?? 0,
        ]);
    }

    public function reward_points()
    {
        $user = auth('sanctum')->user();
        $all_reward_points =  CauseLogs::with('cause:id,title')->select('id','cause_id','reward_point','reward_amount','created_at')->where('user_id', $user->id)->where('reward_point', '>',0)->get();

        return response()->json([
            'reward_points' => $all_reward_points,
        ]);
    }

    public function allTickets()
    {
        $all_tickets = SupportTicket::select('id','title','description','subject','priority','status')
        ->where('user_id',auth('sanctum')->id())->orderBy('id','Desc')
        ->paginate(10)
        ->withQueryString();
        
        return response()->json([
            'user_id'=> auth('sanctum')->id(),
            'tickets' => $all_tickets,
        ]);
    }


    public function get_all_tickets(){
        $user_id = auth('sanctum')->user()->id;
        $all_tickets = SupportTicket::where('user_id', $user_id)->paginate(10)->withQueryString();

        return $all_tickets;
    }

    public function single_ticket($id){
        $user_id = auth('sanctum')->user()->id;

        $ticket_details = SupportTicket::where('user_id', $user_id)
            ->where("id",$id)
            ->first();
        $all_messages = SupportTicketMessage::where(['support_ticket_id' => $id])->get()->transform(function ($item){
            $item->attachment = !empty($item->attachment) ? asset('assets/uploads/ticket/'.$item->attachment) : null;

            return $item;
        });

        return response()->json(["ticket_details" => $ticket_details,"all_messages" => $all_messages]);
    }

    public function fetch_support_chat($ticket_id){
        $all_messages = SupportTicketMessage::where(['support_ticket_id' => $ticket_id])->get()->transform(function ($item){
            $item->attachment = !empty($item->attachment) ? asset('assets/uploads/ticket/'.$item->attachment) : null;

            return $item;
        });
        return response()->json($all_messages);
    }

    public function send_support_chat(Request $request,$ticket_id){
        $this->validate($request, [
            'user_type' => 'required|string|max:191',
            'message' => 'required',
            'send_notify_mail' => 'nullable|string',
            'file' => 'nullable|mimes:zip',
        ]);

        $ticket_info = SupportTicketMessage::create([
            'support_ticket_id' => $ticket_id,
            'type' => $request->user_type,
            'message' => $request->message,
            'notify' => $request->send_notify_mail ? 'on' : 'off',
            'attachment' => null,
        ]);

        if ($request->hasFile('file')) {
            $uploaded_file = $request->file;
            $file_extension = $uploaded_file->getClientOriginalExtension();
            $file_name = pathinfo($uploaded_file->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $file_extension;
            $uploaded_file->move('assets/uploads/ticket', $file_name);
            $ticket_info->attachment = $file_name;
            $ticket_info->save();
        }

        $ticket = $ticket_info->toArray();
        $ticket["attachment"] = empty($ticket["attachment"]) ? null : asset('assets/uploads/ticket' . $ticket["attachment"]);

        return response()->success($ticket);
    }

    public function viewTickets(Request $request,$id= null)
    {
        $all_messages = SupportTicketMessage::where(['support_ticket_id'=>$id])->get()->transform(function($item){
            $item->attachment = !empty($item->attachment) ? asset('assets/uploads/ticket/'.$item->attachment) : null;
            return $item;
        });
        $q = $request->q ?? '';
        return response()->success([
            'ticket_id'=>$id,
            'all_messages' =>$all_messages,
            'q' =>$q,
        ]);
    }

    public function sendMessage(Request $request)
    {
        // $this->validate($request,[
        //     'ticket_id' => 'required',
        //     'user_type' => 'required|string|max:191',
        //     'message' => 'required',
        //     'file' => 'nullable|mimes:jpg,png,jpeg,gif',
        // ]);

        // $ticket_info = SupportTicketMessage::create([
        //     'support_ticket_id' => $request->ticket_id,
        //     'type' => $request->user_type,
        //     'message' => $request->message,
        // ]);
        
        // if ($request->hasFile('file')){
            
        //     $uploaded_file = $request->file;
        //     $file_extension = $uploaded_file->extension();
        //     $file_name =  pathinfo($uploaded_file->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.$file_extension;
        //     $uploaded_file->move('assets/uploads/ticket',$file_name);
        //     $ticket_info->attachment = $file_name;
        //     $ticket_info->save();
        // }

        // return response()->success([
        //     'message'=>__('Message Send Success'),
        //     'ticket_id'=>$request->ticket_id,
        //     'user_type' =>$request->user_type,
        //     'ticket_info' => $ticket_info,
        // ]);
    }

    public function get_department(){
        $data = SupportDepartment::select("id","name","status")->where(['status' => 'publish'])->get();
        return response()->success(["data" => $data]);
    }
    
    public function createTicket(Request $request){
        $uesr_info = auth('sanctum')->user()->id;
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'subject' => 'required|string|max:191',
            'priority' => 'required|string|max:191',
            'description' => 'required|string',
            'departments' => 'required|string',
        ],[
            'title.required' => __('title required'),
            'subject.required' =>  __('subject required'),
            'priority.required' =>  __('priority required'),
            'description.required' => __('description required'),
            'departments.required' => __('departments required'),
        ]);

        $ticket = SupportTicket::create([
            'title' => $request->title,
            'via' => $request->via,
            'operating_system' => null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'description' => $request->description,
            'subject' => $request->subject,
            'status' => 'open',
            'priority' => $request->priority,
            'user_id' => $uesr_info,
            'admin_id' => null,
            'departments' => $request->departments
        ]);

        $msg = get_static_option('support_ticket_success_message') ?? __('Thanks for contact us, we will reply soon');

        return response()->success(["msg" => $msg,"ticket" => $ticket]);
    }

}
