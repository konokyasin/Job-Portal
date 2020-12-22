<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Company;
use App\Job;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        factory(User::class, 20)->create();
        factory(Company::class, 20)->create();
        factory(Job::class, 20)->create();

        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];

        foreach ($categories as $category)
        {
            Category::create(['name' => $category]);
        }

        Role::truncate();
        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now()
        ]);

        $admin->roles()->attach($adminRole);
    }
}
