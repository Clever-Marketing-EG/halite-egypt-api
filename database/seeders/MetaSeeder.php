<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Meta::factory(100)->create();
        $homeData = array(
            [
                'name' => 'intro_header',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],

            [
                'name' => 'intro_content',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'intro_image_1',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],
            [
                'name' => 'intro_image_2',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],
            [
                'name' => 'intro_image_3',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],
            [
                'name' => 'about_us_header',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'about_us_content',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'about_us_image',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],

            [
                'name' => 'our_products_header',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'our_services_header',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],

            [
                'name' => 'service_title_1',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'service_title_2',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'service_title_3',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],

            [
                'name' => 'service_content_1',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],

            [
                'name' => 'service_content_2',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],

            [
                'name' => 'service_content_3',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'service_image_1',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],
            [
                'name' => 'service_image_2',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],
            [
                'name' => 'service_image_3',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'image',
                'page' => 'home'
            ],
            [
                'name' => 'contact_us_header',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'contact_us_content',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'contact_us_phone',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'contact_us_email',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
            [
                'name' => 'contact_us_address',
                'content_en' => 'Header !',
                'content_ar' => 'محتوى',
                'type' => 'text',
                'page' => 'home'
            ],
        );

        $data = array_merge($homeData);

        DB::table('metas')->insert($data);
    }
}
