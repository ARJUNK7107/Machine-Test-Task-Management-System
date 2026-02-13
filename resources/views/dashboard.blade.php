@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">
                    Dashboard
                </div>

                <div class="card-body">
                    <p class="mb-4 text-muted">
                        You are logged in. Manage your tasks from here.
                    </p>

                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">
                        Go to My Tasks
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
