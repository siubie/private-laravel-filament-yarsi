<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todos</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] p-6 min-h-screen">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-medium mb-4">Todo List</h1>

        @if ($todos->count())
            <div class="overflow-x-auto bg-white dark:bg-[#161615] p-4 rounded shadow">
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr class="text-sm text-[#706f6c]">
                            <th class="px-3 py-2">#</th>
                            <th class="px-3 py-2">Title</th>
                            <th class="px-3 py-2">Description</th>
                            <th class="px-3 py-2">Category</th>
                            <th class="px-3 py-2">Status</th>
                            <th class="px-3 py-2">Due Date</th>
                            <th class="px-3 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr class="border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <td class="px-3 py-2 align-top">{{ $todo->id }}</td>
                                <td class="px-3 py-2 align-top font-medium">{{ $todo->title }}</td>
                                <td class="px-3 py-2 align-top text-sm text-[#706f6c]">
                                    {{ \Illuminate\Support\Str::limit($todo->description, 120) }}</td>
                                <td class="px-3 py-2 align-top">{{ $todo->category }}</td>
                                <td class="px-3 py-2 align-top">{{ $todo->status }}</td>
                                <td class="px-3 py-2 align-top">{{ $todo->due_date }}</td>
                                <td class="px-3 py-2 align-top">
                                    <a href="{{ route('todos.show', $todo) }}"
                                        class="inline-block px-3 py-1 text-sm bg-[#1b1b18] text-white rounded-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $todos->links() }}
            </div>
        @else
            <div class="p-4 bg-white rounded shadow text-[#706f6c]">No todos found.</div>
        @endif
    </div>
</body>

</html>
