<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\CauseLogs;
use App\Admin;
use App\DonationCategory;

class Cause extends Model
{
    protected $table = 'causes';
    protected $fillable = ['cause_update_id','title','cause_content','amount','raised','status','slug','image','meta_title',
        'image_gallery','meta_tags','meta_description','user_id','admin_id','deadline','faq','created_by','featured','categories_id',
        'excerpt','og_meta_title','og_meta_description','og_meta_image','medical_document','emmergency','reward','gift_status','monthly_donation_status'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function cause_logs(){
        return $this->belongsTo(CauseLogs::class,'id','cause_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function category(){
        return $this->belongsTo(CauseCategory::class,'categories_id');
    }


}
