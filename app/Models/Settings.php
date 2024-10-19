<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_name',
        'setting_value',
        'setting_label',
    ];

    function getSetting($name) {
        $setting = Settings::select('setting_value')->where('setting_name', $name)->first();
        return $setting->setting_value;
    }
}
