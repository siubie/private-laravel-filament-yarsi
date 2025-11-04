<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Todo</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] p-6 min-h-screen">
    <div class="max-w-2xl mx-auto bg-white dark:bg-[#161615] p-6 rounded shadow">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-medium">Create Todo</h1>
            <a href="{{ route('todos.index') }}" class="text-sm px-3 py-1 bg-[#706f6c] text-white rounded-sm">Back to
                list</a>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-800">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1" for="title">Title</label>
                <input id="title" name="title" value="{{ old('title') }}" type="text"
                    class="w-full px-3 py-2 border border-[#e3e3e0] rounded focus:outline-none focus:ring" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1" for="description">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-3 py-2 border border-[#e3e3e0] rounded focus:outline-none focus:ring">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="category">Category</label>
                    <input id="category" name="category" value="{{ old('category') }}" type="text"
                        class="w-full px-3 py-2 border border-[#e3e3e0] rounded focus:outline-none focus:ring" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="status">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-[#e3e3e0] rounded">
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>In Progress
                        </option>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="due_date">Due date</label>
                    <input id="due_date" name="due_date" value="{{ old('due_date') }}" type="date"
                        class="w-full px-3 py-2 border border-[#e3e3e0] rounded" />
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-4 py-2 bg-[#1b1b18] text-white rounded-sm">Save</button>
                <a href="{{ route('todos.index') }}" class="px-4 py-2 bg-[#e3e3e0] text-[#1b1b18] rounded-sm">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
