<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class testTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            $users = User::all();

            $statuses = ['pending', 'in_progress', 'submitted', 'validated', 'rejected'];
            $priorities = ['low', 'medium', 'high', 'urgent'];

            for ($i = 1; $i <= 20; $i++) {
                Task::create([
                    'title' => 'Task ' . $i,
                    'description' => 'This is the description for task ' . $i,
                    'status' => $statuses[array_rand($statuses)],
                    'priority' => $priorities[array_rand($priorities)],
                    'deadline' => now()->addDays(rand(1, 30)),
                    'creator_id' => $users->random()->id,
                    'assignee_id' => $users->random()->id,
                ]);
            }
        }
    }

