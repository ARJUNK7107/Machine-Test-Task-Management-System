@extends('layouts.app')

@section('content')
    <div class="p-6">

        <h2 class="text-xl font-bold mb-4">Update Task Status</h2>

        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block">Status</label>
                <select name="status" class="border p-2 w-full">
                    <option value="Pending" 
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="In Progress" 
                        {{ $task->status == 'In Progress' ? 'selected' : '' }}>
                        In Progress
                    </option>
                    <option value="Completed" 
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
                @error('status')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>

    </div>
@endsection
