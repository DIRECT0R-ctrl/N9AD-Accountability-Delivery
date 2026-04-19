<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Get existing users or create if needed
        $manager = User::where('email', 'manager@example.com')->first();
        $employee1 = User::where('email', 'john@example.com')->first();
        $employee2 = User::where('email', 'jane@example.com')->first();

        // Create tasks for employees
        Task::create([
            'title' => 'Design new landing page',
            'description' => 'Create a modern landing page design',
            'status' => 'pending',
            'priority' => 'high',
            'deadline' => now()->addDays(3),
            'creator_id' => $manager->id,
            'assignee_id' => $employee1->id,
        ]);

        Task::create([
            'title' => 'Implement user authentication',
            'description' => 'Add login and registration functionality',
            'status' => 'in_progress',
            'priority' => 'medium',
            'deadline' => now()->addDays(5),
            'creator_id' => $manager->id,
            'assignee_id' => $employee2->id,
        ]);

        Task::create([
            'title' => 'Database optimization',
            'description' => 'Optimize database queries for better performance',
            'status' => 'validated',
            'priority' => 'low',
            'deadline' => now()->subDays(2),
            'creator_id' => $manager->id,
            'assignee_id' => $employee1->id,
        ]);
    }
}
