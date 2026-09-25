<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kyon Personal Task Manager</title>

    <style>
        :root {
            --accent: #4f46e5;
            --accent-2: #6366f1;
            --accent-dark: #4338ca;
            --danger: #dc2626;
            --text: #111827;
            --muted: #6b7280;
            --border: #e5e7eb;
            --bg: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: var(--bg);
            margin: 0;
            padding: 0;
            color: var(--text);
            position: relative;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            padding: 40px 40px 10px;
            color: var(--text);
            text-align: center;
            animation: fadeInUp 0.5s ease both;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 0 24px 60px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 10px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 12px;
            padding: 18px 20px;
            box-shadow: 0 6px 18px rgba(17, 24, 39, 0.1);
            animation: fadeInUp 0.5s ease both;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(17, 24, 39, 0.14);
        }

        .stats .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stats .stat-card:nth-child(2) { animation-delay: 0.12s; }
        .stats .stat-card:nth-child(3) { animation-delay: 0.19s; }

        .stat-card .label {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-card .value {
            font-size: 26px;
            font-weight: 800;
        }

        .card {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 6px 18px rgba(17, 24, 39, 0.08);
            margin-bottom: 24px;
            animation: fadeInUp 0.5s ease both;
            animation-delay: 0.15s;
        }

        .card h2 {
            margin: 0 0 4px;
            font-size: 19px;
        }

        .card .subtitle {
            margin: 0 0 20px;
            color: var(--muted);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            background: #fff;
            color: var(--text);
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease;
        }

        .btn:active {
            transform: scale(0.97);
        }

        .btn-primary {
            width: 100%;
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--accent-dark);
        }

        .btn-small {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 999px;
        }

        .btn-edit {
            background: #e0e7ff;
            color: var(--accent-dark);
        }

        .btn-edit:hover {
            background: #c7d2fe;
        }

        .btn-delete {
            background: #fee2e2;
            color: var(--danger);
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .task-item {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
            animation: fadeInUp 0.4s ease both;
            transition: background 0.2s ease;
        }

        .task-item:hover {
            background: rgba(79, 70, 229, 0.04);
        }

        .task-item:last-child {
            border-bottom: none;
        }

        .task-info .task-name {
            font-weight: 700;
            margin-bottom: 4px;
        }

        .task-info .task-desc {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 6px;
        }

        .task-info .task-due {
            color: var(--muted);
            font-size: 13px;
        }

        .task-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .task-actions form {
            display: inline-flex;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-completed {
            background: #dcfce7;
            color: #166534;
        }

        .status-select {
            padding: 6px 10px;
            font-size: 13px;
            border-radius: 8px;
        }

        .flash-card {
            background: rgba(220, 252, 231, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(22, 101, 52, 0.15);
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            animation: fadeInUp 0.4s ease both;
        }

        .empty-state {
            text-align: center;
            padding: 30px 20px;
            color: var(--muted);
        }
    </style>
</head>

<body>

<div class="header">
    <h1>Kyon Personal Task Manager</h1>
    <p>Plan clearly, work through each task, and build steady progress every day.</p>
</div>

<div class="container">

    <div class="stats">
        <div class="stat-card">
            <div class="label">Total Tasks</div>
            <div class="value">{{ $tasks->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Pending</div>
            <div class="value">{{ $tasks->where('status', 'Pending')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Completed</div>
            <div class="value">{{ $tasks->where('status', 'Completed')->count() }}</div>
        </div>
    </div>

    @if(session('success'))
        <div class="flash-card">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <h2>Add New Task</h2>
        <p class="subtitle">Create a task and keep track of your progress.</p>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    placeholder="e.g. Finish Study"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Describe what needs to be done..."
                ></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" id="due_date" name="due_date">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">+ Add Task</button>
        </form>
    </div>

    <div class="card">
        <h2>My Tasks</h2>
        <p class="subtitle">Your current task list.</p>

        @if($tasks->count() > 0)

            @foreach($tasks as $task)

                <div class="task-item">

                    <div class="task-info">
                        <div class="task-name">{{ $task->task_name }}</div>

                        @if($task->description)
                            <div class="task-desc">{{ $task->description }}</div>
                        @endif

                        <div class="task-due">
                             Due: {{ $task->due_date?->format('Y-m-d') ?? 'No deadline' }}
                        </div>
                    </div>

                    <div class="task-actions">

                        <span class="badge {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                            {{ $task->status }}
                        </span>

                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-small btn-edit">
                            Edit
                        </a>

                        <form
                            action="{{ route('tasks.destroy', $task) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-small btn-delete"
                                onclick="return confirm('Delete this task?')"
                            >
                                Delete
                            </button>
                        </form>

                        <form
                            action="{{ route('tasks.update', $task) }}"
                            method="POST"
                        >
                            @csrf
                            @method('PATCH')

                            <select
                                name="status"
                                class="status-select"
                                onchange="this.form.submit()"
                            >
                                <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>

                    </div>

                </div>

            @endforeach

        @else

            <div class="empty-state">
                No tasks yet. Add your first task!
            </div>

        @endif

    </div>

</div>

</body>
</html>