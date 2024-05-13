<?php

namespace Database\Seeders;

use App\Models\Newsletter;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Setup roles
        $this->call(RoleSeeder::class);

        $default_user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            // 'role_id' => Role::where('name', 'subscriber')->first(),
        ]);

        $my_user = User::factory()->create([
            'name' => 'Johannes Andersson',
            'email' => 'johannes.andersson@medieinstitutet.se',
            'password' => Hash::make('12345678'),
        ]);

        $my_user->roles()->attach(Role::all());

        // Newsletters
        $content1 = "In this month's edition, we dive deep into the latest trends in sustainable living, offering practical tips for reducing your carbon footprint.";
        $content2 = 'Discover the best travel destinations for 2024, from exotic beaches to bustling cities, and get insider tips on how to make the most of your next adventure.';
        $content3 = 'Explore the world of gastronomy with our culinary experts as they share mouthwatering recipes, culinary techniques, and food pairing suggestions.';
        $content4 = 'Unlock the secrets to financial success with expert advice on budgeting, investing, and building long-term wealth for a secure future.';
        $content5 = 'Stay up-to-date with the latest developments in technology, from artificial intelligence to blockchain, and learn how these innovations are shaping our world.';
        $content6 = 'Get inspired by captivating stories of personal growth and development, with insights from motivational speakers, life coaches, and thought leaders.';
        $content7 = 'Join us as we celebrate cultural diversity and explore the traditions, festivals, and customs that make our world a vibrant and colorful place.';
        $content8 = 'Discover the power of mindfulness and meditation for improved well-being, stress relief, and overall mental health.';
        $content9 = 'Stay fit and active with our expert fitness guides, workout routines, and nutrition tips for a healthier, happier lifestyle.';
        $content10 = 'Unleash your creativity with DIY projects, craft ideas, and home decor inspiration to personalize your living space and express your unique style.';

        $newsletters = [
            [
                'title' => 'Green Living Gazette',
                'tagline' => 'Your guide to eco-friendly living',
                'user_id' => $default_user->id,
                'description' => $content1,
            ],
            [
                'title' => 'Wanderlust Weekly',
                'tagline' => 'Explore the world with us',
                'user_id' => $default_user->id,
                'description' => $content2,
            ],
            [
                'title' => 'Gourmet Gazette',
                'tagline' => 'Savor the flavors of the world',
                'user_id' => $default_user->id,
                'description' => $content3,
            ],
            [
                'title' => 'Finance Focus',
                'tagline' => 'Your roadmap to financial freedom',
                'user_id' => $default_user->id,
                'description' => $content4,
            ],
            [
                'title' => 'Tech Trends Today',
                'tagline' => 'Stay ahead in the digital age',
                'user_id' => $default_user->id,
                'description' => $content5,
            ],
            [
                'title' => 'Personal Growth Pathway',
                'tagline' => 'Transform your life one step at a time',
                'user_id' => $default_user->id,
                'description' => $content6,
            ],
            [
                'title' => 'Cultural Chronicles',
                'tagline' => 'Journey through diverse cultures',
                'user_id' => $default_user->id,
                'description' => $content7,
            ],
            [
                'title' => 'Mindful Moments',
                'tagline' => 'Find peace in a hectic world',
                'user_id' => $default_user->id,
                'description' => $content8,
            ],
            [
                'title' => 'Fit & Fabulous',
                'tagline' => 'Your guide to a healthier you',
                'user_id' => $default_user->id,
                'description' => $content9,
            ],
            [
                'title' => 'Creative Corner',
                'tagline' => 'Unleash your inner artist',
                'user_id' => $my_user->id,
                'description' => $content10,
            ],
        ];

        foreach ($newsletters as $newsletter) {
            Newsletter::create($newsletter);
        }

        $default_user->subscriptions()->attach(Newsletter::where('user_id', $my_user->id)->first());
    }
}
