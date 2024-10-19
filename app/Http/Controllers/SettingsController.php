<?php

namespace App\Http\Controllers;

use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        if(request()->isMethod('post')) {
            $validation_rules = [];
            foreach($settings as $setting) {
                $validation_rules[$setting->setting_name] = 'required';
            }
            request()->validate($validation_rules);
            foreach(request()->all() as $field => $value) {
                if($field == '_token') continue;
                $setting = Settings::firstOrNew(['setting_name' => $field]);
                $setting->setting_name = $field;
                $setting->setting_value = $value;
                $setting->save();
            }
            
            return redirect('/admin/settings');
        }
        return view('admin.settings',['settings' => $settings]);
    }
 
}
