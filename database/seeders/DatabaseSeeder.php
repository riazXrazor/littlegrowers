<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Settings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@littlegrowers.com',
        //     'password' => bcrypt('razor@12345'),
        //     'is_admin' => true,
        // ]);

        // $categories = [
        //     'All' ,
        //     'Grow Bags' ,
        //     'Organic Fertilizer & Manures' ,
        //     'Seeds' ,
        //     'Garden Accessories' ,
        //     'Plastic Pots' ,
        //     'Live Plants' ,
        //     'Others' ,
        
        // ];

        // foreach ($categories as $category) {            
        //     Categories::create([
        //         'category_name' => $category,
        //     ]);
           
        // }

        // Settings::create([
        //     'setting_name' => 'contact_mobile',
        //     'setting_value' => '+91 8100036170, +91 8981789787',
        //     'setting_label' => 'Contact Mobile',
        // ]);

        // Settings::create([
        //     'setting_name' => 'contact_address',
        //     'setting_value' => 'Kumrakhali, Kamalgazi, kolkata',
        //     'setting_label' => 'Contact Address',
        // ]);

        // Settings::create([
        //     'setting_name' => 'open_hours',
        //     'setting_value' => 'Mon - Sun: 8 AM to 9 PM',
        //     'setting_label' => 'Open hours',
        // ]);
        
        // Settings::create([
        //     'setting_name' => 'map_location',
        //     'setting_value' => 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d921.8662580063977!2d88.39776069816023!3d22.449152585675947!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1729148104501!5m2!1sen!2sin',
        //     'setting_label' => 'Map Location',
        // ]);

        
    }
}
