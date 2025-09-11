<?php

namespace Database\Seeders;

use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\Media;
use App\Models\News;
use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('pass1234')
        ]);

        News::factory(5)->create();

        HomepageContent::factory()->create([
            'section' => 'header',
            'title' => 'The Lorem ipsum dolor sit amet',
            'sub_title' => 'BlacWays Member Portal – Laravel-Based Website Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate fugiat quo aperiam nostrum iste odio enim illum repudiandae nemo modi.',
            'url' => '/events'
        ]);
        
        HomepageContent::factory()->create([
            'section' => 'features_1',
            'title' => 'Track your status',
            'sub_title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
        ]);
        HomepageContent::factory()->create([
            'section' => 'features_2',
            'title' => 'Track due payment',
            'sub_title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
        ]);
        HomepageContent::factory()->create([
            'section' => 'features_3',
            'title' => 'Manage your account',
            'sub_title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
        ]);

        HomepageContent::factory()->create([
            'section' => 'about',
            'sub_title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus repudiandae inventore tenetur quis in, autem quod harum, debitis qui cum voluptas praesentium commodi quas quaerat suscipit dignissimos iusto, pariatur delectus. Vel beatae recusandae praesentium accusamus odio ipsam! Nobis, reiciendis eveniet expedita quia cumque, doloremque natus, accusamus corporis odit aut a.'
        ]);
     
        HomepageContent::factory()->create([
            'section' => 'donation',
            'sub_title' => 'To continue our work, we need your donation. Would you want to participate with us?'
        ]);
        
        HomepageContent::factory()->create([
            'section' => 'mission',
        ]);
        
        HomepageContent::factory()->create([
            'section' => 'local governments',
        ]);

        Page::factory()->create([
            'name' => 'about',
            'slug' => 'about',
            'content' => 'This is about page'
        ]);
        
        Page::factory()->create([
            'name' => 'Contact Us',
            'slug' => 'contact',
            'description' => 'Contact Us any time'
        ]);

        Page::factory()->create([
            'name' => 'Latest Events',
            'slug' => 'events',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus provident est tempora quod eaque unde numquam, adipisci dignissimos consequatur temporibus'
        ]);
        
        Page::factory()->create([
            'name' => 'Latest News',
            'slug' => 'news',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus provident est tempora quod eaque unde numquam, adipisci dignissimos consequatur temporibus'
        ]);
        
        Page::factory()->create([
            'name' => 'Photo Gallery',
            'slug' => 'gallery',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus provident est tempora quod eaque unde numquam, adipisci dignissimos consequatur temporibus'
        ]);

        Info::factory()->create([
            'title' => 'Member Portal',
        ]);

        Media::factory()->create([
            'name' => 'facebook',
            'url' => 'https://facebook.com/username'
        ]);
        
        Media::factory()->create([
            'name' => 'twitter',
            'url' => 'https://twitter.com/username'
        ]);

        Media::factory()->create([
            'name' => 'youtube',
            'url' => 'https://youtube.com/username'
        ]);
    }
}
