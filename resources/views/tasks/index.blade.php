@extends('layouts.app')

@section('content')
    <div class="p-6">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Tasks</h2>

            <a href="{{ route('tasks.create') }}" 
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Create Task
            </a>
        </div>

        <table class="w-full border">
            <thead>
                <tr>
                    <th class="border p-2">Title</th>
                    @if(auth()->user()->role === 'admin')
                        <th class="border p-2">Assigned User</th>
                    @endif
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Due Date</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td class="border p-2">{{ $task->title }}</td>
                        @if(auth()->user()->role === 'admin')
                        <td class="border p-2">
                            {{ $task->user->name ?? 'N/A' }}
                        </td>
                        @endif
                        <td class="border p-2">{{ $task->status }}</td>
                        <td class="border p-2">{{ $task->due_date }}</td>
                        <td class="border p-2">
                            <a href="{{ route('tasks.edit', $task) }}" 
                               class="text-blue-600">
                                Edit
                            </a>

                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('tasks.destroy', $task) }}" 
                                      method="POST" 
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">
                            No tasks found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

@endsection