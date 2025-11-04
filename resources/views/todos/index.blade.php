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
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-medium">Todo List</h1>
            <div>
                <a href="{{ route('todos.create') }}"
                    class="inline-block px-4 py-2 bg-[#1b1b18] text-white rounded-sm text-sm">+ Create Todo</a>
            </div>
        </div>

        {{-- flash messages (e.g., after delete) --}}
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-50 border border-green-200 text-green-800">{{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-800">{{ session('error') }}</div>
        @endif

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
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('todos.show', $todo) }}"
                                            class="inline-block px-3 py-1 text-sm bg-[#1b1b18] text-white rounded-sm">View</a>
                                        <a href="{{ route('todos.edit', $todo) }}"
                                            class="inline-block px-3 py-1 text-sm bg-[#706f6c] text-white rounded-sm">Edit</a>

                                        <form action="{{ route('todos.destroy', $todo) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this todo?');"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-3 py-1 text-sm bg-[#F53003] text-white rounded-sm">Delete</button>
                                        </form>
                                    </div>
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
