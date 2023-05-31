<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            "google_key" => "254212fdd454",
            "google_analytics_id" => "UA-554155-3",
            "site_name" => "GoBiz",
            "site_logo" => "/backend/img/logo.png",
            "favicon" => "/backend/img/favicon.png",
            "seo_meta_description" => "This is sample meta description",
            "seo_keywords" => "keyword 1, keyword 2",
            "seo_image" => "/backend/img/logo.png",
            "tawk_chat_bot_key" => "6065effc067c2605c0be7a60/1f2732tnm",
            "name" => "GoBiz",
            "address" => "noreply@gobiz.com",
            "driver" => "smtp",
            "host" => "smtp.mailtrap.io",
            "port" => 2525,
            "encryption" => "tls",
            "username" => "",
            "password" => ""
        ]);
    }
}
