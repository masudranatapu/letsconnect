<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    public function business_card_details()
    {
        return $this->hasMany(BusinessCardDetail::class, '', 'card_id');
    }

    public function business_card_fields()
    {
        return $this->hasMany(BusinessField::class, 'card_id', 'card_id');
    }
    public function business_card_fields_json()
    {
        return $this->hasOne(BusinessField::class, 'card_id', 'card_id');
    }

    public function theme()
    {
        return $this->hasOne(Theme::class, 'theme_id', 'theme_id');
    }
}
