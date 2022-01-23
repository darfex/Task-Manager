<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $tasks = [
        'complete assessment',
        'Mark student scripts',
        'Set up Workspace',
        'Take up react',
        'Build Taskade'
    ];

    public function run()
    {
        foreach ($this->tasks as $key => $task)
        {
            Task::create([
                'project_id' => '6dd6b28f-aeb0-3c5b-99c1-352a7038b80b',
                'name'       => $task,
                'priority'   => $key
            ]);
        }
    }
}
