@extends('layouts.app')

@section('content')
    <div class="p-6">

        <h2 class="text-xl font-bold mb-4">Create Task</h2>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="mb-3">
                <label class="block">Title</label>
                <input type="text" name="title" 
                       class="border p-2 w-full"
                       value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block">Description</label>
                <textarea name="description" 
                          class="border p-2 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="block">Due Date</label>
                <input type="date" name="due_date" 
                       class="border p-2 w-full"
                       value="{{ old('due_date') }}" required>
                @error('due_date')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            @if(auth()->user()->role === 'admin')
    <div class="mb-3">
        <label class="block">Assign To</label>
        <select name="user_id" class="border p-2 w-full">
            @foreach($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>
@endif

            <button type="submit" 
                    class="bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>

    </div>
@endsection
