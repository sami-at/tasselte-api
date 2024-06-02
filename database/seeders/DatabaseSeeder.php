<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'admin@email.com', NULL, '$2a$12$2NxbKCGMSO4u6B7D.MqFbOgCFl0WfWNurdHMZ5.o6p2I3lGKhrrva', '1', NULL, '2024-06-02 22:31:52', '2024-06-02 22:31:52')

        User::create([
            "name"=> "admin",
            "email"=> "admin@email.com",
            "password"=> bcrypt("admin@2024."),
            "is_admin" => 1,
        ]);
    }
}
