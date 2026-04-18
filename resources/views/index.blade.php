<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aalitan To-Do</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0f172a;
            --surface-color: #1e293b;
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --danger-color: #ef4444;
            --danger-hover: #dc2626;
            --success-color: #10b981;
            --border-color: #334155;
            --ring-color: rgba(59, 130, 246, 0.5);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(circle at top, #1e293b 0%, #0f172a 100%);
            color: var(--text-main);
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            box-sizing: border-box;
        }

        .app-container {
            width: 100%;
            max-width: 500px;
            background-color: var(--surface-color);
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .header {
            padding: 2rem;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }

        .header h1 {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header p {
            margin: 0.5rem 0 0;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .main-content {
            padding: 2rem;
        }

        .add-todo-form {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .todo-input {
            flex-grow: 1;
            background-color: #0f172a;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--text-main);
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .todo-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--ring-color);
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 8px -1px rgba(59, 130, 246, 0.4);
        }

        .todo-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .todo-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background-color: #0f172a;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .todo-item:hover {
            border-color: #475569;
            transform: translateX(4px);
        }

        .todo-item.completed {
            opacity: 0.6;
        }

        .todo-item.completed .task-text {
            text-decoration: line-through;
            color: var(--text-muted);
        }

        .task-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .task-text {
            font-size: 0.95rem;
            line-height: 1.4;
            transition: all 0.2s ease;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon:hover {
            background-color: var(--border-color);
            color: var(--text-main);
        }

        .btn-icon.danger:hover {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-hover);
        }

        .btn-icon.success:hover {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .custom-checkbox {
            position: relative;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .todo-item.completed .custom-checkbox {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .custom-checkbox svg {
            width: 0.8rem;
            height: 0.8rem;
            fill: none;
            stroke: white;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.2s ease;
        }

        .todo-item.completed .custom-checkbox svg {
            opacity: 1;
            transform: scale(1);
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem 0;
            color: var(--text-muted);
        }

        .empty-state svg {
            width: 3rem;
            height: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    
    <div class="app-container">
        <div class="header">
            <h1>My Tasks</h1>
            <p>Stay organized and productive</p>
        </div>
        
        <div class="main-content">
            <form action="{{ route('todos.store') }}" method="POST" class="add-todo-form">
                @csrf
                <input type="text" name="task" class="todo-input" placeholder="What needs to be done?" required autocomplete="off">
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

            @if(isset($todos) && $todos->count() > 0)
                <ul class="todo-list">
                    @foreach($todos as $todo)
                        <li class="todo-item {{ $todo->is_completed ? 'completed' : '' }}">
                            <div class="task-content">
                                <form action="{{ route('todos.update', $todo->id) }}" method="POST" id="form-update-{{ $todo->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="custom-checkbox" onclick="document.getElementById('form-update-{{ $todo->id }}').submit();">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                </form>
                                <span class="task-text">{{ $todo->task }}</span>
                            </div>
                            <div class="actions">
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon danger" title="Delete Task">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <p>No tasks yet. Add one above!</p>
                </div>
            @endif
        </div>
    </div>

</body>
</html>