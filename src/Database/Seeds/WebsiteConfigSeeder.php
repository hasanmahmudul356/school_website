<?php
namespace Tmss\School_website\Database\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class WebsiteConfigSeeder  extends Seeder
{
    public function run()
    {
        \DB::table('website_configs')->delete();
        
        \DB::table('website_configs')->insert(array (
            0 => 
            array (
                'name' => 'email',
                'display_name' => 'Email',
                'type' => 'text',
                'value' => 'tisitmss@gmail.com',
                'created_at' => '2020-01-14 06:38:41',
                'updated_at' => '2020-01-14 10:09:40',
            ),
            1 => 
            array (
                'name' => 'address',
                'display_name' => 'Address',
                'type' => 'text',
            'value' => 'Suzabad, Dohopara (Near at Banani By Pass), Bogura-5800, Bangladesh.',
                'created_at' => '2020-01-14 06:49:07',
                'updated_at' => '2020-01-14 10:09:01',
            ),
            2 => 
            array (
                'name' => 'phone',
                'display_name' => 'Phone',
                'type' => 'text',
                'value' => '+8801738031442',
                'created_at' => '2020-01-14 06:50:12',
                'updated_at' => '2020-01-14 10:09:21',
            ),
            3 => 
            array (
                'name' => 'headerlogo',
                'display_name' => 'Logo',
                'type' => 'file',
                'value' => '1578997917_headerlogo.jpg',
                'created_at' => '2020-01-14 06:52:04',
                'updated_at' => '2020-01-14 10:31:57',
            ),
            4 => 
            array (
                'name' => 'copywright',
                'display_name' => 'Copywright',
                'type' => 'textarea',
                'value' => 'Copyright © 2019 || All Rights Reserved by <a target="_blank" href="https://tmss-ict.com/"> TMSS ICT </a>',
                'created_at' => '2020-01-14 06:59:11',
                'updated_at' => '2020-01-14 10:45:37',
            ),
            5 => 
            array (
                'name' => 'course_heading',
                'display_name' => 'Course Heading',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 07:04:07',
                'updated_at' => '2020-01-14 07:04:07',
            ),
            6 => 
            array (
                'name' => 'tisibanner',
                'display_name' => 'TISI Banner',
                'type' => 'file',
                'value' => '1578986607_tisibanner.jpg',
                'created_at' => '2020-01-14 07:16:29',
                'updated_at' => '2020-01-14 07:23:27',
            ),
            7 => 
            array (
                'name' => 'what_we_offer',
                'display_name' => 'What we offer',
                'type' => 'text',
                'value' => 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.',
                'created_at' => '2020-01-14 07:38:28',
                'updated_at' => '2020-01-14 07:38:28',
            ),
            8 => 
            array (
                'name' => 'welcome_message',
                'display_name' => 'Welcome to Kiddos Learning School',
                'type' => 'textarea',
                'value' => 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word. <br/><br/>

Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.',
                'created_at' => '2020-01-14 07:38:45',
                'updated_at' => '2020-01-14 07:52:34',
            ),
            9 => 
            array (
                'name' => 'teaching_style',
                'display_name' => 'Teaching Style',
                'type' => 'text',
                'value' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.',
                'created_at' => '2020-01-14 07:39:46',
                'updated_at' => '2020-01-14 07:57:33',
            ),
            10 => 
            array (
                'name' => 'years_of_experience',
                'display_name' => '20 Years of Experience',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 07:40:17',
                'updated_at' => '2020-01-14 08:09:19',
            ),
            11 => 
            array (
                'name' => 'parents_comment',
                'display_name' => 'Parents Comment',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 07:40:41',
                'updated_at' => '2020-01-14 07:40:41',
            ),
            12 => 
            array (
                'name' => 'certified_teachers',
                'display_name' => 'Certified Teachers',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 08:04:48',
                'updated_at' => '2020-01-14 08:04:48',
            ),
            13 => 
            array (
                'name' => 'our_courses',
                'display_name' => 'Our Courses',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 08:07:36',
                'updated_at' => '2020-01-14 08:07:36',
            ),
            14 => 
            array (
                'name' => 'request_a_quote',
                'display_name' => 'Request A Quote',
                'type' => 'text',
                'value' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                'created_at' => '2020-01-14 09:24:47',
                'updated_at' => '2020-01-14 09:24:47',
            ),
            15 => 
            array (
                'name' => 'take_a_course',
                'display_name' => 'Take a Course',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 10:20:05',
                'updated_at' => '2020-01-14 10:20:05',
            ),
            16 => 
            array (
                'name' => 'recent_news',
                'display_name' => 'Recent News',
                'type' => 'text',
                'value' => 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country',
                'created_at' => '2020-01-14 10:22:37',
                'updated_at' => '2020-01-14 10:22:37',
            ),
            17 => 
            array (
                'name' => 'footer_block1_head',
                'display_name' => 'Have a Questions?',
                'type' => 'text',
                'value' => 'Have a Questions?',
                'created_at' => '2020-01-14 10:47:50',
                'updated_at' => '2020-01-14 10:47:50',
            ),
            18 => 
            array (
                'name' => 'footer_block2_head',
                'display_name' => 'About Us',
                'type' => 'text',
                'value' => 'About Us',
                'created_at' => '2020-01-14 10:48:09',
                'updated_at' => '2020-01-14 10:48:09',
            ),
            19 => 
            array (
                'name' => 'footer_block3_head',
                'display_name' => 'footer_block3_head',
                'type' => 'text',
                'value' => 'Faculties',
                'created_at' => '2020-01-14 10:48:28',
                'updated_at' => '2020-01-14 10:48:28',
            ),
            20 => 
            array (
                'name' => 'footer_block4_head',
                'display_name' => 'Subscribe Us!',
                'type' => 'text',
                'value' => 'Subscribe Us!',
                'created_at' => '2020-01-14 10:48:45',
                'updated_at' => '2020-01-14 10:48:45',
            ),
            21 => 
            array (
                'name' => 'footer_block5_head',
                'display_name' => 'Connect With Us',
                'type' => 'text',
                'value' => 'Connect With Us',
                'created_at' => '2020-01-14 10:49:12',
                'updated_at' => '2020-01-14 10:49:12',
            ),
        ));
    }
}