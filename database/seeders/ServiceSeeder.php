<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use JsonException;

class ServiceSeeder extends Seeder
{
    /**
     * @throws JsonException
     */
    public function run(): void
    {
        Service::truncate();
        Service::insert(
            [
                [
                    'title' => 'Web Design & Development',
                    'description' => 'Creating custom web applications tailored to specific business needs using Laravel and CodeIgniter.',
                    'image' => url('website/img/service/ci-laravel.png'),
                    'detail' => json_encode([
                        [
                            "value" => "Design and develop web applications precisely customized to fit unique business needs and objectives."
                        ],
                        [
                            "value" => "Leverage advanced features of leading PHP frameworks like Laravel and CodeIgniter for rapid and reliable development."
                        ],
                        [
                            "value" => "Ensure that applications are built to scale efficiently, handling growth in users and data without compromising performance."
                        ],
                        [
                            "value" => "Implement best practices in security to protect data and ensure compliance with industry standards."
                        ],
                        [
                            "value" => "Integrate custom web applications with existing systems, third-party services, or APIs to enhance functionality."
                        ],
                        [
                            "value" => "Focus on creating intuitive and responsive user interfaces for an enhanced user experience across all devices."
                        ],
                        [
                            "value" => "Provide continuous maintenance, updates, and support to ensure the application remains functional and up-to-date."
                        ],
                        [
                            "value" => "Build applications with a modular architecture, allowing for easier updates, feature additions, and future expansions."
                        ]
                    ], JSON_THROW_ON_ERROR | true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'RESTFul API Integration',
                    'description' => 'Designing and implementing secure and scalable RESTful APIs for various applications.',
                    'image' => url('website/images/service/api-integration.png'),
                    'detail' => json_encode([
                        [
                            "value" => "Design and implement RESTful APIs that prioritize security and scalability to handle growing demands."
                        ],
                        [
                            "value" => "Ensure APIs adhere to RESTful principles and industry standards for consistency and reliability."
                        ],
                        [
                            "value" => "Develop custom APIs tailored to specific application requirements, enabling seamless communication between systems."
                        ],
                        [
                            "value" => "Optimize APIs for efficient data retrieval and processing, reducing latency and improving performance."
                        ],
                        [
                            "value" => "Implement API versioning and provide comprehensive documentation for easy integration and future updates."
                        ],
                        [
                            "value" => "Seamlessly integrate payment gateways like Stripe and PayPal to enable secure and smooth transactions."
                        ],
                        [
                            "value" => "Connect applications to social media platforms through API integrations, enabling features like social login, sharing, and data retrieval."
                        ]
                    ], JSON_THROW_ON_ERROR | true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Full-Stack Development',
                    'description' => 'Combining PHP with front-end technologies like Vue.js & React for full-stack development.',
                    'image' => url('website/images/service/fullstack-development.png'),
                    'detail' => json_encode([
                        [
                            'value' => 'Offer end-to-end development solutions, from front-end design to back-end development, ensuring a cohesive and seamless user experience.'
                        ],
                        [
                            'value' => 'Tailor applications to meet specific business needs, using the latest technologies and frameworks to create scalable and high-performance solutions.'
                        ],
                        [
                            'value' => 'Deliver mobile-friendly and responsive designs, ensuring that applications perform well across all devices and screen sizes.'
                        ],
                        [
                            'value' => 'Provide robust API integration services to connect and extend functionalities, enabling efficient communication between different systems and platforms.'
                        ],
                        [
                            'value' => 'Offer continuous support and maintenance services, including updates, security patches, and performance optimization, to ensure the application remains up-to-date and secure.'
                        ]
                    ], JSON_THROW_ON_ERROR | true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'DB Design & Optimization',
                    'description' => 'Designing and implementing efficient databases using MySQL, MariaDB, or PostgreSQL.',
                    'image' => url('website/images/service/db-design-optimize.png'),
                    'detail' => json_encode([
                        [
                            'value' => 'Design tailored database schemas that align with business requirements, ensuring efficient data storage, retrieval, and management.'
                        ],
                        [
                            'value' => 'Optimize query performance, indexing, and database configuration to minimize latency and maximize speed, particularly for large-scale datasets.'
                        ],
                        [
                            'value' => 'Implement normalization techniques to reduce redundancy and improve data integrity while using denormalization strategically for performance gains in specific scenarios.'
                        ],
                        [
                            'value' => 'Design databases with scalability in mind, allowing for seamless growth as data volumes and user demand increase, while maintaining high performance.'
                        ],
                        [
                            'value' => 'Ensure database security through best practices, including encryption, user access controls, and regular audits, to protect sensitive data and maintain compliance with industry standards.'
                        ]
                    ], JSON_THROW_ON_ERROR | true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Performance Optimization',
                    'description' => 'Optimizing PHP code through analysis and refactoring to enhance performance and scalability.',
                    'image' => url('website/images/service/performance-optimize.png'),
                    'detail' => json_encode([
                        [
                            'value' => 'Analyze and profile the application code to identify bottlenecks, then refactor the code to streamline execution, reduce processing time, and enhance overall efficiency.'
                        ],
                        [
                            'value' => 'Fine-tune database queries, indexing, and caching strategies to reduce query response times and improve the speed of data retrieval and storage.'
                        ],
                        [
                            'value' => 'Implement load balancing and auto-scaling techniques to evenly distribute traffic across servers, ensuring high availability and optimal performance during peak usage times.'
                        ],
                        [
                            'value' => 'Utilize effective caching mechanisms at various levels, such as application, database, and content delivery networks (CDNs), to reduce server load and accelerate content delivery.'
                        ],
                        [
                            'value' => 'Optimize the use of server resources, including memory, CPU, and storage, by monitoring and adjusting configurations, using asynchronous processing, and minimizing resource-intensive operations.'
                        ]
                    ], JSON_THROW_ON_ERROR | true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'DevOps & Deployment Pipeline',
                    'description' => 'Setting up continuous integration and continuous deployment (CI/CD) pipelines for automated testing and deployment.',
                    'image' => url('website/images/service/devops.jpg'),
                    'detail' => json_encode([
                        [
                            'value' => 'Set up continuous integration and continuous deployment (CI/CD) pipelines to automate the building, testing, and deployment of applications, ensuring faster and more reliable releases.'
                        ],
                        [
                            'value' => 'Implement Infrastructure as Code practices using tools like Terraform or Ansible, allowing for scalable and consistent infrastructure management through version-controlled scripts.'
                        ],
                        [
                            'value' => 'Manage and configure multiple environments (development, staging, production) to mirror production settings, ensuring smooth transitions and consistent performance across all stages of deployment.'
                        ],
                        [
                            'value' => 'Integrate monitoring and logging solutions to track application performance, identify issues in real-time, and enable proactive maintenance, ensuring high availability and minimizing downtime.'
                        ],
                        [
                            'value' => 'Incorporate security best practices and compliance checks into the deployment pipeline, including automated vulnerability scanning, access control, and data encryption, to safeguard applications throughout the development lifecycle.'
                        ]
                    ], JSON_THROW_ON_ERROR | true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
