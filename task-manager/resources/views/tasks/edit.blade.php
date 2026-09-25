<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>
</head>

<body>

<h1>Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Task Name</label>
        <br>

        <input
            type="text"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >
    </div>

    <br>

    <div>
        <label>Description</label>
        <br>

        <textarea name="description">{{ old('description', $task->description) }}</textarea>
    </div>

    <br>

    <div>
        <label>Status</label>
        <br>

        <select name="status">

            <option
                value="Pending"
                {{ $task->status === 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Completed"
                {{ $task->status === 'Completed' ? 'selected' : '' }}
            >
                Completed
            </option>

        </select>
    </div>

    <br>

    <div>
        <label>Due Date</label>
        <br>

        <input
            type="date"
            name="due_date"
            value="{{ $task->due_date?->format('Y-m-d') }}"
        >
    </div>

    <br>

    <button type="submit">
        Update Task
    </button>

    <a href="{{ route('tasks.index') }}">
        Cancel
    </a>

</form>

</body>
</html>