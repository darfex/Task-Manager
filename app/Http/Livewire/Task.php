<?php

namespace App\Http\Livewire;

use App\Models\Task as ModelsTask;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Task extends Component
{
    public $projects;
    public $project = '';
    public $task;

    public function mount($projects)
    {
        $this->projects = $projects;
    }

    public function addTask()
    {
        dd($this->task);
    }

    public function updateTaskOrder($tasks)
    {
        foreach($tasks as $task)
        {
            ModelsTask::find($task['value'])
                        ->update(['priority' => $task['order']]);
        }
    }

    public function deleteTask(ModelsTask $task)
    {
        $task->delete();
        return $this->render();
    }

    public function render()
    {
        $tasks = ModelsTask::where('project_id', $this->project)->orderBy('priority')->get();

        return view('livewire.task', compact('tasks'));
    }
}
