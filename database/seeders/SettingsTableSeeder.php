<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Setting::create([
        'name' => 'MuslimBie',
        'email' => 'support@muslimbie.com',
        'contact' => '01700000000',
        'address' => 'Dhaka, Bangladesh',
        'logo' => 'assets/images/logo/main_logo.svg',
        'footer_logo' => 'assets/images/logo/secondary_logo.svg',
        'favicon' => 'assets/images/logo/main_logo.svg',
        'social_facebook' => 'https://www.facebook.com/muslimbie',
        'social_linkedin' => 'https://www.linkedin.com/company/muslimbie',
        'social_insta' => 'https://www.instagram.com/muslimbie/',
        'social_youtube' => 'https://youtube.com/@muslimbie',
        'description' => 'It is a long established fact that a reader will be distracted by the',
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d')
      ]);
   }
}
