<?php

namespace App\Http\Controllers;

use App\BusinessCard;
use App\Mail\EmailToCardOwner;
use App\Plan;
use App\Blog;
use App\Setting;
use App\Category;
use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Redirect;
use Newsletter;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        if (file_exists('../storage/installed')) {
            $homePage       = DB::table('pages')->where('page_name', 'home')->get();
            $supportPage    = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
            $Monthly_plans  = Plan::where('validity', '!=', 366)->where('status', 1)->get();
            $Yearly_plans   = Plan::where('validity', 366)->where('status', 1)->get();
            $settings       = Setting::where('status', 1)->first();
            $config         = DB::table('config')->get();
            $currency       = Currency::where('iso_code', $config['1']->config_value)->first();

            SEOTools::setTitle($settings->site_name);
            SEOTools::setDescription($settings->seo_meta_description);

            SEOMeta::setTitle($settings->site_name);
            SEOMeta::setDescription($settings->seo_meta_description);
            SEOMeta::addMeta('article:section', $settings->seo_site, 'property');
            SEOMeta::addKeyword([$settings->seo_keywords]);

            OpenGraph::setTitle($settings->site_name);
            OpenGraph::setDescription($settings->seo_meta_description);
            OpenGraph::setUrl(URL::to('/') . '/');
            OpenGraph::addImage([URL::to('/') . $settings->site_logo, 'size' => 300]);

            JsonLd::setTitle($settings->site_name);
            JsonLd::setDescription($settings->seo_meta_description);
            JsonLd::addImage(URL::to('/') . $settings->site_logo);
            // contact
            $contactPage = DB::table('pages')->where('page_name', 'contact')->get();


            return view('web', compact('homePage', 'Monthly_plans', 'Yearly_plans', 'supportPage', 'settings', 'currency', 'config', 'contactPage'));
        } else {
            return Redirect::to('/install');
        }
    }

    public function faq()
    {
        $faqPage = DB::table('pages')->where('page_name', 'faq')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/faq', compact('faqPage', 'supportPage', 'settings', 'config'));
    }

    public function privacyPolicy()
    {
        $privacyPage = DB::table('pages')->where('page_name', 'privacy')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/privacy', compact('privacyPage', 'supportPage', 'settings', 'config'));
    }

    public function refundPolicy()
    {
        $refundPage = DB::table('pages')->where('page_name', 'refund')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/refund', compact('refundPage', 'supportPage', 'settings', 'config'));
    }

    public function termsAndConditions()
    {
        $termsPage = DB::table('pages')->where('page_name', 'terms')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/terms', compact('termsPage', 'supportPage', 'settings', 'config'));
    }

    public function LegalGdpr()
    {
        $termsPage = DB::table('pages')->where('page_name', 'legal-gdpr')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();
        return view('pages/legal-gdpr', compact('termsPage', 'supportPage', 'settings', 'config'));
    }

    public function about()
    {
        $aboutPage   = DB::table('pages')->where('page_name', 'about')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config      = DB::table('config')->get();
        $settings    = Setting::where('status', 1)->first();

        return view('pages/about', compact('aboutPage', 'supportPage', 'settings', 'config'));
    }

    public function blog()
    {
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config      = DB::table('config')->get();
        $settings    = Setting::where('status', 1)->first();
        $blog        = Blog::inRandomOrder()->paginate(6);
        $first_post  = Blog::latest()->limit(1)->first();
        $category    = Category::latest()->get();
        return view('pages/blog', compact('supportPage', 'settings', 'config', 'blog', 'first_post', 'category'));
    }
    
    public function blogDetails($slug)
    {
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config      = DB::table('config')->get();
        $settings    = Setting::where('status', 1)->first();
        $blog        = Blog::where('slug', $slug)->first();
        return view('pages/blog_details', compact('supportPage', 'settings', 'config', 'blog'));
    }

     public function CategoryPost($category_slug)
     {
         $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
         $config      = DB::table('config')->get();
         $settings    = Setting::where('status', 1)->first();
         $category    = Category::latest()->get();
         $category_post  = Blog::where('category_slug', $category_slug)->get();
         return view('pages/category_post', compact('supportPage', 'settings', 'config', 'category_post', 'category'));
     }

    public function contact()
    {
        $contactPage = DB::table('pages')->where('page_name', 'contact')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();
        return view('pages/contact', compact('contactPage', 'supportPage', 'settings', 'config'));
    }


    public function ContactStore(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'title' => 'required',
            'fcolor' => 'required',
            'how_meet' => 'required',
        ]);

        $data = array();
        $data['fname'] = $request->fname;
        $data['lname'] = $request->lname;
        $data['company'] = $request->company;
        $data['fcolor'] = $request->fcolor;
        $data['how_meet'] = $request->how_meet;
        DB::table('contacts')->insert($data);
        $notification = array('contactMsg' => "Thank you for your message! We'll get back to you soon!", 'alert-type' => 'success',);
        return redirect()->to('/')->with($notification);
    }


    public function CardContactStore(Request $request)
    {
        
       $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'card_id' => 'required',
        ]);

        $data = [
            'name' => $request->first_name.' '.$request->last_name,
            'title' => $request->title,
            'company' => $request->company,
            'phone' => $request->ccode.$request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'message' => $request->message
        ];
        
        try {
            Mail::to($request->ownermail)->send(new EmailToCardOwner($data));
        } catch (\Exception $e) {
            //dd($e);
            return \redirect()->back()->with(['error' => $e->getMessage()]);
        }

        return \redirect()->back()->with(['success' => 'Thanks for your query!']);
    }

    public function StoreSubscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email',],
        ]);

        if(Newsletter::isSubscribed($request->email)){
            $notification = array('contactMsg' => "You are already a subscriber", 'alert-type' => 'error',);
            return redirect()->back()->with($notification);
        }else{
            Newsletter::subscribe($request->email);
            $data = array();
            $data['email']       = $request->email;
            $data['created_at']  = date('Y-m-d H:i:s');
            $data['updated_at']  = date('Y-m-d H:i:s');
            DB::table('subscribers')->insert($data);
            $notification = array('contactMsg' => "You have subscribed successfully", 'alert-type' => 'success',);
            return redirect()->back()->with($notification);  
        }
    }

    public function SearchPost(Request $request)
    {
        $search = $request['search'];
        $posts  = Blog::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('details', 'LIKE', "%{$search}%")
            ->get();

        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config      = DB::table('config')->get();
        $settings    = Setting::where('status', 1)->first();
        $category    = Category::latest()->get();
        return view('pages/search_post', compact('supportPage', 'posts', 'settings', 'config', 'category'));
    }
}