@extends('layouts.base')

@section('content')
	<div class="mx-auto py-6 px-4">
		<div class="mx-auto w-1/3 shadow p-4 border-gr">
			<div>
				<h2 class="font-bold text-center">Task Manager</h2>
			</div>
			{{-- @livewire('project') --}}
			@livewire('task', compact('projects'))
		</div>
	</div>
@endsection