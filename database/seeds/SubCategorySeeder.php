<?php

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sub_categories')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'category_id' => 1,
                    'sub_c_name' => 'Logo Design',
                    'sub_c_slug' => 'logo-design',

                ),
            1 =>
                array(
                    'id' => 2,
                    'category_id' => 1,
                    'sub_c_name' => 'Banner Ads',
                    'sub_c_slug' => 'banner-ads',
                ),
            2 =>
                array(
                    'id' => 3,
                    'category_id' => 1,
                    'sub_c_name' => 'Convert File Formats',
                    'sub_c_slug' => 'convert-file-formats',
                ),
            3 =>
                array(
                    'id' => 4,
                    'category_id' => 1,
                    'sub_c_name' => 'Web and Mobile',
                    'sub_c_slug' => 'web-and-mobile',
                ),
            4 =>
                array(
                    'id' => 5,
                    'category_id' => 1,
                    'sub_c_name' => 'Infographics',
                    'sub_c_slug' => 'infographics',
                ),
            5 =>
                array(
                    'id' => 6,
                    'category_id' => 1,
                    'sub_c_name' => 'Invitations',
                    'sub_c_slug' => 'invitations',
                ),
            6 =>
                array(
                    'id' => 7,
                    'category_id' => 1,
                    'sub_c_name' => 'CMS Marketing',
                    'sub_c_slug' => 'cms-marketing',
                ),
            7 =>
                array(
                    'id' => 8,
                    'category_id' => 1,
                    'sub_c_name' => 'Cartoon and Drawing',
                    'sub_c_slug' => 'cartoon-drawing',
                ),
            8 =>
                array(
                    'id' => 9,
                    'category_id' => 1,
                    'sub_c_name' => 'T-Shirts',
                    'sub_c_slug' => 't-shirts',

                ),
            9 =>
                array(
                    'id' => 10,
                    'category_id' => 1,
                    'sub_c_name' => '2D and 3D Modeling',
                    'sub_c_slug' => '2d-3d-modeling',
                ),
            10 =>
                array(
                    'id' => 11,
                    'category_id' => 1,
                    'sub_c_name' => 'Social Media Design',
                    'sub_c_slug' => 'social-media-design',
                ),
            11 =>
                array(
                    'id' => 12,
                    'category_id' => 1,
                    'sub_c_name' => 'Book Cover',
                    'sub_c_slug' => 'book-cover',
                ),
            12 =>
                array(
                    'id' => 13,
                    'category_id' => 1,
                    'sub_c_name' => 'Photoshop Editing',
                    'sub_c_slug' => 'photoshop-editing',
                ),
            13 =>
                array(
                    'id' => 14,
                    'category_id' => 1,
                    'sub_c_name' => 'Presentation',
                    'sub_c_slug' => 'presentation',
                ),
            14 =>
                array(
                    'id' => 15,
                    'category_id' => 1,
                    'sub_c_name' => 'Vector Trace',
                    'sub_c_slug' => 'vector-trace',
                ),
            15 =>
                array(
                    'id' => 16,
                    'category_id' => 1,
                    'sub_c_name' => 'Other Design',
                    'sub_c_slug' => 'other-design',
                ),
            16 =>
                array(
                    'id' => 17,
                    'category_id' => 2,
                    'sub_c_name' => 'WordPress',
                    'sub_c_slug' => 'wordPress',

                ),
            17 =>
                array(
                    'id' => 18,
                    'category_id' => 2,
                    'sub_c_name' => 'Database',
                    'sub_c_slug' => 'database',
                ),
            18 =>
                array(
                    'id' => 19,
                    'category_id' => 2,
                    'sub_c_name' => 'Web Programming',
                    'sub_c_slug' => 'web-programming',
                ),
            19 =>
                array(
                    'id' => 20,
                    'category_id' => 2,
                    'sub_c_name' => 'Desktop Apps',
                    'sub_c_slug' => 'desktop-apps',
                ),
            20 =>
                array(
                    'id' => 21,
                    'category_id' => 2,
                    'sub_c_name' => 'Data Analysis',
                    'sub_c_slug' => 'data-analysis',
                ),
            21 =>
                array(
                    'id' => 22,
                    'category_id' => 2,
                    'sub_c_name' => 'Testing Debut',
                    'sub_c_slug' => 'testing-debut',
                ),
            22 =>
                array(
                    'id' => 23,
                    'category_id' => 2,
                    'sub_c_name' => 'Other Development',
                    'sub_c_slug' => 'other-developmentg',
                ),
            23 =>
                array(
                    'id' => 24,
                    'category_id' => 2,
                    'sub_c_name' => 'Web Builders',
                    'sub_c_slug' => 'web-builders',
                ),
            24 =>
                array(
                    'id' => 25,
                    'category_id' => 2,
                    'sub_c_name' => 'Mobile Apps',
                    'sub_c_slug' => 'mobile-apps',

                ),
            25 =>
                array(
                    'id' => 26,
                    'category_id' => 2,
                    'sub_c_name' => 'Bots',
                    'sub_c_slug' => 'bots',
                ),
            26 =>
                array(
                    'id' => 27,
                    'category_id' => 2,
                    'sub_c_name' => 'File Convert',
                    'sub_c_slug' => 'file-convert',
                ),
            27 =>
                array(
                    'id' => 28,
                    'category_id' => 2,
                    'sub_c_name' => 'Q & A',
                    'sub_c_slug' => 'quality-assurance',
                ),
            28 =>
                array(
                    'id' => 29,
                    'category_id' => 2,
                    'sub_c_name' => 'Arts & Science',
                    'sub_c_slug' => 'arts-science',
                ),
            29 =>
                array(
                    'id' => 30,
                    'category_id' => 3,
                    'sub_c_name' => 'SEO',
                    'sub_c_slug' => 'seo',
                ),
            30 =>
                array(
                    'id' => 31,
                    'category_id' => 3,
                    'sub_c_name' => 'Video Advertising',
                    'sub_c_slug' => 'video-advertising',
                ),
            31 =>
                array(
                    'id' => 32,
                    'category_id' => 3,
                    'sub_c_name' => 'Web Analyticn',
                    'sub_c_slug' => 'web-analytic',
                ),
            32 =>
                array(
                    'id' => 33,
                    'category_id' => 3,
                    'sub_c_name' => 'Domain Guru',
                    'sub_c_slug' => 'domain-guru',
                ),
            33 =>
                array(
                    'id' => 34,
                    'category_id' => 3,
                    'sub_c_name' => 'SME',
                    'sub_c_slug' => 'sme',
                ),
            34 =>
                array(
                    'id' => 35,
                    'category_id' => 3,
                    'sub_c_name' => 'Link Building',
                    'sub_c_slug' => 'link-building',
                ),
            35 =>
                array(
                    'id' => 36,
                    'category_id' => 3,
                    'sub_c_name' => 'Email Marketing',
                    'sub_c_slug' => 'email-marketing',
                ),
            36 =>
                array(
                    'id' => 37,
                    'category_id' => 3,
                    'sub_c_name' => 'Local Listing',
                    'sub_c_slug' => 'local-listing',
                ),
            37 =>
                array(
                    'id' => 38,
                    'category_id' => 3,
                    'sub_c_name' => 'Mobile Ads',
                    'sub_c_slug' => 'mobile-ads',
                ),
            38 =>
                array(
                    'id' => 39,
                    'category_id' => 3,
                    'sub_c_name' => 'Personal Pro',
                    'sub_c_slug' => 'personal-pro',
                ),


        ));
    }
}
