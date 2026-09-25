<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>
</head>

<body>

<h1>Add New Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">

    @csrf

    <div>
        <label>Task Name</label>
        <br>
        <input
            type="text"
            name="task_name"
            value="{{ old('task_name') }}"
            required
        >
    </div>

    <br>

    <div>
        <label>Description</label>
        <br>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <br>

    <div>
        <label>Status</label>
        <br>

        <select name="status">

            <option value="Pending">
                Pending
            </option>

            <option value="Completed">
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
            value="{{ old('due_date') }}"
        >
    </div>

    <br>

    <button type="submit">
        Add Task
    </button>

    <a href="{{ route('tasks.index') }}">
        Cancel
    </a>

</form>

</body>
</html>