<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::truncate();
        About::create([
            'title' => 'A Software Engineer with 4+ years of experience',
            'description' => '<p>I am Mohammad Taimoor Hussain, a dedicated backend developer with extensive expertise in PHP and
                        its popular frameworks, such as Laravel and CodeIgniter.</p>
                    <h4>💼 Specialties and Experience:</h4>
                    <p>✅ Specialize in Laravel, renowned for crafting robust backend solutions tailored to diverse
                        domains including eCommerce, point-of-sale (POS), multi-vendor platforms, and content management
                        systems (CMS).</p>
                    <p>✅ Provide custom PHP development services, delivering tailored functionalities meticulously
                        designed to meet precise requirements and enhance project outcomes.</p>
                    <p>✅ Leverage the capabilities of CodeIgniter to develop scalable backend applications, including
                        customer relationship management (CRM) and point-of-sale (POS) systems.</p>
                    <p>✅ Adopt a strategic approach to ensure the delivery of powerful and efficient solutions that
                        adeptly cater to the diverse needs of businesses across industries.</p>
                    <h4>💡 Education:</h4>
                    <p>✅ Bachelor in Software Engineering (S.E.) from Ilma University.</p>
                    <p>✅ Currently, I am leveraging my expertise at Kingdom Vision, where I focus on PHP, Laravel,
                        Node.js, React.js, and Vue.js development.</p>',
            'image' => url('website/images/about/profile-pic.jpeg'),
            'skill' => [
                [
                    "name" => "Laravel",
                    "percentage" => "70",
                    "color" => "#ffde67"
                ],
                [
                    "name" => "Codeigniter",
                    "percentage" => "55",
                    "color" => "#ff9900"
                ],
                [
                    "name" => "Core PHP",
                    "percentage" => "70",
                    "color" => "#82b700"
                ]
                ,[
                    "name" => "Node JS",
                    "percentage" => "45",
                    "color" => "#ef2d56"
                ],
                [
                    "name" => "Vue JS",
                    "percentage" => "50",
                    "color" => "#2eca7f"
                ],
                [
                    "name" => "React JS",
                    "percentage" => "30",
                    "color" => "#2ecab5"
                ]
            ]
        ]);
    }
}
