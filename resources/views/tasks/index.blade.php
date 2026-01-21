<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @yield('content')
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">My Tasks</h1>

        <form method="POST" action="/tasks" class="d-flex justify-content-center mb-4">
            @csrf
            <input type="text" name="title" class="form-control w-50 me-2" placeholder="New Task">
            <button type="submit" class="btn btn-success">Add</button>
        </form>

        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $task->title }}</strong>
                        <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $task->completed ? 'Done' : 'Pending' }}
                        </span>
                    </span>
                    <div>
                        <form method="POST" action="/tasks/{{ $task->id }}" class="d-inline">
                            @csrf @method('PUT')
                            <button type="submit" class="btn btn-sm btn-info">Toggle</button>
                        </form>
                        <form method="POST" action="/tasks/{{ $task->id }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
