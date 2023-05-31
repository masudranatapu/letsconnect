<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Currency;
use DateTimeZone;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Setting
    public function settings()
    {
        $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $currencies = Currency::get();
        $settings = Setting::first();
        $config = DB::table('config')->get();

        $email_configuration = [
            'driver' => env('MAIL_MAILER', 'smtp'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'address' => env('MAIL_FROM_ADDRESS'),
            'name' => env('MAIL_FROM_NAME', $settings->site_name),
        ];

        $google_configuration = [
            'GOOGLE_ENABLE' => env('GOOGLE_ENABLE', ''),
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID', ''),
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET', ''),
            'GOOGLE_REDIRECT' => env('GOOGLE_REDIRECT', '')
        ];

        $image_limit = [
            'SIZE_LIMIT' => env('SIZE_LIMIT', '')
        ];

        $recaptcha_configuration = [
            'RECAPTCHA_ENABLE' => env('RECAPTCHA_ENABLE', ''),
            'RECAPTCHA_SITE_KEY' => env('RECAPTCHA_SITE_KEY', ''),
            'RECAPTCHA_SECRET_KEY' => env('RECAPTCHA_SECRET_KEY', '')
        ];

        $settings['email_configuration'] = $email_configuration;
        $settings['google_configuration'] = $google_configuration;
        $settings['recaptcha_configuration'] = $recaptcha_configuration;
        $settings['image_limit'] = $image_limit;

        return view('admin.settings', compact('settings', 'timezonelist', 'currencies', 'config'));
    }

    // Update Setting
    public function changeSettings(Request $request)
    {
        if ($request->site_logo == null && $request->favi_icon == null && $request->primary_image == null && $request->secondary_image == null) {
            Setting::where('id', '1')->update([
                'google_key'            => $request->google_key,
                'google_analytics_id'   => $request->google_analytics_id,
                'site_name'             => $request->site_name,
                'seo_meta_description'  => $request->seo_meta_desc,
                'seo_keywords'          => $request->meta_keywords,
                'tawk_chat_bot_key'     => $request->tawk_chat_bot_key,
                'application_type'      => $request->app_type,
            ]);

            $double_site_name = str_replace('"', '', trim($request->site_name, '"'));
            $space_name = str_replace("'", '', trim($double_site_name, "'"));
            $site_name = str_replace(" ", '', trim($space_name, " "));

            DB::table('config')->where('config_key', 'site_name')->update([
                'config_value' => $site_name,
            ]);

            DB::table('config')->where('config_key', 'timezone')->update([
                'config_value' => $request->timezone,
            ]);

            DB::table('config')->where('config_key', 'currency')->update([
                'config_value' => $request->currency,
            ]);

            DB::table('config')->where('config_key', 'paypal_mode')->update([
                'config_value' => $request->paypal_mode,
            ]);

            DB::table('config')->where('config_key', 'paypal_client_id')->update([
                'config_value' => $request->paypal_client_key,
            ]);

            DB::table('config')->where('config_key', 'paypal_secret')->update([
                'config_value' => $request->paypal_secret,
            ]);

            // DB::table('config')->where('config_key', 'razorpay_key')->update([
            //     'config_value' => $request->razorpay_client_key,
            // ]);

            // DB::table('config')->where('config_key', 'razorpay_secret')->update([
            //     'config_value' => $request->razorpay_secret,
            // ]);

            // DB::table('config')->where('config_key', 'term')->update([
            //     'config_value' => $request->term,
            // ]);

             DB::table('config')->where('config_key', 'stripe_publishable_key')->update([
                 'config_value' => $request->stripe_publishable_key,
             ]);

            DB::table('config')->where('config_key', 'stripe_secret')->update([
                'config_value' => $request->stripe_secret,
            ]);

            // DB::table('config')->where('config_key', 'app_theme')->update([
            //     'config_value' => $request->app_theme,
            // ]);

            DB::table('config')->where('config_key', 'share_content')->update([
                'config_value' => $request->share_content,
            ]);

            // DB::table('config')->where('config_key', 'bank_transfer')->update([
            //     'config_value' => $request->bank_transfer,
            // ]);

            $app_name = str_replace('"', '', $request->app_name);
            $app_name = str_replace(' ', '', $app_name);
            $mailer = str_replace(" ", '', trim($request->mail_driver, " "));
            $host = str_replace(" ", '', trim($request->mail_host, " "));
            $port = str_replace(" ", '', trim($request->mail_port, " "));
            $username = str_replace(" ", '', trim($request->mail_username, " "));
            $password = str_replace(" ", '', trim($request->mail_password, " "));
            $encryption = str_replace(" ", '', trim($request->mail_encryption, " "));
            $from_address = str_replace(" ", '', trim($request->mail_address, " "));
            $from_name = str_replace(" ", '', trim('"' . $request->mail_sender . '"', " "));
            // $image_limit = str_replace('"', '', $request->image_limit);
            $recaptcha_enable = str_replace('"', '', $request->recaptcha_enable);
            // $recaptcha_site_key = str_replace('"', '', $request->recaptcha_site_key);
            $recaptcha_secret_key = str_replace('"', '', $request->recaptcha_secret_key);

            //dd("'".$app_name."'");
            $this->changeEnv([
                'APP_NAME' => '"'.$app_name.'"',
                'TIMEZONE' => $request->timezone,
                'APP_TYPE' => $request->app_type,
                'COOKIE_CONSENT_ENABLED' => $request->cookie,
                'MAIL_MAILER' => $mailer,
                'MAIL_HOST' => $host,
                'MAIL_PORT' => $port,
                'MAIL_USERNAME' => $username,
                'MAIL_PASSWORD' => $password,
                'MAIL_ENCRYPTION' => $encryption,
                'MAIL_FROM_ADDRESS' => $from_address,
                'MAIL_FROM_NAME' => $from_name,
                'GOOGLE_ENABLE' => $request->google_auth_enable,
                // 'GOOGLE_CLIENT_ID' => $request->google_client_id,
                // 'GOOGLE_CLIENT_SECRET' => $request->google_client_secret,
                // 'GOOGLE_REDIRECT' => $request->google_redirect,
                'SIZE_LIMIT' => 1024,
                'RECAPTCHA_ENABLE' => $recaptcha_enable,
                // 'RECAPTCHA_SITE_KEY' => $recaptcha_site_key,
                'RECAPTCHA_SECRET_KEY' => $recaptcha_secret_key
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        }

        if ($request->favi_icon == null && $request->site_logo == null && $request->secondary_image == null) {
            $validator = Validator::make($request->all(), [
                'primary_image' => 'mimes:jpeg,png,jpg,gif,svg|max:'.env("SIZE_LIMIT").'',
            ]);
            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }

            $primary_image = '/frontend/assets/elements/' . 'IMG-' . time() . '.' . $request->primary_image->extension();
            $request->primary_image->move(public_path('/frontend/assets/elements'), $primary_image);

            DB::table('config')->where('config_key', 'primary_image')->update([
                'config_value' => $primary_image,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->favi_icon == null && $request->site_logo == null && $request->primary_image == null) {
            $validator = Validator::make($request->all(), [
                'secondary_image' => 'mimes:jpeg,png,jpg,gif,svg|max:'.env("SIZE_LIMIT").'',
            ]);
            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }

            $secondary_image = '/frontend/assets/' . 'IMG-' . time() . '.' . $request->secondary_image->extension();
            $request->secondary_image->move(public_path('/frontend/assets'), $secondary_image);

            DB::table('config')->where('config_key', 'secondary_image')->update([
                'config_value' => $secondary_image,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->primary_image == null && $request->secondary_image == null && $request->site_logo == null) {
            $validator = Validator::make($request->all(), [
                'favi_icon' => 'mimes:jpeg,png,jpg,gif,svg|max:'.env("SIZE_LIMIT").'',
            ]);
            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }

            $favi_icon = '/backend/img/' . 'IMG-' . time() . '.' . $request->favi_icon->extension();
            $request->favi_icon->move(public_path('backend/img'), $favi_icon);

            // Setting::where('id', '1')->update([
            //     'google_key' => $request->google_key, 'google_analytics_id' => $request->google_analytics_id,
            //     'site_name' => $request->site_name, 'favicon' => $favi_icon, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords,
            //     'tawk_chat_bot_key' => $request->tawk_chat_bot_key,
            // ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->primary_image == null && $request->secondary_image == null && $request->favicon == null) {
            $validator = Validator::make($request->all(), [
                'site_logo' => 'mimes:jpeg,png,jpg,gif,svg|max:'.env("SIZE_LIMIT").'',
            ]);
            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }

            $site_logo = '/backend/img/' . 'IMG-' . time() . '.' . $request->site_logo->extension();
            $request->site_logo->move(public_path('backend/img'), $site_logo);

            Setting::where('id', '1')->update([
                'google_key' => $request->google_key, 'google_analytics_id' => $request->google_analytics_id,
                'site_name' => $request->site_name, 'site_logo' => $site_logo, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords,
                'tawk_chat_bot_key' => $request->tawk_chat_bot_key,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->primary_image != null && $request->secondary_image != null && $request->favi_icon != null && $request->site_logo != null) {

            $site_logo = '/backend/img/' . 'IMG-' . time() . '.' . $request->site_logo->extension();
            $favi_icon = '/backend/img/' . 'IMG-' . time() . '.' . $request->favi_icon->extension();
            $secondary_image = '/frontend/assets/' . 'IMG-' . time() . '.' . $request->secondary_image->extension();
            $primary_image = '/frontend/assets/elements/' . 'IMG-' . time() . '.' . $request->primary_image->extension();
            $request->primary_image->move(public_path('/frontend/assets/elements'), $primary_image);
            $request->secondary_image->move(public_path('/frontend/assets'), $secondary_image);
            $request->favi_icon->move(public_path('backend/img'), $favi_icon);
            $request->site_logo->move(public_path('backend/img'), $site_logo);

            Setting::where('id', '1')->update([
                'site_logo' => $site_logo, 'favicon' => $favi_icon, 'seo_image' => $site_logo
            ]);

            DB::table('config')->where('config_key', 'primary_image')->update([
                'config_value' => $primary_image,
            ]);

            DB::table('config')->where('config_key', 'secondary_image')->update([
                'config_value' => $secondary_image,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->primary_image != null && $request->site_logo != null) {

            $site_logo = '/backend/img/' . 'IMG-' . time() . '.' . $request->site_logo->extension();
            $primary_image = '/frontend/assets/elements/' . 'IMG-' . time() . '.' . $request->primary_image->extension();
            $request->primary_image->move(public_path('/frontend/assets/elements'), $primary_image);
            $request->site_logo->move(public_path('backend/img'), $site_logo);

            Setting::where('id', '1')->update([
                'site_logo' => $site_logo, 'seo_image' => $site_logo
            ]);

            DB::table('config')->where('config_key', 'primary_image')->update([
                'config_value' => $primary_image,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->secondary_image != null && $request->site_logo != null) {

            $site_logo = '/backend/img/' . 'IMG-' . time() . '.' . $request->site_logo->extension();
            $secondary_image = '/frontend/assets/' . 'IMG-' . time() . '.' . $request->secondary_image->extension();
            $request->secondary_image->move(public_path('/frontend/assets/elements'), $secondary_image);
            $request->site_logo->move(public_path('backend/img'), $site_logo);

            Setting::where('id', '1')->update([
                'site_logo' => $site_logo, 'seo_image' => $site_logo
            ]);

            DB::table('config')->where('config_key', 'secondary_image')->update([
                'config_value' => $secondary_image,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        } else if ($request->secondary_image != null && $request->primary_image != null) {

            $primary_image = '/frontend/assets/elements/' . 'IMG-' . time() . '.' . $request->primary_image->extension();
            $secondary_image = '/frontend/assets/' . 'IMG-' . time() . '.' . $request->secondary_image->extension();
            $request->secondary_image->move(public_path('/frontend/assets/elements'), $secondary_image);
            $request->primary_image->move(public_path('/frontend/assets/elements'), $primary_image);

            DB::table('config')->where('config_key', 'primary_image')->update([
                'config_value' => $primary_image,
            ]);

            DB::table('config')->where('config_key', 'secondary_image')->update([
                'config_value' => $secondary_image,
            ]);

            alert()->success(trans('Settings Updated Successfully!'));
            return redirect()->route('admin.settings');
        }
    }

    public function taxSetting()
    {
        $config = DB::table('config')->get();
        $settings = Setting::first();

        return view('admin.tax.index', compact('config', 'settings'));
    }

    public function updateTaxSetting(Request $request)
    {

        DB::table('config')->where('config_key', 'invoice_prefix')->update([
            'config_value' => $request->invoice_prefix,
        ]);

        DB::table('config')->where('config_key', 'invoice_name')->update([
            'config_value' => $request->invoice_name,
        ]);

        DB::table('config')->where('config_key', 'invoice_email')->update([
            'config_value' => $request->invoice_email,
        ]);

        DB::table('config')->where('config_key', 'invoice_phone')->update([
            'config_value' => $request->invoice_phone,
        ]);

        DB::table('config')->where('config_key', 'invoice_address')->update([
            'config_value' => $request->invoice_address,
        ]);

        DB::table('config')->where('config_key', 'invoice_city')->update([
            'config_value' => $request->invoice_city,
        ]);

        DB::table('config')->where('config_key', 'invoice_state')->update([
            'config_value' => $request->invoice_state,
        ]);

        DB::table('config')->where('config_key', 'invoice_zipcode')->update([
            'config_value' => $request->invoice_zipcode,
        ]);

        DB::table('config')->where('config_key', 'invoice_country')->update([
            'config_value' => $request->invoice_country,
        ]);

        DB::table('config')->where('config_key', 'tax_name')->update([
            'config_value' => $request->tax_name,
        ]);

        DB::table('config')->where('config_key', 'tax_number')->update([
            'config_value' => $request->tax_number,
        ]);

        DB::table('config')->where('config_key', 'tax_value')->update([
            'config_value' => $request->tax_value,
        ]);

        DB::table('config')->where('config_key', 'invoice_footer')->update([
            'config_value' => $request->invoice_footer,
        ]);

        alert()->success(trans('Invoice Setting Updated Successfully!'));
        return redirect()->route('admin.tax.setting');
    }

    public function updateEmailSetting(Request $request)
    {

        DB::table('config')->where('config_key', 'email_heading')->update([
            'config_value' => $request->email_heading,
        ]);

        DB::table('config')->where('config_key', 'email_footer')->update([
            'config_value' => $request->email_footer,
        ]);

        alert()->success(trans('Email Setting Updated Successfully!'));
        return redirect()->route('admin.tax.setting');
    }

    public function pages()
    {
        $pages = DB::table('pages')->get()->groupBy('page_name');
        $settings = Setting::first();
        $config = DB::table('config')->get();
        $allPages = array_keys($pages->toArray());
        return view('admin.pages.index', compact('allPages', 'settings', 'config'));
    }

    public function editPage(Request $request, $id)
    {
        $sections = DB::table('pages')->where('page_name', $id)->get();
        $settings = Setting::first();
        $config = DB::table('config')->get();
        return view('admin.pages.edit-page', compact('sections', 'settings', 'config'));
    }

    public function savePage(Request $request, $id)
    {
        $sections = DB::table('pages')->where('page_name', $id)->get();
        for ($i = 0; $i < count($sections); $i++) {
            $safe_section_content = $request->input('section' . $i);
            DB::table('pages')->where('page_name', $id)->where('id', $sections[$i]->id)->update(['section_content' => $safe_section_content]);
        }
        alert()->success(trans('Website Content Updated Successfully!'));
        return redirect()->route('admin.pages');
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        alert()->success(trans('Website Cache Cleared Successfully!'));
        return redirect()->back();
    }

    public function testEmail() {
        $message = [
            'msg' => 'Test mail'
        ];
        $mail = false;
        try {
            Mail::to(ENV('MAIL_FROM_ADDRESS'))->send(new \App\Mail\TestMail($message));
            $mail = true;
        } catch (\Exception $e) {
            alert()->error(trans('Email configuration wrong.'));
            return redirect()->back();
        }
        if($mail == true) {
            alert()->success(trans('Test mail send successfully.'));
            return redirect()->back();
        }
    }

    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);

            // Loop through given data
            foreach ((array) $data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }
}
