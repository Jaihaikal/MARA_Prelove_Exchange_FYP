<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Str;
use App\User as AppUser;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Retrieve categories and brands
        $electronicsCategory = Category::where('title', 'Electronic')->first();
        $clothingCategory = Category::where('title', 'Clothing')->first();
        $studyMaterialCategory = Category::where('title', 'Study Material')->first();

        $appleBrand = Brand::where('title', 'Apple')->first();
        $samsungBrand = Brand::where('title', 'Samsung')->first();
        $nikeBrand = Brand::where('title', 'Nike')->first();

        // Assuming you have some users in your database, e.g., user_id 1
        $userId = AppUser::first()->id;

        // Define sample products
        $products = [
            [
                'title' => 'iPhone 14',
                'summary' => 'Latest iPhone model with advanced features',
                'description' => 'The new iPhone 14 comes with cutting-edge technology and improved battery life.',
                'price' => 999.99,
                'cat_id' => $electronicsCategory->id,
                'child_cat_id' => null, // assuming no child category for simplicity
                'brand_id' => $appleBrand->id,
                'discount' => 10, // 10% discount
                'status' => 'active',
                'photo' => 'images/products/iphone_14.jpg',
                'size' => '6.1 inches',
                'stock' => 50,
                'is_featured' => true,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Samsung Galaxy S23',
                'summary' => 'High-performance smartphone by Samsung',
                'description' => 'Samsung Galaxy S23 offers a powerful camera and smooth performance.',
                'price' => 899.99,
                'cat_id' => $electronicsCategory->id,
                'child_cat_id' => null,
                'brand_id' => $samsungBrand->id,
                'discount' => 15,
                'status' => 'active',
                'photo' => 'images/products/galaxy_s23.jpg',
                'size' => '6.5 inches',
                'stock' => 70,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Nike Air Max',
                'summary' => 'Popular Nike shoes with great comfort',
                'description' => 'The Nike Air Max is designed for ultimate comfort and style.',
                'price' => 150.00,
                'cat_id' => $clothingCategory->id,
                'child_cat_id' => null,
                'brand_id' => $nikeBrand->id,
                'discount' => 5,
                'status' => 'active',
                'photo' => 'images/products/nike_air_max.jpg',
                'size' => '10 US',
                'stock' => 30,
                'is_featured' => false,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'MacBook Pro',
                'summary' => 'Powerful laptop for professionals',
                'description' => 'The MacBook Pro is a high-performance laptop designed for productivity.',
                'price' => 1299.99,
                'cat_id' => $electronicsCategory->id,
                'child_cat_id' => null,
                'brand_id' => $appleBrand->id,
                'discount' => 20,
                'status' => 'active',
                'photo' => 'images/products/macbook_pro.jpg',
                'size' => '13 inches',
                'stock' => 15,
                'is_featured' => true,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Data Science Handbook',
                'summary' => 'Comprehensive guide on data science',
                'description' => 'A thorough book covering data science basics, algorithms, and applications.',
                'price' => 45.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 0,
                'status' => 'active',
                'photo' => 'images/products/data_science_handbook.jpg',
                'size' => 'N/A',
                'stock' => 100,
                'is_featured' => false,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Machine Learning Essentials',
                'summary' => 'Fundamentals of machine learning concepts and applications',
                'description' => 'A beginner-friendly book covering the essential machine learning algorithms and their real-world applications.',
                'price' => 50.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 5,
                'status' => 'active',
                'photo' => 'images/products/machine_learning_essentials.jpg',
                'size' => 'N/A',
                'stock' => 80,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Python Programming for Beginners',
                'summary' => 'Step-by-step guide to learning Python programming',
                'description' => 'An introductory book on Python programming, perfect for beginners who want to start coding.',
                'price' => 30.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 0,
                'status' => 'active',
                'photo' => 'images/products/python_programming_for_beginners.jpg',
                'size' => 'N/A',
                'stock' => 120,
                'is_featured' => false,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Deep Learning in Practice',
                'summary' => 'Hands-on guide to deep learning techniques',
                'description' => 'This book provides practical insights into deep learning architectures, models, and applications with hands-on projects.',
                'price' => 55.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 10,
                'status' => 'active',
                'photo' => 'images/products/deep_learning_in_practice.jpg',
                'size' => 'N/A',
                'stock' => 70,
                'is_featured' => true,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Data Visualization with Python',
                'summary' => 'Master data visualization techniques using Python',
                'description' => 'This book covers various data visualization libraries in Python and their applications in data science.',
                'price' => 35.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 0,
                'status' => 'active',
                'photo' => 'images/products/data_visualization_with_python.jpg',
                'size' => 'N/A',
                'stock' => 90,
                'is_featured' => false,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Statistics for Data Science',
                'summary' => 'Core statistical concepts tailored for data science',
                'description' => 'This book provides an overview of key statistical methods and their application in data science.',
                'price' => 40.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 5,
                'status' => 'active',
                'photo' => 'images/products/statistics_for_data_science.jpg',
                'size' => 'N/A',
                'stock' => 60,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Artificial Intelligence: A Modern Approach',
                'summary' => 'Comprehensive guide on artificial intelligence',
                'description' => 'A foundational book covering various aspects of artificial intelligence, including theory and practical applications.',
                'price' => 60.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 10,
                'status' => 'active',
                'photo' => 'images/products/artificial_intelligence_modern_approach.jpg',
                'stock' => 50,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Big Data Analytics',
                'summary' => 'Insights into big data technologies and applications',
                'description' => 'This book provides an in-depth look at big data tools, technologies, and the value of big data in business.',
                'price' => 55.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 5,
                'status' => 'active',
                'photo' => 'images/products/big_data_analytics.jpg',
                'stock' => 75,
                'is_featured' => false,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Introduction to Algorithms',
                'summary' => 'Classic guide on algorithms and their applications',
                'description' => 'A highly respected reference on algorithm design and analysis, ideal for students and professionals alike.',
                'price' => 70.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 0,
                'status' => 'active',
                'photo' => 'images/products/introduction_to_algorithms.jpg',
                'stock' => 40,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Natural Language Processing with Python',
                'summary' => 'Practical guide on NLP with Python',
                'description' => 'An essential book for learning natural language processing techniques using Python, with hands-on examples.',
                'price' => 45.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 5,
                'status' => 'active',
                'photo' => 'images/products/nlp_with_python.jpg',
                'stock' => 65,
                'is_featured' => false,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Database Management Systems',
                'summary' => 'Detailed guide on database management',
                'description' => 'This book covers database design, SQL, and data management principles for students and database professionals.',
                'price' => 50.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 0,
                'status' => 'active',
                'photo' => 'images/products/database_management_systems.jpg',
                'stock' => 85,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            
            
          
            
            
        ];

        // Create product records
        foreach ($products as $data) {
            Product::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'summary' => $data['summary'],
                'description' => $data['description'],
                'price' => $data['price'],
                'cat_id' => $data['cat_id'],
                'child_cat_id' => $data['child_cat_id'],
                'brand_id' => $data['brand_id'],
                'discount' => $data['discount'],
                'status' => $data['status'],
                'photo' => $data['photo'],
                // 'size' => $data['size'],
                'stock' => $data['stock'],
                'is_featured' => $data['is_featured'],
                'condition' => $data['condition'],
                'user_id' => $data['user_id']
            ]);
        }
    }
}
