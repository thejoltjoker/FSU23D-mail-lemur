<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'subscriber',
        ]);


        // Newsletters
        $content1 = "In this month's edition, we dive deep into the latest trends in sustainable living, offering practical tips for reducing your carbon footprint.";
        $content2 = "Discover the best travel destinations for 2024, from exotic beaches to bustling cities, and get insider tips on how to make the most of your next adventure.";
        $content3 = "Explore the world of gastronomy with our culinary experts as they share mouthwatering recipes, culinary techniques, and food pairing suggestions.";
        $content4 = "Unlock the secrets to financial success with expert advice on budgeting, investing, and building long-term wealth for a secure future.";
        $content5 = "Stay up-to-date with the latest developments in technology, from artificial intelligence to blockchain, and learn how these innovations are shaping our world.";
        $content6 = "Get inspired by captivating stories of personal growth and development, with insights from motivational speakers, life coaches, and thought leaders.";
        $content7 = "Join us as we celebrate cultural diversity and explore the traditions, festivals, and customs that make our world a vibrant and colorful place.";
        $content8 = "Discover the power of mindfulness and meditation for improved well-being, stress relief, and overall mental health.";
        $content9 = "Stay fit and active with our expert fitness guides, workout routines, and nutrition tips for a healthier, happier lifestyle.";
        $content10 = "Unleash your creativity with DIY projects, craft ideas, and home decor inspiration to personalize your living space and express your unique style.";

        $newsletters = array(
            array(
                "title" => "Green Living Gazette",
                "description" => "Your guide to eco-friendly living",
                "author" => "Emily Green",
                "content" => $content1
            ),
            array(
                "title" => "Wanderlust Weekly",
                "description" => "Explore the world with us",
                "author" => "Tom Traveler",
                "content" => $content2
            ),
            array(
                "title" => "Gourmet Gazette",
                "description" => "Savor the flavors of the world",
                "author" => "Chef Cuisine",
                "content" => $content3
            ),
            array(
                "title" => "Finance Focus",
                "description" => "Your roadmap to financial freedom",
                "author" => "Alex Investor",
                "content" => $content4
            ),
            array(
                "title" => "Tech Trends Today",
                "description" => "Stay ahead in the digital age",
                "author" => "Nancy Innovator",
                "content" => $content5
            ),
            array(
                "title" => "Personal Growth Pathway",
                "description" => "Transform your life one step at a time",
                "author" => "Max Motivation",
                "content" => $content6
            ),
            array(
                "title" => "Cultural Chronicles",
                "description" => "Journey through diverse cultures",
                "author" => "Sara Storyteller",
                "content" => $content7
            ),
            array(
                "title" => "Mindful Moments",
                "description" => "Find peace in a hectic world",
                "author" => "David Zen",
                "content" => $content8
            ),
            array(
                "title" => "Fit & Fabulous",
                "description" => "Your guide to a healthier you",
                "author" => "Lisa Fitness",
                "content" => $content9
            ),
            array(
                "title" => "Creative Corner",
                "description" => "Unleash your inner artist",
                "author" => "Chris Craftsman",
                "content" => $content10
            )
        );

        foreach ($newsletters as $newsletter) {
            Newsletter::create($newsletter);
        }
    }
}
