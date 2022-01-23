<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditTask extends Component
{
    public function mount(Task $task)
    {
        $this->task = $task;
    }
    
    public function render()
    {
        return view('livewire.edit-task');
    }
}
