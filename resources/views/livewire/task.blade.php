<div>
    <select wire:model="project" class="p-1 border border-gray-500 rounded w-full">
        <option>Select Project</option>
        @foreach ($projects as $project)
            <option value="{{ $project->id }}">
                {{ $project->name }}
            </option>
        @endforeach
    </select>

    <form  class="flex my-2" wire:submit.prevent="addTask">
        <input wire:model="task" type="text" class="rounded p-1 border-1 border-gray-300 shadow w-full" placeholder="Add new task" required>
        <button type="submit" class="bg-blue-500 rounded px-4 py-1 ml-1 text-white">Add</button>
    </form>

    <ul wire:sortable="updateTaskOrder">
        @forelse ($tasks as $task)
            <li wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}" class="mb-1 border py-4 px-1 rounded bg-blue-50 flex justify-between">
                <h4 wire:sortable.handle>{{ $task->name }}</h4>
                <div>
                    <button wire:click="$emit('openModal', 'edit-task', {{ json_encode(["task" => $task->id]) }})" class="bg-blue-500 text-white px-3 py-1 rounded" id="edit-task">Edit</button>
                    <button wire:click="deleteTask({{ $task->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                </div>
            </li>
        @empty
            <div class="text-center mb-1 border py-4 px-1 rounded bg-blue-50">
                No task
            </div>
        @endforelse
    </ul>

    <div class="bg-black bg-opacity-50 absolute -top-60 inset-0 hidden justify-center items-center" id=overlay>
        <div class="bg-gray-200 w-1/3 rounded p-4">
            <div class="flex justify-end">
                <svg class="w-4 h-4 cursor-pointer" id="close-modal" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <h3 class="text-center font-bold">Edit Task</h3>
            <input type="text" class="rounded p-2 border-1 border-gray-400 shadow w-full my-2">

            <div class="flex justify-between mt-2">
                <button class="bg-gray-50 border border-gray-500 rounded px-4 py-1 ml-1 text-gray-800" id="close-modal">Cancel</button>
                <button class="bg-blue-500 rounded px-6 py-1 ml-1 text-white">Add</button>
            </div>
        </div>
    </div>

    {{-- @livewire('edit-task') --}}
    <script>
        window.addEventListener
            ('DOMContentLoaded', () => {
                const overlay = document.querySelector('#overlay')
                const editBtn = document.querySelector('#edit-task')
                const closeBtn = document.querySelector('#close-modal')

                editBtn.addEventListener('click', () => {
                    overlay.classList.remove('hidden')
                    overlay.classList.add('flex')
                })

                closeBtn.addEventListener('click', () => {
                    overlay.classList.add('hidden')
                    overlay.classList.remove('flex')
                })
            })
    </script>
</div>
