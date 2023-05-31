<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'designation',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'youtube_link',
        'whatsapp_link',
        'reddit_link',
        'phone_no',
        'mobile_no',
        'email',
        'webmail',
        'website_link',
        'details'
    ];


    public function template_contents()
    {
        return $this->hasOne(Template::class, 'id', 'template_id');
    }
}
