<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Theme;
use App\Setting;
use App\Currency;
use App\BusinessCard;
use App\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Medias;

class StoreController extends Controller
{
    // Create Store
    public function CreateStore()
    {
        $themes     = Theme::where('theme_description', 'WhatsApp Store')->where('status', 1)->get();
        $settings   = Setting::where('status', 1)->first();
        $cards      = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $currencies = Currency::get();
        $plan_details = json_decode($plan->plan_details);

        if ($cards < $plan_details->no_of_vcards) {
            return view('user.store.create-store', compact('themes', 'settings', 'plan_details', 'currencies'));
        } else {
            alert()->error(trans('Maximum card creation limit is exceeded, Please upgrade your plan.'));
            return redirect()->route('user.cards');
        }
    }

    // Save Store
    public function saveStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'theme_id' => 'required',
            'card_color' => 'required',
            'card_lang' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            'title' => 'required',
            'currency' => 'required',
            'subtitle' => 'required',
            'whatsapp_no' => 'required',
            'whatsapp_msg' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error(trans('Some fields missing or banner/logo size is large.'));
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $cardId = uniqid();

        if ($request->link) {
            $personalized_link = $request->link;
        } else {
            $personalized_link = $cardId;
        }
        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details, true);

        $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
        $banner = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->banner->getClientOriginalName()) . '.' . $request->banner->extension();

        $request->logo->move(public_path('backend/img/vCards'), $logo);
        $request->banner->move(public_path('backend/img/vCards'), $banner);

        $store_details = [];

        $store_details['whatsapp_no'] = $request->whatsapp_no;
        $store_details['whatsapp_msg'] = $request->whatsapp_msg;
        $store_details['currency'] = $request->currency;

        $card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));

        $current_card = BusinessCard::where('card_url', $card_url)->count();

        if ($current_card == 0) {
            // Checking, If the user plan allowed card creation is less than created card.
            if ($cards < $plan_details['no_of_vcards']) {
                try {
                    $card_id = $cardId;
                    $card = new BusinessCard();
                    $card->card_id = $card_id;
                    $card->user_id = Auth::user()->user_id;
                    $card->theme_id = $request->theme_id;
                    $card->theme_color = $request->card_color;
                    $card->card_lang = $request->card_lang;
                    $card->cover = $banner;
                    $card->profile = $logo;
                    $card->card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));
                    $card->card_type = 'store';
                    $card->title = $request->title;
                    $card->sub_title = $request->subtitle;
                    $card->description = json_encode($store_details);
                    $card->save();

                    alert()->success(trans('New WhatsApp Store Created Successfully!'));
                    return redirect()->route('user.products', $card_id);
                } catch (\Exception $th) {
                    alert()->error(trans('Sorry, personalized link was already registered.'));
                    return redirect()->route('user.create.store');
                }
            } else {
                alert()->error(trans('Maximum store creation limit is exceeded, Please upgrade your plan to add more store(s).'));
                return redirect()->route('user.create.store');
            }
        } else {
            alert()->error(trans('Sorry, personalized link was already registered.'));
            return redirect()->route('user.create.store');
        }
    }

    // Products
    public function products()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id','desc')->get();
        $settings = Setting::where('status', 1)->first();
        $themes = Theme::where('theme_description', 'WhatsApp Store')->where('status', 1)->get();

        return view('user.store.products', compact('plan_details', 'media', 'settings', 'themes'));
    }

    // Save Products
    public function saveProducts(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if($request->badge != null){
                 if (count($request->badge) <= $plan_details->no_of_services) {
                
                    StoreProduct::where('card_id', $id)->delete();
                        for ($i = 0; $i < count($request->badge); $i++) {
                            $service = new StoreProduct();
                            $service->card_id = $id;
                            $service->product_id = uniqid();
                            $service->badge = $request->badge[$i];
                            $service->product_image = $request->product_image[$i];
                            $service->product_name = $request->product_name[$i];
                            $service->product_subtitle = $request->product_subtitle[$i];
                            $service->regular_price = $request->regular_price[$i];
                            $service->sales_price = $request->sales_price[$i];
                            $service->product_status = $request->product_status[$i];
                            $service->save();
                    }
                
                alert()->success(trans('Products added'));
                return redirect()->route('user.cards');
            } else {
                alert()->error(trans('You have reached plan limit.'));
                return redirect()->route('user.products', $id);
            }
            }else{
             alert()->error(trans('You must add atleast one product.'));
                return redirect()->route('user.products', $id);
            }
            
           
        }
    }


    // Edit Store
    public function editStore(Request $request, $id)
    {
        $themes = Theme::where('theme_description', 'WhatsApp Store')->where('status', 1)->get();
        $business_card = BusinessCard::where('card_id', $id)->first();
        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($business_card->card_type == "store") {
                $settings = Setting::where('status', 1)->first();
                $currencies = Currency::get();
                $plan_details = Plan::where('plan_id', Auth::user()->plan_id)->first();
                $store_details = json_decode($business_card->description);

                return view('user.edit-store.edit-store', compact('themes', 'business_card', 'settings', 'plan_details', 'store_details', 'currencies'));
            } else {
                return redirect()->route('user.edit.card', $id);
            }
        }
    }

    // Update store
    public function updateStore(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->link) {
                $personalized_link = $request->link;
            } else {
                $personalized_link = $id;
            }
            if ($request->banner == null && $request->logo == null) {
                $store_details = [];

                $store_details['whatsapp_no'] = $request->whatsapp_no;
                $store_details['whatsapp_msg'] = $request->whatsapp_msg;
                $store_details['currency'] = $request->currency;

                BusinessCard::where('card_id', $id)->update([
                    'theme_id' => $request->theme_id,
                    'theme_color' => $request->card_color,
                    'card_lang' => $request->card_lang,
                    'card_url' => $personalized_link,
                    'title' => $request->title,
                    'sub_title' => $request->subtitle,
                    'description' => $store_details,
                ]);
                alert()->success(trans('Store details updated'));
                return redirect()->route('user.edit.products', $id);
            } else if ($request->logo == null) {
                $banner = '/backend/img/vCards/' . 'IMG-' . $request->banner->getClientOriginalName() . '.' . $request->banner->extension();

                $request->banner->move(public_path('backend/img/vCards'), $banner);

                $store_details = [];

                $store_details['whatsapp_no'] = $request->whatsapp_no;
                $store_details['whatsapp_msg'] = $request->whatsapp_msg;
                $store_details['currency'] = $request->currency;

                BusinessCard::where('card_id', $id)->update([
                    'cover' => $banner,
                    'theme_id' => $request->theme_id,
                    'theme_color' => $request->card_color,
                    'card_lang' => $request->card_lang,
                    'card_url' => $personalized_link,
                    'title' => $request->title,
                    'sub_title' => $request->subtitle,
                    'description' => $store_details,
                ]);
                alert()->success(trans('Store details updated'));
                return redirect()->route('user.edit.products', $id);
            } else if ($request->banner == null) {
                $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();

                $request->logo->move(public_path('backend/img/vCards'), $logo);

                $store_details = [];

                $store_details['whatsapp_no'] = $request->whatsapp_no;
                $store_details['whatsapp_msg'] = $request->whatsapp_msg;
                $store_details['currency'] = $request->currency;

                BusinessCard::where('card_id', $id)->update([
                    'profile' => $logo,
                    'theme_id' => $request->theme_id,
                    'theme_color' => $request->card_color,
                    'card_lang' => $request->card_lang,
                    'card_url' => $personalized_link,
                    'title' => $request->title,
                    'sub_title' => $request->subtitle,
                    'description' => $store_details,
                ]);
                alert()->success(trans('Store details updated'));
                return redirect()->route('user.edit.products', $id);
            } else if ($request->banner != null && $request->logo != null) {
                $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
                $banner = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->banner->getClientOriginalName()) . '.' . $request->banner->extension();

                $request->logo->move(public_path('backend/img/vCards'), $logo);
                $request->banner->move(public_path('backend/img/vCards'), $banner);

                $store_details = [];

                $store_details['whatsapp_no'] = $request->whatsapp_no;
                $store_details['whatsapp_msg'] = $request->whatsapp_msg;
                $store_details['currency'] = $request->currency;

                BusinessCard::where('card_id', $id)->update([
                    'cover' => $banner,
                    'profile' => $logo,
                    'theme_id' => $request->theme_id,
                    'theme_color' => $request->card_color,
                    'card_lang' => $request->card_lang,
                    'card_url' => $personalized_link,
                    'title' => $request->title,
                    'sub_title' => $request->subtitle,
                    'description' => $store_details,
                ]);
                alert()->success(trans('Store details updated'));
                return redirect()->route('user.edit.products', $id);
            }
        }
    }


    // Products
    public function editProducts(Request $request, $id)
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $products = StoreProduct::where('card_id', $id)->get();
            $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id','desc')->get();
            $settings = Setting::where('status', 1)->first();
            $themes = Theme::where('theme_description', 'WhatsApp Store')->where('status', 1)->get();
            return view('user.edit-store.edit-products', compact('plan_details', 'products', 'media', 'settings','themes'));
        }
    }


    // Update products
    public function updateProducts(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if (isset($request->badge) && isset($request->product_image) && isset($request->product_name) && isset($request->product_subtitle) && isset($request->regular_price) && isset($request->sales_price) && isset($request->product_status)) {
                if (count($request->badge) <= $plan_details->no_of_services) {
                    StoreProduct::where('card_id', $id)->delete();
                    for ($i = 0; $i < count($request->badge); $i++) {
                        $product = new StoreProduct();
                        $product->card_id = $id;
                        $product->product_id = uniqid();
                        $product->badge = $request->badge[$i];
                        $product->product_image = $request->product_image[$i];
                        $product->product_name = $request->product_name[$i];
                        $product->product_subtitle = $request->product_subtitle[$i];
                        $product->regular_price = $request->regular_price[$i];
                        $product->sales_price = $request->sales_price[$i];
                        $product->product_status = $request->product_status[$i];
                        $product->save();
                    }

                    $activeCards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

                    if ($activeCards <= $plan_details->no_of_vcards) {
                        BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
                            'card_status' => 'activated',
                        ]);
                        alert()->success(trans('Products updated.'));
                        return redirect()->route('user.cards');
                    }
                    alert()->success(trans('Products updated.'));
                    return redirect()->route('user.cards');
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.edit.products', $id);
                }
            } else {
                $activeCards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if ($activeCards <= $plan_details->no_of_vcards) {
                    BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
                        'card_status' => 'activated',
                    ]);
                    alert()->success(trans('Products updated.'));
                    return redirect()->route('user.cards');
                }
                alert()->error(trans('You have reached plan limit.'));
                return redirect()->route('user.edit.products', $id);
            }
        }
    }
}
