<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Task Management
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            @can('task-create')
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Task</button>
            @endcan
            @if($isOpen)
                @include('livewire.task.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">No of Images</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->id }}</td>
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2">{{ $task->description }}</td>
                        <td class="border px-4 py-2">{{ $task->no_of_images }}</td>
                        <td class="border px-4 py-2">
                            @can('task-edit')
                                <button wire:click="edit({{ $task->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            @endcan
                            @can('task-delete')
                                <button wire:click="delete({{ $task->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                @if(chkTaskHasPhoto($task->id))
                                    <p>&nbsp;</p>
                                    <button x-data="{ task_id: {{ $task->id }} }" x-on:click="window.livewire.emitTo('searched-photo-model', 'show', {{$task->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Show Photos
                                    </button>
                                @endif
                            @endcan
                            @if (Auth::user()->user_type == 'staff')
                                @if (chkStaffTask($task->id) == 1)
                                    <button x-data="{ task_id: {{ $task->id }} }" x-on:click="window.livewire.emitTo('search-photo-model', 'show', {{$task->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Search Photo
                                    </button>
                                @elseif(chkStaffTask($task->id) == 2)
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Already Picked</button>
                                @else
                                    <button wire:click="picktask({{ $task->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pick Task</button>
                                @endif
                                
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>