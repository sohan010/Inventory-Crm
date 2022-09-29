<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Cause;
use App\CauseCategory;
use App\CauseLogs;
use App\CauseUpdate;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\MobileSlider;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{

    public function all_slider()
    {
        return Cache::remember("home-page-slider",60 * 60 * 24,function (){
            return SliderResource::collection(MobileSlider::get());
        });
    }

    public function multiple_donation_data()
    {
        $all_donation_category = CauseCategory::select('id','title','image')->where(['status' => 'publish'])->paginate(20)->withQueryString();
        $filter_donation_category = $all_donation_category->transform(function($item){
        $image_url = null;
        if(!empty($item->image)){
            $img_details = get_attachment_image_by_id($item->image);
            $item->image = $img_details['img_url'] ?? null;
        }
        return $item;
    });

        $donation_list = Cause::select('id','title')->where('status','publish')->get();

        $feature_cause = Cause::select('id','title','raised','amount','image')->where(['status' => 'publish','featured' => 'on'])->paginate(20)->withQueryString();
        $filter_donation_feature = $feature_cause->transform(function($item){
            $image_url = null;
            if(!empty($item->image)){
                $img_details = get_attachment_image_by_id($item->image);
                $item->image = $img_details['img_url'] ?? null;
            }
            return $item;
        });


        $all_recent_donation = Cause::select('id','title','amount','raised','image')->where(['status' => 'publish'])->orderBY('id','desc')->paginate(20)->withQueryString();
            $filter_donation_recent = $all_recent_donation->transform(function($item){
                $image_url = null;
                if(!empty($item->image)){
                    $img_details = get_attachment_image_by_id($item->image);
                    $item->image = $img_details['img_url'] ?? null;
                }
                return $item;
            });

        // check get method type
        if(request()->type == "category"){

            $pagination = [
                "current_page" => $all_donation_category->currentPage(),
                "last_page" => $all_donation_category->lastPage(),
                "per_page" => $all_donation_category->perPage(),
                "path" => $all_donation_category->path(),
                "links" => $all_donation_category->getUrlRange(0,$all_donation_category->lastPage()),
                "data" => $filter_donation_category
            ];
            return response()->json([
                'donation_category' => $pagination
            ]);
        }elseif(request()->type == "list"){
            return response()->json([
                'donation_list' => $donation_list
            ]);
        }elseif(request()->type == "feature"){

         $pagination = [
             "current_page" => $feature_cause->currentPage(),
             "last_page" => $feature_cause->lastPage(),
             "per_page" => $feature_cause->perPage(),
             "path" => $feature_cause->path(),
             "links" => $feature_cause->getUrlRange(0,$feature_cause->lastPage()),
             "data" => $filter_donation_feature
         ];
            return response()->json([
                'donation_feature' => $pagination
            ]);

        }elseif(request()->type == "recent"){

            $pagination = [
                "current_page" => $feature_cause->currentPage(),
                "last_page" => $feature_cause->lastPage(),
                "per_page" => $feature_cause->perPage(),
                "path" => $feature_cause->path(),
                "links" => $feature_cause->getUrlRange(0,$feature_cause->lastPage()),
                "data" => $filter_donation_recent
            ];

            return response()->json([
                'donation_recent' => $pagination
            ]);
        }

    }


    public function donation_details($id){

        if(empty($id)){
            abort(404);
        }

        $details = Cause::with(['admin','user'])->findOrFail($id);

        $user = '';
        if($details->created_by == 'user'){
            $user = $details->user;
        }else{
            $user = $details->admin;
        }

        $image = get_attachment_image_by_id($details->image) ?? null;
        $donation_image_url = $image['img_url'] ?? null;
        $user_image = get_attachment_image_by_id($user->image) ?? null;
        $user_image_url = $user_image['img_url'] ?? null;
        $faq_items = !empty($details->faq) ? unserialize($details->faq,['class' => false]) : ['title' => []];

        $cause_updates = CauseUpdate::select('id','image','cause_id','description','title')->where('cause_id', $details->id)->get()->transform(function($item){
            $image_url = null;
            if(!empty($item->image)){
                $image = get_attachment_image_by_id($item->image);
                $item->image = $image['img_url'] ?? null;
            }
            return $item;
        });

        $causeComments = Comment::select('id','cause_id','user_id','commented_by','comment_content')->where('cause_id', $details->id)->paginate(10)->withQueryString();

        return response()->json([
            'title' => $details->title,
            'description' => purify_html($details->cause_content),
            'image' => $donation_image_url,
            'user_image' => $user_image_url,
            'user_name' => $user->name,
            'created_at' => $details->created_at->diffForHumans(),
            'category' => optional($details->category)->title,
            'remaining_time' => !empty($details->deadline) ? $details->deadline : null,
            'raised_amount' => $details->raised,
            'goal_amount' => $details->amount,
            'faqs' => $faq_items,
            'updates' => $cause_updates,
            'comments' => $causeComments,
        ]);
    }

    public function people_who_donated($cause_id)
    {
        if(empty($cause_id)){
            abort(404);
        }

        $details = Cause::findOrFail($cause_id);
        $all_donors = CauseLogs::select('id','name','amount','created_at')->where(['cause_id' => $details->id])->paginate(10)->withQueryString();

        return response()->json([
            'people_who_donated' => $all_donors,
        ]);

    }

    public function related_campaigns($cause_id)
    {
        if(empty($cause_id)){
            abort(404);
        }

        $details = Cause::findOrFail($cause_id);

        $all_related_cause = Cause::select('id','title','image','amount','raised')->where(['status' => 'publish' , 'categories_id' => $details->categories_id])->paginate(10)->withQueryString();
        $filter_related_cause = $all_related_cause->transform(function($item){
            $image_url = null;
            if(!empty($item->image)){
                $img_details = get_attachment_image_by_id($item->image);
                $item->image = $img_details['img_url'] ?? null;
            }
            return $item;
        });

        $related_items_pagination = [
            "current_page" => $all_related_cause->currentPage(),
            "last_page" => $all_related_cause->lastPage(),
            "per_page" => $all_related_cause->perPage(),
            "path" => $all_related_cause->path(),
            "links" => $all_related_cause->getUrlRange(0,$all_related_cause->lastPage()),
            "data" => $filter_related_cause
        ];

        return response()->json([
            'related_campaigns' => $related_items_pagination,
        ]);

    }



}
